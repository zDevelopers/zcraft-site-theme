<?php get_header(); ?>

<div class="container" id="main-content">

    <?php while ( have_posts() ) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

            <div class="col-md-4">
                <div class="sidebar-content">
                    <?php zcraft_inject_widgets('sidebar-post', 'complementary'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php endwhile; ?>

</div>

<?php get_footer(); ?>
