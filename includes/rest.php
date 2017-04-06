<?php

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;
use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

define('ZCRAFT_PING_TIMEOUT', 5); // seconds

function zcraft_rest_minecraft_ping(WP_REST_Request $request)
{
    require_once(dirname(__FILE__) . '/../libs/MinecraftPing.php');
    require_once(dirname(__FILE__) . '/../libs/MinecraftPingException.php');
    require_once(dirname(__FILE__) . '/../libs/MinecraftQuery.php');
    require_once(dirname(__FILE__) . '/../libs/MinecraftQueryException.php');

    $ip = $raw_ip = trim($request['ip']);
    $port = 25565;

    if (empty($raw_ip))
        return new WP_Error('zcraft_minecraft_ping_no_ip', 'Server IP is required to ping to retrieve players', ['status' => 400]);

    $server_infos = [];

    if(strpos($ip, ":") !== false)
    {
        $exploded_ip = explode(":", $ip);
        $ip = $exploded_ip[0];
        $port = intval($exploded_ip[1]);
    }

    /* Standard ping */
    try
    {
        $query = new MinecraftPing($ip, $port, ZCRAFT_PING_TIMEOUT);
        $infos = $query->Query();

        if ($infos !== false && !empty($infos))
        {
            $server_infos["max_players"] = $infos["players"]["max"];
            $server_infos["online_players"] = $infos["players"]["online"];

            $server_infos["players"] = [];
            if (isset($infos["players"]["sample"]) && !empty($infos["players"]["sample"]))
            {
                foreach ($infos["players"]["sample"] as $player)
                {
                    $server_infos["players"][] = $player["name"];
                }
            }
        }
        else
        {
            // < 1.7 server?
            $query->Close();
            $query->Connect();
            $infos = $query->QueryOldPre17();

            if($infos !== false && !empty($infos))
            {
                $server_infos["max_players"] = $infos["MaxPlayers"];
                $server_infos["online_players"] = $infos["Players"];
            }
        }
    }
    catch (MinecraftPingException $e)
    {
        return new WP_ERROR('zcraft_minecraft_ping_error', 'An error occurred while pinging server ' . $raw_ip, $e->getMessage());
    }
    finally
    {
        if (isset($query)) $query->Close();
    }


    /* Query, if enabled and available in the same port */
    try
    {
        $query = new MinecraftQuery();
        $query->Connect($ip, $port, ZCRAFT_PING_TIMEOUT);
        $players = $query->GetPlayers();

        if ($players !== false && !empty($players))
        {
            // We replace the players sample with this full player list.
            $server_infos["players"] = $players;
        }
    }
    catch (MinecraftQueryException $e) {} // No query for you


    return $server_infos;
}

add_action('rest_api_init', function()
{
    register_rest_route('zcraft/v1', 'minecraft-ping/(?P<ip>.+)', [
        'method'   => 'GET',
        'callback' => 'zcraft_rest_minecraft_ping'
    ]);
});
