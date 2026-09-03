<?php

use GrozomartTheme\Classes\Grozomart_Nav_Walker;

if ('layout_one' == $settings['layout_type']) :

    $header_cart_count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

    /**
     * Storzen's [storzen_wishlist_count] shortcode already computes the
     * count and its own JS live-updates any [data-sz-wishlist-count]
     * element on the page — pull just the number out of its markup so we
     * can render it inside the theme's own .cart-number badge instead of
     * Storzen's .sz-wishlist-counter styling, while keeping the same
     * data attribute so live updates still work.
     */
    $header_wishlist_count = shortcode_exists('storzen_wishlist_count') ? (int) wp_strip_all_tags(do_shortcode('[storzen_wishlist_count]')) : 0;
    $header_wishlist_url   = function_exists('storzen_module_setting') && storzen_module_setting('wishlist', 'wishlist_page')
        ? get_permalink((int) storzen_module_setting('wishlist', 'wishlist_page'))
        : '#';

    /**
     * Compare has no counter shortcode, but its JS watches the same
     * [data-sz-compare-count] attribute globally (compare.js:201) — so a
     * manually rendered span with that attribute still live-updates.
     */
    $header_compare_count = 0;
    if (!empty($_COOKIE['storzen_compare_list'])) {
        $header_compare_count = count(array_filter(explode(',', wp_unslash($_COOKIE['storzen_compare_list']))));
    }
    $header_compare_url = function_exists('storzen_module_setting') && storzen_module_setting('compare', 'compare_page')
        ? get_permalink((int) storzen_module_setting('compare', 'compare_page'))
        : '#';

    $header_categories = grozomart_select_category('product_cat');
    if (!empty($settings['layout_one_categories'])) {
        $header_categories = array_intersect_key($header_categories, array_flip($settings['layout_one_categories']));
    }
    $header_categories = array_slice($header_categories, 0, (int) $settings['layout_one_category_limit'], true);

    $header_logo_dimensions = '';
    if (!empty($settings['layout_one_logo_size']['width'])) {
        $header_logo_dimensions .= ' width="' . esc_attr($settings['layout_one_logo_size']['width']) . '"';
    }
    if (!empty($settings['layout_one_logo_size']['height'])) {
        $header_logo_dimensions .= ' height="' . esc_attr($settings['layout_one_logo_size']['height']) . '"';
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
                                <img src="<?php echo esc_url($settings['layout_one_logo']['url']); ?>"<?php echo $header_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fa-thin fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <?php if (!empty($settings['layout_one_offcanvas_text'])) : ?>
                        <p class="text d-none d-xl-block">
                            <?php echo esc_html($settings['layout_one_offcanvas_text']); ?>
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
                        <?php if (!empty($settings['layout_one_languages'])) : ?>
                            <div class="form">
                                <select class="single-select">
                                    <?php foreach ($settings['layout_one_languages'] as $language) : ?>
                                        <option><?php echo esc_html($language['option_label']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_currencies'])) : ?>
                            <div class="form">
                                <select class="single-select">
                                    <?php foreach ($settings['layout_one_currencies'] as $currency) : ?>
                                        <option><?php echo esc_html($currency['option_label']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($settings['layout_one_social_icons'])) : ?>
                    <div class="social-icon-list">
                        <?php if (!empty($settings['layout_one_social_title'])) : ?>
                            <span class="follow-title">
                                <?php echo esc_html($settings['layout_one_social_title']); ?>
                            </span>
                        <?php endif; ?>
                        <div class="social-icon d-flex align-items-center">
                            <?php foreach ($settings['layout_one_social_icons'] as $social_icon) : ?>
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
    <header class="header-section">
        <?php if (!empty($settings['layout_one_top_bar_text_one']) || !empty($settings['layout_one_top_bar_text_two'])) : ?>
            <div class="header-top">
                <div class="container">
                    <div class="header-top-wrapper">
                        <?php if (!empty($settings['layout_one_top_bar_text_one'])) : ?>
                            <p><?php echo wp_kses_post($settings['layout_one_top_bar_text_one']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_top_bar_text_two'])) : ?>
                            <p><?php echo wp_kses_post($settings['layout_one_top_bar_text_two']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="middle-list-items">
                <?php if (!empty($settings['layout_one_middle_links'])) : ?>
                    <ul class="middle-list">
                        <?php foreach ($settings['layout_one_middle_links'] as $middle_link) : ?>
                            <li>
                                <a href="<?php echo esc_url($middle_link['link_url']['url']); ?>" <?php echo !empty($middle_link['link_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($middle_link['link_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($middle_link['link_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="middle-right">
                    <?php if (!empty($settings['layout_one_languages'])) : ?>
                        <select class="single-select price-list w-100">
                            <?php foreach ($settings['layout_one_languages'] as $language) : ?>
                                <option><?php echo esc_html($language['option_label']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_one_currencies'])) : ?>
                        <select class="single-select price-list w-100">
                            <?php foreach ($settings['layout_one_currencies'] as $currency) : ?>
                                <option><?php echo esc_html($currency['option_label']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_one_contact_label'])) : ?>
                        <a href="<?php echo esc_url($settings['layout_one_contact_url']['url']); ?>" class="link-text" <?php echo !empty($settings['layout_one_contact_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_one_contact_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                            <?php echo esc_html($settings['layout_one_contact_label']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="middle-wrap-items">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                    <img src="<?php echo esc_url($settings['layout_one_logo']['url']); ?>"<?php echo $header_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </a>
                <form class="search-box" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (!empty($header_categories)) : ?>
                        <div class="category-select">
                            <select class="single-select price-list w-100" name="product_cat">
                                <option value=""><?php esc_html_e('All type', 'grozomart-toolkit'); ?></option>
                                <?php foreach ($header_categories as $cat_slug => $cat_name) : ?>
                                    <option value="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($cat_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search for products....', 'grozomart-toolkit'); ?>">
                    <input type="hidden" name="post_type" value="product">

                    <button class="search-btn" type="submit">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="icon-right-wrap">
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
                    <div class="header__hamburger my-auto d-xl-block">
                        <div class="sidebar__toggle">
                            <i class="fa-sharp fa-light fa-grid-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-sticky" class="header-1">
            <div class="container">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                            <img src="<?php echo esc_url($settings['layout_one_logo']['url']); ?>"<?php echo $header_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                        <?php if (!empty($header_categories)) : ?>
                            <div class="category-wrapper">
                                <button class="category-btn">
                                    <span class="icon">
                                        <i class="fa-regular fa-bars"></i>
                                    </span>
                                    <?php echo esc_html($settings['layout_one_category_label']); ?>
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
                                     * Grozomart_Nav_Walker doesn't override start_lvl(), so
                                     * WordPress emits its default `.sub-menu` class on the
                                     * dropdown <ul>. This markup's CSS only targets `.submenu`
                                     * — swap the class for just this menu render instead of
                                     * touching the shared theme walker.
                                     */
                                    $header_submenu_class_filter = function ($classes) {
                                        return array_merge(array_values(array_diff($classes, ['sub-menu'])), ['submenu']);
                                    };
                                    add_filter('nav_menu_submenu_css_class', $header_submenu_class_filter);

                                    /**
                                     * The walker's own submenu indicator is a bare, unstyled
                                     * <span class="submenu-toggler"> (no matching CSS in this
                                     * theme). The markup instead wants a literal chevron icon
                                     * inside the link for items with children — append it here
                                     * rather than editing the shared walker.
                                     */
                                    $header_menu_chevron_filter = function ($title, $item) {
                                        if (in_array('menu-item-has-children', $item->classes, true)) {
                                            $title .= ' <i class="fa-solid fa-chevron-down"></i>';
                                        }
                                        return $title;
                                    };
                                    add_filter('nav_menu_item_title', $header_menu_chevron_filter, 10, 2);

                                    wp_nav_menu(
                                        [
                                            'menu' => $settings['layout_one_nav_menu'],
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
                        <?php if (!empty($settings['layout_one_header_right_dropdowns'])) : ?>
                            <div class="header-right">
                                <?php foreach ($settings['layout_one_header_right_dropdowns'] as $dropdown) : ?>
                                    <?php
                                    $dropdown_categories = grozomart_select_category('product_cat');
                                    if (!empty($dropdown['dropdown_categories'])) {
                                        $dropdown_categories = array_intersect_key($dropdown_categories, array_flip($dropdown['dropdown_categories']));
                                    }
                                    ?>
                                    <div class="category-wrapper">
                                        <button class="category-btn">
                                            <?php echo esc_html($dropdown['dropdown_label']); ?>
                                            <?php if (!empty($dropdown['dropdown_badge'])) : ?>
                                                <span class="dis"><?php echo esc_html($dropdown['dropdown_badge']); ?></span>
                                            <?php endif; ?>
                                            <span class="arrow">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </button>
                                        <?php if (!empty($dropdown_categories)) : ?>
                                            <div class="category-dropdown">
                                                <ul>
                                                    <?php foreach ($dropdown_categories as $cat_slug => $cat_name) : ?>
                                                        <li><a href="<?php echo esc_url(get_term_link($cat_slug, 'product_cat')); ?>"><?php echo esc_html($cat_name); ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="header__hamburger my-auto d-xl-none">
                                    <div class="sidebar__toggle">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
