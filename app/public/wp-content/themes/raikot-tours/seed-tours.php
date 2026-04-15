<?php
/**
 * Tour Seeder – Raikot Tours Theme
 *
 * Deletes any K2 Base Camp Tour posts and inserts three new informational
 * trekking guides: Rakaposhi Base Camp, Rush Lake, and Rupal Base Camp.
 *
 * Run via WP-CLI from the WordPress root:
 *
 *   wp eval-file wp-content/themes/raikot-tours/seed-tours.php --path=/app/public
 *
 * Or from the theme directory itself:
 *
 *   wp eval-file seed-tours.php --path=../../../..
 *
 * Requires WordPress to be fully loaded (WP-CLI handles this automatically).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Run this script via WP-CLI: wp eval-file seed-tours.php --path=/app/public' );
}

WP_CLI::log( '' );
WP_CLI::log( '=== Raikot Tours — Tour Seeder ================================' );
WP_CLI::log( '' );

// ─────────────────────────────────────────────────────────────────────────────
// STEP 1 — Delete K2 Base Camp Trek posts (all variations)
// ─────────────────────────────────────────────────────────────────────────────
WP_CLI::log( '[ Step 1 ] Removing K2 Base Camp Tour posts…' );

$all_tours = get_posts( [
    'post_type'      => 'tour',
    'posts_per_page' => -1,
    'post_status'    => 'any',
] );

$deleted = 0;
foreach ( $all_tours as $t ) {
    // Match any title containing "K2" and "Base Camp" or "BC"
    if ( preg_match( '/\bk-?2\b/i', $t->post_title ) &&
         preg_match( '/base.?camp|trek|\bbc\b/i', $t->post_title ) ) {
        wp_delete_post( $t->ID, true ); // true = force delete, skip trash
        WP_CLI::log( "  ✓ Deleted [{$t->ID}]: {$t->post_title}" );
        $deleted++;
    }
}

if ( $deleted === 0 ) {
    WP_CLI::log( '  – No K2 Base Camp tour posts found.' );
}

WP_CLI::log( '' );

// ─────────────────────────────────────────────────────────────────────────────
// STEP 2 — Helper: insert or replace a tour post
// ─────────────────────────────────────────────────────────────────────────────
function raikot_insert_tour( array $data ): int {
    // If a tour with this exact title already exists, delete it first
    $existing = get_page_by_title( $data['title'], OBJECT, 'tour' );
    if ( $existing ) {
        wp_delete_post( $existing->ID, true );
        WP_CLI::log( "  ↺ Replaced existing post [{$existing->ID}]: {$data['title']}" );
    }

    $post_id = wp_insert_post( [
        'post_title'   => wp_slash( $data['title'] ),
        'post_content' => wp_slash( $data['content'] ),
        'post_status'  => 'publish',
        'post_type'    => 'tour',
        'post_author'  => 1,
        'comment_status' => 'closed',
    ], true );

    if ( is_wp_error( $post_id ) ) {
        WP_CLI::error( '  ✗ Failed to insert "' . $data['title'] . '": ' . $post_id->get_error_message() );
        return 0;
    }

    update_post_meta( $post_id, '_tour_duration',   sanitize_text_field( $data['duration'] ) );
    update_post_meta( $post_id, '_tour_difficulty', sanitize_text_field( $data['difficulty'] ) );
    update_post_meta( $post_id, '_tour_location',   sanitize_text_field( $data['location'] ) );
    update_post_meta( $post_id, '_tour_price',      sanitize_text_field( $data['price'] ) );

    WP_CLI::success( "  ✓ Inserted [{$post_id}]: {$data['title']}" );
    return $post_id;
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 3 — Tour 1: Rakaposhi Base Camp Trek
// ─────────────────────────────────────────────────────────────────────────────
WP_CLI::log( '[ Step 2 ] Seeding tours…' );
WP_CLI::log( '' );

$rakaposhi_content = <<<'HTMLCONTENT'
<!-- wp:html -->
<div class="raikot-tour-guide">

<p>Rising like a perfect white pyramid to <strong>7,788 metres</strong> above sea level, Rakaposhi is one of the most visually commanding peaks in the entire Karakoram. Its Burushaski name — meaning <em>snow-covered</em> — understates the mountain's awe-inspiring nature. What distinguishes Rakaposhi from its equally giant neighbours is the sheer drama of its vertical relief: the mountain plunges nearly 5,800 metres from summit ice-cap to the floor of the Hunza River valley in an almost unbroken drop, giving it one of the greatest relief gradients of any peak on earth. It dominates the Karakoram Highway for more than a hundred kilometres, visible long before and long after you pass it — a constant, luminous presence on the northern horizon.</p>

<p>The <strong>Rakaposhi Base Camp Trek</strong> guides you from the warm hospitality of the Nagar Valley villages, through aromatic juniper and birch forests, across the lateral moraines of the Minapin Glacier, and up into the high alpine world directly beneath Rakaposhi's south-eastern face. There are no technical sections, no crevasse crossings, and no permit required. What there is, in abundance, is solitude, silence, and some of the most extraordinary mountain scenery accessible to a recreational trekker anywhere in Pakistan.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/12/Rakaposhi-Base-Camp-Trek-Rakaposhi-7788m-3.jpg" alt="Rakaposhi (7,788m) seen from the trekking approach through Nagar Valley" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h2>Why Trek to Rakaposhi Base Camp?</h2>

<p>Pakistan's northern highlands contain dozens of treks that claim superlatives — highest, most remote, most dramatic. Rakaposhi Base Camp earns its place among them not through extremity but through intimacy. Unlike the multi-week expeditions needed to reach K2 or the Gasherbrums, this trek places you face-to-face with a near-8,000-metre giant within just a few days of leaving the road. The mountain fills your entire visual field from base camp; you can identify individual ice seracs, trace the lines taken by alpinists attempting the south-east ridge, and hear the deep percussion of ice blocks calving from the upper glaciers.</p>

<p>A natural extension of the trek leads to the nearby <strong>Diran Base Camp</strong> — Diran (7,266m) being Rakaposhi's dramatic neighbour to the east — giving you a second perspective on the massif and the hidden glacial cirque that links the two peaks.</p>

<h2>Trek Highlights</h2>
<ul>
  <li>Face-to-face encounter with Rakaposhi (7,788m), one of the world's most beautiful peaks</li>
  <li>Walk through the traditional farming villages of Minapin and the Nagar Valley</li>
  <li>Traverse the lateral moraines and ablation valleys of the <strong>Minapin Glacier</strong></li>
  <li>Overnight at <strong>Hakapun Meadow</strong> (3,100m), framed by waterfalls and pine forest</li>
  <li>Reach <strong>Rakaposhi Base Camp</strong> at approximately 4,200m</li>
  <li>Optional excursion to <strong>Diran Base Camp</strong></li>
  <li>Sweeping ridge views of the Hunza Valley, Hispar massif, and Batura peaks</li>
  <li>No trekking permit required — Open Zone designation</li>
  <li>Best season: June through October</li>
</ul>

<h2>The Trek: Day-by-Day</h2>

<h3>Day 1 – Arrival in Minapin (2,100m)</h3>
<p>The approach follows the Karakoram Highway (KKH) northward from Islamabad through the Indus Gorge, past the great brown cliffs of Nanga Parbat's north face, through Gilgit, and down into the lush agricultural belt of Nagar. The roadside village of <strong>Minapin</strong> sits at 2,100 metres and serves as the trailhead. From here, Rakaposhi is already visible, its ice-armoured summit rising directly above the village rooftops — an astonishing introduction to the scale of what awaits. Overnight in a local guesthouse; equipment check and briefing with guides.</p>

<h3>Day 2 – Minapin to Hakapun Meadow (3,100m) — 5–6 hrs</h3>
<p>The trail departs Minapin through terraced apricot and cherry orchards, their pale spring blossom or heavy summer fruit providing a vivid contrast to the ice-fields above. The path climbs immediately and consistently, winding upward through birch and juniper woodland along the true left bank of the Minapin Glacier. As the treeline thins, the glacier comes into full view — a grey, rumpled highway of ice stretching back toward the mountain's heart.</p>
<p>After approximately five to six hours of walking you reach <strong>Hakapun</strong>, a broad alpine meadow at 3,100 metres. In late afternoon the low sun catches Rakaposhi's south ridge and the ice turns shades of amber and rose; this is one of the most photographed sunsets in the Karakoram.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/12/Hike-towards-Hakapun-3.jpeg" alt="The trekking trail ascending towards Hakapun Meadow with Rakaposhi in the background" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h3>Day 3 – Hakapun to Rakaposhi Base Camp (~4,200m) — 5–7 hrs</h3>
<p>This is the defining day. The trail follows the glacier's edge, crossing boulder-strewn moraine ridges and ascending steadily through a landscape that grows more monochromatic with every metre of altitude gained — the green of the lower valleys replaced by grey stone, white ice, and the impossible blue of high-altitude sky.</p>
<p><strong>Base Camp</strong> sits at roughly 4,200 metres at the foot of Rakaposhi's south-east face. The mountain is simply overwhelming from here: a vertical kilometre and a half of ice, rock, and permanent snow towers directly above the campsite. To the east, Diran Peak (7,266m) presents its own imposing wall. On clear mornings — and the Karakoram is famous for its crystal dawn clarity — the silhouettes of these two giants are etched against a sky so deep blue it looks almost navy.</p>

<h3>Day 4 – Base Camp Rest Day / Diran Base Camp Excursion</h3>
<p>A day with no fixed destination is a luxury in mountain trekking, and it pays dividends here. The altitude benefits from a full acclimatisation day before descent; the scenery rewards prolonged attention. A recommended half-day walk follows the glacier margin eastward to the <strong>Diran Base Camp</strong>, revealing a completely different and equally spectacular aspect of the massif. Early afternoon clouds typically build after noon; mornings are almost always brilliantly clear.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/12/Hike-to-Beyal-Camp-1.jpeg" alt="High-altitude campsite with panoramic Karakoram views near Rakaposhi Base Camp" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h3>Days 5–6 – Descent to Minapin</h3>
<p>The descent reverses the ascent route, the now-familiar terrain seen in entirely different light — literally and figuratively. Looking down from Hakapun you can trace the full width of the Hunza Valley, with the faint thread of the KKH visible far below and the snow-capped silhouette of the Batura Wall on the far horizon. Back in Minapin, the transition from mountain wilderness to village warmth happens within a single afternoon.</p>

<h3>Days 7–8 – Return Journey</h3>
<p>The drive south along the Karakoram Highway retraces the approach, offering an opportunity to pause at the Eagle's Nest viewpoint above Duikar, from which the entire Hunza Valley — with Rakaposhi, Ultar Sar, Diran, and Bojahagur Duanasir II all visible simultaneously — spreads out in a panorama that is one of the great views of South Asia.</p>

<h2>Essential Information</h2>
<table>
  <tr><th>Duration</th><td>8 days (including approach/return drives)</td></tr>
  <tr><th>Maximum Altitude</th><td>~4,200m (Base Camp)</td></tr>
  <tr><th>Difficulty</th><td>Moderate</td></tr>
  <tr><th>Region</th><td>Minapin / Nagar Valley, Hunza-Nagar District, Gilgit-Baltistan</td></tr>
  <tr><th>Trekking Days</th><td>4 days active trekking</td></tr>
  <tr><th>Daily Walking</th><td>5–7 hours</td></tr>
  <tr><th>Best Season</th><td>June – October</td></tr>
  <tr><th>Permit Required</th><td>None (Open Zone)</td></tr>
  <tr><th>Trek Type</th><td>Out-and-back from Minapin</td></tr>
</table>

<h2>The People of Nagar Valley</h2>
<p>The villages you pass through are inhabited predominantly by Shia Muslim communities who speak <strong>Burushaski</strong>, one of the world's language isolates with no known relatives in any language family. The Nagar people have a multi-generational history of hosting mountaineers and trekkers — the first foreign expeditions to Rakaposhi arrived in the 1930s — and their warmth and curiosity transforms this trek from a physical challenge into a genuine cultural encounter. Chai (tea) offered at a roadside kitchen, a brief conversation with a farmer returning from his terraces, an invitation to observe a village festival: these are not incidental to the trek but central to it.</p>

<h2>What to Bring</h2>
<ul>
  <li>Layered clothing system: thermal base layer, fleece mid-layer, wind-proof outer shell</li>
  <li>Waterproof trekking boots (broken-in before the trek)</li>
  <li>Trekking poles for moraine sections</li>
  <li>Sleeping bag rated to at least -5°C</li>
  <li>Sun protection: SPF 50+ sunscreen, UV-blocking sunglasses, wide-brimmed hat</li>
  <li>Headlamp with spare batteries</li>
  <li>Water purification tablets or filter</li>
  <li>Basic first-aid kit including ibuprofen and altitude medication (consult your doctor)</li>
  <li>Camera with extra batteries (cold affects charge at altitude)</li>
</ul>

</div>
<!-- /wp:html -->
HTMLCONTENT;

raikot_insert_tour( [
    'title'      => 'Rakaposhi Base Camp Trek',
    'duration'   => '8',
    'difficulty' => 'Moderate',
    'location'   => 'Minapin, Nagar Valley, Hunza-Nagar',
    'price'      => 'Info Guide',
    'content'    => $rakaposhi_content,
] );

// ─────────────────────────────────────────────────────────────────────────────
// STEP 3 — Tour 2: Rush Lake Trek  ★ CRITICAL PRIORITY — MAXIMUM DETAIL ★
// ─────────────────────────────────────────────────────────────────────────────

$rush_lake_content = <<<'HTMLCONTENT'
<!-- wp:html -->
<div class="raikot-tour-guide">

<p>There are alpine lakes, and then there is <strong>Rush Lake</strong>. Perched at <strong>4,694 metres</strong> above sea level on a high ridge between the Hispar Valley and the snout of the Barpu Glacier in Nagar District, Rush Lake is widely considered one of the highest alpine lakes in the world — and arguably the most dramatically positioned. To reach it demands five days of honest trekking through terrain that ranges from the flower-filled ablation valleys of Hopar to scree-covered ridgelines from which the entire spine of the Central Karakoram is arrayed in a single, breathtaking panorama. The reward for that effort is a view from the lake's shore that encompasses <strong>K2</strong>, <strong>Broad Peak</strong>, the <strong>Gasherbrums</strong>, <strong>Snow Lake</strong>, the <strong>Hispar La</strong>, <strong>Ultar Sar</strong>, <strong>Rakaposhi</strong>, <strong>Diran</strong>, <strong>Spantik</strong>, <strong>Malubiting</strong>, and the Batura peaks — effectively every major summit in the Karakoram visible from a single vantage point. There is no other place in Pakistan, and very few places on earth, where so many seven- and eight-thousand-metre giants can be seen simultaneously from a position accessible to a non-technical trekker.</p>

<p>The Rush Lake Trek begins in <strong>Hopar</strong>, a cluster of small hamlets in Nagar District at approximately 2,750 metres. The route circumnavigates the enormous Barpu Glacier through a series of five separate glacier crossings, camps in high alpine pastures, and ascends a long steep ridge to the lake. For those who wish to go further, the summit of <strong>Rush Peak (5,098m)</strong> — also known as Rush Phari — rises above the lake and offers an even more commanding vantage point, achievable by fit, acclimatised trekkers without technical climbing equipment. This is a trek of progressive revelation: each camp reveals a wider and more astonishing view than the last, building to the extraordinary climax at the lake shore.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/07/Rush-Lake-Trek-800x375.jpg" alt="Rush Lake at 4,694m — one of the highest alpine lakes in the world, Nagar Valley, Pakistan" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h2>Why Rush Lake is One of Pakistan's Greatest Treks</h2>

<p>The Karakoram is the most heavily glaciated non-polar mountain range on earth, but most of its great treks require either multi-week commitments, technical mountaineering skills, or expensive permits. Rush Lake sits in a rare category: a trek of sufficient scale and seriousness to feel genuinely adventurous, demanding real fitness and several days at altitude, yet technically accessible to any prepared recreational trekker. There are no crevassed glaciers to cross roped-up, no ice axes required, and the route is open zone — no special permit.</p>

<p>What elevates it above comparable treks is the <em>density of the visual experience</em>. On the Baltoro Glacier, you see the Karakoram giants from below, looking up. At Rush Lake, you see them <em>across</em> — from a high ridge that places you level with, or even above, the approaches to several famous base camps. The sense of being embedded in the mountain landscape rather than merely observing it from below is unlike anything else in the region.</p>

<p>Additionally, the Hopar Valley and its surrounding villages represent one of the last genuinely traditional communities in Hunza-Nagar. The terraced fields, the ancient irrigation channels, the walnut and apricot orchards, the stone watchtowers — all speak to centuries of mountain-adapted agriculture. To walk through this landscape on the way to one of the world's highest lakes is to experience the full range of what makes northern Pakistan so extraordinary: immense natural beauty inseparably woven into deep human history.</p>

<h2>Trek Highlights</h2>
<ul>
  <li><strong>Rush Lake (4,694m)</strong> — one of the highest and most dramatically positioned alpine lakes on earth</li>
  <li>Summit option: <strong>Rush Peak / Rush Phari (5,098m)</strong> — no technical equipment required</li>
  <li>Simultaneous view of <strong>K2</strong>, Broad Peak, Gasherbrum I &amp; II, Snow Lake, and Hispar La</li>
  <li>Panorama of Hunza peaks: Ultar Sar (7,388m), Rakaposhi (7,788m), Diran (7,266m), Bojahagur Duanasir II</li>
  <li>Views of Spantik (7,027m), Malubiting (7,453m), Miar Peak, and Phuparash Peak</li>
  <li><strong>Five glacier crossings</strong> including the vast Barpu Glacier</li>
  <li>Nights in high alpine camps at Barpu Giram, Chidin Hara (4,333m), and Rush Lake Camp</li>
  <li>Traditional farming villages of Hopar Valley — flower-filled ablation meadows</li>
  <li>No special trekking permit required (Open Zone)</li>
  <li>Best season: June through September</li>
</ul>

<h2>The Approach: Understanding the Terrain</h2>

<p>The Hopar area — collectively comprising several small hamlets — sits at the upper end of the Nagar Valley at approximately 2,750 metres. The settlement is immediately downstream from the snout of the <strong>Bualtar Glacier</strong> (sometimes called the Hopar Glacier), a vast river of ice that descends from the Barpu and Hispar ice-fields above. The first challenge of the trek is crossing this glacier to access the ablation valleys and moraine ridges on the far side.</p>

<p>The route then follows what glaciologists call the <em>ablation valley</em> — the strip of relatively stable ground between the glacier's edge and the valley wall — north-east toward the Barpu Glacier's snout. Here the landscape is characterised by wildflower meadows, shepherd huts, seasonal cattle pastures, and views down the glacier that hint at the enormous scale of the ice-world above. The contrasts are vivid: fragrant pink roses and yellow primulas at your feet, the grinding grey chaos of the glacier to one side, and 7,000-metre peaks framed at the valley head.</p>

<p>Higher camps are progressively more exposed and more demanding. The ascent from <strong>Chidin Hara</strong> (4,333m) to Rush Lake involves more than three hours of continuous steep climbing on loose rock and gravel, a section that rewards patience and a deliberate pace. The lake itself, when it finally appears below a final ridge, is almost shockingly beautiful: a dark mirror of still water reflecting the ring of peaks that surrounds it, its surface disturbed only by the occasional clink of ice falling from a distant hanging glacier.</p>

<img src="https://hunzaexplorer.com/eeltoabe/2021/02/Rush-Lake-hopper-nagar-hunza-explorers-pakistan.webp" alt="Rush Lake surrounded by high Karakoram peaks, Hopar Valley, Nagar District" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h2>Day-by-Day Itinerary</h2>

<h3>Day 1 – Islamabad: Arrival and Briefing</h3>
<p>Arrive at Islamabad International Airport. Transfer to your hotel in the twin cities. In the evening, attend a trek briefing covering the route, altitude profile, weather expectations, equipment review, and emergency protocols. Islamabad itself is a pleasant city; the Margalla Hills immediately to the north are a first foretaste of the dramatic topography that awaits further north. Overnight in Islamabad.</p>

<h3>Day 2 – Islamabad to Chilas (1,265m): Drive via KKH — approx. 8–9 hrs</h3>
<p>Depart early along the <strong>Karakoram Highway</strong>, widely regarded as one of the greatest feats of road engineering in human history. Built jointly by Pakistan and China over more than two decades of work, the KKH runs 1,300 kilometres from Hasan Abdal near Islamabad to Kashgar in China, crossing terrain that includes deep Indus gorges, landslide-prone cliffs, and high mountain passes. The section between Islamabad and Chilas is one of the most visually dramatic: the highway follows the Indus River through a steadily tightening canyon, with near-vertical rock faces rising hundreds of metres on either side. At Chilas, the mountains begin in earnest. Overnight in Chilas hotel.</p>

<h3>Day 3 – Chilas to Hunza / Karimabad (2,400m): Drive via KKH — approx. 5–6 hrs</h3>
<p>Continue north on the KKH. The highway now passes along the base of Nanga Parbat's northern flank — the Raikot Face — providing close views of a mountain that is the western anchor of the entire Himalayan range. Crossing into the Hunza Valley proper, the landscape transforms: the stark brown cliffs of the Indus Gorge give way to the remarkable fertility of the Hunza terraces, green with wheat and potato fields, punctuated by the silver flash of irrigation channels. The town of Karimabad, perched on a bench high above the Hunza River with Rakaposhi and Ultar directly above it, is one of the most scenic small towns in Asia. Overnight in Karimabad.</p>

<h3>Day 4 – Karimabad to Hopar, then Trek to Barpu Giram Camp (3,100m) — 5–6 hrs trekking</h3>
<p>Drive from Karimabad down to the Nagar Valley floor and up to <strong>Hopar</strong> village — a journey of approximately one hour by jeep along a rough track. The trailhead at Hopar (2,750m) is the beginning of the trek proper. The first task is crossing the <strong>Bualtar/Hopar Glacier</strong> snout — a wide field of ice-polished boulders, meltwater channels, and unstable seracs. Local guides navigate this crossing expertly; for first-time glacier walkers it is a revelatory introduction to how glaciers actually look and behave.</p>
<p>Beyond the glacier crossing, the route enters the ablation valley: a protected corridor of meadows, seasonal camps, and grazing pastures between the glacier and the valley wall. <strong>Barpu Giram Camp</strong> (approximately 3,100m) sits in a wide green hollow with the first clear views northward up the Barpu Glacier toward its source in the Hispar ice-fields. Camping under canvas; your first night in the high Karakoram.</p>

<h3>Day 5 – Barpu Giram to Chidin Hara Camp (4,333m) — 6–7 hrs, +1,233m elevation gain</h3>
<p>This is the hardest day of the trek in terms of sustained effort. The trail climbs continuously from the ablation valley floor, ascending first through grassy slopes studded with edelweiss and alpine flowers, then transitioning to a scant path across loose scree and boulder fields. The route heads away from the Barpu Glacier, climbing east up a long, steep ridge. After approximately three hours of ascending — during which the views expand dramatically with every hundred metres of height — you reach a brief flatter section where lunch is typically taken, the first real opportunity to appreciate the scale of the Barpu Glacier below.</p>
<p>A further two to three hours of climbing above the lunch stop leads to <strong>Chidin Hara</strong> (4,333m), the high camp below Rush Lake. The name translates loosely as "the place where the views begin" in Burushaski, and it earns the name: from Chidin Hara you can already see summit flags on distant peaks, and the line of seven-thousand-metre giants stretching from Rakaposhi westward is clearly defined against the sky. This camp is critical for acclimatisation — a full night here before pushing to the lake is strongly recommended.</p>

<h3>Day 6 – Chidin Hara to Rush Lake Camp (4,694m) — 3–4 hrs, +361m elevation gain</h3>
<p>The final ascent to Rush Lake is comparatively short in distance but significant in emotional weight. The trail climbs a final scree ridge, rounds a shoulder of rock, and then — suddenly — the lake appears in a natural bowl below the ridge line. <strong>Rush Lake</strong>, at 4,694 metres, is roughly 500 metres long and 200 metres wide, its colour shifting through shades of steel-grey, deep cobalt, and — in morning light — an extraordinary translucent green. It is entirely fed by snowmelt and small glaciers on the surrounding slopes and remains frozen well into June.</p>
<p>From the lake shore and the ridges immediately above it, the full 360-degree panorama unfolds. The view northward is one of the most extraordinary in all of mountaineering geography: K2 (8,611m), Broad Peak (8,051m), Gasherbrum I (8,080m), and Gasherbrum II (8,035m) are all visible on a clear day, arrayed across the horizon above the Hispar Glacier. To the west, Rakaposhi (7,788m) and Diran (7,266m) dominate; to the south, Malubiting (7,453m) and Spantik (7,027m); to the north, the peaks of the Hispar Muztagh. It is a view that silences conversation.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/07/rush-phari.jpg" alt="Rush Peak (Rush Phari) at 5,098m above Rush Lake, Karakoram, Pakistan" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h3>Day 7 – Rush Lake: Rest, Exploration, and Optional Rush Peak Ascent (5,098m)</h3>
<p>A full day based at the lake allows for acclimatisation recovery, photography, and extended exploration of the surrounding ridges. The primary optional objective is the summit of <strong>Rush Peak (Rush Phari)</strong> at 5,098 metres — the highest point of the trek route. The ascent from camp takes approximately 3–4 hours on firm scree and rock; no technical equipment is required beyond trekking poles and good footwear. The summit view adds roughly 400 metres of elevation to the lake view and extends the visible horizon further into the Central Karakoram.</p>
<p>Even without the summit, a day at Rush Lake is exceptional: the quality of light at altitude, the absolute silence punctuated only by wind and distant ice-fall, the sense of being completely embedded in the mountain landscape rather than observing it from below — these constitute an experience that is very difficult to describe and very easy to remember.</p>

<h3>Day 8 – Rush Lake to Baricho Kor Camp (3,300m) — 7–8 hrs, −1,394m descent</h3>
<p>The descent is long and demands concentration — steep, loose terrain that punishes tired legs and inattentive footwork. Trekking poles are invaluable. The route descends back through Chidin Hara and continues down the western glacier margins toward <strong>Baricho Kor</strong> (Bericho Cor), a camp at approximately 3,300 metres that marks the transition from high mountain to the agricultural approaches of Hopar. The afternoon light on the glacier below as you descend is spectacular.</p>

<h3>Day 9 – Baricho Kor to Hopar, then Drive to Karimabad — 4–5 hrs trekking + drive</h3>
<p>A final morning of trekking returns you to Hopar village, with the glacier re-crossed and the scent of valley flowers and wood smoke replacing the thin cold air of altitude. Jeep transfer to Karimabad for overnight. A hot shower and a full meal at altitude elevation feels like an extraordinary luxury after six days of camping. Overnight in Karimabad.</p>

<h3>Days 10–12 – Hunza Sightseeing and Return</h3>
<p>A day in the Hunza Valley provides a fitting coda to the trek. <strong>Baltit Fort</strong>, the nine-centuries-old seat of the Mir of Hunza, commands the valley from a rock spur above Karimabad; <strong>Altit Fort</strong>, older still, sits on a cliff directly above the Hunza River. The <strong>Duikar viewpoint</strong> above the village of Duikar offers the definitive panorama of the valley, with Rakaposhi, Ultar Sar, Diran, and the full length of the Hunza terraces visible in a single photograph. Return drive to Islamabad via the KKH over two days.</p>

<h2>Essential Information</h2>
<table>
  <tr><th>Total Duration</th><td>10 days (trekking-focused programme)</td></tr>
  <tr><th>Trek Duration</th><td>6 active trekking days</td></tr>
  <tr><th>Maximum Altitude</th><td>4,694m (Rush Lake) / 5,098m (Rush Peak, optional)</td></tr>
  <tr><th>Difficulty</th><td>Moderate to Challenging</td></tr>
  <tr><th>Daily Walking</th><td>4–8 hours depending on stage</td></tr>
  <tr><th>Region</th><td>Hopar Valley, Nagar District, Gilgit-Baltistan</td></tr>
  <tr><th>Starting Point</th><td>Hopar Village (2,750m) from Karimabad</td></tr>
  <tr><th>Best Season</th><td>Late June through September</td></tr>
  <tr><th>Permit Required</th><td>None (Open Zone)</td></tr>
  <tr><th>Glacier Crossings</th><td>5 (including Bualtar and Barpu Glaciers)</td></tr>
  <tr><th>Trek Type</th><td>Out-and-back via Hopar Valley</td></tr>
</table>

<h2>Fitness and Preparation</h2>

<p>Rush Lake is classified as <em>moderate-to-challenging</em>, and that classification should be taken seriously. Day 5 — the ascent from Barpu Giram to Chidin Hara — involves more than 1,200 metres of elevation gain in a single day, much of it on loose terrain. Trekkers should be comfortable walking <strong>6–8 hours</strong> on the longest days, carrying a daypack of 8–10 kilograms, on terrain that includes gravel, boulders, scree, and glacier moraine.</p>

<p>Prior high-altitude experience above 3,500 metres is strongly recommended. Altitude sickness (AMS) is possible above 3,000 metres for anyone; at Rush Lake (4,694m) it is a genuine risk for the unprepared. The acclimatisation schedule built into this itinerary — with night stops at progressively increasing altitudes and a full rest day at Chidin Hara before the final push — is designed to minimise this risk, but cannot eliminate it entirely. Carry altitude medication; consult your doctor before departure.</p>

<h2>The Glacier Environment: What to Expect</h2>

<p>The five glacier crossings are the element of Rush Lake that most surprises first-time visitors to the Karakoram. Glaciers here are not the clean white surfaces of popular imagination; they are complex, dirty, constantly moving landscapes of ice, rock debris, meltwater pools, and ice-cored moraine. The Bualtar and Barpu Glaciers are among the longest in the Karakoram outside the Baltoro region, and walking across their snouts is a lesson in glacial geomorphology made viscerally real.</p>

<p>The crossings are not technically difficult — they require no crampons or ice axes — but they demand careful footwork on unstable surfaces and attention to your guide's route-finding. The glaciers move; a safe crossing line in July may be different from the same line in August. Your local guide will have current knowledge of the safest lines.</p>

<h2>The Villages of Hopar and Nagar</h2>

<p>The communities of Hopar — <strong>Hopar Halang</strong> and <strong>Hopar Phali</strong> — are Burushaski-speaking, predominantly Shia Muslim villages that have maintained their traditional agricultural system for centuries. The village economy is built around polyculture: wheat, potatoes, millet, and an extraordinary variety of fruit trees — apricot, apple, cherry, walnut, mulberry — grown on intricately terraced hillsides irrigated by channels that divert glacial meltwater from the valley walls. Walking through these orchards in early morning, before the heat of the day and before most of the village is awake, is one of the small pleasures of the trek approach.</p>

<p>The pastoral camps of the high ablation valleys — <strong>Barpu Giram</strong> and others — are still used seasonally by herders who drive their cattle up from the valley villages each summer. The relationship between the high pastures and the low villages is ancient and precisely managed: every family has hereditary rights to specific grazing grounds, and the movement of animals up and down the mountain follows a schedule unchanged in its essentials for generations.</p>

<h2>Weather and Seasonal Considerations</h2>

<p>The best trekking window is <strong>late June through mid-September</strong>. In June the lower valleys are in full bloom, but the high camps — especially Rush Lake — may still have significant snow cover, which adds beauty but also demands waterproof gaiters and care on frozen morning surfaces. July and August offer the most stable conditions: long days, reliable sunshine in the mornings, and the glaciers at their maximum seasonal melt (which paradoxically makes them safer to cross, as surface ice is softer). By September the days have shortened, temperatures at high camp drop sharply overnight, and the first autumn tints begin to appear in the Hopar orchards.</p>

<p>The Karakoram is generally more arid than the western Himalayas; monsoon influence barely reaches this far north. Afternoon cloud build-up is common throughout summer, but violent storms are relatively rare by Himalayan standards. The primary weather hazard is sustained high winds at altitude, which can make camps uncomfortable and reduce visibility.</p>

</div>
<!-- /wp:html -->
HTMLCONTENT;

raikot_insert_tour( [
    'title'      => 'Rush Lake Trek',
    'duration'   => '10',
    'difficulty' => 'Moderate – Challenging',
    'location'   => 'Hopar Valley, Nagar District, Gilgit-Baltistan',
    'price'      => 'Info Guide',
    'content'    => $rush_lake_content,
] );

// ─────────────────────────────────────────────────────────────────────────────
// STEP 3 — Tour 3: Rupal Base Camp Trek
// ─────────────────────────────────────────────────────────────────────────────

$rupal_content = <<<'HTMLCONTENT'
<!-- wp:html -->
<div class="raikot-tour-guide">

<p><strong>Nanga Parbat</strong> (8,125m) is the western sentinel of the Himalayas — the ninth-highest mountain on earth, the last of the great 8,000-metre peaks to be summited, and one of the most dangerous mountains ever attempted by human climbers. It earned the German nickname <em>Killer Mountain</em> not from malice but from mathematics: by the 1950s more climbers had died on its slopes than on any other mountain. But Nanga Parbat's power is not only in its danger. It is also one of the most visually astonishing mountains on earth — and nowhere is this more apparent than from the south, where the <strong>Rupal Face</strong> rises more than <strong>5,000 metres</strong> from the floor of the Rupal Valley to the summit ice-cap in a single, virtually unbroken wall of rock and ice.</p>

<p>The Rupal Face is the highest mountain face on earth. From Tarashing village, looking directly north, you see it in its entirety: a vertical immensity of dark schist and glittering ice that seems, impossibly, to continue rising beyond what perspective suggests is possible. Mountaineers come from across the world specifically to stand at the foot of this wall and absorb its scale. The <strong>Rupal Base Camp Trek</strong> takes you there — and beyond, into the high glacial basin directly beneath Nanga Parbat's southern approaches.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/10/IMG-20190807-WA0061.jpg" alt="Nanga Parbat's Rupal Face — the world's highest mountain wall — from the Rupal Valley approach" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h2>The Rupal Valley: Geography and History</h2>

<p>The Rupal Valley cuts northward from the main Astore Valley through increasingly dramatic terrain, ending beneath the south face of Nanga Parbat at the small farming village of <strong>Tarashing</strong> (2,900m). The valley is geologically ancient; Nanga Parbat itself is one of the most rapidly uplifting mountains on earth, rising at a measurable rate even today as the Indian tectonic plate continues its northward collision with Asia. The Rupal, Tarashing, and Ganalo glaciers that descend from the massif feed the Astore River, which eventually joins the Indus.</p>

<p>Mountaineering history in the Rupal Valley is long and vivid. The first serious expedition to Nanga Parbat attempted the Rupal Face in 1934 under Willo Welzenbach and Willy Merkl; the mountain claimed the lives of nine expedition members in a storm. Subsequent expeditions — in 1937, 1938, 1939 — were similarly catastrophic. The peak was finally summited on July 3, 1953, by the Austrian climber <strong>Hermann Buhl</strong>, alone and without supplemental oxygen, in one of the most extraordinary feats of individual mountaineering in the sport's history. The <strong>Alfred Drexel Monument</strong> in the Rupal Valley commemorates the alpinist who died here during the 1934 expedition — a poignant stone marker in a landscape of extraordinary beauty and considerable peril.</p>

<h2>Trek Highlights</h2>
<ul>
  <li>The <strong>Rupal Face</strong> — the world's highest mountain wall, 5,000m of vertical rise from valley floor to summit</li>
  <li><strong>Nanga Parbat (8,125m)</strong> — the Killer Mountain, ninth-highest peak on earth</li>
  <li>Approach through pine and birch forests of the Astore Valley</li>
  <li>Crossing the <strong>Tarashing Glacier</strong> to the southern base camp approaches</li>
  <li><strong>Mazeno Lower Base Camp (4,200m)</strong> with close-range views of the Mazeno Ridge</li>
  <li>Optional ascent toward <strong>Mazeno Pass</strong> — one of the great high passes of the western Himalayas</li>
  <li>Visit to the historic <strong>Alfred Drexel Monument</strong></li>
  <li>Optional Fairy Meadows extension for views of Nanga Parbat's north face</li>
  <li>Cultural immersion in Astore Valley Shina-speaking communities</li>
  <li>Ganalo Glacier crossing en route to Fairy Meadows extension</li>
</ul>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/10/IMG-20190806-WA0113.jpg" alt="Trekkers on the trail to Rupal Base Camp with Nanga Parbat's south face visible above" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h2>Day-by-Day Itinerary</h2>

<h3>Day 1 – Islamabad: Arrival</h3>
<p>Arrive Islamabad International Airport. Transfer to hotel and a tour briefing covering the route, acclimatisation strategy, equipment requirements, and emergency procedures. Islamabad's wide tree-lined avenues and proximity to the Margalla Hills make it an unusually pleasant South Asian capital; the <strong>Shah Faisal Mosque</strong>, one of the largest in the world, is a short drive from most hotels and worth visiting before departure. Overnight Islamabad.</p>

<h3>Day 2 – Islamabad to Chilas (1,265m) — 450km via KKH, approx. 8–9 hrs</h3>
<p>An early departure is essential for this long drive. The Karakoram Highway is followed north through the plains of the Potohar Plateau, then into the Indus Gorge where the road — hacked directly from cliff faces in some sections — follows the ancient trade route that once carried silk, spices, and Buddhist scripture between Central Asia and the subcontinent. The scale of the gorge, and the proximity of Nanga Parbat's north face above Chilas, prepares the mind for the mountain world ahead. Overnight in Chilas.</p>

<h3>Day 3 – Chilas to Tarashing (2,900m) — drive to Astore Valley via local roads</h3>
<p>Leaving the KKH at Raikot Bridge, the route heads south-east into the <strong>Astore Valley</strong> — a different Pakistan from the Hunza corridor, less visited and more austere, its villages Shina-speaking and predominantly Sunni Muslim. The valley narrows progressively as you drive toward Tarashing, the scenery evolving from open brown hillsides to pine-forested slopes and eventually to the intimate scale of a high mountain glen. From Tarashing (2,900m), the first full view of the <strong>Rupal Face</strong> opens to the north. It is one of the definitive mountain views of Asia.</p>

<h3>Day 4 – Tarashing to Behzin Camp — Trek via Tarashing Glacier, 5–6 hrs</h3>
<p>The first day's trek crosses the snout of the <strong>Tarashing Glacier</strong> — a moderately complex crossing of boulder-strewn ice that immediately establishes the nature of the terrain ahead. Beyond the glacier, the route follows ablation meadows northward toward the mountain's southern base areas. <strong>Behzin Camp</strong> is a traditional shepherd's ground set in lush pasture; at night the stars above the Rupal Face are spectacular, the mountain's silhouette blotting out an enormous section of the southern sky.</p>

<h3>Day 5 – Behzin to Latoba Base Camp — 4 hrs</h3>
<p>A shorter day, allowing time for acclimatisation and exploration. The trail continues up the valley, crossing further glacier outwash fans and moraine ridges to reach <strong>Latoba</strong> — the traditional base camp for the Rupal Face approach. At Latoba, Nanga Parbat's south face is now overhead rather than merely in front of you; the scale of the wall becomes psychologically overwhelming. Local porters and guides will often point out the route lines of historic expeditions on the face above.</p>

<h3>Day 6 – Latoba to Mazeno Lower Base Camp (4,200m) — 5–6 hrs</h3>
<p>This is the highest camp on the standard Rupal trek. The trail climbs steadily northward and eastward, passing increasingly glaciated terrain to reach the <strong>Mazeno Lower Base Camp</strong> at 4,200 metres. From here the <strong>Mazeno Ridge</strong> — a technically demanding mountaineering objective in its own right, running for more than ten kilometres along the western horizon of the face — dominates the view. To the east, the peak of <strong>Toshain</strong> and the subsidiary ridges of the Rupal buttresses frame the camp. The silence here, at altitude, in one of the remotest mountain basins in South Asia, is absolute.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/10/IMG-20190806-WA0095.jpg" alt="High alpine terrain near Mazeno Lower Base Camp with Nanga Parbat's ridgeline above" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h3>Day 7 – Mazeno Lower BC: Exploration Day</h3>
<p>A day based at 4,200 metres allows a rest and acclimatisation, supplemented by walks on the surrounding moraines and ridges. Ambitious trekkers can push toward the lower slopes of the <strong>Mazeno Pass</strong> for even wider views; this involves an additional 300–500 metres of ascent on steep scree and demands good fitness. The afternoon clouds that typically build over the Rupal Face create theatrical, constantly changing light conditions that reward the patient photographer.</p>

<h3>Days 8–9 – Descent: Mazeno BC to Latoba to Tarashing</h3>
<p>The descent retraces the ascent route, covering in two days what took three on the way up. The Tarashing Glacier crossing, repeated in the opposite direction, completes the high-mountain section of the trek. Back in Tarashing, the warmth of a valley settlement — food cooked on a woodfire, the smell of pine resin, the sound of the river — provides a welcome transition from the world of rock and ice above.</p>

<img src="https://karakorumadventure.com.pk/wp-content/uploads/2019/10/IMG-20190806-WA0089.jpg" alt="Trekking through the Rupal Valley with Nanga Parbat's Rupal Face in the background" style="width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.15);margin:2rem 0;">

<h3>Day 10 – Tarashing to Raikot Bridge; Optional Extension to Fairy Meadows</h3>
<p>The drive from Tarashing back to the KKH at Raikot Bridge opens the option of a completely different perspective on Nanga Parbat: the northern approach via <strong>Fairy Meadows</strong>. A short jeep ride up the Tato track and a four-hour walk through pine forest leads to the famous meadow at 3,300 metres, from which Nanga Parbat's north-west face — the Raikot Face — is visible in its full height. This is the approach used by Hermann Buhl before his historic 1953 first ascent. An excursion to the <strong>North Face Base Camp</strong> (4,000m), crossing the Ganalo Glacier en route, adds another half-day and is highly recommended for those with the energy.</p>

<h3>Days 11–12 – Return to Islamabad</h3>
<p>The final drive south along the KKH provides a last long look at the mountains before the highway descends into the plains. A stop at <strong>Taxila</strong>, Pakistan's great Gandharan Buddhist archaeological site and a UNESCO World Heritage site, provides an extraordinary cultural counterpoint to the mountain immersion of the previous ten days. Overnight in Chilas or direct return to Islamabad depending on schedule.</p>

<h2>Essential Information</h2>
<table>
  <tr><th>Total Duration</th><td>12 days</td></tr>
  <tr><th>Trek Duration</th><td>7 active trekking days</td></tr>
  <tr><th>Maximum Altitude</th><td>4,200m (Mazeno Lower Base Camp)</td></tr>
  <tr><th>Difficulty</th><td>Challenging</td></tr>
  <tr><th>Daily Walking</th><td>5–7 hours</td></tr>
  <tr><th>Region</th><td>Rupal Valley, Astore District, Gilgit-Baltistan</td></tr>
  <tr><th>Trailhead</th><td>Tarashing Village (2,900m)</td></tr>
  <tr><th>Best Season</th><td>June – September</td></tr>
  <tr><th>Permit Required</th><td>None (Open Zone)</td></tr>
  <tr><th>Key Glaciers</th><td>Tarashing Glacier, Ganalo Glacier (optional)</td></tr>
</table>

<h2>Physical Requirements</h2>

<p>The Rupal trek is classified as <em>challenging</em>. The combination of significant daily altitude gain, glacier crossings, high-altitude camp (4,200m), and the remote nature of the Astore Valley means that this trek demands genuine preparation. Trekkers should have prior experience of multi-day mountain trekking above 3,000 metres. The ascent to Mazeno Lower BC at 4,200 metres should not be underestimated; altitude sickness is a real risk and descent is the only reliable treatment.</p>

<p>The remoteness of the Rupal Valley is one of its great attractions but also a practical constraint: evacuation in an emergency is significantly slower and more difficult here than in the more accessible Hunza or Baltoro regions. Good travel insurance with helicopter evacuation cover is essential.</p>

<h2>The Astore Valley and its Communities</h2>

<p>The Astore Valley is home to <strong>Shina</strong>-speaking communities — linguistically and culturally distinct from the Burushaski-speaking peoples of Hunza and Gilgit. The Astore Shinaki maintain a pastoral economy centred on transhumance: moving cattle between the high summer pastures (where your trek camps will be set) and the valley-floor villages for winter. The region sees far fewer foreign trekkers than Hunza or the Baltoro, and the encounters you have with local communities — curious, warm, without the commercial veneer that sometimes develops in more tourist-frequented areas — are among the most authentic available anywhere in northern Pakistan.</p>

<p>The pine and birch forests of the lower Astore Valley are in themselves remarkable: some of the last intact high-altitude conifer forests in the western Himalayas, managed by local communities under traditional forestry rights. Walking through them on the approach to Tarashing, with the smell of resin and the sound of the river, provides a vivid contrast to the stark ice-and-rock world of the upper Rupal.</p>

</div>
<!-- /wp:html -->
HTMLCONTENT;

raikot_insert_tour( [
    'title'      => 'Rupal Base Camp Trek',
    'duration'   => '12',
    'difficulty' => 'Challenging',
    'location'   => 'Rupal Valley, Astore District, Gilgit-Baltistan',
    'price'      => 'Info Guide',
    'content'    => $rupal_content,
] );

// ─────────────────────────────────────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────────────────────────────────────
WP_CLI::log( '' );
WP_CLI::log( '=== Seeding Complete ===========================================' );
WP_CLI::log( '' );
WP_CLI::success( 'All tours inserted. Run `wp post list --post_type=tour` to verify.' );
