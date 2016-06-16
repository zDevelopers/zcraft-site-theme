<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo wp_get_document_title(); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_enqueue_style('zcraft-vendor-bootstrap-style', get_template_directory_uri() . '/css/vendor/bootstrap.min.css'); ?>
    <?php wp_enqueue_style('zcraft-vendor-ie10wr-style', get_template_directory_uri() . '/css/vendor/ie10-viewport-bug-workaround.css'); ?>

    <?php wp_enqueue_style('zcraft-generic-style', get_template_directory_uri() . '/style.css', array('zcraft-vendor-bootstrap-style')); ?>

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?><?php if (is_front_page() && !is_home()): ?> id="homepage"<?php endif; ?>>

<div id="global-wrapper">

    <header class="navbar-wrapper">
        <div class="container">
            <nav class="navbar nav nav-pills navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-toggle" type="button" data-toggle="collapse" href="#main-nav" aria-expanded="false" aria-controls="main-nav">
                            Menu <span class="caret"></span>
                        </a>
                        <div class="navbar-brand brand" href=""><a href="<?php echo home_url(); ?>" id="main_logo"><img src="<?php echo get_theme_mod('zcraft-header-logo', get_stylesheet_directory_uri() . '/img/logo.png'); ?>" alt="<?php bloginfo('name')?>" /></a></div>
                    </div>

                    <div id="main-nav" class="collapse">

                        <?php
                            wp_nav_menu(array(
                                'menu'              => 'Top Left Menu',
                                'depth'             => 2,
                                'container'         => '',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Nav_Walker()
                            ));
                        ?>

                        <?php
                            wp_nav_menu(array(
                                'menu'              => 'Top Right Menu',
                                'depth'             => 2,
                                'container'         => '',
                                'menu_class'        => 'nav navbar-nav pull-right',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Nav_Walker(true)
                            ));
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div id="header-background"><div id="header-background-border"></div></div>
