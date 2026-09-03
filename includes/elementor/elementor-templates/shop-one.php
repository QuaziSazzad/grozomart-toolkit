<?php if ('layout_one' == $settings['layout_type']) :

    if (!class_exists('WooCommerce')) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('WooCommerce is required for the Shop widget.', 'grozomart-toolkit'); ?></p>
<?php
        endif;
        return;
    endif;

    /**
     * Storzen fires wishlist/compare/quick-view as one combined action, but the
     * theme's .gt-shop-icon relies on Bootstrap's .d-grid to stack icons — that
     * only works with separate <li> items. Iterate the hook's callbacks
     * individually so each button gets its own <li>.
     *
     * Storzen registers these at fixed priorities — quick-view (14), compare
     * (15), wishlist (16) — so PHP's priority-ordered $wp_filter naturally
     * outputs eye, compare, heart. The markup wants heart, compare, eye
     * instead; reversing the collected callback list gives that order without
     * touching Storzen's own hook priorities.
     */
    $shop_render_overlay_icons = function ($product) {
        global $wp_filter;
        if (empty($wp_filter['storzen_shop_card_overlay'])) {
            return;
        }
        $shop_overlay_callbacks = [];
        foreach ($wp_filter['storzen_shop_card_overlay']->callbacks as $callbacks) {
            foreach ($callbacks as $callback) {
                $shop_overlay_callbacks[] = $callback['function'];
            }
        }
        foreach (array_reverse($shop_overlay_callbacks) as $callback_function) {
            echo '<li>';
            call_user_func($callback_function, $product);
            echo '</li>';
        }
    };

    /**
     * WooCommerce's get_price_html() (and wc_price()'s default 'in_span'
     * option) nests each amount inside its own
     * <span class="woocommerce-Price-amount">…</span>. The theme's CSS
     * styles the amount span at 24px, so when that same span is nested
     * inside our <del>, its own font-size rule (matching the span directly)
     * wins over the <del>'s inherited 16px — the "was" price renders at the
     * same size as the current price. Render plain text (in_span => false)
     * so the flat `.price > span` / `.price > del` structure the markup
     * expects applies its font-size directly to the text.
     */
    $shop_render_price = function ($product) {
        if ($product->is_on_sale() && '' !== $product->get_sale_price()) {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_sale_price()]), ['in_span' => false, 'decimals' => 0])) . '</span>';
            echo '<del>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_regular_price()]), ['in_span' => false, 'decimals' => 0])) . '</del>';
        } else {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product), ['in_span' => false, 'decimals' => 0])) . '</span>';
        }
    };

    /**
     * Render one product card for the grid view.
     */
    $shop_render_card = function ($product) use ($shop_render_overlay_icons, $shop_render_price) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $main_image_id = $product->get_image_id();

        $discount_percent = 0;
        if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
            $discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
        }
    ?>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="shop-card-items">
                <div class="thumb">
                    <?php if ($main_image_id) : ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                    <?php endif; ?>
                    <?php if ($discount_percent > 0) : ?>
                        <div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
                    <?php endif; ?>
                    <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                        <?php $shop_render_overlay_icons($product); ?>
                    </ul>
                </div>
                <div class="content">
                    <?php
                    $product_cats = wc_get_product_category_list($product->get_id());
                    if (!empty($product_cats)) :
                    ?>
                        <span><?php echo wp_kses_post(wp_strip_all_tags($product_cats)); ?></span>
                    <?php endif; ?>
                    <h2 class="title">
                        <a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                    </h2>
                    <?php if (wc_review_ratings_enabled()) : ?>
                        <div class="star">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <span>(<?php echo esc_html(number_format($product->get_average_rating(), 2)); ?>)</span>
                        </div>
                    <?php endif; ?>
                    <div class="price-items">
                        <div class="price">
                            <?php $shop_render_price($product); ?>
                        </div>
                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                            data-quantity="1"
                            data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                            data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                            aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>"
                            rel="nofollow"
                            class="theme-btn small-btn product_type_<?php echo esc_attr($product->get_type()); ?> add_to_cart_button<?php echo $product->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>">
                            <?php echo esc_html($product->add_to_cart_text()); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    };

    /**
     * Render one product for the list view.
     */
    $shop_render_list_item = function ($product) use ($shop_render_overlay_icons, $shop_render_price) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $main_image_id = $product->get_image_id();

        $short_desc = $product->get_short_description();
        if (empty($short_desc)) {
            $short_desc = wp_trim_words($product->get_description(), 40);
        }
    ?>
        <div class="shop-list-items-area-2">
            <div class="thumb">
                <?php if ($main_image_id) : ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_single')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                <?php endif; ?>
                <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                    <?php $shop_render_overlay_icons($product); ?>
                </ul>
            </div>
            <div class="shop-content">
                <div class="content">
                    <?php
                    $product_cats = wc_get_product_category_list($product->get_id());
                    if (!empty($product_cats)) :
                    ?>
                        <span><?php echo wp_kses_post(wp_strip_all_tags($product_cats)); ?></span>
                    <?php endif; ?>
                    <h2 class="title">
                        <a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                    </h2>
                    <?php if (wc_review_ratings_enabled()) : ?>
                        <div class="star">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <span>(<?php echo esc_html(number_format($product->get_average_rating(), 2)); ?>)</span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($short_desc)) : ?>
                        <p class="text"><?php echo wp_kses_post($short_desc); ?></p>
                    <?php endif; ?>
                    <div class="price-items">
                        <div class="price">
                            <?php $shop_render_price($product); ?>
                        </div>
                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                            data-quantity="1"
                            data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                            data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                            aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>"
                            rel="nofollow"
                            class="theme-btn small-btn product_type_<?php echo esc_attr($product->get_type()); ?> add_to_cart_button<?php echo $product->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>">
                            <?php echo esc_html($product->add_to_cart_text()); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    };

    // ── Query ────────────────────────────────────────────────────────────
    $shop_paged = max(1, (int) (get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : (isset($_GET['product_page']) ? absint($_GET['product_page']) : 1))));

    $shop_orderby_choice = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : $settings['layout_one_default_orderby'];
    $shop_order_map = [
        'menu_order' => ['orderby' => 'menu_order title', 'order' => 'ASC'],
        'popularity' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales'],
        'rating'     => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_wc_average_rating'],
        'date'       => ['orderby' => 'date', 'order' => 'DESC'],
        'price'      => ['orderby' => 'meta_value_num', 'order' => 'ASC', 'meta_key' => '_price'],
        'price-desc' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_price'],
    ];
    $shop_sort = isset($shop_order_map[$shop_orderby_choice]) ? $shop_order_map[$shop_orderby_choice] : $shop_order_map['menu_order'];

    $shop_args = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => (int) $settings['layout_one_limit'],
        'paged'          => $shop_paged,
        'orderby'        => $shop_sort['orderby'],
        'order'          => $shop_sort['order'],
    ];
    if (!empty($shop_sort['meta_key'])) {
        $shop_args['meta_key'] = $shop_sort['meta_key'];
    }

    $shop_args['tax_query'] = [
        [
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => ['exclude-from-catalog'],
            'operator' => 'NOT IN',
        ],
    ];

    if (!empty($settings['layout_one_categories'])) {
        $shop_args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $settings['layout_one_categories'],
        ];
    }

    $shop_query = new WP_Query($shop_args);

    $shop_products = [];
    if ($shop_query->have_posts()) {
        while ($shop_query->have_posts()) {
            $shop_query->the_post();
            $shop_products[] = wc_get_product(get_the_ID());
        }
        wp_reset_postdata();
    }

    $shop_total    = (int) $shop_query->found_posts;
    $shop_per_page = (int) $settings['layout_one_limit'];
    $shop_first    = $shop_total ? (($shop_paged - 1) * $shop_per_page) + 1 : 0;
    $shop_last     = min($shop_total, $shop_paged * $shop_per_page);

    $shop_views = [
        'grid' => 'fa-sharp fa-solid fa-grid-2',
        'list' => 'fa-solid fa-list',
    ];

    $shop_active_view = ('list' === $settings['layout_one_default_view']) ? 'list' : 'grid';

    $shop_sort_labels = [
        'menu_order' => esc_html__('Sort by : Default', 'grozomart-toolkit'),
        'popularity' => esc_html__('Sort by popularity', 'grozomart-toolkit'),
        'rating'     => esc_html__('Sort by average rating', 'grozomart-toolkit'),
        'date'       => esc_html__('Sort by latest', 'grozomart-toolkit'),
        'price'      => esc_html__('Sort by price: low to high', 'grozomart-toolkit'),
        'price-desc' => esc_html__('Sort by price: high to low', 'grozomart-toolkit'),
    ];
    ?>
    <!-- Shop Section Start -->
    <section class="shop-section section-padding fix">
        <div class="container">
            <div class="shop-notices-wrapper">
                <?php if ('yes' === $settings['layout_one_show_result_count']) : ?>
                    <p>
                        <?php
                        if ($shop_total) {
                            /* translators: 1: first result, 2: last result, 3: total results */
                            printf(
                                wp_kses(__('Showing <b>%1$d&#8211;%2$d of %3$d</b> results', 'grozomart-toolkit'), ['b' => []]),
                                (int) $shop_first,
                                (int) $shop_last,
                                (int) $shop_total
                            );
                        } else {
                            esc_html_e('No products found', 'grozomart-toolkit');
                        }
                        ?>
                    </p>
                <?php endif; ?>
                <div class="shop-showing">
                    <?php if ('yes' === $settings['layout_one_show_view_tabs']) : ?>
                        <ul class="nav">
                            <?php foreach ($shop_views as $view_id => $view_icon) : ?>
                                <li class="nav-item">
                                    <a href="#<?php echo esc_attr($view_id); ?>" data-bs-toggle="tab" class="nav-link<?php echo $view_id === $shop_active_view ? ' active' : ''; ?>">
                                        <i class="<?php echo esc_attr($view_icon); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if ('yes' === $settings['layout_one_show_ordering']) : ?>
                        <div class="form-clt">
                            <form class="form" method="get">
                                <?php
                                foreach ($_GET as $shop_key => $shop_val) {
                                    if (in_array($shop_key, ['orderby', 'product_page', 'paged'], true)) {
                                        continue;
                                    }
                                    echo '<input type="hidden" name="' . esc_attr($shop_key) . '" value="' . esc_attr(wp_unslash($shop_val)) . '">';
                                }
                                ?>
                                <select class="single-select w-100" name="orderby" onchange="this.form.submit()">
                                    <?php foreach ($shop_sort_labels as $shop_val => $shop_label) : ?>
                                        <option value="<?php echo esc_attr($shop_val); ?>"<?php selected($shop_orderby_choice, $shop_val); ?>><?php echo esc_html($shop_label); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (empty($shop_products)) : ?>
                <p class="woocommerce-info"><?php esc_html_e('No products were found matching your selection.', 'grozomart-toolkit'); ?></p>
            <?php else : ?>
                <div class="tab-content">
                    <div id="grid" class="tab-pane fade<?php echo 'grid' === $shop_active_view ? ' show active' : ''; ?>">
                        <div class="row">
                            <?php foreach ($shop_products as $product) : ?>
                                <?php $shop_render_card($product); ?>
                            <?php endforeach; ?>
                        </div>

                        <?php if ('yes' === $settings['layout_one_show_pagination'] && $shop_query->max_num_pages > 1) : ?>
                            <div class="page-nav-wrap text-center">
                                <?php
                                echo paginate_links([
                                    'base'      => esc_url_raw(add_query_arg('product_page', '%#%')),
                                    'format'    => '',
                                    'current'   => $shop_paged,
                                    'total'     => $shop_query->max_num_pages,
                                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                                    'type'      => 'list',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div id="list" class="tab-pane fade<?php echo 'list' === $shop_active_view ? ' show active' : ''; ?>">
                        <?php foreach ($shop_products as $product) : ?>
                            <?php $shop_render_list_item($product); ?>
                        <?php endforeach; ?>

                        <?php if ('yes' === $settings['layout_one_show_pagination'] && $shop_query->max_num_pages > 1) : ?>
                            <div class="page-nav-wrap text-center">
                                <?php
                                echo paginate_links([
                                    'base'      => esc_url_raw(add_query_arg('product_page', '%#%')),
                                    'format'    => '',
                                    'current'   => $shop_paged,
                                    'total'     => $shop_query->max_num_pages,
                                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                                    'type'      => 'list',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Shop Section End -->
<?php endif; ?>
