<?php
/**
 * The front page template file
 *
 * @package Raikot_Tours
 */

get_header();
?>

<!-- Hero Section -->
<?php get_template_part( 'template-parts/hero-section' ); ?>

<!-- Featured Sections -->
<section class="featured-tours py-24 bg-white overflow-hidden relative">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-luxury-gold/5 pointer-events-none blur-[150px]"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-end justify-between mb-16" data-aos="fade-up">
            <div class="max-w-2xl">
                <span class="text-luxury-gold font-bold uppercase tracking-[0.4em] text-[11px] mb-6 block"><?php _e( 'Exclusive Collections', 'raikot-tours' ); ?></span>
                <h2 class="font-playfair text-4xl md:text-6xl font-bold mb-8 text-luxury-navy"><?php _e( 'Curated Mountain Journeys', 'raikot-tours' ); ?></h2>
                <div class="w-24 h-[1.5px] bg-luxury-gold mb-8"></div>
            </div>
            <div class="hidden md:block mb-4">
                <a href="<?php echo esc_url( home_url( '/our-tours' ) ); ?>" class="text-luxury-navy font-bold uppercase tracking-[0.2em] text-[13px] border-b-2 border-luxury-gold/30 hover:border-luxury-gold transition-all pb-2">
                    <?php _e( 'Explore All Expeditions', 'raikot-tours' ); ?>
                </a>
            </div>
        </div>
        
        <?php get_template_part( 'template-parts/tours-carousel' ); ?>
        
        <div class="md:hidden text-center mt-16">
            <a href="<?php echo esc_url( home_url( '/our-tours' ) ); ?>" class="btn-gold px-12 py-5 rounded-full">
                <?php _e( 'View All Tours', 'raikot-tours' ); ?>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-xs mb-4 block"><?php _e( 'Community Feedback', 'raikot-tours' ); ?></span>
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-[#1a2e44]"><?php _e( 'What Our Travelers Say', 'raikot-tours' ); ?></h2>
        </div>

        <?php
            // Fetch testimonials from CPT
            $testimonials_query = new WP_Query( array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 3,
            ) );

            // Fallback testimonials
            $fallback_testimonials = array(
                array(
                    'name'        => 'Ewelina',
                    'designation' => 'Poland',
                    'rating'      => 5,
                    'content'     => 'I have never felt so cared for and so safe anywhere else in the world. The guides were incredibly warm and helpful. The hospitality I experienced was genuine — straight from the heart!',
                ),
                array(
                    'name'        => 'Suhaila',
                    'designation' => 'International Traveler',
                    'rating'      => 5,
                    'content'     => 'Everything was superb! The service was truly excellent from start to finish — professional, punctual, and very well organized. The drivers were experienced and careful on mountain roads.',
                ),
                array(
                    'name'        => 'Anastasiia',
                    'designation' => 'Ukraine',
                    'rating'      => 5,
                    'content'     => 'Best trip ever! The food, accommodation, bikes — everything was top-notch! I return home with great gratitude and the conviction that Pakistanis are among the most hospitable people I have ever met.',
                ),
            );
        ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php
            if ( $testimonials_query->have_posts() ) :
                $delay = 0;
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                    $rating      = intval( get_post_meta( get_the_ID(), '_testimonial_rating', true ) ) ?: 5;
                    $designation = get_post_meta( get_the_ID(), '_testimonial_designation', true ) ?: 'Traveler';
                    $initials    = strtoupper( substr( get_the_title(), 0, 1 ) );
                    ?>
                    <div class="p-10 rounded-lg bg-gray-50 border border-gray-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>" data-tilt>
                        <div class="flex text-[#d4af37] gap-1 mb-6 text-sm">
                            <?php for ( $i = 0; $i < $rating; $i++ ) : ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="text-gray-600 italic mb-10 text-lg leading-relaxed">"<?php the_content(); ?>"</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#1a2e44] rounded-full flex items-center justify-center text-white font-bold"><?php echo esc_html( $initials ); ?></div>
                            <div>
                                <h5 class="font-bold text-[#1a2e44]"><?php the_title(); ?></h5>
                                <span class="text-xs text-gray-500 uppercase tracking-widest"><?php echo esc_html( $designation ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $delay += 100;
                endwhile;
                wp_reset_postdata();
            else :
                // Display fallback testimonials
                foreach ( $fallback_testimonials as $index => $testimonial ) :
                    $initials = strtoupper( substr( $testimonial['name'], 0, 1 ) );
                    ?>
                    <div class="p-10 rounded-lg bg-gray-50 border border-gray-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $index * 100 ); ?>" data-tilt>
                        <div class="flex text-[#d4af37] gap-1 mb-6 text-sm">
                            <?php for ( $i = 0; $i < $testimonial['rating']; $i++ ) : ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="text-gray-600 italic mb-10 text-lg leading-relaxed">"<?php echo esc_html( $testimonial['content'] ); ?>"</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#1a2e44] rounded-full flex items-center justify-center text-white font-bold"><?php echo esc_html( $initials ); ?></div>
                            <div>
                                <h5 class="font-bold text-[#1a2e44]"><?php echo esc_html( $testimonial['name'] ); ?></h5>
                                <span class="text-xs text-gray-500 uppercase tracking-widest"><?php echo esc_html( $testimonial['designation'] ); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Premium CTA -->
<section class="cta-section py-24 relative overflow-hidden bg-white">
    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="bg-luxury-navy p-12 md:p-20 rounded-[2.5rem] relative overflow-hidden shadow-luxury" data-aos="zoom-in">
            <!-- Luxury Abstract Background -->
            <div class="absolute inset-0 opacity-20 bg-[url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/mountain-peak.jpg' ); ?>')] bg-cover bg-center mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-luxury-navy via-luxury-navy/80 to-luxury-gold/20"></div>
            
            <div class="relative z-10">
                <span class="text-luxury-gold font-bold uppercase tracking-[0.4em] text-[11px] mb-8 block"><?php _e( 'Your Legacy Begins Here', 'raikot-tours' ); ?></span>
                <h2 class="font-playfair text-4xl md:text-6xl font-bold text-white mb-10 leading-none"><?php _e( 'Elevate Your <br>Perception', 'raikot-tours' ); ?></h2>
                <p class="text-white/60 mb-12 text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed">
                    <?php _e( 'Join an elite circle of travelers who have witnessed the true grandeur of the Pakistan Karakoram.', 'raikot-tours' ); ?>
                </p>
                <div class="flex flex-col md:flex-row items-center justify-center gap-10">
                    <a href="<?php echo esc_url( home_url( '/our-tours' ) ); ?>" class="btn-gold px-10 py-5 text-[14px] uppercase tracking-widest rounded-full">
                        <?php _e( 'Browse Destinations', 'raikot-tours' ); ?>
                    </a>
                    <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_whatsapp', 'https://wa.me/923147633193' ) ); ?>" target="_blank" rel="noopener noreferrer" class="text-white font-bold uppercase tracking-widest text-[14px] flex items-center gap-4 group hover:text-luxury-gold transition-colors">
                        <i class="fab fa-whatsapp text-2xl"></i> <?php _e( 'Instant Concierge', 'raikot-tours' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
