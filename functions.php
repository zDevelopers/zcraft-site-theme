<?php

require_once(dirname(__FILE__) . '/libs/WP_Zcraft_Nav_Walker.php');
require_once(dirname(__FILE__) . '/libs/WP_Zcraft_Footer_Nav_Walker.php');

add_action('after_setup_theme', function()
{
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
});

include_once(dirname(__FILE__) . '/includes/utilities.php');
include_once(dirname(__FILE__) . '/includes/properties.php');
include_once(dirname(__FILE__) . '/includes/shortcodes.php');
include_once(dirname(__FILE__) . '/includes/widgets.php');
include_once(dirname(__FILE__) . '/includes/hooks.php');
include_once(dirname(__FILE__) . '/includes/rest.php');
include_once(dirname(__FILE__) . '/includes/compatibility-ez-toc.php');

if (is_admin())
{
    include_once(dirname(__FILE__) . '/includes/admin.php');
    include_once(dirname(__FILE__) . '/includes/admin-help.php');
}
