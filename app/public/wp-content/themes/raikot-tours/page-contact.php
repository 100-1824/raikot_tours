<?php
/**
 * Template Name: Contact
 *
 * @package Raikot_Tours
 */

get_header();
?>

<div class="page-hero bg-[#1a2e44] py-32 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl font-bold text-white mb-4" data-aos="fade-up"><?php _e( 'Contact Us', 'raikot-tours' ); ?></h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="100"></div>
    </div>
</div>

<section class="bg-[#1a2e44] py-20">
<div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row gap-16">
        <div class="lg:w-1/2" data-aos="fade-right">
            <h2 class="text-3xl font-bold mb-8 text-white"><?php _e( 'Get in Touch', 'raikot-tours' ); ?></h2>
            <p class="text-gray-300 mb-12">
                <?php _e( 'Have questions about our tours or need a custom itinerary? Fill out the form below and our team will get back to you within 24 hours.', 'raikot-tours' ); ?>
            </p>

            <?php if ( isset( $_GET['sent'] ) && $_GET['sent'] === '1' ) : ?>
                <div class="bg-green-900/40 border border-green-400/30 text-green-300 rounded-lg p-6 mb-8 font-medium">
                    <?php _e( '✓ Your message has been sent! We\'ll get back to you within 24 hours.', 'raikot-tours' ); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" class="space-y-6">
                <input type="hidden" name="action" value="raikot_contact">
                <?php wp_nonce_field( 'raikot_contact_form', 'raikot_contact_nonce' ); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-widest text-white"><?php _e( 'Full Name', 'raikot-tours' ); ?></label>
                        <input type="text" name="full_name" required placeholder="<?php esc_attr_e( 'Your full name', 'raikot-tours' ); ?>" class="w-full bg-white/10 border border-white/20 p-4 rounded-lg text-white placeholder-white/40 focus:border-[#d4af37] focus:ring-2 focus:ring-[#d4af37]/30 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-widest text-white"><?php _e( 'Email Address', 'raikot-tours' ); ?></label>
                        <input type="email" name="email" required placeholder="<?php esc_attr_e( 'your@email.com', 'raikot-tours' ); ?>" class="w-full bg-white/10 border border-white/20 p-4 rounded-lg text-white placeholder-white/40 focus:border-[#d4af37] focus:ring-2 focus:ring-[#d4af37]/30 outline-none transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2 uppercase tracking-widest text-white"><?php _e( 'Subject', 'raikot-tours' ); ?></label>
                    <input type="text" name="subject" placeholder="<?php esc_attr_e( 'How can we help?', 'raikot-tours' ); ?>" class="w-full bg-white/10 border border-white/20 p-4 rounded-lg text-white placeholder-white/40 focus:border-[#d4af37] focus:ring-2 focus:ring-[#d4af37]/30 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2 uppercase tracking-widest text-white"><?php _e( 'Message', 'raikot-tours' ); ?></label>
                    <textarea name="message" rows="6" required placeholder="<?php esc_attr_e( 'Tell us about your dream adventure...', 'raikot-tours' ); ?>" class="w-full bg-white/10 border border-white/20 p-4 rounded-lg text-white placeholder-white/40 focus:border-[#d4af37] focus:ring-2 focus:ring-[#d4af37]/30 outline-none transition-all resize-none"></textarea>
                </div>
                <button type="submit" class="btn-gold w-full py-5 text-lg uppercase tracking-widest">
                    <?php _e( 'Send Message', 'raikot-tours' ); ?>
                </button>
            </form>
        </div>

        <div class="lg:w-1/2" data-aos="fade-left">
            <div class="glass-card p-10 mb-8">
                <h3 class="text-xl font-bold mb-8 text-white"><?php _e( 'Contact Information', 'raikot-tours' ); ?></h3>
                <ul class="space-y-8">
                    <li class="flex items-start gap-6">
                        <div class="w-12 h-12 bg-[#d4af37]/10 rounded-full flex items-center justify-center shrink-0">
                            <span class="dashicons dashicons-location text-[#d4af37]"></span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1 text-white"><?php _e( 'Our Office', 'raikot-tours' ); ?></h4>
                            <p class="text-gray-300"><?php _e( 'Gilgit-Baltistan, Pakistan', 'raikot-tours' ); ?></p>
                        </div>
                    </li>
                    <li class="flex items-start gap-6">
                        <div class="w-12 h-12 bg-[#d4af37]/10 rounded-full flex items-center justify-center shrink-0">
                            <span class="dashicons dashicons-phone text-[#d4af37]"></span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1 text-white"><?php _e( 'Phone', 'raikot-tours' ); ?></h4>
                            <p class="text-gray-300"><?php echo esc_html( get_theme_mod( 'raikot_tours_phone', '+92 300 1234567' ) ); ?></p>
                        </div>
                    </li>
                    <li class="flex items-start gap-6">
                        <div class="w-12 h-12 bg-[#d4af37]/10 rounded-full flex items-center justify-center shrink-0">
                            <span class="dashicons dashicons-email text-[#d4af37]"></span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1 text-white"><?php _e( 'Email', 'raikot-tours' ); ?></h4>
                            <p class="text-gray-300"><?php echo esc_html( get_theme_mod( 'raikot_tours_email', 'info@raikottours.com' ) ); ?></p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="map-container glass-card overflow-hidden h-80 relative">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104863.66440234714!2d74.264444!3d35.920833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e649e376666667%3A0x6666666666666666!2sGilgit!5e0!3m2!1sen!2s!4v1620000000000!5m2!1sen!2s"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
                <div class="absolute top-4 left-4 glass-card p-4 text-xs font-bold uppercase tracking-widest pointer-events-none text-white">
                    <?php _e( 'Find Us in Gilgit', 'raikot-tours' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php
get_footer();
