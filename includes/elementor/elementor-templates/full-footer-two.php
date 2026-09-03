<?php if ('layout_two' == $settings['layout_type']) :

    $footer_logo_dimensions = '';
    if (!empty($settings['layout_two_logo_size']['width'])) {
        $footer_logo_dimensions .= ' width="' . esc_attr($settings['layout_two_logo_size']['width']) . '"';
    }
    if (!empty($settings['layout_two_logo_size']['height'])) {
        $footer_logo_dimensions .= ' height="' . esc_attr($settings['layout_two_logo_size']['height']) . '"';
    }

    /**
     * Both link columns share the same markup; render them from one
     * closure instead of repeating the block twice.
     */
    $footer_render_column = function ($title, $links, $wow_delay) {
        if (empty($title) && empty($links)) {
            return;
        }
    ?>
        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
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
    <footer class="footer-section-2 fix">
        <div class="container">
            <div class="footer-widget-wrapper-2">
                <div class="row g-4 justify-content-between">
                    <div class="col-xl-4 col-lg-6 col-md-12 wow fadeInUp">
                        <div class="footer-widget-items">
                            <?php if (!empty($settings['layout_two_logo']['url'])) : ?>
                                <div class="widget-head">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url($settings['layout_two_logo']['url']); ?>"<?php echo $footer_logo_dimensions; ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="footer-content">
                                <?php if (!empty($settings['layout_two_about_text'])) : ?>
                                    <p class="text-1">
                                        <?php echo esc_html($settings['layout_two_about_text']); ?>
                                    </p>
                                <?php endif; ?>
                                <form class="mc-form">
                                    <input type="email" class="mc-form__input" name="email" required placeholder="<?php echo esc_attr($settings['layout_two_newsletter_placeholder']); ?>">
                                    <button class="theme-btn" type="submit">
                                        <?php echo esc_html($settings['layout_two_newsletter_button']); ?>
                                    </button>
                                </form>
                                <p class="mc-form__feedback"></p>
                                <?php if (!empty($settings['layout_two_app_buttons'])) : ?>
                                    <div class="app-items">
                                        <?php foreach ($settings['layout_two_app_buttons'] as $app_button) : ?>
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
                    </div>
                    <?php
                    $footer_render_column($settings['layout_two_column_one_title'], $settings['layout_two_column_one_links'], '.4s');
                    $footer_render_column($settings['layout_two_column_two_title'], $settings['layout_two_column_two_links'], '.6s');
                    ?>
                    <div class="col-xl-3 col-lg-6 ps-xl-5 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="footer-widget-items">
                            <?php if (!empty($settings['layout_two_locations_title'])) : ?>
                                <div class="widget-head">
                                    <h3 class="title"><?php echo esc_html($settings['layout_two_locations_title']); ?></h3>
                                </div>
                            <?php endif; ?>
                            <div class="footer-content">
                                <?php if (!empty($settings['layout_two_location_address'])) : ?>
                                    <span class="location">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['layout_two_location_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php echo esc_html($settings['layout_two_location_address']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_hours_title'])) : ?>
                                    <h3 class="title-2">
                                        <?php echo esc_html($settings['layout_two_hours_title']); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_hours_text'])) : ?>
                                    <p><?php echo wp_kses_post($settings['layout_two_hours_text']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-wrapper">
                <?php if (!empty($settings['layout_two_copyright'])) : ?>
                    <p>
                        <?php echo wp_kses_post($settings['layout_two_copyright']); ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($settings['layout_two_languages'])) : ?>
                    <div class="language-switcher">
                        <!-- Main Language Button -->
                        <button class="language-btn" type="button">
                            <span><?php echo esc_html($settings['layout_two_language_label']); ?></span>

                            <span class="arrow">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </button>

                        <!-- Language Dropdown -->
                        <ul class="language-dropdown">
                            <?php foreach ($settings['layout_two_languages'] as $language) : ?>
                                <li>
                                    <a href="<?php echo esc_url($language['language_url']['url']); ?>" <?php echo !empty($language['language_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($language['language_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                        <?php echo esc_html($language['language_label']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['layout_two_flag_image']['url'])) : ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($settings['layout_two_flag_image']['url']); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>
<?php endif; ?>
