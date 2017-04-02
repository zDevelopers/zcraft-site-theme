<?php

add_action('admin_init', function()
{
    /* ----------------- hide visual editor filter ----------------- */
    function weaverii_disable_visual_editor()
    {
        global $wp_rich_edit;

        if (!isset($_GET['post'])) return;
        $post_id = $_GET['post'];

        $hide_visual_editor = get_post_meta($post_id, 'hide_visual_editor', true);
        $raw = get_post_meta($post_id, 'wvr_raw_html', true);
        if (!$raw) $raw = get_post_meta($post_id, 'raw_html', true);

        if ($hide_visual_editor == 'on' || $raw == 'on')
            $wp_rich_edit = false;
    }

    add_action('load-page.php', 'weaverii_disable_visual_editor');
    add_action('load-post.php', 'weaverii_disable_visual_editor');
});
