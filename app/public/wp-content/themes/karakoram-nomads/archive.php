<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner-bg" style="background-image:url('http://raikottours.local/wp-content/uploads/2026/03/IMG_3499.jpg')"></div>
  <div class="page-banner-overlay"></div>
  <div class="container">
    <div class="page-banner-content">
      <h1><?php post_type_archive_title(); ?></h1>
      <div class="breadcrumb">
        <a href="<?php echo home_url('/'); ?>">Home</a><span>/</span>
        <span><?php post_type_archive_title(); ?></span>
      </div>
    </div>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="tours-grid">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <div class="tour-card">
        <div class="tour-card-thumb">
          <?php if(has_post_thumbnail()): the_post_thumbnail('tour-card'); else: ?>
          <img src="http://raikottours.local/wp-content/uploads/2026/03/IMG_2559.jpg" alt="">
          <?php endif; ?>
          <span class="badge">Tour</span>
          <span class="rating"><i class="fas fa-star"></i> <?php echo kn_rating(get_the_ID()); ?></span>
        </div>
        <div class="tour-card-body">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <div class="tour-meta">
            <?php if(kn_duration(get_the_ID())): ?>
            <span><i class="fas fa-clock"></i> <?php echo kn_duration(get_the_ID()); ?></span>
            <?php endif; ?>
            <span><i class="fas fa-users"></i> Group Tour</span>
          </div>
          <div class="tour-card-footer">
            <div class="price"><?php echo kn_price(get_the_ID()); ?><small> / Person</small></div>
            <a href="<?php the_permalink(); ?>" class="btn btn-green btn-sm">View Tour</a>
          </div>
        </div>
      </div>
      <?php endwhile; else: ?>
      <p style="grid-column:span 3;text-align:center;color:var(--ap-text-light)">No tours found yet.</p>
      <?php endif; ?>
    </div>
    <div style="text-align:center;margin-top:48px">
      <?php the_posts_pagination(['prev_text'=>'&larr; Previous','next_text'=>'Next &rarr;']); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
