<?php

function zcraft_inject_widgets($area_name, $role = "")
{
    if (is_active_sidebar($area_name))
    {
        ?>
        <div id="widget-area-<?php echo $area_name; ?>" class="widget-area widget-area-<?php echo $area_name; ?>"<?php if (!empty($role)): ?> role="<?php echo $role; ?>"<?php endif; ?>>
            <?php
                ob_start();
                dynamic_sidebar($area_name);
                echo apply_filters('zcraft_sidebar_rendered', ob_get_clean(), $area_name);
            ?>
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
