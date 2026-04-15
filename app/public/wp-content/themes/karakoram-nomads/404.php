<?php get_header(); ?>

<section class="section" style="min-height:60vh;display:flex;align-items:center">
  <div class="container text-center">
    <div style="font-family:var(--font-heading);font-size:9rem;font-weight:700;color:var(--ap-green);line-height:1;margin-bottom:16px">404</div>
    <h2 style="margin-bottom:16px">Page Not Found</h2>
    <p style="color:var(--ap-text-light);max-width:480px;margin:0 auto 32px">The page you are looking for may have been moved or does not exist. Let's get you back on track!</p>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
      <a href="<?php echo home_url('/'); ?>" class="btn btn-green"><i class="fas fa-home"></i> Back to Home</a>
      <a href="<?php echo home_url('/tours'); ?>" class="btn btn-navy"><i class="fas fa-compass"></i> View All Tours</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
