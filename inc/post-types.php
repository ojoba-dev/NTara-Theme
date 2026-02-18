<?php

function ntara_register_product_cpt() {
    register_post_type('product', [
        'label'       => 'Products',
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => ['slug' => 'store'],
        'supports'    => ['title', 'editor', 'thumbnail'],
        'menu_icon'   => 'dashicons-cart',
    ]);
}
add_action('init', 'ntara_register_product_cpt');

function ntara_register_product_taxonomy() {
    register_taxonomy('product_category', 'product', [
        'label'        => 'Product Categories',
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => ['slug' => 'product-category'],
        'show_in_menu' => true,
    ]);
}
add_action('init', 'ntara_register_product_taxonomy');
