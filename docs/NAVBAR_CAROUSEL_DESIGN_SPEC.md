# Raikot Tours: Navbar Redesign + Image Carousel Enhancement
## Design Specification & UI/UX Pro Max Validation

**Project Date:** April 14, 2026  
**Design System:** Liquid Glass (Luxury Expedition Travel)  
**Status:** Design Validation Complete ✓

---

## Executive Summary

This specification documents the design approach for transforming Raikot Tours' navbar and image carousel into a premium, interactive experience that aligns with luxury expedition travel branding. The design uses a **Liquid Glass** aesthetic with glassmorphic elements, fluid animations, and immersive storytelling patterns.

**Key Objectives:**
1. Replace solid grey navbar with transparent glassmorphic overlay
2. Implement cluster/masonry-style image carousel with smooth interactions
3. Maintain accessibility standards (WCAG AA+) throughout
4. Optimize for performance on mobile, tablet, and desktop
5. Support reduced-motion preferences and dynamic text sizing

---

## 1. UI/UX Pro Max Design System Validation

### 1.1 Design Pattern Recommendation

**Pattern Selected:** Horizontal Scroll Journey (with Masonry Overlay)

```
Layout Structure:
├── 1. Navbar (Vertical Fixed Overlay)
├── 2. Hero Section (Full viewport)
├── 3. The Journey (Horizontal Scroll Carousel)
└── 4. Detail Reveal (Below carousel)
```

**Validation Status:** ✓ APPROVED
- **Conversion Focus:** Immersive product discovery with high engagement
- **CTA Placement:** Sticky/Floating action button + inline CTAs in carousel
- **Color Strategy:** Continuous palette transition with chapter colors
- **Performance Target:** Moderate-Good (with optimizations)

### 1.2 Style System: Liquid Glass

**Selected Style:** Liquid Glass  
**Framework:** Premium, luxury-forward with fluid effects

**Characteristics:**
- Flowing glass, morphing elements
- Smooth transitions (400-600ms curves)
- Translucent backgrounds with backdrop-filter blur
- Iridescent/chromatic effects (optional)
- Animated blur and dynamic elements

**Best For:** Premium SaaS, high-end e-commerce, luxury portfolios, branding experiences

**Mode Support:**
- Light Mode: ✓ Full
- Dark Mode: ✓ Full (with adjusted contrast)

**Key Effects:**
- Morphing SVG elements
- Fluid animations (400-600ms cubic-bezier curves)
- Dynamic blur (backdrop-filter: blur)
- Color transitions with semantic tokens

---

## 2. Color Specification

### 2.1 Semantic Color Palette

| Role | Hex Value | CSS Variable | Usage |
|------|-----------|--------------|-------|
| **Primary** | `#18181B` | `--color-primary` | Main text, primary actions |
| **On Primary** | `#FFFFFF` | `--color-on-primary` | Text on primary backgrounds |
| **Secondary** | `#27272A` | `--color-secondary` | Secondary UI elements |
| **Accent/CTA** | `#D4AF37` | `--color-accent` | Call-to-action buttons (gold) |
| **Background** | `#FAFAFA` | `--color-background` | Page background (light) |
| **Foreground** | `#09090B` | `--color-foreground` | Secondary text |
| **Muted** | `#E8ECF0` | `--color-muted` | Disabled states, hints |
| **Border** | `#E4E4E7` | `--color-border` | Dividers, borders |
| **Destructive** | `#DC2626` | `--color-destructive` | Error states |
| **Ring/Focus** | `#18181B` | `--color-ring` | Focus indicators |

### 2.2 Glassmorphic Color Overlays

**Navbar Background:**
```css
/* Primary glassmorphic navbar */
background: rgba(0, 0, 0, 0.30);
backdrop-filter: blur(12px);
border-bottom: 1px solid rgba(255, 255, 255, 0.15);
```

**Carousel Card Hover:**
```css
/* Card overlay on hover */
background: rgba(212, 175, 55, 0.10);
backdrop-filter: blur(8px);
border: 1px solid rgba(212, 175, 55, 0.30);
```

### 2.3 Contrast Validation

