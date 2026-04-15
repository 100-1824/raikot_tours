<?php
/**
 * Cluster-Style Image Carousel Component
 *
 * Displays a premium overlapping image carousel replacing the "Raikot Signature" section.
 * Features smooth swiping, keyboard navigation, and hover effects.
 *
 * @package Raikot_Tours
 */

// Include carousel image data
require_once get_template_directory() . '/inc/carousel-images.php';
$carousel_images = get_carousel_images();
?>

<!-- Cluster Image Carousel Section -->
<section class="cluster-carousel-section py-20 bg-gradient-to-b from-luxury-navy via-luxury-navy to-luxury-navy text-white relative overflow-hidden">
    <!-- Sophisticated Background Pattern -->
    <div class="absolute inset-0 opacity-10 pointer-events-none bg-[url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/pattern-mountain.svg' ); ?>')] bg-repeat"></div>
    <div class="absolute top-0 right-0 w-2/3 h-full bg-luxury-gold/10 -skew-x-12 translate-x-1/2 blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-1/3 h-1/2 bg-white/5 rounded-full blur-[150px]"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->


        <!-- Main Carousel Container -->
        <div class="cluster-carousel" role="region" aria-label="<?php _e( 'Featured tours and landscape images carousel', 'raikot-tours' ); ?>" data-aos="fade-up">

            <!-- Carousel Wrapper with Cluster Layout -->
            <div class="carousel-wrapper">
                <div class="carousel-cluster" role="group" aria-live="polite" aria-atomic="true">
                    <?php
                    if ( ! empty( $carousel_images ) ) :
                        foreach ( $carousel_images as $index => $image ) :
                            $image_id = isset( $image['id'] ) ? intval( $image['id'] ) : 0;
                            $image_url = isset( $image['url'] ) ? esc_url( $image['url'] ) : '';
                            $image_title = isset( $image['title'] ) ? esc_html( $image['title'] ) : sprintf( __( 'Carousel Image %d', 'raikot-tours' ), $index + 1 );
                            $image_description = isset( $image['description'] ) ? esc_html( $image['description'] ) : '';
                            $image_link = isset( $image['link'] ) ? esc_url( $image['link'] ) : '';
                            $position_class = isset( $image['position'] ) ? 'carousel-item--' . esc_attr( $image['position'] ) : '';
                            ?>
                            <?php
                            $figure_role = ! empty( $image_url ) ? 'img' : 'presentation';
                            $figure_aria = ! empty( $image_url ) ? $image_title : '';
                            ?>
                            <figure class="carousel-item <?php echo esc_attr( $position_class ); ?>" data-index="<?php echo esc_attr( $index ); ?>" role="<?php echo esc_attr( $figure_role ); ?>"<?php if ( ! empty( $figure_aria ) ) : ?> aria-label="<?php echo esc_attr( $figure_aria ); ?>"<?php endif; ?>>
                                <!-- Image Container with Lazy Loading -->
                                <div class="carousel-image-container">
                                    <?php if ( ! empty( $image_url ) ) : ?>
                                        <img
                                            src="<?php echo esc_url( add_query_arg( 'w', '800', $image_url ) ); ?>"
                                            alt="<?php echo esc_attr( $image_title ); ?>"
                                            class="carousel-image"
                                            loading="lazy"
                                            <?php if ( $index === 0 ) echo 'fetchpriority="high"'; ?>
                                        >
                                    <?php else : ?>
                                        <div class="carousel-image carousel-image--fallback" aria-hidden="true"></div>
                                    <?php endif; ?>

                                    <!-- Overlay with Title and Description -->
                                    <div class="carousel-overlay">
                                        <div class="carousel-content">
                                            <h3 class="carousel-title font-playfair"><?php echo esc_html( $image_title ); ?></h3>
                                            <?php if ( ! empty( $image_description ) ) : ?>
                                                <p class="carousel-description"><?php echo esc_html( $image_description ); ?></p>
                                            <?php endif; ?>
                                            <?php if ( ! empty( $image_link ) ) : ?>
                                                <a href="<?php echo esc_url( $image_link ); ?>" class="carousel-link" aria-label="<?php echo sprintf( esc_attr__( 'Learn more about %s', 'raikot-tours' ), $image_title ); ?>">
                                                    <?php _e( 'Explore', 'raikot-tours' ); ?> <i class="fas fa-arrow-right ml-2"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Figcaption for Accessibility -->
                                <figcaption class="sr-only">
                                    <?php echo esc_html( $image_title ); ?>
                                    <?php if ( ! empty( $image_description ) ) : ?>
                                        - <?php echo esc_html( $image_description ); ?>
                                    <?php endif; ?>
                                </figcaption>
                            </figure>
                        <?php endforeach;
                    else : ?>
                        <div class="carousel-empty-state text-center py-20">
                            <p class="text-white/60 text-lg"><?php _e( 'Gallery images coming soon', 'raikot-tours' ); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="carousel-controls" role="group" aria-label="<?php _e( 'Carousel navigation controls', 'raikot-tours' ); ?>">
                <!-- Previous Button -->
                <button
                    class="carousel-button carousel-button--prev"
                    aria-label="<?php _e( 'Previous image', 'raikot-tours' ); ?>"
                    aria-controls="carousel"
                    type="button"
                >
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Indicator Dots -->
                <div class="carousel-indicators" role="tablist" aria-label="<?php _e( 'Carousel slide indicators', 'raikot-tours' ); ?>">
                    <?php
                    for ( $i = 0; $i < count( $carousel_images ); $i++ ) :
                        $is_active = $i === 0 ? ' carousel-indicator--active' : '';
                        $aria_label = sprintf( _n(
                            'Slide %d',
                            'Slide %d',
                            $i + 1,
                            'raikot-tours'
                        ), $i + 1 );
                        ?>
                        <button
                            class="carousel-indicator<?php echo esc_attr( $is_active ); ?>"
                            aria-label="<?php echo esc_attr( $aria_label ); ?>"
                            aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                            data-index="<?php echo esc_attr( $i ); ?>"
                            role="tab"
                            type="button"
                        ></button>
                    <?php endfor; ?>
                </div>

                <!-- Next Button -->
                <button
                    class="carousel-button carousel-button--next"
                    aria-label="<?php _e( 'Next image', 'raikot-tours' ); ?>"
                    aria-controls="carousel"
                    type="button"
                >
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <!-- Carousel Status for Screen Readers -->
            <div class="sr-only" aria-live="polite" aria-atomic="true" id="carousel-status">
                <?php echo sprintf( _n(
                    'Image 1 of %d',
                    'Image 1 of %d',
                    count( $carousel_images ),
                    'raikot-tours'
                ), count( $carousel_images ) ); ?>
            </div>
        </div>

        <!-- Feature Highlights Below Carousel -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex items-start gap-4 group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-luxury-gold transition-all duration-500">
                    <i class="fas fa-gem text-lg text-luxury-gold group-hover:text-luxury-navy"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-2"><?php _e( 'Unrivaled Comfort', 'raikot-tours' ); ?></h4>
                    <p class="text-white/40 text-sm leading-relaxed"><?php _e( 'Premium stays and private transport, even in the most remote valleys.', 'raikot-tours' ); ?></p>
                </div>
            </div>

            <div class="flex items-start gap-4 group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-luxury-gold transition-all duration-500">
                    <i class="fas fa-user-tie text-lg text-luxury-gold group-hover:text-luxury-navy"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-2"><?php _e( 'Elite Local Guides', 'raikot-tours' ); ?></h4>
                    <p class="text-white/40 text-sm leading-relaxed"><?php _e( 'Culturally connected storytellers with decades of high-altitude experience.', 'raikot-tours' ); ?></p>
                </div>
            </div>

            <div class="flex items-start gap-4 group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-luxury-gold transition-all duration-500">
                    <i class="fas fa-shield text-lg text-luxury-gold group-hover:text-luxury-navy"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-2"><?php _e( 'Certified Safety', 'raikot-tours' ); ?></h4>
                    <p class="text-white/40 text-sm leading-relaxed"><?php _e( 'Strict altitude management and real-time support on every trail.', 'raikot-tours' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
