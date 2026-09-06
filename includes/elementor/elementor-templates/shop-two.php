<?php

use GrozomartToolkit\Helper\Grozomart_Shop_Filter;

if ('layout_two' == $settings['layout_type']) :

    if (!class_exists('WooCommerce')) :
        if (current_user_can('manage_options')) :
?>
            <p><?php esc_html_e('WooCommerce is required for the Shop widget.', 'grozomart-toolkit'); ?></p>
<?php
        endif;
        return;
    endif;

    /**
     * The query and the card/list renderers live in Grozomart_Shop_Filter so
     * this template and the AJAX endpoint that re-renders the results column
     * (on every sidebar change, sort or page click) share one implementation
     * and produce identical markup.
     */
    $shop_two_renderers            = Grozomart_Shop_Filter::renderers();
    $shop_two_render_card          = $shop_two_renderers['card'];
    $shop_two_render_list_item     = $shop_two_renderers['list_item'];

    // ── Sidebar filter data ─────────────────────────────────────────────
    $shop_two_categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
    ]);
    if (is_wp_error($shop_two_categories)) {
        $shop_two_categories = [];
    }

    $shop_two_bounds       = Grozomart_Shop_Filter::price_bounds();
    $shop_two_price_floor  = $shop_two_bounds['floor'];
    $shop_two_price_ceil   = $shop_two_bounds['ceil'];

    $shop_two_selected_cats  = isset($_GET['product_cat']) ? array_filter(array_map('sanitize_title', (array) wp_unslash($_GET['product_cat']))) : [];
    $shop_two_selected_stock = isset($_GET['stock_status']) ? array_filter(array_map('sanitize_key', (array) wp_unslash($_GET['stock_status']))) : [];
    $shop_two_on_sale_only   = isset($_GET['on_sale']) && '1' === $_GET['on_sale'];
    $shop_two_selected_min   = isset($_GET['min_price']) ? max($shop_two_price_floor, (int) $_GET['min_price']) : $shop_two_price_floor;
    $shop_two_selected_max   = isset($_GET['max_price']) ? min($shop_two_price_ceil, (int) $_GET['max_price']) : $shop_two_price_ceil;

    $shop_two_stock_statuses = [
        'instock'    => esc_html__('In Stock', 'grozomart-toolkit'),
        'outofstock' => esc_html__('Out of Stock', 'grozomart-toolkit'),
    ];

    // ── Query ─────────────────────────────────────────────────────────────
    $shop_two_paged = max(1, (int) (get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : (isset($_GET['product_page']) ? absint($_GET['product_page']) : 1))));

    $shop_two_orderby_choice = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : $settings['layout_two_default_orderby'];

    $shop_two_query = Grozomart_Shop_Filter::query([
        'per_page'          => (int) $settings['layout_two_limit'],
        'paged'             => $shop_two_paged,
        'orderby_choice'    => $shop_two_orderby_choice,
        'selected_cats'     => $shop_two_selected_cats,
        'widget_categories' => !empty($settings['layout_two_categories']) ? (array) $settings['layout_two_categories'] : [],
        'selected_stock'    => $shop_two_selected_stock,
        'on_sale_only'      => $shop_two_on_sale_only,
        'selected_min'      => $shop_two_selected_min,
        'selected_max'      => $shop_two_selected_max,
        'bounds'            => $shop_two_bounds,
    ]);

    $shop_two_products = Grozomart_Shop_Filter::collect_products($shop_two_query);

    $shop_two_total    = (int) $shop_two_query->found_posts;
    $shop_two_per_page = (int) $settings['layout_two_limit'];
    $shop_two_first    = $shop_two_total ? (($shop_two_paged - 1) * $shop_two_per_page) + 1 : 0;
    $shop_two_last     = min($shop_two_total, $shop_two_paged * $shop_two_per_page);

    $shop_two_views          = Grozomart_Shop_Filter::views();
    $shop_two_sort_labels    = Grozomart_Shop_Filter::sort_labels();
    $shop_two_active_view    = Grozomart_Shop_Filter::active_view($_GET, $settings);
    $shop_two_uid            = $this->get_id();

    /**
     * Preserve every active filter across pagination/sort links and the
     * sort form's own submit — only orderby/product_page/paged are dropped
     * since those are what the respective control itself sets.
     */
    $shop_two_persist_query_args = function () {
        foreach ($_GET as $shop_two_key => $shop_two_val) {
            if (in_array($shop_two_key, ['orderby', 'product_page', 'paged'], true)) {
                continue;
            }
            $shop_two_val     = wp_unslash($shop_two_val);
            $shop_two_is_list = is_array($shop_two_val);
            foreach ((array) $shop_two_val as $shop_two_single_val) {
                echo '<input type="hidden" name="' . esc_attr($shop_two_key) . ($shop_two_is_list ? '[]' : '') . '" value="' . esc_attr($shop_two_single_val) . '">';
            }
        }
    };

    /**
     * Only the settings the results markup actually reads are handed to the
     * browser — the AJAX endpoint re-sanitizes them and reads query-shaping
     * settings (the category filter) from the saved document instead of
     * trusting the request.
     */
    $shop_two_js_settings = [
        'layout_two_limit'             => (int) $settings['layout_two_limit'],
        'layout_two_default_orderby'   => $settings['layout_two_default_orderby'],
        'layout_two_default_view'      => $settings['layout_two_default_view'],
        'layout_two_show_result_count' => $settings['layout_two_show_result_count'],
        'layout_two_show_view_tabs'    => $settings['layout_two_show_view_tabs'],
        'layout_two_show_ordering'     => $settings['layout_two_show_ordering'],
        'layout_two_show_pagination'   => $settings['layout_two_show_pagination'],
    ];
