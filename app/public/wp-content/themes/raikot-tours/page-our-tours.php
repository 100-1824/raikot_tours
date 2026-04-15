<?php
/**
 * Template Name: Our Tours
 *
 * @package Raikot_Tours
 */

get_header();

// Migrated Tour Data from Karakoram Nomads
$migrated_tours = [
    [
        'title'      => 'Hunza Valley 7-Day Tour',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_2559.jpg' ),
        'price'      => '$850',
        'duration'   => '7',
        'difficulty' => 'Easy',
        'excerpt'    => 'Explore the breathtaking Hunza Valley, Altit & Baltit Forts, and the shimmering Attabad Lake.'
    ],
    [
        'title'      => 'Fairy Meadows Tour',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_1983.jpg' ),
        'price'      => '$750',
        'duration'   => '5',
        'difficulty' => 'Moderate',
        'excerpt'    => 'Hike to the base camp of Nanga Parbat and stay in cozy wooden cabins with the best mountain views.'
    ],
    [
        'title'      => 'Skardu & Shangrila',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_3787.jpg' ),
        'price'      => '$850',
        'duration'   => '6',
        'difficulty' => 'Easy',
        'excerpt'    => 'Visit the heart of Baltistan, Upper Kachura Lake, and the majestic Deosai National Park.'
    ],
    [
        'title'      => 'Naran Kaghan Valley',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_1591.jpg' ),
        'price'      => '$750',
        'duration'   => '5',
        'difficulty' => 'Easy',
        'excerpt'    => 'A classic journey to Lake Saif-ul-Malook and the lush green meadows of Babusar Top.'
    ],
    [
        'title'      => '9-Days North Pakistan',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_2196.jpg' ),
        'price'      => '$1,200',
        'duration'   => '9',
        'difficulty' => 'Moderate',
        'excerpt'    => 'Our most comprehensive tour covering Hunza, Skardu, and the main highlights of the north.'
    ]
];
?>

<div class="page-hero bg-[#1a2e44] py-20 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up"><?php _e( 'Our Adventure Tours', 'raikot-tours' ); ?></h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="100"></div>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <?php
        $args = array(
            'post_type'      => 'tour',
            'posts_per_page' => -1,
        );
        $tours_query = new WP_Query( $args );

        if ( $tours_query->have_posts() ) :
            while ( $tours_query->have_posts() ) : $tours_query->the_post();
                $tour_data = [
                    'title'      => get_the_title(),
                    'image'      => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                    'price'      => get_post_meta( get_the_ID(), '_tour_price', true ),
                    'duration'   => get_post_meta( get_the_ID(), '_tour_duration', true ),
                    'difficulty' => get_post_meta( get_the_ID(), '_tour_difficulty', true ),
                    'excerpt'    => get_the_excerpt(),
                    'permalink'  => get_permalink()
                ];
                render_full_tour_card($tour_data);
            endwhile;
            wp_reset_postdata();
        else :
            // Show Migrated Data if database is empty
            foreach ($migrated_tours as $tour) {
                $tour['permalink'] = home_url('/contact?tour=' . urlencode($tour['title']));
                render_full_tour_card($tour);
            }
        endif;
        ?>
    </div>
</div>

<?php
/**
 * Render individual tour card
 */
function render_full_tour_card($tour) {
    ?>
    <article class="glass-card overflow-hidden group h-full flex flex-col bg-white rounded-3xl shadow-lg border border-gray-100 transition-all duration-500 hover:shadow-2xl" data-aos="fade-up">
        <div class="relative overflow-hidden h-72">
            <?php if (!empty($tour['image'])) : ?>
                <img src="<?php echo esc_url($tour['image']); ?>" 
                     alt="<?php echo esc_attr($tour['title']); ?>" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-xl text-[#0f172a] font-bold shadow-lg">
                <?php echo esc_html( $tour['price'] ); ?>
            </div>
        </div>

        <div class="p-8 flex-grow flex flex-col">
            <div class="tour-meta flex items-center gap-4 text-[10px] text-[#d4af37] uppercase tracking-[0.2em] font-bold mb-4">
                <span class="flex items-center gap-1">
                    <i class="fas fa-clock"></i>
                    <?php echo esc_html( $tour['duration'] ); ?> <?php _e( 'Days', 'raikot-tours' ); ?>
                </span>
                <span class="w-1 h-1 bg-[#d4af37] rounded-full"></span>
                <span class="flex items-center gap-1">
                    <i class="fas fa-mountain"></i>
                    <?php echo esc_html( $tour['difficulty'] ); ?>
                </span>
            </div>
            <h2 class="text-2xl font-bold mb-4 text-[#1a2e44] group-hover:text-[#d4af37] transition-colors leading-tight">
                <a href="<?php echo esc_url($tour['permalink']); ?>">
                    <?php echo esc_html($tour['title']); ?>
                </a>
            </h2>
            <details class="tour-details-panel mb-6">
                <summary class="tour-details-toggle"><?php _e( 'View tour details', 'raikot-tours' ); ?></summary>
                <div class="tour-details-content">
                    <p><?php echo esc_html( $tour['excerpt'] ); ?></p>
                    <ul>
                        <li><strong><?php _e( 'Duration:', 'raikot-tours' ); ?></strong> <?php echo esc_html( $tour['duration'] ); ?> <?php _e( 'Days', 'raikot-tours' ); ?></li>
                        <li><strong><?php _e( 'Difficulty:', 'raikot-tours' ); ?></strong> <?php echo esc_html( $tour['difficulty'] ); ?></li>
                        <li><strong><?php _e( 'Starting price:', 'raikot-tours' ); ?></strong> <?php echo esc_html( $tour['price'] ); ?></li>
                    </ul>
                </div>
            </details>
            <div class="mt-auto space-y-3">
                <a href="<?php echo esc_url($tour['permalink']); ?>" class="btn-gold w-full text-center py-4 rounded-xl block">
                    <?php _e( 'Learn More', 'raikot-tours' ); ?>
                </a>
                <a href="<?php echo esc_url($tour['permalink']); ?>" class="w-full text-center py-3 rounded-xl block border border-[#1a2e44]/20 text-[#1a2e44] font-bold uppercase tracking-wider text-xs hover:border-[#d4af37] hover:text-[#d4af37] transition-colors">
                    <?php _e( 'View Full Tour Details', 'raikot-tours' ); ?>
                </a>
            </div>
        </div>
    </article>
    <?php
}

get_footer();
?>
