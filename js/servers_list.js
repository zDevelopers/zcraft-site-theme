(function () {
    'use strict';
    var minecraft_ping_API = 'index.php/wp-json/zcraft/v1/minecraft-ping/{ip}';
    var update_delay = 60; // seconds
    var herobrine_probability = 0.0008;

    if (!window.XMLHttpRequest) {
        console.error("No support for XMLHttpRequest, what's that strange browser you're using?");
        return;
    }

    function makePlayerElement(playerName) {
        var li = document.createElement('li');
        var img = li.appendChild(document.createElement('img'));
        img.src = playerName === 'Herobrine' ? 'img/herobrine-head.png' : 'https://minotar.net/helm/' + playerName + '/32';
        img.alt = playerName;
        li.setAttribute('data-tooltip', playerName);
        return li;
    }

    function load_server(server) {
        var httpRequest = new XMLHttpRequest();

        httpRequest.onreadystatechange = function() {
            if(httpRequest.readyState !== XMLHttpRequest.DONE) {
                return;
            }

            var ping;
            try {
                ping = JSON.parse(httpRequest.responseText);
            } catch (e) {
                console.warn('Could not parse response from server : %s', e);
                server.countElement.className = 'error';
                server.countElement.setAttribute('data-tooltip', 'Impossible de récupérer les informations du serveur.');
                return;
            }

            if (httpRequest.status === 200)
            {
                server.countElement.className = 'online';
                server.countElement.innerHTML = ping.online_players + ' / ' + ping.max_players;
                server.listElement.innerHTML = '';

                // Brrrr...
                if (ping.players.length === 0 && Math.random() <= herobrine_probability) {
                    ping.players = ['Herobrine'];
                }

                // Players sorted by lower-cased name
                ping.players.sort(function (a, b) {
                    return a.toLowerCase().localeCompare(b.toLowerCase());
                })
                .map(makePlayerElement).forEach(function(element) {
                    server. listElement.appendChild(element);
                });
            }
            else
            {
                server.countElement.className = 'offline';
                server.countElement.textContent = 'Hors-ligne';
                server.countElement.setAttribute('title', ping.data);

                if (Math.random() <= herobrine_probability)
                {
                    server.listElement.appendChild(makePlayerElement('Herobrine'));
                }
            }

        };

        httpRequest.open('GET', minecraft_ping_API.replace('{ip}', server.hostName));
        httpRequest.send();
    }


    var servers_status_elmts = document.getElementById('online-status').getElementsByTagName('dt');
    var servers = [];

    for (var i = 0; i < servers_status_elmts.length; i++)
    {
        var serverElement = servers_status_elmts[i];
        var serverHostname = serverElement.getAttribute('data-hostname');
        var server_block = serverElement.nextElementSibling;

        var server = {
            hostName: serverHostname,
            countElement: server_block.appendChild(document.createElement('p')),
            listElement: server_block.appendChild(document.createElement('ul'))
        };

        // Add tooltip with IP if it differs from the displayed title
        if (serverHostname.toLowerCase() !== serverElement.innerHTML.toLowerCase())
        {
            serverElement.setAttribute('data-tooltip', serverHostname);
            serverElement.classList.add('tooltip-for-text');
        }

        load_server(server);
        servers.push(server);
    }

    setInterval(function() {
        servers.forEach(load_server);
    }, update_delay * 1000);
})();
