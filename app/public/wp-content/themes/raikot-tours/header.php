<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        luxury: {
                            gold: '#c5a059',
                            'gold-light': '#f7ef8a',
                            'gold-dark': '#aa8913',
                            navy: '#020617',
                            'navy-light': '#0f172a',
                        }
                    },
                    fontFamily: {
                        playfair: ['Playfair Display', 'serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        .glass-header {
            background: rgba(2, 6, 23, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(197, 160, 89, 0.1);
        }
        .header-scrolled {
            background: rgba(2, 6, 23, 0.95) !important;
            backdrop-filter: blur(24px) !important;
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            border-bottom: 1px solid rgba(197, 160, 89, 0.3) !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .header-scrolled .site-branding span:first-child {
            font-size: 1.5rem !important;
        }
        /* Navigation Styles */
        .main-navigation {
            display: flex !important;
            align-items: center !important;
        }
        .main-navigation ul {
            display: flex !important;
            align-items: center !important;
            gap: 1.5rem !important;
        }
        .main-navigation li {
            display: list-item !important;
        }
        .main-navigation a {
            color: white !important;
            display: block !important;
            padding: 1rem 0.5rem !important;
            font-weight: 700 !important;
            font-size: 11px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.2em !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            border-bottom: 2px solid transparent !important;
        }
        .main-navigation a:hover {
            color: #c5a059 !important;
            border-bottom-color: #c5a059 !important;
        }
        /* Header Actions */
        .header-actions a {
            display: block !important;
            text-decoration: none !important;
        }
        .header-actions a:first-of-type {
            color: #c5a059 !important;
            font-weight: bold !important;
            padding: 1rem 0.5rem !important;
            border-bottom: 2px solid transparent !important;
        }
        .header-actions a:last-of-type {
            background: #c5a059 !important;
            color: #020617 !important;
            padding: 0.6rem 1.25rem !important;
            border-radius: 9999px !important;
            font-weight: bold !important;
            font-size: 9px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.2em !important;
            box-shadow: 0 4px 15px rgba(197, 160, 89, 0.3) !important;
        }
        .header-actions a:last-of-type:hover {
            background: white !important;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- TOP BAR -->
<div class="top-bar bg-luxury-navy text-white/50 py-2 border-b border-white/5 text-[11px] hidden lg:block font-inter uppercase tracking-[0.2em]">
    <div class="container mx-auto px-8 flex justify-between items-center">
        <div class="top-bar-left flex items-center space-x-10">
            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', get_theme_mod( 'raikot_tours_phone', '+92 314 7633193' ) ) ); ?>" class="hover:text-luxury-gold transition-colors flex items-center group">
                <i class="fas fa-phone-alt mr-3 text-luxury-gold/50 group-hover:text-luxury-gold transition-colors"></i> 
                <span class="font-medium"><?php echo esc_html( get_theme_mod( 'raikot_tours_phone', '+92 314 7633193' ) ); ?></span>
            </a>
            <a href="mailto:<?php echo esc_attr( get_theme_mod( 'raikot_tours_email', 'info@raikottours.pk' ) ); ?>" class="hover:text-luxury-gold transition-colors flex items-center group">
                <i class="fas fa-envelope mr-3 text-luxury-gold/50 group-hover:text-luxury-gold transition-colors"></i> 
                <span class="font-medium"><?php echo esc_html( get_theme_mod( 'raikot_tours_email', 'info@raikottours.pk' ) ); ?></span>
            </a>
        </div>
        <div class="top-bar-right flex items-center space-x-8">
            <span class="text-luxury-gold/40 italic lowercase tracking-normal font-playfair pr-4 border-r border-white/5">The Pinnacle of Himalayan Exploration</span>
            <div class="flex items-center space-x-5">
                <?php if ( get_theme_mod( 'raikot_tours_facebook' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_facebook' ) ); ?>" target="_blank" class="hover:text-luxury-gold transition-all" aria-label="Facebook"><i class="fab fa-facebook-f text-xs"></i></a>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'raikot_tours_instagram' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'raikot_tours_instagram' ) ); ?>" target="_blank" class="hover:text-luxury-gold transition-all" aria-label="Instagram"><i class="fab fa-instagram text-xs"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<header id="masthead" class="site-header glass-header border-b border-white/5 sticky top-0 z-50 transition-all duration-700">
    <div class="container mx-auto px-8 py-4 flex items-center justify-between">
        <div class="site-branding flex-shrink-0 group">
            <?php if ( has_custom_logo() ) : ?>
                <div class="transition-transform duration-700 group-hover:scale-105"><?php the_custom_logo(); ?></div>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex flex-col">
                        <span class="font-playfair italic font-bold text-4xl tracking-tighter text-white group-hover:text-luxury-gold transition-all duration-700"><?php bloginfo( 'name' ); ?></span>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="w-4 h-[1px] bg-luxury-gold/40"></span>
                            <span class="text-[9px] text-luxury-gold font-inter uppercase font-bold tracking-[0.5em]">Noble Expeditions</span>
                        </div>
                    </a>
                </h1>
            <?php endif; ?>
        </div>

        <nav id="site-navigation" class="main-navigation mr-auto ml-8 flex">
            <ul class="flex items-center space-x-6 text-white font-inter text-[11px] tracking-[0.2em] font-black uppercase">
                <li class="relative group">
                    <a href="<?php echo home_url('/'); ?>" class="hover:text-luxury-gold transition-colors py-4 px-2 border-b-2 border-transparent hover:border-luxury-gold">Home</a>
                </li>
                <li class="relative group">
                    <a href="<?php echo home_url('/our-tours'); ?>" class="hover:text-luxury-gold transition-colors flex items-center py-4 px-2 border-b-2 border-transparent hover:border-luxury-gold">
                        Tours <i class="fas fa-chevron-down ml-2 text-[8px] opacity-30"></i>
                    </a>
                </li>
                <li class="relative group">
                    <a href="<?php echo home_url('/trekking'); ?>" class="hover:text-luxury-gold transition-colors py-4 px-2 border-b-2 border-transparent hover:border-luxury-gold">Expeditions</a>
                </li>
                <li class="relative group">
                    <a href="<?php echo home_url('/rental'); ?>" class="hover:text-luxury-gold transition-colors py-4 px-2 border-b-2 border-transparent hover:border-luxury-gold">Rental</a>
                </li>
                <li class="relative group">
                    <a href="<?php echo home_url('/reviews'); ?>" class="hover:text-luxury-gold transition-colors py-4 px-2 border-b-2 border-transparent hover:border-luxury-gold">Reviews</a>
                </li>
                <li class="relative group">
                    <a href="<?php echo home_url('/about'); ?>" class="hover:text-luxury-gold transition-colors py-4 px-2 border-b-2 border-transparent hover:border-luxury-gold">About Us</a>
                </li>
            </ul>
        </nav>

        <div class="header-actions flex items-center ml-auto gap-3">
            <a href="<?php echo home_url('/contact'); ?>" class="block text-luxury-gold text-[10px] font-bold tracking-[0.2em] uppercase hover:text-luxury-gold/80 transition-all border-b-2 border-transparent hover:border-luxury-gold py-4 px-2">
                Contact
            </a>
            <a href="<?php echo home_url('/contact'); ?>" class="block bg-luxury-gold text-luxury-navy px-5 py-2 rounded-full text-[9px] font-bold tracking-[0.2em] uppercase hover:bg-white hover:text-luxury-navy transition-all shadow-lg">
                Book Expedition
            </a>
            <button id="mobile-menu-toggle" class="hidden text-white flex flex-col gap-1.5 p-2 group" aria-label="Menu">
                <span class="block w-6 h-0.5 bg-white group-hover:bg-luxury-gold transition-all"></span>
                <span class="block w-4 h-0.5 bg-white group-hover:bg-luxury-gold transition-all ml-auto"></span>
                <span class="block w-6 h-0.5 bg-white group-hover:bg-luxury-gold transition-all"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden backdrop-blur-xl bg-[#1a2e44]/95 border-t border-[#d4af37]/10">
    <nav class="container mx-auto px-4 py-6">
        <ul class="flex flex-col space-y-4 text-white font-medium">
            <li><a href="<?php echo home_url('/'); ?>" class="block py-2 hover:text-[#d4af37] transition-colors">Home</a></li>
            <li><a href="<?php echo home_url('/our-tours'); ?>" class="block py-2 hover:text-[#d4af37] transition-colors">Tours</a></li>
            <li><a href="<?php echo home_url('/trekking'); ?>" class="block py-2 hover:text-[#d4af37] transition-colors">Trekking &amp; Riding</a></li>
            <li><a href="<?php echo home_url('/about'); ?>" class="block py-2 hover:text-[#d4af37] transition-colors">About Us</a></li>
            <li><a href="<?php echo home_url('/reviews'); ?>" class="block py-2 hover:text-[#d4af37] transition-colors">Reviews</a></li>
            <li class="border-t border-white/10 pt-4">
                <a href="<?php echo home_url('/contact'); ?>" class="block py-2 bg-gradient-to-r from-[#d4af37] to-[#f7ef8a] text-[#1a2e44] px-4 rounded-lg font-bold text-center">
                    Contact Us
                </a>
            </li>
        </ul>
    </nav>
</div>



<main id="primary" class="site-main">
