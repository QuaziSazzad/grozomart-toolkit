<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Why Choose Us Area start -->
    <section class="why-choose-us-area pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="why-choose-content rmb-55" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_title']) || !empty($settings['layout_one_sub_title'])) : ?>
                            <div class="section-title mb-25">
                                <span class="sub-title mb-10"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                                <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                            </div>
                        <?php endif; ?>
                        <p class="summary-text"><?php echo grozomart_kses_basic($settings['layout_one_summary_text']); ?></p>
                        <?php if (!empty($settings['layout_one_button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn mt-20 mb-50" <?php echo ($settings['layout_one_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_one_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($settings['layout_one_button_label']); ?></a>
                        <?php endif; ?>
                        <div class="row" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_one_feature_items'])) : ?>
                                <?php foreach ($settings['layout_one_feature_items'] as $item) : ?>
                                    <div class="col-lg-6">
                                        <div class="feature-item-two">
                                            <div class="icon"> <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?></div>
                                            <h5>
                                                <a href="<?php echo esc_url($item['feature_url']['url']); ?>" <?php echo ($item['feature_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($item['feature_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                    <?php echo esc_html($item['feature_title']); ?>
                                                </a>
                                            </h5>
                                            <p><?php echo grozomart_kses_basic($item['feature_description']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="why-choose-images">
                        <div class="left" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image_one'); ?>
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image_two'); ?>
                        </div>
                        <div class="right" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image_three'); ?>
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image_four'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area end -->
<?php endif; ?>