<?php

use GrozomartTheme\Classes\Grozomart_Nav_Walker;

if ('layout_two' == $settings['layout_type']) :

    $header_cart_count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

    /**
     * See header-one.php for why these are derived this way: Storzen's own
     * shortcode/JS already own the live-updating count, we just render it
     * inside the theme's .cart-number badge and keep the same data
     * attribute so Storzen's JS still finds and updates it.
     */
    $header_wishlist_count = shortcode_exists('storzen_wishlist_count') ? (int) wp_strip_all_tags(do_shortcode('[storzen_wishlist_count]')) : 0;
    $header_wishlist_url   = function_exists('storzen_module_setting') && storzen_module_setting('wishlist', 'wishlist_page')
        ? get_permalink((int) storzen_module_setting('wishlist', 'wishlist_page'))
        : '#';

    $header_compare_count = 0;
    if (!empty($_COOKIE['storzen_compare_list'])) {
        $header_compare_count = count(array_filter(explode(',', wp_unslash($_COOKIE['storzen_compare_list']))));
    }
    $header_compare_url = function_exists('storzen_module_setting') && storzen_module_setting('compare', 'compare_page')
        ? get_permalink((int) storzen_module_setting('compare', 'compare_page'))
        : '#';

    $header_categories = grozomart_select_category('product_cat');
    if (!empty($settings['layout_two_categories'])) {
        $header_categories = array_intersect_key($header_categories, array_flip($settings['layout_two_categories']));
    }
    $header_categories = array_slice($header_categories, 0, (int) $settings['layout_two_category_limit'], true);

    $header_logo_dimensions = '';
    if (!empty($settings['layout_two_logo_size']['width'])) {
        $header_logo_dimensions .= ' width="' . esc_attr($settings['layout_two_logo_size']['width']) . '"';
    }
    if (!empty($settings['layout_two_logo_size']['height'])) {
        $header_logo_dimensions .= ' height="' . esc_attr($settings['layout_two_logo_size']['height']) . '"';
    }
    ?>
    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($settings['layout_two_logo']['url']); ?>"<?php echo $header_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fa-thin fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <?php if (!empty($settings['layout_two_offcanvas_text'])) : ?>
                        <p class="text d-none d-xl-block">
                            <?php echo esc_html($settings['layout_two_offcanvas_text']); ?>
                        </p>
                    <?php endif; ?>
                    <div class="mobile-menu fix"></div>
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search for products....', 'grozomart-toolkit'); ?>">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                    </form>
                    <div class="shop-icon-list">
                        <a href="<?php echo esc_url($header_wishlist_url); ?>" class="cart-icon">
                            <i class="fa-regular fa-heart"></i>
                            <span class="cart-number" data-sz-wishlist-count><?php echo esc_html($header_wishlist_count); ?></span>
                        </a>
                        <a href="<?php echo esc_url($header_compare_url); ?>" class="cart-icon">
                            <i class="fa-solid fa-arrows-rotate"></i>
                            <span class="cart-number" data-sz-compare-count><?php echo esc_html($header_compare_count); ?></span>
                        </a>
                        <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#'); ?>" class="cart-icon">
                            <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                            <span class="cart-number"><?php echo esc_html($header_cart_count); ?></span>
                        </a>
                    </div>
                    <div class="head-right">
                        <?php if (!empty($settings['layout_two_languages'])) : ?>
                            <div class="form">
                                <select class="single-select">
                                    <?php foreach ($settings['layout_two_languages'] as $language) : ?>
                                        <option><?php echo esc_html($language['option_label']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_currencies'])) : ?>
                            <div class="form">
                                <select class="single-select">
                                    <?php foreach ($settings['layout_two_currencies'] as $currency) : ?>
                                        <option><?php echo esc_html($currency['option_label']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($settings['layout_two_social_icons'])) : ?>
                    <div class="social-icon-list">
                        <?php if (!empty($settings['layout_two_social_title'])) : ?>
                            <span class="follow-title">
                                <?php echo esc_html($settings['layout_two_social_title']); ?>
                            </span>
                        <?php endif; ?>
                        <div class="social-icon d-flex align-items-center">
                            <?php foreach ($settings['layout_two_social_icons'] as $social_icon) : ?>
                                <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true']); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Header Section Start -->
    <header class="header-section-two">
        <div class="header-top">
            <div class="container">
                <div class="middle-list-items">
                    <ul class="middle-list">
                        <?php if (!empty($settings['layout_two_promo_text'])) : ?>
                            <li>
                                <?php echo esc_html($settings['layout_two_promo_text']); ?>
                                <?php if (!empty($settings['layout_two_promo_link_label'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_two_promo_link_url']['url']); ?>" <?php echo !empty($settings['layout_two_promo_link_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_promo_link_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                        <?php echo esc_html($settings['layout_two_promo_link_label']); ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_promo_text']) && !empty($settings['layout_two_track_text'])) : ?>
                            <li>|</li>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_track_text'])) : ?>
                            <li>
                                <i class="fa-sharp fa-regular fa-truck"></i> <?php echo esc_html($settings['layout_two_track_text']); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="middle-right">
                        <?php if (!empty($settings['layout_two_order_tracking_label'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_two_order_tracking_url']['url']); ?>" class="link-text" <?php echo !empty($settings['layout_two_order_tracking_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_order_tracking_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                <?php echo esc_html($settings['layout_two_order_tracking_label']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_about_label'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_two_about_url']['url']); ?>" class="link-text" <?php echo !empty($settings['layout_two_about_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_about_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                <?php echo esc_html($settings['layout_two_about_label']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_languages'])) : ?>
                            <select class="single-select price-list">
                                <?php foreach ($settings['layout_two_languages'] as $language) : ?>
                                    <option><?php echo esc_html($language['option_label']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_currencies'])) : ?>
                            <select class="single-select price-list">
                                <?php foreach ($settings['layout_two_currencies'] as $currency) : ?>
                                    <option><?php echo esc_html($currency['option_label']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="middle-wrap-items">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                    <img src="<?php echo esc_url($settings['layout_two_logo']['url']); ?>"<?php echo $header_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </a>
                <form class="search-box" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (!empty($header_categories)) : ?>
                        <div class="category-select">
                            <select class="single-select price-list w-100" name="product_cat">
                                <option value=""><?php esc_html_e('All categories', 'grozomart-toolkit'); ?></option>
                                <?php foreach ($header_categories as $cat_slug => $cat_name) : ?>
                                    <option value="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($cat_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    |
                    <input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search for products, categories or brands...', 'grozomart-toolkit'); ?>">
                    <input type="hidden" name="post_type" value="product">

                    <button class="search-btn" type="submit">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="icon-right-wrap">
                    <div class="shop-icon-list">
                        <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : '#'); ?>" class="cart-icon">
                            <i class="fa-regular fa-user"></i>
                            <?php esc_html_e('Profile', 'grozomart-toolkit'); ?>
                        </a>
                        <a href="<?php echo esc_url($header_wishlist_url); ?>" class="cart-icon">
                            <i class="fa-regular fa-heart"></i>
                            <span class="cart-number" data-sz-wishlist-count><?php echo esc_html($header_wishlist_count); ?></span>
                            <?php esc_html_e('Wishlist', 'grozomart-toolkit'); ?>
                        </a>
                        <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#'); ?>" class="cart-icon">
                            <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                            <span class="cart-number"><?php echo esc_html($header_cart_count); ?></span>
                            <?php esc_html_e('Cart', 'grozomart-toolkit'); ?>
                        </a>
                    </div>
                    <div class="header__hamburger my-auto d-xl-none">
                        <div class="sidebar__toggle">
                            <i class="fa-sharp fa-light fa-grid-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-sticky" class="header-2">
            <div class="container">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                            <img src="<?php echo esc_url($settings['layout_two_logo']['url']); ?>"<?php echo $header_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                        <?php if (!empty($header_categories)) : ?>
                            <div class="category-wrapper">
                                <button class="category-btn">
                                    <span class="icon">
                                        <i class="fa-regular fa-bars"></i>
                                    </span>
                                    <?php echo esc_html($settings['layout_two_category_label']); ?>
                                    <span class="arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </button>
                                <div class="category-dropdown">
                                    <ul>
                                        <?php foreach ($header_categories as $cat_slug => $cat_name) : ?>
                                            <li><a href="<?php echo esc_url(get_term_link($cat_slug, 'product_cat')); ?>"><?php echo esc_html($cat_name); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <?php
                                    /**
                                     * See header-one.php for why these two filters exist:
                                     * the shared walker emits `.sub-menu` (no matching CSS
                                     * here) and has no chevron indicator for this design.
                                     */
                                    $header_submenu_class_filter = function ($classes) {
                                        return array_merge(array_values(array_diff($classes, ['sub-menu'])), ['submenu']);
                                    };
                                    add_filter('nav_menu_submenu_css_class', $header_submenu_class_filter);

                                    $header_menu_chevron_filter = function ($title, $item) {
                                        if (in_array('menu-item-has-children', $item->classes, true)) {
                                            $title .= ' <i class="fa-solid fa-chevron-down"></i>';
                                        }
                                        return $title;
                                    };
                                    add_filter('nav_menu_item_title', $header_menu_chevron_filter, 10, 2);

                                    wp_nav_menu(
                                        [
                                            'menu' => $settings['layout_two_nav_menu'],
                                            'container' => false,
                                            'items_wrap' => '<ul>%3$s</ul>',
                                            'fallback_cb' => false,
                                            'walker' => new Grozomart_Nav_Walker(),
                                        ]
                                    );

                                    remove_filter('nav_menu_submenu_css_class', $header_submenu_class_filter);
                                    remove_filter('nav_menu_item_title', $header_menu_chevron_filter, 10);
                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="header-right">
                            <?php if (!empty($settings['layout_two_contact_number'])) : ?>
                                <div class="header-contacta">
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['layout_two_contact_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="content">
                                        <?php if (!empty($settings['layout_two_contact_text'])) : ?>
                                            <p><?php echo esc_html($settings['layout_two_contact_text']); ?></p>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_attr($settings['layout_two_contact_url']); ?>"><?php echo esc_html($settings['layout_two_contact_number']); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="header__hamburger my-auto d-xl-none">
                                <div class="sidebar__toggle">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
