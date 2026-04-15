<?php
/**
 * Template Name: About Us
 *
 * @package Raikot_Tours
 */

get_header(); ?>

<!-- Page Hero -->
<div class="page-hero bg-[#1a2e44] py-32 relative overflow-hidden">
    <!-- Decorative Accents -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#d4af37]/5 -skew-x-12 translate-x-1/2"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-xs mb-4 block" data-aos="fade-up">Our Journey</span>
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6" data-aos="fade-up" data-aos-delay="100">About Raikot Tours</h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="200"></div>
    </div>
</div>

<!-- Our Story Section -->
<section class="about-intro py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative" data-aos="fade-right">
                <div class="rounded-[3rem] overflow-hidden shadow-2xl relative z-10">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/156BE104-C180-4223-9636-5C617F2F31C4.jpg' ) ); ?>"
                         alt="About Raikot Tours" class="w-full h-[600px] object-cover hover:scale-105 transition-transform duration-1000">
                </div>
                <!-- Experience Badge -->
                <div class="absolute -bottom-10 -right-10 glass-dark p-10 rounded-3xl z-20 shadow-2xl max-w-[250px]" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-4xl font-bold text-[#d4af37] mb-2">5.0</div>
                    <div class="flex text-[#d4af37] mb-4">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="text-white text-sm font-medium leading-relaxed">Average Rating on All Platforms</div>
                </div>
            </div>
            
            <div data-aos="fade-left">
                <span class="text-[#d4af37] font-bold uppercase tracking-widest text-sm mb-6 block">Our Story</span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#1a2e44] mb-8 leading-tight">
                    Your Trusted Partner for Exploring Pakistan's Breathtaking Landscapes
                </h2>
                <div class="space-y-6 text-gray-600 text-lg leading-relaxed mb-10">
                    <p>We are passionate about showcasing the hidden gems of this beautiful country. With a deep love for travel and nature, we have dedicated ourselves to providing exceptional journeys through Pakistan's most spectacular regions.</p>
                    <p>We operate nationwide, with a particular emphasis on the spectacular northern regions — Karakoram, Himalayas, and Hindukush. From the majestic peaks to the serene valleys, we bring you closer to nature, culture, and adventure.</p>
                </div>
                
                <ul class="space-y-4 mb-12">
                    <?php 
                    $features = [
                        'Expert local guides born and raised in the mountains',
                        'Fully customizable tours for solo, couple & group travelers',
                        'Trusted by travelers from over 30 countries worldwide',
                        '24/7 support before, during and after every trip',
                        '5-star rated on all major travel platforms'
                    ];
                    foreach ($features as $feature) : ?>
                        <li class="flex items-center gap-4 text-gray-700">
                            <span class="w-6 h-6 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-[#d4af37] text-xs"></i>
                            </span>
                            <?php echo $feature; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-gold px-12 py-5 inline-block rounded-full">
                    <i class="fas fa-paper-plane mr-2"></i> Get In Touch Now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<?php get_template_part( 'template-parts/statistics-section' ); ?>

<!-- Adventure Gallery Section (Replacing Meet Our Guides) -->
<section class="adventure-gallery py-24 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-xs mb-4 block">Our Journey</span>
            <h2 class="text-4xl md:text-6xl font-bold text-[#1a2e44] mb-6">Our Adventure Gallery</h2>
            <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Take a glimpse into the breathtaking landscapes and unforgettable moments we share with our travelers across Northern Pakistan.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php 
            $gallery_images = [
                'IMG_2559.jpg', 'IMG_1983.jpg', 'IMG_3787.jpg', 'IMG_1591.jpg',
                'IMG_2196.jpg', 'IMG_3499.jpg', 'IMG_3524.jpg', 'IMG_3787.jpg',
                'IMG_3937.jpg', 'IMG_2557.jpg', '06F313CC-02A3-4AE6-8D53-1A6A42F0B5C4.jpg', '7D46A7EC-E8DE-45FE-A2DA-0D44B51DDD05.jpg'
            ];
            $delay = 0;
            foreach ($gallery_images as $img) : ?>
                <div class="relative aspect-square overflow-hidden rounded-3xl group cursor-pointer shadow-lg" 
                     data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/' . $img ) ); ?>"
                         alt="Adventure in Pakistan"
                         class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-[#0f172a]/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-3xl transform scale-50 group-hover:scale-100 transition-transform duration-500"></i>
                    </div>
                </div>
                <?php $delay += 50; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Thousand Trust Us (Reused from Front Page patterns) -->
<section class="py-24 bg-[#0f172a] text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold">What Travelers Say</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Testimonial 1 -->
            <div class="glass-card p-10 rounded-3xl border-white/5" data-aos="fade-up">
                <div class="flex text-[#d4af37] mb-6"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                <p class="text-gray-300 italic mb-8">"Our family adventure tour to Hunza and Fairy Meadows was perfectly organized, with activities for everyone. We felt safe and cared for throughout the trip."</p>
                <div class="font-bold">Noor Fatima</div>
                <div class="text-[#d4af37] text-xs uppercase">Pakistan</div>
            </div>
            <!-- Testimonial 2 -->
            <div class="glass-card p-10 rounded-3xl border-white/5" data-aos="fade-up" data-aos-delay="100">
                <div class="flex text-[#d4af37] mb-6"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                <p class="text-gray-300 italic mb-8">"The attention to detail and the warmth of the team were exceptional. They made our trip truly unforgettable — highly recommended!"</p>
                <div class="font-bold">Ahmad Khan</div>
                <div class="text-[#d4af37] text-xs uppercase">Lahore, Pakistan</div>
            </div>
            <!-- Testimonial 3 -->
            <div class="glass-card p-10 rounded-3xl border-white/5" data-aos="fade-up" data-aos-delay="200">
                <div class="flex text-[#d4af37] mb-6"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                <p class="text-gray-300 italic mb-8">"I return home with great gratitude and the conviction that Pakistanis are among the most hospitable people I have ever met."</p>
                <div class="font-bold">박병규</div>
                <div class="text-[#d4af37] text-xs uppercase">South Korea</div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4 text-center">
        <div class="bg-[#d4af37] p-16 rounded-[4rem] relative overflow-hidden shadow-2xl" data-aos="zoom-in">
            <h2 class="text-4xl md:text-6xl font-bold text-white mb-8">Join Our Family of Travelers</h2>
            <p class="text-white/90 mb-12 text-lg max-w-2xl mx-auto">
                If you dream of a trip that offers more than just photos — join us and discover northern Pakistan in the best possible style.
            </p>
            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                <a href="<?php echo esc_url( home_url( '/our-tours' ) ); ?>" class="bg-[#1a2e44] text-white px-12 py-5 rounded-full font-bold hover:bg-[#0f172a] transition-all">
                    Browse Tours
                </a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="bg-white text-[#1a2e44] px-12 py-5 rounded-full font-bold hover:bg-gray-100 transition-all">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
