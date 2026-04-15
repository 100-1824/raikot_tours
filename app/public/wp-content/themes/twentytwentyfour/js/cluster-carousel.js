/**
 * Cluster-Style Image Carousel
 *
 * Premium overlapping masonry carousel with smooth animations,
 * touch swipe support, keyboard navigation, and accessibility features.
 *
 * Features:
 * - Click and dot navigation
 * - Touch swipe support (mobile)
 * - Keyboard navigation (arrows, Enter)
 * - Auto-play with pause on hover
 * - Lazy loading images
 * - Screen reader announcements
 * - GPU-accelerated animations
 *
 * @package Raikot_Tours
 */

class ClusterCarousel {
    constructor(containerSelector = '.cluster-carousel') {
        this.container = document.querySelector(containerSelector);
        if (!this.container) {
            console.warn(`Cluster carousel container not found: ${containerSelector}`);
            return;
        }

        // DOM Elements
        this.cluster = this.container.querySelector('.carousel-cluster');
        this.items = Array.from(this.container.querySelectorAll('.carousel-item'));
        this.nextBtn = this.container.querySelector('.carousel-button--next');
        this.prevBtn = this.container.querySelector('.carousel-button--prev');
        this.indicators = Array.from(this.container.querySelectorAll('.carousel-indicator'));
        this.statusLive = document.getElementById('carousel-status');

        // Configuration
        this.config = {
            autoPlay: true,
            autoPlayInterval: 5000, // ms
            pauseOnHover: true,
            pauseOnFocus: true,
            swipeThreshold: 50, // px
            animationDuration: 400, // ms
        };

        // State
        this.currentIndex = 0;
        this.totalItems = this.items.length;
        this.autoPlayTimer = null;
        this.isAnimating = false;
        this.touchStartX = 0;
        this.touchEndX = 0;

        // Initialize
        if (this.totalItems > 0) {
            this.init();
        }
    }

    /**
     * Initialize carousel
     */
    init() {
        this.setupEventListeners();
        this.updateActiveIndicator();
        this.startAutoPlay();

        // Lazy load images
        this.setupLazyLoading();

        // Intersection Observer for scroll animations
        this.setupIntersectionObserver();
    }

