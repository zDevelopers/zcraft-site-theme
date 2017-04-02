<?php

function zcraft_inject_widgets($area_name, $role = "")
{
    if (is_active_sidebar($area_name))
    {
        ?>
        <div id="widget-area-<?php echo $area_name; ?>" class="widget-area widget-area-<?php echo $area_name; ?>"<?php if (!empty($role)): ?> role="<?php echo $role; ?>"<?php endif; ?>>
            <?php dynamic_sidebar($area_name); ?>
        </div>
        <?php
    }
}

function zcraft_inject_pagination()
{
    the_posts_pagination(array(
        'prev_text'          => __('Page précédente', 'zcraft'),
        'next_text'          => __('Page suivante', 'zcraft'),
        'before_page_number' => '<span class="meta-nav sr-only">' . __( 'Page', 'zcraft' ) . ' </span>',
    ));
}

function zcraft_the_content($more = '')
{
    if (!empty(get_post_meta(get_the_ID(), 'wvr_raw_html', true)) || !empty(get_post_meta(get_the_ID(), 'raw_html', true)))
    {
        $restore_wpautop = has_filter('the_content', 'wpautop');    // have to do this to prevent disabling from nested posts
        $restore_wptexturize = has_filter('the_content', 'wptexturize');

		if ($restore_wpautop !== false)     remove_filter('the_content', 'wpautop');
        if ($restore_wptexturize !== false) remove_filter('the_content', 'wptexturize');

        the_content($m);

        if ($restore_wpautop !== false)     add_filter('the_content', 'wpautop');
        if ($restore_wptexturize !== false) add_filter('the_content', 'wptexturize');
    }
    else
    {
        the_content($more);
    }
}
