<?php get_header(); ?>

<!-- HERO WITH VIDEO -->
<section class="hero">
  <div class="hero-video-wrap">
    <video class="hero-video" autoplay muted loop playsinline style="animation: none;" onloadedmetadata="this.playbackRate=0.6;">
      <source src="http://raikottours.local/wp-content/uploads/2026/03/hero-video.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
  </div>
  <div class="container">
    <div class="hero-content">
      <div class="hero-tagline"><i class="fas fa-mountain"></i> Explore Northern Pakistan</div>
      <h1>Welcome to the place where <em>true adventure begins</em></h1>
      <p>Discover the unparalleled beauty of Pakistan with us. From the majestic peaks of the Himalayas to the serene valleys of the Karakoram, we bring you closer to nature, culture, and adventure.</p>
      <div class="hero-btns">
        <a href="<?php echo home_url('/our-tours'); ?>" class="btn btn-green"><i class="fas fa-compass"></i> Explore Tours</a>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline"><i class="fas fa-phone"></i> Talk to Us</a>
      </div>
    </div>
  </div>
  <div class="hero-stats">
    <div class="container">
      <div class="hero-stats-inner">
        <div class="stat-box"><span class="stat-num">500+</span><span class="lbl">Tours Completed</span></div>
        <div class="stat-box"><span class="stat-num">5,000+</span><span class="lbl">Happy Travelers</span></div>
        <div class="stat-box"><span class="stat-num">50+</span><span class="lbl">Destinations</span></div>
        <div class="stat-box"><span class="stat-num">10+</span><span class="lbl">Years Experience</span></div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED TOURS CAROUSEL -->
<section class="section" style="background:#0f1e0a;padding:70px 0;">
  <div class="container">
    <div class="section-head text-center" style="margin-bottom:40px;">
      <span class="sub-label" style="color:#a3c96e;">HAND-PICKED EXPERIENCES</span>
      <h2 style="color:#fff;">Featured Tours</h2>
      <p style="color:rgba(255,255,255,.6);">Explore our most-loved adventures across Pakistan's stunning northern regions</p>
    </div>
    <div style="position:relative;overflow:hidden;">
      <div id="toursCarousel" style="display:flex;gap:24px;transition:transform .5s cubic-bezier(.22,1,.36,1);">
        <?php
        $tours = [
          ['Hunza Valley 7-Day Tour',    'http://raikottours.local/wp-content/uploads/2026/03/IMG_2559.jpg', '$850',   '7 Days',  'Easy',     '4.9'],
          ['Fairy Meadows Tour',          'http://raikottours.local/wp-content/uploads/2026/03/IMG_1983.jpg', '$750',   '5 Days',  'Moderate', '4.8'],
          ['Skardu & Shangrila',          'http://raikottours.local/wp-content/uploads/2026/03/IMG_3787.jpg', '$850',   '6 Days',  'Easy',     '4.7'],
          ['Naran Kaghan Valley',         'http://raikottours.local/wp-content/uploads/2026/03/IMG_1591.jpg', '$750',   '5 Days',  'Easy',     '4.8'],
          ['9-Days North Pakistan',       'http://raikottours.local/wp-content/uploads/2026/03/IMG_2196.jpg', '$1,200', '9 Days',  'Moderate', '5.0'],
          ['12-Days Complete North Tour', 'http://raikottours.local/wp-content/uploads/2026/03/IMG_3499.jpg', '$1,600', '12 Days', 'Moderate', '5.0'],
          ['Deosai Plains Adventure',     'http://raikottours.local/wp-content/uploads/2026/03/IMG_3937.jpg', '$700',   '5 Days',  'Moderate', '4.8'],
          ['Attabad Lake & Hunza',        'http://raikottours.local/wp-content/uploads/2026/03/IMG_2557.jpg', '$750',   '5 Days',  'Easy',     '4.9'],
        ];
        foreach ($tours as $t): ?>
        <div class="tour-card" style="min-width:300px;flex-shrink:0;">
          <div class="tour-card-thumb">
            <img src="<?php echo esc_url($t[1]); ?>" alt="<?php echo esc_html($t[0]); ?>">
            <span class="badge">Featured</span>
            <span class="rating"><i class="fas fa-star"></i> <?php echo $t[5]; ?></span>
          </div>
          <div class="tour-card-body">
            <h3><a href="<?php echo home_url('/contact'); ?>"><?php echo esc_html($t[0]); ?></a></h3>
            <div class="tour-meta">
              <span><i class="fas fa-clock"></i> <?php echo $t[3]; ?></span>
              <span><i class="fas fa-signal"></i> <?php echo $t[4]; ?></span>
              <span><i class="fas fa-users"></i> Group Tour</span>
            </div>
            <div class="tour-card-footer">
              <div class="price"><?php echo $t[2]; ?><small> / Person</small></div>
              <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green btn-sm">Book Now</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <button onclick="tourCarousel(-1)" style="position:absolute;top:40%;left:0;transform:translateY(-50%);background:#2d6a4f;border:none;color:#fff;width:42px;height:42px;border-radius:50%;cursor:pointer;font-size:1rem;z-index:5;"><i class="fas fa-chevron-left"></i></button>
      <button onclick="tourCarousel(1)"  style="position:absolute;top:40%;right:0;transform:translateY(-50%);background:#2d6a4f;border:none;color:#fff;width:42px;height:42px;border-radius:50%;cursor:pointer;font-size:1rem;z-index:5;"><i class="fas fa-chevron-right"></i></button>
    </div>
    <div class="text-center" style="margin-top:36px;">
      <a href="<?php echo home_url('/our-tours'); ?>" class="btn btn-navy"><i class="fas fa-th-large"></i> View All Tours</a>
    </div>
  </div>
