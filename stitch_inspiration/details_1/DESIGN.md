# Design System Document: Expedition Luxury

## 1. Overview & Creative North Star: "The Alpenglow Editorial"
This design system is anchored in the concept of **"The Alpenglow Editorial."** It rejects the sterile, boxy nature of standard travel platforms in favor of a high-end, immersive experience that mirrors the transition of light on a mountain face. We are not building a utility; we are curating an aspiration.

The "Alpenglow" approach breaks the "template" look through:
*   **Intentional Asymmetry:** Overlapping image-to-text ratios that mimic a high-fashion magazine layout.
*   **Cinematic Depth:** Utilizing the "Golden Hour" as a functional lighting source, where UI elements don't just sit on a background—they react to the light behind them.
*   **Atmospheric Layering:** Moving away from rigid grids to allow photography to "breathe" through glassmorphism and tonal shifts.

---

## 2. Colors: Depth Over Definition
Our palette is a dialogue between the depths of a mountain night (`primary`) and the fleeting brilliance of a summit sunrise (`secondary`).

### The Palette
*   **Primary (Luxury Navy):** `#020617` (Used as the anchor for high-contrast moments).
*   **Accent (Empire Gold):** `#d4af37` (Reserved for critical micro-interactions and precision signaling).
*   **The Signature Gradient:** A transition from `#c5a059` to `#f7ef8a` to `#aa8913`. Use this sparingly to signify "The Peak" of a user's journey (CTAs, Featured Badges).

### The "No-Line" Rule
**Explicit Instruction:** Do not use 1px solid borders to define sections. We define boundaries through environmental shifts.
*   Instead of a line, transition from `surface` (`#f7f9fb`) to `surface-container-low` (`#f2f4f6`). 
*   Content groups are separated by generous white space, never by strokes.

### Surface Hierarchy & Nesting
Treat the UI as physical layers of frosted glass and fine vellum.
*   **Base:** `surface` for the widest background.
*   **Nesting:** Place a `surface-container-lowest` (pure white `#ffffff`) card on top of a `surface-container` (`#eceef0`) background to create a soft, natural lift.

### The "Glass & Gradient" Rule
To achieve the premium "Expedition" feel, any floating navigation or modal must use **Glassmorphism**. Use a semi-transparent `surface-variant` with a `backdrop-blur` of 12px–20px. This allows the cinematic "Golden Hour" photography to bleed through the UI, maintaining a sense of place.

---

## 3. Typography: The Editorial Voice
We use a high-contrast scale to separate the "Narrative" from the "Logistics."

*   **Display & Headlines (Newsreader/Playfair Display):** These are our "Hero" moments. Use `display-lg` (3.5rem) with tight letter-spacing for titles. This serif choice conveys heritage, authority, and the timelessness of the mountains.
*   **Body & Labels (Inter):** The "Logistics." Inter provides a crisp, neutral counterpoint to the serif’s personality. Use `body-md` (0.875rem) for most descriptions to maintain an air of sophisticated minimalism.
*   **Hierarchy Note:** Always lead with the serif for emotive storytelling, then transition to the sans-serif for data-heavy expedition details (elevations, dates, equipment).

---

## 4. Elevation & Depth: Tonal Layering
Traditional shadows are too heavy for this aesthetic. We use **Ambient Atmosphere.**

*   **The Layering Principle:** Depth is achieved by stacking `surface-container` tiers. A `surface-container-high` element should feel like a closer "peak" than the `surface-container-low` valleys beneath it.
*   **Ambient Shadows:** If a shadow is required for a floating CTA, use the `on-surface` color at 4% opacity with a massive 40px blur. It should feel like a soft cloud shadow, not a drop shadow.
*   **The "Ghost Border" Fallback:** If accessibility requires a border, use `outline-variant` at 15% opacity. High-contrast outlines are strictly forbidden; they shatter the "luxury" illusion.
*   **Glassmorphism:** For overlays, use `surface-container-lowest` at 70% opacity with a blur. This creates a "frosted summit" effect that feels integrated with the background photography.

---

## 5. Components

### Buttons: The Golden Peak
*   **Primary:** Uses the Signature Gold Gradient. No border. Text is `on-secondary-fixed` (`#241a00`). Shape is `md` (0.375rem).
*   **Secondary:** Ghost style. No background. `outline-variant` (20% opacity) border. Text in `primary`.
*   **Tertiary:** Text-only in `primary` with a 2px underline in `secondary_fixed`.

### Cards & Lists: The Infinite Scroll
*   **Cards:** Forbid divider lines. Separate content using the Spacing Scale (minimum 24px). Use `surface-container-lowest` backgrounds. 
*   **Lists:** Leading elements (icons) should be in `secondary`. Trailing elements (actions) should be subtle `on-surface-variant`.

### Input Fields: Minimalist Precision
*   **Field:** Transparent background with a `surface-dim` bottom-border only (2px). 
*   **Focus State:** The bottom border transitions to the Gold Gradient. 

### Signature Component: "The Expedition Compass"
A bespoke navigation element or progress tracker for booking journeys. It should utilize a thin `outline-variant` circle, `Glassmorphism` background, and `secondary` (Gold) accents to indicate the user's current "altitude" in the booking process.

---

## 6. Do's and Don'ts

### Do:
*   **Do** use asymmetrical layouts where images bleed off the edge of the screen.
*   **Do** use "Golden Hour" photography (warm oranges, deep blues, long shadows) as the primary visual driver.
*   **Do** prioritize white space over content density. If a screen feels full, it isn't "Luxury."

### Don't:
*   **Don't** use 100% black. Use `primary` (`#020617`) for deep tones.
*   **Don't** use standard "Material Design" shadows. They feel cheap in a bespoke context.
*   **Don't** use dividers or 1px strokes to separate sections. Let the background tones do the work.
*   **Don't** use "Expedition Luxury" as a reason to sacrifice readability. Ensure `on-surface` text meets AA contrast on all `surface` containers.