<?php if ('layout_four' == $settings['layout_type']) : ?>

    <!-- Hero area start -->
    <section class="hero-area-four bgc-primary pt-215 rpt-150 pb-100 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11">
                    <div class="hero-content style-four text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span class="subtitle-one mb-20" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php \Elementor\Icons_Manager::render_icon($settings['banner_four_subtitle_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                            <?php echo grozomart_kses_basic($settings['banner_four_subtitle']); ?>
                        </span>
                        <<?php echo esc_attr($settings['layout_four_title_tag']); ?> data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50"><?php echo grozomart_kses_basic($settings['banner_four_title']); ?></<?php echo esc_attr($settings['layout_four_title_tag']); ?>>
                        <div class="row justify-content-center pt-5 rpt-0 pb-25" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="col-xl-7 col-lg-9">
                                <p><?php echo grozomart_kses_basic($settings['banner_four_description']); ?></p>
                            </div>
                        </div>
                        <?php if (!empty($settings['banner_four_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['banner_four_button_url']['url']); ?>" <?php if (!empty($settings['banner_four_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn">
                                <?php echo esc_html($settings['banner_four_button_text']); ?> <i class="far fa-arrow-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-bg-shapes">
            <div class="shape one">
                <?php if (!empty($settings['banner_four_shape_one']['url'])) : ?>
                    <?php grozomart_elementor_rendered_image($settings, 'banner_four_shape_one'); ?>
                <?php endif; ?>
            </div>
            <div class="shape two">
                <?php if (!empty($settings['banner_four_shape_two']['url'])) : ?>
                    <?php grozomart_elementor_rendered_image($settings, 'banner_four_shape_two'); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Hero area End -->
    <!-- Hero Image Part End -->
    <div class="hero-image-area style-two text-center bgp-bottom rel z-1" style="background-image: url(<?php echo esc_url($settings['banner_four_bottom_background_image']['url']); ?>);">
        <div class="container container-1370" data-aos="zoom-in-up" data-aos-duration="1500" data-aos-offset="50">
            <?php grozomart_elementor_rendered_image($settings, 'banner_four_bottom_image'); ?>
        </div>
    </div>
    <!-- Hero Image Part End -->
<?php endif; ?>