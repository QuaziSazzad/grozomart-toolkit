<?php if ('layout_four' == $settings['layout_type']) :

    if (!class_exists('WooCommerce')) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('WooCommerce is required for the Product widget.', 'grozomart-toolkit'); ?></p>
<?php
        endif;
        return;
    endif;

    /**
     * See product-one.php for why these two helpers exist: icon order
     * (Storzen fires eye→compare→heart by hook priority, markup wants
     * heart→compare→eye) and flat <span>/<del> price markup.
     */
    $arrivals_render_overlay_icons = function ($product) {
        global $wp_filter;
        if (empty($wp_filter['storzen_shop_card_overlay'])) {
            return;
        }
        $callbacks_list = [];
        foreach ($wp_filter['storzen_shop_card_overlay']->callbacks as $callbacks) {
            foreach ($callbacks as $callback) {
                $callbacks_list[] = $callback['function'];
            }
        }
        foreach (array_reverse($callbacks_list) as $callback_function) {
            echo '<li>';
            call_user_func($callback_function, $product);
            echo '</li>';
        }
    };

    $arrivals_render_price = function ($product) {
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
    $arrivals_render_card = function ($product, $wow_delay) use ($arrivals_render_overlay_icons, $arrivals_render_price) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $main_image_id = $product->get_image_id();

        $discount_percent = 0;
        if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
            $discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
        }
    ?>
        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
            <div class="shop-card-arrivals-items2">
                <div class="thumb">
                    <?php if ($main_image_id) : ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                    <?php endif; ?>
                    <?php if ($discount_percent > 0) : ?>
                        <div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
                    <?php endif; ?>
                    <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                        <?php $arrivals_render_overlay_icons($product); ?>
                    </ul>
                </div>
                <div class="content">
                    <div class="price-item">
                        <?php $arrivals_render_price($product); ?>
                    </div>
                    <h2 class="title">
                        <a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                    </h2>
                    <span class="stock"><?php echo $product->is_in_stock() ? esc_html__('IN STOCK', 'grozomart-toolkit') : esc_html__('OUT OF STOCK', 'grozomart-toolkit'); ?></span>
                    <?php if (wc_review_ratings_enabled()) : ?>
                        <div class="star">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <span>(<?php echo esc_html(number_format($product->get_average_rating(), 2)); ?>)</span>
                        </div>
                    <?php endif; ?>
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
    <?php
    };

    /**
     * Query products for one tab. Empty category list = all products.
     */
    $arrivals_query_tab = function ($categories) use ($settings) {
        $order_map = [
            'menu_order' => ['orderby' => 'menu_order title', 'order' => 'ASC'],
            'popularity' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales'],
            'rating'     => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_wc_average_rating'],
            'date'       => ['orderby' => 'date', 'order' => 'DESC'],
            'price'      => ['orderby' => 'meta_value_num', 'order' => 'ASC', 'meta_key' => '_price'],
            'price-desc' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_price'],
        ];
        $sort = isset($order_map[$settings['layout_four_orderby']]) ? $order_map[$settings['layout_four_orderby']] : $order_map['menu_order'];

        $args = [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => (int) $settings['layout_four_limit'],
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

    $arrivals_tabs       = !empty($settings['layout_four_tab_items']) ? $settings['layout_four_tab_items'] : [];
    $arrivals_wow_delays = ['.2s', '.4s', '.6s', '.8s'];
    ?>
    <!-- Shop Section Start -->
    <section class="shop-secton-arrivals-2 fix section-padding pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <?php if (!empty($settings['layout_four_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_four_title_tag'], 'h2'); ?>>
                            <?php echo esc_html($settings['layout_four_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_four_title_tag'], 'h2'); ?>>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_four_description'])) : ?>
                        <p class="mt-2"><?php echo esc_html($settings['layout_four_description']); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($arrivals_tabs)) : ?>
                    <ul class="nav">
                        <?php foreach ($arrivals_tabs as $tab_index => $tab) : ?>
                            <li class="nav-item">
                                <a href="#arrivals-tab<?php echo esc_attr($tab_index + 1); ?>" data-bs-toggle="tab" class="nav-link<?php echo 0 === $tab_index ? ' active' : ''; ?>">
                                    <?php echo esc_html($tab['tab_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="tab-content">
                <?php foreach ($arrivals_tabs as $tab_index => $tab) : ?>
                    <?php $tab_products = $arrivals_query_tab($tab['tab_categories']); ?>
                    <div id="arrivals-tab<?php echo esc_attr($tab_index + 1); ?>" class="tab-pane fade<?php echo 0 === $tab_index ? ' show active' : ''; ?>">
                        <?php if (empty($tab_products)) : ?>
                            <p class="woocommerce-info"><?php esc_html_e('No products were found in this category.', 'grozomart-toolkit'); ?></p>
                        <?php else : ?>
                            <div class="row">
                                <?php foreach ($tab_products as $product_index => $product) : ?>
                                    <?php $arrivals_render_card($product, $arrivals_wow_delays[$product_index % count($arrivals_wow_delays)]); ?>
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
