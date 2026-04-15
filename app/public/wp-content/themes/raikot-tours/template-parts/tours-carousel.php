<?php
/**
 * Template part for displaying the tours carousel with migrated data
 *
 * @package Raikot_Tours
 */

// Helper function to keep code clean
if ( ! function_exists( 'render_tour_card' ) ) :
function render_tour_card($tour) {
    $fallback_image = get_template_directory_uri() . '/assets/img/carousel/alpine-meadows.jpg';
    $tour_image     = ! empty( $tour['image'] ) ? esc_url( $tour['image'] ) : esc_url( $fallback_image );
    ?>
    <article class="editorial-card group relative h-[600px] flex flex-col bg-alpen-muted rounded-[3rem] overflow-hidden transition-all duration-700 hover:shadow-luxury-hover" 
             data-tilt data-tilt-max="2" data-tilt-speed="1000">
        
        <!-- Image with Editorial Mask -->
        <div class="relative h-[65%] w-full overflow-hidden">
            <img src="<?php echo $tour_image; ?>" 
                 alt="<?php echo esc_attr($tour['title']); ?>" 
                 class="absolute inset-0 w-full h-full object-cover grayscale-[0.2] transition-all duration-[2s] ease-out group-hover:scale-110 group-hover:grayscale-0">
            
            <!-- Atmospheric Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-alpen-bg-dark/80 via-transparent to-transparent z-10 transition-opacity duration-700 opacity-60 group-hover:opacity-40"></div>
            
            <!-- Type-First Badge -->
            <div class="absolute top-8 left-8 z-20 flex flex-col items-start gap-1">
                <span class="text-[10px] font-black uppercase tracking-[0.4em] text-white/60 mb-2">Expedition Class</span>
                <span class="text-luxury-gold text-xs font-black uppercase tracking-[0.2em] px-4 py-2 bg-white/10 backdrop-blur-md rounded-lg border border-white/10">
                    <?php echo esc_html($tour['difficulty']); ?>
                </span>
            </div>
        </div>

        <!-- Content Area: Tonal Layering (No Lines) -->
        <div class="relative flex-1 bg-white p-10 flex flex-col justify-between z-20 group-hover:bg-alpen-surface transition-colors duration-700">
            <div class="space-y-4">
                <div class="flex items-center gap-4 text-luxury-gold text-[10px] font-black tracking-[0.4em] uppercase">
                    <?php echo esc_html($tour['duration']); ?> <?php esc_html_e('Days', 'raikot-tours'); ?>
                    <span class="w-12 h-[1px] bg-luxury-gold/30"></span>
                </div>
                
                <h3 class="font-playfair text-3xl md:text-4xl font-bold text-primary-color leading-tight transition-transform duration-700 group-hover:-translate-y-1">
                    <?php echo esc_html($tour['title']); ?>
                </h3>
            </div>
            
            <div class="flex items-center justify-between pt-8">
                <div class="flex flex-col">
                    <span class="text-primary-color/40 text-[9px] uppercase tracking-[0.3em] font-black mb-1">Starting Rate</span>
                    <span class="text-2xl font-playfair font-black text-primary-color"><?php echo esc_html($tour['price']); ?></span>
                </div>
                
                <a href="<?php echo esc_url($tour['permalink']); ?>" 
                   class="w-16 h-16 rounded-2xl bg-primary-color flex items-center justify-center text-white transition-all duration-500 hover:bg-luxury-gold hover:rounded-[2rem] hover:scale-105 group/btn">
                    <i class="fas fa-arrow-right text-sm transition-transform duration-500 group-hover/btn:translate-x-1"></i>
                </a>
            </div>
        </div>

        <!-- Float Excerpt -->
        <div class="absolute inset-x-0 top-0 h-[65%] p-10 flex flex-col justify-center translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-1000 z-30 pointer-events-none">
             <p class="text-white text-lg font-playfair italic leading-relaxed text-center drop-shadow-lg">
                "<?php echo esc_html($tour['excerpt']); ?>"
            </p>
        </div>
    </article>
    <?php
}
endif;


