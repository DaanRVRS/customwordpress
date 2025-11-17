<?php
/**
 * Header Template
 *
 * Dit bestand genereert de header van het WordPress-thema.
 * Het bevat:
 * - De HTML-head inclusief wp_head() voor het laden van scripts en styles.
 * - De wrapper voor de gehele pagina-layout.
 * - Het logo met link naar de homepagina.
 * - Een dynamisch WordPress-menu dat beheerd wordt via 'Weergave → Menu’s'.
 *
 * Het <nav>-element gebruikt wp_nav_menu() om het 'primary' menu in te laden,
 * zoals geregistreerd in functions.php via register_nav_menus().
 *
 * @package DaanTheme
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">

    <header id="header">
        <!-- Logo met link naar de homepagina -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.svg' ); ?>"
                 alt="<?php bloginfo('name'); ?>" class="logo">
        </a>

        <!-- Dynamisch WordPress-menu -->
        <nav class="links">
            <?php
            wp_nav_menu([
                    'theme_location' => 'primary',   // menu geregistreerd in functions.php
                    'container'      => false,       // geen extra <div> om menu heen
                    'items_wrap'     => '<ul>%3$s</ul>', // structuur van de <ul>
                    'fallback_cb'    => false,       // geen fallback; toont niks zonder menu
            ]);
            ?>
        </nav>
    </header>
