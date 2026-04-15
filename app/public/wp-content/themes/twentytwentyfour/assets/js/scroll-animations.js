/**
 * Raikot Tours Premium Scroll Animation System
 * Performance-optimized scroll listeners and reveal animations
 *
 * Features:
 * - Intersection Observer API for scroll-triggered reveals
 * - Throttled navbar scroll listener for glassmorphic effect
 * - No layout thrashing (GPU-accelerated properties only)
 * - Mobile detection and fallback handling
 * - Prefers-reduced-motion respect
 *
 * Target: < 10KB (gzipped), 60 FPS on all devices
 */

class ScrollAnimationSystem {
  constructor() {
    this.navbar = null;
    this.scrollThreshold = 50; // pixels
    this.isScrolled = false;
    this.throttleTimer = null;
    this.throttleDelay = 16; // ~60 FPS (1000ms / 60fps ≈ 16ms)
    this.prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    this.isMobile = window.innerWidth < 768;

    this.init();
  }

  /**
   * Initialize all scroll animation systems
   */
  init() {
    this.setupNavbarScrollListener();
    this.setupIntersectionObserver();
    this.setupHeroAnimations();
    this.attachResizeListener();
  }

  /**
   * Navbar scroll listener for glassmorphic effect
   * Throttled to prevent jank
   * Triggers at 50px scroll
   */
  setupNavbarScrollListener() {
    this.navbar = document.querySelector('.navbar');
    if (!this.navbar) return;

    // Check if already scrolled on page load (e.g., user scrolled before JS loaded)
    if (window.scrollY > this.scrollThreshold) {
      this.navbar.classList.add('is-scrolled');
      this.isScrolled = true;
    }

    // Throttled scroll listener
    window.addEventListener('scroll', () => this.handleNavbarScroll(), { passive: true });
  }

  /**
   * Throttled navbar scroll handler
   * Prevents excessive DOM updates and layout thrashing
   */
  handleNavbarScroll() {
    // Clear any pending throttle timer
    if (this.throttleTimer) {
      clearTimeout(this.throttleTimer);
    }

    this.throttleTimer = setTimeout(() => {
      const currentScroll = window.scrollY;
      const shouldScroll = currentScroll > this.scrollThreshold;

      // Only update DOM if state changes (reduce reflows)
      if (shouldScroll && !this.isScrolled) {
        this.navbar.classList.add('is-scrolled');
        this.isScrolled = true;
      } else if (!shouldScroll && this.isScrolled) {
        this.navbar.classList.remove('is-scrolled');
        this.isScrolled = false;
      }
    }, this.throttleDelay);
  }

