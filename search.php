<?php get_header(); ?>

    <section id="page-headings">
        <h2>Résultats de la recherche</h2>
        <h3><?php the_search_query(); ?></h3>
    </section>
</header>

<div id="page-content">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>

            <?php get_template_part('content', 'search'); ?>

        <?php endwhile; ?>
    <?php else: ?>

        <p class="lead text-muted text-center no-results">
            <?php echo __('Aucun résultat trouvé.', 'zcraft'); ?>
        </p>

    <?php endif; ?>
</div>

<?php get_footer(); ?>
