<?php
/**
 * Carousel Images Configuration
 *
 * Provides dynamic carousel image data with support for WordPress attachments.
 * Easily update images by modifying this file or loading from WordPress post meta.
 *
 * @package Raikot_Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Get carousel images
 *
 * Returns array of images for the cluster carousel.
 * Can be extended to fetch from WordPress media library or custom post types.
 *
 * Image array structure:
 * - id: (optional) WordPress attachment ID
 * - url: Image URL
 * - title: Image title/heading
 * - description: (optional) Short description
 * - link: (optional) Link when image is clicked
 * - position: (optional) Position class for cluster layout (featured, left, right, etc.)
 *
 * @return array Array of carousel image data
 */
function get_carousel_images() {
	// Try to fetch from WordPress custom post type first (if exists)
	$custom_images = apply_filters( 'raikot_carousel_images', array() );

	if ( ! empty( $custom_images ) ) {
		return $custom_images;
	}

	// Fallback: Images from media library or placeholder structure
	// In production, replace with actual image URLs
	$carousel_images = array(
		array(
			'id'          => 1,
			'url'         => get_template_directory_uri() . '/assets/img/carousel/mountain-peak.jpg',
			'title'       => esc_html__( 'Mountain Peaks', 'raikot-tours' ),
			'description' => esc_html__( 'Witness the majestic peaks of the Karakoram range', 'raikot-tours' ),
			'link'        => home_url( '/our-tours' ),
			'position'    => 'featured',
		),
		array(
			'id'          => 2,
			'url'         => get_template_directory_uri() . '/assets/img/carousel/alpine-meadows.jpg',
			'title'       => esc_html__( 'Alpine Meadows', 'raikot-tours' ),
			'description' => esc_html__( 'Explore pristine meadows at breathtaking altitudes', 'raikot-tours' ),
			'link'        => home_url( '/our-tours' ),
			'position'    => 'left',
		),
		array(
			'id'          => 3,
			'url'         => get_template_directory_uri() . '/assets/img/carousel/base-camp.jpg',
			'title'       => esc_html__( 'Base Camp', 'raikot-tours' ),
			'description' => esc_html__( 'Experience luxury camping in remote wilderness', 'raikot-tours' ),
			'link'        => home_url( '/our-tours' ),
			'position'    => 'right',
		),
		array(
			'id'          => 4,
			'url'         => get_template_directory_uri() . '/assets/img/carousel/glacier-valley.jpg',
			'title'       => esc_html__( 'Glacier Valley', 'raikot-tours' ),
			'description' => esc_html__( 'Trek through ancient glacial formations', 'raikot-tours' ),
			'link'        => home_url( '/our-tours' ),
			'position'    => 'featured',
		),
		array(
			'id'          => 5,
			'url'         => get_template_directory_uri() . '/assets/img/carousel/sunset-view.jpg',
			'title'       => esc_html__( 'Golden Sunsets', 'raikot-tours' ),
			'description' => esc_html__( 'Stunning views at the day\'s end', 'raikot-tours' ),
			'link'        => home_url( '/our-tours' ),
			'position'    => 'left',
		),
		array(
			'id'          => 6,
			'url'         => get_template_directory_uri() . '/assets/img/carousel/local-culture.jpg',
			'title'       => esc_html__( 'Local Culture', 'raikot-tours' ),
			'description' => esc_html__( 'Connect with the warm communities along our trails', 'raikot-tours' ),
			'link'        => home_url( '/our-tours' ),
			'position'    => 'right',
		),
	);

	/**
	 * Filter carousel images
	 *
	 * Allows themes and plugins to modify carousel images.
	 *
	 * @param array $carousel_images Array of carousel image data
	 */
	return apply_filters( 'raikot_carousel_images_default', $carousel_images );
}

/**
 * Get carousel images from WordPress media library
 *
 * Fetches images from a designated gallery post meta or custom post type.
 * Useful for allowing admins to manage carousel images from WordPress backend.
 *
 * @param int $post_id Post ID to fetch gallery from (optional)
 * @return array Array of carousel image data
 */
function get_carousel_images_from_media( $post_id = 0 ) {
	if ( $post_id <= 0 ) {
		$post_id = get_the_ID();
	}

	// Try to get from post meta first
	$gallery_ids = get_post_meta( $post_id, '_carousel_gallery_ids', true );

	if ( empty( $gallery_ids ) ) {
		return array();
	}

	$gallery_ids = is_array( $gallery_ids ) ? $gallery_ids : explode( ',', $gallery_ids );
	$images      = array();

	foreach ( $gallery_ids as $attachment_id ) {
		$attachment_id = intval( $attachment_id );
		if ( ! $attachment_id ) {
			continue;
		}

		$image_url = wp_get_attachment_image_url( $attachment_id, 'large' );
		if ( ! $image_url ) {
			continue;
		}

		$images[] = array(
			'id'          => $attachment_id,
			'url'         => $image_url,
			'title'       => get_the_title( $attachment_id ),
			'description' => get_post_meta( $attachment_id, '_carousel_description', true ),
			'link'        => get_post_meta( $attachment_id, '_carousel_link', true ),
			'position'    => get_post_meta( $attachment_id, '_carousel_position', true ),
		);
	}

	return $images;
}

/**
 * Register carousel meta fields
 *
 * Registers custom meta fields for carousel images in WordPress.
 * Allows admins to set descriptions and links per image.
 */
function register_carousel_meta_fields() {
	register_post_meta(
		'attachment',
		'_carousel_description',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
		)
	);

	register_post_meta(
		'attachment',
		'_carousel_link',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
		)
	);

	register_post_meta(
		'attachment',
		'_carousel_position',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
		)
	);

	register_post_meta(
		get_the_ID(),
		'_carousel_gallery_ids',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'array',
		)
	);
}
add_action( 'rest_api_init', 'register_carousel_meta_fields' );
