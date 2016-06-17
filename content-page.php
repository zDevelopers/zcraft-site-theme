<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="article-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php
            $short_link = get_post_meta($post->ID, 'subtitle', true);
            if ($short_link): ?><p class="lead"><?php echo $short_link; ?></p><?php endif; ?>
    </header>

    <div class="row">
        <article class="col-md-8">

            <?php echo get_post_meta($post->ID, 'page-head-code', true); ?>

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
        </article>

        <div class="col-md-4">
            <div class="sidebar-content">
                <?php
                $short_link = get_post_meta($post->ID, 'short-link', true);
                if ($short_link): ?>
                    <aside class="alert alert-info">
                        <p><strong>Page accessible via ce raccourci</strong></p>
                        <p><a href="<?php echo $short_link; ?>" class="aside-short-link"><?php echo $short_link; ?></a></p>
                    </aside>
                <?php endif; ?>

                <?php zcraft_inject_widgets('sidebar-page', 'complementary'); ?>
            </div>
        </div>
    </div>
</div>
