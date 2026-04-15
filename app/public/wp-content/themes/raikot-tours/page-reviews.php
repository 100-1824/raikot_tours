<?php
/**
 * Template Name: Reviews
 *
 * @package Raikot_Tours
 */

get_header();
?>

<div class="page-hero bg-[#1a2e44] py-32 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl font-bold text-white mb-4" data-aos="fade-up"><?php _e( 'Client Reviews', 'raikot-tours' ); ?></h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="100"></div>
    </div>
</div>

<section class="bg-[#1a2e44] py-20">
<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $args = array(
            'post_type'      => 'testimonial',
            'posts_per_page' => -1,
        );
        $reviews_query = new WP_Query( $args );

        if ( $reviews_query->have_posts() ) :
            while ( $reviews_query->have_posts() ) : $reviews_query->the_post();
                $rating = get_post_meta( get_the_ID(), '_testimonial_rating', true );
                $designation = get_post_meta( get_the_ID(), '_testimonial_designation', true );
                ?>
                <div class="glass-card p-10 flex flex-col h-full" data-aos="fade-up">
                    <div class="stars mb-6 flex text-[#d4af37]">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <span class="dashicons <?php echo $i <= $rating ? 'dashicons-star-filled' : 'dashicons-star-empty'; ?>"></span>
                        <?php endfor; ?>
                    </div>
                    
                    <div class="review-content text-gray-300 italic mb-8 flex-grow">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="client-info flex items-center gap-4">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( array( 60, 60 ), array( 'class' => 'rounded-full' ) ); ?>
                        <?php else : ?>
                            <div class="w-12 h-12 bg-[#d4af37]/20 rounded-full flex items-center justify-center">
                                <span class="dashicons dashicons-admin-users text-[#d4af37]"></span>
                            </div>
                        <?php endif; ?>
                        <div>
                            <h4 class="font-bold text-white"><?php the_title(); ?></h4>
                            <p class="text-xs text-gray-400 uppercase tracking-widest"><?php echo esc_html( $designation ); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            // Show Migrated Fallback Data if database is empty
            $migrated_reviews = [
                [
                    'name'        => 'Ewelina',
                    'designation' => 'Poland',
                    'rating'      => 5,
                    'content'     => '"I have never felt so cared for and so safe anywhere else in the world. The guides were incredibly warm and helpful. The hospitality I experienced was genuine — straight from the heart!"'
                ],
                [
                    'name'        => 'Suhaila',
                    'designation' => 'International Traveler',
                    'rating'      => 5,
                    'content'     => '"Everything was superb! The service was truly excellent from start to finish — professional, punctual, and very well organized. The drivers were experienced and careful on mountain roads."'
                ],
                [
                    'name'        => 'Anastasiia',
                    'designation' => 'Ukraine',
                    'rating'      => 5,
                    'content'     => '"Best trip ever! The food, accommodation, bikes — everything was top-notch! I return home with great gratitude and the conviction that Pakistanis are among the most hospitable people I have ever met."'
                ],
                [
                    'name'        => 'Noor Fatima',
                    'designation' => 'Pakistan',
                    'rating'      => 5,
                    'content'     => '"Our family adventure tour to Hunza and Fairy Meadows was perfectly organized, with activities for everyone. We felt safe throughout the trip. Highly recommend!"'
                ],
                [
                    'name'        => '박병규',
                    'designation' => 'South Korea',
                    'rating'      => 5,
                    'content'     => '"I return home with great gratitude and the conviction that Pakistanis are among the most hospitable and kind people I have ever met during my travels. Fully recommend!"'
                ]
            ];

            foreach ( $migrated_reviews as $review ) : ?>
                <div class="glass-card p-10 flex flex-col h-full bg-white rounded-3xl shadow-lg border border-gray-100" data-aos="fade-up">
                    <div class="stars mb-6 flex text-[#d4af37] gap-1">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <i class="fas fa-star text-xs"></i>
                        <?php endfor; ?>
                    </div>
                    
                    <div class="review-content text-gray-600 italic mb-10 flex-grow text-lg leading-relaxed">
                        <?php echo $review['content']; ?>
                    </div>
                    
                    <div class="client-info flex items-center gap-4 border-t border-gray-50 pt-8 mt-auto">
                        <div class="w-14 h-14 bg-[#1a2e44] rounded-full flex items-center justify-center text-white font-bold text-xl shadow-inner">
                            <?php echo substr($review['name'], 0, 1); ?>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1a2e44] text-lg"><?php echo $review['name']; ?></h4>
                            <p class="text-xs text-gray-500 uppercase tracking-[0.2em] font-bold"><?php echo $review['designation']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
        ?>
    </div>
</div>
</section>

<?php
get_footer();
