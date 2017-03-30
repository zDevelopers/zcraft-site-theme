<?php get_header(); ?>

    <section id="page-headings">
        <h2><?php wp_title(''); ?></h2>
        <?php if ($GLOBALS['wp_query']->max_num_pages > 1): ?>
            <h3>Page <?php echo get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1; ?> de <?php echo $GLOBALS['wp_query']->max_num_pages; ?></h3>
        <?php endif; ?>
    </section>
</header>

<div id="page-content">

    <?php
    while (have_posts())
    {
        the_post();

        // Include the page content template.
        get_template_part('content', get_post_type());

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number())
        {
            comments_template();
        }
    }
    ?>

    <?php zcraft_inject_pagination(); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>
