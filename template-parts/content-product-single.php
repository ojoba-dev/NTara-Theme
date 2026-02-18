<article class="single-product">
    <h1 class="product-title"><?php the_title(); ?></h1>

    <?php if (has_post_thumbnail()) : ?>
        <div class="product-image">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>

    <p class="card-price">$<?php echo esc_html(get_post_meta(get_the_ID(), '_price', true)); ?></p>

    <div class="product-description">
        <?php the_content(); ?>
    </div>
</article>
