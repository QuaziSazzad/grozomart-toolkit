<?php if ('layout_seven' == $settings['layout_type']) : ?>
    <!-- About Area start -->
    <section class="about-area-three pt-25 rpt-0 pb-100 rpb-65 rel z-1">
        <div class="container">
            <div class="row align-items-center gap-100">
                <div class="col-lg-6">
                    <div class="about-three-image rel z-1 mb-30 rmb-65 wow fadeInRight delay-0-2s">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_seven_image'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two-content rel z-1 wow fadeInLeft delay-0-2s">
                        <div class="section-title mb-60 rmb-40">
                            <?php if ($settings['layout_seven_sub_title']) : ?>
                                <span class="sub-title mb-15"><?php echo grozomart_kses_basic($settings['layout_seven_sub_title']); ?></span>
                            <?php endif; ?>
                            <?php if ($settings['layout_seven_title']) : ?>
                                <<?php echo esc_attr($settings['layout_seven_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_seven_title']); ?></<?php echo esc_attr($settings['layout_seven_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <div class="row gap-40">
                            <?php if (!empty($settings['layout_seven_features'])) : ?>
                                <?php foreach ($settings['layout_seven_features'] as $item) : ?>
                                    <div class="col-md-6">
                                        <div class="service-item style-three">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                            </div>
                                            <h4><a href="<?php echo esc_url($item['link']['url']); ?>" <?php if (!empty($item['link']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo grozomart_kses_basic($item['title']); ?></a></h4>
                                            <p><?php echo grozomart_kses_basic($item['description']); ?></p>
                                            <a href="<?php echo esc_url($item['link']['url']); ?>" <?php if (!empty($item['link']['is_external'])) : ?> target="_blank" <?php endif; ?> class="read-more"><?php echo grozomart_kses_basic($item['link_text']); ?> <i class="far fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-bg-shape">
            <?php grozomart_elementor_rendered_image($settings, 'layout_seven_bg_image'); ?>
        </div>
    </section>
    <!-- About Area end -->
<?php endif; ?>