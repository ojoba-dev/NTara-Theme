<?php

function ntara_modify_product_query($query) {
    if (!is_admin() && $query->is_main_query() &&
        (is_post_type_archive('product') || is_tax('product_category'))) {

        // --- Category Filter ---
        if (is_post_type_archive('product') && !empty($_GET['category'])) {
            $slugs = array_filter(array_map('sanitize_key', (array) $_GET['category']));

            if (!empty($slugs)) {
                $query->set('tax_query', [[
                    'taxonomy' => 'product_category',
                    'field'    => 'slug',
                    'terms'    => $slugs,
                    'operator' => 'IN',
                ]]);
            }
        }

        // --- Sort ---
        if (!empty($_GET['sort'])) {
            switch (sanitize_key($_GET['sort'])) {
                case 'az':
                    $query->set('orderby', 'title');
                    $query->set('order', 'ASC');
                    break;
                case 'za':
                    $query->set('orderby', 'title');
                    $query->set('order', 'DESC');
                    break;
                case 'low':
                    $query->set('meta_key', '_price');
                    $query->set('orderby', 'meta_value_num');
                    $query->set('order', 'ASC');
                    break;
                case 'high':
                    $query->set('meta_key', '_price');
                    $query->set('orderby', 'meta_value_num');
                    $query->set('order', 'DESC');
                    break;
            }
        }
    }
}
add_action('pre_get_posts', 'ntara_modify_product_query');
