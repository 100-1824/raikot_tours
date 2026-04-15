# Raikot Tours Premium UI Architecture

## Executive Summary

This document provides comprehensive specifications for transforming Raikot Tours from a functional WordPress theme into a premium, cinematic luxury expedition experience. The design emphasizes glassmorphism, staggered animations, scroll-triggered reveals, and premium interactive effects.

---

## 1. Current State Analysis

### WordPress Theme Structure
- **Theme**: TwentyTwentyfour (block-based theme)
- **Header**: `parts/header.html` (basic block layout with logo and navigation)
- **Footer**: `parts/footer.html` (references pattern template)
- **Assets**: CSS in `assets/css/`, JS ready in `assets/js/`
- **Functions**: `functions.php` (minimal, ready for asset enqueueing)

### Base Design Elements
- Block-based layout system
- Existing Tailwind CSS classes available
- Color palette ready for customization
- Typography stack defined in theme.json

---

## 2. Navbar Architecture

### Layout Structure
**3-Column Grid Layout**
```
[Logo] [Navigation Links] [Action Buttons]
1fr    2fr                1fr
```

### Composition

**Left Column - Brand Logo**
- Site logo (60-80px width)
- Maintains consistent branding
- Left-aligned padding

**Center Column - Navigation Links**
- Destinations, The Experience, About Us, Journal
- Flexbox centered layout
- Subtle underline animation on hover
- Animation: Expanding from center (cubic-bezier(0.34, 1.56, 0.64, 1))
- Duration: 250ms

**Right Column - Action Buttons**
- Secondary Button: "Client Portal" / "Log In"
  - Outline style: border + transparent background
  - Hover: subtle border color shift to gold
  - Padding: 10px 20px
  
