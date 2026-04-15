<?php
/**
 * The template for displaying single testimonials
 *
 * @package Raikot_Tours
 */

get_header();

while ( have_posts() ) :
    the_post();
    $rating = get_post_meta( get_the_ID(), '_testimonial_rating', true );
    $designation = get_post_meta( get_the_ID(), '_testimonial_designation', true );
    ?>

    <div class="page-hero bg-[#1a2e44] py-32 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-5xl font-bold text-white mb-4" data-aos="fade-up"><?php _e( 'Client Story', 'raikot-tours' ); ?></h1>
            <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="100"></div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-20">
        <div class="max-w-3xl mx-auto">
            <div class="glass-card p-12 text-center" data-aos="zoom-in">
                <div class="stars mb-8 flex justify-center text-[#d4af37]">
                    <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                        <span class="dashicons <?php echo $i <= $rating ? 'dashicons-star-filled' : 'dashicons-star-empty'; ?> text-3xl"></span>
                    <?php endfor; ?>
                </div>

                <div class="testimonial-content text-2xl italic text-gray-700 mb-12 leading-relaxed">
                    <?php the_content(); ?>
                </div>

                <div class="client-profile flex flex-col items-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="mb-6">
                            <?php the_post_thumbnail( array( 120, 120 ), array( 'class' => 'rounded-full shadow-xl border-4 border-[#d4af37]/20' ) ); ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="text-2xl font-bold mb-2"><?php the_title(); ?></h2>
                    <p class="text-[#d4af37] font-bold uppercase tracking-widest text-sm"><?php echo esc_html( $designation ); ?></p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo esc_url( home_url( '/reviews' ) ); ?>" class="text-[#1a2e44] hover:text-[#d4af37] font-bold transition-colors flex items-center justify-center gap-2">
                    <span class="dashicons dashicons-arrow-left-alt2"></span>
                    <?php _e( 'Back to All Reviews', 'raikot-tours' ); ?>
                </a>
            </div>
        </div>
    </div>

    <?php
endwhile;

get_footer();
