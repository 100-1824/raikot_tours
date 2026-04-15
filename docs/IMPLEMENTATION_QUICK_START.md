# Raikot Tours Navbar + Carousel - Quick Start Guide
## Implementation Checklist & Resources

**Created:** April 14, 2026  
**Design System:** Liquid Glass  
**Validation:** ✓ UI/UX Pro Max Approved

---

## Key Documents

1. **NAVBAR_CAROUSEL_DESIGN_SPEC.md** (MAIN) — Complete specification
   - Full navbar specifications (HTML, CSS, JS)
   - Carousel specifications (layout, interaction, animation)
   - Responsive breakpoints and mobile behavior
   - Accessibility requirements (WCAG AA+)
   - Performance targets and image optimization

2. **UI_UX_VALIDATION_REPORT.md** — Validation details
   - UI/UX Pro Max approval matrix
   - Accessibility compliance checklist
   - Browser support matrix
   - Anti-patterns to avoid
   - Pre-delivery checklist

---

## Quick Reference

### Color Palette

```css
--color-primary: #18181B;        /* Near-black, primary text */
--color-accent: #D4AF37;         /* Gold, CTA buttons, hover underline */
--color-background: #FAFAFA;     /* Light mode background */
--color-border: #E4E4E7;         /* Borders, dividers */
```

### Typography

| Element | Font | Weight | Size (Desktop) |
|---------|------|--------|---|
| Navbar Link | Montserrat | 600 | 14px |
| CTA Button | Montserrat | 700 | 14px |
| Card Title | Cormorant | 700 | 28px |

### Navbar Layout

```
Logo (Left) — Navigation Links (Center) — "Book Expedition" CTA (Right)
```

**Navigation Items:** Home, Tours, Rental, Reviews, About Us, Contact

### Carousel Layout

- **Card Width:** 380px (desktop), 240px (mobile)
- **Card Height:** 480px (desktop), 320px (mobile)
- **Gap Between Cards:** 24px (desktop), 16px (mobile)
- **Visible Cards:** 3.5 (desktop), 1.5 (mobile)

---

## Implementation Phases

### Phase 1: Navbar (Week 1-2)

**Files to Create/Edit:**
- `/parts/navbar.html` — WordPress pattern with semantic HTML
- `/assets/css/navbar.css` — Glassmorphic styling
- `/assets/js/navbar.js` — Hamburger menu toggle

**Key Features:**
- Fixed position navbar with backdrop-filter blur
- Navigation links with hover underline effect
- Gold CTA button with gradient
- Mobile hamburger menu with drawer
- Keyboard navigation (Tab, Escape)
- Focus rings (2px outline, 4px offset)

**Testing:**
- Keyboard Tab through all nav items
- Hamburger menu on < 768px
- Contrast ratio check (axe DevTools)
- Focus visibility test

### Phase 2: Carousel (Week 2-3)

**Files to Create/Edit:**
- `/parts/carousel.html` — WordPress pattern with semantic HTML
- `/assets/css/carousel.css` — Scroll-snap, hover, overlay
- `/assets/js/carousel.js` — Swipe, lazy-load, keyboard nav

**Key Features:**
- Horizontal scroll with scroll-snap-x
- Masonry-style card cluster layout
- Image overlay reveal on hover
- Touch swipe support (iOS momentum)
- Lazy loading for below-fold images
- Keyboard arrow navigation

**Testing:**
- Swipe left/right on mobile
- Arrow keys navigate carousel
- Images load lazily (DevTools Network)
- Alt text validation (WAVE tool)

### Phase 3: Integration (Week 3-4)

**Tasks:**
- Merge navbar + carousel styles
- Ensure color consistency across components
- Test hero section spacing (navbar offset)
- Verify typography system
- Dark mode testing

**Testing:**
- Full page rendering (1440px, 768px, 375px)
- Light and dark mode contrast check
- Google Fonts loading performance

### Phase 4: Optimization (Week 4-5)

**Tasks:**
- Run Lighthouse audit
- Optimize images (WebP, file size)
- Minify CSS/JS
- Inline critical CSS
- Monitor Core Web Vitals

**Targets:**
- Lighthouse performance: ≥ 90
- LCP < 2.5s
- CLS < 0.1
- Bundle size < 25KB added

