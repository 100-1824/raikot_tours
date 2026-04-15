# Raikot Tours Design System - Quick Reference
## One-Page Cheat Sheet for Developers

**Last Updated:** 2026-04-14  
**Full Documentation:** See `DESIGN_ENHANCEMENT_RECOMMENDATIONS.md`

---

## Color Palette

### Dark Mode (Primary)

```
Background:
  --bg-dark:       #0f172a  (Navbar, primary)
  --bg-elevated:   #1e293b  (Cards)
  --bg-hover:      #2a3a52  (Card hover)

Text:
  --text-primary:  #ffffff         (Main text, 7:1 ratio)
  --text-secondary:#e0e8f0         (Body text, 4.5:1 ratio)
  --text-tertiary: #a0afc0         (Muted, 3:1 ratio)

Accents:
  --gold-primary:  #d4af37  (CTA buttons, highlights)
  --gold-dark:     #c9a227  (Hover state)
  --teal-primary:  #20C997  (Links, secondary actions)
  --teal-light:    #06B6D4  (Hover on teal)
  --teal-dark:     #0D9488  (Active on teal)

Borders:
  --border-strong: rgba(255,255,255,0.10)
  --border-subtle: rgba(255,255,255,0.06)

Status:
  --success:       #10b981
  --warning:       #f59e0b
  --error:         #ef4444
  --info:          #3b82f6
```

### Contrast Ratios (WCAG AAA)

| Text | Background | Ratio | Status |
|------|-----------|-------|--------|
| #ffffff | #0f172a | **AUDIT** | Primary text |
| #e0e8f0 | #0f172a | **AUDIT** | Secondary text |
| #0f172a | #d4af37 | **AUDIT** | Gold button text |

**Action:** Run WebAIM Contrast Checker on all combinations before launch.

---

## Typography

```
Serif (Headlines):     Cardo, Georgia, serif
Sans-serif (Body):     Inter, Segoe UI, Roboto, sans-serif

Sizes:
  H1:     48px @ 600 weight, 1.2 line-height
  H2:     36px @ 600 weight, 1.25 line-height
  H3:     28px @ 600 weight, 1.3 line-height
  Body:   16px @ 400 weight, 1.6 line-height
  Small:  14px @ 400 weight, 1.5 line-height
  Label:  12px @ 500 weight, uppercase, +3px letter-spacing

Responsive:
  Mobile (< 640px):  Scale down 15-20%
  Desktop (1024px+): Full size
```

### Font Hierarchy

- **Headlines:** Serif (Cardo) — elegant, premium
- **Body:** Sans-serif (Inter) — clean, readable
- **Labels:** Sans-serif uppercase — clear, functional

---

## Spacing

```
Base: 8px increments

Scale:
  xs:    4px
  sm:    8px
  md:   12px
  lg:   16px
  xl:   20px
  2xl:  24px
  3xl:  32px
  4xl:  40px
  5xl:  48px
  6xl:  64px

Common Usage:
  Padding (component):   16-32px
  Margin (section):      40-80px
  Gap (flex/grid):       12-24px
  Border radius:         8-16px
```

---

## Animation & Motion

```
Durations:
  Micro (button hover):        150ms
  Fast (standard transition):  200ms
  Normal (smooth action):      300ms
  Medium (page transition):    400ms
  Slow (scroll reveal):        600ms
  Entrance (hero sequence):    800ms

Easing:
  Spring (premium feel):    cubic-bezier(0.34, 1.56, 0.64, 1)
  Smooth (standard UI):     cubic-bezier(0.34, 0.1, 0.64, 1)
  Exit (quick response):    cubic-bezier(0.24, 0, 0.82, 0.01)

Guidelines:
  ✓ Animate: transform, opacity (GPU accelerated)
  ✗ Don't animate: width, height, left, top, padding
  ✓ Stagger multiple elements: 50ms between items
  ✓ Exit animations: 60-70% of entrance duration
  ✓ Respect prefers-reduced-motion in all animations
```

---

## Responsive Breakpoints

