<?php

$zcraft_widgets = [
    'Zcraft_CachetStatus_Widget',
    'Zcraft_FooterCopyright_Widget'
];

add_action('widgets_init', function()
{
    global $zcraft_widgets;

    require_once(dirname(__FILE__) . '/../widgets/Zcraft_Widget.php');

    foreach ($zcraft_widgets as $key => $zcraft_widget)
    {
        require_once(dirname(__FILE__) . '/../widgets/' . $zcraft_widget . '.php');
        register_widget($zcraft_widget);
    }
});
