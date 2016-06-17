<?php wp_enqueue_script('zcraft-vendor-jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js'); ?>
<?php wp_enqueue_script('zcraft-vendor-bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('zcraft-vendor-jquery')); ?>
<?php wp_enqueue_script('zcraft-vendor-ie10wr-script', get_template_directory_uri() . '/js/vendor/ie10-viewport-bug-workaround.js'); ?>

<?php wp_enqueue_script('zcraft-generic-script', get_template_directory_uri() . '/js/zcraft.js', array('zcraft-vendor-jquery', 'zcraft-vendor-bootstrap-script')); ?>
<?php wp_enqueue_script('zcraft-homepage-script', get_template_directory_uri() . '/js/homepage.js', array('zcraft-vendor-jquery', 'zcraft-vendor-bootstrap-script')); ?>

<footer id="page-footer">
    <div class="pull-right">
        <?php zcraft_inject_widgets('sidebar-footer-right'); ?>
    </div>
    <div class="pull-left">
        <?php zcraft_inject_widgets('sidebar-footer-left'); ?>
    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
