<?php
/**
 * Template Name: Contact Us Page
 */
get_header(); ?>

<div class="page-banner">
  <div class="page-banner-bg" style="background-image:url('http://raikottours.local/wp-content/uploads/2026/03/IMG_2584.jpg')"></div>
  <div class="page-banner-overlay"></div>
  <div class="container">
    <div class="page-banner-content">
      <h1>Contact Us</h1>
      <div class="breadcrumb"><a href="<?php echo home_url('/'); ?>">Home</a><span>/</span><span>Contact</span></div>
    </div>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="section-head text-center">
      <span class="sub-label">Get In Touch</span>
      <h2>Our Contact Information</h2>
      <p>Ready to plan your Pakistan adventure? Reach out to us through any of the channels below</p>
    </div>
    <div class="contact-grid">

      <div class="contact-info-cards">
        <div class="contact-card">
          <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div><h4>Our Office</h4><p>Capital Office: Islamabad, Pakistan<br>Operations: Gilgit-Baltistan, KPK</p></div>
        </div>
        <div class="contact-card">
          <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
          <div><h4>Phone / WhatsApp</h4><p><a href="tel:+923554518486">+92 355 4518486</a><br>Available 7 days a week</p></div>
        </div>
        <div class="contact-card">
          <div class="contact-icon"><i class="fas fa-envelope"></i></div>
          <div><h4>Email Address</h4><p><a href="mailto:raikottours@gmail.com">raikottours@gmail.com</a><br>We reply within 24 hours</p></div>
        </div>
        <div class="contact-card">
          <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
          <div><h4>WhatsApp Us</h4><p><a href="https://wa.me/923554518486" target="_blank">Chat on WhatsApp</a><br>Fastest way to reach us</p></div>
        </div>
        <div class="contact-card">
          <div class="contact-icon"><i class="fas fa-clock"></i></div>
          <div><h4>Office Hours</h4><p>Monday to Saturday: 9am to 7pm<br>Sunday: 10am to 4pm (PKT)</p></div>
        </div>
      </div>

      <div class="contact-form-wrap">
        <h3>Book a Tour or Send a Message</h3>
        <form method="post" action="">
          <div class="form-row">
            <div class="form-group">
              <label>Your Name</label>
              <input type="text" name="kn_name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="kn_email" placeholder="your@email.com" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Phone / WhatsApp</label>
              <input type="tel" name="kn_phone" placeholder="+92 xxx xxxxxxx">
            </div>
            <div class="form-group">
              <label>Interested Tour</label>
              <select name="kn_tour">
                <option value="">Select a Tour...</option>
                <option>Hunza Valley Tour (7 Days)</option>
                <option>Fairy Meadows Tour (5 Days)</option>
                <option>Skardu &amp; Shangrila (6 Days)</option>
                <option>Naran Kaghan Valley (5 Days)</option>
                <option>K2 Base Camp Trek (22 Days)</option>
                <option>9-Days North Pakistan</option>
                <option>12-Days North Pakistan</option>
                <option>Motorcycle Rental</option>
                <option>Custom Tour Request</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Travel Date</label>
              <input type="date" name="kn_date">
            </div>
            <div class="form-group">
              <label>Number of Travelers</label>
              <select name="kn_travelers">
                <option>1 Person</option>
                <option>2 People</option>
                <option>3-5 People</option>
                <option>6-10 People</option>
                <option>10+ People</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Your Message</label>
            <textarea name="kn_message" placeholder="Tell us about your dream Pakistan adventure..."></textarea>
          </div>
          <button type="submit" class="btn btn-green" style="width:100%;justify-content:center">
            <i class="fas fa-paper-plane"></i> Send Message
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
