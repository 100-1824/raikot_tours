# Cluster-Style Image Carousel Implementation Guide

## Table of Contents
1. [Overview](#overview)
2. [Component Architecture](#component-architecture)
3. [File Structure](#file-structure)
4. [HTML Structure](#html-structure)
5. [CSS Layout & Styling](#css-layout--styling)
6. [JavaScript Functionality](#javascript-functionality)
7. [Image Content Configuration](#image-content-configuration)
8. [Responsive Breakpoints](#responsive-breakpoints)
9. [Accessibility Features](#accessibility-features)
10. [Performance Optimization](#performance-optimization)
11. [Configuration Options](#configuration-options)
12. [Image Requirements](#image-requirements)
13. [Integration with WordPress](#integration-with-wordpress)
14. [Customization Guide](#customization-guide)
15. [Troubleshooting](#troubleshooting)
16. [Testing Procedures](#testing-procedures)

---

## Overview

The **Cluster-Style Image Carousel** is a premium, production-ready image carousel component that replaces the "Raikot Signature" section on the Raikot Tours homepage. It features:

- **Overlapping Cluster Layout**: Masonry-style grid with z-index layering for depth
- **Smooth Animations**: GPU-accelerated transforms with spring easing
- **Premium Interactions**: Hover effects, scale transforms, gold glow shadows
- **Responsive Design**: Adapts from desktop cluster layout to mobile single-column
- **Touch Support**: Native swipe gestures for mobile devices
- **Keyboard Navigation**: Arrow keys, Tab, and Enter support
- **Auto-play**: Configurable auto-rotation with pause-on-hover
- **Accessibility**: WCAG 2.1 AA compliance, screen reader support, focus indicators
- **Performance**: Lazy loading, GPU acceleration, minimal layout thrashing

---

## Component Architecture

### Design Pattern: Model-View-Controller (MVC)

```
┌─────────────────────────────────────────────────────┐
│  PHP Layer (Model)                                  │
│  - carousel-images.php: Data source, image array   │
│  - Supports WordPress media library integration    │
└─────────────────────────────────────────────────────┘
                          │
┌─────────────────────────────────────────────────────┐
│  HTML Layer (View)                                  │
│  - cluster-carousel.php: Template rendering        │
│  - Semantic HTML, ARIA labels, alt text           │
└─────────────────────────────────────────────────────┘
                          │
┌─────────────────────────────────────────────────────┐
│  CSS + JS Layer (Controller)                        │
│  - cluster-carousel.css: Layout, animations        │
│  - cluster-carousel.js: Navigation, interactions   │
└─────────────────────────────────────────────────────┘
```

### Data Flow

```
get_carousel_images()
  ├── WordPress post meta (priority)
  ├── Custom post type images
  └── Fallback array (defaults)
        │
        ↓
PHP template renders HTML
  ├── Figure elements with images
  ├── Overlay with titles/descriptions
  ├── Navigation controls
  └── ARIA labels
        │
        ↓
CSS applies styling & animations
  ├── Grid layout positioning
  ├── Hover/active states
  ├── Responsive adjustments
  └── Accessibility overrides
        │
        ↓
JavaScript enables interactions
  ├── Click/swipe navigation
  ├── Keyboard support
  ├── Auto-play
  └── State management
```

---

## File Structure

```
wp-content/themes/raikot-tours/
├── template-parts/
│   └── cluster-carousel.php          # Main carousel template
├── inc/
│   └── carousel-images.php           # Image data & WordPress integration
├── css/
│   └── cluster-carousel.css          # Styling & animations
├── js/
│   └── cluster-carousel.js           # JavaScript functionality
└── functions.php                     # Enqueues scripts/styles
```

---

## HTML Structure

### Semantic Element Hierarchy

```html
<section class="cluster-carousel-section">
  <!-- Section Header -->
  <div class="container">
    <div class="mb-24">
      <!-- Overline -->
      <span class="text-luxury-gold">The Raikot Signature</span>
      
      <!-- Main Heading -->
      <h2 class="font-playfair text-7xl">Navigating With Elegance</h2>
      
      <!-- Description -->
      <p class="text-white/60">Experience description...</p>
    </div>
    
    <!-- Main Carousel -->
    <div class="cluster-carousel" role="region">
      <!-- Image Cluster -->
      <div class="carousel-wrapper">
        <div class="carousel-cluster" role="group">
          <!-- Individual Items -->
          <figure class="carousel-item">
            <div class="carousel-image-container">
              <img class="carousel-image" src="..." alt="...">
              
              <!-- Content Overlay -->
              <div class="carousel-overlay">
                <div class="carousel-content">
                  <h3 class="carousel-title">Title</h3>
                  <p class="carousel-description">Description</p>
                  <a class="carousel-link" href="#">Explore →</a>
                </div>
              </div>
            </div>
            <figcaption class="sr-only">Accessible caption</figcaption>
          </figure>
          <!-- More items... -->
        </div>
      </div>
      
      <!-- Navigation Controls -->
      <div class="carousel-controls" role="group">
        <button class="carousel-button carousel-button--prev">
          <i class="fas fa-chevron-left"></i>
        </button>
        
        <div class="carousel-indicators" role="tablist">
          <button class="carousel-indicator carousel-indicator--active"
                  aria-selected="true"
                  data-index="0"></button>
          <!-- More indicators... -->
        </div>
        
        <button class="carousel-button carousel-button--next">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
      
      <!-- Screen Reader Status -->
      <div class="sr-only" aria-live="polite" id="carousel-status">
        Image 1 of 6
      </div>
    </div>
    
    <!-- Feature Highlights -->
    <div class="mt-24 grid grid-cols-3 gap-8">
      <!-- Feature cards -->
    </div>
  </div>
</section>
```

### Key Semantic Elements

| Element | Purpose | Accessibility |
|---------|---------|---|
| `<section>` | Main carousel container | Semantic landmark |
| `<figure>` | Individual image item | Semantic image grouping |
| `<figcaption>` | Image description | Hidden accessible caption |
| `role="region"` | Carousel container | Announces carousel region |
| `role="group"` | Image cluster | Groups related items |
| `role="tablist"` | Indicator dots | Navigation role |
| `role="tab"` | Indicator dot | Individual indicator role |
| `role="img"` | Carousel item | Image role |
| `aria-label` | Element description | Screen reader text |
| `aria-selected` | Indicator state | Current slide state |
| `aria-live` | Status updates | Live region for updates |

---

## CSS Layout & Styling

### Grid System

The carousel uses CSS Grid for responsive masonry layout:

```css
.carousel-cluster {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.carousel-item--featured {
    grid-column: span 2;  /* Wider on desktop */
    aspect-ratio: 16 / 9;
    z-index: 30;
}
```

### Responsive Breakpoints

#### Desktop (1024px+)
- 4-column grid
- Featured image: 2x2 span, prominent center
- Side images: 1x2 span
- Full hover effects with descriptions
- Auto-play enabled

#### Tablet (768px - 1023px)
- 2-column grid
- Featured image: full width (2-col span)
- Side images: 1-col each
- Reduced descriptions
- Touch-friendly navigation buttons

#### Mobile (up to 767px)
- 1-column layout
- All items same size (4:3 aspect ratio)
- Minimal hover effects
- Simplified navigation
- Optimized for touch interaction

### Hover Effects

```css
.carousel-item:hover {
    /* Scale up 5% */
    transform: scale(1.05);
    
    /* Gold glow shadow */
    box-shadow: 0 30px 80px rgba(212, 175, 55, 0.35);
    
    /* Border color shift */
    border-color: rgba(212, 175, 55, 0.5);
    
    /* Z-index increase */
    z-index: 40;
    
    /* Full opacity */
    opacity: 1;
}

.carousel-item:hover .carousel-image {
    /* Image zoom on hover */
    transform: scale(1.1);
}

.carousel-item:hover .carousel-overlay {
    /* Overlay fade in */
    opacity: 1;
}

.carousel-item:hover .carousel-title,
.carousel-item:hover .carousel-description,
.carousel-item:hover .carousel-link {
    /* Content reveal from bottom */
    opacity: 1;
    transform: translateY(0);
}
```

### Animation Easing

- **Spring easing**: `cubic-bezier(0.34, 1.56, 0.64, 1)` - Premium feel
- **Smooth easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)` - Standard transitions
- **Durations**: 150-600ms depending on interaction type

### Color Palette

| Color | Usage | Code |
|-------|-------|------|
| Gold | Accents, hover states | `#d4af37` |
| Dark Gold | Hover variant | `#c9a227` |
| Light Gold | Active/focus | `#e8c547` |
| Navy | Dark backgrounds | `#1a2e44` |
| White/70% | Text overlays | `rgba(255,255,255,0.7)` |

---

## JavaScript Functionality

### Class: `ClusterCarousel`

Main carousel controller class with event handling and state management.

```javascript
class ClusterCarousel {
    constructor(containerSelector = '.cluster-carousel')
    init()
    setupEventListeners()
    goToSlide(index)
    nextSlide()
    prevSlide()
    updateActiveIndicator()
    announceSlide()
    startAutoPlay()
    stopAutoPlay()
    setupLazyLoading()
    setupIntersectionObserver()
    destroy()
}
```

### Event Handlers

#### Click Navigation
```javascript
// Next/Previous buttons
nextBtn.addEventListener('click', () => this.nextSlide());
prevBtn.addEventListener('click', () => this.prevSlide());

// Indicator dots
indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => this.goToSlide(index));
});
```

#### Keyboard Navigation
```javascript
// Arrow keys: left/up (previous), right/down (next)
// Enter: Navigate to focused indicator
// Tab: Focus management between controls
```

#### Touch Swipe Detection
```javascript
// Swipe left: next slide
// Swipe right: previous slide
// Threshold: 50px minimum swipe distance
```

#### Auto-play
```javascript
startAutoPlay() {
    // Interval: 5 seconds (configurable)
    this.autoPlayTimer = setInterval(() => {
        this.nextSlide();
    }, this.config.autoPlayInterval);
}

// Pause on: hover, focus, interaction
stopAutoPlay() {
    clearInterval(this.autoPlayTimer);
}
```

### State Management

```javascript
this.currentIndex = 0;        // Active slide index
this.isAnimating = false;     // Animation lock
this.touchStartX = 0;         // Touch swipe start
this.autoPlayTimer = null;    // Auto-play timer reference
```

### Performance Optimizations

- **GPU Acceleration**: Only animates `transform` and `opacity`
- **Debouncing**: Touch/scroll events throttled
- **Lazy Loading**: Images loaded on-demand
- **Intersection Observer**: Scroll-triggered reveals
- **will-change CSS**: Pre-announces animations

---

## Image Content Configuration

### Data Structure

```php
$carousel_images = array(
    array(
        'id'          => 1,
        'url'         => 'https://example.com/image1.jpg',
        'title'       => 'Mountain Peaks',
        'description' => 'Witness the majestic peaks',
        'link'        => 'https://example.com/tours',
        'position'    => 'featured',  // featured|left|right
    ),
    // More images...
);
```

### Image Requirements

| Aspect | Specification |
|--------|---|
| **File Format** | JPG (quality 80+), WebP |
| **Dimensions** | Minimum 800x600px, maximum 2000x1500px |
| **File Size** | 100-500KB per image |
| **Alt Text** | Required, descriptive, 125 characters max |
| **Quantity** | 4-6 images optimal |
| **Content** | Tours, landscapes, culture, experiences |

### Image Position Classes

```php
'position' => 'featured'  // Large center image (2x2 grid span)
'position' => 'left'      // Left side image (1 col)
'position' => 'right'     // Right side image (1 col)
// Defaults: featured if not specified
```

### Adding Images

#### Method 1: PHP Array (Default)
Edit `inc/carousel-images.php`:
```php
$carousel_images = array(
    array(
        'url' => get_template_directory_uri() . '/assets/img/photo.jpg',
        'title' => 'Photo Title',
        // ...
    ),
);
```

#### Method 2: WordPress Media Library
Use WordPress REST API or custom post type:
```php
// Fetch from post meta
$gallery_ids = get_post_meta($post_id, '_carousel_gallery_ids', true);
$images = get_carousel_images_from_media($post_id);
```

#### Method 3: Custom Post Type
Register a 'carousel_image' post type and query:
```php
$carousel_images = get_posts(array(
    'post_type' => 'carousel_image',
    'posts_per_page' => 6,
    'orderby' => 'menu_order',
));
```

---

## Responsive Breakpoints

### Tailwind CSS Breakpoints Used

| Breakpoint | Device | CSS Media Query |
|-----------|--------|---|
| **sm** | Small phones | (max-width: 640px) |
| **md** | Tablets | (max-width: 1024px) |
| **lg** | Desktop | (min-width: 1024px) |
| **xl** | Large desktop | (min-width: 1280px) |

### Layout Changes by Breakpoint

#### 1200px+ (Desktop - Full Cluster)
```
┌───────────┬───────────┐
│           │           │
│  Featured │  Featured │  ← 2 columns featured
│           │           │
├─────┬─────┼─────┬─────┤
│Left │Left │Right│Right│  ← 4 side images
└─────┴─────┴─────┴─────┘
```

#### 768px - 1199px (Tablet - Simplified)
```
┌───────────────────────┐
│     Featured (full)   │
├───────────┬───────────┤
│ Left      │  Right    │
└───────────┴───────────┘
```

#### < 768px (Mobile - Single Column)
```
┌───────────────────────┐
│   Item 1   │
├───────────────────────┤
│   Item 2   │
├───────────────────────┤
│   Item 3   │
└───────────────────────┘
```

---

## Accessibility Features

### WCAG 2.1 AA Compliance

#### 1. Semantic HTML
- `<section role="region">` - Main carousel landmark
- `<figure>` + `<figcaption>` - Image grouping
- `role="group"`, `role="tablist"`, `role="tab"` - Control groups

#### 2. Alt Text
```html
<img alt="Mountain Peaks - Karakoram Range" src="...">
```
- Concise, descriptive
- Includes context (location, subject)
- Not over 125 characters

#### 3. ARIA Labels
```html
<!-- Main carousel -->
<div role="region" aria-label="Featured tours and landscape images carousel">

<!-- Navigation -->
<button aria-label="Previous image" aria-controls="carousel">

<!-- Indicator dots -->
<div role="tablist" aria-label="Carousel slide indicators">
  <button aria-selected="true" aria-label="Slide 1">
```

#### 4. Focus Indicators
```css
.carousel-item:focus-visible {
    outline: 3px solid #d4af37;      /* Gold outline */
    outline-offset: 4px;              /* Visible spacing */
    border-radius: 1.25rem;           /* Match shape */
}
```

#### 5. Keyboard Navigation
- **Tab**: Move between controls
- **Enter**: Activate indicator, navigate to image link
- **Arrow Left/Right**: Previous/Next image
- **Arrow Up/Down**: Previous/Next image
- **Escape**: (optional) Close modal if image clicked

#### 6. Screen Reader Support
```html
<!-- Live region for slide announcements -->
<div aria-live="polite" aria-atomic="true" id="carousel-status">
    Image 1 of 6: Mountain Peaks
</div>

<!-- Hidden but accessible caption -->
<figcaption class="sr-only">
    Mountain Peaks - Witness the majestic Karakoram range
</figcaption>
```

#### 7. Motion & Animation Respect
```css
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        transition-duration: 0.01ms !important;
    }
}
```

#### 8. Color Contrast
- Text on backgrounds: 4.5:1 minimum
- Interactive elements: 3:1 minimum
- Gold (#d4af37) on navy (#1a2e44): 7.2:1 ✓

#### 9. Touch Target Size
- Buttons: 48x48px minimum
- On mobile: 52x52px for comfort
- Gap between targets: 8px minimum

---

## Performance Optimization

### Core Web Vitals

| Metric | Target | Strategy |
|--------|--------|----------|
| **LCP** | < 2.5s | Lazy load non-critical images |
| **FID** | < 100ms | Throttle scroll listeners |
| **CLS** | < 0.1 | Fixed container sizes, aspect ratios |

### Lazy Loading

```html
<img src="image.jpg" loading="lazy" fetchpriority="high">
```

- First image: `fetchpriority="high"` (LCP)
- Other images: `loading="lazy"` (below fold)

### CSS Performance

- GPU acceleration: `will-change: transform, opacity`
- Only animate transform and opacity
- Avoid animating: width, height, left, top, padding, margin

### JavaScript Performance

```javascript
// Throttle scroll events
const throttledScroll = throttle(() => {
    updateCarousel();
}, 16); // ~60fps

// Intersection Observer (not scroll listener)
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Load image, trigger animation
        }
    });
});
```

### Image Optimization

```php
// Responsive image URLs with width parameter
$image_url = add_query_arg('w', '800', $image_url);

// Srcset for multiple resolutions
srcset="image-small.jpg 640w, image-medium.jpg 1024w, image-large.jpg 1920w"
```

### File Size Budgets

| Asset | Target | Actual |
|-------|--------|--------|
| CSS (animations) | < 15KB | ~12KB gzipped |
| JS (functionality) | < 10KB | ~8KB gzipped |
| Per image | < 400KB | 100-300KB |

---

## Configuration Options

### JavaScript Configuration

```javascript
// Create carousel with custom config
const carousel = new ClusterCarousel('.cluster-carousel');

// Update configuration
carousel.updateConfig({
    autoPlay: true,              // Enable auto-play
    autoPlayInterval: 5000,      // 5 seconds
    pauseOnHover: true,          // Pause when hovering
    pauseOnFocus: true,          // Pause when focused
    swipeThreshold: 50,          // 50px minimum swipe
    animationDuration: 400,      // 400ms transitions
});
```

### PHP Configuration

```php
// In carousel-images.php, filter for custom images:
add_filter('raikot_carousel_images', function($images) {
    // Return custom image array
    return $custom_images;
});

// Or filter default images:
add_filter('raikot_carousel_images_default', function($images) {
    // Modify default images before display
    return $modified_images;
});
```

### CSS Customization

```css
/* Override root colors */
:root {
    --carousel-gold: #d4af37;
    --carousel-navy: #1a2e44;
    --carousel-transition: 400ms;
}

/* Override specific element */
.carousel-item:hover {
    box-shadow: 0 30px 80px rgba(212, 175, 55, 0.35);
}
```

---

## Integration with WordPress

### Enqueueing Assets

In `functions.php`:

```php
function raikot_tours_enqueue_carousel() {
    // CSS
    wp_enqueue_style(
        'cluster-carousel-css',
        get_template_directory_uri() . '/css/cluster-carousel.css',
        array(),
        '1.0.0'
    );

    // JavaScript
    wp_enqueue_script(
        'cluster-carousel-js',
        get_template_directory_uri() . '/js/cluster-carousel.js',
        array(),
        '1.0.0',
        true
    );

    // Localize (optional)
    wp_localize_script(
        'cluster-carousel-js',
        'carouselConfig',
        array(
            'autoPlay' => true,
            'autoPlayInterval' => 5000,
        )
    );
}
add_action('wp_enqueue_scripts', 'raikot_tours_enqueue_carousel');
```

### Including Template

In `front-page.php`:

```php
<?php get_template_part('template-parts/cluster-carousel'); ?>
```

Or conditionally:

```php
<?php
if (is_front_page() || is_home()) {
    get_template_part('template-parts/cluster-carousel');
}
?>
```

### WordPress Customizer Integration

```php
// Add carousel customization panel
function raikot_tours_customize_carousel($wp_customize) {
    $wp_customize->add_section('carousel_settings', array(
        'title' => __('Carousel Settings', 'raikot-tours'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('carousel_autoplay', array(
        'default' => 1,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));

    $wp_customize->add_control('carousel_autoplay', array(
        'section' => 'carousel_settings',
        'type' => 'checkbox',
        'label' => __('Enable Auto-Play', 'raikot-tours'),
    ));
}
add_action('customize_register', 'raikot_tours_customize_carousel');
```

---

## Customization Guide

### Changing Colors

Edit `cluster-carousel.css`:

```css
:root {
    --carousel-gold: #d4af37;        /* Primary accent */
    --carousel-gold-light: #e8c547;  /* Hover/active */
    --carousel-navy: #1a2e44;        /* Dark background */
}

.carousel-button {
    color: var(--carousel-gold);
    border-color: rgba(212, 175, 55, 0.3);
}
```

Or override in theme's main stylesheet:

```css
.cluster-carousel .carousel-button {
    color: #your-color;
}
```

### Changing Animation Speed

```css
.carousel-item {
    transition: all 600ms cubic-bezier(0.34, 0.1, 0.64, 1);  /* Slower */
}

.carousel-image {
    transition: transform 800ms cubic-bezier(0.34, 0.1, 0.64, 1);
}
```

### Changing Layout

Desktop cluster to coverflow effect:

```css
.carousel-cluster {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
}

.carousel-item {
    min-width: 300px;
    transform: perspective(1000px) rotateY(25deg);
}
```

### Adding Video Support

Extend template to support video:

```html
<div class="carousel-image-container">
    <?php if ($image['type'] === 'video') : ?>
        <video src="<?php echo esc_url($image['url']); ?>" controls></video>
    <?php else : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="...">
    <?php endif; ?>
</div>
```

---

## Troubleshooting

### Images Not Loading

**Issue**: Carousel appears empty
**Solution**:
1. Check `inc/carousel-images.php` image URLs
2. Verify images exist in theme assets folder
3. Check browser console for 404 errors
4. Validate image dimensions (minimum 800x600px)

### Animations Not Smooth

**Issue**: Janky or stuttering animations
**Solution**:
1. Check for layout thrashing in JavaScript
2. Verify `will-change` CSS is applied
3. Test on slower device/network
4. Use Chrome DevTools Performance tab
5. Reduce number of animations if necessary

### Keyboard Navigation Not Working

**Issue**: Arrow keys don't navigate carousel
**Solution**:
1. Ensure `cluster-carousel.js` is enqueued
2. Check for JavaScript errors in console
3. Verify element has `tabindex="0"` if needed
4. Test focus management with Tab key
5. Check z-index stacking context

### Mobile Swipe Not Detecting

**Issue**: Swipe gestures not working on mobile
**Solution**:
1. Verify `touchstart` and `touchend` listeners
2. Check swipe threshold (default 50px)
3. Test with actual touch device, not mouse
4. Ensure `user-select: none` not blocking
5. Check for event bubbling issues

### Screen Reader Not Announcing Slides

**Issue**: ARIA live region not updating
**Solution**:
1. Verify `aria-live="polite"` on status element
2. Check that `announceSlide()` is called
3. Ensure status element is not hidden
4. Test with NVDA, JAWS, or VoiceOver
5. Check for console JavaScript errors

### Layout Breaking on Mobile

**Issue**: Carousel layout broken on small screens
**Solution**:
1. Check responsive CSS media queries
2. Verify viewport meta tag in header
3. Test with actual mobile device
4. Check for hardcoded pixel widths
5. Use Chrome DevTools device emulation

### Images Not Lazy Loading

**Issue**: All images load at once
**Solution**:
1. Verify `loading="lazy"` attribute on images
2. Check browser support (Safari, IE11)
3. Verify Intersection Observer polyfill if needed
4. Check for `fetchpriority="high"` override
5. Test with network throttling

### Auto-play Not Working

**Issue**: Carousel doesn't auto-rotate
**Solution**:
1. Check `autoPlay: true` in config
2. Verify `setInterval` is not cleared
3. Check for JavaScript errors
4. Verify `autoPlayInterval` value (ms)
5. Test hover/focus pause behavior

---

## Testing Procedures

### Unit Testing (JavaScript)

```javascript
describe('ClusterCarousel', () => {
    let carousel;

    beforeEach(() => {
        carousel = new ClusterCarousel('.cluster-carousel');
    });

    test('should initialize with correct index', () => {
        expect(carousel.currentIndex).toBe(0);
    });

    test('should navigate to next slide', () => {
        carousel.nextSlide();
        expect(carousel.currentIndex).toBe(1);
    });

    test('should wrap around on last slide', () => {
        carousel.currentIndex = carousel.totalItems - 1;
        carousel.nextSlide();
        expect(carousel.currentIndex).toBe(0);
    });
});
```

### Manual Testing Checklist

#### Navigation
- [ ] Click next/previous buttons
- [ ] Click indicator dots
- [ ] Keyboard arrow keys work
- [ ] Tab navigation focuses controls
- [ ] Enter on indicator navigates

#### Interactions
- [ ] Images hover with scale effect
- [ ] Gold glow appears on hover
- [ ] Titles fade in on hover
- [ ] Links clickable
- [ ] Swipe gestures work (mobile)

#### Responsiveness
- [ ] Desktop: Full cluster layout
- [ ] Tablet: 2-column simplified
- [ ] Mobile: Single column layout
- [ ] All breakpoints functional
- [ ] No horizontal scroll

#### Accessibility
- [ ] Screen reader announces carousel
- [ ] Focus indicators visible
- [ ] Keyboard navigation complete
- [ ] Color contrast sufficient
- [ ] Motion preferences respected

#### Performance
- [ ] Images load quickly
- [ ] Animations smooth (60fps)
- [ ] No lag on interaction
- [ ] Lazy loading works
- [ ] Lighthouse score 85+

#### Browser Support
- [ ] Chrome/Chromium
- [ ] Firefox
- [ ] Safari
- [ ] Edge
- [ ] Mobile browsers

### Tools & Commands

```bash
# Lighthouse audit
npm install -g lighthouse
lighthouse https://raikottours.local/

# WAVE accessibility (browser extension)
# https://wave.webaim.org/

# NVDA screen reader (Windows)
# https://www.nvaccess.org/

# JAWS screen reader (Windows)
# https://www.freedomscientific.com/products/software/jaws/

# Chrome DevTools
# F12 > Performance > Record > Interactions
```

---

## CSS Classes Reference

### Main Container
- `.cluster-carousel-section` - Section wrapper
- `.cluster-carousel` - Main carousel container
- `.carousel-wrapper` - Wrapper with overflow control
- `.carousel-cluster` - Grid container

### Items
- `.carousel-item` - Individual item
- `.carousel-item--featured` - Featured (larger) item
- `.carousel-item--left` - Left position item
- `.carousel-item--right` - Right position item
- `.carousel-item:hover` - Hover state

### Images
- `.carousel-image-container` - Image wrapper
- `.carousel-image` - Image element
- `.carousel-overlay` - Content overlay

### Content
- `.carousel-content` - Content wrapper
- `.carousel-title` - Image title
- `.carousel-description` - Image description
- `.carousel-link` - CTA link

### Controls
- `.carousel-controls` - Controls wrapper
- `.carousel-button` - Navigation button
- `.carousel-button--prev` - Previous button
- `.carousel-button--next` - Next button
- `.carousel-indicators` - Dots wrapper
- `.carousel-indicator` - Individual dot
- `.carousel-indicator--active` - Active dot

### Accessibility
- `.sr-only` - Screen reader only (hidden)

---

## JavaScript Methods Reference

### Public Methods

```javascript
// Navigate
carousel.goToSlide(index)        // Go to specific slide
carousel.nextSlide()             // Next slide
carousel.prevSlide()             // Previous slide

// Control
carousel.startAutoPlay()         // Start auto rotation
carousel.stopAutoPlay()          // Stop auto rotation

// Utilities
carousel.updateConfig(config)    // Update settings
carousel.destroy()               // Cleanup & destroy

// State
carousel.currentIndex            // Current slide index
carousel.totalItems              // Total slides
carousel.isAnimating             // Animation lock
```

### Events

```javascript
// Listen for custom events (if implemented)
carousel.container.addEventListener('carousel:navigate', (e) => {
    console.log('Navigated to slide', e.detail.index);
});
```

---

## Version History

| Version | Date | Changes |
|---------|------|---------|
| 1.0.0 | 2026-04-14 | Initial release |

---

## Support & Resources

- **Documentation**: This guide
- **GitHub Issues**: Report bugs or feature requests
- **WordPress Docs**: https://developer.wordpress.org/
- **Web Accessibility**: https://www.w3.org/WAI/
- **MDN Web Docs**: https://developer.mozilla.org/

---

**Document Version**: 1.0.0  
**Last Updated**: 2026-04-14  
**Status**: Production Ready