?>
    <!-- Shop Section Start -->
    <section class="shop-list-section fix grozomart-shop-filter"
        data-element-id="<?php echo esc_attr($shop_two_uid); ?>"
        data-post-id="<?php echo esc_attr(get_the_ID()); ?>"
        data-nonce="<?php echo esc_attr(wp_create_nonce(Grozomart_Shop_Filter::NONCE)); ?>"
        data-settings="<?php echo esc_attr(wp_json_encode($shop_two_js_settings)); ?>">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-3 order-2 order-lg-1">
                    <div class="shop-sidebar-area">
                        <form method="get" class="shop-filter-form" id="shop-filter-form-<?php echo esc_attr($shop_two_uid); ?>">
                            <?php if ('yes' === $settings['layout_two_show_category_filter']) : ?>
                                <div class="shop-sidebar-item active">
                                    <div class="sidebar-header">
                                        <div class="head-title"><?php esc_html_e('Product Categories', 'grozomart-toolkit'); ?></div>
                                        <i class="fas fa-chevron-down toggle-icon"></i>
                                    </div>
                                    <div class="sidebar-content">
                                        <div class="sidebar-inner">
                                            <div class="checkbox-group">
                                                <?php foreach ($shop_two_categories as $shop_two_category) : ?>
                                                    <label class="custom-checkbox">
                                                        <input type="checkbox" name="product_cat[]" value="<?php echo esc_attr($shop_two_category->slug); ?>" <?php checked(in_array($shop_two_category->slug, $shop_two_selected_cats, true)); ?>>
                                                        <span class="checkmark"></span>
                                                        <?php echo esc_html($shop_two_category->name); ?>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['layout_two_show_price_filter']) : ?>
                                <div class="shop-sidebar-item active">
                                    <div class="sidebar-header">
                                        <div class="head-title"><?php esc_html_e('Widget price filter', 'grozomart-toolkit'); ?></div>
                                        <i class="fas fa-chevron-down toggle-icon"></i>
                                    </div>
                                    <div class="sidebar-content">
                                        <div class="sidebar-inner">
                                            <div class="price-filter-widget">
                                                <div class="slider-wrapper">
                                                    <div class="slider-track"></div>
                                                    <input type="range" min="<?php echo esc_attr($shop_two_price_floor); ?>" max="<?php echo esc_attr($shop_two_price_ceil); ?>" value="<?php echo esc_attr($shop_two_selected_min); ?>" name="min_price" class="range-min">
                                                    <input type="range" min="<?php echo esc_attr($shop_two_price_floor); ?>" max="<?php echo esc_attr($shop_two_price_ceil); ?>" value="<?php echo esc_attr($shop_two_selected_max); ?>" name="max_price" class="range-max">
                                                </div>
                                                <div class="filter-bottom">
                                                    <div class="price-value">
                                                        <?php esc_html_e('Price:', 'grozomart-toolkit'); ?> <span>$<?php echo esc_html($shop_two_selected_min); ?> – $<?php echo esc_html($shop_two_selected_max); ?></span>
                                                    </div>
                                                    <button type="submit" class="filter-btn"><?php esc_html_e('Filter', 'grozomart-toolkit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['layout_two_show_status_filter']) : ?>
                                <div class="shop-sidebar-item active">
                                    <div class="sidebar-header">
                                        <div class="head-title"><?php esc_html_e('Product Status', 'grozomart-toolkit'); ?></div>
                                        <i class="fas fa-chevron-down toggle-icon"></i>
                                    </div>
                                    <div class="sidebar-content">
                                        <div class="sidebar-inner">
                                            <div class="checkbox-group">
                                                <?php foreach ($shop_two_stock_statuses as $shop_two_status_key => $shop_two_status_label) : ?>
                                                    <label class="custom-checkbox">
                                                        <input type="checkbox" name="stock_status[]" value="<?php echo esc_attr($shop_two_status_key); ?>" <?php checked(in_array($shop_two_status_key, $shop_two_selected_stock, true)); ?>>
                                                        <span class="checkmark"></span>
                                                        <?php echo esc_html($shop_two_status_label); ?>
                                                    </label>
                                                <?php endforeach; ?>
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" name="on_sale" value="1" <?php checked($shop_two_on_sale_only); ?>>
                                                    <span class="checkmark"></span>
                                                    <?php esc_html_e('On Sale', 'grozomart-toolkit'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 order-1 order-lg-2">
                    <div class="shop-filter-results">
                        <?php include grozomart_get_elementor_template('shop-two-results.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
<?php endif; ?>
