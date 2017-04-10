<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_enqueue_style('zcraft-vendor-fontawesome-style', get_template_directory_uri() . '/css/vendor/font-awesome.css'); ?>
    <?php wp_enqueue_style('zcraft-vendor-ie10wr-style', get_template_directory_uri() . '/css/vendor/ie10-viewport-bug-workaround.css'); ?>

    <?php wp_enqueue_style('zcraft-generic-style', get_template_directory_uri() . '/style.css', array('zcraft-vendor-fontawesome-style')); ?>

    <?php
        if (is_front_page() && !is_home()):
            wp_enqueue_style('zcraft-homepage-style', get_template_directory_uri() . '/css/homepage.css', array('zcraft-vendor-fontawesome-style'));
        endif;
    ?>

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?><?php if (is_front_page() && !is_home()): ?> id="homepage"<?php endif; ?>>
    <header>
        <nav>
            <h1>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_theme_mod('zcraft-header-logo', get_stylesheet_directory_uri() . '/img/logo.png'); ?>" alt="<?php bloginfo('name')?>" />
                </a>
            </h1>

            <?php
                wp_nav_menu(array(
                    'menu'              => 'Top Left Menu',
                    'depth'             => 0,
                    'container'         => '',
                    'menu_class'        => '',
                    'menu_id'           => 'primary-menu',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'items_wrap'        => '<ul role="menu" id="%1$s" class="%2$s">%3$s<span id="secondary-menu-button" data-title="" data-drawer="secondary-menu" class="fa-list"></span></ul>',
                    'walker'            => new WP_Zcraft_Nav_Walker()
                ));

                wp_nav_menu(array(
                    'menu'              => 'Top Right Menu',
                    'depth'             => 0,
                    'container'         => '',
                    'menu_class'        => '',
                    'menu_id'           => 'secondary-menu',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'items_wrap'        => '<ul role="menu" id="%1$s" class="%2$s" data-title="Menu secondaire">%3$s</ul>',
                    'walker'            => new WP_Zcraft_Nav_Walker(true)
                ));
            ?>
        </nav>

        <?php // Page title and </header> in content pages
