<article id="post-<?php the_ID(); ?>" <?php post_class('search-result archive-in-list archive-in-list-' . get_post_type()); ?>>
    <aside class="pull-right">
        <a href="<?php the_permalink(); ?>">
            <span class="fa-link"></span>
            <span class="sr-only">Permalien</span>
        </a>
    </aside>

    <h2><?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink())), '</a></h2>'); ?></h2>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
</article>
