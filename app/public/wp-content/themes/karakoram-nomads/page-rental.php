<?php
/**
 * Template Name: Trekking & Horse Riding Page
 */
get_header(); ?>

<div class="page-banner">
  <div class="page-banner-bg" style="background-image:url('https://images.unsplash.com/photo-1662800291212-5d31184b861c?w=1920&h=600&fit=crop&auto=format&q=80')"></div>
  <div class="page-banner-overlay"></div>
  <div class="container">
    <div class="page-banner-content">
      <h1>Trekking &amp; Horse Riding</h1>
      <div class="breadcrumb"><a href="<?php echo home_url('/'); ?>">Home</a><span>/</span><span>Trekking &amp; Horse Riding</span></div>
    </div>
  </div>
</div>

<!-- TREKKING PACKAGES -->
<section class="section">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Explore on Foot</span>
      <h2>Trekking Packages</h2>
      <p>Lace up your boots and step into terrain that challenges you and rewards you in equal measure. Whether you're pushing through glacial moraine toward K2 or breathing cool pine-scented air on the way to Fairy Meadows, every step is guided by people who know these mountains intimately — and care deeply about your safety.</p>
    </div>

    <div class="rental-grid">

      <!-- Trek 1 -->
      <div class="rental-card">
        <div class="rental-img">
          <img src="https://images.unsplash.com/photo-1693320262631-d30e8ef450f2?w=800&h=500&fit=crop&auto=format&q=80" alt="K2 Base Camp Trek">
          <span class="rental-badge">Most Popular</span>
        </div>
        <div class="rental-body">
          <h3>K2 Base Camp Trek</h3>
          <p style="font-size:.9rem;color:var(--ap-gray);margin-bottom:16px;line-height:1.6">
            Stand at the foot of the world's second-highest mountain on this ultimate high-altitude adventure. The trail winds through the Baltoro Glacier, past Concordia — where four 8,000m peaks converge — to the legendary K2 Base Camp at 5,100m. An experience that will stay with you for life.
          </p>
          <div class="rental-specs">
            <div class="spec-item"><i class="fas fa-check"></i><span>Experienced certified guide included</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Porter service throughout</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>All camping gear provided</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>All meals on the trail</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Permit assistance & arrangement</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>14-day minimum itinerary</span></div>
          </div>
          <div class="rental-price">$120 <span>/ person/day &nbsp;|&nbsp; Min 14 days</span></div>
          <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green"><i class="fas fa-hiking"></i> Book This Trek</a>
        </div>
      </div>

      <!-- Trek 2 -->
      <div class="rental-card">
        <div class="rental-img">
          <img src="https://images.unsplash.com/photo-1657122067013-4c44bbed9861?w=800&h=500&fit=crop&auto=format&q=80" alt="Fairy Meadows Trek">
          <span class="rental-badge" style="background:var(--ap-navy)">Beginner Friendly</span>
        </div>
        <div class="rental-body">
          <h3>Fairy Meadows Trek</h3>
          <p style="font-size:.9rem;color:var(--ap-gray);margin-bottom:16px;line-height:1.6">
            Trek through pine forests to the magical alpine meadows at the base of Nanga Parbat — the world's ninth-highest peak. Fairy Meadows offers breathtaking sunset views over the "Killer Mountain" and is accessible to trekkers of all levels, making it the perfect introduction to Pakistan's high-altitude wilderness.
          </p>
          <div class="rental-specs">
            <div class="spec-item"><i class="fas fa-check"></i><span>Guided trek with local expert</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Accommodation at meadows camp</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>All meals included</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Stunning Nanga Parbat views</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Beginner-friendly trail</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>3-day minimum itinerary</span></div>
          </div>
          <div class="rental-price">$65 <span>/ person/day &nbsp;|&nbsp; Min 3 days</span></div>
          <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green"><i class="fas fa-hiking"></i> Book This Trek</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- HORSE RIDING PACKAGES -->
