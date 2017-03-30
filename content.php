<?php echo get_post_meta($post->ID, 'page-head-code', true); ?>

<?php
$short_link = get_post_meta($post->ID, 'short-link', true);
if ($short_link): ?>
    <p class="info-box">
        Page accessible via ce raccourci : <a href="<?php echo $short_link; ?>" class="post-short-link post-<?php the_ID(); ?>-short-link"><?php echo $short_link; ?></a>
    </p>
<?php endif; ?>

<?php the_content(); ?>

<?php
wp_link_pages(array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages : ', 'zcraft' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'zcraft' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
));
?>

<?php edit_post_link(__('Modifier', 'zcraft'), '<footer class="pull-right"><span class="edit-link">', '</span></footer>', 0, 'btn btn-default'); ?>
