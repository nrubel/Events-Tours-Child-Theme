<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tcevents
 */

$container = get_theme_mod( 'tcevents_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
   
    <div class="mini-loader-content">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" <?php if( is_home() || is_front_page() ) : ?> style="background-image: url(<?php echo esc_url( get_header_image() ); ?>);" <?php endif; ?>>

        <a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
                'tcevents' ); ?></a>

        <nav class="navbar navbar-expand-md navbar-light tce-navbar">

            <?php if ( 'container' == $container ) : ?>
            <div class="container">
                <?php endif; ?>

                <!-- Your site title as branding in the menu -->
                <?php if ( ! has_custom_logo() ) { ?>

            <?php if ( is_front_page() && is_home() ) : ?>

                <h1 class="navbar-brand mb-0">
                    <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        <img src="<?php echo get_theme_file_uri('/images/Logo.svg');?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - Branding - Logo">
                    </a>
                </h1>

            <?php else : ?>

                <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    <img src="<?php echo get_theme_file_uri('/images/Logo.svg');?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - Branding - Logo">
                </a>

            <?php endif; ?>


                <?php } else {
                    the_custom_logo();
                } ?><!-- end custom logo -->

                <?php
                $get_hotline = get_theme_mod( 'tcevents_hotline_number', '+88 01942 999 666' );
                $gh_refine = preg_split('/\s+/', $get_hotline);
                //print_r( $gh_refine );
                $get_hotline_attr_value = implode('', $gh_refine);
                //print_r($get_hotline_attr_value);

                ?>

<!--                <button class="navbar-toggler" id="mmmenu-btn" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path stroke="rgba(0, 0, 0, 0.5)" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>-->
<!--                </button>-->

                <button id="mmmenu-btn" class="d-block d-lg-none">
                    <img src="<?php echo get_theme_file_uri('/images/menu.svg'); ?>" alt="">
                </button>

                <div id="navbarNavDropdown" class="collapse navbar-collapse">
                    <div class="tc-services-menu">
                        <a href="<?php echo esc_url(home_url('/tours-list/'))?>">
                            <img src="<?php echo get_theme_file_uri('/images/island.svg'); ?>" alt=""> Tours
                        </a>
                        <a href="<?php echo esc_url(home_url('/events-list/'))?>">
                            <img src="<?php echo get_theme_file_uri('/images/event.svg'); ?>" alt=""> Events
                        </a>
                        <a href="<?php echo esc_url(home_url('/air-tickets/'))?>">
                            <img src="<?php echo get_theme_file_uri('/images/ic-flight.svg'); ?>" alt=""> Air Tickets
                        </a>
                    </div>
                    <div>
                        <a href="tel:<?php echo $get_hotline_attr_value; ?>" class="hotline nav-hotline mobile-none">
                            <svg fill="currentColor" height="18" viewBox="0 0 22 22" width="18" xmlns="http://www.w3.org/2000/svg">     <path d="M0 0h24v24H0z" fill="none"/>     <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/> </svg>Hotline: <span><?php echo $get_hotline; ?></span>
                        </a>

                        <!-- The WordPress Menu goes here -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'container' => '',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id'    => 'navbarNavDropdown',
                                'menu_class'      => 'navbar-nav',
                                'fallback_cb'     => '',
                                'menu_id'         => 'main-menu',
                                'walker'          => new tcevents_WP_Bootstrap_Navwalker(),
                            )
                        ); ?>
                    </div>
                </div>
                <?php if ( 'container' == $container ) : ?>
            </div><!-- .container -->
            <div id="mmenu" class="d-none">

                <div>
                    <a href="<?php echo esc_url(home_url('/tours-list/'))?>" class="top-mm">
                        <img src="<?php echo get_theme_file_uri('/images/island.svg'); ?>" alt=""> Tours
                    </a>
                    <a href="<?php echo esc_url(home_url('/events-list/'))?>" class="top-mm">
                        <img src="<?php echo get_theme_file_uri('/images/event.svg'); ?>" alt=""> Events
                    </a>
                    <a href="<?php echo esc_url(home_url('/air-tickets/'))?>" class="top-mm">
                        <img src="<?php echo get_theme_file_uri('/images/ic-flight.svg'); ?>" alt=""> Air Tickets
                    </a>

                    <a href="tel:<?php echo $get_hotline_attr_value; ?>" class="hotline nav-hotline mobile-none">
                        <svg fill="currentColor" height="18" viewBox="0 0 22 22" width="18" xmlns="http://www.w3.org/2000/svg">     <path d="M0 0h24v24H0z" fill="none"/>     <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/> </svg>Hotline: <span><?php echo $get_hotline; ?></span>
                    </a>

                    <!-- The WordPress Menu goes here -->
                    <?php

                    $primary_nav = [
                        'theme_location'    =>  'primary',
                        'items_wrap'        =>  '%3$s',
                        'echo'              =>  false,
                        'depth'             =>  0,
                        'container'         =>  false
                    ];
                    echo strip_tags(wp_nav_menu( $primary_nav ), '<a>' );

                    ?>
                </div>

            </div>
        <?php endif; ?>

        </nav><!-- .site-navigation -->

        <?php if( is_home() || is_front_page() ) : ?>

            <section class="row header-search-wrapper">
                <div class="container hsw-container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tour_search_form" role="tab" data-toggle="tab">Tours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#event_search_form" role="tab" data-toggle="tab">Events</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active show" id="tour_search_form">
                            <?php get_template_part('global-templates/tour', 'search-form');?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="event_search_form">
                            <?php get_template_part('global-templates/event', 'search-form');?>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

    </div><!-- .wrapper-navbar end -->
