<?php get_header(); ?>

    <section id="page-headings">
        <h2>Résultats de la recherche</h2>
        <h3><?php the_search_query(); ?></h3>
    </section>
</header>

<div id="page-content" class="page-list">
    <aside>
        <?php zcraft_inject_widgets('sidebar-search', 'complementary'); ?>
    </aside>
    <section>
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('content', 'search'); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="page-list-empty">
                <?php echo __('Aucun résultat trouvé.', 'zcraft'); ?>
            </p>
        <?php endif; ?>

        <?php the_posts_pagination(); ?>
    </section>
</div>

<?php get_footer(); ?>
