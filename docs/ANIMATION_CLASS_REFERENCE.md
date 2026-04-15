# Animation Classes Reference

## Quick Reference Guide for Raikot Tours Premium Animations

---

## Hero Section Classes

### `.hero-overline`
**Purpose**: Animate the overline text (PREMIUM EXPEDITIONS)  
**Trigger**: Applied on page load via JavaScript  
**Animation**: Fade-in + slide-up  
**Duration**: 800ms  
**Easing**: `cubic-bezier(0.34, 1.56, 0.64, 1)`  
**Delay**: 0ms  

```html
<span class="hero-overline">PREMIUM EXPEDITIONS</span>
```

---

### `.hero-headline`
**Purpose**: Animate the main headline (The Earth Breathes)  
**Trigger**: Applied on page load via JavaScript  
**Animation**: Fade-in + slide-up  
**Duration**: 800ms  
**Easing**: `cubic-bezier(0.34, 1.56, 0.64, 1)`  
**Delay**: 200ms  

```html
<h1 class="hero-headline">The Earth Breathes</h1>
```

---

### `.hero-subtext`
**Purpose**: Animate the description/subtext  
**Trigger**: Applied on page load via JavaScript  
**Animation**: Fade-in + slide-up  
**Duration**: 800ms  
**Easing**: `cubic-bezier(0.34, 1.56, 0.64, 1)`  
**Delay**: 400ms  

```html
<p class="hero-subtext">Discover the world's most exclusive expedition experiences...</p>
```

---

### `.hero-buttons`
**Purpose**: Animate the action buttons container  
**Trigger**: Applied on page load via JavaScript  
**Animation**: Fade-in + scale-up  
**Duration**: 800ms  
**Easing**: `cubic-bezier(0.34, 1.56, 0.64, 1)`  
**Delay**: 600ms  

```html
<div class="hero-buttons">
  <button class="hero-button--primary">EXPLORE</button>
  <button class="hero-button--secondary">BESPOKE INQUIRY</button>
</div>
```

---

## Button Classes

### `.hero-button--primary`
**Purpose**: Style primary button in hero section  
**Hover Effect**: Scale 1.05 + gold glow shadow  
**Duration**: 300ms  
**Easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)`  
**Colors**: Background `#d4af37`, hover `#c9a227`  

```html
<button class="hero-button--primary">EXPLORE</button>
```

---

### `.hero-button--secondary`
**Purpose**: Style secondary button in hero section  
**Hover Effect**: Border gold shift, text gold  
**Duration**: 300ms  
**Easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)`  
**Colors**: Border transparent → `#d4af37`  

```html
<button class="hero-button--secondary">BESPOKE INQUIRY</button>
```

---

### `.navbar__button--primary`
**Purpose**: Style primary button in navbar  
**Hover Effect**: Same as hero primary  
**Duration**: 300ms  

```html
<button class="navbar__button--primary">Book Expedition</button>
```

---

### `.navbar__button--secondary`
**Purpose**: Style secondary button in navbar  
**Hover Effect**: Same as hero secondary  
**Duration**: 300ms  

```html
<button class="navbar__button--secondary">Log In</button>
```

---

## Navbar Classes

### `.navbar`
**Purpose**: Main navbar container  
**Scroll Effect**: Glassmorphic transition from transparent to dark with blur  
**Trigger**: JavaScript scroll listener at 50px threshold  
**Transition**: 400ms `cubic-bezier(0.34, 0.1, 0.64, 1)`  

```html
<nav class="navbar">
  <!-- navbar content -->
</nav>
```

---

### `.navbar.is-scrolled`
**Purpose**: Applied when page scrolled > 50px  
**Effects**:
- Background: `rgba(15, 23, 42, 0.8)`
- Backdrop-filter: `blur(16px)`
- Box-shadow: `0 4px 6px rgba(0, 0, 0, 0.1)`
- Border-bottom: `1px solid rgba(212, 175, 55, 0.1)`

```javascript
// Applied automatically by scroll listener
navbar.classList.add('is-scrolled');
```

---

