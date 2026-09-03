<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- About Company Area start -->
    <section class="about-company-area pt-130 rpt-100 rel z-1">
        <div class="container-fluid">
            <div class="about-inner pb-100 rpb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="section-title mb-50 rmb-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php if ($settings['layout_two_sub_title']) : ?>
                                    <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_two_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_title'])) : ?>
                                    <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="about-images" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <div class="left">
                                    <?php grozomart_elementor_rendered_image($settings, 'layout_two_image_one'); ?>
                                </div>
                                <div class="right">
                                    <?php grozomart_elementor_rendered_image($settings, 'layout_two_image_two'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="about-content mb-30 rmt-20" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                <?php if ($settings['layout_two_summary_text']) : ?>
                                    <p><?php echo grozomart_kses_basic($settings['layout_two_summary_text']); ?></p>
                                <?php endif; ?>
                                <ul class="list-style-one mt-35">
                                    <?php foreach ($settings['layout_two_checklist'] as $check) : ?>
                                        <li><?php \Elementor\Icons_Manager::render_icon($check['icon'], ['aria-hidden' => 'true'], 'i'); ?> <?php echo esc_html($check['title']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if (!empty($settings['layout_two_button_label'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_two_button_url']['url']); ?>" class="theme-btn style-three mt-55 rmt-40" <?php echo ($settings['layout_two_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_two_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($settings['layout_two_button_label']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Company Area end -->
<?php endif; ?>