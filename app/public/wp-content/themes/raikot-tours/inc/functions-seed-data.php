<?php
/**
 * Seed Tours & Treks into Database with Featured Images
 *
 * @package Raikot_Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Seed data function
 */
function raikot_tours_seed_data_with_images() {
	$tours = array(
		array(
			'title'      => 'Hunza Valley 7-Day Tour',
			'content'    => 'Explore the breathtaking Hunza Valley, known for the longevity of its inhabitants. Visit ancient Altit & Baltit Forts, pristine lakes, and vibrant local culture. Experience warm hospitality and taste organic apricots. Hike through terraced gardens and enjoy panoramic views of Rakaposhi (7,788m).',
			'image'      => 'IMG_2559.jpg',
			'price'      => '$850',
			'duration'   => '7',
			'difficulty' => 'Easy',
			'location'   => 'Hunza Valley, Gilgit-Baltistan',
		),
		array(
			'title'      => 'Fairy Meadows Trek to Nanga Parbat Base Camp',
			'content'    => 'Hike to the base camp of Nanga Parbat (8,126m), the 9th highest mountain in the world. Trek through pristine alpine meadows with wooden cabin accommodations. Experience raw Himalayan beauty and enjoy 360-degree mountain panoramas. Moderate trek combining scenic beauty with achievable altitude.',
			'image'      => 'IMG_1983.jpg',
			'price'      => '$750',
			'duration'   => '5',
			'difficulty' => 'Moderate',
			'location'   => 'Nanga Parbat, Gilgit-Baltistan',
		),
		array(
			'title'      => 'Skardu & Shangrila 6-Day Tour',
			'content'    => 'Visit the heart of Baltistan and explore stunning alpine lakes. Discover Shangrila Resort with turquoise waters, Upper Kachura Lake\'s pristine beauty, and Deosai National Park (4,272m). Experience traditional Balti culture and cuisine. Perfect for photography enthusiasts and nature lovers.',
			'image'      => 'IMG_3787.jpg',
			'price'      => '$850',
			'duration'   => '6',
			'difficulty' => 'Easy',
			'location'   => 'Skardu, Gilgit-Baltistan',
		),
		array(
			'title'      => 'Rakaposhi Base Camp Trek',
			'content'    => 'Trek to the base camp of Rakaposhi (7,788m), the highest peak visible from a main road. Navigate through alpine meadows with wildflowers and witness glacier formations. Moderate trek offering stunning views and excellent acclimatization. Best for experienced hikers seeking remote mountain experiences.',
			'image'      => 'IMG_1591.jpg',
			'price'      => '$600',
			'duration'   => '4',
			'difficulty' => 'Moderate',
			'location'   => 'Rakaposhi, Hunza Valley',
		),
		array(
			'title'      => 'Rush Lake Trek',
			'content'    => 'Discover the hidden alpine lake surrounded by pristine meadows and turquoise waters. Short yet spectacular trek with panoramic mountain views and wildflower blooms (June-July). Perfect for wildlife enthusiasts and birdwatchers. Untouched natural beauty awaits at every turn.',
			'image'      => 'IMG_2196.jpg',
			'price'      => '$400',
			'duration'   => '2-3',
			'difficulty' => 'Easy',
			'location'   => 'Northern Valleys, Gilgit-Baltistan',
		),
		array(
			'title'      => 'Rupal Base Camp Trek',
			'content'    => 'Trek via the legendary Rupal side featuring the world\'s highest mountain wall (4,600m vertical rise). Challenging trek requiring mountaineering experience and expert guides. Nanga Parbat views from 4,000m+ altitude provide breathtaking vistas. Only for serious mountaineers and experienced trekkers.',
			'image'      => 'IMG_3524.jpg',
			'price'      => '$650',
			'duration'   => '5',
			'difficulty' => 'Challenging',
			'location'   => 'Nanga Parbat, Rupal Valley',
		),
	);

	foreach ( $tours as $tour ) {
		$existing = get_page_by_title( $tour['title'], OBJECT, 'tour' );
		if ( ! $existing ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $tour['title'],
				'post_content' => $tour['content'],
				'post_type'    => 'tour',
				'post_status'  => 'publish',
			) );

			if ( $post_id ) {
				// Add meta
				update_post_meta( $post_id, '_tour_price', $tour['price'] );
				update_post_meta( $post_id, '_tour_duration', $tour['duration'] );
				update_post_meta( $post_id, '_tour_difficulty', $tour['difficulty'] );
				update_post_meta( $post_id, '_tour_location', $tour['location'] );

				// Attach featured image
				raikot_tours_attach_image( $post_id, $tour['image'] );
			}
		}
	}
}

/**
 * Attach image to post
 */
function raikot_tours_attach_image( $post_id, $image_filename ) {
	$upload_dir = wp_upload_dir();
	$image_path = $upload_dir['basedir'] . '/2026/03/' . $image_filename;

	if ( ! file_exists( $image_path ) ) {
		return false;
	}

	$filetype = wp_check_filetype( $image_path );
	$attachment = array(
		'post_mime_type' => $filetype['type'],
		'post_title'     => sanitize_file_name( $image_filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',
	);

	$attach_id = wp_insert_attachment( $attachment, $image_path, $post_id );

	if ( ! is_wp_error( $attach_id ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $image_path );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $post_id, $attach_id );
		return true;
	}

	return false;
}
