<?php
/**
 * Theme setup
 * Auteur: Daan Reuvers
 */

function chase_custom_theme_setup() {

    // Menu ondersteuning
    register_nav_menus(array(
        'primary' => __('Hoofdmenu', 'chase-custom')
    ));

    // Featured images
    add_theme_support('post-thumbnails');

    // Titel in <title>
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'chase_custom_theme_setup');


/**
 * Styles en scripts laden
 */
function chase_custom_assets() {

    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style('featherlight-css', get_template_directory_uri() . '/assets/css/featherlight.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'featherlight-js',
        get_template_directory_uri() . '/assets/js/featherlight.min.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'chase_custom_assets');


/**
 * Sidebar / widget area
 */
function chase_custom_widgets() {

    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'chase_custom_widgets');
