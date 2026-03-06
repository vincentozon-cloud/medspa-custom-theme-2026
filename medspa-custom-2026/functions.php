<?php
/**
 * MedSpa Custom 2026 Functions and Definitions
 * * @package medspa-custom
 */

if ( ! function_exists( 'medspa_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function medspa_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register Primary Navigation Menu
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'medspa-custom' ),
        ) );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'medspa_setup' );

/**
 * Enqueue scripts and styles.
 * This is the Senior way: we load our main style.css and any future JS here.
 */
function medspa_scripts() {
    wp_enqueue_style( 'medspa-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'medspa_scripts' );

/**
 * SECURITY: Remove WordPress Version Number
 * This prevents hackers from knowing your version via the site source.
 */
remove_action('wp_head', 'wp_generator');

/**
 * Register Custom Post Type: Services
 * This shows you can architect custom data structures.
 */
function medspa_register_services() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'add_new'            => 'Add New Service',
        'add_new_item'       => 'Add New MedSpa Service',
        'edit_item'          => 'Edit Service',
        'all_items'          => 'All Services',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-heart', // A medical/spa icon
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true, // Essential for modern Gutenberg/Block support
    );

    register_post_type( 'services', $args );
}
add_action( 'init', 'medspa_register_services' );