</main><!-- #primary -->

<footer id="colophon" class="site-footer bg-[#1a2e44] text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="footer-about">
                <h3 class="text-xl font-bold text-white mb-6"><?php bloginfo( 'name' ); ?></h3>
                <p class="text-gray-400 mb-6">
                    <?php bloginfo( 'description' ); ?>
                </p>
                <div class="social-links flex space-x-4">
                    <?php if ( get_theme_mod( 'raikot_tours_facebook' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_facebook' ) ); ?>" target="_blank" rel="noopener noreferrer" class="text-white hover:text-[#d4af37] transition-colors" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'raikot_tours_instagram' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_instagram' ) ); ?>" target="_blank" rel="noopener noreferrer" class="text-white hover:text-[#d4af37] transition-colors" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'raikot_tours_whatsapp' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="text-white hover:text-[#d4af37] transition-colors" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-links">
                <h3 class="text-lg font-bold mb-6 text-white"><?php _e( 'Quick Links', 'raikot-tours' ); ?></h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'footer-nav space-y-3',
                ) );
                ?>
            </div>

            <div class="footer-tours">
                <h3 class="text-lg font-bold mb-6 text-white"><?php _e( 'Popular Tours', 'raikot-tours' ); ?></h3>
                <ul class="space-y-3">
                    <?php
                    $popular_tours = new WP_Query( array(
                        'post_type'      => 'tour',
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                        'no_found_rows'  => true,
                    ) );
                    if ( $popular_tours->have_posts() ) :
                        while ( $popular_tours->have_posts() ) : $popular_tours->the_post();
                            echo '<li><a href="' . esc_url( get_permalink() ) . '" class="text-gray-400 hover:text-white transition-colors">' . esc_html( get_the_title() ) . '</a></li>';
                        endwhile;
                        wp_reset_postdata();
                    else :
                        $fallback_tours = array(
                            array( 'title' => 'Hunza Valley 7-Day Tour', 'slug' => 'our-tours#hunza' ),
                            array( 'title' => 'Fairy Meadows Tour',      'slug' => 'our-tours#fairy' ),
                            array( 'title' => 'Skardu & Shangrila',      'slug' => 'our-tours#skardu' ),
                        );
                        foreach ( $fallback_tours as $tour ) :
                            echo '<li><a href="' . esc_url( home_url( '/' . $tour['slug'] ) ) . '" class="text-gray-400 hover:text-white transition-colors">' . esc_html( $tour['title'] ) . '</a></li>';
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <div class="footer-contact">
                <h3 class="text-lg font-bold mb-6 text-white"><?php _e( 'Contact Us', 'raikot-tours' ); ?></h3>
                <ul class="space-y-4 text-gray-400">
                    <?php if ( get_theme_mod( 'raikot_tours_phone' ) ) : ?>
                        <li class="flex items-center space-x-3">
                            <span class="text-[#d4af37]"><i class="fas fa-phone"></i></span>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', get_theme_mod( 'raikot_tours_phone' ) ) ); ?>" class="hover:text-white transition-colors"><?php echo esc_html( get_theme_mod( 'raikot_tours_phone' ) ); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'raikot_tours_email' ) ) : ?>
                        <li class="flex items-center space-x-3">
                            <span class="text-[#d4af37]"><i class="fas fa-envelope"></i></span>
                            <a href="mailto:<?php echo esc_attr( get_theme_mod( 'raikot_tours_email' ) ); ?>" class="hover:text-white transition-colors"><?php echo esc_html( get_theme_mod( 'raikot_tours_email' ) ); ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="flex items-start space-x-3">
                        <span class="text-[#d4af37]"><i class="fas fa-map-marker-alt"></i></span>
                        <span><?php _e( 'Gilgit-Baltistan, Pakistan', 'raikot-tours' ); ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom border-t border-white/10 pt-8 flex flex-col md:row justify-between items-center text-sm text-gray-400">
            <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All rights reserved.', 'raikot-tours' ); ?></p>
            <p><?php _e( 'Designed for Adventure.', 'raikot-tours' ); ?></p>
        </div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
