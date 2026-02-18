Ntara Store — WordPress Theme
==============================
Version:  1.0.0
Author:   Osman Jolón


PROJECT STRUCTURE
-----------------

ntara-store/
├── style.css                          WP theme header (required)
├── functions.php                      Loads everything in /inc/
├── index.php                          Fallback template
├── header.php                         Top bar, logo, nav, search
├── footer.php                         Footer columns + social links
├── sidebar.php                        Search + category filter
├── archive-product.php                Store page — product grid + sort bar
├── single-product.php                 Single product
├── search.php                         Search results
├── taxonomy-product_category.php      Category archive
├── screenshot.png                     Theme preview in WP admin (880×660)
├── package.json                       Node deps
├── gulpfile.js                        Gulp config
│
├── inc/
│   ├── enqueue.php       Theme setup, styles & scripts
│   ├── post-types.php    'product' CPT + 'product_category' taxonomy
│   ├── meta-boxes.php    Price field for products
│   ├── queries.php       Category filtering & sorting logic
│   └── filters.php       Misc WP filters
│
├── template-parts/
│   ├── content-product-card.php      Product card (used in the grid)
│   ├── content-product-single.php    Single product layout
│   └── content-no-results.php        Empty state
│
├── assets/                           Source files — edit these
│   ├── less/
│   │   ├── public.less               Imports the partials below
│   │   ├── common.less               Shared base
│   │   ├── admin.less                Admin styles
│   │   └── public/
│   │       ├── _variables.less       Colors, fonts, breakpoints
│   │       ├── _reset.less           CSS reset
│   │       ├── _layout.less          Header, sidebar, footer
│   │       └── _components.less      Cards, sort bar, pagination
│   └── js/
│       └── public/
│           └── main.js               Category filter + sort
│
└── dist/                             Compiled output — don't touch this manually
    └── assets/
        ├── css/
        │   ├── common.css
        │   ├── public.css
        │   ├── admin.css
        │   └── maps/
        └── js/
            └── public.min.js


GETTING STARTED
---------------
You need Node.js installed first (https://nodejs.org). Then from the theme folder:

    npm install

Run that once and you're set.


GULP COMMANDS
-------------
    gulp              Build everything — LESS to CSS, JS minified
    gulp css          CSS only
    gulp js           JS only
    gulp clean        Wipe dist/ and start fresh
    npm run build     Same as gulp

Any time you change something in assets/, just run gulp again.


UPLOADING TO WORDPRESS
-----------------------
Zip the theme but leave out node_modules/ — it's massive and WordPress doesn't use it.
Make sure dist/ is included, that's where the actual compiled CSS/JS lives.

Upload via WP Admin → Appearance → Themes → Add New → Upload Theme,
or just drop the folder in /wp-content/themes/ over FTP.

Once it's active:
- Appearance → Menus → assign a menu to "Primary Navigation"
- Products → Add New to add products, fill in the Price field on each one
- Appearance → Customize → Site Identity to upload the logo
- Drop a screenshot.png (880×660) in the root if you want a preview in the theme list


WordPress Access
----------------
url:      https://red-termite-205607.hostingersite.com/wp-admin/
user:     info@ntara.com
password: Yng#yLOy2d)64DCSQn*snGKc
