<?php
/**
 * Template Name: Tours Page
 */
get_header(); ?>

<!-- PAGE BANNER -->
<div class="page-banner" style="background:var(--ap-navy)">
  <div class="page-banner-bg" style="background-image:url('http://raikottours.local/wp-content/uploads/2026/03/IMG_2557.jpg')"></div>
  <div class="page-banner-overlay"></div>
  <div class="container">
    <div class="page-banner-content">
      <h1>Our Tours</h1>
      <div class="breadcrumb"><a href="<?php echo home_url('/'); ?>">Home</a><span>/</span><span>Tours</span></div>
    </div>
  </div>
</div>

<!-- EXPEDITION DESTINATIONS -->
<section class="section">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">🌍 Our Expedition Destinations</span>
      <h2>All Tours & Packages</h2>
      <p>Choose from our wide range of carefully crafted tours across Pakistan's most spectacular destinations</p>
    </div>

    <!-- Hunza -->
    <div id="hunza" style="margin-bottom:60px">
      <h3 style="color:var(--ap-green);margin-bottom:24px;display:flex;align-items:center;gap:10px;font-size:1.4rem">
        <i class="fas fa-mountain"></i> Hunza Valley Tours
      </h3>
      <div class="tours-grid">
        <?php
        $hunza_tours = [
          ['Hunza Valley 7-Day Tour','http://raikottours.local/wp-content/uploads/2026/03/IMG_2559.jpg','$850','7 Days','Easy','4.9','Gilgit-Baltistan'],
          ['Hunza & Attabad Lake Tour','http://raikottours.local/wp-content/uploads/2026/03/IMG_2196.jpg','$750','5 Days','Easy','4.8','Hunza'],
          ['Complete Hunza Valley Experience','http://raikottours.local/wp-content/uploads/2026/03/BAB28483-4E82-4F99-AB63-812457AAA39A.jpg','$1,100','9 Days','Moderate','5.0','Hunza, Gilgit'],
        ];
        foreach ($hunza_tours as $t): ?>
        <div class="tour-card">
          <div class="tour-card-thumb">
            <img src="<?php echo esc_url($t[1]); ?>" alt="<?php echo esc_html($t[0]); ?>">
            <span class="badge"><?php echo $t[6]; ?></span>
            <span class="rating"><i class="fas fa-star"></i> <?php echo $t[5]; ?></span>
          </div>
          <div class="tour-card-body">
            <h3><a href="<?php echo home_url('/contact'); ?>"><?php echo esc_html($t[0]); ?></a></h3>
            <div class="tour-meta">
              <span><i class="fas fa-clock"></i> <?php echo $t[3]; ?></span>
              <span><i class="fas fa-signal"></i> <?php echo $t[4]; ?></span>
              <span><i class="fas fa-users"></i> Group / Private</span>
            </div>
            <div class="tour-card-footer">
              <div class="price"><?php echo $t[2]; ?><small> / Person</small></div>
              <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green btn-sm">Book Now</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Skardu -->
    <div id="skardu" style="margin-bottom:60px">
      <h3 style="color:var(--ap-green);margin-bottom:24px;display:flex;align-items:center;gap:10px;font-size:1.4rem">
        <i class="fas fa-water"></i> Skardu Tours
      </h3>
      <div class="tours-grid">
        <?php
        $skardu_tours = [
          ['Skardu & Shangrila Resort Tour','http://raikottours.local/wp-content/uploads/2026/03/IMG_3499.jpg','$850','6 Days','Easy','4.7','Skardu'],
          ['Deosai Plains Adventure','http://raikottours.local/wp-content/uploads/2026/03/IMG_3937.jpg','$700','5 Days','Moderate','4.8','Deosai'],
          ['K2 Base Camp Expedition','https://adventurepakistan.com/wp-content/uploads/2023/08/k2concondia-500x360.jpg','$2,700','22 Days','Challenging','4.9','K2, Concordia'],
        ];
        foreach ($skardu_tours as $t): ?>
        <div class="tour-card">
          <div class="tour-card-thumb">
            <img src="<?php echo esc_url($t[1]); ?>" alt="<?php echo esc_html($t[0]); ?>">
            <span class="badge"><?php echo $t[6]; ?></span>
            <span class="rating"><i class="fas fa-star"></i> <?php echo $t[5]; ?></span>
          </div>
          <div class="tour-card-body">
            <h3><a href="<?php echo home_url('/contact'); ?>"><?php echo esc_html($t[0]); ?></a></h3>
            <div class="tour-meta">
              <span><i class="fas fa-clock"></i> <?php echo $t[3]; ?></span>
              <span><i class="fas fa-signal"></i> <?php echo $t[4]; ?></span>
              <span><i class="fas fa-users"></i> Group / Private</span>
            </div>
            <div class="tour-card-footer">
              <div class="price"><?php echo $t[2]; ?><small> / Person</small></div>
              <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green btn-sm">Book Now</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Naran -->
    <div id="naran" style="margin-bottom:60px">
      <h3 style="color:var(--ap-green);margin-bottom:24px;display:flex;align-items:center;gap:10px;font-size:1.4rem">
        <i class="fas fa-leaf"></i> Naran Kaghan Tours
      </h3>
      <div class="tours-grid">
        <?php
        $naran_tours = [
          ['Naran Kaghan Valley Tour','http://raikottours.local/wp-content/uploads/2026/03/IMG_1591.jpg','$750','5 Days','Easy','4.8','Kaghan Valley'],
          ['Shogran & Siri Paye Tour','http://raikottours.local/wp-content/uploads/2026/03/IMG_2557.jpg','$600','4 Days','Easy','4.7','Shogran'],
          ['Lulusar Lake Explorer','http://raikottours.local/wp-content/uploads/2026/03/IMG_2584.jpg','$800','6 Days','Moderate','4.8','Naran'],
        ];
        foreach ($naran_tours as $t): ?>
        <div class="tour-card">
          <div class="tour-card-thumb">
            <img src="<?php echo esc_url($t[1]); ?>" alt="<?php echo esc_html($t[0]); ?>">
            <span class="badge"><?php echo $t[6]; ?></span>
            <span class="rating"><i class="fas fa-star"></i> <?php echo $t[5]; ?></span>
          </div>
          <div class="tour-card-body">
            <h3><a href="<?php echo home_url('/contact'); ?>"><?php echo esc_html($t[0]); ?></a></h3>
            <div class="tour-meta">
              <span><i class="fas fa-clock"></i> <?php echo $t[3]; ?></span>
              <span><i class="fas fa-signal"></i> <?php echo $t[4]; ?></span>
              <span><i class="fas fa-users"></i> Group / Private</span>
            </div>
            <div class="tour-card-footer">
              <div class="price"><?php echo $t[2]; ?><small> / Person</small></div>
              <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green btn-sm">Book Now</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Fairy Meadows -->
    <div id="fairy">
      <h3 style="color:var(--ap-green);margin-bottom:24px;display:flex;align-items:center;gap:10px;font-size:1.4rem">
        <i class="fas fa-star"></i> Fairy Meadows Tours
      </h3>
      <div class="tours-grid">
        <?php
        $fairy_tours = [
          ['Fairy Meadows 5-Day Tour','http://raikottours.local/wp-content/uploads/2026/03/IMG_1983.jpg','$750','5 Days','Moderate','4.9','Diamer'],
          ['Nanga Parbat Base Camp Trek','http://raikottours.local/wp-content/uploads/2026/03/IMG_3524.jpg','$950','7 Days','Challenging','4.8','Nanga Parbat'],
          ['Fairy Meadows & Raikot Bridge','http://raikottours.local/wp-content/uploads/2026/03/8FF2C27C-37B6-4483-9A1C-7583CEA2C7B7.jpg','$850','6 Days','Moderate','5.0','Fairy Meadows'],
        ];
        foreach ($fairy_tours as $t): ?>
        <div class="tour-card">
          <div class="tour-card-thumb">
            <img src="<?php echo esc_url($t[1]); ?>" alt="<?php echo esc_html($t[0]); ?>">
            <span class="badge"><?php echo $t[6]; ?></span>
            <span class="rating"><i class="fas fa-star"></i> <?php echo $t[5]; ?></span>
          </div>
          <div class="tour-card-body">
            <h3><a href="<?php echo home_url('/contact'); ?>"><?php echo esc_html($t[0]); ?></a></h3>
            <div class="tour-meta">
              <span><i class="fas fa-clock"></i> <?php echo $t[3]; ?></span>
              <span><i class="fas fa-signal"></i> <?php echo $t[4]; ?></span>
              <span><i class="fas fa-users"></i> Group / Private</span>
            </div>
            <div class="tour-card-footer">
              <div class="price"><?php echo $t[2]; ?><small> / Person</small></div>
              <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green btn-sm">Book Now</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- WHY TRAVEL WITH US -->
