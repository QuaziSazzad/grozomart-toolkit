<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Modern IT Solutions Area start -->
    <section class="modern-it-solutions-area rel z-1">
        <div class="container-fluid">
            <div class="row gap-10">
                <?php if (!empty($settings['layout_two_image'])) : ?>
                    <div class="col-xl-4 col-lg-8">
                        <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <?php echo grozomart_elementor_rendered_image($settings, 'layout_two_image'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xl-8">
                    <div class="it-solutions-right-content bgc-black">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="left-content rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="section-title mb-50 rmb-40">
                                        <?php if (!empty($settings['layout_two_subtitle'])) : ?>
                                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_two_subtitle']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['layout_two_title'])) : ?>
                                            <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($settings['layout_two_description'])) : ?>
                                        <p><?php echo grozomart_kses_basic($settings['layout_two_description']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['layout_two_button_text']) && !empty($settings['layout_two_button_link']['url'])) : ?>
                                        <a href="<?php echo esc_url($settings['layout_two_button_link']['url']); ?>" <?php if (!empty($settings['layout_two_button_link']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn mt-35 rmt-20"><?php echo grozomart_kses_basic($settings['layout_two_button_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="it-solutions-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <?php if (!empty($settings['layout_two_features'])) : ?>
                                        <?php foreach ($settings['layout_two_features'] as $feature) : ?>
                                            <div class="it-solution-item">
                                                <?php if (!empty($feature['feature_title'])) : ?>
                                                    <h5><?php echo grozomart_kses_basic($feature['feature_title']); ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($feature['feature_description'])) : ?>
                                                    <p><?php echo grozomart_kses_basic($feature['feature_description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modern IT Solutions Area end -->
<?php endif; ?>