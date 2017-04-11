(function() {
'use strict';

var drawers = {};

var Dropdown = {
    id: "main-dropdown",
    timeout: 2000,
    element: document.createElement("div"),
    _timeoutId: null,

    init: function()
    {
        Dropdown.element.id = Dropdown.id;
        Dropdown.element.addEventListener("click", closeAll);
    },

    open: function()
    {
        document.body.appendChild(Dropdown.element);
        Dropdown.element.className = "visible";
        if(Dropdown._timeoutId)
            clearTimeout(Dropdown._timeoutId);
    },

    close: function()
    {
        Dropdown.element.className = "";
        Dropdown._timeoutId = setTimeout(Dropdown._onAnimationEnd, Dropdown.timeout);
    },

    _onAnimationEnd: function()
    {
        document.body.removeChild(Dropdown.element);
        Dropdown._timeoutId = null;
    }
};

var NavigationDrawer = {
    id: '',

    get element()
    {
        return document.getElementById(this.id)
            || console.error("Invalid drawer id: %s", this.id);
    },

    new: function(drawer_id) {
        var obj = Object.create(this);
        obj.id = drawer_id;
        return obj;
    },

    get open()
    {
        return this.element.className.split(" ").indexOf("visible") >= 0;
    },

    set open(isOpen)
    {
        this.element.className = isOpen ? "visible" : "";
    }
};

function getDrawer(drawer_id)
{
    var drawer = drawers[drawer_id];

    if(!drawer)
    {
        drawer = NavigationDrawer.new(drawer_id);
        drawers[drawer_id] = drawer;
    }

    return drawer;
}

function openDrawer()
{
    getDrawer(this.getAttribute("data-drawer")).open = true;
    Dropdown.open();
}

function closeAll()
{
    for(var drawer_id in drawers)
    {
        drawers[drawer_id].open = false;
    }
    Dropdown.close();
}

window.addEventListener("load", function() {

    Dropdown.init();

    var drawerButtons = document.querySelectorAll("[data-drawer]");

    for(var i = 0, c = drawerButtons.length; i < c; ++i)
    {
        drawerButtons[i].addEventListener("click", openDrawer);
    }
});

})();


/* Servers status update */

(function() {
'use strict';

window.addEventListener('load', function()
{
    var status_indicators = document.querySelectorAll('.status-indicator');

    for (var i = 0, c = status_indicators.length; i < c; ++i)
    {
        var indicator = status_indicators[i];
        var cachet_api = indicator.getAttribute('data-cachet');

        var componentsRequest = new XMLHttpRequest();
        if (!componentsRequest)
        {
            console.error('No support for XMLHttpRequest, what\'s that strange browser you\'re using?');
            return;
        }

        componentsRequest.onreadystatechange = function()
        {
            if (componentsRequest.readyState === XMLHttpRequest.DONE)
            {
                var status = JSON.parse(componentsRequest.responseText);
                var worse_status = 0;

                var className = '';
                var statusText = 'Impossible de charger l\'état.';

                for (var component_id in status.data)
                {
                    var component = status.data[component_id];
                    if (component.status > worse_status) worse_status = component.status;
                }

                if (worse_status != 1)
                {
                    switch (parseInt(worse_status, 10))
                    {
                        case 1:  // Operational
                            statusText = 'Tous les signaux sont au vert';
                            className = 'green';
                            break;

                        case 2:  // Performance Issues
                            statusText = 'Problèmes de performances';
                            className = 'yellow';
                            break;

                        case 3:  // Partial Outage
                            statusText = 'Panne partielle';
                            className = 'yellow';
                            break;

                        case 4:  // Major Outage
                            statusText = 'Panne majeure';
                            className = 'red';
                            break;
                    }

                    if (className) indicator.classList.add(className);
                    indicator.innerHTML = statusText;

                    return;
                }


                // Status is green, we check for ongoing incidents.

                var incidentsRequest = new XMLHttpRequest();
                incidentsRequest.onreadystatechange = function()
                {
                    if (incidentsRequest.readyState === XMLHttpRequest.DONE)
                    {
                        var incidents = JSON.parse(incidentsRequest.responseText);

                        if (incidents.data.length == 0)
                        {
                            statusText = 'Tous les signaux sont au vert';
                            className = 'green';
                        }
                        else
                        {
                            var worse_incident_status = 5;
                            for (var incident_id in status.data)
                            {
                                var incident = status.data[incident_id];
                                if (incident.status < worse_status) worse_status = incident.status;
                            }

                            switch (parseInt(worse_incident_status, 10))
                            {
                                case 1:  // Investigating
                                    statusText = 'Problème inconnu rencontré';
                                    className = 'red';
                                    break;

                                case 2:  // Identified
                                    statusText = 'Problème en cours de résolution';
                                    className = 'red';
                                    break;

                                case 3:  // Watching
                                    statusText = 'Problème réglé, sous surveillance';
                                    className = 'yellow';
                                    break;
                            }
                        }

                        if (className) indicator.classList.add(className);
                        indicator.innerHTML = statusText;
                    }
                };

                incidentsRequest.open('GET', cachet_api + '/api/v1/incidents?status=1&status=2&status=3');
                incidentsRequest.send();
            }
        };

        componentsRequest.open('GET', cachet_api + '/api/v1/components');
        componentsRequest.send();
    }
});

})();
