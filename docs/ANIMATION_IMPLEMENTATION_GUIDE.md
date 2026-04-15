# Animation Implementation Guide

## Files Created

### 1. CSS Animations (`assets/css/animations.css`) - 17KB
Production-ready animation stylesheet with:
- **Hero staggered animations** (0ms, 200ms, 400ms, 600ms delays)
- **Navbar glassmorphic scroll effect** (400ms transition, 50px threshold)
- **Scroll-triggered reveals** via Intersection Observer (600ms duration)
- **Card hover lift animations** (-8px, 300ms with gold glow)
- **Button interactions** (primary & secondary with 300ms hover)
- **Footer link animations** (gold color pop, 200ms)
- **Accessibility support** (prefers-reduced-motion, high-contrast mode)
- **Mobile optimizations** (reduced will-change, shorter durations on <768px)

**File location:**
```
/app/public/wp-content/themes/twentytwentyfour/assets/css/animations.css
```

### 2. JavaScript Scroll System (`assets/js/scroll-animations.js`) - 14KB
Modular animation system with:
- **ScrollAnimationSystem** - Navbar scroll listener (throttled @16ms)
- **StaggeredRevealManager** - Auto-stagger card reveals (100ms intervals)
- **ButtonAnimationManager** - Click effects and ripple animations
- **LinkAnimationManager** - Navigation state tracking
- **PerformanceMonitor** - Dev-only FPS monitoring

**File location:**
```
/app/public/wp-content/themes/twentytwentyfour/assets/js/scroll-animations.js
```

---

## Integration Steps

### Step 1: Enqueue Assets in functions.php

Add to `/theme/functions.php`:

```php
<?php
// Enqueue animation styles and scripts
function raikot_enqueue_animations() {
    wp_enqueue_style(
        'raikot-animations',
        get_template_directory_uri() . '/assets/css/animations.css',
        array(),
        '1.0.0'
    );
    
    wp_enqueue_script(
        'raikot-scroll-animations',
        get_template_directory_uri() . '/assets/js/scroll-animations.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'raikot_enqueue_animations' );
```

### Step 2: Update HTML with Animation Classes

#### Hero Section Classes
```html
<!-- Hero overline -->
<span class="hero-overline">PREMIUM EXPEDITIONS</span>

<!-- Hero headline -->
<h1 class="hero-headline">The Earth Breathes</h1>

<!-- Hero description -->
<p class="hero-subtext">Your description here</p>

<!-- Hero buttons container -->
<div class="hero-buttons">
  <button class="hero-button--primary">EXPLORE</button>
  <button class="hero-button--secondary">BESPOKE INQUIRY</button>
</div>
```

#### Navbar Classes
```html
<!-- Main navbar container -->
<nav class="navbar">
  <!-- Logo with scale animation -->
  <div class="navbar__logo">
    <!-- Site logo -->
  </div>
  
  <!-- Navigation links with underline animation -->
  <div class="navbar__nav">
    <a href="#" class="navbar__nav-link">Destinations</a>
    <a href="#" class="navbar__nav-link">The Experience</a>
    <a href="#" class="navbar__nav-link">About Us</a>
    <a href="#" class="navbar__nav-link">Journal</a>
  </div>
  
  <!-- Action buttons -->
  <div class="navbar__actions">
    <button class="navbar__button--secondary">Log In</button>
    <button class="navbar__button--primary">Book Expedition</button>
  </div>
</nav>
```

#### Feature Cards with Stagger
```html
<!-- Container for auto-stagger reveals -->
<div class="feature-cards-container reveal-stagger">
  
  <!-- Feature card 1 -->
  <div class="feature-card reveal-on-scroll">
    <div class="feature-card__number">01</div>
    <div class="feature-card__icon">🛡️</div>
    <h3>Safety Protocols</h3>
    <p>Industry-leading safety standards...</p>
  </div>
  
  <!-- Feature card 2 (auto-stagger +100ms) -->
  <div class="feature-card reveal-on-scroll">
    <div class="feature-card__number">02</div>
    <div class="feature-card__icon">🌱</div>
    <h3>Sustainability</h3>
    <p>Carbon-neutral expeditions...</p>
  </div>
  
  <!-- Additional cards -->
</div>
```

#### Scroll Reveals (Custom Animations)
```html
<!-- Standard fade-in slide-up -->
<div class="reveal-on-scroll">
  Content that slides up when visible
</div>

<!-- Slide from left -->
<div class="reveal-on-scroll reveal-on-scroll--left">
  Content that slides from left
</div>

<!-- Slide from right -->
<div class="reveal-on-scroll reveal-on-scroll--right">
  Content that slides from right
</div>

<!-- Scale animation -->
<div class="reveal-on-scroll reveal-on-scroll--scale">
  Content that scales into view
</div>
```

---

## Animation Specifications (Per UI_ARCHITECTURE.md)

### Easing Functions
| Use Case | Easing | Duration |
|----------|--------|----------|
| Hero animations | `cubic-bezier(0.34, 1.56, 0.64, 1)` | 800ms |
| Scroll reveals | `cubic-bezier(0.34, 0.1, 0.64, 1)` | 600ms |
| Navbar scroll | `cubic-bezier(0.34, 0.1, 0.64, 1)` | 400ms |
| Button hover | `cubic-bezier(0.34, 0.1, 0.64, 1)` | 300ms |
| Card hover | `cubic-bezier(0.34, 0.1, 0.64, 1)` | 300ms |
| Footer links | `cubic-bezier(0.34, 0.1, 0.64, 1)` | 200ms |

