document.addEventListener('DOMContentLoaded', function () {

  /* ── 1. HEADER SCROLL SHRINK ── */
  var header = document.getElementById('site-header');
  window.addEventListener("scroll", function () {
    if (window.scrollY > 60) { header.classList.add('scrolled'); }
    else { header.classList.remove('scrolled'); }
  }, { passive: true });

  /* ── 2. MOBILE MENU ── */
  var btn = document.getElementById('hamburgerBtn');
  var nav = document.getElementById('mobileNav');
  var close = document.getElementById('mobileClose');
  if (btn && nav) btn.addEventListener('click', function () { nav.classList.add('open'); document.body.style.overflow = 'hidden'; });
  if (close && nav) close.addEventListener('click', function () { nav.classList.remove('open'); document.body.style.overflow = ''; });
  if (nav) nav.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', function () { nav.classList.remove('open'); document.body.style.overflow = ''; }); });

  /* ── 3. HERO PARALLAX ── */
  var heroBg = document.querySelector('.hero-bg, .hero-video-wrap, .page-banner-bg');
  if (heroBg) {
    window.addEventListener("scroll", function () {
      // parallax disabled
    }, { passive: true });
  }

  /* ── 4. HERO TYPING EFFECT ── */
  var heroSub = document.querySelector('.hero-subtitle, .hero-tagline, .hero p');
  if (heroSub) {
    var words = ['Northern Pakistan', 'Karakoram Peaks', 'Hunza Valley', 'Fairy Meadows', 'Nanga Parbat'];
    var wi = 0, ci = 0, del = false;
    var sp = document.createElement('span');
    sp.style.cssText = 'color:#e8b84b;border-right:2px solid #e8b84b;padding-right:3px;';
    heroSub.appendChild(document.createTextNode(' '));
    heroSub.appendChild(sp);
    function type() {
      var w = words[wi];
      sp.textContent = del ? w.substring(0, ci--) : w.substring(0, ci++);
      var speed = del ? 55 : 100;
      if (!del && ci === w.length + 1) { speed = 2000; del = true; }
      else if (del && ci < 0) { del = false; wi = (wi + 1) % words.length; speed = 400; ci = 0; }
      setTimeout(type, speed);
    }
    setTimeout(type, 1400);
  }

  /* ── 5. STAGGERED SCROLL REVEAL ── */
  if ('IntersectionObserver' in window) {
    var els = document.querySelectorAll('.tour-card,.why-card,.testi-card,.dest-card,.review-card,.rental-card,.guide-card,.contact-card,.stat-item,.hero-stat,.section-head,.section-header');
    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          var d = parseInt(e.target.dataset.rd) || 0;
          setTimeout(function () { e.target.classList.add('is-revealed'); }, d);
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    els.forEach(function (el, i) { el.classList.add('will-reveal'); el.dataset.rd = (i % 4) * 130; obs.observe(el); });
  }

  /* ── 6. COUNTER ANIMATION ── */
  var counters = document.querySelectorAll('.stat-num, .hero-stat-num');
  if ('IntersectionObserver' in window && counters.length) {
    var cobs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        var el = e.target, raw = el.textContent.trim();
        var target = parseInt(raw.replace(/\D/g, '')), suffix = raw.replace(/[0-9]/g, '');
        if (!target) return;
        var start = performance.now(), dur = 2200;
        (function tick(now) {
          var t = Math.min((now - start) / dur, 1);
          var ease = 1 - Math.pow(1 - t, 4);
          el.textContent = Math.floor(ease * target) + suffix;
          if (t < 1) requestAnimationFrame(tick);
        })(start);
        cobs.unobserve(el);
      });
    }, { threshold: 0.6 });
    counters.forEach(function (c) { cobs.observe(c); });
  }

  /* ── 7. CARD 3D TILT ── */
  document.querySelectorAll('.tour-card,.dest-card,.rental-card,.why-card').forEach(function (card) {
    card.addEventListener('mousemove', function (e) {
      var r = card.getBoundingClientRect();
      var x = ((e.clientX - r.left) / r.width - 0.5) * 14;
      var y = ((e.clientY - r.top) / r.height - 0.5) * 14;
      card.style.transform = 'perspective(800px) rotateY(' + x + 'deg) rotateX(' + (-y) + 'deg) translateY(-6px) scale(1.02)';
      card.style.transition = 'transform 0.1s ease';
      var img = card.querySelector('img,.card-img,.tour-img');
      if (img) { img.style.transform = 'scale(1.07) translate(' + (x * 0.4) + 'px,' + (y * 0.4) + 'px)'; }
    });
    card.addEventListener('mouseleave', function () {
      card.style.transform = '';
      card.style.transition = 'transform 0.5s ease, box-shadow 0.5s ease';
      var img = card.querySelector('img,.card-img,.tour-img');
      if (img) { img.style.transform = ''; img.style.transition = 'transform 0.5s ease'; }
    });
  });

  /* ── 8. SECTION PARALLAX BACKGROUNDS ── */
  var parSections = document.querySelectorAll('.page-banner-bg,[data-parallax]');
  window.addEventListener("scroll", function () {
    parSections.forEach(function (el) {
      var rect = el.getBoundingClientRect();
      var speed = parseFloat(el.dataset.parallaxSpeed) || 0.3;
      var offset = (rect.top + rect.height / 2 - window.innerHeight / 2) * speed;
      el.style.backgroundPositionY = 'calc(50% + ' + offset + 'px)';
    });
  }, { passive: true });

  /* ── 9. SMOOTH SCROLL ── */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var t = document.querySelector(this.getAttribute('href'));
      if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    });
  });

  /* ── 10. IMAGE LAZY FADE-IN ── */
  if ('IntersectionObserver' in window) {
    var iobs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('img-loaded'); iobs.unobserve(e.target); } });
    }, { threshold: 0.05 });
    document.querySelectorAll('img').forEach(function (img) { img.classList.add('img-lazy'); iobs.observe(img); });
  }

  /* ── 11. SCROLL PROGRESS BAR ── */
  var bar = document.createElement('div');
  bar.style.cssText = 'position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,#e8b84b,#c0392b);z-index:9999;transition:width 0.1s linear;width:0%;pointer-events:none;';
  document.body.appendChild(bar);
  window.addEventListener("scroll", function () {
    var d = document.body.scrollHeight - window.innerHeight;
    bar.style.width = (d > 0 ? (window.scrollY / d) * 100 : 0) + '%';
  }, { passive: true });

  /* ── 12. PAGE LOAD FADE IN ── */
  document.body.style.opacity = '0';
  document.body.style.transition = 'opacity 0.55s ease';
  requestAnimationFrame(function () { requestAnimationFrame(function () { document.body.style.opacity = '1'; }); });

});
