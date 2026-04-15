<?php
/**
 * Template Name: Trekking & Horse Riding
 *
 * @package Raikot_Tours
 */

get_header();
?>

<section class="relative overflow-hidden bg-[#1a2e44] py-24">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mountain-peak.jpg' ); ?>" alt="<?php esc_attr_e( 'Karakoram ridgelines', 'raikot-tours' ); ?>" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-[#1a2e44]/85 via-[#1a2e44]/75 to-[#1a2e44]"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="text-[#d4af37] font-bold uppercase tracking-[0.4em] text-[11px] mb-6 block" data-aos="fade-up"><?php _e( 'Karakoram Trails', 'raikot-tours' ); ?></span>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6" data-aos="fade-up" data-aos-delay="100"><?php _e( 'Trekking & Horse Riding', 'raikot-tours' ); ?></h1>
        <p class="text-white/70 text-lg md:text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <?php _e( 'Experience the northern highlands at an unhurried pace — on foot and on horseback — guided by teams who know every ridge, river crossing, and valley settlement.', 'raikot-tours' ); ?>
        </p>
    </div>
</section>

<section class="bg-white py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div>
                <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-[11px] mb-4 block"><?php _e( 'Premium Guidance', 'raikot-tours' ); ?></span>
                <h2 class="text-3xl md:text-4xl font-bold text-[#1a2e44] mb-6"><?php _e( 'Karakoram routes designed for comfort and confidence', 'raikot-tours' ); ?></h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    <?php _e( 'Our trekking and riding itineraries trace historic trade paths, alpine meadows, and glacier viewpoints with a focus on scenic variety and cultural immersion.', 'raikot-tours' ); ?>
                </p>
                <p class="text-gray-600 text-lg leading-relaxed">
                    <?php _e( 'Local guides lead every departure, balancing hospitality with precision planning. Daily route briefs, weather checks, and acclimatization pacing are built into each journey.', 'raikot-tours' ); ?>
                </p>
            </div>
            <div class="glass-card p-10 bg-[#1a2e44] text-white border border-white/10">
                <h3 class="text-2xl font-bold mb-6"><?php _e( 'Safety & Local Expertise', 'raikot-tours' ); ?></h3>
                <ul class="space-y-4 text-white/80 text-sm md:text-base">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-[#d4af37] mt-1"></i>
                        <?php _e( 'Certified wilderness guides and vetted horse handlers on every route.', 'raikot-tours' ); ?>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-[#d4af37] mt-1"></i>
                        <?php _e( 'Pre-briefed evacuation protocols with satellite-enabled communications.', 'raikot-tours' ); ?>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-[#d4af37] mt-1"></i>
                        <?php _e( 'Daily route assessments with terrain, weather, and pace adjustments.', 'raikot-tours' ); ?>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-[#d4af37] mt-1"></i>
                        <?php _e( 'Safety-first riding instruction and helmet checks before departure.', 'raikot-tours' ); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#1a2e44] py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-[11px] mb-4 block"><?php _e( 'Trail Classifications', 'raikot-tours' ); ?></span>
            <h2 class="text-3xl md:text-4xl font-bold text-white"><?php _e( 'Choose the rhythm that suits your journey', 'raikot-tours' ); ?></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-card p-8 bg-white/5 border border-white/10 text-white">
                <div class="text-[#d4af37] text-2xl mb-4"><i class="fas fa-leaf"></i></div>
                <h3 class="text-xl font-bold mb-4"><?php _e( 'Leisure Walks', 'raikot-tours' ); ?></h3>
                <p class="text-white/70 text-sm leading-relaxed">
                    <?php _e( 'Gentle valley strolls and meadow routes with extended cultural stops, ideal for photography and relaxed exploration.', 'raikot-tours' ); ?>
                </p>
            </div>
            <div class="glass-card p-8 bg-white/5 border border-white/10 text-white">
                <div class="text-[#d4af37] text-2xl mb-4"><i class="fas fa-mountain"></i></div>
                <h3 class="text-xl font-bold mb-4"><?php _e( 'Moderate Treks', 'raikot-tours' ); ?></h3>
                <p class="text-white/70 text-sm leading-relaxed">
                    <?php _e( 'Day-by-day elevation gains with alpine ridgelines and glacier viewpoints, paced for confident hikers.', 'raikot-tours' ); ?>
                </p>
            </div>
            <div class="glass-card p-8 bg-white/5 border border-white/10 text-white">
                <div class="text-[#d4af37] text-2xl mb-4"><i class="fas fa-flag"></i></div>
                <h3 class="text-xl font-bold mb-4"><?php _e( 'Alpine Expeditions', 'raikot-tours' ); ?></h3>
                <p class="text-white/70 text-sm leading-relaxed">
                    <?php _e( 'High-altitude traverses with extended acclimatization and technical guidance for seasoned adventurers.', 'raikot-tours' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
