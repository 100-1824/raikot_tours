<?php
/**
 * Template Name: Trekking & Riding
 *
 * @package Raikot_Tours
 */

get_header();

$trekking_packages = [
    [
        'title'    => 'K2 Base Camp Trek',
        'image'    => 'https://images.unsplash.com/photo-1693320262631-d30e8ef450f2?w=800&h=500&fit=crop',
        'badge'    => 'Most Popular',
        'price'    => '$120',
        'duration' => '14 Days Min',
        'desc'     => 'Stand at the foot of the world\'s second-highest mountain on this ultimate high-altitude adventure. The trail winds through the Baltoro Glacier, past Concordia to the legendary K2 Base Camp.',
        'specs'    => [
            'Experienced certified guide included',
            'Porter service throughout',
            'All camping gear provided',
            'All meals on the trail',
            'Permit assistance & arrangement'
        ]
    ],
    [
        'title'    => 'Fairy Meadows Trek',
        'image'    => 'https://images.unsplash.com/photo-1657122067013-4c44bbed9861?w=800&h=500&fit=crop',
        'badge'    => 'Beginner Friendly',
        'price'    => '$65',
        'duration' => '3 Days Min',
        'desc'     => 'Trek through pine forests to the magical alpine meadows at the base of Nanga Parbat. Accessible to trekkers of all levels, making it the perfect introduction to Pakistan\'s high-altitude wilderness.',
        'specs'    => [
            'Guided trek with local expert',
            'Accommodation at meadows camp',
            'All meals included',
            'Stunning Nanga Parbat views',
            'Beginner-friendly trail'
        ]
    ]
];

$riding_packages = [
    [
        'title'    => 'Deosai Plains Ride',
        'image'    => 'https://images.unsplash.com/photo-1761766593396-01fad8e2fb6b?w=800&h=500&fit=crop',
        'badge'    => 'Scenic',
        'price'    => '$45',
        'duration' => '2 Days Min',
        'desc'     => 'Gallop across Deosai — one of the world\'s highest plateaus. A vast, treeless wilderness carpeted with wildflowers and home to the endangered Himalayan brown bear.',
        'specs'    => [
            'Experienced local horses',
            'Professional guide throughout',
            'Saddle, helmet & safety gear',
            'Overnight camping included',
            'Wildlife spotting opportunities'
        ]
    ],
    [
        'title'    => 'Hunza Valley Ride',
        'image'    => 'http://raikottours.local/wp-content/uploads/2026/03/raikot-logo-white-1.png', // Fallback as logo for now or find better
        'image'    => 'https://images.unsplash.com/photo-1631044633850-87e950befd09?w=800&h=500&fit=crop',
        'badge'    => 'Half Day',
        'price'    => '$30',
        'duration' => '4-5 Hours',
        'desc'     => 'A leisurely half-day ride through the stunning Hunza Valley — past ancient apricot orchards, traditional stone villages, and panoramic views of Rakaposhi and Ultar Sar.',
        'specs'    => [
            '4–5 hour guided experience',
            'Expert local guide',
            'Full safety briefing',
            'Scenic apricot orchard routes',
            'Photography stops included'
        ]
    ]
];
?>

<!-- Page Hero -->
<div class="page-hero bg-[#1a2e44] py-20 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-xs mb-4 block" data-aos="fade-up">Deep Wilderness</span>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6" data-aos="fade-up" data-aos-delay="100">Trekking & Horse Riding</h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="200"></div>
    </div>
</div>

