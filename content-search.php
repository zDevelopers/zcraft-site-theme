<article id="post-<?php the_ID(); ?>" <?php post_class('search-result archive-in-list archive-in-list-' . get_post_type()); ?>>
    <aside class="archive-permalink">
        <a href="<?php the_permalink(); ?>">
            Permalien
        </a>
    </aside>

    <?php the_title(sprintf('<h3><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>

    <div class="archive-summary"><?php the_excerpt(); if (get_post_type() == 'post'): ?>
        <footer>
            <p>
                <?php if ($post_date = get_the_date()): ?>
                    Publié le <?=$post_date ?>.
                <?php endif; ?>
                <?php if (get_comments_number() && post_type_supports( get_post_type(), 'comments')): ?>
                    <?=get_comments_number_text() ?>.
                <?php endif; ?>
            </p>
        </footer>
    <?php endif; ?></div>
</article>
