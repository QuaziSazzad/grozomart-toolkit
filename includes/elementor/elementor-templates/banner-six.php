<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Hero Area Start -->
    <section class="hero-area-five bgp-bottom pt-220 rpt-145 pb-250 rpb-150 rel z-1" style="background-image: url(<?php echo esc_url($settings['layout_six_bg_image']['url']); ?>);">
        <div class="container container-1290">
            <div class="hero-content-five text-white mb-135 rmb-80" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <?php if (!empty($settings['layout_six_title_first_part'])) : ?>
                    <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_six_title_first_part']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                <?php endif; ?>
                <div class="content mb-50">
                    <?php if (!empty($settings['layout_six_title_second_part'])) : ?>
                        <span class="h1"><?php echo grozomart_kses_basic($settings['layout_six_title_second_part']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_six_description'])) : ?>
                        <p><?php echo grozomart_kses_basic($settings['layout_six_description']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_six_button_label'])) : ?>
                        <a href="<?php echo esc_url($settings['layout_six_button_url']['url']); ?>" <?php if (!empty($settings['layout_six_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn color-white" data-hover="<?php echo esc_attr($settings['layout_six_button_label']); ?>">
                            <span><?php echo esc_html($settings['layout_six_button_label']); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-five-clients text-white rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <h5><?php echo esc_html($settings['layout_six_client_text']); ?></h5>
                        <div class="trusted-clients mt-25 mb-35">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_six_author_images'); ?>
                        </div>
                        <div class="client-logos">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_six_client_images'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-five-video-wrap rel" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_six_image'); ?>
                        <?php if (!empty($settings['layout_six_video_url'])): ?>
                            <a href="<?php echo esc_url($settings['layout_six_video_url']); ?>" class="mfp-iframe color-primary video-play"><i class="fas fa-play"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area End -->
<?php endif; ?>