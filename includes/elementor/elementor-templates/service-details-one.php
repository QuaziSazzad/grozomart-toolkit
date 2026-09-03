<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Service Details Content Area start -->
    <section class="service-details-content-area py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mb-50 rmb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_subtitle'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_one_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if (!empty($settings['layout_one_image_1']['url'])) : ?>
                        <div class="image" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image_1'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row align-items-center mt-40 rmt-30">
                <div class="col-lg-6">
                    <?php if (!empty($settings['layout_one_image_2']['url'])) : ?>
                        <div class="image rmb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image_2'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <div class="content" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_description'])) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_one_description']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_one_features'])) : ?>
                            <ul class="list-style-two mt-30">
                                <?php foreach ($settings['layout_one_features'] as $item) : ?>
                                    <?php if (!empty($item['feature_text'])) : ?>
                                        <li>
                                            <?php \Elementor\Icons_Manager::render_icon($item['feature_icon'], ['aria-hidden' => 'true']); ?>
                                            <?php echo grozomart_kses_basic($item['feature_text']); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Details Content Area end -->
<?php endif; ?>