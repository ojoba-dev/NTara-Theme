<?php get_header(); ?>

<div class="page-wrapper">

    <?php get_sidebar(); ?>

    <main class="main-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'product-single'); ?>
        <?php endwhile; endif; ?>
    </main>

</div>

<?php get_footer(); ?>
