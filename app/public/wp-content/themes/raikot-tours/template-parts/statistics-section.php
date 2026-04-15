<?php
/**
 * Template part for displaying the statistics section
 *
 * @package Raikot_Tours
 */
?>

<section class="statistics-section py-32 bg-luxury-navy relative overflow-hidden">
    <!-- Sophisticated Background Pattern -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23c5a059\" fill-opacity=\"1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <!-- Luxury Accents -->
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-luxury-gold/5 rounded-full blur-[150px] -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-luxury-gold/5 rounded-full blur-[200px] translate-x-1/2 translate-y-1/2"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
            <!-- Stat 1 -->
            <div class="stat-item group" data-aos="fade-up">
                <div class="relative p-10 text-center transition-all duration-700 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 group-hover:border-luxury-gold/30 transition-colors"></div>
                    <div class="relative z-10">
                        <div class="text-6xl md:text-7xl font-playfair font-bold text-luxury-gold mb-4 tabular-nums drop-shadow-[0_10px_20px_rgba(197,160,89,0.2)]">
                            <span class="counter" data-target="1500">0</span><span class="text-3xl">+</span>
                        </div>
                        <h3 class="text-white/60 text-xs font-bold uppercase tracking-[0.4em]"><?php _e( 'Global Travelers', 'raikot-tours' ); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="stat-item group" data-aos="fade-up" data-aos-delay="100">
                <div class="relative p-10 text-center transition-all duration-700 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 group-hover:border-luxury-gold/30 transition-colors"></div>
                    <div class="relative z-10">
                        <div class="text-6xl md:text-7xl font-playfair font-bold text-luxury-gold mb-4 tabular-nums drop-shadow-[0_10px_20px_rgba(197,160,89,0.2)]">
                            <span class="counter" data-target="50">0</span><span class="text-3xl">+</span>
                        </div>
                        <h3 class="text-white/60 text-xs font-bold uppercase tracking-[0.4em]"><?php _e( 'Curated Expeditions', 'raikot-tours' ); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="stat-item group" data-aos="fade-up" data-aos-delay="200">
                <div class="relative p-10 text-center transition-all duration-700 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 group-hover:border-luxury-gold/30 transition-colors"></div>
                    <div class="relative z-10">
                        <div class="text-6xl md:text-7xl font-playfair font-bold text-luxury-gold mb-4 tabular-nums drop-shadow-[0_10px_20px_rgba(197,160,89,0.2)]">
                            <span class="counter" data-target="12">0</span>
                        </div>
                        <h3 class="text-white/60 text-xs font-bold uppercase tracking-[0.4em]"><?php _e( 'Years of Excellence', 'raikot-tours' ); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    const startCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const inc = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(() => startCounter(counter), 1);
        } else {
            counter.innerText = target;
        }
    };

    // Intersection Observer to trigger counters when visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
});
</script>
