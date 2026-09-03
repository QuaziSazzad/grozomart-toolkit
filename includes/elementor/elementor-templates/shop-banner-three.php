<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Banner Section Start -->
    <section class="banner-section-2 section-padding pt-0 fix">
        <div class="container">
            <div class="row g-4">
                <?php if (!empty($settings['layout_three_banner_items'])) : ?>
                    <?php
                    $box_classes = ['banner-left-box-2', 'banner-right-box-2'];
                    $wow_delays  = ['.3s', '.5s'];
                    ?>
                    <?php foreach ($settings['layout_three_banner_items'] as $index => $item) : ?>
                        <?php
                        $box_class = $box_classes[$index % count($box_classes)];
                        $wow_delay = $wow_delays[$index % count($wow_delays)];
                        ?>
                        <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                            <div class="<?php echo esc_attr($box_class); ?>">
                                <?php if (!empty($item['banner_image']['url'])) : ?>
                                    <img src="<?php echo esc_url($item['banner_image']['url']); ?>" alt="<?php echo esc_attr($item['banner_title']); ?>">
                                <?php endif; ?>
                                <div class="content">
                                    <?php if (!empty($item['banner_icon']['url'])) : ?>
                                        <div class="icon">
                                            <img src="<?php echo esc_url($item['banner_icon']['url']); ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($item['banner_title'])) : ?>
                                        <h2 class="title">
                                            <?php echo esc_html($item['banner_title']); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if (!empty($item['banner_title_two'])) : ?>
                                        <h3 class="title-2">
                                            <?php echo esc_html($item['banner_title_two']); ?>
                                            <?php if (!empty($item['banner_expiry_text'])) : ?>
                                                <span><?php echo esc_html($item['banner_expiry_text']); ?></span>
                                            <?php endif; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (!empty($item['banner_button_label'])) : ?>
                                        <a href="<?php echo esc_url($item['banner_button_url']['url']); ?>" class="theme-btn" <?php echo !empty($item['banner_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($item['banner_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo esc_html($item['banner_button_label']); ?>
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
<?php endif; ?>
