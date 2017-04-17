<?php

function zcraft_customize_register(WP_Customize_Manager $wp_customize)
{
    $wp_customize->add_setting('zcraft-header-logo', array(
        'default'    => get_stylesheet_directory_uri() . '/img/logo.png'
    ));

    $wp_customize->add_setting('zcraft-header-banner', array(
        'default'    => get_stylesheet_directory_uri() . '/img/top-banner.jpg'
    ));

    $wp_customize->add_setting('zcraft-header-banner-position-vertical', array(
        'default'    => 'center'
    ));

    $wp_customize->add_setting('zcraft-header-banner-position-horizontal', array(
        'default'    => 'center'
    ));

    $wp_customize->add_setting('zcraft-justify-content', array(
        'default'    => false
    ));

    $wp_customize->add_setting('zcraft-font-content', array(
        'default'    => ''
    ));


    $wp_customize->add_section('zcraft-theme-options', array(
        'title'      => __('En-tête du site', 'zcraft'),
        'priority'   => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zcraft-header-logo-control', array(
        'label'      => __('Icône d\'en-tête', 'zcraft'),
        'section'    => 'zcraft-theme-options',
        'settings'   => 'zcraft-header-logo',
        'description' => __('Un fond transparent est recommandé.')
    )));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zcraft-header-banner-control', array(
        'label'      => __('Bandeau d\'en-tête', 'zcraft'),
        'section'    => 'zcraft-theme-options',
        'settings'   => 'zcraft-header-banner',
        'description' => __('Idéalement, le bandeau devrait être assez large, pour s\'étendre sur les grandes résolutions, et d\'au moins 400px de haut.')
    )));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'zcraft-header-banner-position-horizontal-control', array(
        'label'      => __('Alignement horizontal du bandeau', 'zcraft'),
        'section'    => 'zcraft-theme-options',
        'settings'   => 'zcraft-header-banner-position-horizontal',
        'type'       => 'select',
        'choices'    => [
            'left'     => 'À gauche',
            'center'   => 'Centré',
            'right'    => 'À droite',
            'top'      => 'En haut',
            'bottom'   => 'En bas'
        ]
    )));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'zcraft-header-banner-position-vertical-control', array(
        'label'      => __('Alignement vertical du bandeau', 'zcraft'),
        'section'    => 'zcraft-theme-options',
        'settings'   => 'zcraft-header-banner-position-vertical',
        'type'       => 'select',
        'choices'    => [
            'left'     => 'À gauche',
            'center'   => 'Centré',
            'right'    => 'À droite',
            'top'      => 'En haut',
            'bottom'   => 'En bas'
        ]
    )));


    $wp_customize->add_section('zcraft-content-options', array(
        'title'      => __('Contenus du site', 'zcraft'),
        'priority'   => 35,
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'zcraft-font-content-control', array(
        'label'      => __('Police des contenus (format CSS)', 'zcraft'),
        'section'    => 'zcraft-content-options',
        'settings'   => 'zcraft-font-content',
        'type'       => 'text',
    )));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'zcraft-justify-content-control', array(
        'label'      => __('Justifier le contenu', 'zcraft'),
        'section'    => 'zcraft-content-options',
        'settings'   => 'zcraft-justify-content',
        'type'       => 'checkbox',
    )));
}

function zcraft_widgets_init()
{
    /* ---  Sidebars  --- */

    register_sidebar(array(
        'name'          => __('À droite des pages', 'zcraft'),
        'id'            => 'sidebar-page',
        'description'   => __('Widgets affichés à droite des pages de contenus', 'zcraft'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('À droite des articles', 'zcraft'),
        'id'            => 'sidebar-post',
        'description'   => __('Widgets affichés à droite des articles', 'zcraft'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('À droite des archives', 'zcraft'),
        'id'            => 'sidebar-archive',
        'description'   => __('Widgets affichés à droite des archives (listes de contenus)', 'zcraft'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('À droite des recherches', 'zcraft'),
        'id'            => 'sidebar-search',
        'description'   => __('Widgets affichés à droite des résultats de recherche', 'zcraft'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));


    /* ---  Footers  --- */

    register_sidebar(array(
        'name'          => __('Pied de page (gauche)', 'zcraft'),
        'id'            => 'sidebar-footer-left',
        'description'   => __('Widgets affichés en bas de page dans le pied, à gauche', 'zcraft'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Pied de page (centre)', 'zcraft'),
        'id'            => 'sidebar-footer-center',
        'description'   => __('Widgets affichés en bas de page dans le pied, au centre', 'zcraft'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Pied de page (droite)', 'zcraft'),
        'id'            => 'sidebar-footer-right',
        'description'   => __('Widgets affichés en bas de page dans le pied, à droite', 'zcraft'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}

function zcraft_customize_css()
{
    ?>
    <style type="text/css">
        <?php if (get_theme_mod('zcraft-justify-content', false)): ?>
        body:not(#homepage) article p, #page-content > section {
            text-align: justify;
            text-justify: inter-word;
        }
        <?php endif; ?>

        <?php if (!empty(get_theme_mod('zcraft-font-content', ''))): ?>
        article p, article h1, article h2, article h3, article h4, article h5, article h6,
        article li, article dl, article dd, article dt, article .caption,
        #page-content > section p, #page-content > section h1, #page-content > section h2,
        #page-content > section h3, #page-content > section h4, #page-content > section h5,
        #page-content > section h6, #page-content > section li, #page-content > section dl,
        #page-content > section dd, #page-content > section dt, #page-content > section .caption, {
            font-family: <?php echo get_theme_mod('zcraft-font-content', ''); ?>;
        }
        <?php endif; ?>

        header {
            <?php if (!empty(get_theme_mod('zcraft-header-banner', ''))): ?>
            background-image: url('<?php echo addslashes(get_theme_mod('zcraft-header-banner', '')); ?>');
            <?php endif; ?>

            background-position: <?=get_theme_mod('zcraft-header-banner-position-horizontal', 'center') ?> <?=get_theme_mod('zcraft-header-banner-position-vertical', 'center') ?>;
        }
    </style>
    <?php
}

add_action('customize_register', 'zcraft_customize_register');
add_action('widgets_init', 'zcraft_widgets_init');
add_action('wp_head', 'zcraft_customize_css');

register_nav_menus(array(
    'Top Left Menu' => __('Menu principal gauche'),
    'Top Right Menu' => __('Menu principal droit'),
));
