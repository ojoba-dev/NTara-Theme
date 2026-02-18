<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="top-bar">
    <a href="#">Contact Us</a>
    <span>|</span>
    <a href="#">Directions</a>
    <span>|</span>
    <span>217-637-2780</span>
</div>

<header class="site-header">

    <?php if (has_custom_logo()) : ?>
        <?php
        // the_custom_logo() already outputs <a href="home"><img></a>
        // so we wrap in a div to avoid nested <a> tags
        ?>
        <div class="site-logo">
            <?php the_custom_logo(); ?>
        </div>
    <?php else : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <div class="logo-circle"><em>N</em></div>
            <span class="logo-text">Ntara</span>
        </a>
    <?php endif; ?>

    <nav class="main-nav">
        <?php
        // Uses the menu assigned to "Primary Navigation" in Appearance > Menus.
        // Shows nothing if no menu is assigned.
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'fallback_cb'    => false,
        ]);
        ?>
    </nav>

    <div class="header-search">
        <form class="header-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <button type="submit" aria-label="Search">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </button>
            <input type="search" name="s" placeholder="What can we help you find?" value="<?php echo get_search_query(); ?>">
        </form>
    </div>

</header>
