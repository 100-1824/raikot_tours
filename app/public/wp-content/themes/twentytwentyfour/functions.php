<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueues custom block stylesheets.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

/**
 * Enqueue Premium CSS and JavaScript Assets
 * Premium Raikot Tours UI components with animations
 *
 * @since 1.0
 * @return void
 */

if ( ! function_exists( 'raikot_enqueue_premium_assets' ) ) :
	function raikot_enqueue_premium_assets() {
		$version = wp_get_theme( get_template() )->get( 'Version' );
		$theme_uri = get_parent_theme_file_uri();

		// Enqueue Navbar Styles
		wp_enqueue_style(
			'raikot-navbar',
			$theme_uri . '/assets/css/navbar.css',
			array(),
			$version,
			'all'
		);

		// Enqueue Hero Section Styles
		wp_enqueue_style(
			'raikot-hero',
			$theme_uri . '/assets/css/hero.css',
			array(),
			$version,
			'all'
		);

		// Enqueue Interactive Section Styles
		wp_enqueue_style(
			'raikot-interactive-section',
			$theme_uri . '/assets/css/interactive-section.css',
			array(),
			$version,
			'all'
		);

		// Enqueue Footer Polish Styles
		wp_enqueue_style(
			'raikot-footer-polish',
			$theme_uri . '/assets/css/footer-polish.css',
			array(),
			$version,
			'all'
		);

		// Enqueue Navbar Scroll Behavior Script
		wp_enqueue_script(
			'raikot-navbar-scroll',
			$theme_uri . '/assets/js/navbar-scroll.js',
			array(),
			$version,
			array( 'in_footer' => true )
		);

		// Add inline script for navbar initialization
		wp_add_inline_script( 'raikot-navbar-scroll', '
			document.addEventListener("DOMContentLoaded", function() {
				// Initialize navbar if script loaded before DOM ready
				if (window.RaikotNavbar) {
					console.log("Raikot Navbar initialized");
				}
			});
		' );

		// Enqueue Button Effects Script
		wp_enqueue_script(
			'raikot-button-effects',
			$theme_uri . '/assets/js/button-effects.js',
			array(),
			$version,
			array( 'in_footer' => true )
		);

		// Enqueue Intersection Observer Script for scroll animations
		wp_enqueue_script(
			'raikot-intersection-observer',
			$theme_uri . '/assets/js/intersection-observer.js',
			array(),
			$version,
			array( 'in_footer' => true )
		);

		// Localize scripts with dynamic data
		wp_localize_script( 'raikot-navbar-scroll', 'raikotConfig', array(
			'scrollThreshold' => 50,
			'mobileBreakpoint' => 768,
			'themePath' => $theme_uri,
		) );
	}
endif;

add_action( 'wp_enqueue_scripts', 'raikot_enqueue_premium_assets', 20 );

/**
 * Add body classes for script detection and styling
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes
 */

if ( ! function_exists( 'raikot_add_body_classes' ) ) :
	function raikot_add_body_classes( $classes ) {
		// Add a class to indicate JavaScript is enabled
		// Note: This will be removed by JavaScript if needed
		$classes[] = 'raikot-premium-theme';

		// Add class for animations support detection
		if ( wp_is_mobile() ) {
			$classes[] = 'is-mobile';
		}

		return $classes;
	}
endif;

add_filter( 'body_class', 'raikot_add_body_classes' );

/**
 * Register script dependencies to prevent conflicts
 *
 * @return void
 */

if ( ! function_exists( 'raikot_register_dependencies' ) ) :
	function raikot_register_dependencies() {
		// Register but don't enqueue - allows other code to depend on these
		wp_register_script( 'raikot-navbar-scroll-dep', false );
		wp_register_script( 'raikot-button-effects-dep', false );
		wp_register_script( 'raikot-intersection-observer-dep', false );
	}
endif;

add_action( 'init', 'raikot_register_dependencies' );

/**
 * Optimize critical CSS (inline above-the-fold styles)
 * This improves Largest Contentful Paint (LCP)
 *
 * @return void
 */

if ( ! function_exists( 'raikot_inline_critical_css' ) ) :
	function raikot_inline_critical_css() {
		// Inline critical navbar CSS to prevent render-blocking
		?>
		<style id="raikot-critical-css">
			/* Critical navbar CSS - rendered inline */
			.navbar {
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				width: 100%;
				z-index: 40;
				background-color: transparent;
				transition: all 0.4s ease-in-out;
			}

			.navbar--sticky {
				background-color: rgba(15, 23, 42, 0.8);
				backdrop-filter: blur(16px);
				box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			}

			.navbar__container {
				display: grid;
				grid-template-columns: 1fr 2fr 1fr;
				align-items: center;
				max-width: 1400px;
				margin: 0 auto;
				padding: 1rem 2rem;
				min-height: 70px;
				gap: 2rem;
			}

			.navbar__column {
				display: flex;
				align-items: center;
				gap: 2rem;
			}

			.navbar__column--left {
				justify-self: start;
			}

			.navbar__column--center {
				justify-self: center;
				display: none;
			}

			.navbar__column--right {
				justify-self: end;
				display: flex;
				align-items: center;
				gap: 1rem;
			}

			@media (min-width: 1024px) {
				.navbar__column--center {
					display: flex;
				}
			}

			.navbar__hamburger {
				display: none;
			}

			@media (max-width: 767px) {
				.navbar__hamburger {
					display: flex;
					flex-direction: column;
					gap: 6px;
					background: transparent;
					border: none;
					cursor: pointer;
					padding: 0.5rem;
				}

				.navbar__column--center {
					display: none !important;
				}
			}

			.navbar__mobile-menu {
				display: none;
			}

			.navbar__mobile-menu.active {
				display: block;
			}
		</style>
		<?php
	}
endif;

add_action( 'wp_head', 'raikot_inline_critical_css', 5 );

/**
 * Preload critical fonts and assets
 *
 * @return void
 */

if ( ! function_exists( 'raikot_preload_assets' ) ) :
	function raikot_preload_assets() {
		$theme_uri = get_parent_theme_file_uri();

		// Preload CSS for above-the-fold content
		echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/css/navbar.css' ) . '" as="style">';
		echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/css/hero.css' ) . '" as="style">';

		// Preload JavaScript for interactive features
		echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/js/navbar-scroll.js' ) . '" as="script">';
	}
endif;

add_action( 'wp_head', 'raikot_preload_assets', 6 );

/**
 * Add Web Font preconnect for performance
 * Uncomment if using Google Fonts or Typekit
 *
 * @return void
 */

if ( ! function_exists( 'raikot_add_preconnect' ) ) :
	function raikot_add_preconnect() {
		// Preconnect to Google Fonts if used
		// echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
		// echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
	}
endif;

add_action( 'wp_head', 'raikot_add_preconnect', 1 );

/**
 * Enqueue Carousel Styles and Scripts
 *
 * @return void
 */

if ( ! function_exists( 'raikot_enqueue_carousel_assets' ) ) :
	function raikot_enqueue_carousel_assets() {
		$version = wp_get_theme( get_template() )->get( 'Version' );
		$theme_uri = get_parent_theme_file_uri();

		// Enqueue Carousel Styles
		wp_enqueue_style(
			'raikot-carousel',
			$theme_uri . '/css/cluster-carousel.css',
			array(),
			$version,
			'all'
		);

		// Enqueue Carousel Script
		wp_enqueue_script(
			'raikot-carousel',
			$theme_uri . '/js/cluster-carousel.js',
			array(),
			$version,
			array( 'in_footer' => true )
		);
	}
endif;

add_action( 'wp_enqueue_scripts', 'raikot_enqueue_carousel_assets', 20 );

/**
 * Add accessibility skip link
 *
 * @return void
 */

if ( ! function_exists( 'raikot_skip_to_main' ) ) :
	function raikot_skip_to_main() {
		?>
		<a href="#main" class="skip-to-main">
			<?php esc_html_e( 'Skip to main content', 'twentytwentyfour' ); ?>
		</a>
		<?php
	}
endif;

add_action( 'wp_body_open', 'raikot_skip_to_main' );
