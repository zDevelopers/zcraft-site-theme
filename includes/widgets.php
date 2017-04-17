<?php

require_once(dirname(__FILE__) . '/../widgets/CachetStatus_Widget.php');

add_action('widgets_init', function()
{
    register_widget('CachetStatus_Widget');
});
