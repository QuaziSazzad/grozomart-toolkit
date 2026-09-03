<?php if ('layout_three' == $settings['layout_type']) :

    if (!class_exists('WooCommerce')) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('WooCommerce is required for the Product widget.', 'grozomart-toolkit'); ?></p>
<?php
        endif;
        return;
    endif;

    /**
     * See product-one.php / shop-one.php for why these two helpers exist:
     * icon order (Storzen fires eye→compare→heart by hook priority, markup
     * wants heart→compare→eye) and flat <span>/<del> price markup (WC's
     * default nested spans break the theme's font-size CSS on the "was"
     * price).
     */
    $bestseller_render_overlay_icons = function ($product) {
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

    $bestseller_render_price = function ($product) {
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
    $bestseller_render_card = function ($product, $wow_delay) use ($bestseller_render_overlay_icons, $bestseller_render_price) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $main_image_id = $product->get_image_id();

        $discount_percent = 0;
        if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
            $discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
        }
    ?>
        <div class="shop-best-seller-items wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
            <div class="thumb">
                <?php if ($main_image_id) : ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                <?php endif; ?>
                <?php if ($discount_percent > 0) : ?>
                    <div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
                <?php endif; ?>
                <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                    <?php $bestseller_render_overlay_icons($product); ?>
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
                        <?php $bestseller_render_price($product); ?>
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
    <?php
    };

    // ── Query ────────────────────────────────────────────────────────────
    $bestseller_order_map = [
        'menu_order' => ['orderby' => 'menu_order title', 'order' => 'ASC'],
        'popularity' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales'],
        'rating'     => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_wc_average_rating'],
        'date'       => ['orderby' => 'date', 'order' => 'DESC'],
        'price'      => ['orderby' => 'meta_value_num', 'order' => 'ASC', 'meta_key' => '_price'],
        'price-desc' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_price'],
    ];
    $bestseller_sort = isset($bestseller_order_map[$settings['layout_three_orderby']]) ? $bestseller_order_map[$settings['layout_three_orderby']] : $bestseller_order_map['popularity'];

    $bestseller_args = [
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => (int) $settings['layout_three_limit'],
        'orderby'             => $bestseller_sort['orderby'],
        'order'               => $bestseller_sort['order'],
        'ignore_sticky_posts' => 1,
    ];
    if (!empty($bestseller_sort['meta_key'])) {
        $bestseller_args['meta_key'] = $bestseller_sort['meta_key'];
    }

    $bestseller_args['tax_query'] = [
        [
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => ['exclude-from-catalog'],
            'operator' => 'NOT IN',
        ],
    ];

    if (!empty($settings['layout_three_categories'])) {
        $bestseller_args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $settings['layout_three_categories'],
        ];
    }

    $bestseller_query    = new WP_Query($bestseller_args);
    $bestseller_products = [];
    if ($bestseller_query->have_posts()) {
        while ($bestseller_query->have_posts()) {
            $bestseller_query->the_post();
            $bestseller_products[] = wc_get_product(get_the_ID());
        }
        wp_reset_postdata();
    }

    $bestseller_wow_delays = ['.2s', '.4s', '.6s', '.7s', '.8s'];
    ?>
    <!-- Best Seller Section Start -->
    <section class="best-seller-section fix section-padding pb-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <?php if (!empty($settings['layout_three_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_three_title_tag'], 'h2'); ?>>
                            <?php echo esc_html($settings['layout_three_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_three_title_tag'], 'h2'); ?>>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['layout_three_button_label'])) : ?>
                    <a href="<?php echo esc_url($settings['layout_three_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_three_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_three_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                        <?php echo esc_html($settings['layout_three_button_label']); ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php if (empty($bestseller_products)) : ?>
                <p class="woocommerce-info"><?php esc_html_e('No products were found.', 'grozomart-toolkit'); ?></p>
            <?php else : ?>
                <div class="best-seller-wrapper">
                    <?php foreach ($bestseller_products as $product_index => $product) : ?>
                        <?php $bestseller_render_card($product, $bestseller_wow_delays[$product_index % count($bestseller_wow_delays)]); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Best Seller Section End -->
<?php endif; ?>
