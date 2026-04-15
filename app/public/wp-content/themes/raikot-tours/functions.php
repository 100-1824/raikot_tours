<?php
/**
 * Raikot Tours functions and definitions
 *
 * @package Raikot_Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function raikot_tours_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus( array(
		'primary'       => esc_html__( 'Primary Menu', 'raikot-tours' ),
		'mobile-menu'   => esc_html__( 'Mobile Menu', 'raikot-tours' ),
		'footer'        => esc_html__( 'Footer Menu', 'raikot-tours' ),
	) );
}
add_action( 'after_setup_theme', 'raikot_tours_setup' );

/**
 * Brand Configuration
 */
function raikot_tours_get_brand_config() {
	return array(
		'phone'     => '+92 300 1460649',
		'email'     => get_theme_mod( 'raikot_tours_email', 'info@raikottours.pk' ),
		'whatsapp'  => get_theme_mod( 'raikot_tours_whatsapp', 'https://wa.me/923001460649' ),
		'facebook'  => get_theme_mod( 'raikot_tours_facebook', 'https://facebook.com/raikottours' ),
		'instagram' => get_theme_mod( 'raikot_tours_instagram', 'https://instagram.com/raikottours' ),
	);
}

/**
 * Enqueue scripts and styles
 */
function raikot_tours_scripts() {
	// Google Fonts (Playfair Display + Inter)
	wp_enqueue_style(
		'raikot-tours-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	// FontAwesome 6 (all styles)
	wp_enqueue_style(
		'font-awesome-6',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);

	// AOS (Animate On Scroll)
	wp_enqueue_style(
		'aos-css',
		'https://unpkg.com/aos@2.3.1/dist/aos.css',
		array(),
		'2.3.1'
	);
	wp_enqueue_script(
		'aos-js',
		'https://unpkg.com/aos@2.3.1/dist/aos.js',
		array(),
		'2.3.1',
		true
	);

	// Swiper CSS
	wp_enqueue_style(
		'swiper-css',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
		array(),
		'11.0.0'
	);

	// Main Stylesheet
	wp_enqueue_style(
		'raikot-tours-style',
		get_stylesheet_uri(),
		array(),
		'1.1.0'
	);

	// Cluster Carousel CSS
	wp_enqueue_style(
		'cluster-carousel-css',
		get_template_directory_uri() . '/css/cluster-carousel.css',
		array(),
		'1.0.0'
	);

	// Swiper JS
	wp_enqueue_script(
		'swiper-js',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
		array(),
		'11.0.0',
		true
	);

	// Typed.js
	wp_enqueue_script(
		'typed-js',
		'https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js',
		array(),
		'2.1.0',
		true
	);

	// Custom JS
	wp_enqueue_script(
		'raikot-tours-main',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery', 'typed-js', 'swiper-js' ),
		'1.1.0',
		true
	);

	// Cluster Carousel JS
	wp_enqueue_script(
		'cluster-carousel-js',
		get_template_directory_uri() . '/js/cluster-carousel.js',
		array(),
		'1.0.0',
		true
	);

	// Form validation
	wp_enqueue_script(
		'raikot-tours-form-validation',
		get_template_directory_uri() . '/js/form-validation.js',
		array(),
		'1.0.0',
		true
	);

	// Google Analytics (if site ID is set)
	$ga_id = get_theme_mod( 'raikot_tours_ga_id' );
	if ( ! is_admin() && $ga_id ) {
		wp_enqueue_script(
			'google-analytics',
			'https://www.googletagmanager.com/gtag/js?id=' . esc_attr( $ga_id ),
			array(),
			null,
			false
		);
		wp_add_inline_script(
			'google-analytics',
			"window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '" . esc_js( $ga_id ) . "');"
		);
	}


}
add_action( 'wp_enqueue_scripts', 'raikot_tours_scripts' );

/**
 * Register Custom Post Types
 */
function raikot_tours_register_cpts() {
	// Tour Post Type
	register_post_type( 'tour', array(
		'labels'      => array(
			'name'          => __( 'Tours', 'raikot-tours' ),
			'singular_name' => __( 'Tour', 'raikot-tours' ),
		),
		'public'      => true,
		'has_archive' => true,
		'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'rewrite'     => array( 'slug' => 'our-tours' ),
		'menu_icon'   => 'dashicons-palmtree',
	) );

	// Testimonial Post Type
	register_post_type( 'testimonial', array(
		'labels'      => array(
			'name'          => __( 'Testimonials', 'raikot-tours' ),
			'singular_name' => __( 'Testimonial', 'raikot-tours' ),
		),
		'public'      => true,
		'has_archive' => false,
		'supports'    => array( 'title', 'editor', 'thumbnail' ),
		'menu_icon'   => 'dashicons-testimonial',
	) );
}
add_action( 'init', 'raikot_tours_register_cpts' );

/**
 * Custom Meta Boxes (Native)
 */
function raikot_tours_add_meta_boxes() {
	add_meta_box( 'tour_details', __( 'Tour Details', 'raikot-tours' ), 'raikot_tours_tour_meta_callback', 'tour', 'normal', 'high' );
	add_meta_box( 'testimonial_details', __( 'Testimonial Details', 'raikot-tours' ), 'raikot_tours_testimonial_meta_callback', 'testimonial', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'raikot_tours_add_meta_boxes' );

function raikot_tours_tour_meta_callback( $post ) {
	wp_nonce_field( 'raikot_tours_tour_meta_nonce', 'raikot_tours_tour_meta_nonce_field' );
	$price = get_post_meta( $post->ID, '_tour_price', true );
	$duration = get_post_meta( $post->ID, '_tour_duration', true );
	$difficulty = get_post_meta( $post->ID, '_tour_difficulty', true );
	$location = get_post_meta( $post->ID, '_tour_location', true );
	?>
	<p>
		<label for="tour_price"><?php _e( 'Price (e.g. $500)', 'raikot-tours' ); ?></label>
		<input type="text" id="tour_price" name="tour_price" value="<?php echo esc_attr( $price ); ?>" class="widefat">
	</p>
	<p>
		<label for="tour_duration"><?php _e( 'Duration (days)', 'raikot-tours' ); ?></label>
		<input type="text" id="tour_duration" name="tour_duration" value="<?php echo esc_attr( $duration ); ?>" class="widefat">
	</p>
	<p>
		<label for="tour_difficulty"><?php _e( 'Difficulty Level', 'raikot-tours' ); ?></label>
		<select id="tour_difficulty" name="tour_difficulty" class="widefat">
			<option value="Easy" <?php selected( $difficulty, 'Easy' ); ?>>Easy</option>
			<option value="Moderate" <?php selected( $difficulty, 'Moderate' ); ?>>Moderate</option>
			<option value="Challenging" <?php selected( $difficulty, 'Challenging' ); ?>>Challenging</option>
			<option value="Expert" <?php selected( $difficulty, 'Expert' ); ?>>Expert</option>
		</select>
	</p>
	<p>
		<label for="tour_location"><?php _e( 'Location', 'raikot-tours' ); ?></label>
		<input type="text" id="tour_location" name="tour_location" value="<?php echo esc_attr( $location ); ?>" class="widefat">
	</p>
	<?php
}

function raikot_tours_testimonial_meta_callback( $post ) {
	wp_nonce_field( 'raikot_tours_testimonial_meta_nonce', 'raikot_tours_testimonial_meta_nonce_field' );
	$rating = get_post_meta( $post->ID, '_testimonial_rating', true );
	$designation = get_post_meta( $post->ID, '_testimonial_designation', true );
	?>
	<p>
		<label for="testimonial_rating"><?php _e( 'Star Rating (1-5)', 'raikot-tours' ); ?></label>
		<input type="number" id="testimonial_rating" name="testimonial_rating" value="<?php echo esc_attr( $rating ); ?>" min="1" max="5" class="widefat">
	</p>
	<p>
		<label for="testimonial_designation"><?php _e( 'Client Designation/Location', 'raikot-tours' ); ?></label>
		<input type="text" id="testimonial_designation" name="testimonial_designation" value="<?php echo esc_attr( $designation ); ?>" class="widefat">
	</p>
	<?php
}

/**
 * Save Meta Box Data
 */
function raikot_tours_save_meta_data( $post_id ) {
	// Check if user has permission
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Tour Meta
	if ( isset( $_POST['raikot_tours_tour_meta_nonce_field'] ) && wp_verify_nonce( $_POST['raikot_tours_tour_meta_nonce_field'], 'raikot_tours_tour_meta_nonce' ) ) {
		if ( isset( $_POST['tour_price'] ) ) update_post_meta( $post_id, '_tour_price', sanitize_text_field( $_POST['tour_price'] ) );
		if ( isset( $_POST['tour_duration'] ) ) update_post_meta( $post_id, '_tour_duration', sanitize_text_field( $_POST['tour_duration'] ) );
		if ( isset( $_POST['tour_difficulty'] ) ) update_post_meta( $post_id, '_tour_difficulty', sanitize_text_field( $_POST['tour_difficulty'] ) );
		if ( isset( $_POST['tour_location'] ) ) update_post_meta( $post_id, '_tour_location', sanitize_text_field( $_POST['tour_location'] ) );
	}

	// Testimonial Meta
	if ( isset( $_POST['raikot_tours_testimonial_meta_nonce_field'] ) && wp_verify_nonce( $_POST['raikot_tours_testimonial_meta_nonce_field'], 'raikot_tours_testimonial_meta_nonce' ) ) {
		if ( isset( $_POST['testimonial_rating'] ) ) update_post_meta( $post_id, '_testimonial_rating', sanitize_text_field( $_POST['testimonial_rating'] ) );
		if ( isset( $_POST['testimonial_designation'] ) ) update_post_meta( $post_id, '_testimonial_designation', sanitize_text_field( $_POST['testimonial_designation'] ) );
	}
}
add_action( 'save_post', 'raikot_tours_save_meta_data' );

/**
 * Customizer Options
 */
function raikot_tours_customize_register( $wp_customize ) {
	// Contact Information Section
	$wp_customize->add_section( 'raikot_tours_contact', array(
		'title'    => __( 'Contact Information', 'raikot-tours' ),
		'priority' => 25,
	) );

	// Phone
	$wp_customize->add_setting( 'raikot_tours_phone', array(
		'default'           => '+92 300 1460649',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'raikot_tours_phone', array(
		'label'       => __( 'Phone Number', 'raikot-tours' ),
		'section'     => 'raikot_tours_contact',
		'type'        => 'text',
		'description' => __( 'Your primary contact phone number', 'raikot-tours' ),
	) );

	// Email
	$wp_customize->add_setting( 'raikot_tours_email', array(
		'default'           => 'info@raikottours.pk',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'raikot_tours_email', array(
		'label'       => __( 'Email Address', 'raikot-tours' ),
		'section'     => 'raikot_tours_contact',
		'type'        => 'email',
		'description' => __( 'Primary contact email for inquiries', 'raikot-tours' ),
	) );

	// Social Links Section
	$wp_customize->add_section( 'raikot_tours_social', array(
		'title'    => __( 'Social Links', 'raikot-tours' ),
		'priority' => 26,
	) );

	// Facebook
	$wp_customize->add_setting( 'raikot_tours_facebook', array(
		'default'           => 'https://facebook.com/raikottours',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'raikot_tours_facebook', array(
		'label'   => __( 'Facebook URL', 'raikot-tours' ),
		'section' => 'raikot_tours_social',
		'type'    => 'url',
	) );

	// Instagram
	$wp_customize->add_setting( 'raikot_tours_instagram', array(
		'default'           => 'https://instagram.com/raikottours',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'raikot_tours_instagram', array(
		'label'   => __( 'Instagram URL', 'raikot-tours' ),
		'section' => 'raikot_tours_social',
		'type'    => 'url',
	) );

	// WhatsApp
	$wp_customize->add_setting( 'raikot_tours_whatsapp', array(
		'default'           => 'https://wa.me/923147633193',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'raikot_tours_whatsapp', array(
		'label'       => __( 'WhatsApp URL', 'raikot-tours' ),
		'section'     => 'raikot_tours_social',
		'type'        => 'url',
		'description' => __( 'Format: https://wa.me/92XXXXXXXXXX', 'raikot-tours' ),
	) );

	// Hero Section Settings
	$wp_customize->add_section( 'raikot_tours_hero', array(
		'title'    => __( 'Hero Section', 'raikot-tours' ),
		'priority' => 27,
	) );

	// Hero Tagline
	$wp_customize->add_setting( 'raikot_tours_hero_tagline', array(
		'default'           => 'Experience the Majesty of the Himalayas',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'raikot_tours_hero_tagline', array(
		'label'   => __( 'Hero Tagline', 'raikot-tours' ),
		'section' => 'raikot_tours_hero',
		'type'    => 'text',
	) );

	// SEO Section Settings
	$wp_customize->add_section( 'raikot_tours_seo', array(
		'title'    => __( 'SEO & Analytics', 'raikot-tours' ),
		'priority' => 28,
	) );

	// Google Analytics ID
	$wp_customize->add_setting( 'raikot_tours_ga_id', array(
		'default'           => 'G-XXXXXXXXXX',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'raikot_tours_ga_id', array(
		'label'       => __( 'Google Analytics ID', 'raikot-tours' ),
		'section'     => 'raikot_tours_seo',
		'type'        => 'text',
		'description' => __( 'Enter your GA4 Measurement ID (format: G-XXXXXXX)', 'raikot-tours' ),
	) );
}
add_action( 'customize_register', 'raikot_tours_customize_register' );

/**
 * Contact Form Handler
 */
function raikot_tours_handle_contact_form() {
	if ( ! isset( $_POST['raikot_contact_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['raikot_contact_nonce'], 'raikot_contact_form' ) ) {
		wp_die( __( 'Security check failed.', 'raikot-tours' ) );
	}

	$name    = sanitize_text_field( $_POST['full_name'] ?? '' );
	$email   = sanitize_email( $_POST['email'] ?? '' );
	$subject = sanitize_text_field( $_POST['subject'] ?? 'New Contact Form Submission' );
	$message = sanitize_textarea_field( $_POST['message'] ?? '' );

	if ( empty( $name ) || empty( $email ) || empty( $message ) ) return;

	$to      = get_theme_mod( 'raikot_tours_email', get_option( 'admin_email' ) );
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'From: ' . $name . ' <' . $email . '>',
		'Reply-To: ' . $email,
	);

	$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

	wp_mail( $to, $subject, $body, $headers );

	wp_redirect( add_query_arg( 'sent', '1', wp_get_referer() ) );
	exit;
}
add_action( 'admin_post_nopriv_raikot_contact', 'raikot_tours_handle_contact_form' );
add_action( 'admin_post_raikot_contact', 'raikot_tours_handle_contact_form' );

/**
 * Seed data logic
 */
require_once get_template_directory() . '/inc/functions-seed-data.php';
add_action( 'after_switch_theme', 'raikot_tours_seed_data_with_images' );