    /**
     * Setup event listeners
     */
    setupEventListeners() {
        // Navigation buttons
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.nextSlide());
        }
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
        }

        // Indicator dots
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goToSlide(index));
            indicator.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.goToSlide(index);
                }
            });
        });

        // Keyboard navigation
        this.container.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault();
                this.nextSlide();
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault();
                this.prevSlide();
            }
        });

        // Touch swipe support
        this.cluster.addEventListener('touchstart', (e) => this.handleTouchStart(e), false);
        this.cluster.addEventListener('touchend', (e) => this.handleTouchEnd(e), false);

        // Mouse drag support (optional)
        this.cluster.addEventListener('mousedown', (e) => this.handleMouseDown(e));
        this.cluster.addEventListener('mouseup', (e) => this.handleMouseUp(e));

        // Auto-play pause on hover
        if (this.config.pauseOnHover) {
            this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
            this.container.addEventListener('mouseleave', () => this.startAutoPlay());
        }

        // Auto-play pause on focus
        if (this.config.pauseOnFocus) {
            this.container.addEventListener('focusin', () => this.stopAutoPlay());
            this.container.addEventListener('focusout', () => this.startAutoPlay());
        }

        // Carousel item clicks
        this.items.forEach((item, index) => {
            item.addEventListener('click', () => {
                const link = item.querySelector('.carousel-link');
                if (link) {
                    window.location.href = link.href;
                }
            });

            // Keyboard support for carousel items
            item.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    const link = item.querySelector('.carousel-link');
                    if (link) {
                        e.preventDefault();
                        link.click();
                    }
                }
            });
        });
    }

    /**
     * Handle touch start
     */
    handleTouchStart(e) {
        this.touchStartX = e.changedTouches[0].screenX;
        this.stopAutoPlay();
    }

    /**
     * Handle touch end (swipe detection)
     */
    handleTouchEnd(e) {
        this.touchEndX = e.changedTouches[0].screenX;
        const difference = this.touchStartX - this.touchEndX;

        if (Math.abs(difference) > this.config.swipeThreshold) {
            if (difference > 0) {
                // Swiped left
                this.nextSlide();
            } else {
                // Swiped right
                this.prevSlide();
            }
        }

        this.startAutoPlay();
    }

    /**
     * Handle mouse down for drag detection
     */
    handleMouseDown(e) {
        this.touchStartX = e.screenX;
    }

    /**
     * Handle mouse up
     */
    handleMouseUp(e) {
        this.touchEndX = e.screenX;
        const difference = this.touchStartX - this.touchEndX;

        if (Math.abs(difference) > this.config.swipeThreshold) {
            if (difference > 0) {
                this.nextSlide();
            } else {
                this.prevSlide();
            }
        }
    }

    /**
     * Go to specific slide
     */
    goToSlide(index) {
        if (this.isAnimating || index === this.currentIndex) {
            return;
        }

        if (index < 0 || index >= this.totalItems) {
            return;
        }

        this.isAnimating = true;
        this.currentIndex = index;

        this.updateActiveIndicator();
        this.announceSlide();

        // Simulate animation delay
        setTimeout(() => {
            this.isAnimating = false;
        }, this.config.animationDuration);

        this.stopAutoPlay();
        this.startAutoPlay();
    }

    /**
     * Go to next slide
     */
    nextSlide() {
        const nextIndex = (this.currentIndex + 1) % this.totalItems;
        this.goToSlide(nextIndex);
    }

    /**
     * Go to previous slide
     */
    prevSlide() {
        const prevIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;
        this.goToSlide(prevIndex);
    }

    /**
     * Update active indicator
     */
    updateActiveIndicator() {
        this.indicators.forEach((indicator, index) => {
            const isActive = index === this.currentIndex;
            indicator.classList.toggle('carousel-indicator--active', isActive);
            indicator.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        // Update focus management
        if (this.indicators[this.currentIndex]) {
            this.indicators[this.currentIndex].focus();
        }
    }

    /**
     * Announce current slide to screen readers
     */
    announceSlide() {
        const item = this.items[this.currentIndex];
        if (!item || !this.statusLive) {
            return;
        }

        const title = item.querySelector('.carousel-title')?.textContent || 'Slide';
        const announcement = `Slide ${this.currentIndex + 1} of ${this.totalItems}: ${title}`;

        this.statusLive.textContent = announcement;
    }

    /**
     * Start auto-play
     */
    startAutoPlay() {
        if (!this.config.autoPlay || this.autoPlayTimer) {
            return;
        }

        this.autoPlayTimer = setInterval(() => {
            this.nextSlide();
        }, this.config.autoPlayInterval);
    }

    /**
     * Stop auto-play
     */
    stopAutoPlay() {
        if (this.autoPlayTimer) {
            clearInterval(this.autoPlayTimer);
            this.autoPlayTimer = null;
        }
    }

    /**
     * Setup lazy loading for images
     */
    setupLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        // Image is already loaded by browser's native lazy loading
                        // This can be enhanced with custom loading logic if needed
                        observer.unobserve(img);
                    }
                });
            });

            this.items.forEach((item) => {
                const img = item.querySelector('.carousel-image');
                if (img) {
                    imageObserver.observe(img);
                }
            });
        }
    }

    /**
     * Setup Intersection Observer for scroll-triggered animations
     */
    setupIntersectionObserver() {
        if (!('IntersectionObserver' in window)) {
            return;
        }

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        // Trigger animation on carousel items when visible
                        entry.target.classList.add('visible');
                    }
                });
            },
            {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px',
            }
        );

        this.items.forEach((item) => {
            observer.observe(item);
        });
    }

    /**
     * Destroy carousel and cleanup
     */
    destroy() {
        this.stopAutoPlay();
        // Remove event listeners
        if (this.nextBtn) this.nextBtn.removeEventListener('click', () => this.nextSlide());
        if (this.prevBtn) this.prevBtn.removeEventListener('click', () => this.prevSlide());
    }

    /**
     * Update carousel configuration
     */
    updateConfig(newConfig) {
        this.config = { ...this.config, ...newConfig };
    }
}

/**
 * Initialize carousel on DOM ready
 */
(function () {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCarousel);
    } else {
        initCarousel();
    }

    function initCarousel() {
        // Initialize all carousel instances
        const carousel = new ClusterCarousel('.cluster-carousel');

        // Expose to window for external control if needed
        window.clusterCarousel = carousel;

        // Re-initialize carousel on WordPress customizer changes
        if (window.wp && window.wp.customize) {
            window.wp.customize.bind('preview-ready', function () {
                // Reinitialize if needed
            });
        }
    }
})();

/**
 * Carousel instance management
 */
const CarouselManager = {
    instances: [],

    /**
     * Create new carousel instance
     */
    create: function (containerSelector, config = {}) {
        const carousel = new ClusterCarousel(containerSelector);
        if (config) {
            carousel.updateConfig(config);
        }
        this.instances.push(carousel);
        return carousel;
    },

    /**
     * Destroy all carousels
     */
    destroyAll: function () {
        this.instances.forEach((carousel) => carousel.destroy());
        this.instances = [];
    },

    /**
     * Get carousel instance by selector
     */
    getInstance: function (containerSelector) {
        return this.instances.find(
            (c) => c.container && c.container.matches(containerSelector)
        );
    },
};

// Expose manager to window
window.CarouselManager = CarouselManager;
