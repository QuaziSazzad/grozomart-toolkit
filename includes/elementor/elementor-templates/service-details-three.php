<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Service Details Content Area start -->
    <section class="service-details-content-area rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="solution-beyond-content rmb-50" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <?php if (!empty($settings['layout_three_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_three_description'])) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_three_description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_three_features'])) : ?>
                            <ul class="list-style-two mt-40">
                                <?php foreach ($settings['layout_three_features'] as $feature) : ?>
                                    <li>
                                        <?php \Elementor\Icons_Manager::render_icon($feature['feature_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                        <?php echo grozomart_kses_basic($feature['feature_text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="image" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_three_image'])) : ?>
                            <?php echo grozomart_elementor_rendered_image($settings, 'layout_three_image'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Details Content Area end -->
<?php endif; ?>