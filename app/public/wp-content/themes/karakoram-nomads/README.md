# Karakoram Nomads — WordPress Theme

## Sources
- **Design:**    Adventure Pakistan (adventurepakistan.com)
- **Pages:**     Karakoram Nomads (karakoramnomads.net)
- **Data:**      Raikot Tours (raikottours.pk)

## Pages Included
| Template File      | Page Name    | WordPress Page Slug |
|--------------------|--------------|---------------------|
| index.php          | Home         | (set as front page) |
| page-tours.php     | Tours        | tours               |
| page-rental.php    | Rental       | rental              |
| page-about.php     | About Us     | about               |
| page-reviews.php   | Reviews      | reviews             |
| page-contact.php   | Contact Us   | contact             |

## Installation
1. Upload this folder as a .zip to WP Admin → Appearance → Themes → Upload Theme
2. Activate the theme
3. Go to **Appearance → Menus** — create a menu and assign it to "Primary Menu"
4. Create these Pages in WP Admin → Pages → Add New:
   - "Tours" page → Template: Tours Page
   - "Rental" page → Template: Rental Page
   - "About Us" page → Template: About Us Page
   - "Reviews" page → Template: Reviews Page
   - "Contact Us" page → Template: Contact Us Page
5. Go to **Settings → Reading** → set Front page to "Home" (static page)
6. Upload your logo at **Appearance → Customize → Site Identity**

## Adding Tours
1. WP Admin → Tours → Add New
2. Add title, content, featured image
3. Set custom fields:
   - `_tour_price`      → e.g. 850
   - `_tour_duration`   → e.g. 7 Days
   - `_tour_difficulty` → e.g. Easy / Moderate / Challenging
   - `_tour_rating`     → e.g. 4.9
   - `_tour_featured`   → 1 (to show on homepage)

## Contact Info to Update
- Phone: +92 355 4518486 (search & replace in header.php + footer.php)
- Email: raikottours@gmail.com
- WhatsApp link: https://wa.me/923554518486

## Colors (Adventure Pakistan palette)
- Primary green:  #418a41
- Dark navy:      #1a2e44
- Orange CTA:     #e8510a
- Gold (stars):   #f5a623
