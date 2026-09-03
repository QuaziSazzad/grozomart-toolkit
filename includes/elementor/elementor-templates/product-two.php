<?php if ('layout_two' == $settings['layout_type']) :

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
    $ftprod_render_overlay_icons = function ($product) {
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

    $ftprod_render_price = function ($product) {
        if ($product->is_on_sale() && '' !== $product->get_sale_price()) {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_sale_price()]), ['in_span' => false, 'decimals' => 0])) . '</span>';
            echo '<del>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_regular_price()]), ['in_span' => false, 'decimals' => 0])) . '</del>';
        } else {
            echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product), ['in_span' => false, 'decimals' => 0])) . '</span>';
        }
    };

    /**
     * Render one product card. $wrapper_class carries the position-specific
     * modifier (style-border, style-radius-none, feature-product-items-four)
     * or, for the countdown slot, the whole feature-product-items-2 markup.
     * $custom_image_url, when set, overrides the product's own featured
     * image — lets an editor use different artwork for the promo card than
     * the product's real listing photo.
     */
    $ftprod_render_card = function ($product_id, $wrapper_class, $countdown = null, $custom_image_url = '') use ($ftprod_render_overlay_icons, $ftprod_render_price) {
        if (empty($product_id)) {
            return;
        }
        $product = wc_get_product($product_id);
        if (!$product instanceof WC_Product) {
            return;
        }

        $main_image_id = $product->get_image_id();
        $image_url     = !empty($custom_image_url) ? $custom_image_url : ($main_image_id ? wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail') : '');

        $discount_percent = 0;
        if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
            $discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
        }

        $product_cats = wc_get_product_category_list($product->get_id());
    ?>
        <div class="<?php echo esc_attr($wrapper_class); ?>">
            <?php if ($discount_percent > 0) : ?>
                <div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
            <?php endif; ?>
            <div class="thumb">
                <?php if (!empty($image_url)) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                <?php endif; ?>
            </div>
            <div class="content">
                <?php if (is_array($countdown)) : ?>
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
                        <?php if (!empty($countdown['text'])) : ?>
                            <p class="text-2"><?php echo wp_kses_post($countdown['text']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($product_cats)) : ?>
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
                        <?php $ftprod_render_price($product); ?>
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
            <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                <?php $ftprod_render_overlay_icons($product); ?>
            </ul>
        </div>
    <?php
    };
    ?>
    <!-- Feature Product Section Start -->
    <section class="feature-product-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <?php if (!empty($settings['layout_two_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_two_title_tag'], 'h2'); ?>>
                            <?php echo esc_html($settings['layout_two_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_two_title_tag'], 'h2'); ?>>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['layout_two_button_label'])) : ?>
                    <a href="<?php echo esc_url($settings['layout_two_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_two_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                        <?php echo esc_html($settings['layout_two_button_label']); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="feature-product-wrapper">
                <div class="row g-4 g-xl-0">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <?php $ftprod_render_card($settings['layout_two_product_one'], 'feature-product-items style-border', null, $settings['layout_two_product_one_image']['url'] ?? ''); ?>
                        <?php $ftprod_render_card($settings['layout_two_product_two'], 'feature-product-items style-radius-none', null, $settings['layout_two_product_two_image']['url'] ?? ''); ?>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <?php
                        $ftprod_render_card(
                            $settings['layout_two_product_three'],
                            'feature-product-items-2',
                            [
                                'date' => $settings['layout_two_product_three_countdown_date'],
                                'text' => $settings['layout_two_product_three_countdown_text'],
                            ],
                            $settings['layout_two_product_three_image']['url'] ?? ''
                        );
                        ?>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <?php $ftprod_render_card($settings['layout_two_product_four'], 'feature-product-items feature-product-items-four', null, $settings['layout_two_product_four_image']['url'] ?? ''); ?>
                        <div class="shop-banner-items11 bg-cover" style="background-image: url('<?php echo esc_url($settings['layout_two_promo_background_image']['url']); ?>');">
                            <div class="content">
                                <?php if (!empty($settings['layout_two_promo_sub_title'])) : ?>
                                    <span><?php echo esc_html($settings['layout_two_promo_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_promo_title'])) : ?>
                                    <h2 class="title">
                                        <?php echo wp_kses_post($settings['layout_two_promo_title']); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_promo_description'])) : ?>
                                    <p><?php echo esc_html($settings['layout_two_promo_description']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_promo_button_label'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_two_promo_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_two_promo_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_promo_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                        <?php echo esc_html($settings['layout_two_promo_button_label']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['layout_two_promo_image']['url'])) : ?>
                                <div class="thumb">
                                    <img src="<?php echo esc_url($settings['layout_two_promo_image']['url']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($settings['layout_two_promo_title'])); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Product Section End -->
<?php endif; ?>
