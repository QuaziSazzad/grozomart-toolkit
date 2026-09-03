<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Service Area start -->
    <section class="service-area rel z-1">
        <div class="container pt-130 rpt-100 pb-100 rpb-70">
            <?php if (!empty($settings['layout_three_subtitle']) || !empty($settings['layout_three_title']) || !empty($settings['layout_three_description'])) : ?>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center mb-45" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_three_subtitle'])) : ?>
                                <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_three_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_three_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo esc_html($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_three_description'])) : ?>
                                <p class="summary-text"><?php echo esc_html($settings['layout_three_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="row">
                        <?php
                        $delay = 100;
                        foreach ($settings['layout_three_services'] as $index => $service) :
                            $delay_value = ($index % 3 + 1) * 100;
                        ?>
                            <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay_value); ?>" data-aos-duration="1500" data-aos-offset="50">
                                <div class="service-item-two">
                                    <div class="icon">
                                        <i class="<?php echo esc_attr($service['service_icon']); ?>"></i>
                                    </div>
                                    <h5><a href="<?php echo esc_url($service['service_link']['url']); ?>"><?php echo esc_html($service['service_title']); ?></a></h5>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="service-video-part mb-30 rel" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_three_video_image']['url'])) : ?>
                            <?php grozomart_elementor_rendered_image($settings, 'layout_three_video_image'); ?>
                        <?php endif; ?>
                        <div class="content" data-aos="fade-down" data-aos-duration="1500" data-aos-offset="50">
                            <div class="video-wrap">
                                <a href="<?php echo esc_url($settings['layout_three_video_url']); ?>" class="mfp-iframe video-play"><i class="fas fa-play"></i></a> <span><?php echo esc_html($settings['layout_three_video_title']); ?></span>
                            </div>
                            <h5><?php echo esc_html($settings['layout_three_video_description']); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Area end -->
<?php endif; ?>