```
xs:   0-320px      (Extra small phones)
sm:   320-640px    (Small phones)
md:   640-1024px   (Tablets)
lg:   1024-1280px  (Laptops)
xl:   1280-1536px  (Desktops)
2xl:  1536px+      (Large desktops)

Mobile-first approach:
  1. Style for mobile (default)
  2. @media (min-width: 640px) {} for tablet up
  3. @media (min-width: 1024px) {} for desktop up
```

---

## Component States

### Button (Primary - Gold CTA)

```
Default:
  BG: #d4af37
  Text: #0f172a
  Padding: 12px 28px
  Border-radius: 8px
  Min-height: 44px (mobile)

Hover:
  BG: #c9a227
  Transform: translateY(-2px) scale(1.02)
  Box-shadow: 0 0 30px rgba(212, 175, 55, 0.5)
  Duration: 200ms

Active:
  BG: #c9a227
  Transform: translateY(-1px)
  Box-shadow: 0 5px 15px rgba(0,0,0,0.2)

Focus:
  Outline: 2px solid #d4af37
  Outline-offset: 2px
  Box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.3)

Disabled:
  Opacity: 0.5
  Pointer-events: none
  Cursor: not-allowed
```

### Button (Secondary - Teal)

```
Default:
  BG: transparent
  Border: 1px solid #20C997
  Text: #20C997

Hover:
  BG: rgba(32, 201, 151, 0.1)
  Text: #06B6D4
  Border: #06B6D4

Focus:
  Outline: 2px solid #d4af37
```

### Card

```
Default:
  BG: #1e293b
  Border: 1px solid rgba(255,255,255,0.06)
  Padding: 32px
  Border-radius: 8px
  Backdrop-filter: blur(8px)

Hover:
  BG: #2a3a52
  Border: 1px solid rgba(255,255,255,0.10)
  Box-shadow: 0 20px 40px rgba(212, 175, 55, 0.15)
  Transform: translateY(-8px)
  Duration: 300ms
```

---

## Accessibility Checklist

### Focus Management
- [ ] All interactive elements focusable (tabindex not needed for semantic elements)
- [ ] Focus outline: 2px solid #d4af37 (gold)
- [ ] Focus order matches visual flow (left→right, top→bottom)
- [ ] No focus traps

### ARIA & Semantics
- [ ] Icon-only buttons have aria-label
- [ ] Form inputs have <label> with for attribute
- [ ] Error messages use role="alert" or aria-live="assertive"
- [ ] Navigation uses <nav> element
- [ ] Main content uses <main> element
- [ ] Decorative elements use aria-hidden="true"

### Color & Contrast
- [ ] Text contrast ≥7:1 for normal text (WCAG AAA)
- [ ] Text contrast ≥4.5:1 for large text (WCAG AA)
- [ ] UI component contrast ≥3:1
- [ ] Color not the only indicator (use icons/text too)
- [ ] Tested in both light and dark modes

### Touch & Mobile
- [ ] Touch targets ≥44×44px
- [ ] 8px minimum spacing between touch targets
- [ ] No keyboard-only interactions
- [ ] All controls work with touch
- [ ] Avoid nested scroll regions

### Motion
- [ ] All animations ≤400ms duration
- [ ] prefers-reduced-motion: reduce respected
- [ ] Animations have purpose (not pure decoration)
- [ ] Loading states provide feedback
- [ ] No infinite decorative animations

### Forms
- [ ] All inputs have labels (not placeholder-only)
- [ ] Error messages appear near field
- [ ] Error messages announced to screen readers
- [ ] Required fields marked with asterisk
- [ ] Form can be submitted with keyboard (Enter)

---

## Common CSS Patterns

### Focus Ring (Universal)
```css
:focus-visible {
  outline: 2px solid #d4af37;
  outline-offset: 2px;
  border-radius: inherit;
}
```

### Reduced Motion Support
```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    transition-duration: 0.01ms !important;
  }
}
```

### Smooth Transition with Motion Token
```css
.element {
  transition: all var(--motion-fast) var(--easing-smooth);
  will-change: transform, opacity;
}

.element:hover {
  transform: translateY(-2px);
  opacity: 0.9;
}
```

