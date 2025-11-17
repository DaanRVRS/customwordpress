<?php
/**
 * Functions File for DaanTheme
 *
 * In dit bestand worden alle themabrede functies geladen:
 * - Theme setup (menus, support, features)
 * - Scripts en styles inladen
 * - Customizer instellingen (About-sectie)
 * - Registratie van widget areas (sidebars)
 *
 * @package DaanTheme
 */


/**
 * Theme Setup
 *
 * WordPress voert deze functie uit na het activeren van het thema.
 * Functionaliteit:
 * - title-tag support zorgt dat WordPress automatisch <title> tags genereert.
 * - post-thumbnails maakt featured images mogelijk.
 * - register_nav_menus registreert dynamische menu-locaties voor het admin-menu.
 */
function greentech_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => __('Primary Menu', 'greentech'),
    ]);
}
add_action('after_setup_theme', 'greentech_setup');



/**
 * Enqueue Styles & Scripts
 *
 * Hiermee worden CSS- en JS-bestanden correct ingeladen,
 * zodat WordPress ze op de juiste manier beheert (inclusief dependencies).
 *
 * Opbouw van deze functie:
 * - Inladen van template CSS-bestanden
 * - Inladen van WordPress' standaard styles (style.css)
 * - Inladen van jQuery (via WP core)
 * - Inladen van template JS-bestanden
 */
function greentech_scripts() {
    $uri = get_template_directory_uri();

    // Template CSS
    wp_enqueue_style('greentech-main', $uri . '/assets/sass/main.css');
    wp_enqueue_style('greentech-fontawesome', $uri . '/assets/css/fontawesome-all.min.css', ['greentech-main']);

    // style.css uit het themabestand
    wp_enqueue_style('greentech-style', get_stylesheet_uri(), ['greentech-main']);

    // jQuery van WordPress zelf
    wp_enqueue_script('jquery');

    // Template JavaScript
    wp_enqueue_script('greentech-browser', $uri . '/assets/js/browser.min.js', ['jquery'], null, true);
    wp_enqueue_script('greentech-breakpoints', $uri . '/assets/js/breakpoints.min.js', ['jquery'], null, true);
    wp_enqueue_script('greentech-util', $uri . '/assets/js/util.js', ['jquery'], null, true);
    wp_enqueue_script(
        'greentech-main-js',
        $uri . '/assets/js/main.js',
        ['jquery', 'greentech-browser', 'greentech-breakpoints', 'greentech-util'],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'greentech_scripts');



/**
 * Customizer — About Section
 *
 * Hiermee krijgt de gebruiker een instelling in de WordPress Customizer,
 * zodat de "About" tekst in de sidebar bewerkbaar is vanuit het admin-gedeelte.
 *
 * De instelling bestaat uit:
 * - Een sectie ('About Section')
 * - Een instelbare tekstwaarde (textarea)
 * - Een control om deze tekst te bewerken
 */
function greentech_customize_register($wp_customize) {
    $wp_customize->add_section('greentech_about_section', [
        'title'    => __('About Section', 'greentech'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('greentech_about_text', [
        'default'   => 'Voer hier jouw About-tekst in.',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('greentech_about_text_control', [
        'label'    => __('About tekst', 'greentech'),
        'section'  => 'greentech_about_section',
        'settings' => 'greentech_about_text',
        'type'     => 'textarea',
    ]);
}
add_action('customize_register', 'greentech_customize_register');



/**
 * Register Sidebar
 *
 * Registreert een widget area voor de sidebar.
 *
 * De markup (before/after_widget & before/after_title)
 * bepaalt hoe widgets binnen de sidebar worden weergegeven.
 */
function greentech_register_sidebars() {
    register_sidebar([
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'greentech_register_sidebars');

