<?php
/**
 * The template for displaying all single tours
 *
 * @package Raikot_Tours
 */

get_header();

while ( have_posts() ) :
    the_post();
    $price = get_post_meta( get_the_ID(), '_tour_price', true );
    $duration = get_post_meta( get_the_ID(), '_tour_duration', true );
    $difficulty = get_post_meta( get_the_ID(), '_tour_difficulty', true );
    $location = get_post_meta( get_the_ID(), '_tour_location', true );
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="tour-hero relative overflow-hidden min-h-screen flex items-center justify-center py-24">
            <?php
            if ( has_post_thumbnail() ) :
                $hero_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            ?>
                <div class="absolute inset-0 z-0">
                    <img src="<?php echo esc_url( $hero_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black/60"></div>
                </div>
            <?php else : ?>
                <div class="absolute inset-0 z-0 bg-gradient-to-br from-[#1a2e44] via-[#0f172a] to-[#1a2e44]"></div>
            <?php endif; ?>

            <div class="container mx-auto px-4 relative z-10 text-center" data-aos="zoom-out">
                <div class="tour-meta-top flex justify-center gap-4 text-xs text-[#d4af37] uppercase tracking-widest mb-6" data-aos="fade-up">
                    <span><?php echo esc_html( $location ); ?></span>
                    <span>&bull;</span>
                    <span><?php echo esc_html( $duration ); ?> <?php _e( 'Days', 'raikot-tours' ); ?></span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8 leading-tight" data-aos="fade-up" data-aos-delay="100"><?php the_title(); ?></h1>
                <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="backdrop-blur-xl bg-white/10 border border-white/20 px-8 py-6 flex items-center gap-8 rounded-2xl">
                        <div class="text-left border-r border-white/20 pr-8">
                            <span class="text-xs text-gray-300 block uppercase"><?php _e( 'Price From', 'raikot-tours' ); ?></span>
                            <span class="text-3xl font-bold text-[#d4af37]"><?php echo esc_html( $price ); ?></span>
                        </div>
                        <div class="text-left">
                            <span class="text-xs text-gray-300 block uppercase"><?php _e( 'Difficulty', 'raikot-tours' ); ?></span>
                            <span class="text-xl font-bold text-white"><?php echo esc_html( $difficulty ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-20">
            <div class="flex flex-col lg:flex-row gap-16">
                <div class="lg:w-2/3">
                    <div class="tour-content prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-[#1a2e44] prose-a:text-[#d4af37] prose-a:font-bold prose-strong:text-[#1a2e44] prose-img:rounded-lg prose-img:shadow-xl prose-img:w-full prose-table:w-full mb-16">
                        <?php the_content(); ?>
                    </div>
                </div>

                <aside class="lg:w-1/3">
                    <div class="sticky top-20 space-y-8">
                        <div class="backdrop-blur-xl bg-white/5 border border-white/10 p-10 rounded-2xl" data-aos="fade-left">
                            <h3 class="text-2xl font-bold mb-6 text-white flex items-center gap-3">
                                <i class="fas fa-calendar-alt text-[#d4af37]"></i>
                                <?php _e( 'Book This Tour', 'raikot-tours' ); ?>
                            </h3>
                            <p class="text-gray-300 mb-8 leading-relaxed">
                                <?php _e( 'Secure your spot on this adventure. Fill out the form and our team will contact you within 24 hours.', 'raikot-tours' ); ?>
                            </p>
                            <a href="<?php echo esc_url( home_url( '/contact?tour=' . urlencode( get_the_title() ) ) ); ?>" class="block bg-gradient-to-r from-[#d4af37] via-[#f7ef8a] to-[#aa8913] hover:from-[#e6c555] hover:via-[#f9f3a6] hover:to-[#c49926] text-[#1a2e44] w-full text-center py-4 uppercase tracking-widest font-bold rounded-lg transition-all duration-300 shadow-xl">
                                <i class="fas fa-arrow-right mr-2"></i> <?php _e( 'Inquire Now', 'raikot-tours' ); ?>
                            </a>
                        </div>

                        <div class="backdrop-blur-xl bg-white/5 border border-white/10 p-10 rounded-2xl" data-aos="fade-left" data-aos-delay="100">
                            <h3 class="text-xl font-bold mb-8 text-white flex items-center gap-3">
                                <i class="fas fa-check-circle text-[#d4af37]"></i>
                                <?php _e( 'Tour Highlights', 'raikot-tours' ); ?>
                            </h3>
                            <ul class="space-y-5 text-sm text-gray-200">
                                <li class="flex items-start gap-4">
                                    <i class="fas fa-check text-[#d4af37] text-lg mt-1 flex-shrink-0"></i>
                                    <span><?php _e( 'Professional English-speaking guides', 'raikot-tours' ); ?></span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <i class="fas fa-check text-[#d4af37] text-lg mt-1 flex-shrink-0"></i>
                                    <span><?php _e( 'All transportation included', 'raikot-tours' ); ?></span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <i class="fas fa-check text-[#d4af37] text-lg mt-1 flex-shrink-0"></i>
                                    <span><?php _e( 'High-quality camping equipment', 'raikot-tours' ); ?></span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <i class="fas fa-check text-[#d4af37] text-lg mt-1 flex-shrink-0"></i>
                                    <span><?php _e( 'First aid and emergency support', 'raikot-tours' ); ?></span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <i class="fas fa-check text-[#d4af37] text-lg mt-1 flex-shrink-0"></i>
                                    <span><?php _e( 'Meals & accommodation included', 'raikot-tours' ); ?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="backdrop-blur-xl bg-[#d4af37]/10 border border-[#d4af37]/20 p-10 rounded-2xl" data-aos="fade-left" data-aos-delay="200">
                            <h4 class="text-lg font-bold mb-6 text-[#d4af37] flex items-center gap-3">
                                <i class="fas fa-phone-alt"></i>
                                <?php _e( 'Need Help?', 'raikot-tours' ); ?>
                            </h4>
                            <div class="space-y-4">
                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', get_theme_mod( 'raikot_tours_phone', '+92 314 7633193' ) ) ); ?>" class="flex items-center gap-3 text-white hover:text-[#d4af37] transition-colors">
                                    <i class="fas fa-phone text-[#d4af37]"></i>
                                    <span><?php echo esc_html( get_theme_mod( 'raikot_tours_phone', '+92 314 7633193' ) ); ?></span>
                                </a>
                                <a href="mailto:<?php echo esc_attr( get_theme_mod( 'raikot_tours_email', 'info@raikottours.pk' ) ); ?>" class="flex items-center gap-3 text-white hover:text-[#d4af37] transition-colors">
                                    <i class="fas fa-envelope text-[#d4af37]"></i>
                                    <span><?php echo esc_html( get_theme_mod( 'raikot_tours_email', 'info@raikottours.pk' ) ); ?></span>
                                </a>
                                <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_whatsapp', 'https://wa.me/923147633193' ) ); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-white hover:text-[#d4af37] transition-colors">
                                    <i class="fab fa-whatsapp text-[#d4af37]"></i>
                                    <span><?php _e( 'WhatsApp Us', 'raikot-tours' ); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </article>

    <?php
endwhile;

get_footer();