---

## Critical Implementation Details

### Navbar HTML Structure

```html
<header class="navbar" role="banner">
  <div class="navbar-container">
    <a href="/" class="navbar-logo">Raikot Signature</a>
    <nav class="navbar-nav" aria-label="Main navigation">
      <a href="/" aria-current="page">Home</a>
      <a href="/tours">Tours</a>
      <!-- ... 4 more nav items ... -->
    </nav>
    <a href="/book" class="btn-primary">Book Expedition</a>
    <button class="hamburger-menu" aria-label="Toggle menu">☰</button>
  </div>
  <nav class="mobile-menu" role="navigation" aria-hidden="true">
    <!-- Mobile nav items + CTA -->
  </nav>
</header>
```

### Navbar CSS (Base)

```css
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 80px;
  z-index: 100;
  background: rgba(24, 24, 27, 0.30);
  backdrop-filter: blur(12px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.navbar-container {
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 100%;
}

.nav-link {
  color: #FFFFFF;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: color 200ms ease-out;
}

.nav-link:hover::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, #D4AF37 0%, transparent 100%);
}

.btn-primary {
  background: linear-gradient(135deg, #D4AF37 0%, #C9A227 100%);
  color: #18181B;
  border: none;
  border-radius: 8px;
  padding: 12px 28px;
  font-weight: 700;
  cursor: pointer;
  transition: all 300ms cubic-bezier(0.34, 1.56, 0.64, 1);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(212, 175, 55, 0.35);
}
```

### Carousel HTML Structure

```html
<div role="region" aria-label="Expedition image gallery" class="carousel-section">
  <div class="carousel-container">
    <ul role="list" class="carousel-items">
      <li class="carousel-card">
        <img 
          src="..." 
          srcset="..." 
          alt="Descriptive alt text"
          width="380"
          height="480"
          loading="lazy"
        />
        <div class="card-overlay">
          <h3 class="card-title">Expedition Name</h3>
          <p class="card-description">Duration | Difficulty</p>
        </div>
      </li>
      <!-- ... more cards ... -->
    </ul>
  </div>
</div>
```

### Carousel CSS (Base)

```css
.carousel-container {
  display: flex;
  gap: 24px;
  overflow-x: auto;
  scroll-behavior: smooth;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
}

.carousel-card {
  flex: 0 0 380px;
  height: 480px;
  border-radius: 16px;
  overflow: hidden;
  scroll-snap-align: center;
  cursor: pointer;
  transition: all 300ms cubic-bezier(0.34, 1.56, 0.64, 1);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.carousel-card:hover {
  transform: scale(1.05) translateY(-8px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
}

.carousel-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 300ms ease-out;
}

.carousel-card:hover img {
  transform: scale(1.08);
}

.card-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.60) 100%);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 24px;
  opacity: 0;
  transition: opacity 300ms ease-out;
}

.carousel-card:hover .card-overlay {
  opacity: 1;
}
```

---

## Responsive Breakpoints

### Navbar Height

| Breakpoint | Height | Logo Size | Font Size |
|---|---|---|---|
| < 640px | 64px | 32px | 13px |
| 768px+ | 80px | 48px | 14px |

### Carousel Card Dimensions

| Breakpoint | Width | Height | Cards Visible |
|---|---|---|---|
| < 640px | 240px | 320px | 1.5 |
| 768px | 280px | 360px | 2.5 |
| 1024px | 340px | 420px | 3 |
| 1440px+ | 380px | 480px | 3.5 |

---

## Accessibility Checklist

### Navbar
- [ ] All nav links keyboard-navigable (Tab key)
- [ ] Hamburger button has aria-label
- [ ] Active nav item has aria-current="page"
- [ ] Focus ring visible (2px outline)
- [ ] Escape key closes mobile menu

