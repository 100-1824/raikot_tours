<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner-bg" style="background-image:url('http://raikottours.local/wp-content/uploads/2026/03/IMG_2584.jpg')"></div>
  <div class="page-banner-overlay"></div>
  <div class="container">
    <div class="page-banner-content">
      <h1><?php the_title(); ?></h1>
      <div class="breadcrumb">
        <a href="<?php echo home_url('/'); ?>">Home</a>
        <span>/</span>
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </div>
</div>

<section class="section">
  <div class="container" style="max-width:860px">
    <?php while(have_posts()): the_post(); ?>
      <div class="page-content" style="line-height:1.85">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
