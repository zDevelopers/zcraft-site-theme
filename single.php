<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <section id="page-headings">
        <h2><?php the_title(); ?></h2>
        <?php
        $subtitle = get_post_meta($post->ID, 'subtitle', true);
        if ($subtitle): ?><h3><?php echo $subtitle; ?></h3><?php endif; ?>
    </section>
</header>

<div id="page-content">
    <aside>
        <?php zcraft_inject_widgets('sidebar-post', 'complementary'); ?>
    </aside>
    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-md-8">
                <article class="single-post">
                    <?php get_template_part('content', get_post_format()); ?>
                </article>

                <?php
                    if (comments_open() || get_comments_number())
                        comments_template();
                ?>
            </div>

            <div class="col-md-4 sidebar">
                <div class="sidebar-content">
                    <?php zcraft_inject_widgets('sidebar-post', 'complementary'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>

</div>

<?php get_footer(); ?>
