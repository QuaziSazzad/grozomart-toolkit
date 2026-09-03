<?php if ('layout_five' == $settings['layout_type']) :

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
    $featprod_render_overlay_icons = function ($product) {
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

    $featprod_render_price = function ($product) {
        if ($product->is_on_sale() && '' !== $product->get_sale_price()) {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_sale_price()]), ['in_span' => false, 'decimals' => 0])) . '</span>';
            echo '<del>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_regular_price()]), ['in_span' => false, 'decimals' => 0])) . '</del>';
        } else {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product), ['in_span' => false, 'decimals' => 0])) . '</span>';
        }
    };

    /**
     * Left column card ("shop-card-arrivals"): thumb, price above title,
     * stock label, rating, add-to-cart button. Optionally wraps the thumb
     * in the countdown timer markup for the 2nd item. $custom_image_url,
     * when set, overrides the product's own featured image — see
     * product-two.php for why this exists.
     */
    $featprod_render_left_card = function ($product, $extra_class, $countdown = null, $custom_image_url = '') use ($featprod_render_price) {
        $main_image_id = $product->get_image_id();
        $image_url     = !empty($custom_image_url) ? $custom_image_url : ($main_image_id ? wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail') : '');
    ?>
        <div class="shop-card-arrivals<?php echo esc_attr($extra_class); ?>">
            <?php if (is_array($countdown)) : ?>
                <div class="thumb-items">
                    <div class="thumb">
                        <?php if (!empty($image_url)) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="coming-soon-time countdown" <?php echo !empty($countdown['date']) ? 'data-countdown-date="' . esc_attr($countdown['date']) . '"' : ''; ?>>
                        <div class="timer-content">
                            <h2 class="day">00</h2>
                        </div>
                        <div class="timer-dot">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="timer-content style-2">
                            <h2 class="hour">00</h2>
                        </div>
                        <div class="timer-dot">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="timer-content style-2">
                            <h2 class="min">00</h2>
                        </div>
                        <div class="timer-dot">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="timer-content style-2">
                            <h2 class="sec">00</h2>
                        </div>
                    </div>
                    <?php if (!empty($countdown['text'])) : ?>
                        <p class="text-center textss"><?php echo wp_kses_post($countdown['text']); ?></p>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <div class="thumb">
                    <?php if (!empty($image_url)) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="content">
                <div class="price-item">
                    <?php $featprod_render_price($product); ?>
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
    <?php
    };

    /**
     * Right grid card ("shop-card-arrivals-items2 style-2"): thumb with
     * overlay icons + discount badge, title/stock/rating above price.
     */
    $featprod_render_grid_card = function ($product, $wow_delay) use ($featprod_render_overlay_icons, $featprod_render_price) {
        $main_image_id = $product->get_image_id();

        $discount_percent = 0;
        if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
            $discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
        }
    ?>
        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
            <div class="shop-card-arrivals-items2">
                <div class="thumb">
                    <?php if ($main_image_id) : ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                    <?php endif; ?>
                    <?php if ($discount_percent > 0) : ?>
                        <div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
                    <?php endif; ?>
                    <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                        <?php $featprod_render_overlay_icons($product); ?>
                    </ul>
                </div>
                <div class="content style-2">
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
                    <div class="price-item">
                        <?php $featprod_render_price($product); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    };

    /**
     * Query 6 products for one tab's right-hand grid. The left column is
     * manually curated per-tab instead (see tab_left_product_* controls),
     * matching the screenshot request for explicit product pickers there.
     * Empty category list = all products.
     */
    $featprod_query_tab = function ($categories, $count = 6) use ($settings) {
        $order_map = [
            'menu_order' => ['orderby' => 'menu_order title', 'order' => 'ASC'],
            'popularity' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales'],
            'rating'     => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_wc_average_rating'],
            'date'       => ['orderby' => 'date', 'order' => 'DESC'],
            'price'      => ['orderby' => 'meta_value_num', 'order' => 'ASC', 'meta_key' => '_price'],
            'price-desc' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => '_price'],
        ];
        $sort = isset($order_map[$settings['layout_five_orderby']]) ? $order_map[$settings['layout_five_orderby']] : $order_map['menu_order'];

        $args = [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => $count,
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

    $featprod_tabs       = !empty($settings['layout_five_tab_items']) ? $settings['layout_five_tab_items'] : [];
    $featprod_wow_delays = ['.3s', '.5s', '.7s'];
    ?>
    <!-- Shop Items Section Start -->
    <section class="shop-items-2 shop-sss-section-2 section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <?php if (!empty($settings['layout_five_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_five_title_tag'], 'h2'); ?>>
                            <?php echo esc_html($settings['layout_five_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_five_title_tag'], 'h2'); ?>>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_five_description'])) : ?>
                        <p class="mt-2"><?php echo esc_html($settings['layout_five_description']); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($featprod_tabs)) : ?>
                    <ul class="nav">
                        <?php foreach ($featprod_tabs as $tab_index => $tab) : ?>
                            <li class="nav-item">
                                <a href="#featprod-tab<?php echo esc_attr($tab_index + 1); ?>" data-bs-toggle="tab" class="nav-link<?php echo 0 === $tab_index ? ' active' : ''; ?>">
                                    <?php echo esc_html($tab['tab_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="tab-content">
                <?php foreach ($featprod_tabs as $tab_index => $tab) : ?>
                    <?php
                    $left_slots = [
                        ['id' => $tab['tab_left_product_one'] ?? '', 'image' => $tab['tab_left_product_one_image']['url'] ?? '', 'extra_class' => ''],
                        ['id' => $tab['tab_left_product_two'] ?? '', 'image' => $tab['tab_left_product_two_image']['url'] ?? '', 'extra_class' => ''],
                        ['id' => $tab['tab_left_product_three'] ?? '', 'image' => $tab['tab_left_product_three_image']['url'] ?? '', 'extra_class' => ' mb-0'],
                    ];
                    $has_manual_left_picks = false;
                    foreach ($left_slots as $slot) {
                        if (!empty($slot['id'])) {
                            $has_manual_left_picks = true;
                            break;
                        }
                    }

                    if ($has_manual_left_picks) {
                        // At least one slot was picked by the editor — use the pickers as-is and query only the grid.
                        $grid_products = $featprod_query_tab($tab['tab_categories']);

                        $left_products = [];
                        foreach ($left_slots as $slot_index => $slot) {
                            if (empty($slot['id'])) {
                                continue;
                            }
                            $slot_product = wc_get_product($slot['id']);
                            if ($slot_product instanceof WC_Product) {
                                $left_products[] = ['index' => $slot_index] + $slot + ['product' => $slot_product];
                            }
                        }
                    } else {
                        // No manual picks for this tab — fall back to the category query, first 3 fill the left column.
                        $tab_products  = $featprod_query_tab($tab['tab_categories'], 9);
                        $left_products = [];
                        foreach (array_slice($tab_products, 0, 3) as $slot_index => $slot_product) {
                            $left_products[] = [
                                'index'       => $slot_index,
                                'product'     => $slot_product,
                                'image'       => '',
                                'extra_class' => 2 === $slot_index ? ' mb-0' : '',
                            ];
                        }
                        $grid_products = array_slice($tab_products, 3, 6);
                    }
                    ?>
                    <div id="featprod-tab<?php echo esc_attr($tab_index + 1); ?>" class="tab-pane fade<?php echo 0 === $tab_index ? ' show active' : ''; ?>">
                        <?php if (empty($left_products) && empty($grid_products)) : ?>
                            <p class="woocommerce-info"><?php esc_html_e('No products were found in this category.', 'grozomart-toolkit'); ?></p>
                        <?php else : ?>
                            <div class="row">
                                <?php if (!empty($left_products)) : ?>
                                    <div class="col-xl-4 col-lg-5 col-md-6 order-2 order-xxl-1">
                                        <div class="shop-left-items-2 wow fadeInUp" data-wow-delay=".3s">
                                            <?php foreach ($left_products as $left_item) : ?>
                                                <?php
                                                $countdown = null;
                                                if (1 === $left_item['index'] && (!empty($tab['tab_countdown_date']) || !empty($tab['tab_countdown_text']))) {
                                                    $countdown = [
                                                        'date' => $tab['tab_countdown_date'],
                                                        'text' => $tab['tab_countdown_text'],
                                                    ];
                                                }
                                                $featprod_render_left_card($left_item['product'], $left_item['extra_class'], $countdown, $left_item['image']);
                                                ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($grid_products)) : ?>
                                    <div class="col-xl-8 order-1 order-xxl-2">
                                        <div class="shop-right-items-2">
                                            <div class="row">
                                                <?php foreach ($grid_products as $grid_index => $grid_product) : ?>
                                                    <?php $featprod_render_grid_card($grid_product, $featprod_wow_delays[$grid_index % count($featprod_wow_delays)]); ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Shop Items Section End -->
<?php endif; ?>
