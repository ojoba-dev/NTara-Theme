Ntara Store - WordPress Theme
==============================
Version:     1.0.0
Author:      Ntara Partners
Description: Custom WordPress theme for Ntara Store.


STRUCTURE
---------
style.css              Theme header (required by WordPress)
functions.php          Loads all /inc/ files
index.php              Fallback template
screenshot.png         Admin thumbnail (880x660 px)

header.php             Site header with top bar, logo, nav, search
footer.php             Site footer with columns and social links
sidebar.php            Sidebar with search and category menu

archive-product.php    Product listing page (grid + sort)
single-product.php     Single product page
search.php             Search results page

template-parts/
  content-product-card.php    Product card component (used in grid)
  content-product-single.php  Single product content
  content-no-results.php      Empty state message

inc/
  enqueue.php    Theme setup, stylesheet & script registration
  post-types.php Custom post type (product) and taxonomy (product_category)
  meta-boxes.php Price meta box for products
  queries.php    Query modifications (sort by title / price)
  filters.php    Additional WordPress filters

assets/
  css/main.css         Reset and base styles
  css/layout.css       Structural layout (header, sidebar, footer)
  css/components.css   UI components (cards, sort bar, pagination)
  js/main.js           Theme JavaScript (sort auto-submit)
  images/              Theme images


SETUP
-----
1. Upload the theme folder to /wp-content/themes/
2. Activate in WordPress: Appearance > Themes
3. Go to Appearance > Menus:
   - Assign a menu to "Primary Navigation"   (header nav)
   - Assign a menu to "Sidebar Categories"   (sidebar links)
4. Add products under Products > Add New
5. Enter a price in the "Price" meta box on each product
6. (Optional) Add a screenshot.png (880x660 px) for the admin preview


REQUIREMENTS
------------
WordPress 5.0+
PHP 7.4+
