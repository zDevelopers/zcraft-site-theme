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

window.addEventListener("load", function()
{
    Dropdown.init();

    var drawerButtons = document.querySelectorAll("[data-drawer]");

    for(var i = 0, c = drawerButtons.length; i < c; ++i)
    {
        drawerButtons[i].addEventListener("click", openDrawer);
    }
});

})();

(function() {
'use strict';

window.addEventListener('load', function()
{
    var help_step_images = document.querySelectorAll('img.step-image');

    for (var i = 0, c = help_step_images.length; i < c; ++i)
    {
        help_step_images[i].addEventListener('click', function(e)
        {
            var opened_help_step_images = document.querySelectorAll('.step-image-large');

            for (var j = 0, d = opened_help_step_images.length; j < d; ++j)
            {
                console.log(opened_help_step_images[j]);
                opened_help_step_images[j].parentNode.removeChild(opened_help_step_images[j]);
            }

            var full_image_container = document.createElement('div');
            var full_image_image = document.createElement('img');
            var full_image_close = document.createElement('span');

            full_image_image.setAttribute('src', this.getAttribute('data-src-large'));
            full_image_image.setAttribute('alt', this.getAttribute('alt'));

            full_image_close.innerHTML = '×';

            full_image_container.classList.add('step-image-large');
            full_image_container.appendChild(full_image_image);
            full_image_container.appendChild(full_image_close);

            full_image_container.addEventListener('click', function(e)
            {
                this.parentNode.removeChild(this);
            });

            this.parentElement.appendChild(full_image_container);
        });
    }
});

})();