  /**
   * Intersection Observer for scroll-triggered reveals
   * Threshold: 50% visible (0.5)
   * Applies animation classes when element enters viewport
   */
  setupIntersectionObserver() {
    if (!('IntersectionObserver' in window)) {
      // Fallback for older browsers - show all elements immediately
      document.querySelectorAll('[class*="reveal-on-scroll"]').forEach(el => {
        el.classList.add('is-visible');
      });
      return;
    }

    const observerOptions = {
      root: null, // Viewport
      threshold: 0.5, // 50% visible
      rootMargin: '0px' // No margin
    };

    const observerCallback = (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.revealElement(entry.target);
          // Unobserve after animation to save memory
          observer.unobserve(entry.target);
        }
      });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Observe all reveal-on-scroll elements
    document.querySelectorAll('.reveal-on-scroll').forEach(el => {
      observer.observe(el);
    });

    // Observe staggered reveal groups
    document.querySelectorAll('.reveal-stagger').forEach(el => {
      observer.observe(el);
    });
  }

  /**
   * Apply reveal animation to element
   * Checks for specific animation modifier classes
   */
  revealElement(element) {
    if (this.prefersReducedMotion) {
      // Respect user motion preferences
      element.style.opacity = '1';
      element.style.transform = 'none';
      return;
    }

    // Determine which animation variant to apply
    if (element.classList.contains('reveal-on-scroll--left')) {
      element.classList.add('is-visible--left');
    } else if (element.classList.contains('reveal-on-scroll--right')) {
      element.classList.add('is-visible--right');
    } else if (element.classList.contains('reveal-on-scroll--scale')) {
      element.classList.add('is-visible--scale');
    } else {
      element.classList.add('is-visible');
    }

    // For staggered reveals, apply animation to parent
    if (element.classList.contains('reveal-stagger')) {
      element.classList.add('is-visible');
    }
  }

  /**
   * Setup hero section animations
   * Applies animation classes to hero elements on load
   */
  setupHeroAnimations() {
    const heroElements = {
      '.hero-overline': 'hero-overline',
      '.hero-headline': 'hero-headline',
      '.hero-subtext': 'hero-subtext',
      '.hero-buttons': 'hero-buttons'
    };

    Object.entries(heroElements).forEach(([selector, className]) => {
      const element = document.querySelector(selector);
      if (element) {
        element.classList.add(className);
      }
    });
  }

  /**
   * Handle window resize
   * Update mobile detection and reassess animations
   */
  attachResizeListener() {
    let resizeTimer;

    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        const wasMobile = this.isMobile;
        this.isMobile = window.innerWidth < 768;

        // If transition between mobile/desktop, may need to refresh animations
        if (wasMobile !== this.isMobile) {
          this.handleResponsiveChange();
        }
      }, 250);
    });
  }

  /**
   * Handle responsive behavior changes
   */
  handleResponsiveChange() {
    // Re-check navbar state
    const currentScroll = window.scrollY;
    const shouldScroll = currentScroll > this.scrollThreshold;

    if (this.navbar) {
      if (shouldScroll && !this.isMobile) {
        this.navbar.classList.add('is-scrolled');
      } else if (this.isMobile) {
        // On mobile, less aggressive sticky effect
        this.navbar.classList.toggle('is-scrolled', shouldScroll);
      }
    }
  }

  /**
   * Destroy and cleanup (useful for SPA navigation)
   */
  destroy() {
    if (this.throttleTimer) {
      clearTimeout(this.throttleTimer);
    }
    // Observers are automatically garbage collected
  }
}

/**
 * Enhanced Staggered Reveal System
 * For revealing multiple cards/items with automatic stagger
 */
class StaggeredRevealManager {
  constructor() {
    this.staggerDelay = 100; // milliseconds between items
    this.init();
  }

  init() {
    if (!('IntersectionObserver' in window)) return;

    const observerOptions = {
      root: null,
      threshold: 0.3, // 30% visible for cards
      rootMargin: '0px'
    };

    const observerCallback = (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.revealGroup(entry.target);
          observer.unobserve(entry.target);
        }
      });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Observe all feature card containers
    document.querySelectorAll('.feature-cards-container, [data-stagger-container]').forEach(el => {
      observer.observe(el);
    });
  }

  /**
   * Reveal group of cards with automatic stagger
   */
  revealGroup(container) {
    const cards = container.querySelectorAll('.feature-card');
    cards.forEach((card, index) => {
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        card.style.opacity = '1';
        return;
      }

      // Calculate delay based on index
      const delay = index * this.staggerDelay;
      setTimeout(() => {
        card.classList.add('reveal-on-scroll', 'is-visible');
      }, delay);
    });
  }
}

/**
 * Button Animation Manager
 * Handles button press effects and hover states
 */
class ButtonAnimationManager {
  constructor() {
    this.init();
  }

  init() {
    // Add click animation to all primary buttons
    document.querySelectorAll('.navbar__button--primary, .hero-button--primary').forEach(btn => {
      btn.addEventListener('click', (e) => this.handleButtonPress(e.target));
    });

    // Add ripple effect on click
    document.querySelectorAll('button, [role="button"]').forEach(btn => {
      btn.addEventListener('click', (e) => this.createRipple(e));
    });
  }

  /**
   * Handle button press animation
   */
  handleButtonPress(button) {
    // The 'active' state trigger the buttonPress animation in CSS
    button.style.pointerEvents = 'none';
    setTimeout(() => {
      button.style.pointerEvents = 'auto';
    }, 200);
  }

