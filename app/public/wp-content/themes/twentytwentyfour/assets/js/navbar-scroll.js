/**
 * Navbar Scroll Behavior - Premium Raikot Tours
 * Features: Glassmorphism scroll state, hamburger menu toggle, scroll listener
 * Performance: Throttled scroll events, minimal repaints
 *
 * @since 1.0
 * @package Twenty Twenty-Four
 */

(function() {
	'use strict';

	// Configuration
	const CONFIG = {
		scrollThreshold: 50, // px - when to apply glassmorphism
		scrollTimeout: 100, // ms - throttle scroll events
		mobileMenuBreakpoint: 768, // px
	};

	// State
	let scrollTimeout;
	let lastScrollY = 0;
	let isScrolled = false;
	let isMobileMenuOpen = false;

	// DOM elements
	const navbar = document.querySelector('.navbar');
	const hamburger = document.querySelector('.navbar__hamburger');
	const mobileMenu = document.querySelector('.navbar__mobile-menu');
	const mobileMenuLinks = document.querySelectorAll('.navbar__mobile-menu .navbar__nav-link');

	/**
	 * Initialize the navbar script
	 */
	function init() {
		if (!navbar) {
			console.warn('Navbar element not found');
			return;
		}

		// Add scroll listener
		window.addEventListener('scroll', throttledScroll, { passive: true });

		// Add hamburger menu toggle
		if (hamburger) {
			hamburger.addEventListener('click', toggleMobileMenu);
		}

		// Close mobile menu when a link is clicked
		mobileMenuLinks.forEach(link => {
			link.addEventListener('click', closeMobileMenu);
		});

		// Close mobile menu when clicking outside
		document.addEventListener('click', handleOutsideClick);

		// Handle window resize
		window.addEventListener('resize', handleResize);

		// Set initial scroll state
		updateScrollState();
	}

	/**
	 * Throttled scroll handler
	 */
	function throttledScroll() {
		if (scrollTimeout) {
			return;
		}

		scrollTimeout = window.setTimeout(() => {
			lastScrollY = window.scrollY;
			updateScrollState();
			scrollTimeout = null;
		}, CONFIG.scrollTimeout);
	}

	/**
	 * Update navbar scroll state
	 * Adds/removes sticky class based on scroll position
	 */
	function updateScrollState() {
		const shouldBeSticky = lastScrollY > CONFIG.scrollThreshold;

		if (shouldBeSticky !== isScrolled) {
			isScrolled = shouldBeSticky;

			if (isScrolled) {
				navbar.classList.add('navbar--sticky');
			} else {
				navbar.classList.remove('navbar--sticky');
			}

			// Dispatch custom event for other scripts to listen to
			const event = new CustomEvent('navbarScrollStateChanged', {
				detail: { isScrolled: isScrolled, scrollY: lastScrollY }
			});
			document.dispatchEvent(event);
		}
	}

	/**
	 * Toggle mobile menu
	 */
	function toggleMobileMenu() {
		if (!hamburger || !mobileMenu) {
			return;
		}

		isMobileMenuOpen = !isMobileMenuOpen;

		if (isMobileMenuOpen) {
			hamburger.classList.add('active');
			mobileMenu.classList.add('active');
			document.body.style.overflow = 'hidden'; // Prevent body scroll
		} else {
			hamburger.classList.remove('active');
			mobileMenu.classList.remove('active');
			document.body.style.overflow = ''; // Restore body scroll
		}
	}

	/**
	 * Close mobile menu
	 */
	function closeMobileMenu() {
		if (isMobileMenuOpen) {
			isMobileMenuOpen = false;
			hamburger?.classList.remove('active');
			mobileMenu?.classList.remove('active');
			document.body.style.overflow = ''; // Restore body scroll
		}
	}

	/**
	 * Handle clicks outside the mobile menu
	 */
	function handleOutsideClick(e) {
		if (!isMobileMenuOpen) {
			return;
		}

		// Don't close if clicking hamburger button (it has its own handler)
		if (e.target === hamburger || hamburger?.contains(e.target)) {
			return;
		}

		// Close if clicking outside navbar
		if (!navbar?.contains(e.target)) {
			closeMobileMenu();
		}
	}

	/**
	 * Handle window resize
	 * Close mobile menu when resizing to desktop view
	 */
	function handleResize() {
		if (window.innerWidth >= CONFIG.mobileMenuBreakpoint && isMobileMenuOpen) {
			closeMobileMenu();
		}
	}

	/**
	 * Set active link based on current scroll position
	 * This can be used to highlight the current section
	 */
	function updateActiveLink() {
		const links = document.querySelectorAll('.navbar__nav-link');
		if (!links || links.length === 0) {
			return;
		}

		// Get all sections with matching IDs
		links.forEach(link => {
			const href = link.getAttribute('href');
			if (!href || !href.startsWith('#')) {
				return;
			}

			const target = document.querySelector(href);
			if (!target) {
				link.classList.remove('navbar__nav-link--active');
				return;
			}

			// Check if target is in viewport
			const rect = target.getBoundingClientRect();
			const isVisible = rect.top <= window.innerHeight / 2 && rect.bottom >= 0;

			if (isVisible) {
				link.classList.add('navbar__nav-link--active');
			} else {
				link.classList.remove('navbar__nav-link--active');
			}
		});
	}

	/**
	 * Add smooth scroll behavior
	 */
	function setupSmoothScroll() {
		const links = document.querySelectorAll('a[href^="#"]');

		links.forEach(link => {
			link.addEventListener('click', function(e) {
				const href = this.getAttribute('href');
				if (href === '#') {
					return;
				}

				const target = document.querySelector(href);
				if (!target) {
					return;
				}

				e.preventDefault();

				// Close mobile menu if open
				closeMobileMenu();

				// Scroll to target with offset for navbar
				const offset = navbar ? navbar.offsetHeight : 0;
				const targetPosition = target.getBoundingClientRect().top + window.scrollY - offset;

				window.scrollTo({
					top: targetPosition,
					behavior: 'smooth'
				});
			});
		});
	}

	/**
	 * Add accessibility enhancements
	 */
	function setupAccessibility() {
		// Add keyboard support for hamburger menu
		if (hamburger) {
			hamburger.setAttribute('aria-label', 'Toggle navigation menu');
			hamburger.setAttribute('aria-expanded', 'false');
			hamburger.setAttribute('aria-controls', 'mobile-menu');

			// Update aria-expanded on toggle
			const originalToggle = toggleMobileMenu;
			toggleMobileMenu = function() {
				originalToggle.call(this);
				hamburger.setAttribute('aria-expanded', isMobileMenuOpen);
			};
		}

		if (mobileMenu) {
			mobileMenu.setAttribute('id', 'mobile-menu');
		}

		// Add skip to main link
		if (!document.querySelector('.skip-to-main')) {
			const skip = document.createElement('a');
			skip.className = 'skip-to-main';
			skip.href = '#main';
			skip.textContent = 'Skip to main content';
			document.body.insertBefore(skip, document.body.firstChild);
		}
	}

	/**
	 * Performance: Lazy initialize features
	 */
	function setupLazyInitialization() {
		// Initialize active link tracking only when needed
		let updateActiveTimeout;
		window.addEventListener('scroll', () => {
			clearTimeout(updateActiveTimeout);
			updateActiveTimeout = setTimeout(() => {
				updateActiveLink();
			}, 100);
		}, { passive: true });
	}

	/**
	 * Bootstrap the script
	 */
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', () => {
			init();
			setupSmoothScroll();
			setupAccessibility();
			setupLazyInitialization();
		});
	} else {
		init();
		setupSmoothScroll();
		setupAccessibility();
		setupLazyInitialization();
	}

	// Expose public API for other scripts
	window.RaikotNavbar = {
		closeMobileMenu: closeMobileMenu,
		toggleMobileMenu: toggleMobileMenu,
		isScrolled: () => isScrolled,
		scrollY: () => lastScrollY
	};
})();
