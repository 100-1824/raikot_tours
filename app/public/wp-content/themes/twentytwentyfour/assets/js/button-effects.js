/**
 * Button Effects - Premium Raikot Tours
 * Features: Hover interactions, ripple effects, keyboard support
 * Performance: Passive event listeners, minimal repaints
 *
 * @since 1.0
 * @package Twenty Twenty-Four
 */

(function() {
	'use strict';

	// Configuration
	const CONFIG = {
		rippleDuration: 600, // ms - ripple animation duration
		hoverScale: 1.05, // scale factor on hover
		focusOutlineColor: '#d4af37',
	};

	/**
	 * Initialize button effects
	 */
	function init() {
		const buttons = document.querySelectorAll(
			'.navbar__button, .hero__button, .interactive-section__card-cta, button[class*="btn"]'
		);

		buttons.forEach(button => {
			// Add ripple effect container
			if (!button.querySelector('.ripple')) {
				const ripple = document.createElement('span');
				ripple.className = 'ripple';
				button.appendChild(ripple);
			}

			// Add event listeners
			button.addEventListener('click', handleButtonClick);
			button.addEventListener('mouseenter', handleButtonHover);
			button.addEventListener('mouseleave', handleButtonHoverEnd);
			button.addEventListener('focus', handleButtonFocus);
			button.addEventListener('blur', handleButtonBlur);
		});
	}

	/**
	 * Create ripple effect on click
	 * This adds visual feedback for button interactions
	 */
	function handleButtonClick(e) {
		const button = this;

		// Remove existing ripple animation
		const existingRipple = button.querySelector('.ripple');
		if (existingRipple) {
			existingRipple.style.animation = 'none';
			existingRipple.offsetHeight; // Trigger reflow
		}

		const ripple = button.querySelector('.ripple') || createRipple(button);

		// Get click position relative to button
		const rect = button.getBoundingClientRect();
		const x = e.clientX - rect.left;
		const y = e.clientY - rect.top;

		// Set ripple position
		ripple.style.left = x + 'px';
		ripple.style.top = y + 'px';
		ripple.style.animation = 'ripple 0.6s ease-out';
	}

	/**
	 * Handle button hover - start
	 */
	function handleButtonHover() {
		const button = this;

		// Add hover class for CSS animation
		button.classList.add('is-hovered');

		// Add subtle depth with shadow
		if (!button.style.filter) {
			button.style.boxShadow = `0 12px 30px rgba(212, 175, 55, 0.4)`;
		}
	}

	/**
	 * Handle button hover - end
	 */
	function handleButtonHoverEnd() {
		const button = this;

		// Remove hover class
		button.classList.remove('is-hovered');

		// Reset shadow
		button.style.boxShadow = '';
	}

	/**
	 * Handle button focus (keyboard navigation)
	 */
	function handleButtonFocus() {
		const button = this;

		// Add focus class for visual indication
		button.classList.add('is-focused');

		// Ensure focus ring is visible
		if (button.classList.contains('navbar__button--primary') ||
			button.classList.contains('hero__button--primary')) {
			button.style.outline = `2px solid ${CONFIG.focusOutlineColor}`;
			button.style.outlineOffset = '2px';
		}
	}

	/**
	 * Handle button blur (keyboard navigation)
	 */
	function handleButtonBlur() {
		const button = this;

		// Remove focus class
		button.classList.remove('is-focused');

		// Reset outline
		button.style.outline = '';
	}

	/**
	 * Create ripple element
	 */
	function createRipple(button) {
		const ripple = document.createElement('span');
		ripple.className = 'ripple';
		button.appendChild(ripple);
		return ripple;
	}

	/**
	 * Add CSS styles for button effects
	 */
	function injectStyles() {
		const style = document.createElement('style');
		style.textContent = `
			/* Ripple effect styles */
			.ripple {
				position: absolute;
				width: 20px;
				height: 20px;
				border-radius: 50%;
				background: rgba(255, 255, 255, 0.6);
				transform: translate(-50%, -50%);
				pointer-events: none;
			}

			@keyframes ripple {
				to {
					transform: translate(-50%, -50%) scale(4);
					opacity: 0;
				}
			}

			/* Button hover state */
			.navbar__button.is-hovered,
			.hero__button.is-hovered {
				transform: translateY(-2px);
			}

			.hero__button--primary.is-hovered {
				transform: scale(1.05);
			}

			/* Button focus state */
			.navbar__button.is-focused,
			.hero__button.is-focused {
				outline: 2px solid ${CONFIG.focusOutlineColor};
				outline-offset: 2px;
			}

			/* Active state */
			.navbar__button:active,
			.hero__button:active {
				transform: scale(0.98);
			}

			/* Reduced motion support */
			@media (prefers-reduced-motion: reduce) {
				.ripple {
					display: none;
				}

				.navbar__button.is-hovered,
				.hero__button.is-hovered,
				.navbar__button:active,
				.hero__button:active {
					transform: none;
				}
			}
		`;
		document.head.appendChild(style);
	}

	/**
	 * Setup keyboard support for button interactions
	 */
	function setupKeyboardSupport() {
		document.addEventListener('keydown', (e) => {
			// Handle Enter and Space for button activation
			if ((e.key === 'Enter' || e.key === ' ') &&
				e.target.tagName === 'BUTTON') {
				e.preventDefault();
				e.target.click();
			}
		});
	}

	/**
	 * Add accessible ripple effects with ARIA
	 */
	function setupAccessibility() {
		const buttons = document.querySelectorAll(
			'.navbar__button, .hero__button, .interactive-section__card-cta'
		);

		buttons.forEach(button => {
			// Ensure button has proper role
			if (!button.hasAttribute('role') && button.tagName !== 'BUTTON') {
				button.setAttribute('role', 'button');
				button.setAttribute('tabindex', '0');
			}

			// Add aria-pressed for toggle buttons
			if (button.classList.contains('navbar__hamburger')) {
				button.setAttribute('aria-pressed', 'false');
			}

			// Add aria-label if missing
			if (!button.hasAttribute('aria-label') && !button.textContent.trim()) {
				button.setAttribute('aria-label', 'Button');
			}
		});
	}

	/**
	 * Add touch support for mobile devices
	 */
	function setupTouchSupport() {
		const buttons = document.querySelectorAll(
			'.navbar__button, .hero__button'
		);

		buttons.forEach(button => {
			// Add touch event listeners
			button.addEventListener('touchstart', () => {
				button.classList.add('is-touched');
			}, { passive: true });

			button.addEventListener('touchend', () => {
				button.classList.remove('is-touched');
			}, { passive: true });

			// Prevent double-tap zoom on double-click
			let lastTap = 0;
			button.addEventListener('touchend', (e) => {
				const currentTime = new Date().getTime();
				const tapLength = currentTime - lastTap;
				if (tapLength < 500 && tapLength > 0) {
					e.preventDefault();
				}
				lastTap = currentTime;
			}, false);
		});
	}

	/**
	 * Monitor button state changes
	 */
	function setupStateMonitoring() {
		const observer = new MutationObserver((mutations) => {
			mutations.forEach((mutation) => {
				if (mutation.type === 'childList') {
					// Re-initialize buttons if DOM changes
					init();
				}
			});
		});

		observer.observe(document.body, {
			childList: true,
			subtree: true
		});

		return observer;
	}

	/**
	 * Bootstrap the script
	 */
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', () => {
			injectStyles();
			init();
			setupKeyboardSupport();
			setupAccessibility();
			setupTouchSupport();
			setupStateMonitoring();
		});
	} else {
		injectStyles();
		init();
		setupKeyboardSupport();
		setupAccessibility();
		setupTouchSupport();
		setupStateMonitoring();
	}

	// Expose public API
	window.RaikotButtonEffects = {
		init: init,
		setupAccessibility: setupAccessibility
	};
})();
