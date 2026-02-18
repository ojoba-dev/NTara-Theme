<?php get_header(); ?>

<div class="page-wrapper">

    <?php get_sidebar(); ?>

    <main class="main-content">

        <form class="sort-bar" method="get">
            <label for="ntara-sort">Sort By</label>
            <?php $current_sort = isset($_GET['sort']) ? sanitize_key($_GET['sort']) : ''; ?>
            <select id="ntara-sort" name="sort">
                <option value="">Sort</option>
                <option value="az"   <?php selected($current_sort, 'az'); ?>>A - Z</option>
                <option value="za"   <?php selected($current_sort, 'za'); ?>>Z - A</option>
                <option value="low"  <?php selected($current_sort, 'low'); ?>>Low-high price</option>
                <option value="high" <?php selected($current_sort, 'high'); ?>>High-low price</option>
            </select>
        </form>

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
