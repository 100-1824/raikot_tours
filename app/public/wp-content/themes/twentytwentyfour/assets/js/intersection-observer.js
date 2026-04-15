/**
 * Intersection Observer - Scroll-Triggered Animations
 * Features: Scroll reveal for cards, heading animations, staggered effects
 * Performance: Single observer instance, efficient DOM querying
 *
 * @since 1.0
 * @package Twenty Twenty-Four
 */

(function() {
	'use strict';

	// Configuration
	const CONFIG = {
		headingThreshold: 0.6, // Reveal when 60% visible
		cardThreshold: 0.5, // Reveal when 50% visible
		staggerDelay: 100, // ms between card reveals
		rootMargin: '0px 0px -100px 0px', // Trigger 100px before bottom
	};

	// Observer instances
	let headingObserver;
	let cardObserver;
	let isObserverSupported = 'IntersectionObserver' in window;

	/**
	 * Initialize intersection observers
	 */
	function init() {
		if (!isObserverSupported) {
			console.warn('IntersectionObserver not supported, skipping scroll animations');
			return;
		}

		// Create observer for headings
		headingObserver = new IntersectionObserver(handleHeadingIntersection, {
			threshold: CONFIG.headingThreshold,
			rootMargin: CONFIG.rootMargin
		});

		// Create observer for cards with lower threshold
		cardObserver = new IntersectionObserver(handleCardIntersection, {
			threshold: CONFIG.cardThreshold,
			rootMargin: CONFIG.rootMargin
		});

		// Observe heading elements
		observeHeadings();

		// Observe card elements
		observeCards();
	}

	/**
	 * Observe all heading elements
	 */
	function observeHeadings() {
		const headings = document.querySelectorAll(
			'.interactive-section__heading, .hero__headline'
		);

		headings.forEach(heading => {
			headingObserver.observe(heading);
		});
	}

	/**
	 * Observe all card elements
	 */
	function observeCards() {
		const cards = document.querySelectorAll(
			'.interactive-section__card'
		);

		cards.forEach(card => {
			cardObserver.observe(card);
		});
	}

	/**
	 * Handle heading intersection
	 */
	function handleHeadingIntersection(entries) {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				// Heading is in viewport
				entry.target.classList.add('is-revealed');

				// Also reveal subheading if it exists
				const subheading = entry.target.nextElementSibling;
				if (subheading?.classList.contains('interactive-section__subheading')) {
					subheading.classList.add('is-revealed');
				}

				// Only observe once
				headingObserver.unobserve(entry.target);
			}
		});
	}

	/**
	 * Handle card intersection with staggered reveal
	 */
	function handleCardIntersection(entries) {
		entries.forEach((entry, index) => {
			if (entry.isIntersecting) {
				// Stagger the animation reveal
				const delay = index * CONFIG.staggerDelay;

				// Use setTimeout to apply stagger
				setTimeout(() => {
					entry.target.classList.add('is-revealed');
				}, delay);

				// Unobserve after revealing
				cardObserver.unobserve(entry.target);
			}
		});
	}

	/**
	 * Setup mutation observer for dynamic content
	 * Re-observe new elements that are added to the DOM
	 */
	function setupDynamicObserver() {
		const observer = new MutationObserver((mutations) => {
			mutations.forEach((mutation) => {
				// Look for new headings
				const newHeadings = mutation.addedNodes.forEach((node) => {
					if (node.nodeType === Node.ELEMENT_NODE) {
						if (node.classList?.contains('interactive-section__heading')) {
							headingObserver.observe(node);
						}

						// Check children
						node.querySelectorAll?.('.interactive-section__heading')
							.forEach(heading => {
								headingObserver.observe(heading);
							});

						// Check for cards
						if (node.classList?.contains('interactive-section__card')) {
							cardObserver.observe(node);
						}

						node.querySelectorAll?.('.interactive-section__card')
							.forEach(card => {
								cardObserver.observe(card);
							});
					}
				});
			});
		});

		observer.observe(document.body, {
			childList: true,
			subtree: true
		});

		return observer;
	}

	/**
	 * Fallback for browsers without Intersection Observer support
	 * Uses scroll event with throttling
	 */
	function setupFallback() {
		if (isObserverSupported) {
			return;
		}

		let scrollTimeout;

		const checkVisibility = () => {
			const headings = document.querySelectorAll(
				'.interactive-section__heading'
			);
			const cards = document.querySelectorAll(
				'.interactive-section__card'
			);

			[...headings, ...cards].forEach(element => {
				if (element.classList.contains('is-revealed')) {
					return; // Already revealed
				}

				const rect = element.getBoundingClientRect();
				const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

				if (isVisible) {
					element.classList.add('is-revealed');
				}
			});
		};

		window.addEventListener('scroll', () => {
			clearTimeout(scrollTimeout);
			scrollTimeout = setTimeout(() => {
				checkVisibility();
			}, 100);
		}, { passive: true });

		// Check on load
		checkVisibility();
	}

	/**
	 * Get visibility percentage of element
	 * Useful for progress tracking
	 */
	function getVisibilityPercentage(element) {
		const rect = element.getBoundingClientRect();
		const visible = Math.max(0, Math.min(window.innerHeight, rect.bottom) -
			Math.max(0, rect.top));
		const total = rect.height;
		return (visible / total) * 100;
	}

	/**
	 * Manual trigger for reveal (useful for buttons or controls)
	 */
	function revealElement(selector) {
		const element = document.querySelector(selector);
		if (element) {
			element.classList.add('is-revealed');
		}
	}

	/**
	 * Pause all animations
	 */
	function pauseAnimations() {
		const animated = document.querySelectorAll(
			'.interactive-section__heading.is-revealed, .interactive-section__card.is-revealed'
		);

		animated.forEach(element => {
			element.style.animationPlayState = 'paused';
		});
	}

	/**
	 * Resume all animations
	 */
	function resumeAnimations() {
		const animated = document.querySelectorAll(
			'.interactive-section__heading.is-revealed, .interactive-section__card.is-revealed'
		);

		animated.forEach(element => {
			element.style.animationPlayState = 'running';
		});
	}

	/**
	 * Reset all animations
	 */
	function resetAnimations() {
		const animated = document.querySelectorAll(
			'.interactive-section__heading, .interactive-section__card'
		);

		animated.forEach(element => {
			element.classList.remove('is-revealed');
			element.style.animationPlayState = '';
		});

		// Re-observe elements
		if (headingObserver) {
			animated.forEach(element => {
				if (element.classList.contains('interactive-section__heading')) {
					headingObserver.observe(element);
				}
				if (element.classList.contains('interactive-section__card')) {
					cardObserver.observe(element);
				}
			});
		}
	}

	/**
	 * Check if user prefers reduced motion
	 */
	function prefersReducedMotion() {
		return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	}

	/**
	 * Setup reduced motion support
	 */
	function setupReducedMotion() {
		if (prefersReducedMotion()) {
			// Reveal all elements immediately
			document.querySelectorAll(
				'.interactive-section__heading, .interactive-section__card'
			).forEach(element => {
				element.classList.add('is-revealed');
			});

			// Stop observing
			if (headingObserver) {
				document.querySelectorAll('.interactive-section__heading')
					.forEach(el => headingObserver.unobserve(el));
			}
			if (cardObserver) {
				document.querySelectorAll('.interactive-section__card')
					.forEach(el => cardObserver.unobserve(el));
			}
		}

		// Listen for changes in motion preference
		const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
		motionQuery.addListener(() => {
			if (motionQuery.matches) {
				resetAnimations();
				setupReducedMotion();
			}
		});
	}

	/**
	 * Bootstrap the script
	 */
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', () => {
			init();
			setupDynamicObserver();
			setupFallback();
			setupReducedMotion();
		});
	} else {
		init();
		setupDynamicObserver();
		setupFallback();
		setupReducedMotion();
	}

	// Expose public API
	window.RaikotObserver = {
		init: init,
		revealElement: revealElement,
		pauseAnimations: pauseAnimations,
		resumeAnimations: resumeAnimations,
		resetAnimations: resetAnimations,
		getVisibilityPercentage: getVisibilityPercentage,
		prefersReducedMotion: prefersReducedMotion
	};
})();