### Color Palette
- **Gold**: `#d4af37` (primary accent)
- **Dark Gold**: `#c9a227` (hover state)
- **Light Gold**: `#e8c547` (active state)
- **Dark Slate**: `#0f172a` (navbar background)
- **Slate**: `#1e293b` (card background)
- **Muted Gray**: `#94a3b8` (secondary text)

### Key Metrics
- **Navbar scroll threshold**: 50px
- **Card lift distance**: -8px (translateY)
- **Button scale on hover**: 1.05
- **Icon/number scale on hover**: 1.05
- **Stagger delay between cards**: 100ms
- **Intersection Observer threshold**: 0.5 (50% visible)

---

## Performance Optimizations

### GPU Acceleration
All animations use GPU-accelerated properties only:
- `transform` (translate, scale, rotate)
- `opacity`
- `backdrop-filter` (for navbar glassmorphism)

**Avoided (layout thrashing):**
- ❌ width/height changes
- ❌ left/top/margin changes
- ❌ padding changes
- ❌ background color animations

### Throttling & Debouncing
- Scroll listener: **16ms throttle** (~60 FPS)
- Resize listener: **250ms debounce**
- Intersection Observer: **0.5 threshold** (efficient reveal detection)

### Mobile Optimizations
- **< 768px**: Disable `will-change`, reduce animation duration to 500-600ms
- **< 480px**: Disable hover animations, complex transforms
- **All mobile**: Respect `prefers-reduced-motion`

---

## Manual Animation Triggers

The `RaikotAnimations` public API allows manual control:

```javascript
// Manually reveal an element
RaikotAnimations.reveal('.my-element');
RaikotAnimations.reveal('.my-element', 'left');   // slide-left variant
RaikotAnimations.reveal('.my-element', 'right');  // slide-right variant
RaikotAnimations.reveal('.my-element', 'scale');  // scale variant

// Trigger navbar scroll state manually
RaikotAnimations.triggerNavbarScroll(true);   // Add scrolled state
RaikotAnimations.triggerNavbarScroll(false);  // Remove scrolled state

// Check if page is scrolled
const isScrolled = RaikotAnimations.isScrolled();

// Cleanup
RaikotAnimations.destroy();
```

---

## Browser Support

### Full Support
- Chrome 76+
- Firefox 103+
- Safari 9+
- Edge 79+

### Graceful Degradation
- **Older browsers**: No animations (elements still visible)
- **No JavaScript**: CSS animations still work
- **prefers-reduced-motion**: All animations disabled
- **Low bandwidth**: will-change disabled on mobile

---

## Testing Checklist

### Desktop (1280px+)
- [ ] Hero animations stagger properly (0ms, 200ms, 400ms, 600ms)
- [ ] Navbar transitions smoothly on scroll (50px threshold)
- [ ] Card hover lifts -8px with gold glow
- [ ] Button hover scales 1.05 with gold glow
- [ ] Navigation links underline animates smoothly

### Tablet (768px - 1023px)
- [ ] Hero animations play but with reduced duration
- [ ] Navbar scroll still works
- [ ] will-change disabled (verified in DevTools)
- [ ] Cards still lift on hover (reduced will-change)

### Mobile (< 768px)
- [ ] No complex animations enabled
- [ ] Navbar scroll state works
- [ ] Button/card hovers disabled
- [ ] Touch interactions work properly

### Accessibility
- [ ] prefers-reduced-motion respected (all animations <1ms)
- [ ] High contrast mode: borders are 2px+ thick
- [ ] Focus states visible on all buttons
- [ ] Color contrast: WCAG AA minimum 4.5:1

---

## Debugging Tips

### Chrome DevTools
1. **Performance panel**: Record 60 FPS animation
2. **Rendering**: Check for jank/layout thrashing
3. **Animations panel**: Slow down animations to 1/10 speed
4. **Console**: Check for errors in scroll listener

### Common Issues

**Animations not triggering:**
- Verify HTML classes match CSS selectors
- Check browser console for JS errors
- Ensure animations.css is loaded before scroll-animations.js
- Verify elements are actually in viewport

**Jank/stuttering:**
- Check DevTools for layout thrashing
- Verify only transform/opacity are animated
- Check scroll listener throttle is working (16ms)
- Disable will-change on mobile

**Z-index issues:**
- Navbar: z-index 40
- Modals: z-index 50
- Tooltips: z-index 60

---

## File Size & Performance

### Actual Sizes
- `animations.css`: 17KB (uncompressed), ~4KB (gzipped)
- `scroll-animations.js`: 14KB (uncompressed), ~3KB (gzipped)
- **Total**: 31KB (uncompressed), ~7KB (gzipped)

### Target Metrics
- **Performance**: 85+ (Lighthouse)
- **LCP**: < 2.5s
- **FID**: < 100ms
- **CLS**: < 0.1
- **FPS**: 60 on all devices

---

## Next Steps

1. ✅ Files created (animations.css, scroll-animations.js)
2. ⏳ Update functions.php with asset enqueueing
3. ⏳ Apply animation classes to HTML templates
4. ⏳ Test on all breakpoints
5. ⏳ Run Lighthouse audit
6. ⏳ Performance optimization pass

**Ready to integrate!**
