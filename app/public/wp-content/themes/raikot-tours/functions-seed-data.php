<?php
/**
 * Seed Tours & Treks into Database
 * Register this function to run on theme activation
 */

function raikot_tours_seed_tours_and_treks() {
    $tours = array(
        array(
            'post_title'    => 'Hunza Valley 7-Day Tour',
            'post_content'  => 'Explore the breathtaking Hunza Valley, known for the longevity of its inhabitants and stunning mountain views. This 7-day adventure takes you through the heart of Gilgit-Baltistan, showcasing ancient forts, pristine lakes, and vibrant local culture.',
            'post_type'     => 'tour',
            'post_status'   => 'publish',
            'meta_input'    => array(
                '_tour_price'      => '$850',
                '_tour_duration'   => '7 Days',
                '_tour_difficulty' => 'Easy',
                '_tour_location'   => 'Hunza Valley, Gilgit-Baltistan',
            ),
        ),
        array(
            'post_title'    => 'Fairy Meadows Trek to Nanga Parbat Base Camp',
            'post_content'  => 'Hike to the base camp of Nanga Parbat, the 9th highest mountain in the world. This trek takes you through pristine alpine meadows and offers breathtaking views of one of the world\'s most majestic peaks.',
            'post_type'     => 'tour',
            'post_status'   => 'publish',
            'meta_input'    => array(
                '_tour_price'      => '$750',
                '_tour_duration'   => '5 Days',
                '_tour_difficulty' => 'Moderate',
                '_tour_location'   => 'Nanga Parbat, Gilgit-Baltistan',
            ),
        ),
        array(
            'post_title'    => 'Skardu & Shangrila 6-Day Tour',
            'post_content'  => 'Visit the heart of Baltistan and explore the majestic Deosai National Park. This tour includes visits to stunning alpine lakes, traditional Balti villages, and some of the highest plateaus in the world.',
            'post_type'     => 'tour',
            'post_status'   => 'publish',
            'meta_input'    => array(
                '_tour_price'      => '$850',
                '_tour_duration'   => '6 Days',
                '_tour_difficulty' => 'Easy',
                '_tour_location'   => 'Skardu, Gilgit-Baltistan',
            ),
        ),
    );

    $treks = array(
        array(
            'post_title'    => 'Rakaposhi Base Camp Trek',
            'post_content'  => 'Trek to the base camp of Rakaposhi (7,788m), the highest peak visible from a main road in the world. Experience alpine meadows, wildflowers, and glacier viewpoints in this moderate-difficulty trek.',
            'post_type'     => 'tour',
            'post_status'   => 'publish',
            'meta_input'    => array(
                '_tour_price'      => '$600',
                '_tour_duration'   => '4 Days',
                '_tour_difficulty' => 'Moderate',
                '_tour_location'   => 'Rakaposhi, Hunza Valley',
            ),
        ),
        array(
            'post_title'    => 'Rush Lake Trek',
            'post_content'  => 'Discover the hidden alpine lake with pristine meadows and turquoise waters. This short trek offers panoramic mountain views, wildflower blooms, and excellent photography opportunities in a pristine natural setting.',
            'post_type'     => 'tour',
            'post_status'   => 'publish',
            'meta_input'    => array(
                '_tour_price'      => '$400',
                '_tour_duration'   => '2-3 Days',
                '_tour_difficulty' => 'Easy-Moderate',
                '_tour_location'   => 'Northern Valleys, Gilgit-Baltistan',
            ),
        ),
        array(
            'post_title'    => 'Rupal Base Camp Trek',
            'post_content'  => 'Trek to the base camp of Nanga Parbat via the legendary Rupal side, featuring the world\'s highest mountain wall. This challenging trek is suitable only for experienced mountaineers and requires expert guides.',
            'post_type'     => 'tour',
            'post_status'   => 'publish',
            'meta_input'    => array(
                '_tour_price'      => '$650',
                '_tour_duration'   => '5 Days',
                '_tour_difficulty' => 'Challenging',
                '_tour_location'   => 'Nanga Parbat, Rupal Valley',
            ),
        ),
    );

    $all_tours = array_merge( $tours, $treks );

    foreach ( $all_tours as $tour ) {
        // Check if tour already exists
        $existing = get_page_by_title( $tour['post_title'], OBJECT, 'tour' );
        if ( ! $existing ) {
            wp_insert_post( $tour );
        }
    }
}

// Hook into theme activation
add_action( 'after_switch_theme', 'raikot_tours_seed_tours_and_treks' );
