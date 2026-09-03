<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Shop Banner Section Start -->
    <section class="shop-banner-section fix section-padding pt-0">
        <div class="container">
            <div class="row g-4">
                <?php if (!empty($settings['layout_one_banner_items'])) : ?>
                    <?php
                    $thumb_classes = ['thumb', 'thumb-2', 'thumb-3'];
                    $wow_delays    = ['.3s', '.5s', '.7s'];
                    ?>
                    <?php foreach ($settings['layout_one_banner_items'] as $index => $item) : ?>
                        <?php
                        $thumb_class = $thumb_classes[$index % count($thumb_classes)];
                        $wow_delay   = $wow_delays[$index % count($wow_delays)];
                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                            <div class="shop-banner-items">
                                <div class="content">
                                    <?php if (!empty($item['banner_sub_title'])) : ?>
                                        <span><?php echo esc_html($item['banner_sub_title']); ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($item['banner_title'])) : ?>
                                        <h2 class="title">
                                            <?php echo wp_kses_post($item['banner_title']); ?>
                                        </h2>
                                    <?php endif; ?>

                                    <?php if (!empty($item['banner_description'])) : ?>
                                        <p><?php echo esc_html($item['banner_description']); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($item['banner_button_label'])) : ?>
                                        <a href="<?php echo esc_url($item['banner_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($item['banner_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($item['banner_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo esc_html($item['banner_button_label']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($item['banner_image']['url'])) : ?>
                                    <div class="<?php echo esc_attr($thumb_class); ?>">
                                        <img src="<?php echo esc_url($item['banner_image']['url']); ?>" alt="<?php echo esc_attr($item['banner_sub_title']); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
