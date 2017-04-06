<?php
    wp_enqueue_script('zcraft-vendor-ie10wr-script', get_template_directory_uri() . '/js/vendor/ie10-viewport-bug-workaround.js');
    wp_enqueue_script('zcraft-generic-script', get_template_directory_uri() . '/js/zcraft.js');

    if (is_front_page() &&!is_home())
    {
        wp_enqueue_script('zcraft-homepage-script', get_template_directory_uri() . '/js/homepage.js');
        wp_enqueue_script('zcraft-servers-list-script', get_template_directory_uri() . '/js/servers_list.js', ['wp-api']);
    }
?>

<footer id="page-footer">
    <div class="pull-right">
        <?php zcraft_inject_widgets('sidebar-footer-right'); ?>
    </div>
    <div class="pull-left">
        <?php zcraft_inject_widgets('sidebar-footer-left'); ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
