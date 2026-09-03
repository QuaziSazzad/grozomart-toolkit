<?php if ('layout_eight' == $settings['layout_type']) : ?>
    <!-- About Area start -->
    <section class="about-area-five rel z-1 pb-230 rpb-150">
        <div class="container container-1290">
            <div class="row justify-content-between">
                <div class="col-lg-3" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <?php if ($settings['layout_eight_sub_title']) : ?>
                        <span class="subtitle color-primary mb-25"><?php echo grozomart_kses_basic($settings['layout_eight_sub_title']); ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-xl-7 col-lg-9" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="about-content-five">
                        <?php if ($settings['layout_eight_title']) : ?>
                            <div class="section-title mb-40 rmb-25">
                                <<?php echo esc_attr($settings['layout_eight_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_eight_title']); ?></<?php echo esc_attr($settings['layout_eight_title_tag']); ?>>
                            </div>
                        <?php endif; ?>
                        <?php if ($settings['layout_eight_summary_text']) : ?>
                            <p class="summary-text"><?php echo grozomart_kses_basic($settings['layout_eight_summary_text']); ?></p>
                        <?php endif; ?>
                        <?php if ($settings['layout_eight_button_label']) : ?>
                            <a href="<?php echo esc_url($settings['layout_eight_button_url']['url']); ?>" <?php if (!empty($settings['layout_eight_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn color-white hover-secondary mt-25 rmt-15" data-hover="<?php echo esc_attr($settings['layout_eight_button_label']); ?>">
                                <span><?php echo esc_html($settings['layout_eight_button_label']); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-65">
                <div class="col-xl-4 col-lg-6 col-md-8 mt-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="about-five-logo-part bgs-cover py-30 text-white p-50 br-10" style="background-image: url(<?php echo esc_url($settings['layout_eight_bg_shape']['url']); ?>);">
                        <div class="logo pb-25 rpb-55">
                            <a href="<?php echo esc_url($settings['layout_eight_logo_url']['url']); ?>" <?php if (!empty($settings['layout_eight_logo_url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php grozomart_elementor_rendered_image($settings, 'layout_eight_logo'); ?></a>
                        </div>
                        <h4><?php echo esc_html($settings['layout_eight_logo_caption']); ?></h4>
                    </div>
                </div>
                <div class="col-xl-8 mt-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" data-aos-delay="100">
                    <div class="image">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_eight_image', 'br-10'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area end -->
<?php endif; ?>