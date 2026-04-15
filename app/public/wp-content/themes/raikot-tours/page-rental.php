<?php
/**
 * Template Name: Rental
 *
 * @package Raikot_Tours
 */

get_header();
?>

<!-- Premium Hero Section -->
<div class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2070&auto=format&fit=crop" 
             class="w-full h-full object-cover transform scale-110 active-parallax" alt="Mountain Basecamp">
        <div class="absolute inset-0 bg-gradient-to-b from-[#020617]/80 via-[#020617]/60 to-[#020617]"></div>
    </div>
    
    <div class="container relative z-10 text-center px-4">
        <span class="inline-block px-4 py-1 rounded-full bg-luxury-gold/20 text-luxury-gold text-xs font-bold tracking-[0.3em] uppercase mb-6" data-aos="fade-up">
            <?php _e( 'Professional Expedition Gear', 'raikot-tours' ); ?>
        </span>
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-8 font-playfair" data-aos="fade-up" data-aos-delay="100">
            <?php _e( 'Equipment Rental', 'raikot-tours' ); ?>
        </h1>
        <div class="w-24 h-1 bg-luxury-gold mx-auto mb-8" data-aos="zoom-in" data-aos-delay="200"></div>
        <p class="text-white/80 max-w-2xl mx-auto text-lg font-light leading-relaxed" data-aos="fade-up" data-aos-delay="300">
            <?php _e( 'Premium expedition-grade equipment maintained to elite standards for your Himalayan journey. Reliability is our signature.', 'raikot-tours' ); ?>
        </p>
    </div>
</div>