<section class="section why-section">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label" style="color:var(--ap-green-light)">⭐ Why Travel With Us?</span>
      <h2 style="color:var(--ap-white)">The Difference We Make</h2>
    </div>
    <div class="why-grid">
      <div class="why-card"><div class="why-icon"><i class="fas fa-route"></i></div><h4>Tailored Itineraries</h4><p>Every tour is crafted to match your interests, pace, and budget — no cookie-cutter packages.</p></div>
      <div class="why-card"><div class="why-icon"><i class="fas fa-user-tie"></i></div><h4>Professional Guides</h4><p>Experienced, English-speaking guides who treat you like family throughout the journey.</p></div>
      <div class="why-card"><div class="why-icon"><i class="fas fa-hotel"></i></div><h4>Quality Accommodation</h4><p>Carefully selected hotels, guesthouses, and camps — comfortable stays at every destination.</p></div>
      <div class="why-card"><div class="why-icon"><i class="fas fa-car"></i></div><h4>Reliable Transport</h4><p>Modern, well-maintained 4x4 vehicles driven by experienced drivers on all mountain roads.</p></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-banner">
  <div class="container">
    <div class="cta-content">
      <h2>Can't Find the Right Tour?</h2>
      <p>We create custom tours tailored exactly to your needs. Tell us where you want to go and we'll plan everything for you.</p>
      <div class="cta-btns">
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green"><i class="fas fa-pen"></i> Request Custom Tour</a>
        <a href="https://wa.me/923554518486" class="btn btn-outline" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp Us</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