</section>

<script>
(function(){
  var track = document.getElementById('toursCarousel');
  if(!track) return;
  var idx = 0, cardW = 324;
  window.tourCarousel = function(dir) {
    var visible = Math.floor(track.parentElement.offsetWidth / cardW);
    var max = track.children.length - visible;
    idx = Math.max(0, Math.min(idx + dir, max));
    track.style.transform = 'translateX(-' + (idx * cardW) + 'px)';
  };
  track.addEventListener('touchstart', function(e){ track._sx = e.touches[0].clientX; });
  track.addEventListener('touchend', function(e){
    var d = track._sx - e.changedTouches[0].clientX;
    if(Math.abs(d) > 50) tourCarousel(d > 0 ? 1 : -1);
  });
})();
</script>

<!-- DESTINATIONS -->
<section class="section" style="background:var(--ap-off-white)">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Top Destinations</span>
      <h2>Explore the Beautiful Gilgit-Baltistan</h2>
      <p>Discover Pakistan's most iconic and breathtaking locations — each one a world unto itself</p>
    </div>
    <div class="dest-grid">
      <div class="dest-card">
        <img src="http://raikottours.local/wp-content/uploads/2026/03/IMG_3524.jpg" alt="Hunza Valley">
        <div class="dest-overlay"></div>
        <div class="dest-info">
          <h3>Hunza Valley</h3>
          <span><i class="fas fa-map-marker-alt"></i> Gilgit-Baltistan &nbsp;|&nbsp; 13 Tours</span>
          <a href="<?php echo home_url('/our-tours'); ?>#hunza" class="btn btn-green btn-sm">See All Tours</a>
        </div>
      </div>
      <div class="dest-card">
        <img src="http://raikottours.local/wp-content/uploads/2026/03/IMG_3787.jpg" alt="Skardu">
        <div class="dest-overlay"></div>
        <div class="dest-info">
          <h3>Skardu</h3>
          <span><i class="fas fa-map-marker-alt"></i> 11 Tours</span>
          <a href="<?php echo home_url('/our-tours'); ?>#skardu" class="btn btn-green btn-sm">See All</a>
        </div>
      </div>
      <div class="dest-card">
        <img src="http://raikottours.local/wp-content/uploads/2026/03/IMG_1591.jpg" alt="Naran">
        <div class="dest-overlay"></div>
        <div class="dest-info">
          <h3>Naran Kaghan</h3>
          <span><i class="fas fa-map-marker-alt"></i> 14 Tours</span>
          <a href="<?php echo home_url('/our-tours'); ?>#naran" class="btn btn-green btn-sm">See All</a>
        </div>
      </div>
      <div class="dest-card">
        <img src="http://raikottours.local/wp-content/uploads/2026/03/IMG_1983.jpg" alt="Fairy Meadows">
        <div class="dest-overlay"></div>
        <div class="dest-info">
          <h3>Fairy Meadows</h3>
          <span><i class="fas fa-map-marker-alt"></i> 18 Tours</span>
          <a href="<?php echo home_url('/our-tours'); ?>#fairy" class="btn btn-green btn-sm">See All</a>
        </div>
      </div>
    </div>
    <div class="text-center" style="margin-top:36px">
      <a href="<?php echo home_url('/our-tours'); ?>" class="btn btn-navy"><i class="fas fa-globe-asia"></i> View All Destinations</a>
    </div>
  </div>