### Glassmorphism Effect
```css
.glass {
  background: rgba(15, 23, 42, 0.8);
  backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
}
```

### Staggered Animation
```css
.item {
  opacity: 0;
  transform: translateY(30px);
}

.item.revealed {
  animation: reveal var(--motion-slow) var(--easing-smooth) forwards;
}

.item:nth-child(1) { animation-delay: 0ms; }
.item:nth-child(2) { animation-delay: 50ms; }
.item:nth-child(3) { animation-delay: 100ms; }
```

### Touch Target Hit Area
```css
.icon-button {
  width: 24px;
  height: 24px;
  padding: 10px;  /* Extends to 44px × 44px */
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}
```

---

## Testing Shortcuts

### Quick Accessibility Test
1. **Keyboard:** Tab through entire page, verify all controls work
2. **Focus:** Every interactive element has visible focus ring
3. **Screen Reader:** Open NVDA/JAWS, read through page
4. **Motion:** Settings → Accessibility → Reduce Motion, verify no animation
5. **Contrast:** WebAIM Contrast Checker, verify ≥4.5:1 on all text

### Mobile Test
1. Open DevTools (F12)
2. Click device toggle (Ctrl+Shift+M)
3. Set width to 375px (iPhone SE)
4. Verify:
   - No horizontal scroll
   - Text readable without zoom
   - Touch targets ≥44px
   - Navigation works

### Performance Check
1. Open DevTools → Lighthouse
2. Run accessibility audit
3. Check score:
   - ✓ Target: ≥95
   - ⚠ Acceptable: ≥90
   - ✗ Needs work: <90

### Lighthouse Audit
```
✓ Accessibility ≥95
✓ Performance ≥85
✓ LCP (Largest Contentful Paint) <2.5s
✓ CLS (Cumulative Layout Shift) <0.1
```

---

## Common Mistakes to Avoid

❌ **DON'T:**
- Hardcode color values (use CSS custom properties)
- Hardcode animation durations (use motion tokens)
- Use outline: none without replacement
- Animate width/height/left/top (kills performance)
- Remove focus rings without visible alternative
- Use color as only indicator
- Ignore prefers-reduced-motion
- Use emoji as icons

✅ **DO:**
- Use --color-accent-gold for CTA colors
- Use var(--motion-fast) for durations
- Use focus-visible for focus styling
- Animate transform/opacity only
- Provide visible focus indicator (2px outline)
- Pair color with icon/text for meaning
- Wrap animations in @media (prefers-reduced-motion: reduce)
- Use SVG or icon fonts for icons

---

## File Organization

```
assets/css/
├── design-system/
│   ├── _tokens.css          ← Colors, spacing, typography
│   ├── _motion.css          ← Animation durations
│   ├── _dark-mode.css       ← Dark theme overrides
│   └── _accessibility.css   ← Focus states, reduced-motion
├── components/
│   ├── navbar.css
│   ├── button.css
│   ├── card.css
│   └── ...
└── style.css                ← Main import file
```

---

## Quick Links

- **Full Design System:** `docs/DESIGN_ENHANCEMENT_RECOMMENDATIONS.md`
- **Implementation Tasks:** `docs/DESIGN_IMPLEMENTATION_CHECKLIST.md`
- **Dark Mode Tokens:** `docs/DARK_MODE_TOKENS.md`
- **Component Library:** `docs/COMPONENT_LIBRARY.md` (coming soon)
- **Accessibility Guide:** `docs/ACCESSIBILITY_TESTING.md` (coming soon)

---

## Need Help?

**Contrast not meeting requirements?**
→ Use WebAIM Contrast Checker: webaim.org/resources/contrastchecker

**Animation feels janky?**
→ Check Chrome DevTools Performance tab, ensure 60 FPS

**Accessibility issues?**
→ Run Lighthouse audit, check WCAG 2.1 AA requirements

**Screen reader not announcing element?**
→ Add aria-label or aria-describedby

**Focus ring not visible?**
→ Verify outline: 2px solid color + outline-offset: 2px

---

**Version:** 1.0  
**Updated:** 2026-04-14  
**Status:** Ready for Implementation

