<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- MOBILE NAV -->
<div class="mobile-nav" id="mobileNav">
  <button class="mobile-close" id="mobileClose">&#10005;</button>
  <a href="<?php echo home_url('/'); ?>">Home</a>
  <a href="<?php echo home_url('/our-tours'); ?>">Tours</a>
  <a href="<?php echo home_url('/trekking'); ?>">Trekking &amp; Riding</a>
  <a href="<?php echo home_url('/about'); ?>">About Us</a>
  <a href="<?php echo home_url('/reviews'); ?>">Reviews</a>
  <a href="<?php echo home_url('/contact'); ?>">Contact Us</a>
</div>

<!-- TOP BAR — Adventure Pakistan style -->
<div class="top-bar">
  <div class="container">
    <div class="top-bar-inner">
      <div class="top-bar-left">
        <a href="tel:+923554518486"><i class="fas fa-phone-alt"></i> +92 355 4518486</a>
        <a href="mailto:raikottours@gmail.com"><i class="fas fa-envelope"></i> raikottours@gmail.com</a>
        <span class="top-bar-tagline">Discover the unparalleled beauty of Pakistan</span>
      </div>
      <div class="top-bar-right">
        <a href="https://facebook.com" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/923554518486" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i></a>
        <a href="https://youtube.com" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- HEADER / NAVBAR -->
<header id="site-header">
  <div class="container">
    <div class="header-inner">

      <!-- Logo -->
      <div class="site-logo">
        <?php if (has_custom_logo()): the_custom_logo();
        else: ?>
          <a href="<?php echo home_url('/'); ?>" class="logo-text">
            <?php bloginfo('name'); ?>
            <span>Northern Pakistan Adventures</span>
          </a>
        <?php endif; ?>
      </div>

      <!-- Main Nav -->
      <nav class="main-nav">
        <ul>
          <li <?php if(is_front_page()) echo 'class="current-menu-item"'; ?>>
            <a href="<?php echo home_url('/'); ?>">Home</a>
          </li>
          <li <?php if(is_page('tours')) echo 'class="current-menu-item"'; ?>>
            <a href="<?php echo home_url('/our-tours'); ?>">Tours</a>
            <ul class="sub-menu">
              <li><a href="<?php echo home_url('/our-tours'); ?>">All Tours</a></li>
              <li><a href="<?php echo home_url('/our-tours'); ?>#hunza">Hunza Valley</a></li>
              <li><a href="<?php echo home_url('/our-tours'); ?>#skardu">Skardu</a></li>
              <li><a href="<?php echo home_url('/our-tours'); ?>#naran">Naran Kaghan</a></li>
              <li><a href="<?php echo home_url('/our-tours'); ?>#fairy">Fairy Meadows</a></li>
            </ul>
          </li>
          <li <?php if(is_page('trekking')) echo 'class="current-menu-item"'; ?>>
            <a href="<?php echo home_url('/trekking'); ?>">Trekking &amp; Riding</a>
          </li>
          <li <?php if(is_page('about')) echo 'class="current-menu-item"'; ?>>
            <a href="<?php echo home_url('/about'); ?>">About Us</a>
          </li>
          <li <?php if(is_page('reviews')) echo 'class="current-menu-item"'; ?>>
            <a href="<?php echo home_url('/reviews'); ?>">Reviews</a>
          </li>
        </ul>
      </nav>

      <!-- CTA -->
      <div style="display:flex;align-items:center;gap:12px;" class="header-cta">
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-orange btn-sm">
          <i class="fas fa-paper-plane"></i> Contact Us
        </a>
        <button class="hamburger" id="hamburgerBtn">
          <span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </div>
</header>
