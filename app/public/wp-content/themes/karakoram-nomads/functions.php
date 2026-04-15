<?php
/**
 * Karakoram Nomads — functions.php
 * Design: Adventure Pakistan | Pages: Karakoram Nomads | Data: Raikot Tours
 */

function kn_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', ['height'=>80,'width'=>240,'flex-height'=>true,'flex-width'=>true]);
    add_theme_support('menus');
    add_theme_support('html5', ['search-form','comment-form','gallery','caption']);
    register_nav_menus(['primary' => 'Primary Menu', 'footer' => 'Footer Menu']);
    add_image_size('tour-card', 600, 400, true);
    add_image_size('dest-card', 800, 600, true);
    add_image_size('hero-full', 1920, 1080, true);
}
add_action('after_setup_theme', 'kn_setup');

function kn_scripts() {
    wp_enqueue_style('kn-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Raleway:wght@400;500;600;700&family=Open+Sans:wght@400;500;600&display=swap',
        [], null);
    wp_enqueue_style('kn-icons',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [], '6.5.0');
    wp_enqueue_style('kn-style', get_stylesheet_uri(), ['kn-fonts','kn-icons'], '1.0.0');
    wp_enqueue_script('kn-main', get_template_directory_uri().'/assets/js/main.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'kn_scripts');

function kn_widgets() {
    register_sidebar(['name'=>'Sidebar','id'=>'sidebar-1',
        'before_widget'=>'<div class="widget %2$s">','after_widget'=>'</div>',
        'before_title'=>'<h4 class="widget-title">','after_title'=>'</h4>']);
}
add_action('widgets_init', 'kn_widgets');

// Custom Post Type: Tours
function kn_cpt() {
    register_post_type('tour', [
        'labels'       => ['name'=>'Tours','singular_name'=>'Tour','add_new_item'=>'Add New Tour','edit_item'=>'Edit Tour','all_items'=>'All Tours'],
        'public'       => true, 'has_archive' => true,
        'menu_icon'    => 'dashicons-location-alt',
        'supports'     => ['title','editor','thumbnail','excerpt','custom-fields'],
        'rewrite'      => ['slug'=>'tours'],
        'show_in_rest' => true,
    ]);
    register_taxonomy('destination', 'tour', [
        'labels'       => ['name'=>'Destinations','singular_name'=>'Destination'],
        'hierarchical' => true, 'public' => true,
        'rewrite'      => ['slug'=>'destination'], 'show_in_rest' => true,
    ]);
}
add_action('init', 'kn_cpt');

// Helpers
function kn_price($id)      { $p = get_post_meta($id,'_tour_price',true); return $p ? '$'.number_format((float)$p,0) : 'Contact Us'; }
function kn_duration($id)   { return get_post_meta($id,'_tour_duration',true) ?: ''; }
function kn_difficulty($id) { return get_post_meta($id,'_tour_difficulty',true) ?: ''; }
function kn_rating($id)     { return get_post_meta($id,'_tour_rating',true) ?: '4.8'; }

add_filter('excerpt_length', fn() => 18);
add_filter('excerpt_more',   fn() => '...');