</section>

<!-- WHY TRAVEL WITH US -->
<section class="section why-section">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label" style="color:var(--ap-green-light)">Why Choose Us</span>
      <h2 style="color:var(--ap-white)">Our Success Stories</h2>
      <p style="color:rgba(255,255,255,.65)">What we have done — and why thousands trust us with their Pakistan adventures</p>
    </div>
    <div class="why-grid">
      <div class="why-card">
        <div class="why-icon"><i class="fas fa-shield-alt"></i></div>
        <h4>100% Safe & Secure</h4>
        <p>Your safety is our top priority. All tours are conducted with certified guides and full safety protocols on every route.</p>
      </div>
      <div class="why-card">
        <div class="why-icon"><i class="fas fa-mountain"></i></div>
        <h4>Expert Local Guides</h4>
        <p>Our guides are born and raised in the mountains — they know every trail, village, and hidden gem in northern Pakistan.</p>
      </div>
      <div class="why-card">
        <div class="why-icon"><i class="fas fa-tags"></i></div>
        <h4>Best Price Guarantee</h4>
        <p>We offer the most competitive prices without compromising on quality, comfort or the overall experience.</p>
      </div>
      <div class="why-card">
        <div class="why-icon"><i class="fas fa-headset"></i></div>
        <h4>24/7 Support</h4>
        <p>Our team is always available before, during and after your trip for complete peace of mind throughout your journey.</p>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="section" style="background:var(--ap-off-white)">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Client Stories</span>
      <h2>See Why Clients Love Us</h2>
    </div>
    <div class="testi-grid">
      <div class="testi-card">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-text">"I have never felt so cared for and so safe anywhere else in the world. The guides were incredibly warm and helpful. The hospitality I experienced was genuine — straight from the heart!"</p>
        <div class="testi-author"><div class="testi-author-info"><strong>Ewelina</strong><span>Poland</span></div></div>
      </div>
      <div class="testi-card">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-text">"Everything was superb! The service was truly excellent from start to finish — professional, punctual, and very well organized. The drivers were experienced and careful on mountain roads."</p>
        <div class="testi-author"><div class="testi-author-info"><strong>Suhaila</strong><span>International Traveler</span></div></div>
      </div>
      <div class="testi-card">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-text">"Best trip ever! The food, accommodation, bikes — everything was top-notch! I return home with great gratitude and the conviction that Pakistanis are among the most hospitable people I have ever met."</p>
        <div class="testi-author"><div class="testi-author-info"><strong>Anastasiia</strong><span>Ukraine</span></div></div>
      </div>
    </div>
    <div class="text-center" style="margin-top:40px">
      <a href="<?php echo home_url('/reviews'); ?>" class="btn btn-navy"><i class="fas fa-star"></i> Read All Reviews</a>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<section class="cta-banner">
  <div class="container">
    <div class="cta-content">
      <h2>Ready for Your Pakistan Adventure?</h2>
      <p>Let our experts craft the perfect itinerary for you. From Hunza to K2, from Fairy Meadows to Skardu — we cover every corner of this magnificent country.</p>
      <div class="cta-btns">
        <a href="<?php echo home_url('/our-tours'); ?>" class="btn btn-green"><i class="fas fa-compass"></i> Browse All Tours</a>
        <a href="https://wa.me/923554518486" class="btn btn-outline" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp Us Now</a>
      </div>
    </div>
  </div>
</section>

<style>
/* VIDEO HERO */
.hero { position:relative; min-height:100vh; display:flex; flex-direction:column; justify-content:center; overflow:hidden; }
.hero-bg { display:none; }
.hero { background: url("http://raikottours.local/wp-content/uploads/2026/03/IMG_3524.jpg") center/cover no-repeat; }
.hero { background: url("http://raikottours.local/wp-content/uploads/2026/03/IMG_3524.jpg") center/cover no-repeat; }
.hero-video-wrap { position:absolute; inset:0; z-index:0; }
.hero-video { width:100%; height:100%; object-fit:cover; }
.hero-overlay { position:absolute; inset:0; background:linear-gradient(to bottom, rgba(0,0,0,.55) 0%, rgba(0,0,0,.25) 50%, rgba(0,0,0,.75) 100%); }
.hero .container { position:relative; z-index:2; }
.hero-stats { position:relative; z-index:2; }
/* Ensure all images show */
img { opacity:1 !important; }
.will-reveal { opacity:1 !important; transform:none !important; }
</style>

<?php get_footer(); ?>
