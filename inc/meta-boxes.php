<?php

function ntara_add_price_meta() {
    add_meta_box('price_box', 'Price', 'ntara_price_callback', 'product');
}
add_action('add_meta_boxes', 'ntara_add_price_meta');

function ntara_price_callback($post) {
    $value = get_post_meta($post->ID, '_price', true);
    echo '<input type="text" name="ntara_price" value="' . esc_attr($value) . '" />';
}

function ntara_save_price($post_id) {
    if (isset($_POST['ntara_price'])) {
        update_post_meta($post_id, '_price', sanitize_text_field($_POST['ntara_price']));
    }
}
add_action('save_post', 'ntara_save_price');