<section class="section" style="background:var(--ap-light)">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Ride Through the Mountains</span>
      <h2>Horse Riding Packages</h2>
      <p>Slow down, look up, and let the landscape come to you. Horse riding strips away the noise of modern travel and puts you directly into the rhythm of the mountains — the way people here have moved for centuries. Our horses are calm, sure-footed, and handled by guides with decades of experience on these exact routes.</p>
    </div>

    <div class="rental-grid">

      <!-- Ride 1 -->
      <div class="rental-card">
        <div class="rental-img">
          <img src="https://images.unsplash.com/photo-1761766593396-01fad8e2fb6b?w=800&h=500&fit=crop&auto=format&q=80" alt="Deosai Plains Horse Ride">
          <span class="rental-badge">Scenic</span>
        </div>
        <div class="rental-body">
          <h3>Deosai Plains Ride</h3>
          <p style="font-size:.9rem;color:var(--ap-gray);margin-bottom:16px;line-height:1.6">
            Gallop across Deosai — one of the world's highest plateaus at 4,114m — a vast, treeless wilderness carpeted with wildflowers and home to the endangered Himalayan brown bear. This overnight horse riding experience is unlike anything else on earth, combining raw natural beauty with the freedom of riding under an endless sky.
          </p>
          <div class="rental-specs">
            <div class="spec-item"><i class="fas fa-check"></i><span>Experienced local horses</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Professional guide throughout</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Saddle, helmet & safety gear</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Overnight camping included</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Wildlife spotting opportunities</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>2-day minimum itinerary</span></div>
          </div>
          <div class="rental-price">$45 <span>/ person/day &nbsp;|&nbsp; Min 2 days</span></div>
          <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green"><i class="fas fa-horse"></i> Book This Ride</a>
        </div>
      </div>

      <!-- Ride 2 -->
      <div class="rental-card">
        <div class="rental-img">
          <img src="https://images.unsplash.com/photo-1631044633850-87e950befd09?w=800&h=500&fit=crop&auto=format&q=80" alt="Hunza Valley Horse Ride">
          <span class="rental-badge" style="background:var(--ap-navy)">Half Day</span>
        </div>
        <div class="rental-body">
          <h3>Hunza Valley Ride</h3>
          <p style="font-size:.9rem;color:var(--ap-gray);margin-bottom:16px;line-height:1.6">
            A leisurely half-day ride through the stunning Hunza Valley — past ancient apricot orchards, traditional stone villages, and panoramic views of Rakaposhi and Ultar Sar. Perfect for families, first-time riders, and anyone who wants to slow down and absorb the valley's timeless beauty from the back of a horse.
          </p>
          <div class="rental-specs">
            <div class="spec-item"><i class="fas fa-check"></i><span>4–5 hour guided experience</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Expert local guide</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Full safety briefing</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Scenic apricot orchard routes</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>Photography stops included</span></div>
            <div class="spec-item"><i class="fas fa-check"></i><span>No prior experience needed</span></div>
          </div>
          <div class="rental-price">$30 <span>/ person &nbsp;|&nbsp; Half Day (4–5 hrs)</span></div>
          <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green"><i class="fas fa-horse"></i> Book This Ride</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- INFO GRID -->
<section class="section-sm" style="background:var(--ap-off-white)">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Good to Know</span>
      <h2>What's Included &amp; Requirements</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:28px">
      <div style="background:var(--ap-white);border-radius:var(--radius-lg);padding:28px;border:1px solid var(--ap-border);box-shadow:var(--shadow)">
        <div style="color:var(--ap-green);font-size:2rem;margin-bottom:14px"><i class="fas fa-box-open"></i></div>
        <h4 style="margin-bottom:12px">What's Included</h4>
        <ul style="display:flex;flex-direction:column;gap:8px">
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Experienced guide</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Safety gear (trekking & riding)</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Meals on the trail / plateau</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> First aid kit</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Trekking permits (where required)</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Camping equipment (overnight trips)</li>
        </ul>
      </div>
      <div style="background:var(--ap-white);border-radius:var(--radius-lg);padding:28px;border:1px solid var(--ap-border);box-shadow:var(--shadow)">
        <div style="color:var(--ap-green);font-size:2rem;margin-bottom:14px"><i class="fas fa-clipboard-list"></i></div>
        <h4 style="margin-bottom:12px">Requirements</h4>
        <ul style="display:flex;flex-direction:column;gap:8px">
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Moderate physical fitness</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Comfortable hiking / riding footwear</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> Age 8+ for horse riding</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> 48-hour advance booking</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-check" style="color:var(--ap-green);margin-top:3px"></i> CNIC / Passport copy</li>
        </ul>
      </div>
      <div style="background:var(--ap-white);border-radius:var(--radius-lg);padding:28px;border:1px solid var(--ap-border);box-shadow:var(--shadow)">
        <div style="color:var(--ap-green);font-size:2rem;margin-bottom:14px"><i class="fas fa-calendar-alt"></i></div>
        <h4 style="margin-bottom:12px">Best Seasons</h4>
        <ul style="display:flex;flex-direction:column;gap:8px">
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-sun" style="color:var(--ap-green);margin-top:3px"></i> Trekking: May – October</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-sun" style="color:var(--ap-green);margin-top:3px"></i> Horse Riding: April – October</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-sun" style="color:var(--ap-green);margin-top:3px"></i> Deosai Plains: July – September</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-sun" style="color:var(--ap-green);margin-top:3px"></i> Fairy Meadows: June – September</li>
          <li style="display:flex;gap:8px;font-size:.88rem"><i class="fas fa-snowflake" style="color:var(--ap-gray);margin-top:3px"></i> Avoid December – March (heavy snow)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <div class="cta-content">
      <h2>Ready for the Adventure of a Lifetime?</h2>
      <p>Tell us what you're after — a grueling high-altitude challenge or a peaceful half-day in the saddle — and we'll handle everything else. Just show up ready to go.</p>
      <div class="cta-btns">
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-green"><i class="fas fa-paper-plane"></i> Book Now</a>
        <a href="https://wa.me/923554518486" class="btn btn-outline" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp for Details</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
