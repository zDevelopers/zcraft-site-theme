<?php

$restore_wpautop;
$restore_wptexturize;

add_action('the_post', function($post)
{
    if (!empty(get_post_meta($post->ID, 'wvr_raw_html', true)) || !empty(get_post_meta($post->ID, 'raw_html', true)))
    {
        if (has_filter('the_content', 'wpautop') !== false) remove_filter('the_content', 'wpautop');
        if (has_filter('the_content', 'wptexturize') !== false) remove_filter('the_content', 'wptexturize');
    }
});