<!-- Intro -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-[#1a2e44] mb-8">Adventure Beyond the Roads</h2>
            <p class="text-gray-500 text-lg leading-relaxed">
                Step into terrain that challenges and rewards you in equal measure. Whether you're pushing through glacial moraine toward K2 or slow down and let the landscape come to you on horseback, we guide you every step of the way.
            </p>
        </div>

        <!-- Trekking -->
        <div class="mb-20">
            <div class="flex items-center gap-6 mb-12" data-aos="fade-right">
                <div class="h-px bg-gray-200 flex-grow"></div>
                <h3 class="text-3xl font-bold text-[#1a2e44] px-8">Trekking Packages</h3>
                <div class="h-px bg-gray-200 flex-grow"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <?php foreach ($trekking_packages as $pkg) : ?>
                    <div class="glass-card overflow-hidden group flex flex-col bg-white rounded-[2.5rem] shadow-xl border border-gray-100 transition-all duration-500 hover:shadow-2xl" data-aos="fade-up">
                        <div class="relative overflow-hidden h-80">
                            <img src="<?php echo $pkg['image']; ?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute top-6 left-6 bg-[#1a2e44]/80 backdrop-blur-md px-5 py-2 rounded-full text-white text-xs font-bold uppercase tracking-widest">
                                <?php echo $pkg['badge']; ?>
                            </div>
                            <div class="absolute bottom-6 right-6 bg-[#d4af37] px-6 py-3 rounded-2xl text-white font-bold shadow-xl">
                                <?php echo $pkg['price']; ?> <span class="text-[10px] opacity-70 font-normal">/ day</span>
                            </div>
                        </div>
                        <div class="p-10 flex-grow flex flex-col">
                            <div class="text-[#d4af37] font-bold text-xs uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                                <i class="fas fa-hiking"></i> <?php echo $pkg['duration']; ?>
                            </div>
                            <h4 class="text-2xl font-bold text-[#1a2e44] mb-6"><?php echo $pkg['title']; ?></h4>
                            <p class="text-gray-500 mb-8 leading-relaxed"><?php echo $pkg['desc']; ?></p>
                            
                            <ul class="space-y-3 mb-10 mt-auto">
                                <?php foreach ($pkg['specs'] as $spec) : ?>
                                    <li class="flex items-center gap-3 text-sm text-gray-600">
                                        <i class="fas fa-check text-[#d4af37]"></i> <?php echo $spec; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            
                            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-gold w-full text-center py-4 rounded-2xl block shadow-lg">
                                Book This Trek
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Horse Riding -->
        <div class="mb-20">
            <div class="flex items-center gap-6 mb-12" data-aos="fade-left">
                <div class="h-px bg-gray-200 flex-grow"></div>
                <h3 class="text-3xl font-bold text-[#1a2e44] px-8">Horse Riding Packages</h3>
                <div class="h-px bg-gray-200 flex-grow"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <?php foreach ($riding_packages as $pkg) : ?>
                    <div class="glass-card overflow-hidden group flex flex-col bg-white rounded-[2.5rem] shadow-xl border border-gray-100 transition-all duration-500 hover:shadow-2xl" data-aos="fade-up">
                        <div class="relative overflow-hidden h-80">
                            <img src="<?php echo $pkg['image']; ?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute top-6 left-6 bg-[#1a2e44]/80 backdrop-blur-md px-5 py-2 rounded-full text-white text-xs font-bold uppercase tracking-widest">
                                <?php echo $pkg['badge']; ?>
                            </div>
                            <div class="absolute bottom-6 right-6 bg-[#d4af37] px-6 py-3 rounded-2xl text-white font-bold shadow-xl">
                                <?php echo $pkg['price']; ?>
                            </div>
                        </div>
                        <div class="p-10 flex-grow flex flex-col">
                            <div class="text-[#d4af37] font-bold text-xs uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                                <i class="fas fa-horse"></i> <?php echo $pkg['duration']; ?>
                            </div>
                            <h4 class="text-2xl font-bold text-[#1a2e44] mb-6"><?php echo $pkg['title']; ?></h4>
                            <p class="text-gray-500 mb-8 leading-relaxed"><?php echo $pkg['desc']; ?></p>
                            
                            <ul class="space-y-3 mb-10 mt-auto">
                                <?php foreach ($pkg['specs'] as $spec) : ?>
                                    <li class="flex items-center gap-3 text-sm text-gray-600">
                                        <i class="fas fa-check text-[#d4af37]"></i> <?php echo $spec; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            
                            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-gold w-full text-center py-4 rounded-2xl block shadow-lg">
                                Book This Ride
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Info Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up">
            <div class="glass-card p-10 bg-[#f8fafc] border-gray-100">
                <i class="fas fa-box-open text-3xl text-[#d4af37] mb-6 block"></i>
                <h4 class="text-xl font-bold text-[#1a2e44] mb-4">What's Included</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> Experienced local guides</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> Full safety gear & briefing</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> Meals on the trail</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> First aid kit & emergency support</li>
                </ul>
            </div>
            <div class="glass-card p-10 bg-[#f8fafc] border-gray-100">
                <i class="fas fa-clipboard-list text-3xl text-[#d4af37] mb-6 block"></i>
                <h4 class="text-xl font-bold text-[#1a2e44] mb-4">Requirements</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> Moderate physical fitness</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> Hiking / Riding footwear</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> 48-hour advance booking</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#d4af37] text-[10px]"></i> Valid ID / Passport Copy</li>
                </ul>
            </div>
            <div class="glass-card p-10 bg-[#f8fafc] border-gray-100">
                <i class="fas fa-calendar-alt text-3xl text-[#d4af37] mb-6 block"></i>
                <h4 class="text-xl font-bold text-[#1a2e44] mb-4">Best Seasons</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li class="flex items-center gap-2"><i class="fas fa-sun text-[#d4af37] text-[10px]"></i> Trekking: May – October</li>
                    <li class="flex items-center gap-2"><i class="fas fa-sun text-[#d4af37] text-[10px]"></i> Riding: April – October</li>
                    <li class="flex items-center gap-2"><i class="fas fa-sun text-[#d4af37] text-[10px]"></i> Deosai: July – September</li>
                    <li class="flex items-center gap-2"><i class="fas fa-sun text-[#d4af37] text-[10px]"></i> Meadows: June – September</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-[#1a2e44] text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-8">Ready for a True Highland Experience?</h2>
        <p class="text-gray-300 max-w-2xl mx-auto mb-12 text-lg">
            Let our experts handle the logistics while you focus on the journey. Just show up and get ready to go.
        </p>
        <div class="flex flex-col md:flex-row items-center justify-center gap-6">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-gold px-12 py-5 rounded-full font-bold">
                Book Your Adventure
            </a>
            <a href="https://wa.me/923554518486" target="_blank" class="bg-white/10 backdrop-blur-md text-white px-12 py-5 rounded-full font-bold hover:bg-white/20 transition-all border border-white/10">
                <i class="fab fa-whatsapp mr-2"></i> WhatsApp Detail
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
