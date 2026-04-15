<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner-bg" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),"hero-full") ?: "http://raikottours.local/wp-content/uploads/2026/03/IMG_3937.jpg"; ?>')"></div>
  <div class="page-banner-overlay"></div>
  <div class="container">
    <div class="page-banner-content">
      <h1><?php the_title(); ?></h1>
      <div class="breadcrumb">
        <a href="<?php echo home_url('/'); ?>">Home</a>
        <span>/</span>
        <a href="<?php echo home_url('/tours'); ?>">Tours</a>
        <span>/</span>
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </div>
</div>

<section class="section">
  <div class="container">
    <div style="display:grid;grid-template-columns:2fr 1fr;gap:48px;align-items:start">

      <!-- Tour Content -->
      <div>
        <!-- Meta Strip -->
        <div style="display:flex;flex-wrap:wrap;gap:20px;margin-bottom:32px;padding:20px 24px;background:var(--ap-off-white);border-radius:var(--radius);border:1px solid var(--ap-border)">
          <?php if(kn_duration(get_the_ID())): ?>
          <div style="display:flex;align-items:center;gap:8px;font-size:.9rem">
            <i class="fas fa-clock" style="color:var(--ap-green)"></i>
            <strong><?php echo kn_duration(get_the_ID()); ?></strong>
          </div>
          <?php endif; ?>
          <?php if(kn_difficulty(get_the_ID())): ?>
          <div style="display:flex;align-items:center;gap:8px;font-size:.9rem">
            <i class="fas fa-signal" style="color:var(--ap-green)"></i>
            <strong><?php echo kn_difficulty(get_the_ID()); ?></strong>
          </div>
          <?php endif; ?>
          <div style="display:flex;align-items:center;gap:8px;font-size:.9rem">
            <i class="fas fa-star" style="color:var(--ap-gold)"></i>
            <strong><?php echo kn_rating(get_the_ID()); ?> / 5.0</strong>
          </div>
          <div style="display:flex;align-items:center;gap:8px;font-size:.9rem">
            <i class="fas fa-users" style="color:var(--ap-green)"></i>
            <strong>Group & Private Available</strong>
          </div>
        </div>

        <!-- Content -->
        <div style="line-height:1.85;color:var(--ap-text)">
          <?php the_content(); ?>
        </div>
      </div>

      <!-- Booking Sidebar -->
      <div style="position:sticky;top:100px">
        <div style="background:var(--ap-white);border-radius:var(--radius-lg);box-shadow:var(--shadow-lg);border:1px solid var(--ap-border);overflow:hidden">
          <div style="background:var(--ap-navy);padding:24px;text-align:center">
            <div style="font-family:var(--font-heading);font-size:2.2rem;font-weight:700;color:var(--ap-white)"><?php echo kn_price(get_the_ID()); ?></div>
            <div style="color:rgba(255,255,255,.65);font-size:.85rem">Per Person</div>
          </div>
          <div style="padding:24px">
            <a href="<?php echo home_url('/contact'); ?>?tour=<?php echo urlencode(get_the_title()); ?>" class="btn btn-green" style="width:100%;justify-content:center;margin-bottom:12px">
              <i class="fas fa-calendar-check"></i> Book This Tour
            </a>
            <a href="https://wa.me/923554518486?text=I'm interested in <?php echo urlencode(get_the_title()); ?>" class="btn btn-navy" style="width:100%;justify-content:center" target="_blank">
              <i class="fab fa-whatsapp"></i> WhatsApp Inquiry
            </a>
            <hr style="margin:20px 0;border-color:var(--ap-border)">
            <ul style="display:flex;flex-direction:column;gap:10px">
              <li style="display:flex;align-items:center;gap:10px;font-size:.85rem"><i class="fas fa-check" style="color:var(--ap-green)"></i> Free cancellation (48hrs notice)</li>
              <li style="display:flex;align-items:center;gap:10px;font-size:.85rem"><i class="fas fa-check" style="color:var(--ap-green)"></i> Expert local guide included</li>
              <li style="display:flex;align-items:center;gap:10px;font-size:.85rem"><i class="fas fa-check" style="color:var(--ap-green)"></i> Transport & accommodation</li>
              <li style="display:flex;align-items:center;gap:10px;font-size:.85rem"><i class="fas fa-check" style="color:var(--ap-green)"></i> 24/7 support throughout</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Related Tours -->
<section class="section-sm" style="background:var(--ap-off-white)">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Explore More</span>
      <h2>You May Also Like</h2>
    </div>
    <div class="tours-grid">
      <?php
      $related = new WP_Query(['post_type'=>'tour','posts_per_page'=>3,'post__not_in'=>[get_the_ID()],'orderby'=>'rand']);
      if($related->have_posts()):
        while($related->have_posts()): $related->the_post(); ?>
        <div class="tour-card">
          <div class="tour-card-thumb">
            <?php if(has_post_thumbnail()): the_post_thumbnail('tour-card'); else: ?>
            <img src="http://raikottours.local/wp-content/uploads/2026/03/IMG_3787.jpg" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
            <span class="badge">Tour</span>
            <span class="rating"><i class="fas fa-star"></i> <?php echo kn_rating(get_the_ID()); ?></span>
          </div>
          <div class="tour-card-body">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="tour-meta">
              <span><i class="fas fa-clock"></i> <?php echo kn_duration(get_the_ID()) ?: 'Custom'; ?></span>
              <span><i class="fas fa-users"></i> Group Tour</span>
            </div>
            <div class="tour-card-footer">
              <div class="price"><?php echo kn_price(get_the_ID()); ?><small> / Person</small></div>
              <a href="<?php the_permalink(); ?>" class="btn btn-green btn-sm">View Tour</a>
            </div>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata();
      endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
