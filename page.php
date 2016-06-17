<?php get_header(); ?>

<div class="container" id="main-content">

    <?php
    while (have_posts())
    {
        the_post();

        // Include the page content template.
        get_template_part('content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number())
        {
            comments_template();
        }
    }
    ?>

</div>

<?php get_footer(); ?>
