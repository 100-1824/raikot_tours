/**
 * Raikot Tours Main JavaScript
 *
 * Handles animations, scroll effects, and library initializations.
 * Premium interactions for the Cinematic Luxury theme.
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Initialize AOS (Animate On Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out-cubic',
            once: false,
            offset: 100,
            mirror: false,
        });

        // Refresh AOS on window resize/load
        window.addEventListener('load', function() {
            AOS.refresh();
        });
    }

    // Hero Section Typed.js Initialization
    const typedHeroElement = document.getElementById('typed-hero');
    if (typedHeroElement && typeof Typed !== 'undefined') {
        new Typed('#typed-hero', {
            strings: ['Where true adventure begins', 'Explore the Karakoram', 'Majestic Himalayas', 'Raikot Tours'],
            typeSpeed: 60,
            backSpeed: 40,
            loop: true,
            backDelay: 2500,
            showCursor: true,
            cursorChar: '|'
        });
    }

    // Swiper Carousel Initialization
    if (typeof Swiper !== 'undefined') {
        new Swiper('.toursSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    }

    // Mobile Menu Toggle
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
            
            // Toggle icon if exists
            const icon = menuToggle.querySelector('i');
            if (icon) {
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.replace('fa-times', 'fa-bars');
                } else {
                    icon.classList.replace('fa-bars', 'fa-times');
                }
            }
        });
    }

    // Sticky Header Enhancement
    const header = document.querySelector('.site-header');
    if (header) {
        let ticking = false;

        function updateHeaderOnScroll() {
            if (window.scrollY > 50) {
                header.classList.add('shadow-xl', 'bg-[#1a2e44]/95');
                header.style.backdropFilter = 'blur(20px)';
            } else {
                header.classList.remove('shadow-xl', 'bg-[#1a2e44]/95');
                header.style.backdropFilter = 'blur(12px)';
            }
            ticking = false;
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(updateHeaderOnScroll);
                ticking = true;
            }
        });
    }

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '#0') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                const targetPosition = target.getBoundingClientRect().top + window.scrollY - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                    const icon = menuToggle.querySelector('i');
                    if (icon) icon.classList.replace('fa-times', 'fa-bars');
                }
            }
        });
    });

    // Initialize Vanilla Tilt for Tour Cards
    if (typeof VanillaTilt !== 'undefined') {
        const tiltElements = document.querySelectorAll('[data-tilt]');
        tiltElements.forEach(element => {
            VanillaTilt.init(element, {
                max: 5,
                speed: 400,
                glare: true,
                "max-glare": 0.2,
                scale: 1.02,
            });
        });
    }

    // Button ripple effect
    document.querySelectorAll('.btn-gold, button[class*="btn"], .bg-white\\/10').forEach(button => {
        button.addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.width = '0';
            ripple.style.height = '0';
            ripple.style.borderRadius = '50%';
            ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
            ripple.style.pointerEvents = 'none';

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            const size = Math.max(rect.width, rect.height) * 2;
            ripple.style.width = size + 'px';
            ripple.style.height = size + 'px';
            ripple.style.marginLeft = -size / 2 + 'px';
            ripple.style.marginTop = -size / 2 + 'px';
            ripple.style.animation = 'ripple 0.6s ease-out';

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add ripple animation to stylesheet
    if (!document.querySelector('style[data-ripple]')) {
        const style = document.createElement('style');
        style.setAttribute('data-ripple', 'true');
        style.textContent = `
            @keyframes ripple {
                to {
                    width: 1000px;
                    height: 1000px;
                    opacity: 0;
                    margin-left: -500px;
                    margin-top: -500px;
                }
            }
        `;
        document.head.appendChild(style);
    }

});

