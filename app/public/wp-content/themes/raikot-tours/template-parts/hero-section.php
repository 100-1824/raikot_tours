<?php
/**
 * Template part for displaying the hero section on the front page
 *
 * @package Raikot_Tours
 */

$tagline = "Experience the majestic silence of the Karakoram and the vibrant heritage of the Silk Road. We don't just guide; we curate the extraordinary.";
?>

<section class="hero-section relative h-screen min-h-[800px] flex items-center justify-center overflow-hidden bg-luxury-navy">
    <!-- Sophisticated Overlay & Video -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-luxury-navy/60 via-luxury-navy/30 to-luxury-navy z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_transparent_0%,_rgba(0,0,0,0.6)_100%)] z-10"></div>
        <video
            class="w-full h-full object-cover scale-110 animate-[slow-zoom_40s_linear_infinite]"
            autoplay
            muted
            loop
            playsinline>
            <source src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/raikot_highlights.mp4' ) ); ?>" type="video/mp4">
        </video>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute top-1/4 -left-20 w-64 h-64 bg-luxury-gold/5 rounded-full blur-[120px] z-10 pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-64 h-64 bg-luxury-gold/10 rounded-full blur-[100px] z-10 pointer-events-none"></div>

    <!-- Hero Content: Asymmetrical Editorial Layout -->
    <div class="container mx-auto px-6 lg:px-20 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: High-Impact Typography -->
            <div class="lg:col-span-8 xl:col-span-7" data-aos="fade-right" data-aos-duration="1500">
                <div class="flex items-center gap-6 mb-8 opacity-0 animate-[fadeInUp_1s_ease-out_0.5s_forwards]">
                    <span class="w-16 h-[1.5px] bg-luxury-gold"></span>
                    <span class="text-luxury-gold uppercase tracking-[0.5em] text-[12px] font-black"><?php esc_html_e('Premium Expeditions', 'raikot-tours'); ?></span>
                </div>
                
                <h1 class="font-playfair text-5xl md:text-7xl lg:text-9xl font-bold text-white mb-6 leading-[0.8] drop-shadow-[0_40px_80px_rgba(0,0,0,0.6)] opacity-0 animate-[fadeInUp_1.2s_ease-out_0.8s_forwards]">
                    The <br>
                    Earth <br>
                    <span class="italic font-normal text-luxury-gold drop-shadow-[0_0_30px_rgba(245,158,11,0.2)]"><?php esc_html_e('Breathes', 'raikot-tours'); ?></span>
                </h1>
            </div>

            <!-- Right: Context & Action -->
            <div class="lg:col-span-4 xl:col-span-5 lg:pt-20" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500">
                <div class="backdrop-blur-sm bg-white/5 border-l-2 border-luxury-gold/30 p-6 md:p-10 rounded-r-3xl opacity-0 animate-[fadeInUp_1.2s_ease-out_1.1s_forwards]">
                    <p class="font-inter text-lg md:text-xl text-white/90 mb-10 font-light leading-relaxed">
                        <?php echo esc_html( $tagline ); ?>
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="<?php echo esc_url( home_url( '/our-tours' ) ); ?>" 
                           class="group relative overflow-hidden bg-luxury-gold text-luxury-navy px-10 py-5 text-[12px] uppercase tracking-[0.3em] font-black rounded-full transition-all duration-700 hover:shadow-[0_30px_60px_rgba(245,158,11,0.3)] hover:-translate-y-2 text-center">
                            <span class="relative z-10 transition-colors duration-500 group-hover:text-white">Explore</span>
                            <div class="absolute inset-0 bg-primary-color -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-in-out"></div>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" 
                           class="group relative px-10 py-5 text-white text-[12px] uppercase tracking-[0.3em] font-black rounded-full transition-all duration-700 border border-white/20 backdrop-blur-md overflow-hidden hover:border-luxury-gold hover:-translate-y-2 text-center">
                            <span class="relative z-10 group-hover:text-luxury-navy transition-colors duration-500">Bespoke</span>
                            <div class="absolute inset-0 bg-luxury-gold translate-y-full group-hover:translate-y-0 transition-transform duration-700 ease-out"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refined Scroll Indicator -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-4 opacity-50 hover:opacity-100 transition-opacity">
        <span class="text-white/40 uppercase tracking-[0.4em] text-[10px] font-bold vertical-text">Explore</span>
        <div class="w-[1px] h-16 bg-gradient-to-b from-luxury-gold/80 to-transparent relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-white animate-[scroll-line_2s_infinite]"></div>
        </div>
    </div>
</section>

<style>
@keyframes slow-zoom {
    0% { transform: scale(1); }
    100% { transform: scale(1.15); }
}
@keyframes fadeInUp {
    from { 
        opacity: 0; 
        transform: translateY(40px);
        filter: blur(10px);
    }
    to { 
        opacity: 1; 
        transform: translateY(0);
        filter: blur(0);
    }
}
@keyframes scroll-line {
    0% { transform: translateY(-100%); }
    50% { transform: translateY(0); }
    100% { transform: translateY(100%); }
}
.vertical-text {
    writing-mode: vertical-rl;
    text-orientation: mixed;
}

.editorial-card {
    will-change: transform, box-shadow;
}

.editorial-card img {
    will-change: transform, filter;
}
</style>