  /**
   * Create ripple effect on button click
   */
  createRipple(event) {
    const button = event.currentTarget;

    // Only apply to primary/secondary buttons
    if (!button.classList.contains('navbar__button--primary') &&
        !button.classList.contains('navbar__button--secondary') &&
        !button.classList.contains('hero-button--primary') &&
        !button.classList.contains('hero-button--secondary')) {
      return;
    }

    const ripple = document.createElement('span');
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');

    button.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
  }
}

/**
 * Link Animation Manager
 * Handles navigation link animations
 */
class LinkAnimationManager {
  constructor() {
    this.init();
  }

  init() {
    // Add active state to current nav link
    const currentUrl = window.location.pathname;
    document.querySelectorAll('.navbar__nav-link').forEach(link => {
      const href = link.getAttribute('href');
      if (href && currentUrl.includes(href)) {
        link.classList.add('navbar__nav-link--active');
      }
    });

    // Footer link hover effects
    document.querySelectorAll('.footer__link').forEach(link => {
      link.addEventListener('mouseenter', (e) => this.highlightLink(e.target));
    });
  }

  /**
   * Highlight link on hover
   */
  highlightLink(link) {
    link.style.textDecoration = 'underline';
  }
}

/**
 * Performance Monitor
 * Logs animation performance metrics (dev only)
 */
class PerformanceMonitor {
  constructor() {
    this.isDev = window.location.hostname === 'localhost' ||
                 window.location.hostname === '127.0.0.1';
    if (this.isDev) {
      this.init();
    }
  }

  init() {
    // Monitor Core Web Vitals
    if ('web-vital' in window) {
      console.log('Performance monitoring initialized');
    }

    // Check for animation jank
    this.checkFrameRate();
  }

  checkFrameRate() {
    let lastTime = performance.now();
    let frameCount = 0;

    const countFrame = () => {
      frameCount++;
      const currentTime = performance.now();
      const elapsed = currentTime - lastTime;

      if (elapsed >= 1000) {
        const fps = Math.round((frameCount * 1000) / elapsed);
        if (fps < 50) {
          console.warn(`Animation jank detected: ${fps} FPS`);
        }
        frameCount = 0;
        lastTime = currentTime;
      }

      requestAnimationFrame(countFrame);
    };

    requestAnimationFrame(countFrame);
  }
}

/**
 * Initialize all systems on DOM ready
 */
document.addEventListener('DOMContentLoaded', () => {
  // Main scroll animation system
  window.scrollAnimationSystem = new ScrollAnimationSystem();

  // Staggered reveal for cards
  window.staggeredRevealManager = new StaggeredRevealManager();

  // Button animations
  window.buttonAnimationManager = new ButtonAnimationManager();

  // Link animations
  window.linkAnimationManager = new LinkAnimationManager();

  // Dev: Performance monitoring
  window.performanceMonitor = new PerformanceMonitor();
});

/**
 * Cleanup on page unload (useful for SPA)
 */
window.addEventListener('beforeunload', () => {
  if (window.scrollAnimationSystem) {
    window.scrollAnimationSystem.destroy();
  }
});

/**
 * Public API for manual animation triggers
 */
window.RaikotAnimations = {
  /**
   * Manually reveal an element with animation
   */
  reveal(element, variant = 'default') {
    if (typeof element === 'string') {
      element = document.querySelector(element);
    }
    if (!element) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      element.style.opacity = '1';
      return;
    }

    const variants = {
      'default': 'is-visible',
      'left': 'is-visible--left',
      'right': 'is-visible--right',
      'scale': 'is-visible--scale'
    };

    element.classList.add('reveal-on-scroll', variants[variant] || variants.default);
  },

  /**
   * Trigger navbar scroll state manually
   */
  triggerNavbarScroll(activate = true) {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    if (activate) {
      navbar.classList.add('is-scrolled');
    } else {
      navbar.classList.remove('is-scrolled');
    }
  },

  /**
   * Get current scroll state
   */
  isScrolled() {
    return window.scrollAnimationSystem?.isScrolled || false;
  },

  /**
   * Cleanup
   */
  destroy() {
    if (window.scrollAnimationSystem) {
      window.scrollAnimationSystem.destroy();
    }
  }
};
