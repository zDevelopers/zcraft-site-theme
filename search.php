<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="container" id="main-content">
    <div class="row">
        <div class="col-md-8">

            <header class="article-header">
                <h1 class="entry-title">Résultats de la recherche</h1>
                <p class="lead search-query-title"><?php the_search_query(); ?></p>
            </header>

            <?php if (have_posts()): ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'search' ); ?>

                <?php endwhile; ?>
            <?php else: ?>

                <p class="lead text-muted text-center no-results">
                    Aucun résultat trouvé.
                </p>

            <?php endif; ?>
        </div>
        <div class="col-md-4 sidebar">
            <div class="sidebar-content">
                <?php zcraft_inject_widgets('sidebar-search', 'complementary'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