- Primary Button: "Book Expedition" / "Inquire Now"
  - Solid gold background (#d4af37)
  - Dark text (slate-900)
  - Hover: scale-105, drop-shadow with gold glow
  - Padding: 12px 28px
  - Font weight: 600

### Scroll Behavior (Glassmorphism)

**At Page Top (0-50px scroll)**
- Background: Transparent (rgba(0, 0, 0, 0))
- Backdrop blur: None
- Text: Fully visible

**During Scroll (50px+ scroll)**
- Background: `rgba(15, 23, 42, 0.8)` (slate-900 with 80% opacity)
- Backdrop blur: 16px (`backdrop-blur-md`)
- Border bottom: 1px solid rgba(215, 175, 95, 0.1) (subtle gold divider)
- Box shadow: 0 4px 6px rgba(0, 0, 0, 0.1)
- Position: sticky to viewport top
- Transition duration: 400ms (ease-in-out)

### Responsive Behavior

**Desktop (1024px+)**
- Full 3-column layout
- All navigation links visible
- Both action buttons visible

**Tablet (768px - 1023px)**
- Hamburger menu icon appears
- Navigation collapses into drawer
- Action buttons stack vertically in drawer

**Mobile (< 768px)**
- Hamburger menu (3 horizontal lines)
- Click to open/close drawer
- Drawer slides from right side
- Navigation links full width in drawer
- Buttons stack and expand to full drawer width
- Background: semi-transparent dark overlay

### CSS Classes (BEM Methodology)
```
.navbar
.navbar__container
.navbar__logo
.navbar__nav
.navbar__nav-link
.navbar__nav-link--active
.navbar__actions
.navbar__button
.navbar__button--secondary
.navbar__button--primary
.navbar__hamburger
.navbar--sticky
.navbar--glassmorphic
```

---

## 3. Hero Section Design

### Layout & Typography

**Headline Sequence:**
1. "PREMIUM EXPEDITIONS" (overline)
   - Font size: 12px-14px
   - Letter spacing: +3px (tracking-widest)
   - Color: Gold (#d4af37)
   - Font weight: 600
   - Text transform: UPPERCASE

2. "The Earth Breathes" (main headline)
   - Font: Serif (Cardo, Georgia, serif)
   - Font size: 64px-72px (desktop), 36px-42px (mobile)
   - Font weight: 600
   - Line height: 1.2
   - Color: White (#ffffff)

3. Subtext (description)
   - Font: Sans-serif (Inter, Segoe UI, sans-serif)
   - Font size: 16px-18px
   - Color: rgba(255, 255, 255, 0.9)
   - Max width: 600px

4. Action Buttons (EXPLORE, BESPOKE)
   - Font: Sans-serif, 16px
   - Font weight: 600
   - Spacing between buttons: 16px

### Staggered Animation Sequence

**Animation Timeline (on page load):**
- 0ms: "PREMIUM EXPEDITIONS" starts fade-in + slide-up
- 200ms: "The Earth Breathes" starts fade-in + slide-up
- 400ms: Subtext starts fade-in + slide-up
- 600ms: Buttons start fade-in + scale-up

**Animation Details:**
- Type: Fade-in + translateY
- Start position: translateY(30px)
- End position: translateY(0px)
- Opacity: 0 → 1
- Easing: cubic-bezier(0.34, 1.56, 0.64, 1) (spring feel)
- Duration: 800ms
- will-change: transform, opacity (for GPU acceleration)

### Button Hover States

**EXPLORE / BESPOKE Buttons (Primary Gold)**
- Default: background #d4af37, text #0f172a
- Hover effects:
  - Background: Shift to darker gold (#c9a227) over 300ms
  - Transform: scale(1.05)
  - Box-shadow: 0 0 30px rgba(212, 175, 55, 0.5) (gold glow)
  - Drop shadow: 0 10px 25px rgba(0, 0, 0, 0.3)

**Animation easing**: cubic-bezier(0.34, 0.1, 0.64, 1)

### Container & Spacing
- Full viewport height (100vh)
- Background image: Hero photo (dark, cinematic)
- Background overlay: rgba(0, 0, 0, 0.4) (dark gradient)
- Padding: 80px horizontal, centered vertically
- Max content width: 1200px

---

## 4. Interactive Middle Section ("Navigating With Elegance")

### Scroll-Triggered Reveal System

**Trigger Points:**
- Heading: Reveal when 60% visible in viewport
- Cards: Reveal each card when 50% visible
- Stagger: 100ms between each card reveal

**Animation Details:**
- Type: Fade-in + slide-up
- Start: opacity 0, translateY(40px)
- End: opacity 1, translateY(0px)
- Duration: 600ms
- Easing: cubic-bezier(0.34, 0.1, 0.64, 1)
- Delay: 0ms, 100ms, 200ms, 300ms (for multiple cards)

**Implementation**: Intersection Observer API
```javascript
const options = {
  root: null,
  threshold: 0.5,
  rootMargin: '0px'
};
```

### Card Hover Interactions

**Feature Cards** (Safety Protocols, Sustainability, etc.)
- Default state: Dark background, gold accent
- Hover effects (duration: 300ms):
  - Transform: translateY(-8px) (lift effect)
  - Box-shadow: 0 20px 40px rgba(212, 175, 55, 0.3) (gold glow)
  - Border color: rgba(212, 175, 55, 0.3) (subtle gold border)
  - Background: Slight lightening (opacity change)

**Card Structure:**
- Number/Icon: Left side, large (64px)
- Title: Below icon, serif font
- Description: Body text, muted color
- Padding: 32px
- Border radius: 8px
- Min height: 200px

### Icon & Number Polish

**Gold Numbers** ("01.", "02.", etc.)
- Default: Gold (#d4af37), font size 48px, opacity 0.8
- Hover: opacity 1, slight scale-up (1.05)
- Transition: 250ms ease-in-out
- Font: Serif, bold

**Icons** (SVG or icon fonts)
- Default: Gold (#d4af37), 40px
- Hover: Slight rotation (5-10deg), color pop to lighter gold
- Transition: 250ms
- transform-origin: center

---

## 5. Footer Transitions & Polish

### Section Divider

**Transition from Dark Section to Footer:**
- Approach: Subtle gradient divider
- Height: 1-2px
- Gradient: rgba(212, 175, 55, 0) → rgba(212, 175, 55, 0.3) → rgba(212, 175, 55, 0)
- Smooth fade-in-out
- No harsh color breaks

### Footer Layout

**Structure:**
- 3-column grid on desktop, stacked on mobile
- Columns: Logo + Brand, Quick Links, Popular Tours
- Background: Warm dark (slate-900 or similar)
- Padding: 60px horizontal, 40px vertical

**Column 1: Logo & Brand**
- Site logo (60-80px)
- Brand tagline (muted text)
- Social icons (optional)
- Vertical center alignment with text columns

**Columns 2 & 3: Links**
- List of links
- Titles in gold (#d4af37)
- Link items in muted gray

### Interactive Link Hover Effects

**Quick Links & Popular Tours (text links)**
- Default: Muted gray text
- Hover effects (duration: 200ms):
  - Color shift: Gray → Gold (#d4af37)
  - Transform: translateX(4px) (subtle right movement)
  - Text decoration: None → underline (optional)
  - Easing: cubic-bezier(0.34, 0.1, 0.64, 1)

### Footer Text Hierarchy

**Muted Copyright Text** (bottom)
- Font size: 12px-14px
- Color: rgba(255, 255, 255, 0.5) (50% opacity)
- Fully accessible (meets WCAG AA color contrast)
- Padding: 20px horizontal, 10px vertical

---

## 6. Design System

### Color Palette

**Primary Accent**
- Gold: #d4af37 (buttons, highlights, accents)
- Dark Gold: #c9a227 (hover state)
- Light Gold: #e8c547 (active/focus states)

**Brand Warmth**
- Warm Tan: #c7a88d (secondary accent, borders)
- Light Tan: #e6d5c3 (backgrounds, light accents)

**Neutral**
- Dark Slate: #0f172a (navbar, dark backgrounds)
- Slate: #1e293b (cards, containers)
- Light Gray: #e2e8f0 (borders)
- Muted Gray: #94a3b8 (muted text)

**Text**
- Primary: #ffffff (white text on dark)
- Secondary: rgba(255, 255, 255, 0.9)
- Muted: rgba(255, 255, 255, 0.6)

### Typography Stack

**Serif Font** (headlines)
```css
font-family: 'Cardo', 'Georgia', 'Garamond', serif;
```

**Sans-serif Font** (body text, navigation)
```css
font-family: 'Inter', 'Segoe UI', 'Roboto', '-apple-system', sans-serif;
```

**Font Weights**
- Regular: 400
- Medium: 500
- Semibold: 600
- Bold: 700

### Spacing Scale (8px base)
- 8px, 12px, 16px, 20px, 24px, 32px, 40px, 48px, 60px, 80px

### Z-Index Stacking
```
Navbar (sticky): 40
Hamburger menu overlay: 30
Modals/Overlays: 50
Tooltips: 60
```

---

## 7. Responsive Breakpoints

**Mobile-first approach:**

| Breakpoint | Device | Width |
|------------|--------|-------|
| xs | Extra small | 0-320px |
| sm | Small phones | 320-640px |
| md | Tablets | 640-1024px |
| lg | Large tablets/laptops | 1024-1280px |
| xl | Desktops | 1280-1536px |
| 2xl | Large desktops | 1536px+ |

### Responsive Adjustments
- **Font sizes**: Scale down 15-20% on mobile
- **Padding/margins**: Reduce by 25-50% on mobile
- **Grid columns**: 1 column on mobile, 2-3 on tablet, 3+ on desktop
- **Navigation**: Hamburger on mobile/tablet, horizontal on desktop
- **Buttons**: Full width on mobile, inline on desktop

---

## 8. Animation Specifications

### Easing Functions

**Primary easing** (premium feel):
```css
cubic-bezier(0.34, 1.56, 0.64, 1) /* Spring bounce */
```

**Smooth easing** (standard transitions):
```css
cubic-bezier(0.34, 0.1, 0.64, 1) /* Ease in-out */
```

**Linear** (constant speed):
```css
linear /* 0.0, 0.0, 1.0, 1.0 */
```

### Animation Durations

| Use Case | Duration |
|----------|----------|
| Hover effects (buttons) | 150-250ms |
| Fade-in transitions | 300-600ms |
| Staggered sequences | 200ms between items |
| Scroll reveals | 600-800ms |
| Navbar scroll effect | 400ms |

### Performance Considerations

**GPU Acceleration Properties:**
- `transform` (translate, scale, rotate)
- `opacity`
- Avoid animating: width, height, left, top, padding, margin, background

**will-change Optimization:**
```css
.element-to-animate {
  will-change: transform, opacity;
  /* Apply after animation completes: will-change: auto; */
}
```

**Frame Rate Target**: 60 FPS
- Throttle scroll events
- Use Intersection Observer (not scroll listeners)
- Avoid layout thrashing

---

## 9. Glassmorphism Details

### Technical Implementation

**CSS Properties:**
```css
backdrop-filter: blur(16px);
background: rgba(15, 23, 42, 0.8); /* slate-900 with 80% opacity */
border: 1px solid rgba(212, 175, 55, 0.1); /* subtle gold border */
border-radius: 12px;
```

**Browser Support:**
- Modern browsers (Chrome 76+, Firefox 103+, Safari 9+)
- Fallback: Solid background color without blur

### Color Combinations

**Dark glassmorphic backgrounds:**
- Base: rgba(15, 23, 42, 0.7-0.9)
- Border: rgba(212, 175, 55, 0.1-0.3)
- Hover: rgba(212, 175, 55, 0.2)

**Light glassmorphic backgrounds:**
- Base: rgba(255, 255, 255, 0.7-0.9)
- Border: rgba(212, 175, 55, 0.2-0.4)
- Hover: rgba(212, 175, 55, 0.3)

---

## 10. Accessibility Requirements

### WCAG 2.1 AA Compliance

**Color Contrast:**
- Text on background: 4.5:1 minimum
- Large text (18pt+): 3:1 minimum
- UI components: 3:1 minimum

**Focus States:**
- All interactive elements: Visible focus ring
- Focus color: Gold (#d4af37) or high-contrast outline
- Focus ring width: 2-3px
- No outline removal without replacement

**Keyboard Navigation:**
- Tab order follows visual flow
- Skip navigation links present
- All interactive elements accessible via keyboard

**Motion & Animation:**
```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

**Screen Reader Support:**
- Semantic HTML (nav, main, footer, article)
- ARIA labels for icons and interactive elements
- Image alt text on all images
- Hidden decorative elements: `aria-hidden="true"`

---

## 11. CSS Class Naming Conventions

### BEM Methodology

**Block**: `.navbar`, `.hero`, `.card`
**Element**: `.navbar__logo`, `.card__title`
**Modifier**: `.button--primary`, `.navbar--sticky`

### Full Class Structure Example

```
.navbar {} /* Block */
.navbar--sticky {} /* Block modifier */
.navbar__container {} /* Element */
.navbar__logo {} /* Element */
.navbar__nav {} /* Element */
.navbar__nav-link {} /* Element */
.navbar__nav-link--active {} /* Element modifier */
.navbar__actions {} /* Element */
.navbar__button {} /* Element */
.navbar__button--primary {} /* Element modifier */
```

---

## 12. Performance Targets

**Lighthouse Scores:**
- Performance: 85+
- Accessibility: 95+
- Best Practices: 90+
- SEO: 95+

**Core Web Vitals:**
- LCP (Largest Contentful Paint): < 2.5s
- FID (First Input Delay): < 100ms
- CLS (Cumulative Layout Shift): < 0.1

**File Size Targets:**
- CSS (animations): < 15KB (gzipped)
- JS (scroll animations): < 10KB (gzipped)
- Total additional assets: < 25KB

---

## 13. Implementation Roadmap

### Phase 1: Navbar & Header (Week 1)
- [ ] Restructure header.html to 3-column layout
- [ ] Implement glassmorphism CSS
- [ ] Add responsive hamburger menu
- [ ] Create navbar scroll listener
- [ ] Test on all breakpoints

### Phase 2: Hero Section (Week 2)
- [ ] Style hero typography (serif, letter-spacing)
- [ ] Implement staggered animations (CSS keyframes)
- [ ] Create button hover effects
- [ ] Add animation performance optimizations
- [ ] Test animation smoothness

### Phase 3: Interactive Sections (Week 3)
- [ ] Implement Intersection Observer system
- [ ] Create card hover animations
- [ ] Build icon/number polish effects
- [ ] Add scroll-triggered reveals
- [ ] Test performance on slow devices

### Phase 4: Footer & Polish (Week 4)
- [ ] Restructure footer.html layout
- [ ] Implement gradient divider
- [ ] Add link hover animations
- [ ] Final responsive testing
- [ ] Performance audit & optimization

---

## 14. Code Quality Standards

- Clean, modular CSS (max 500 lines per file)
- Comprehensive comments for complex animations
- No layout thrashing in scroll listeners
- GPU-accelerated properties only
- Semantic HTML structure
- WCAG 2.1 AA compliance throughout
- Cross-browser tested (Chrome, Firefox, Safari, Edge)

---

**Document prepared by: UI/UX Architect Agent**
**Date: 2026-04-14**
**Status: Ready for implementation**
