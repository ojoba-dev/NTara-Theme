<?php get_header(); ?>

<div class="page-wrapper">

    <?php get_sidebar(); ?>

    <main class="main-content">
        <h1 class="product-title">
            Search results for: <em><?php echo get_search_query(); ?></em>
        </h1>

        <div class="grid">
            <?php if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'product-card');
                endwhile;
            else :
                get_template_part('template-parts/content', 'no-results');
            endif; ?>
        </div>

        <?php the_posts_pagination(['mid_size' => 2]); ?>
    </main>

</div>

<?php get_footer(); ?>
