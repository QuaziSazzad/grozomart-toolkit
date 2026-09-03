<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Cta Banner Section Start -->
    <section class="cta-banner-section fix">
        <div class="container">
            <div class="cta-banner-wrapper">
                <div class="content">
                    <?php if (!empty($settings['layout_one_top_text'])) : ?>
                        <p class="top-text wow fadeInUp" data-wow-delay=".3s">
                            <?php echo wp_kses_post($settings['layout_one_top_text']); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($settings['layout_one_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h2'); ?> class="title wow fadeInUp" data-wow-delay=".5s">
                            <?php echo wp_kses_post($settings['layout_one_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h2'); ?>>
                    <?php endif; ?>

                    <?php if (!empty($settings['layout_one_description'])) : ?>
                        <p class="text wow fadeInUp" data-wow-delay=".7s">
                            <?php echo esc_html($settings['layout_one_description']); ?>
                        </p>
                    <?php endif; ?>

                    <div class="price-items wow fadeInUp" data-wow-delay=".9s">
                        <?php if (!empty($settings['layout_one_price'])) : ?>
                            <h3 class="price">
                                <?php if (!empty($settings['layout_one_price_currency'])) : ?>
                                    <sub><?php echo esc_html($settings['layout_one_price_currency']); ?></sub>
                                <?php endif; ?>
                                <?php echo esc_html($settings['layout_one_price']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_one_button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn" <?php echo !empty($settings['layout_one_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_one_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                <?php echo esc_html($settings['layout_one_button_label']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($settings['layout_one_image']['url'])) : ?>
                    <div class="chips-image">
                        <img src="<?php echo esc_url($settings['layout_one_image']['url']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($settings['layout_one_title'])); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
