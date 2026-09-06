<?php

use GrozomartToolkit\Helper\Grozomart_Shop_Filter;

if ('layout_two' == $settings['layout_type']) :

    if (!class_exists('WooCommerce')) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('WooCommerce is required for the Shop Details widget.', 'grozomart-toolkit'); ?></p>
<?php
        endif;
        return;
    endif;

    /**
     * Falls back to the product being viewed when no product is picked, so
     * the same widget works both as a Single Product template part and as a
     * one-off block pointed at a specific product.
     */
    $details_product_id = !empty($settings['layout_two_product']) ? absint($settings['layout_two_product']) : get_the_ID();
    $details_product    = $details_product_id ? wc_get_product($details_product_id) : false;

    if (!$details_product instanceof WC_Product) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('Select a product for the Shop Details widget, or place it on a single product page.', 'grozomart-toolkit'); ?></p>
<?php
        endif;
        return;
    endif;

    $details_id = $details_product->get_id();

    /**
     * Gallery: the main image first, then the gallery images. The markup
     * pairs a tab pane with a thumbnail per image, so build one list and
     * drive both from it.
     */
    $details_image_ids = [];
    if ($details_product->get_image_id()) {
        $details_image_ids[] = (int) $details_product->get_image_id();
    }
    foreach ($details_product->get_gallery_image_ids() as $details_gallery_id) {
        $details_image_ids[] = (int) $details_gallery_id;
    }
    $details_image_ids = array_values(array_unique(array_filter($details_image_ids)));

    $details_discount = 0;
    if ($details_product->is_on_sale() && is_numeric($details_product->get_regular_price()) && (float) $details_product->get_regular_price() > 0) {
        $details_discount = round((((float) $details_product->get_regular_price() - (float) $details_product->get_sale_price()) / (float) $details_product->get_regular_price()) * 100);
    }

    // Unique per widget instance so several can share a page without their
    // Bootstrap tab anchors colliding.
    $details_uid = $this->get_id();

    $details_rating_count = (int) $details_product->get_rating_count();
    $details_review_count = (int) $details_product->get_review_count();
    $details_average      = (float) $details_product->get_average_rating();
