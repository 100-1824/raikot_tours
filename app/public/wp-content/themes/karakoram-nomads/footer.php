<!-- FOOTER -->
<footer id="site-footer">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-brand">
        <span class="logo-text"><?php bloginfo('name'); ?><span>Northern Pakistan Adventures</span></span>
        <p>From the majestic peaks of the Himalayas to the serene valleys of the Karakoram — we bring you closer to nature, culture, and adventure. Trusted by travelers worldwide.</p>
        <div class="socials">
          <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://wa.me/923554518486" target="_blank"><i class="fab fa-whatsapp"></i></a>
          <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
          <li><a href="<?php echo home_url('/our-tours'); ?>">All Tours</a></li>
          <li><a href="<?php echo home_url('/trekking'); ?>">Trekking &amp; Riding</a></li>
          <li><a href="<?php echo home_url('/about'); ?>">About Us</a></li>
          <li><a href="<?php echo home_url('/reviews'); ?>">Reviews</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>">Contact Us</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Top Destinations</h4>
        <ul>
          <li><a href="<?php echo home_url('/our-tours'); ?>#hunza">Hunza Valley</a></li>
          <li><a href="<?php echo home_url('/our-tours'); ?>#skardu">Skardu</a></li>
          <li><a href="<?php echo home_url('/our-tours'); ?>#naran">Naran Kaghan</a></li>
          <li><a href="<?php echo home_url('/our-tours'); ?>#fairy">Fairy Meadows</a></li>
          <li><a href="<?php echo home_url('/our-tours'); ?>#k2">K2 Base Camp</a></li>
          <li><a href="<?php echo home_url('/our-tours'); ?>#gilgit">Gilgit Baltistan</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Get In Touch</h4>
        <ul class="footer-contact">
          <li><i class="fas fa-map-marker-alt"></i><span>Islamabad, Pakistan</span></li>
          <li><i class="fas fa-phone"></i><a href="tel:+923554518486">+92 355 4518486</a></li>
          <li><i class="fas fa-envelope"></i><a href="mailto:raikottours@gmail.com">raikottours@gmail.com</a></li>
          <li><i class="fab fa-whatsapp"></i><a href="https://wa.me/923554518486" target="_blank">WhatsApp Us</a></li>
        </ul>
      </div>

    </div>
  </div>
  <div class="footer-bottom">
    <div class="container" style="display:flex;justify-content:space-between;align-items:center;width:100%">
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</span>
      <span></span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
