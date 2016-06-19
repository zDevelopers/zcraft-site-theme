(function() {
'use strict';

var NavigationDrawer = {
    id: '',
    dropdown_id: '',
    
    get element() 
    {
        return document.getElementById(this.id) 
            || console.error("Invalid drawer id: %s", this.id);
    },
    
    get dropdown()
    {
        return document.getElementById(this.dropdown_id) 
            || console.error("Invalid dropdown id: %s", this.id);
    },
    
    new: function(drawer_id) {
        var obj = Object.create(this);
        obj.id = drawer_id;
        obj.dropdown_id = obj.element.getAttribute("data-dropdown");
        obj.dropdown.addEventListener("click", function() {obj.open = false;});
        console.log("%o", obj);
        return obj;
    },
    
    get open()
    {
        return this.element.className.split(" ").indexOf("visible") >= 0;
    },
 
    set open(isOpen)
    {
        this.element.className = isOpen ? "visible" : "";
        this.dropdown.className = isOpen ? "visible" : "";
    }
};

var drawers = {};

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

window.addEventListener("load", function() {
    
    document.getElementById("secondary-menu-button").addEventListener("click", function() {
        getDrawer("secondary-menu").open = true;
    });
    
});

})();