// Migrated Tour Data from Karakoram Nomads
$migrated_tours = [
    [
        'title'      => 'Hunza Valley 7-Day Tour',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_2559.jpg' ),
        'price'      => '$850',
        'duration'   => '7',
        'difficulty' => 'Easy',
        'rating'     => '4.9',
        'excerpt'    => 'Explore the breathtaking Hunza Valley with ancient forts and pristine scenery.'
    ],
    [
        'title'      => 'Fairy Meadows Trek to Nanga Parbat Base Camp',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_1983.jpg' ),
        'price'      => '$750',
        'duration'   => '5',
        'difficulty' => 'Moderate',
        'rating'     => '4.8',
        'excerpt'    => 'Hike to the base camp of Nanga Parbat with cozy cabin stays and mountain views.'
    ],
    [
        'title'      => 'Skardu & Shangrila 6-Day Tour',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_3787.jpg' ),
        'price'      => '$850',
        'duration'   => '6',
        'difficulty' => 'Easy',
        'rating'     => '4.7',
        'excerpt'    => 'Visit Baltistan\'s heart, lakes, and the majestic Deosai National Park.'
    ],
    [
        'title'      => 'Rakaposhi Base Camp Trek',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_1591.jpg' ),
        'price'      => '$600',
        'duration'   => '4',
        'difficulty' => 'Moderate',
        'rating'     => '4.8',
        'excerpt'    => 'Trek to Rakaposhi (7,788m), the highest peak visible from a main road.'
    ],
    [
        'title'      => 'Rush Lake Trek',
        'image'      => home_url( '/wp-content/uploads/2026/03/IMG_2196.jpg' ),
        'price'      => '$400',
        'duration'   => '2-3',
        'difficulty' => 'Easy',
        'rating'     => '5.0',
        'excerpt'    => 'Discover the hidden alpine lake with pristine meadows and turquoise waters.'
    ]
];

// Combine WP Query with Migrated Data for maximum reliability
$args = array(
    'post_type'      => 'tour',
    'posts_per_page' => 10,
);
$tours_query = new WP_Query( $args );

if ( $tours_query->have_posts() || !empty($migrated_tours) ) : ?>
    <div class="tours-carousel-container relative px-4 md:px-12">
        <div class="swiper toursSwiper pb-16">
            <div class="swiper-wrapper">
                <?php 
                // 1. Show Dynamic Posts if they exist
                if ( $tours_query->have_posts() ) :
                    $fallback_count = count( $migrated_tours );
                    $post_index     = 0;
                    while ( $tours_query->have_posts() ) : $tours_query->the_post(); 
                        $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        $fallback_image = $fallback_count > 0 ? $migrated_tours[ $post_index % $fallback_count ]['image'] : '';
                        $resolved_image = ! empty( $featured_image ) ? $featured_image : $fallback_image;

                        $tour_data = [
                            'title'      => get_the_title(),
                            'image'      => $resolved_image,
                            'price'      => get_post_meta( get_the_ID(), '_tour_price', true ),
                            'duration'   => get_post_meta( get_the_ID(), '_tour_duration', true ),
                            'difficulty' => get_post_meta( get_the_ID(), '_tour_difficulty', true ),
                            'excerpt'    => get_the_excerpt(),
                            'permalink'  => get_permalink()
                        ];
                        ?>
                        <div class="swiper-slide h-auto">
                            <?php render_tour_card($tour_data); ?>
                        </div>
                        <?php
                        $post_index++;
                    endwhile; 
                    wp_reset_postdata(); 
                endif;

                // 2. Show Migrated Data as fallback/additional
                if ( !$tours_query->have_posts() ) :
                    foreach ($migrated_tours as $tour) {
                        $tour['permalink'] = home_url('/contact?tour=' . urlencode($tour['title']));
                        ?>
                        <div class="swiper-slide h-auto">
                            <?php render_tour_card($tour); ?>
                        </div>
                        <?php
                    }
                endif;
                ?>
            </div>
            
            <!-- Swiper Pagination -->
            <div class="swiper-pagination !-bottom-2"></div>
            
            <!-- Swiper Buttons -->
            <div class="swiper-button-prev !bg-white/80 !text-[#1a2e44] !w-12 !h-12 !rounded-full after:!text-lg shadow-lg hover:!bg-[#d4af37] hover:!text-[#1a2e44] transition-all !hidden md:!flex"></div>
            <div class="swiper-button-next !bg-white/80 !text-[#1a2e44] !w-12 !h-12 !rounded-full after:!text-lg shadow-lg hover:!bg-[#d4af37] hover:!text-[#1a2e44] transition-all !hidden md:!flex"></div>
        </div>
    </div>
<?php endif; 


?>