<!-- Signature Promise Section -->
<section class="bg-[#020617] py-24 relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center" data-aos="fade-up">
                <div class="text-luxury-gold mb-6">
                    <i class="fas fa-hand-sparkles text-4xl"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-4 font-playfair"><?php _e( 'Sanitized & Certified', 'raikot-tours' ); ?></h3>
                <p class="text-white/60 text-sm leading-relaxed"><?php _e( 'Every piece of gear undergoes a rigorous 5-point inspection and medical-grade cleaning after every use.', 'raikot-tours' ); ?></p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-luxury-gold mb-6">
                    <i class="fas fa-shield-alt text-4xl"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-4 font-playfair"><?php _e( 'Top-Tier Brands', 'raikot-tours' ); ?></h3>
                <p class="text-white/60 text-sm leading-relaxed"><?php _e( 'We only stock world-class expedition brands like The North Face, Black Diamond, and Mammut.', 'raikot-tours' ); ?></p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-luxury-gold mb-6">
                    <i class="fas fa-headset text-4xl"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-4 font-playfair"><?php _e( 'Expert Briefing', 'raikot-tours' ); ?></h3>
                <p class="text-white/60 text-sm leading-relaxed"><?php _e( 'Receive a professional demonstration and sizing session with our mountain guides before you head out.', 'raikot-tours' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Equipment Grid Section -->
<section class="bg-[#020617] py-24 border-t border-white/5">
    <div class="container mx-auto px-4">
        <?php
        $categories = array(
            'Basecamp & Shelter' => array(
                array( 
                    'name' => 'Mountain Hardwear Trango 2', 
                    'desc' => 'Extreme weather 4-season expedition tent.',
                    'price' => '$25', 
                    'img' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?q=80&w=2070&auto=format&fit=crop' 
                ),
                array( 
                    'name' => 'Sleeping Bag (-20°C)', 
                    'desc' => 'Premium down-filled extreme insulation.',
                    'price' => '$15', 
                    'img' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?q=80&w=2070&auto=format&fit=crop' 
                ),
                array( 
                    'name' => 'Self-Inflating Mattress', 
                    'desc' => 'High R-value thermal comfort mat.',
                    'price' => '$8', 
                    'img' => 'https://images.unsplash.com/photo-1596267366668-386afd7612f0?q=80&w=2070&auto=format&fit=crop' 
                ),
            ),
            'Technical Trekking' => array(
                array( 
                    'name' => 'Black Diamond Carbon Poles', 
                    'desc' => 'Ultra-lightweight shock absorbing poles.',
                    'price' => '$7', 
                    'img' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?q=80&w=2070&auto=format&fit=crop' 
                ),
                array( 
                    'name' => 'Osprey Aether 70L', 
                    'desc' => 'Professional multi-day heavy load pack.',
                    'price' => '$18', 
                    'img' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?q=80&w=2070&auto=format&fit=crop' 
                ),
                array( 
                    'name' => 'Petzl Nao+ Headlamp', 
                    'desc' => 'Reactive lighting with 750 lumens.',
                    'price' => '$6', 
                    'img' => 'https://images.unsplash.com/photo-1534067783941-51c9c23ecefd?q=80&w=2070&auto=format&fit=crop' 
                ),
            )
        );

        foreach ( $categories as $cat_name => $items ) : ?>
            <div class="mb-24">
                <div class="flex items-center gap-6 mb-12" data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-white font-playfair m-0"><?php echo esc_html( $cat_name ); ?></h2>
                    <div class="h-[1px] bg-luxury-gold/30 flex-1"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php foreach ( $items as $item ) : ?>
                        <div class="group relative overflow-hidden rounded-2xl bg-[#0f172a] border border-white/5 tour-card-wrapper" data-aos="fade-up">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="<?php echo esc_url( $item['img'] ); ?>" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                     alt="<?php echo esc_attr( $item['name'] ); ?>">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#020617] via-transparent to-transparent opacity-80"></div>
                            </div>
                            
                            <div class="p-8 relative">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-white font-playfair"><?php echo esc_html( $item['name'] ); ?></h3>
                                    <span class="text-luxury-gold font-bold text-xl"><?php echo esc_html( $item['price'] ); ?><span class="text-xs text-white/40 ml-1">/day</span></span>
                                </div>
                                <p class="text-white/60 text-sm mb-8 font-light italic"><?php echo esc_html( $item['desc'] ); ?></p>
                                <a href="<?php echo esc_url( home_url( '/contact?rental=' . urlencode( $item['name'] ) ) ); ?>" 
                                   class="btn-gold w-full text-center py-4 rounded-lg flex items-center justify-center gap-2 group/btn">
                                    <span><?php _e( 'Reserve Gear', 'raikot-tours' ); ?></span>
                                    <i class="fas fa-arrow-right text-xs transition-transform group-hover/btn:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Rental Process Section -->
<section class="bg-luxury-navy py-32 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 font-playfair"><?php _e( 'Seamless Experience', 'raikot-tours' ); ?></h2>
            <p class="text-white/60 max-w-2xl mx-auto"><?php _e( 'Our rental process is designed to let you focus on what matters: the journey ahead.', 'raikot-tours' ); ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="relative text-center" data-aos="fade-up">
                <div class="w-16 h-16 rounded-full bg-luxury-gold/10 border border-luxury-gold/20 flex items-center justify-center mx-auto mb-8 text-luxury-gold text-2xl font-bold">1</div>
                <h4 class="text-white font-bold mb-4"><?php _e( 'Inventory Selection', 'raikot-tours' ); ?></h4>
                <p class="text-white/50 text-sm"><?php _e( 'Browse our collection and reserve your essentials online or in person.', 'raikot-tours' ); ?></p>
            </div>
            <div class="relative text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 rounded-full bg-luxury-gold/10 border border-luxury-gold/20 flex items-center justify-center mx-auto mb-8 text-luxury-gold text-2xl font-bold">2</div>
                <h4 class="text-white font-bold mb-4"><?php _e( 'Professional Sizing', 'raikot-tours' ); ?></h4>
                <p class="text-white/50 text-sm"><?php _e( 'Visit our depot for a customized fitting and gear briefing session.', 'raikot-tours' ); ?></p>
            </div>
            <div class="relative text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 rounded-full bg-luxury-gold/10 border border-luxury-gold/20 flex items-center justify-center mx-auto mb-8 text-luxury-gold text-2xl font-bold">3</div>
                <h4 class="text-white font-bold mb-4"><?php _e( 'The Expedition', 'raikot-tours' ); ?></h4>
                <p class="text-white/50 text-sm"><?php _e( 'Head into the wild with confidence in high-performance equipment.', 'raikot-tours' ); ?></p>
            </div>
            <div class="relative text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 rounded-full bg-luxury-gold/10 border border-luxury-gold/20 flex items-center justify-center mx-auto mb-8 text-luxury-gold text-2xl font-bold">4</div>
                <h4 class="text-white font-bold mb-4"><?php _e( 'Support & Return', 'raikot-tours' ); ?></h4>
                <p class="text-white/50 text-sm"><?php _e( 'Return the gear after your trek. We handle all cleaning and maintenance.', 'raikot-tours' ); ?></p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