?>
    <!-- Shop Section Start -->
    <section class="shop-details-section section-padding pb-0 fix">
        <div class="container">
            <?php if ('yes' === $settings['layout_two_show_breadcrumb']) : ?>
                <div class="bread-list">
                    <p>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'grozomart-toolkit'); ?></a>
                        <?php
                        $details_breadcrumb_terms = get_the_terms($details_id, 'product_cat');
                        if (!empty($details_breadcrumb_terms) && !is_wp_error($details_breadcrumb_terms)) :
                            $details_primary_term = reset($details_breadcrumb_terms);
                        ?>
                            / <a href="<?php echo esc_url(get_term_link($details_primary_term)); ?>"><?php echo esc_html($details_primary_term->name); ?></a>
                        <?php endif; ?>
                        / <span><?php echo esc_html($details_product->get_name()); ?></span>
                    </p>
                </div>
            <?php endif; ?>
            <?php
            /**
             * The `product` class matters to WooCommerce, not the design:
             * wc-add-to-cart-variation.js resolves `$form.closest('.product')`
             * to find the gallery image and price to swap when a variation is
             * chosen. Without it those updates silently do nothing.
             */
            ?>
            <div class="shop-details-simple-wrapper shop-details-two product">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="shop-details-left-item">
                            <div class="tab-content">
                                <?php foreach ($details_image_ids as $details_index => $details_image_id) : ?>
                                    <div id="<?php echo esc_attr('thumb-' . $details_uid . '-' . $details_index); ?>" class="tab-pane fade<?php echo 0 === $details_index ? ' show active' : ''; ?>">
                                        <div class="shop-thumb">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url($details_image_id, 'woocommerce_single')); ?>" alt="<?php echo esc_attr($details_product->get_name()); ?>">
                                            <?php if ($details_discount > 0) : ?>
                                                <div class="discount">-<?php echo esc_html($details_discount); ?>%</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php if (empty($details_image_ids)) : ?>
                                    <div class="tab-pane fade show active">
                                        <div class="shop-thumb">
                                            <img src="<?php echo esc_url(wc_placeholder_img_src('woocommerce_single')); ?>" alt="<?php echo esc_attr($details_product->get_name()); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if ('yes' === $settings['layout_two_show_gallery'] && count($details_image_ids) > 1) : ?>
                                <ul class="nav">
                                    <?php foreach ($details_image_ids as $details_index => $details_image_id) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo esc_attr('#thumb-' . $details_uid . '-' . $details_index); ?>" data-bs-toggle="tab" class="nav-link<?php echo 0 === $details_index ? ' active ps-0' : ''; ?>">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url($details_image_id, 'woocommerce_gallery_thumbnail')); ?>" alt="<?php echo esc_attr($details_product->get_name()); ?>">
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-details-simple-content">
                            <?php
                            $details_cat_list = wc_get_product_category_list($details_id);
                            if (!empty($details_cat_list)) :
                            ?>
                                <span class="shop-sub"><?php echo wp_kses_post(wp_strip_all_tags($details_cat_list)); ?></span>
                            <?php endif; ?>
                            <h2><?php echo esc_html($details_product->get_name()); ?></h2>
                            <?php if (wc_review_ratings_enabled()) : ?>
                                <div class="star">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                    <span>(<?php echo esc_html(number_format($details_average, 2)); ?>)</span>
                                </div>
                            <?php endif; ?>
                            <?php
                            $details_short = $details_product->get_short_description();
                            if (!empty($details_short)) :
                            ?>
                                <p><?php echo wp_kses_post($details_short); ?></p>
                            <?php endif; ?>
                            <h3>
                                <?php
                                /**
                                 * wc_price()'s default 'in_span' nests each amount in its own
                                 * font-sized span, which wins over the size inherited inside
                                 * <del>. Render plain text so the markup's flat
                                 * `h3 > text` / `h3 > del` structure controls the size.
                                 */
                                if ($details_product->is_on_sale() && '' !== $details_product->get_sale_price()) {
                                    echo wp_kses_post(wc_price(wc_get_price_to_display($details_product, ['price' => $details_product->get_sale_price()]), ['in_span' => false, 'decimals' => 0]));
                                    echo '<del>' . wp_kses_post(wc_price(wc_get_price_to_display($details_product, ['price' => $details_product->get_regular_price()]), ['in_span' => false, 'decimals' => 0])) . '</del>';
                                } else {
                                    echo wp_kses_post(wc_price(wc_get_price_to_display($details_product), ['in_span' => false, 'decimals' => 0]));
                                }
                                ?>
                            </h3>

                            <?php
                            $details_is_variable = $details_product->is_type('variable') && $details_product->is_purchasable() && $details_product->is_in_stock();

                            if ($details_is_variable) :
                                /**
                                 * Real WooCommerce variation form. wc-add-to-cart-variation.js
                                 * binds to `.variations select` inside `form.variations_form`
                                 * and needs `data-product_variations` to resolve a selection —
                                 * so the selects stay in the DOM (hidden by this widget's CSS)
                                 * and the design's button row writes into them and fires
                                 * `change`. WooCommerce then updates the price, stock and the
                                 * hidden `variation_id` itself, instead of this template
                                 * reimplementing any of that.
                                 */
                                $details_attributes_for_form = $details_product->get_variation_attributes();
                                $details_variations          = $details_product->get_available_variations();
                                $details_variations_json     = wp_json_encode($details_variations);
                                $details_variations_attr     = function_exists('wc_esc_json') ? wc_esc_json($details_variations_json) : _wp_specialchars($details_variations_json, ENT_QUOTES, 'UTF-8', true);
                            ?>
                                <form class="variations_form cart grozomart-variation-form" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $details_product->get_permalink())); ?>" method="post" enctype="multipart/form-data" data-product_id="<?php echo absint($details_id); ?>" data-product_variations="<?php echo $details_variations_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                                                                                                            ?>">
                                    <div class="variations">
                                        <?php foreach ($details_attributes_for_form as $details_attr_name => $details_attr_options) : ?>
                                            <?php
                                            $details_attr_id       = sanitize_title($details_attr_name) . '-' . $details_uid;
                                            $details_attr_selected = isset($_REQUEST['attribute_' . sanitize_title($details_attr_name)])
                                                ? wc_clean(wp_unslash($_REQUEST['attribute_' . sanitize_title($details_attr_name)]))
                                                : $details_product->get_variation_default_attribute($details_attr_name);
                                            ?>
                                            <div class="new-weight-items">
                                                <span class="weight-text"><?php echo wp_kses_post(wc_attribute_label($details_attr_name)); ?></span>
                                                <?php
                                                /**
                                                 * The select is what WooCommerce reads — its JS
                                                 * clones the <option> list to work out which
                                                 * combinations are still available, so it can't be
                                                 * swapped for a hidden input. It's wrapped in an
                                                 * inline-hidden container instead of being hidden
                                                 * by a stylesheet rule, so no later-loading CSS
                                                 * (WooCommerce Blocks, Elementor) can reveal it.
                                                 * The buttons beside it are the visible control.
                                                 */
                                                ?>
                                                <span class="grozomart-variation-select" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap">
                                                    <?php
                                                    wc_dropdown_variation_attribute_options([
                                                        'options'   => $details_attr_options,
                                                        'attribute' => $details_attr_name,
                                                        'product'   => $details_product,
                                                        'selected'  => $details_attr_selected,
                                                        'id'        => $details_attr_id,
                                                    ]);
                                                    ?>
                                                </span>
                                                <?php foreach ($details_attr_options as $details_attr_option) : ?>
                                                    <?php
                                                    // Taxonomy attributes store slugs but display term names.
                                                    if (taxonomy_exists($details_attr_name)) {
                                                        $details_option_term  = get_term_by('slug', $details_attr_option, $details_attr_name);
                                                        $details_option_value = $details_attr_option;
                                                        $details_option_label = $details_option_term && !is_wp_error($details_option_term) ? $details_option_term->name : $details_attr_option;
                                                    } else {
                                                        $details_option_value = $details_attr_option;
                                                        $details_option_label = $details_attr_option;
                                                    }
                                                    ?>
                                                    <?php
                                                    /**
                                                     * No `active` class is set here — shop-details.js
                                                     * derives it from the select's own value on load
                                                     * and after every WooCommerce update, so the
                                                     * buttons can never disagree with the field
                                                     * WooCommerce actually reads.
                                                     */
                                                    ?>
                                                    <button type="button"
                                                        class="number grozomart-variation-option"
                                                        data-target="<?php echo esc_attr($details_attr_id); ?>"
                                                        data-value="<?php echo esc_attr($details_option_value); ?>">
                                                        <?php echo esc_html($details_option_label); ?>
                                                    </button>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="single_variation_wrap">
                                        <?php do_action('woocommerce_before_single_variation'); ?>
                                        <div class="woocommerce-variation single_variation"></div>
                                        <div class="woocommerce-variation-add-to-cart variations_button button-wrapper">
                                            <div class="cart-quantity">
                                                <p class="qty">
                                                    <button type="button" class="qtyminus" aria-hidden="true">&minus;</button>
                                                    <input type="number" name="quantity" id="<?php echo esc_attr('qty-' . $details_uid); ?>" min="<?php echo esc_attr(apply_filters('woocommerce_quantity_input_min', 1, $details_product)); ?>" step="1" value="1">
                                                    <button type="button" class="qtyplus" aria-hidden="true">+</button>
                                                </p>
                                            </div>
                                            <?php
                                            /**
                                             * Two labels, swapped by shop-details.js: until a full
                                             * combination resolves there is nothing to add, so the
                                             * button reads "Select options" (WooCommerce's own
                                             * wording for a variable product) and only becomes
                                             * "Add to cart" once a variation is chosen.
                                             */
                                            ?>
                                            <button type="submit" class="theme-btn single_add_to_cart_button"
                                                data-select-text="<?php echo esc_attr($details_product->add_to_cart_text()); ?>"
                                                data-cart-text="<?php echo esc_attr($details_product->single_add_to_cart_text()); ?>">
                                                <?php echo esc_html($details_product->add_to_cart_text()); ?>
                                            </button>
                                            <input type="hidden" name="add-to-cart" value="<?php echo absint($details_id); ?>">
                                            <input type="hidden" name="product_id" value="<?php echo absint($details_id); ?>">
                                            <input type="hidden" name="variation_id" class="variation_id" value="0">
                                        </div>
                                        <?php do_action('woocommerce_after_single_variation'); ?>
                                    </div>
                                </form>
                            <?php elseif ($details_product->is_type('simple') && $details_product->is_purchasable() && $details_product->is_in_stock()) : ?>
                                <?php
                                /**
                                 * .button-wrapper is the flex row and the design styles
                                 * .cart-quantity / .theme-btn as its direct children, so the
                                 * <form> has to BE that row — wrapping the row in a form (or
                                 * the form in the row) puts a non-flex element between them
                                 * and drops the button onto its own line.
                                 */
                                ?>
                                <form class="cart button-wrapper" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $details_product->get_permalink())); ?>" method="post" enctype="multipart/form-data">
                                    <div class="cart-quantity">
                                        <p class="qty">
                                            <button type="button" class="qtyminus" aria-hidden="true">&minus;</button>
                                            <input type="number" name="quantity" id="<?php echo esc_attr('qty-' . $details_uid); ?>" min="<?php echo esc_attr(apply_filters('woocommerce_quantity_input_min', 1, $details_product)); ?>" max="<?php echo esc_attr(0 < $details_product->get_max_purchase_quantity() ? $details_product->get_max_purchase_quantity() : ''); ?>" step="1" value="1">
                                            <button type="button" class="qtyplus" aria-hidden="true">+</button>
                                        </p>
                                    </div>
                                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($details_id); ?>" class="theme-btn">
                                        <?php echo esc_html($details_product->single_add_to_cart_text()); ?>
                                    </button>
                                </form>
                            <?php else : ?>
                                <div class="button-wrapper">
                                    <a href="<?php echo esc_url($details_product->add_to_cart_url()); ?>"
                                        data-quantity="1"
                                        data-product_id="<?php echo esc_attr($details_id); ?>"
                                        rel="nofollow"
                                        class="theme-btn product_type_<?php echo esc_attr($details_product->get_type()); ?> add_to_cart_button<?php echo $details_product->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>">
                                        <?php echo esc_html($details_product->add_to_cart_text()); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php
                            if ('yes' === $settings['layout_two_show_wishlist_row']) :
                                /**
                                 * Storzen owns the wishlist and compare pages; link to whichever
                                 * it has configured and skip a link it can't resolve rather than
                                 * pointing the shopper at "#".
                                 */
                                $details_wishlist_url = function_exists('storzen_module_setting') && storzen_module_setting('wishlist', 'wishlist_page')
                                    ? get_permalink((int) storzen_module_setting('wishlist', 'wishlist_page'))
                                    : '';
                                $details_compare_url = function_exists('storzen_module_setting') && storzen_module_setting('compare', 'compare_page')
                                    ? get_permalink((int) storzen_module_setting('compare', 'compare_page'))
                                    : '';

                                if ($details_wishlist_url || $details_compare_url) :
                            ?>
                                    <div class="add-list-items">
                                        <?php if ($details_wishlist_url) : ?>
                                            <a href="<?php echo esc_url($details_wishlist_url); ?>"><i class="fa-regular fa-heart"></i> <?php esc_html_e('Add to Wishlist', 'grozomart-toolkit'); ?></a>
                                        <?php endif; ?>
                                        <?php if ($details_compare_url) : ?>
                                            <a href="<?php echo esc_url($details_compare_url); ?>"><i class="fa-solid fa-arrows-rotate"></i> <?php esc_html_e('Compare', 'grozomart-toolkit'); ?></a>
                                        <?php endif; ?>
                                    </div>
                            <?php
                                endif;
                            endif;
                            ?>

                            <?php if (!empty($settings['layout_two_icon_items'])) : ?>
                                <?php
                                // The design shows these as two columns, so split the list in half.
                                $details_icon_items  = $settings['layout_two_icon_items'];
                                $details_icon_chunks = array_chunk($details_icon_items, (int) ceil(count($details_icon_items) / 2));
                                ?>
                                <div class="icon-items">
                                    <?php foreach ($details_icon_chunks as $details_icon_chunk) : ?>
                                        <ul>
                                            <?php foreach ($details_icon_chunk as $details_icon_item) : ?>
                                                <li>
                                                    <div class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($details_icon_item['icon'], ['aria-hidden' => 'true']); ?>
                                                    </div>
                                                    <span><?php echo esc_html($details_icon_item['text']); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ('yes' === $settings['layout_two_show_meta']) : ?>
                                <ul class="list border-0 pb-0">
                                    <?php if (!empty($settings['layout_two_brand'])) : ?>
                                        <li>
                                            <span class="style-one"><?php esc_html_e('Brand :', 'grozomart-toolkit'); ?></span>
                                            <span><?php echo esc_html($settings['layout_two_brand']); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($details_cat_list)) : ?>
                                        <li>
                                            <span class="style-one"><?php esc_html_e('Category :', 'grozomart-toolkit'); ?></span>
                                            <span class="style-2"><?php echo wp_kses_post($details_cat_list); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php
                                    $details_tag_list = wc_get_product_tag_list($details_id, ', ');
                                    if (!empty($details_tag_list)) :
                                    ?>
                                        <li>
                                            <span class="style-one"><?php esc_html_e('Tags :', 'grozomart-toolkit'); ?></span>
                                            <span class="style-2"><?php echo wp_kses_post($details_tag_list); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php
                                    $details_share_url   = rawurlencode($details_product->get_permalink());
                                    $details_share_title = rawurlencode(wp_strip_all_tags($details_product->get_name()));
                                    $details_share_links = [
                                        'facebook-f'   => 'https://www.facebook.com/sharer/sharer.php?u=' . $details_share_url,
                                        'twitter'      => 'https://twitter.com/intent/tweet?url=' . $details_share_url . '&text=' . $details_share_title,
                                        'linkedin-in'  => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $details_share_url,
                                        'pinterest-p'  => 'https://pinterest.com/pin/create/button/?url=' . $details_share_url . '&description=' . $details_share_title,
                                    ];
                                    ?>
                                    <li>
                                        <span class="style-one"><?php esc_html_e('Share :', 'grozomart-toolkit'); ?></span>
                                        <div class="style-2">
                                            <div class="social-icon d-flex align-items-center">
                                                <?php foreach ($details_share_links as $details_share_icon => $details_share_link) : ?>
                                                    <a href="<?php echo esc_url($details_share_link); ?>" target="_blank" rel="noopener noreferrer">
                                                        <i class="fab fa-<?php echo esc_attr($details_share_icon); ?>"></i>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ('yes' === $settings['layout_two_show_tabs']) :

        /**
         * Related products reuse the Shop widget's own card renderer so both
         * places produce identical markup from one implementation.
         */
        $details_related_ids = wc_get_related_products($details_id, (int) $settings['layout_two_related_limit']);
        $details_renderers   = class_exists('\GrozomartToolkit\Helper\Grozomart_Shop_Filter') ? Grozomart_Shop_Filter::renderers() : [];

        $details_attributes = $details_product->get_attributes();
    ?>
        <!-- Shop-variable-Section Start -->
        <section class="shop-variable-section fix section-padding">
            <div class="container">
                <div class="shop-tab-wrapper">
                    <ul class="nav">
                        <li class="nav-item wow fadeInUp" data-wow-delay=".2s">
                            <a href="<?php echo esc_attr('#desc-' . $details_uid); ?>" data-bs-toggle="tab" class="nav-link active">
                                <?php echo esc_html($settings['layout_two_description_label']); ?>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInUp" data-wow-delay=".4s">
                            <a href="<?php echo esc_attr('#info-' . $details_uid); ?>" data-bs-toggle="tab" class="nav-link">
                                <?php echo esc_html($settings['layout_two_additional_label']); ?>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInUp" data-wow-delay=".6s">
                            <a href="<?php echo esc_attr('#reviews-' . $details_uid); ?>" data-bs-toggle="tab" class="nav-link">
                                <?php echo esc_html($settings['layout_two_reviews_label']); ?>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInUp" data-wow-delay=".8s">
                            <a href="<?php echo esc_attr('#related-' . $details_uid); ?>" data-bs-toggle="tab" class="nav-link">
                                <?php echo esc_html($settings['layout_two_related_label']); ?>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="<?php echo esc_attr('desc-' . $details_uid); ?>" class="tab-pane fade show active">
                            <div class="row g-4">
                                <div class="decption-content">
                                    <h3 class="decption-title">
                                        <?php echo esc_html(!empty($settings['layout_two_description_heading']) ? $settings['layout_two_description_heading'] : $details_product->get_name()); ?>
                                    </h3>
                                    <?php
                                    /**
                                     * The widget's own text wins when set. Falling back to the
                                     * product is only safe when that product wasn't built with
                                     * Elementor — otherwise get_description() returns the
                                     * serialized page layout (post_content), which renders the
                                     * whole product page again inside this tab.
                                     */
                                    if (!empty($settings['layout_two_description_text'])) {
                                        echo wp_kses_post($settings['layout_two_description_text']);
                                    } else {
                                        $details_document = class_exists('\Elementor\Plugin')
                                            ? \Elementor\Plugin::$instance->documents->get($details_id)
                                            : null;

                                        $details_description = ($details_document && $details_document->is_built_with_elementor())
                                            ? $details_product->get_short_description()
                                            : $details_product->get_description();

                                        if (!empty($details_description)) {
                                            echo wp_kses_post(wpautop($details_description));
                                        } elseif (current_user_can('edit_posts')) {
                                            echo '<p class="text">' . esc_html__('No description yet — add one in this widget’s “Description Content” setting.', 'grozomart-toolkit') . '</p>';
                                        }
                                    }
                                    ?>
                                    <?php if (!empty($settings['layout_two_description_list'])) : ?>
                                        <?php
                                        /**
                                         * The design shows this list as two dotted columns, so
                                         * split the items in half rather than emitting one long
                                         * list.
                                         */
                                        $details_dec_items  = $settings['layout_two_description_list'];
                                        $details_dec_chunks = array_chunk($details_dec_items, (int) ceil(count($details_dec_items) / 2));
                                        ?>
                                        <div class="dec-list">
                                            <?php foreach ($details_dec_chunks as $details_dec_chunk) : ?>
                                                <ul class="dot-list">
                                                    <?php foreach ($details_dec_chunk as $details_dec_item) : ?>
                                                        <li><?php echo esc_html($details_dec_item['text']); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div id="<?php echo esc_attr('info-' . $details_uid); ?>" class="tab-pane fade">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="info-box">
                                        <?php
                                        $details_has_rows = false;

                                        if ($details_product->get_weight()) {
                                            $details_has_rows = true;
                                        ?>
                                            <div class="info-row">
                                                <div class="title"><?php esc_html_e('Weight', 'grozomart-toolkit'); ?></div>
                                                <div class="value"><?php echo esc_html(wc_format_weight($details_product->get_weight())); ?></div>
                                            </div>
                                        <?php
                                        }

                                        if ($details_product->has_dimensions()) {
                                            $details_has_rows = true;
                                        ?>
                                            <div class="info-row">
                                                <div class="title"><?php esc_html_e('Dimensions', 'grozomart-toolkit'); ?></div>
                                                <div class="value"><?php echo esc_html(wc_format_dimensions($details_product->get_dimensions(false))); ?></div>
                                            </div>
                                        <?php
                                        }

                                        foreach ($details_attributes as $details_attribute) {
                                            if (!$details_attribute->get_visible()) {
                                                continue;
                                            }

                                            if ($details_attribute->is_taxonomy()) {
                                                $details_values = wc_get_product_terms($details_id, $details_attribute->get_name(), ['fields' => 'names']);
                                            } else {
                                                $details_values = $details_attribute->get_options();
                                            }

                                            if (empty($details_values)) {
                                                continue;
                                            }

                                            $details_has_rows = true;
                                        ?>
                                            <div class="info-row">
                                                <div class="title"><?php echo esc_html(wc_attribute_label($details_attribute->get_name())); ?></div>
                                                <div class="value"><?php echo esc_html(implode(', ', $details_values)); ?></div>
                                            </div>
                                        <?php
                                        }

                                        if (!$details_has_rows) {
                                            echo '<div class="info-row"><div class="value">' . esc_html__('No additional information available for this product.', 'grozomart-toolkit') . '</div></div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="<?php echo esc_attr('reviews-' . $details_uid); ?>" class="tab-pane fade">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="shop-review">
                                        <h3>
                                            <?php
                                            printf(
                                                /* translators: 1: review count, 2: product name */
                                                esc_html(_n('%1$s review for %2$s', '%1$s reviews for %2$s', $details_review_count, 'grozomart-toolkit')),
                                                esc_html(number_format_i18n($details_review_count)),
                                                esc_html($details_product->get_name())
                                            );
                                            ?>
                                        </h3>
                                        <?php if ($details_rating_count > 0) : ?>
                                            <div class="review-wrapper">
                                                <div class="review-score">
                                                    <h2><?php echo esc_html(number_format($details_average, 1)); ?></h2>
                                                    <div class="divider"></div>
                                                    <div class="stars">
                                                        <?php echo esc_html(str_repeat('★ ', max(0, (int) round($details_average)))); ?>
                                                    </div>
                                                    <p>
                                                        <?php
                                                        printf(
                                                            /* translators: %s: review count */
                                                            esc_html__('Average of %s reviews', 'grozomart-toolkit'),
                                                            esc_html(number_format_i18n($details_review_count))
                                                        );
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="review-bars">
                                                    <?php
                                                    $details_rating_counts = $details_product->get_rating_counts();
                                                    for ($details_star = 5; $details_star >= 1; $details_star--) :
                                                        $details_star_count = isset($details_rating_counts[$details_star]) ? (int) $details_rating_counts[$details_star] : 0;
                                                        $details_star_pct    = $details_rating_count > 0 ? round(($details_star_count / $details_rating_count) * 100) : 0;
                                                    ?>
                                                        <div class="bar-item<?php echo 1 === $details_star ? ' mb-0' : ''; ?>">
                                                            <span><i class="fa-solid fa-star"></i> <?php echo esc_html($details_star); ?></span>
                                                            <div class="progress">
                                                                <?php if ($details_star_pct > 0) : ?>
                                                                    <div class="fill" style="width:<?php echo esc_attr($details_star_pct); ?>%"></div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <strong><?php echo esc_html($details_star_count); ?></strong>
                                                        </div>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        $details_comments = get_comments([
                                            'post_id' => $details_id,
                                            'status'  => 'approve',
                                            'type'    => 'review',
                                        ]);

                                        foreach ($details_comments as $details_index => $details_comment) :
                                            $details_comment_rating = (int) get_comment_meta($details_comment->comment_ID, 'rating', true);
                                        ?>
                                            <div class="simple-info-item<?php echo 0 === $details_index ? ' style-info' : ''; ?>">
                                                <div class="thumb">
                                                    <?php echo get_avatar($details_comment, 80); ?>
                                                </div>
                                                <div class="info-content">
                                                    <?php if ($details_comment_rating > 0) : ?>
                                                        <div class="star-2">
                                                            <?php for ($i = 1; $i <= $details_comment_rating; $i++) : ?>
                                                                <i class="fa-solid fa-star"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <p class="style-3"><?php echo esc_html(get_comment_text($details_comment)); ?></p>
                                                    <h4>
                                                        <?php echo esc_html($details_comment->comment_author); ?>/
                                                        <span><?php echo esc_html(get_comment_date('', $details_comment)); ?></span>
                                                    </h4>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <?php
                                        /**
                                         * WooCommerce builds its review form inline inside
                                         * single-product-reviews.php — there is no separate
                                         * form template and no reusable helper for it. Load
                                         * that template directly (NOT comments_template(),
                                         * which resolves to the theme's own comments.php:
                                         * that renders blog-comment markup with no rating
                                         * field, and re-entering the comments stack from
                                         * inside a widget on a Single Product template makes
                                         * the page render itself again inside this tab).
                                         *
                                         * The template reads the global $post/$product, which
                                         * here are whatever page the widget sits on, so swap
                                         * them for this product and restore them afterwards.
                                         */
                                        if (comments_open($details_id)) :
                                        ?>
                                            <div class="contact-from-space-2 grozomart-wc-review-form">
                                                <?php
                                                global $post, $product;
                                                $details_prev_post    = $post;
                                                $details_prev_product = $product;

                                                $post    = get_post($details_id);
                                                $product = $details_product;
                                                setup_postdata($post);

                                                wc_get_template('single-product-reviews.php', ['product' => $details_product]);

                                                $post    = $details_prev_post;
                                                $product = $details_prev_product;
                                                if ($post) {
                                                    setup_postdata($post);
                                                }
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="<?php echo esc_attr('related-' . $details_uid); ?>" class="tab-pane fade">
                            <div class="section-title-area">
                                <div class="section-title">
                                    <h2><?php echo esc_html($settings['layout_two_related_title']); ?></h2>
                                </div>
                                <?php if (!empty($settings['layout_two_related_link']['url'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_two_related_link']['url']); ?>" class="theme-btn small-btn"><?php esc_html_e('View All', 'grozomart-toolkit'); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="best-seller-wrapper">
                                <?php
                                foreach ($details_related_ids as $details_related_id) :
                                    $details_related = wc_get_product($details_related_id);
                                    if (!$details_related instanceof WC_Product) {
                                        continue;
                                    }

                                    $details_related_image = $details_related->get_image_id();

                                    $details_related_discount = 0;
                                    if ($details_related->is_on_sale() && is_numeric($details_related->get_regular_price()) && (float) $details_related->get_regular_price() > 0) {
                                        $details_related_discount = round((((float) $details_related->get_regular_price() - (float) $details_related->get_sale_price()) / (float) $details_related->get_regular_price()) * 100);
                                    }
                                ?>
                                    <div class="shop-best-seller-items">
                                        <div class="thumb">
                                            <?php if ($details_related_image) : ?>
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url($details_related_image, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($details_related->get_name()); ?>">
                                            <?php endif; ?>
                                            <?php if ($details_related_discount > 0) : ?>
                                                <div class="discount">-<?php echo esc_html($details_related_discount); ?>%</div>
                                            <?php endif; ?>
                                            <ul class="gt-shop-icon d-grid justify-content-center align-items-center">
                                                <?php
                                                if (!empty($details_renderers['overlay_icons'])) {
                                                    $details_renderers['overlay_icons']($details_related);
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <?php
                                            $details_related_cats = wc_get_product_category_list($details_related->get_id());
                                            if (!empty($details_related_cats)) :
                                            ?>
                                                <span><?php echo wp_kses_post(wp_strip_all_tags($details_related_cats)); ?></span>
                                            <?php endif; ?>
                                            <h2 class="title">
                                                <a href="<?php echo esc_url($details_related->get_permalink()); ?>"><?php echo esc_html($details_related->get_name()); ?></a>
                                            </h2>
                                            <?php if (wc_review_ratings_enabled()) : ?>
                                                <div class="star">
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <i class="fas fa-star"></i>
                                                    <?php endfor; ?>
                                                    <span>(<?php echo esc_html(number_format($details_related->get_average_rating(), 2)); ?>)</span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="price-items">
                                                <div class="price">
                                                    <?php
                                                    if (!empty($details_renderers['price'])) {
                                                        $details_renderers['price']($details_related);
                                                    }
                                                    ?>
                                                </div>
                                                <a href="<?php echo esc_url($details_related->add_to_cart_url()); ?>"
                                                    data-quantity="1"
                                                    data-product_id="<?php echo esc_attr($details_related->get_id()); ?>"
                                                    data-product_sku="<?php echo esc_attr($details_related->get_sku()); ?>"
                                                    aria-label="<?php echo esc_attr($details_related->add_to_cart_description()); ?>"
                                                    rel="nofollow"
                                                    class="theme-btn small-btn product_type_<?php echo esc_attr($details_related->get_type()); ?> add_to_cart_button<?php echo $details_related->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>">
                                                    <?php echo esc_html($details_related->add_to_cart_text()); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
