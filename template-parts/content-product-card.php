<div class="card">
    <div class="card-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
        <?php else : ?>
            <div class="card-image-placeholder"></div>
        <?php endif; ?>
    </div>
    <p class="card-price">$<?php echo esc_html(get_post_meta(get_the_ID(), '_price', true)); ?></p>
    <h2 class="card-title"><?php the_title(); ?></h2>
    <a href="<?php the_permalink(); ?>" class="card-btn">View More Info</a>
</div>
