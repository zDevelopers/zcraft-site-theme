<?php get_header(); ?>

    <section id="page-headings">
        <h2><?php single_cat_title(); ?></h2>
        <h3>Liste des articles</h3>
    </section>
</header>

<div id="page-content">
    <aside>
        <?php zcraft_inject_widgets('sidebar-archive', 'complementary'); ?>
    </aside>

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

<?php get_footer(); ?>