### `.navbar__logo`
**Purpose**: Navbar logo container  
**Scroll Effect**: Scales to 0.9x when navbar.is-scrolled is active  
**Duration**: 300ms  

```html
<div class="navbar__logo">
  <!-- Logo image/content -->
</div>
```

---

### `.navbar__nav`
**Purpose**: Navigation links container  
**Layout**: Flex horizontal  

```html
<div class="navbar__nav">
  <!-- Links -->
</div>
```

---

### `.navbar__nav-link`
**Purpose**: Individual navigation link  
**Hover Effect**: Underline expands from center (gold, 2px height)  
**Duration**: 250ms  
**Easing**: `cubic-bezier(0.34, 1.56, 0.64, 1)` for expansion  

```html
<a href="#" class="navbar__nav-link">Destinations</a>
```

---

### `.navbar__nav-link--active`
**Purpose**: Mark current page nav link  
**Applied**: Via JavaScript based on current URL  

```html
<!-- Applied automatically -->
<a href="/about" class="navbar__nav-link navbar__nav-link--active">About Us</a>
```

---

### `.navbar__actions`
**Purpose**: Right-aligned buttons container  
**Layout**: Flex horizontal with gap  

```html
<div class="navbar__actions">
  <button class="navbar__button--secondary">Log In</button>
  <button class="navbar__button--primary">Book</button>
</div>
```

---

## Scroll Reveal Classes

### `.reveal-on-scroll`
**Purpose**: Base class for elements that reveal on scroll  
**Trigger**: Intersection Observer when 50% visible  
**Animation**: Fade-in + slide-up  
**Duration**: 600ms  
**Easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)`  
**Initial state**: `opacity: 0; transform: translateY(40px);`  

```html
<div class="reveal-on-scroll">
  Content that fades in and slides up
</div>
```

---

### `.reveal-on-scroll.is-visible`
**Purpose**: Applied when element enters viewport  
**Trigger**: Automatic via Intersection Observer  
**Animation**: Slides up and fades in  

```javascript
// Applied automatically when element is 50% visible
element.classList.add('is-visible');
```

---

### `.reveal-on-scroll--left`
**Purpose**: Slide-in from left variant  
**Trigger**: Use with `.reveal-on-scroll`  
**Animation**: Fade-in + slide-left  
**Distance**: 40px from left  

```html
<div class="reveal-on-scroll reveal-on-scroll--left">
  Content that slides from left
</div>
```

---

### `.reveal-on-scroll.is-visible--left`
**Purpose**: Applied to left-variant elements when visible  
**Trigger**: Automatic via Intersection Observer  

```javascript
// Applied automatically
element.classList.add('is-visible--left');
```

---

### `.reveal-on-scroll--right`
**Purpose**: Slide-in from right variant  
**Trigger**: Use with `.reveal-on-scroll`  
**Animation**: Fade-in + slide-right  
**Distance**: 40px from right  

```html
<div class="reveal-on-scroll reveal-on-scroll--right">
  Content that slides from right
</div>
```

---

### `.reveal-on-scroll.is-visible--right`
**Purpose**: Applied to right-variant elements when visible  
**Trigger**: Automatic via Intersection Observer  

---

### `.reveal-on-scroll--scale`
**Purpose**: Scale-up variant for emphasis  
**Trigger**: Use with `.reveal-on-scroll`  
**Animation**: Fade-in + scale (0.95 → 1)  

```html
<div class="reveal-on-scroll reveal-on-scroll--scale">
  Content that scales into view
</div>
```

---

### `.reveal-on-scroll.is-visible--scale`
**Purpose**: Applied to scale-variant elements when visible  
**Trigger**: Automatic via Intersection Observer  

---

### `.reveal-stagger`
**Purpose**: Container for multiple elements with staggered reveal  
**Trigger**: Intersection Observer on container  
**Stagger Delay**: 100ms between each child  
**Children**: Each child is automatically staggered  

```html
<div class="reveal-stagger">
  <div class="feature-card">Card 1 (0ms)</div>
  <div class="feature-card">Card 2 (100ms)</div>
  <div class="feature-card">Card 3 (200ms)</div>
  <div class="feature-card">Card 4 (300ms)</div>
