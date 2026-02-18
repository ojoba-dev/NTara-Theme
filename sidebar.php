<aside class="sidebar">
    <span class="sidebar-search-label">Search</span>
    <form class="sidebar-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" name="s" placeholder="search" value="<?php echo get_search_query(); ?>">
        <button type="submit" aria-label="Search">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </button>
    </form>

    <nav class="sidebar-nav">
        <?php
        $archive_url = get_post_type_archive_link('product');
        $selected    = isset($_GET['category'])
            ? array_filter(array_map('sanitize_key', (array) $_GET['category']))
            : [];
        $all_active  = empty($selected) ? ' class="current-cat"' : '';
        ?>
        <ul>
            <li<?php echo $all_active; ?>>
                <a class="sidebar-filter-link"
                    href="<?php echo esc_url($archive_url); ?>"
                    data-slug=""
                    data-archive="<?php echo esc_attr($archive_url); ?>">
                    View All
                </a>
                </li>

                <?php
                $terms = get_terms([
                    'taxonomy'   => 'product_category',
                    'hide_empty' => true,
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                ]);

                if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                        $is_active = in_array($term->slug, $selected, true) ? ' class="current-cat"' : '';

                        $new_selected = in_array($term->slug, $selected, true)
                            ? array_values(array_diff($selected, [$term->slug]))
                            : array_merge($selected, [$term->slug]);

                        if (empty($new_selected)) {
                            $href = $archive_url;
                        } else {
                            $qs   = implode('&', array_map(function ($s) {
                                return 'category[]=' . rawurlencode($s);
                            }, $new_selected));
                            $href = $archive_url . '?' . $qs;
                        }
                ?>
                        <li<?php echo $is_active; ?>>
                            <a class="sidebar-filter-link"
                                href="<?php echo esc_url($href); ?>"
                                data-slug="<?php echo esc_attr($term->slug); ?>"
                                data-archive="<?php echo esc_attr($archive_url); ?>">
                                <?php echo esc_html($term->name); ?>
                            </a>
                            </li>
                    <?php
                    endforeach;
                endif;
                    ?>
        </ul>
    </nav>
</aside>