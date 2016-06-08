$(function()
{
    'use strict';

    var server_ip = 'zcraft.fr';

    var handle_ping = function(ping)
    {
        if (ping.status != "ok")
        {
            $('#zcraft-online-offline').show();
            $('#zcraft-online-status').removeClass('unknown').addClass('offline');
        }
        else
        {
            console.log(ping);
            $('#zcraft-online-count').text(ping.data.online_players + ' / ' + ping.data.max_players).show();
            $('#zcraft-online-status').removeClass('unknown').addClass('online');
        }
    };

    // TODO si mise en prod, utiliser un service sur zcraft directement
    $.getJSON('https://amaury.carrade.eu/tools/minecraft/ping/json?ip=' + server_ip)
        .always(function(ping)
        {
            if (ping.status != "ok")
            {
                $('#zcraft-online-offline').show();
                $('#zcraft-online-status').removeClass('unknown').addClass('offline');

                // Brrrrr
                if (Math.random() <= 0.0001)
                {
                    $('#zcraft-online-list').append('<li title="Herobrine"><img src="https://minotar.net/helm/Herobrine/28" alt="Herobrine" /></li>');
                }
            }
            else
            {
                $('#zcraft-online-count').text(ping.data.online_players + ' / ' + ping.data.max_players).show();
                $('#zcraft-online-status').removeClass('unknown').addClass('online');

                var players_list = '';

                for (var i in ping.data.players)
                {
                    if (ping.data.players.hasOwnProperty(i))
                    {
                        var player_name = ping.data.players[i];
                        players_list += '<li title="' + player_name + '"><img src="https://minotar.net/helm/' + player_name + '/28" alt="' + player_name + '" /></li>';
                    }
                }

                $('#zcraft-online-list').append(players_list).show();
            }
        });
});