</div>
```

---

### `.reveal-stagger.is-visible`
**Purpose**: Applied to stagger container when in viewport  
**Effect**: Each child animates with 100ms stagger  
**Duration**: 600ms for each child  

---

## Feature Card Classes

### `.feature-card`
**Purpose**: Individual feature card container  
**Hover Effect**: Lift -8px with gold glow shadow  
**Hover Duration**: 300ms  
**Hover Easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)`  
**Properties Animated**: Transform, box-shadow, border-color  
**Padding**: 32px  
**Min Height**: 200px  
**Border Radius**: 8px  
**Background**: `rgba(30, 41, 59, 1)`  

```html
<div class="feature-card">
  <div class="feature-card__number">01</div>
  <div class="feature-card__icon">🛡️</div>
  <h3>Safety Protocols</h3>
  <p>Description...</p>
</div>
```

---

### `.feature-card__number`
**Purpose**: Large number (01, 02, etc.)  
**Font Size**: 48px  
**Color**: `#d4af37` (gold)  
**Opacity**: 0.8 (default), 1 (hover)  
**Weight**: Bold (700)  
**Hover Effect**: Scale 1.05  
**Hover Duration**: 250ms  

```html
<div class="feature-card__number">01</div>
```

---

### `.feature-card__icon`
**Purpose**: Icon/symbol in card  
**Font Size**: 40px  
**Color**: `#d4af37` (gold)  
**Hover Effect**: Rotate 5deg + scale 1.05 + lighter gold  
**Hover Duration**: 250ms  

```html
<div class="feature-card__icon">🛡️</div>
```

---

### `.feature-cards-container`
**Purpose**: Container for staggered card reveals  
**Equivalent**: Can use `.reveal-stagger` instead  
**Auto-Stagger**: 100ms between cards  

```html
<div class="feature-cards-container reveal-stagger">
  <!-- Cards here are auto-staggered -->
</div>
```

---

## Footer Classes

### `.footer__link`
**Purpose**: Footer navigation/content link  
**Hover Effect**: Color shift gray → gold + translateX(4px)  
**Hover Duration**: 200ms  
**Easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)`  
**Default Color**: `#94a3b8` (muted gray)  
**Hover Color**: `#d4af37` (gold)  

```html
<a href="#" class="footer__link">Popular Tours</a>
```

---

## Utility Classes

### `.fade-in`
**Purpose**: Generic fade-in animation  
**Duration**: 600ms  
**Easing**: `cubic-bezier(0.34, 0.1, 0.64, 1)`  

```html
<div class="fade-in">Content fades in</div>
```

---

### `.pulse`
**Purpose**: Pulse/attention-grabbing animation  
**Duration**: 2s infinite  
**Easing**: `cubic-bezier(0.4, 0, 0.6, 1)`  
**Effect**: Opacity 1 → 0.5 → 1  

```html
<div class="pulse">Call to action element</div>
```

---

## Responsive Behavior

### Mobile (< 768px)
- `will-change: auto` (disabled for performance)
- Animation durations reduced to 500-600ms
- `.navbar.is-scrolled .navbar__logo` → no scale
- `.navbar__nav-link::after` → hidden

### Ultra-Mobile (< 480px)
- Hover animations disabled
- Card lift on hover → disabled
- Button hover animations → disabled
- Complex transforms → removed

---

## Accessibility Classes

### `@media (prefers-reduced-motion: reduce)`
**Effect**: All animations duration set to 0.01ms (effectively instant)  
**Applied To**: All animated elements  
**Behavior**: Elements still appear (not hidden), just no animation  

```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    transition-duration: 0.01ms !important;
  }
}
```

---

### `@media (prefers-contrast: more)`
**Effect**: Borders and underlines thicker (2px+)  
**Applied To**: Navigation underlines, card borders, button borders  
**Behavior**: Enhanced visibility for high-contrast mode users  

---

## JavaScript API

