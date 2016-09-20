(function ()
{
	'use strict';

	var minecraft_ping_API = 'https://amaury.carrade.eu/minecraft/ping/{ip}/json';

	var herobrine_probability = 0.005;
	var herobrine_ghost_list_item = '<li data-tooltip="Herobrine"><img src="img/herobrine-head.png" alt="Herobrine" /></li>';


	function load_server(server_ip, element_count, element_list)
	{
		var httpRequest = new XMLHttpRequest();
		if (!httpRequest) 
		{
			console.error('No support for XMLHttpRequest, what\'s that strange browser you\'re using?');
			return;
		}

		httpRequest.onreadystatechange = function()
		{
			if (httpRequest.readyState === XMLHttpRequest.DONE)
			{
				var ping = JSON.parse(httpRequest.responseText);

				if (httpRequest.status === 200 && ping.status == 'ok')
				{
					element_count.classList.add('online');
					element_count.innerHTML = ping.data.online_players + ' / ' + ping.data.max_players;

					// Players sorted by lower-cased name
	                ping.data.players.sort(function (a, b) {
	                    return a.toLowerCase().localeCompare(b.toLowerCase());
	                });

	                var players_list = '';
	                ping.data.players.forEach(function(player_name)
	                {
	                    players_list += '<li data-tooltip="' + player_name + '"><img src="https://minotar.net/helm/' + player_name + '/32" alt="' + player_name + '" /></li>';
	                });

	                // Brrrr...
	                if (ping.data.players.length == 0 && Math.random() <= herobrine_probability)
	                {
	                    players_list += herobrine_ghost_list_item;
	                }

	                if (players_list) element_list.innerHTML = players_list;
				}
				else
				{
					element_count.classList.add('offline');
					element_count.innerHTML = 'Hors-ligne';

					if (ping.status != 'ok')
					{
						element_count.setAttribute('title', ping.error);
					}

					if (Math.random() <= herobrine_probability)
	                {
	                    element_list.innerHTML = herobrine_ghost_list_item;
	                }
				}
			}
		}

		httpRequest.open('GET', minecraft_ping_API.replace('{ip}', server_ip));
		httpRequest.send();
	}


	var servers_status = document.getElementById('online-status').getElementsByTagName('dd');

	for (var i = 0; i < servers_status.length; i++)
	{
		var server = servers_status[i];
		var server_ip = server.getAttribute('data-hostname');
		var server_block = server.nextElementSibling;

		// Add tooltip with IP if it differs from the displayed title
		if (server_ip.toLowerCase() != server.innerHTML.toLowerCase())
		{
			server.setAttribute('data-tooltip', server_ip);
			server.classList.add('tooltip-for-text');
		}

		var server_count = server_block.appendChild(document.createElement('p'));
		var server_list = server_block.appendChild(document.createElement('ul'));

		load_server(server_ip, server_count, server_list);
	}
})();
