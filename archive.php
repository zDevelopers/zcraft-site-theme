<?php get_header(); ?>

    <section id="page-headings">
        <h2><?php
            if (is_home()):
                echo wp_title('');
            elseif ($title = single_cat_title('', false)):
                echo $title;
            elseif (is_date()):
                echo ucfirst(get_the_date('F Y'));
            elseif (is_author()):
                echo the_author_link();
            endif;
        ?></h2>
        <h3><?php
            if ($GLOBALS['wp_query']->max_num_pages > 1):
                ?>Page <?php echo get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1; ?> sur <?php echo $GLOBALS['wp_query']->max_num_pages;
            else:
                ?>Liste des articles<?php
            endif;
        ?></h3>
    </section>
</header>

<div id="page-content" class="page-list">
    <aside>
        <?php zcraft_inject_widgets('sidebar-archive', 'complementary'); ?>
    </aside>
    <section>
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article class="archive-in-list archive-in-list-<?php echo get_post_type(); ?>">
                    <aside class="archive-permalink">
                        <a href="<?php the_permalink(); ?>">
                            Permalien
                        </a>
                    </aside>

                    <?php the_title(sprintf('<h3><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>

                    <div class="archive-summary"><?php get_template_part('content', get_post_type()); if (get_post_type() == 'post'): ?>
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
            <?php endwhile; ?>

            <?php zcraft_inject_pagination(); ?>

        <?php else: ?>
            <p class="page-list-empty"><?php echo __('Rien à afficher.', 'zcraft'); ?></p>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>
