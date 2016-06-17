<?php

require_once('libs/WP_Bootstrap_Nav_Walker.php');

/* **  INITIALIZATION OF THE THEME  ** */


function zcraft_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}


function zcraft_customize_register(WP_Customize_Manager $wp_customize)
{
    $wp_customize->add_setting('zcraft-header-logo', array(
        'default'    => get_stylesheet_directory_uri() . '/img/logo.png'
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
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Pied de page (droite)', 'zcraft'),
        'id'            => 'sidebar-footer-right',
        'description'   => __('Widgets affichés en bas de page dans le pied, à droite', 'zcraft'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}


function zcraft_customize_css()
{
    ?>
    <style type="text/css">
        <?php if (get_theme_mod('zcraft-justify-content', false)): ?>
        article p {
            text-align: justify;
            text-justify: inter-word;
        }
        <?php endif; ?>

        <?php if (!empty(get_theme_mod('zcraft-font-content', ''))): ?>
        article p, article h1, article h2, article h3, article h4, article h5, article h6,
        article li, article dl, article dd, article dt, article .caption {
            font-family: <?php echo get_theme_mod('zcraft-font-content', ''); ?>;
        }
        <?php endif; ?>
    </style>
    <?php
}


add_action('after_setup_theme', 'zcraft_theme_setup');
add_action('customize_register', 'zcraft_customize_register');
add_action('widgets_init', 'zcraft_widgets_init');
add_action('wp_head', 'zcraft_customize_css');


register_nav_menus(array(
    'Top Left Menu' => __('Menu principal gauche'),
    'Top Right Menu' => __('Menu principal droit'),
));



/* **  CONTENT PARSER  ** */


function zcraft_filter_add_class_to_all_tables($content)
{
    $classes = 'table table-striped table-bordered';

    $content = str_replace('<table class="', '<table class="' . $classes . ' ', $content);
    $content = str_replace('<table>', '<table class="' . $classes . '">', $content);

    return $content;
}

add_filter('the_content', 'zcraft_filter_add_class_to_all_tables');



/* **  UTILITIES  ** */


function zcraft_inject_widgets($area_name, $role = "")
{
    if (is_active_sidebar($area_name))
    {
        ?>
        <div id="widget-area-<?php echo $area_name; ?>" class="widget-area widget-area-<?php echo $area_name; ?>"<?php if (!empty($role)): ?> role="<?php echo $role; ?>"<?php endif; ?>>
            <?php dynamic_sidebar($area_name); ?>
        </div>
        <?php
    }
}

function zcraft_inject_pagination() {
    the_posts_pagination(array(
        'prev_text'          => __('Page précédente', 'zcraft'),
        'next_text'          => __('Page suivante', 'zcraft'),
        'before_page_number' => '<span class="meta-nav sr-only">' . __( 'Page', 'zcraft' ) . ' </span>',
    ));
}