### `RaikotAnimations.reveal(element, variant)`
**Purpose**: Manually trigger reveal animation  
**Variants**: `'default'` | `'left'` | `'right'` | `'scale'`  

```javascript
// Reveal with default animation (slide-up)
RaikotAnimations.reveal('.my-element');

// Reveal with specific variant
RaikotAnimations.reveal('.my-element', 'left');
RaikotAnimations.reveal('.my-element', 'right');
RaikotAnimations.reveal('.my-element', 'scale');

// Using element object
const element = document.querySelector('.my-element');
RaikotAnimations.reveal(element, 'scale');
```

---

### `RaikotAnimations.triggerNavbarScroll(activate)`
**Purpose**: Manually trigger navbar scroll state  
**Parameter**: Boolean (true = add scrolled state, false = remove)  

```javascript
// Activate glassmorphic state
RaikotAnimations.triggerNavbarScroll(true);

// Deactivate (return to transparent)
RaikotAnimations.triggerNavbarScroll(false);
```

---

### `RaikotAnimations.isScrolled()`
**Purpose**: Check current scroll state  
**Returns**: Boolean  

```javascript
if (RaikotAnimations.isScrolled()) {
  console.log('Page is scrolled past threshold');
}
```

---

### `RaikotAnimations.destroy()`
**Purpose**: Cleanup (useful for SPA navigation)  
**Effect**: Removes all listeners and resets state  

```javascript
RaikotAnimations.destroy();
```

---

## Complete Example

```html
<!-- NAVBAR -->
<nav class="navbar">
  <div class="navbar__logo">Logo</div>
  
  <div class="navbar__nav">
    <a href="#" class="navbar__nav-link">Destinations</a>
    <a href="#about" class="navbar__nav-link navbar__nav-link--active">About Us</a>
  </div>
  
  <div class="navbar__actions">
    <button class="navbar__button--secondary">Log In</button>
    <button class="navbar__button--primary">Book Expedition</button>
  </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
  <span class="hero-overline">PREMIUM EXPEDITIONS</span>
  <h1 class="hero-headline">The Earth Breathes</h1>
  <p class="hero-subtext">Discover the world's most exclusive experiences...</p>
  
  <div class="hero-buttons">
    <button class="hero-button--primary">EXPLORE</button>
    <button class="hero-button--secondary">BESPOKE INQUIRY</button>
  </div>
</section>

<!-- FEATURE SECTION WITH STAGGERED REVEALS -->
<section>
  <h2 class="section-heading reveal-on-scroll">Why Choose Raikot Tours</h2>
  
  <div class="feature-cards-container reveal-stagger">
    <div class="feature-card reveal-on-scroll">
      <div class="feature-card__number">01</div>
      <div class="feature-card__icon">🛡️</div>
      <h3>Safety First</h3>
      <p>Industry-leading safety protocols...</p>
    </div>
    
    <div class="feature-card reveal-on-scroll">
      <div class="feature-card__number">02</div>
      <div class="feature-card__icon">🌱</div>
      <h3>Sustainability</h3>
      <p>Carbon-neutral expeditions...</p>
    </div>
    
    <div class="feature-card reveal-on-scroll">
      <div class="feature-card__number">03</div>
      <div class="feature-card__icon">⭐</div>
      <h3>Luxury</h3>
      <p>Five-star accommodations...</p>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer__column">
    <a href="#" class="footer__link">Home</a>
    <a href="#" class="footer__link">Destinations</a>
    <a href="#" class="footer__link">Journal</a>
  </div>
</footer>
```

---

## Color Reference

| Name | Hex | Usage |
|------|-----|-------|
| Gold | `#d4af37` | Primary accent, buttons, links hover |
| Dark Gold | `#c9a227` | Button hover state |
| Light Gold | `#e8c547` | Active state |
| Dark Slate | `#0f172a` | Navbar background |
| Slate | `#1e293b` | Card background |
| Muted Gray | `#94a3b8` | Secondary text |

**File:** `assets/css/animations.css`  
**Last Updated:** 2026-04-14  
**Status:** Production Ready
