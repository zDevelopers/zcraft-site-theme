$(function()
{
    'use strict';

    var server_ip = 'zcraft.fr';


    // TODO si mise en prod, utiliser un service sur zcraft directement
    $.getJSON('https://amaury.carrade.eu/tools/minecraft/ping/json?ip=' + server_ip)
        .always(function(ping)
        {
            var $online_list = $('#zcraft-online-list');
            var tooltip_attributes = 'data-toggle="tooltip" data-placement="bottom"';

            if (ping.status != "ok")
            {
                $('#zcraft-online-offline').show();
                $('#zcraft-online-status').removeClass('unknown').addClass('offline');

                // Brrrrr
                if (Math.random() <= 0.0001)
                {
                    $online_list.append('<li title="Herobrine" ' + tooltip_attributes + '><img src="https://minotar.net/helm/Herobrine/28" alt="Herobrine" /></li>');
                }
            }
            else
            {
                $('#zcraft-online-count').text(ping.data.online_players + ' / ' + ping.data.max_players).show();
                $('#zcraft-online-status').removeClass('unknown').addClass('online');

                // Players sorted by lower-cased name
                ping.data.players.sort(function (a, b) {
                    return a.toLowerCase().localeCompare(b.toLowerCase());
                });

                var players_list = '';
                ping.data.players.forEach(function(player_name)
                {
                    players_list += '<li title="' + player_name + '" ' + tooltip_attributes + '><img src="https://minotar.net/helm/' + player_name + '/28" alt="' + player_name + '" /></li>';
                });

                $online_list.append(players_list).show();
            }

            $online_list.find('li').tooltip();
        });
});
