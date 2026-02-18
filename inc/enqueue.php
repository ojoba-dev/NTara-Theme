<?php

function ntara_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary'            => 'Primary Navigation',
        'sidebar_categories' => 'Sidebar Categories',
    ]);
}
add_action('after_setup_theme', 'ntara_theme_setup');

// Frontend styles & scripts — Gulp compila a dist/assets/
function ntara_enqueue_assets() {
    $ver  = wp_get_theme()->get('Version');
    $dist = get_template_directory_uri() . '/dist/assets';

    wp_enqueue_style('ntara-common', $dist . '/css/common.css', [],              $ver);
    wp_enqueue_style('ntara-public', $dist . '/css/public.css', ['ntara-common'], $ver);

    wp_enqueue_script('ntara-public-js', $dist . '/js/public.min.js', [], $ver, true);
}
add_action('wp_enqueue_scripts', 'ntara_enqueue_assets');

// Admin styles & scripts — Gulp compila a dist/assets/
function ntara_enqueue_admin_assets() {
    $ver  = wp_get_theme()->get('Version');
    $dist = get_template_directory_uri() . '/dist/assets';

    wp_enqueue_style('ntara-common', $dist . '/css/common.css', [],             $ver);
    wp_enqueue_style('ntara-admin',  $dist . '/css/admin.css',  ['ntara-common'], $ver);

    wp_enqueue_script('ntara-admin-js', $dist . '/js/admin.min.js', [], $ver, true);
}
add_action('admin_enqueue_scripts', 'ntara_enqueue_admin_assets');