### Carousel
- [ ] Each image has descriptive alt text
- [ ] Carousel region has role="region" + aria-label
- [ ] Left/Right arrow keys navigate carousel
- [ ] Focus trap within carousel (Can't Tab out to background)
- [ ] Card overlay text has sufficient contrast (4.5:1)

### Both
- [ ] @media (prefers-reduced-motion: reduce) implemented
- [ ] No animations when motion preference is reduced
- [ ] Color not used as sole indicator (pair with text/icon)

---

## Performance Checklist

### Images
- [ ] WebP format with JPEG fallback
- [ ] File size < 150KB per image
- [ ] srcset for responsive images
- [ ] loading="lazy" for below-fold carousel cards
- [ ] aspect-ratio CSS (prevent CLS)

### CSS/JS
- [ ] Navbar CSS < 5KB (minified)
- [ ] Carousel CSS < 5KB (minified)
- [ ] Navbar JS < 5KB (minified)
- [ ] Carousel JS < 10KB (minified)
- [ ] Total bundle increase < 25KB

### Performance Metrics
- [ ] Lighthouse performance score ≥ 90
- [ ] LCP < 2.5s (measure with PageSpeed Insights)
- [ ] CLS < 0.1 (no layout shifts)
- [ ] Zero console errors/warnings

---

## Testing Tools

**Required Tools:**
1. **Lighthouse** (Chrome DevTools) — Performance, accessibility, SEO
2. **axe DevTools** (Browser extension) — Accessibility audit
3. **WAVE** (Browser extension) — Alt text, contrast validation
4. **WebAIM Contrast Checker** — Color contrast validation
5. **PageSpeed Insights** — Core Web Vitals

**Testing on Devices:**
- iPhone SE (375px)
- iPad (768px)
- MacBook (1440px)

---

## Key CSS Properties to Know

```css
/* Glassmorphic effect */
backdrop-filter: blur(12px);
-webkit-backdrop-filter: blur(12px);  /* iOS Safari */

/* Smooth scrolling */
scroll-behavior: smooth;
scroll-snap-type: x mandatory;

/* Touch momentum scrolling on iOS */
-webkit-overflow-scrolling: touch;

/* Hide scrollbar, keep scroll */
scrollbar-width: none;  /* Firefox */
/* ::-webkit-scrollbar { display: none; } for Chrome */

/* Prevent layout shift */
aspect-ratio: 380 / 480;

/* Focus ring (keyboard navigation) */
outline: 2px solid #D4AF37;
outline-offset: 4px;

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
  * { animation-duration: 0.01ms !important; }
}
```

---

## Common Pitfalls to Avoid

1. **Navbar overlapping hero content** — Add padding-top to first section equal to navbar height (80px)
2. **Images causing layout shift** — Always specify width/height or use aspect-ratio CSS
3. **Hover effects not working on mobile** — Use @media (hover: hover) or touch-based alternatives
4. **Focus rings removed** — Always replace with visible outline (don't use outline: none)
5. **Animations ignoring reduced-motion** — Check @media (prefers-reduced-motion: reduce)
6. **Mobile menu z-index issues** — Set navbar z-100, mobile-menu z-99
7. **Carousel images not optimized** — Test with Lighthouse before launch
8. **Color contrast failing in dark mode** — Test both modes independently
9. **Text too small on mobile** — Use 16px min for body text (prevents iOS auto-zoom)
10. **Unoptimized Google Fonts** — Use font-display: swap, preload only critical weights

---

## Resources

- **Design Spec:** `/docs/NAVBAR_CAROUSEL_DESIGN_SPEC.md`
- **Validation Report:** `/docs/UI_UX_VALIDATION_REPORT.md`
- **Google Fonts:** https://fonts.google.com/share?selection.family=Cormorant:wght@400;500;600;700|Montserrat:wght@300;400;500;600;700
- **WebAIM Contrast:** https://webaim.org/resources/contrastchecker/
- **MDN Backdrop Filter:** https://developer.mozilla.org/en-US/docs/Web/CSS/backdrop-filter
- **WCAG 2.1 Guidelines:** https://www.w3.org/WAI/WCAG21/quickref/

---

## Getting Help

**If you're stuck:**
1. Check the main design spec for detailed specifications
2. Review the validation report for anti-patterns to avoid
3. Look at the responsive breakpoint table for device-specific behavior
4. Run accessibility audit (axe DevTools) to catch WCAG violations
5. Use Lighthouse for performance issues

---

**Next Step:** Start with Phase 1 (Navbar) — Create `/parts/navbar.html` with semantic HTML structure.

**Estimated Timeline:** 4-5 weeks for all phases (navbar → carousel → integration → optimization)
