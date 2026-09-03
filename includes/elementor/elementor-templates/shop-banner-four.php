<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Shop Banner Section Start -->
    <section class="shop-banner-section-two">
        <div class="container">
            <div class="row g-4">
                <?php if (!empty($settings['layout_four_banner_items'])) : ?>
                    <?php $wow_delays = ['.3s', '.5s', '.7s']; ?>
                    <?php foreach ($settings['layout_four_banner_items'] as $index => $item) : ?>
                        <?php $wow_delay = $wow_delays[$index % count($wow_delays)]; ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                            <div class="shop-banner-twos">
                                <?php if (!empty($item['banner_image']['url'])) : ?>
                                    <img src="<?php echo esc_url($item['banner_image']['url']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($item['banner_title'])); ?>">
                                <?php endif; ?>
                                <div class="content">
                                    <?php if (!empty($item['banner_title'])) : ?>
                                        <h2 class="title">
                                            <?php echo wp_kses_post($item['banner_title']); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if (!empty($item['banner_price'])) : ?>
                                        <p>
                                            <?php echo esc_html($item['banner_price_label']); ?> <span><?php echo esc_html($item['banner_price']); ?></span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($item['banner_button_label'])) : ?>
                                        <a href="<?php echo esc_url($item['banner_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($item['banner_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($item['banner_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo esc_html($item['banner_button_label']); ?> <i class="fa-regular fa-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Shop Banner Section End -->
<?php endif; ?>