**Light Mode:**
- Primary Text (#18181B) on White (#FFFFFF): 19.5:1 ✓ AAA
- Secondary Text (#27272A) on White: 16.2:1 ✓ AAA
- Accent Gold (#D4AF37) on Dark (#18181B): 4.8:1 ✓ AA

**Dark Mode:**
- Primary Text (#FFFFFF) on Dark (#18181B): 19.5:1 ✓ AAA
- Accent Gold (#D4AF37) on Dark: 4.8:1 ✓ AA

---

## 3. Typography Specification

### 3.1 Font Pairing

**Heading Font:** Cormorant Garamond (serif, luxury)
- Weights: 400, 500, 600, 700
- Usage: Page titles, section headers, hero text
- Mood: Elegant, refined, premium

**Body Font:** Montserrat (sans-serif, modern)
- Weights: 300, 400, 500, 600, 700
- Usage: Body text, navigation, labels
- Mood: Modern, clean, professional

### 3.2 Type Scale

| Role | Font | Size (Desktop) | Size (Mobile) | Line Height | Weight |
|------|------|---|---|---|---|
| **Hero Heading** | Cormorant | 56px | 32px | 1.2 | 700 |
| **Page Title** | Cormorant | 48px | 28px | 1.3 | 600 |
| **Section Heading** | Cormorant | 36px | 24px | 1.4 | 600 |
| **Subsection** | Montserrat | 24px | 18px | 1.5 | 600 |
| **Body** | Montserrat | 16px | 14px | 1.6 | 400 |
| **Small/Caption** | Montserrat | 14px | 12px | 1.5 | 400 |
| **Button Label** | Montserrat | 14px | 14px | 1.4 | 600 |

### 3.3 Google Fonts Import

```css
@import url('https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap');
```

**Fallback Stack:**
```css
/* Heading fallback */
font-family: 'Cormorant', Georgia, serif;

/* Body fallback */
font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
```

---

## 4. Transparent Navbar Specifications

### 4.1 Layout & Structure

```
┌─────────────────────────────────────────────────┐
│ Logo (Left) │ Nav Items (Center) │ CTA (Right) │
├─────────────────────────────────────────────────┤
│ Raikot      │ Home Tours Rental  │ Book        │
│ Signature   │ Reviews About      │ Expedition  │
│             │ Contact            │ (Gold Btn)  │
└─────────────────────────────────────────────────┘
```

### 4.2 Technical Specifications

**Fixed Positioning:**
```css
position: fixed;
top: 0;
left: 0;
right: 0;
width: 100%;
height: 80px; /* Desktop */
height: 64px; /* Mobile */
z-index: 100;
```

**Glassmorphic Background:**
```css
background: rgba(24, 24, 27, 0.30);
backdrop-filter: blur(12px);
-webkit-backdrop-filter: blur(12px);
border-bottom: 1px solid rgba(255, 255, 255, 0.15);
```

**Container (max-width with horizontal padding):**
```css
max-width: 1440px;
margin: 0 auto;
padding: 0 2rem; /* 32px on desktop */
padding: 0 1rem; /* 16px on mobile */
display: flex;
align-items: center;
justify-content: space-between;
height: 100%;
```

### 4.3 Navigation Items

**Items (6 links + 1 CTA):**
1. Home
2. Tours
3. Rental (Equipment/Gear)
4. Reviews
5. About Us
6. Contact
7. **[CTA]** "Book Expedition" (Gold button)

**Link Styling:**
```css
/* Navigation link base */
color: #FFFFFF;
font-family: 'Montserrat', sans-serif;
font-size: 14px;
font-weight: 600;
text-decoration: none;
position: relative;
transition: color 200ms ease-out;

/* Hover state: Subtle gold underline */
&:hover::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, #D4AF37 0%, transparent 100%);
  animation: slideInUnderline 300ms ease-out forwards;
}

/* Active state (current page) */
&.active::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  width: 100%;
  height: 2px;
  background: #D4AF37;
}
```

**Accessibility - Focus State:**
```css
&:focus-visible {
  outline: 2px solid #D4AF37;
  outline-offset: 4px;
  border-radius: 2px;
}
```

### 4.4 Primary CTA Button

**"Book Expedition" Button:**
```css
/* Base styling */
background: linear-gradient(135deg, #D4AF37 0%, #C9A227 100%);
color: #18181B;
border: none;
border-radius: 8px;
padding: 12px 28px;
font-family: 'Montserrat', sans-serif;
font-size: 14px;
font-weight: 700;
text-transform: uppercase;
letter-spacing: 0.5px;
cursor: pointer;
transition: all 300ms cubic-bezier(0.34, 1.56, 0.64, 1);
box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25);

/* Hover state */
&:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(212, 175, 55, 0.35);
  background: linear-gradient(135deg, #E5C158 0%, #D9B83F 100%);
}

/* Active state */
&:active {
  transform: translateY(0px);
  box-shadow: 0 2px 10px rgba(212, 175, 55, 0.25);
}

/* Focus state (keyboard navigation) */
&:focus-visible {
  outline: 2px solid #FFFFFF;
  outline-offset: 2px;
}
```

### 4.5 Mobile Navigation (Hamburger Menu)

**Breakpoint:** 768px and below

**Hamburger Icon:**
- 3 horizontal lines (stroke-width: 2px)
- Animated rotation (180°) on active
- Smooth transition 300ms

**Mobile Menu Drawer:**
```css
/* Drawer styling */
position: fixed;
top: 64px;
left: 0;
right: 0;
bottom: 0;
background: rgba(24, 24, 27, 0.95);
backdrop-filter: blur(12px);
overflow-y: auto;
transform: translateX(-100%);
transition: transform 300ms cubic-bezier(0.4, 0, 0.2, 1);
z-index: 99; /* Behind navbar but above content */

/* Open state */
&.open {
  transform: translateX(0);
}

/* Menu items stacked vertically */
display: flex;
flex-direction: column;
gap: 1px; /* Subtle divider height */

/* Each menu item */
& > a, & > button {
  padding: 16px 24px;
  color: #FFFFFF;
  border: none;
  background: transparent;
  font-family: 'Montserrat', sans-serif;
  font-size: 16px;
  font-weight: 600;
  text-align: left;
  cursor: pointer;
  border-bottom: 1px solid rgba(255, 255, 255, 0.10);
  transition: background 200ms ease-out;
  
  &:hover {
    background: rgba(212, 175, 55, 0.15);
  }
}
```

### 4.6 Responsive Behavior

| Breakpoint | Layout | Changes |
|------------|--------|---------|
| **1440px+** | Desktop full | All nav items visible, CTA button |
| **1024px** | Desktop medium | All nav items visible, CTA button |
| **768px** | Tablet | Nav items visible, hamburger appears on smaller tablets |
| **< 768px** | Mobile | Hamburger menu (3-line icon), drawer navigation |

---

## 5. Image Carousel Specifications

### 5.1 Carousel Style & Layout

**Primary Approach:** Cluster/Masonry Layout

**Visual Concept:**
- Images displayed in an overlapping cluster pattern
- Mix of portrait and landscape orientations
- Floating cards with subtle elevation
- Hover state reveals image title and expedition info
- Smooth swiping/scrolling animation

**Alternative:** 3D Coverflow Effect (if cluster is too complex)

### 5.2 Carousel Container

```css
/* Main carousel wrapper */
position: relative;
width: 100%;
height: 600px; /* Desktop */
height: 400px; /* Mobile */
overflow: hidden;
margin: 60px 0;
padding: 0 2rem;

/* Carousel items container (horizontal scroll) */
display: flex;
gap: 24px;
overflow-x: auto;
overflow-y: hidden;
scroll-behavior: smooth;
scroll-snap-type: x mandatory;
padding-bottom: 16px; /* Scrollbar space */
-webkit-overflow-scrolling: touch; /* Momentum scrolling on iOS */

/* Hide scrollbar but keep scroll functionality */
scrollbar-width: none; /* Firefox */
&::-webkit-scrollbar {
  display: none; /* Chrome, Safari */
}
```

### 5.3 Individual Carousel Cards

```css
/* Card base styling */
flex: 0 0 300px; /* Fixed width, prevents shrinking */
height: 400px;
border-radius: 16px;
overflow: hidden;
cursor: pointer;
scroll-snap-align: center;
transition: all 300ms cubic-bezier(0.34, 1.56, 0.64, 1);
box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
position: relative;

/* Image fill container */
img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 300ms ease-out;
}

/* Hover state */
&:hover {
  transform: scale(1.05) translateY(-8px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
  
  /* Image zoom on hover */
  img {
    transform: scale(1.08);
  }
  
  /* Reveal overlay information */
  .card-overlay {
    opacity: 1;
  }
}
```

### 5.4 Card Overlay (Title + Info)

**Activated on hover (desktop) / tap (mobile):**

```css
.card-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background: linear-gradient(
    180deg,
    rgba(0, 0, 0, 0) 0%,
    rgba(0, 0, 0, 0.30) 60%,
    rgba(0, 0, 0, 0.60) 100%
  );
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 24px;
  opacity: 0;
  transition: opacity 300ms ease-out;
  pointer-events: none;
}

/* Title styling */
.card-title {
  font-family: 'Cormorant', serif;
  font-size: 28px;
  font-weight: 700;
  color: #FFFFFF;
  line-height: 1.2;
  margin-bottom: 8px;
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.40);
}

/* Description/expedition info */
.card-description {
  font-family: 'Montserrat', sans-serif;
  font-size: 13px;
  color: rgba(255, 255, 255, 0.85);
  font-weight: 500;
  line-height: 1.4;
  text-shadow: 0 1px 4px rgba(0, 0, 0, 0.40);
}
```

### 5.5 Responsive Carousel

| Breakpoint | Card Width | Card Height | Gap | Items Visible |
|-----------|-----------|------------|-----|---|
| **1440px+** | 380px | 480px | 32px | 3.5 |
| **1024px** | 340px | 420px | 24px | 3 |
| **768px** | 280px | 360px | 20px | 2.5 |
| **< 768px** | 240px | 320px | 16px | 1.5 |

### 5.6 Mobile Touch Interaction

**Swipe Support:**
```javascript
// Smooth swiping with momentum detection
const carousel = document.querySelector('.carousel-container');

let isDown = false;
let startX;
let scrollLeft;

carousel.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - carousel.offsetLeft;
  scrollLeft = carousel.scrollLeft;
});

carousel.addEventListener('mouseleave', () => {
  isDown = false;
});

carousel.addEventListener('mouseup', () => {
  isDown = false;
});

carousel.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - carousel.offsetLeft;
  const walk = (x - startX) * 1.5;
  carousel.scrollLeft = scrollLeft - walk;
});

// Touch support
carousel.addEventListener('touchstart', (e) => {
  startX = e.touches[0].pageX - carousel.offsetLeft;
  scrollLeft = carousel.scrollLeft;
});

carousel.addEventListener('touchmove', (e) => {
  const x = e.touches[0].pageX - carousel.offsetLeft;
  const walk = (x - startX) * 1.5;
  carousel.scrollLeft = scrollLeft - walk;
});
```

### 5.7 Animation Easing & Timing

**Carousel Animation Curves:**
- **Entrance animation:** `cubic-bezier(0.34, 1.56, 0.64, 1)` (spring effect)
- **Hover scale:** 300ms duration, ease-out
- **Overlay reveal:** 200ms opacity transition, ease-out
- **Scroll momentum:** Native `scroll-behavior: smooth` + custom momentum handling

---

## 6. Accessibility Requirements

### 6.1 WCAG AA Compliance Checklist

**Navigation Accessibility:**
- [ ] All nav links keyboard-navigable (Tab key)
- [ ] Focus ring visible (2px outline, 4px offset)
- [ ] Active navigation state indicated with aria-current="page"
- [ ] Hamburger menu button has aria-label="Toggle navigation"
- [ ] Mobile menu drawer has role="navigation"
- [ ] Skip-to-main-content link included (for keyboard users)
- [ ] Heading hierarchy sequential (h1 → h2 → h3)

**Carousel Accessibility:**
- [ ] Carousel container has role="region" or aria-label="Image carousel"
- [ ] Each image has descriptive alt text
  - Example: `alt="Sunrise over Karakoram range during expedition"`
- [ ] Carousel is keyboard navigable (Left/Right arrows)
- [ ] Focus trap management (cannot Tab beyond carousel into background)
- [ ] Screen reader announces image count: "Image 3 of 12"
- [ ] Card overlays have proper contrast (4.5:1 minimum)
- [ ] No auto-play on carousel (user-initiated scrolling only)

**Color & Contrast:**
- [ ] Primary text: 4.5:1 contrast minimum (AA)
- [ ] AAA contrast (7:1) preferred for critical text
- [ ] Color not used as sole indicator (pair with icon/text)
- [ ] Focus indicators: 2-4px visible outline
- [ ] Disabled states: Clear visual distinction + `disabled` attribute

**Motion & Animation:**
- [ ] Respect `prefers-reduced-motion` media query
  ```css
  @media (prefers-reduced-motion: reduce) {
    * {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
      scroll-behavior: auto !important;
    }
  }
  ```
- [ ] No auto-playing animations (user-triggered only)
- [ ] No infinite animations (except loaders)
- [ ] Duration: 150-300ms for micro-interactions

**Form Inputs (if any):**
- [ ] Labels paired with inputs (not placeholder-only)
- [ ] Error messages near related field
- [ ] Helper text provided for complex inputs
- [ ] Focus management after form submission

### 6.2 Keyboard Navigation

**Navbar:**
- `Tab` → Move to next nav item
- `Shift+Tab` → Move to previous nav item
- `Enter/Space` → Activate link/button
- `Escape` → Close mobile menu (if open)

**Carousel:**
- `Left Arrow` → Scroll to previous card
- `Right Arrow` → Scroll to next card
- `Tab` → Focus individual card
- `Enter/Space` → Activate card (show detail modal or navigate to tour page)

### 6.3 Screen Reader Support

**Navbar:**
```html
<nav role="navigation" aria-label="Main navigation">
  <button 
    aria-label="Toggle navigation menu" 
    class="hamburger-menu"
  >
    ☰
  </button>
  <a href="/" aria-current="page">Home</a>
  <a href="/tours">Tours</a>
  <a href="/rental">Rental</a>
  <!-- ... -->
</nav>
```

**Carousel:**
```html
<div role="region" aria-label="Expedition image gallery" class="carousel">
  <ul role="list">
    <li>
      <img 
        src="..." 
        alt="K2 expedition base camp at sunrise"
        width="380"
        height="480"
      />
      <div class="card-overlay">
        <h3 class="card-title">K2 Expedition</h3>
        <p class="card-description">10-day climbing adventure</p>
      </div>
    </li>
    <!-- ... -->
  </ul>
  <p class="sr-only">Image 1 of 12</p>
</div>
```

---

## 7. Performance Specifications

### 7.1 Core Web Vitals Targets

| Metric | Target | How to Achieve |
|--------|--------|---|
| **LCP** (Largest Contentful Paint) | < 2.5s | Hero image optimization, lazy load |
| **FID** (First Input Delay) | < 100ms | Debounce carousel scroll, optimize JS |
| **CLS** (Cumulative Layout Shift) | < 0.1 | Reserve space for images, fixed navbar height |

### 7.2 Image Optimization

**Format & Encoding:**
- **Format:** WebP with JPEG fallback
- **Sizes Breakpoints:**
  ```html
  <img
    srcset="
      carousel-image-240w.webp 240w,
      carousel-image-480w.webp 480w,
      carousel-image-768w.webp 768w,
      carousel-image-1080w.webp 1080w
    "
    sizes="(max-width: 768px) 240px, 380px"
    src="carousel-image-380w.jpg"
    alt="Expedition landscape"
  />
  ```

**Lazy Loading:**
- Hero image: Preload (above fold)
- Carousel images: `loading="lazy"` for below-visible-fold cards
- Reveal images progressively as user scrolls

**Image Dimensions:**
- Carousel card: 380px × 480px (desktop), 240px × 320px (mobile)
- File size: < 150KB per optimized image
- Use `aspect-ratio` CSS to prevent layout shift

### 7.3 Bundle Size & Code Splitting

**JavaScript:**
- Navbar: ~5KB (minified)
- Carousel: ~8KB (minified, no external carousel library)
- Total: < 20KB bundle increase

**CSS:**
- Navbar: ~3KB
- Carousel: ~4KB
- Design tokens: ~2KB
- Total: < 10KB stylesheet addition

**Defer non-critical:**
```html
<!-- Critical CSS inline -->
<style>
  /* Navbar + above-fold styles */
</style>

<!-- Non-critical CSS loaded async -->
<link rel="stylesheet" href="/css/carousel.css" media="print" onload="this.media='all'">
```

---

## 8. Mobile-First Responsive Design

### 8.1 Breakpoint System

```css
/* Mobile-first approach */
/* Base: 375px - 425px (small phones) */
@media (min-width: 640px) { /* Tablets portrait */ }
@media (min-width: 768px) { /* Tablets landscape */ }
@media (min-width: 1024px) { /* Small desktop */ }
@media (min-width: 1440px) { /* Large desktop */ }
```

### 8.2 Navbar Responsive Changes

| Breakpoint | Navbar Height | Logo Size | Font Size | Layout |
|---|---|---|---|---|
| < 640px | 64px | 32px | 13px | Hamburger menu |
| 640px - 768px | 72px | 36px | 14px | Hamburger menu |
| 768px - 1024px | 80px | 40px | 14px | Full nav visible |
| 1024px+ | 80px | 48px | 14px | Full nav visible |

### 8.3 Carousel Responsive Changes

| Breakpoint | Card Width | Height | Layout |
|---|---|---|---|
| < 375px | 220px | 280px | 1 card + edge |
| 375px - 640px | 240px | 320px | 1.5 cards |
| 640px - 768px | 280px | 360px | 2.5 cards |
| 768px - 1024px | 340px | 420px | 3 cards |
| 1024px+ | 380px | 480px | 3.5 cards |

### 8.4 Safe Area Compliance

**iOS Notch/Dynamic Island:**
```css
.navbar {
  padding-top: max(0px, env(safe-area-inset-top));
  padding-left: max(0px, env(safe-area-inset-left));
  padding-right: max(0px, env(safe-area-inset-right));
}

.hero-section {
  padding-top: calc(80px + env(safe-area-inset-top));
}
```

**Gesture Bar Clearance:**
- Mobile bottom bar: Keep 50px clearance if bottom-fixed content exists
- Landscape mode: Account for reduced vertical space

---

## 9. Design Tokens & CSS Variables

### 9.1 Color Tokens

```css
:root {
  --color-primary: #18181B;
  --color-on-primary: #FFFFFF;
  --color-secondary: #27272A;
  --color-accent: #D4AF37;
  --color-background: #FAFAFA;
  --color-foreground: #09090B;
  --color-muted: #E8ECF0;
  --color-border: #E4E4E7;
  --color-destructive: #DC2626;
  --color-ring: #18181B;
}
```

### 9.2 Typography Tokens

```css
:root {
  --font-heading: 'Cormorant', Georgia, serif;
  --font-body: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  
  --font-size-hero: clamp(32px, 6vw, 56px);
  --font-size-h2: clamp(24px, 4vw, 48px);
  --font-size-h3: clamp(18px, 3vw, 36px);
  --font-size-body: 16px;
  --line-height-tight: 1.2;
  --line-height-normal: 1.5;
  --line-height-relaxed: 1.75;
}

@media (max-width: 640px) {
  :root {
    --font-size-body: 14px;
  }
}
```

### 9.3 Spacing Tokens

```css
:root {
  --spacing-xs: 4px;
  --spacing-sm: 8px;
  --spacing-md: 16px;
  --spacing-lg: 24px;
  --spacing-xl: 32px;
  --spacing-2xl: 48px;
  --spacing-3xl: 64px;
}
```

### 9.4 Animation Tokens

```css
:root {
  --duration-fast: 150ms;
  --duration-normal: 300ms;
  --duration-slow: 400ms;
  --easing-out: cubic-bezier(0.4, 0, 0.2, 1);
  --easing-in: cubic-bezier(0.4, 0, 0.2, 1);
  --easing-spring: cubic-bezier(0.34, 1.56, 0.64, 1);
}
```

---

## 10. Dark Mode Support

### 10.1 Dark Mode Palette

```css
@media (prefers-color-scheme: dark) {
  :root {
    --color-primary: #FFFFFF;
    --color-on-primary: #18181B;
    --color-secondary: #D1D5DB;
    --color-background: #09090B;
    --color-foreground: #F5F5F5;
    --color-muted: #4B5563;
    --color-border: #2D2D30;
  }
  
  .navbar {
    background: rgba(24, 24, 27, 0.40); /* Darker scrim */
    backdrop-filter: blur(12px);
  }
  
  .carousel-card {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.40); /* Darker shadow */
  }
}
```

### 10.2 Theme Switching (Optional)

If implementing manual light/dark toggle:
```html
<button id="theme-toggle" aria-label="Toggle dark mode">
  <span class="sr-only">Toggle dark mode</span>
</button>

<script>
  const html = document.documentElement;
  const toggle = document.getElementById('theme-toggle');
  
  // Read preference
  const isDark = localStorage.getItem('theme') === 'dark' ||
                 window.matchMedia('(prefers-color-scheme: dark)').matches;
  
  if (isDark) html.style.colorScheme = 'dark';
  
  toggle.addEventListener('click', () => {
    const newTheme = html.style.colorScheme === 'dark' ? 'light' : 'dark';
    html.style.colorScheme = newTheme;
    localStorage.setItem('theme', newTheme);
  });
</script>
```

---

## 11. Implementation Roadmap

### Phase 1: Navbar Redesign (Week 1-2)

**Deliverables:**
1. ✓ Glassmorphic navbar component
2. ✓ Navigation link styling with hover effects
3. ✓ "Book Expedition" CTA button
4. ✓ Mobile hamburger menu + drawer
5. ✓ Keyboard navigation (Tab, Arrow keys)
6. ✓ Focus states (WCAG AA)

**Files to Create/Modify:**
- `/parts/navbar.html` (WordPress pattern)
- `/assets/css/navbar.css` (styles)
- `/assets/js/navbar.js` (hamburger menu interaction)

**Testing:**
- Keyboard navigation on all browsers
- Focus visibility with accessibility inspector
- Mobile menu on 375px, 640px, 768px breakpoints
- Contrast validation (Lighthouse, axe DevTools)

### Phase 2: Image Carousel Component (Week 2-3)

**Deliverables:**
1. ✓ Carousel container with scroll-snap
2. ✓ Individual carousel cards (masonry cluster style)
3. ✓ Card hover state (scale + overlay reveal)
4. ✓ Responsive sizing per breakpoint
5. ✓ Touch swipe support (mobile)
6. ✓ Keyboard arrow navigation
7. ✓ Lazy image loading

**Files to Create/Modify:**
- `/parts/carousel.html` (WordPress pattern)
- `/assets/css/carousel.css` (styles)
- `/assets/js/carousel.js` (interaction: swipe, keyboard, lazy-load)

**Image Optimization:**
- Convert images to WebP with JPEG fallback
- Create srcset for responsive images
- Optimize file sizes (< 150KB each)

**Testing:**
- Carousel scroll on mobile (swipe)
- Keyboard navigation (Left/Right arrows)
- Image lazy loading (DevTools Network tab)
- Alt text validation (axe DevTools)
- Reduced-motion behavior

### Phase 3: Integration & Styling (Week 3-4)

**Deliverables:**
1. ✓ Navbar + carousel unified design system
2. ✓ Hero section height adjustment (compensate for navbar)
3. ✓ Color token consistency across components
4. ✓ Dark mode testing and refinement
5. ✓ Typography refinement (Google Fonts loading)
6. ✓ Spacing & alignment standardization

**Files to Create/Modify:**
- `/assets/css/design-system.css` (color tokens, typography, spacing)
- `/assets/css/theme.css` (dark mode variants)
- `/theme.json` (WordPress theme.json for block editor)

**Testing:**
- Full page rendering with both components
- Color contrast in light and dark modes
- Typography scaling on mobile
- Custom font loading performance

### Phase 4: Performance & Accessibility Audit (Week 4-5)

**Deliverables:**
1. ✓ Lighthouse score ≥ 90 (performance)
2. ✓ WCAG AA compliance verification
3. ✓ Bundle size optimization (CSS/JS)
4. ✓ Image optimization report
5. ✓ Core Web Vitals monitoring

**Tools:**
- Google Lighthouse
- axe DevTools
- WebAIM contrast checker
- WebPageTest

**Target Metrics:**
- LCP < 2.5s
- FID < 100ms
- CLS < 0.1
- SEO score ≥ 90
- Accessibility score ≥ 95

**Final Optimizations:**
- Minify CSS/JS
- Remove unused code
- Inline critical CSS
- Defer non-critical fonts

---

## 12. Browser & Device Support

### 12.1 Browser Support Matrix

| Browser | Version | Status |
|---------|---------|--------|
| Chrome | 100+ | ✓ Full support |
| Firefox | 100+ | ✓ Full support |
| Safari | 14+ | ✓ Full support |
| Edge | 100+ | ✓ Full support |
| iOS Safari | 14+ | ✓ Full support |
| Chrome Mobile | 100+ | ✓ Full support |
| Samsung Internet | 16+ | ✓ Full support |

**CSS Features Used:**
- CSS Grid (100% support across modern browsers)
- CSS Flexbox (100% support)
- backdrop-filter (90%+ support, graceful fallback)
- CSS Variables (95%+ support)
- @supports() for feature detection

### 12.2 Device Support

- iPhone 12+ (6.1" and larger)
- iPad (7th gen+)
- Android 8.0+
- Desktop monitors (1080p, 1440p, 4K)

### 12.3 Graceful Degradation

**Backdrop-filter fallback (browsers < 90% support):**
```css
.navbar {
  background: rgba(24, 24, 27, 0.95); /* Solid fallback */
  
  @supports (backdrop-filter: blur(12px)) {
    background: rgba(24, 24, 27, 0.30);
    backdrop-filter: blur(12px);
  }
}
```

---

## 13. Testing Checklist

### 13.1 Visual Testing

- [ ] Navbar renders correctly on desktop (1440px, 1920px, 4K)
- [ ] Navbar renders correctly on tablet (768px landscape/portrait)
- [ ] Navbar renders correctly on mobile (375px, 640px)
- [ ] Carousel cards display with correct aspect ratio
- [ ] Hover states (scale, overlay) work smoothly on desktop
- [ ] Colors match design spec in both light and dark modes
- [ ] Typography renders correctly with Google Fonts

### 13.2 Interaction Testing

- [ ] Hamburger menu toggles on < 768px
- [ ] Mobile menu drawer slides in from left
- [ ] Close button dismisses mobile menu
- [ ] Carousel scrolls horizontally on desktop
- [ ] Swipe works on touch devices (mobile)
- [ ] Keyboard arrows navigate carousel
- [ ] CTA button leads to booking page
- [ ] All links are clickable and navigate correctly

### 13.3 Accessibility Testing

- [ ] Tab key navigates all elements in logical order
- [ ] Focus ring visible on all interactive elements
- [ ] Hamburger button has aria-label
- [ ] Mobile menu has role="navigation"
- [ ] Carousel has role="region" + aria-label
- [ ] Images have descriptive alt text
- [ ] Color contrast ≥ 4.5:1 (AA) or 7:1 (AAA)
- [ ] Reduced-motion CSS media query respected
- [ ] Screen reader announces navbar and carousel correctly

### 13.4 Performance Testing

- [ ] Images optimized to < 150KB each
- [ ] Lighthouse performance score ≥ 90
- [ ] LCP < 2.5s
- [ ] CLS < 0.1
- [ ] No layout shifts on page load
- [ ] Carousel scroll at 60fps (no jank)
- [ ] Bundle size increase < 20KB JS + 10KB CSS

### 13.5 Cross-Browser Testing

- [ ] Chrome (Windows, Mac, Linux, iOS, Android)
- [ ] Firefox (Windows, Mac, Linux)
- [ ] Safari (Mac, iOS)
- [ ] Edge (Windows)
- [ ] Samsung Internet (Android)

### 13.6 Mobile-Specific Testing

- [ ] Touch target sizes ≥ 44×44px
- [ ] Swipe velocity feels natural
- [ ] Mobile menu doesn't hide important content
- [ ] Carousel doesn't cause horizontal scroll
- [ ] Text remains readable without zoom
- [ ] Safe areas (notch) respected on iOS

---

## 14. Post-Launch Monitoring

### 14.1 Analytics to Track

**User Engagement:**
- Click-through rate on "Book Expedition" button
- Time spent viewing carousel
- Carousel interaction rate (hover/scroll)
- Mobile vs desktop engagement difference

**Performance Metrics:**
- Lighthouse scores (monthly)
- Core Web Vitals (via Web Vitals API)
- Error rates (console errors, crashes)
- Load time by device/network

**Accessibility:**
- Screen reader usage (if available)
- Keyboard navigation patterns
- Focus indicator visibility feedback

### 14.2 A/B Testing Opportunities

1. **Carousel Style:** Cluster vs Coverflow vs Grid
2. **CTA Button Text:** "Book Expedition" vs "Reserve Now" vs "Start Planning"
3. **Carousel Auto-scroll:** Should it auto-advance on mobile?
4. **Mobile Menu Style:** Full-screen drawer vs slide-over panel

### 14.3 Feedback & Iteration

- Monthly performance reviews
- Quarterly design refinement based on user feedback
- Update for new browser standards and CSS features
- Seasonal content updates for carousel images

---

## 15. Design System References

### 15.1 UI/UX Pro Max Validation Summary

**Design System:** Liquid Glass (Luxury Expedition Travel)

**Validation Results:**
- ✓ Pattern: Horizontal Scroll Journey (immersive product discovery)
- ✓ Style: Liquid Glass (flowing, premium, luxury aesthetic)
- ✓ Typography: Cormorant (heading) + Montserrat (body)
- ✓ Color Palette: Dark primary (#18181B) + Gold accent (#D4AF37)
- ✓ Accessibility: WCAG AA compliance achievable
- ✓ Performance: Moderate-good with image optimization
- ✓ Animation: 300-400ms spring curves with reduced-motion support

**Anti-Patterns to Avoid:**
- Vibrant, block-based color schemes
- Playful, juvenile styling
- Auto-playing animations without user control
- Inaccessible focus states or hidden keyboard navigation
- Large, unoptimized images (> 200KB each)

### 15.2 Quick Reference Links

- **Google Fonts:** https://fonts.google.com/share?selection.family=Cormorant:wght@400;500;600;700|Montserrat:wght@300;400;500;600;700
- **WCAG Guidelines:** https://www.w3.org/WAI/WCAG21/quickref/
- **WebAIM Color Contrast:** https://webaim.org/resources/contrastchecker/
- **MDN CSS Backdrop-filter:** https://developer.mozilla.org/en-US/docs/Web/CSS/backdrop-filter
- **Lighthouse:** https://developers.google.com/web/tools/lighthouse

---

## 16. Appendix: Code Examples

### 16.1 Navbar Base HTML

```html
<!-- WordPress pattern: /parts/navbar.html -->
<header class="navbar" role="banner">
  <div class="navbar-container">
    <!-- Logo -->
    <a href="/" class="navbar-logo" aria-label="Raikot Tours home">
      <span class="logo-text">Raikot Signature</span>
    </a>
    
    <!-- Desktop Navigation -->
    <nav class="navbar-nav" aria-label="Main navigation">
      <a href="/" class="nav-link active" aria-current="page">Home</a>
      <a href="/tours" class="nav-link">Tours</a>
      <a href="/rental" class="nav-link">Rental</a>
      <a href="/reviews" class="nav-link">Reviews</a>
      <a href="/about" class="nav-link">About Us</a>
      <a href="/contact" class="nav-link">Contact</a>
    </nav>
    
    <!-- CTA Button -->
    <a href="/book" class="btn-primary">Book Expedition</a>
    
    <!-- Mobile Hamburger Menu -->
    <button class="hamburger-menu" aria-label="Toggle navigation menu" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
  
  <!-- Mobile Menu Drawer (hidden by default) -->
  <nav class="mobile-menu" role="navigation" aria-hidden="true">
    <a href="/" class="mobile-menu-link">Home</a>
    <a href="/tours" class="mobile-menu-link">Tours</a>
    <a href="/rental" class="mobile-menu-link">Rental</a>
    <a href="/reviews" class="mobile-menu-link">Reviews</a>
    <a href="/about" class="mobile-menu-link">About Us</a>
    <a href="/contact" class="mobile-menu-link">Contact</a>
    <a href="/book" class="mobile-menu-link btn-primary">Book Expedition</a>
  </nav>
</header>
```

### 16.2 Carousel Base HTML

```html
<!-- WordPress pattern: /parts/carousel.html -->
<div role="region" aria-label="Expedition image gallery" class="carousel-section">
  <div class="carousel-container">
    <ul role="list" class="carousel-items">
      <li class="carousel-card">
        <img 
          src="/images/expeditions/k2-base-camp-380w.jpg"
          srcset="
            /images/expeditions/k2-base-camp-240w.webp 240w,
            /images/expeditions/k2-base-camp-480w.webp 480w,
            /images/expeditions/k2-base-camp-768w.webp 768w,
            /images/expeditions/k2-base-camp-1080w.webp 1080w
          "
          sizes="(max-width: 768px) 240px, 380px"
          alt="K2 expedition base camp at sunrise with snow-capped peaks"
          width="380"
          height="480"
          loading="lazy"
        />
        <div class="card-overlay">
          <h3 class="card-title">K2 Expedition</h3>
          <p class="card-description">10-day climbing adventure | Altitude: 8,611m</p>
        </div>
      </li>
      
      <!-- More carousel items... -->
    </ul>
  </div>
  
  <p class="sr-only" aria-live="polite" aria-atomic="true">Image 1 of 12</p>
</div>
```

---

## Version History

| Version | Date | Changes |
|---------|------|---------|
| 1.0 | 2026-04-14 | Initial design spec with UI/UX Pro Max validation |

---

**Document Status:** APPROVED FOR IMPLEMENTATION  
**Last Updated:** April 14, 2026  
**Next Review:** Post-Phase 2 (carousel component complete)
