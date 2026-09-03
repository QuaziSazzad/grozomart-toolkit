<?php if ('layout_one' == $settings['layout_type']) :

    if (!class_exists('WooCommerce')) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('WooCommerce is required for the Product widget.', 'grozomart-toolkit'); ?></p>
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
    $product_render_overlay_icons = function ($product) {
        global $wp_filter;
        if (empty($wp_filter['storzen_shop_card_overlay'])) {
            return;
        }
        $product_overlay_callbacks = [];
        foreach ($wp_filter['storzen_shop_card_overlay']->callbacks as $callbacks) {
            foreach ($callbacks as $callback) {
                $product_overlay_callbacks[] = $callback['function'];
            }
        }
        foreach (array_reverse($product_overlay_callbacks) as $callback_function) {
            echo '<li>';
            call_user_func($callback_function, $product);
            echo '</li>';
        }
    };

    /**
     * See shop-one.php: renders the flat <span>/<del> structure the markup
     * expects, instead of get_price_html()'s nested woocommerce-Price-amount
     * spans (which break the theme's font-size CSS for the "was" price).
     */
    $product_render_price = function ($product) {
        if ($product->is_on_sale() && '' !== $product->get_sale_price()) {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_sale_price()]), ['in_span' => false, 'decimals' => 0])) . '</span>';
            echo '<del>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_regular_price()]), ['in_span' => false, 'decimals' => 0])) . '</del>';
        } else {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product), ['in_span' => false, 'decimals' => 0])) . '</span>';
        }
    };

    /**
     * Render one product card.
     */
    $product_render_card = function ($product, $wow_delay) use ($product_render_overlay_icons, $product_render_price) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $main_image_id = $product->get_image_id();

        $discount_percent = 0;
        if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
            $discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
        }
    ?>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
            <div class="shop-card-items">
                <div class="thumb">
                    <?php if ($main_image_id) : ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                    <?php endif; ?>
                    <?php if ($discount_percent > 0) : ?>
                        <div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
                    <?php endif; ?>
                    <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                        <?php $product_render_overlay_icons($product); ?>
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
                            <?php $product_render_price($product); ?>
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
     * Query products for one tab. Empty category list = all products.
     */
    $product_query_tab = function ($categories) use ($settings) {
        $product_order_map = [
            'menu_order' => ['orderby' => 'menu_order title', 'order' => 'ASC'],
            'popularity' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales'],
            'rating'     => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_wc_average_rating'],
            'date'       => ['orderby' => 'date', 'order' => 'DESC'],
            'price'      => ['orderby' => 'meta_value_num', 'order' => 'ASC', 'meta_key' => '_price'],
            'price-desc' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_price'],
        ];
        $sort = isset($product_order_map[$settings['layout_one_orderby']]) ? $product_order_map[$settings['layout_one_orderby']] : $product_order_map['menu_order'];

        $args = [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => (int) $settings['layout_one_limit'],
            'orderby'        => $sort['orderby'],
            'order'          => $sort['order'],
            'ignore_sticky_posts' => 1,
        ];
        if (!empty($sort['meta_key'])) {
            $args['meta_key'] = $sort['meta_key'];
        }

        $args['tax_query'] = [
            [
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => ['exclude-from-catalog'],
                'operator' => 'NOT IN',
            ],
        ];

        if (!empty($categories)) {
            $args['tax_query'][] = [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $categories,
            ];
        }

        $query    = new WP_Query($args);
        $products = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $products[] = wc_get_product(get_the_ID());
            }
            wp_reset_postdata();
        }

        return $products;
    };

    $product_tabs      = !empty($settings['layout_one_tab_items']) ? $settings['layout_one_tab_items'] : [];
    $product_wow_delays = ['.2s', '.4s', '.6s', '.8s'];
    ?>
    <!-- Shop Section Start -->
    <section class="shop-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <?php if (!empty($settings['layout_one_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h2'); ?>>
                            <?php echo esc_html($settings['layout_one_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h2'); ?>>
                    <?php endif; ?>
                </div>
                <?php if (!empty($product_tabs)) : ?>
                    <ul class="nav">
                        <?php foreach ($product_tabs as $tab_index => $tab) : ?>
                            <li class="nav-item">
                                <a href="#product-tab<?php echo esc_attr($tab_index + 1); ?>" data-bs-toggle="tab" class="nav-link<?php echo 0 === $tab_index ? ' active' : ''; ?>">
                                    <?php echo esc_html($tab['tab_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="tab-content">
                <?php foreach ($product_tabs as $tab_index => $tab) : ?>
                    <?php $tab_products = $product_query_tab($tab['tab_categories']); ?>
                    <div id="product-tab<?php echo esc_attr($tab_index + 1); ?>" class="tab-pane fade<?php echo 0 === $tab_index ? ' show active' : ''; ?>">
                        <?php if (empty($tab_products)) : ?>
                            <p class="woocommerce-info"><?php esc_html_e('No products were found in this category.', 'grozomart-toolkit'); ?></p>
                        <?php else : ?>
                            <div class="row">
                                <?php foreach ($tab_products as $product_index => $product) : ?>
                                    <?php $product_render_card($product, $product_wow_delays[$product_index % count($product_wow_delays)]); ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
<?php endif; ?>
