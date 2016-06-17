<?php get_header(); ?>

<div class="container" id="main-content">

    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article class="archive-in-list archive-in-list-<?php echo get_post_type(); ?>">
                        <aside class="pull-right">
                            <a href="<?php the_permalink(); ?>">
                                <span class="glyphicon glyphicon-link"></span>
                                <span class="sr-only">Permalien</span>
                            </a>
                        </aside>
                        <?php get_template_part('content', get_post_type()); ?>
                    </article>
                <?php endwhile; ?>

                <?php zcraft_inject_pagination(); ?>

            <?php else: ?>
                <p class="lead muted text-center">Rien à afficher</p>
            <?php endif; ?>
        </div>

        <div class="col-md-4 sidebar">
            <?php zcraft_inject_widgets('sidebar-archive', 'complementary'); ?>
        </div>
    </div>

</div><!-- .content-area -->

<?php get_footer(); ?>
