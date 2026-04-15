</main><!-- #primary -->

<footer id="colophon" class="site-footer">
    <div class="footer-atmosphere" aria-hidden="true"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="footer-grid">
            <section class="footer-card footer-brand">
                <span class="footer-kicker"><?php _e( 'Mountain Experts', 'raikot-tours' ); ?></span>
                <h3><?php bloginfo( 'name' ); ?></h3>
                <p><?php bloginfo( 'description' ); ?></p>
                <div class="footer-socials">
                    <?php if ( get_theme_mod( 'raikot_tours_facebook' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_facebook' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Facebook', 'raikot-tours' ); ?>"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'raikot_tours_instagram' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_instagram' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Instagram', 'raikot-tours' ); ?>"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'raikot_tours_whatsapp' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'WhatsApp', 'raikot-tours' ); ?>"><i class="fab fa-whatsapp"></i></a>
                    <?php endif; ?>
                </div>
            </section>

            <section class="footer-card">
                <h3><?php _e( 'Quick Links', 'raikot-tours' ); ?></h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'footer-nav',
                    'fallback_cb'    => false,
                ) );
                ?>
            </section>

            <section class="footer-card">
                <h3><?php _e( 'Popular Tours', 'raikot-tours' ); ?></h3>
                <ul class="footer-list">
                    <?php
                    $popular_tours = new WP_Query( array(
                        'post_type'      => 'tour',
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                        'no_found_rows'  => true,
                    ) );
                    if ( $popular_tours->have_posts() ) :
                        while ( $popular_tours->have_posts() ) : $popular_tours->the_post();
                            echo '<li><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
                        endwhile;
                        wp_reset_postdata();
                    else :
                        $fallback_tours = array(
                            array( 'title' => 'Hunza Valley 7-Day Tour', 'slug' => 'our-tours#hunza' ),
                            array( 'title' => 'Fairy Meadows Tour', 'slug' => 'our-tours#fairy' ),
                            array( 'title' => 'Skardu & Shangrila', 'slug' => 'our-tours#skardu' ),
                        );
                        foreach ( $fallback_tours as $tour ) :
                            echo '<li><a href="' . esc_url( home_url( '/' . $tour['slug'] ) ) . '">' . esc_html( $tour['title'] ) . '</a></li>';
                        endforeach;
                    endif;
                    ?>
                </ul>
            </section>

            <section class="footer-card footer-contact">
                <h3><?php _e( 'Contact', 'raikot-tours' ); ?></h3>
                <ul class="footer-list">
                    <?php if ( get_theme_mod( 'raikot_tours_phone' ) ) : ?>
                        <li><i class="fas fa-phone"></i><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', get_theme_mod( 'raikot_tours_phone' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'raikot_tours_phone' ) ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'raikot_tours_email' ) ) : ?>
                        <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo esc_attr( get_theme_mod( 'raikot_tours_email' ) ); ?>"><?php echo esc_html( get_theme_mod( 'raikot_tours_email' ) ); ?></a></li>
                    <?php endif; ?>
                    <li><i class="fas fa-map-marker-alt"></i><span><?php _e( 'Gilgit-Baltistan, Pakistan', 'raikot-tours' ); ?></span></li>
                </ul>
            </section>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo gmdate( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All rights reserved.', 'raikot-tours' ); ?></p>
            <p><?php _e( 'Crafted for unforgettable mountain journeys.', 'raikot-tours' ); ?></p>
        </div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
