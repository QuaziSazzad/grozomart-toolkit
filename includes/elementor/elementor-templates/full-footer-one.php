<?php if ('layout_one' == $settings['layout_type']) :

    $footer_logo_dimensions = '';
    if (!empty($settings['layout_one_logo_size']['width'])) {
        $footer_logo_dimensions .= ' width="' . esc_attr($settings['layout_one_logo_size']['width']) . '"';
    }
    if (!empty($settings['layout_one_logo_size']['height'])) {
        $footer_logo_dimensions .= ' height="' . esc_attr($settings['layout_one_logo_size']['height']) . '"';
    }

    /**
     * The three link columns share the same markup; render them from one
     * closure instead of repeating the block three times.
     */
    $footer_render_column = function ($title, $links, $col_class, $wow_delay) {
        if (empty($title) && empty($links)) {
            return;
        }
?>
        <div class="<?php echo esc_attr($col_class); ?> wow fadeInUp" <?php echo $wow_delay ? 'data-wow-delay="' . esc_attr($wow_delay) . '"' : ''; ?>>
            <div class="footer-widget-items">
                <?php if (!empty($title)) : ?>
                    <div class="widget-head">
                        <h3 class="title"><?php echo esc_html($title); ?></h3>
                    </div>
                <?php endif; ?>
                <?php if (!empty($links)) : ?>
                    <ul class="list-area">
                        <?php foreach ($links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['link_url']['url']); ?>" <?php echo !empty($link['link_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($link['link_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($link['link_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    <?php
    };
    ?>
    <!-- Footer Section Start -->
    <footer class="footer-section fix">
        <div class="container">
            <div class="footer-top-wrapper">
                <div class="newsletter-content wow fadeInUp" data-wow-delay=".3s">
                    <?php if (!empty($settings['layout_one_newsletter_title'])) : ?>
                        <h2 class="title">
                            <?php echo esc_html($settings['layout_one_newsletter_title']); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_one_newsletter_text'])) : ?>
                        <p class="text">
                            <?php echo esc_html($settings['layout_one_newsletter_text']); ?>
                        </p>
                    <?php endif; ?>
                    <form class="mc-form">
                        <input type="email" class="mc-form__input" name="email" required placeholder="<?php echo esc_attr($settings['layout_one_newsletter_placeholder']); ?>">
                        <button class="theme-btn" type="submit">
                            <?php echo esc_html($settings['layout_one_newsletter_button']); ?>
                        </button>
                    </form>
                    <p class="mc-form__feedback text-white"></p>
                    <?php if (!empty($settings['layout_one_newsletter_consent'])) : ?>
                        <label class="sq-checkbox">
                            <input type="checkbox">
                            <span class="box" aria-hidden="true">
                                <svg viewBox="0 0 24 24" class="check" focusable="false" aria-hidden="true">
                                    <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="label-text"><?php echo wp_kses_post($settings['layout_one_newsletter_consent']); ?></span>
                        </label>
                    <?php endif; ?>
                </div>
                <div class="content-two wow fadeInUp" data-wow-delay=".5s">
                    <?php if (!empty($settings['layout_one_help_title'])) : ?>
                        <h2 class="title">
                            <?php echo esc_html($settings['layout_one_help_title']); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_one_help_text'])) : ?>
                        <div class="text">
                            <?php echo esc_html($settings['layout_one_help_text']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="call-info">
                        <div class="icon">
                            <?php if (!empty($settings['layout_one_help_icon']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['layout_one_help_icon']['url']); ?>" alt="<?php echo esc_attr($settings['layout_one_help_label']); ?>">
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_help_label'])) : ?>
                                <p><?php echo esc_html($settings['layout_one_help_label']); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_one_help_number'])) : ?>
                            <a class="number" href="<?php echo esc_attr($settings['layout_one_help_number_url']); ?>"><?php echo esc_html($settings['layout_one_help_number']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="footer-widget-wrapper">
                <div class="row g-4 justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-4 wow fadeInUp">
                        <div class="footer-widget-items">
                            <?php if (!empty($settings['layout_one_logo']['url'])) : ?>
                                <div class="widget-head">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url($settings['layout_one_logo']['url']); ?>" <?php echo $footer_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="footer-content">
                                <?php if (!empty($settings['layout_one_about_text'])) : ?>
                                    <p class="text-1 text-white">
                                        <?php echo esc_html($settings['layout_one_about_text']); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_one_address'])) : ?>
                                    <p class="text-2">
                                        <?php echo esc_html($settings['layout_one_address']); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_one_email'])) : ?>
                                    <p class="text-3">
                                        <a href="mailto:<?php echo esc_attr($settings['layout_one_email']); ?>"><?php echo esc_html($settings['layout_one_email']); ?></a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $footer_render_column($settings['layout_one_column_one_title'], $settings['layout_one_column_one_links'], 'col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6', '.2s');
                    $footer_render_column($settings['layout_one_column_two_title'], $settings['layout_one_column_two_links'], 'col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6', '.4s');
                    $footer_render_column($settings['layout_one_column_three_title'], $settings['layout_one_column_three_links'], 'col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6', '.6s');
                    ?>
                    <?php if (!empty($settings['layout_one_app_title']) || !empty($settings['layout_one_app_buttons'])) : ?>
                        <div class="col-xl-2 col-lg-5 ps-xl-5 col-md-6 col-6 wow fadeInUp" data-wow-delay=".8s">
                            <div class="footer-widget-items">
                                <?php if (!empty($settings['layout_one_app_title'])) : ?>
                                    <div class="widget-head">
                                        <h3 class="title"><?php echo esc_html($settings['layout_one_app_title']); ?></h3>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_one_app_buttons'])) : ?>
                                    <div class="app-items">
                                        <?php foreach ($settings['layout_one_app_buttons'] as $app_button) : ?>
                                            <?php if (empty($app_button['app_image']['url'])) {
                                                continue;
                                            } ?>
                                            <a href="<?php echo esc_url($app_button['app_url']['url']); ?>" <?php echo !empty($app_button['app_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($app_button['app_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                <img src="<?php echo esc_url($app_button['app_image']['url']); ?>" alt="">
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-bottom-wrapper">
                <?php if (!empty($settings['layout_one_copyright'])) : ?>
                    <p>
                        <?php echo wp_kses_post($settings['layout_one_copyright']); ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($settings['layout_one_payment_image']['url'])) : ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($settings['layout_one_payment_image']['url']); ?>" alt="<?php echo esc_attr(grozomart_get_elementor_thumbnail_alt($settings['layout_one_payment_image']['id'])); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>
<?php endif; ?>