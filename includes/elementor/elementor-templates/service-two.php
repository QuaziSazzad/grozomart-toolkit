<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Services Area start -->
    <section class="services-area bgc-blue pt-130 rpt-100 rel z-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title text-white text-center mb-70" data-aos="<?php echo esc_attr($settings['layout_two_animation']); ?>" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_two_sub_title']) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_two_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_two_title']) : ?>
                            <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                    <?php if ($settings['layout_two_summary_text']) : ?>
                        <p class="summary-text text-white text-center"><?php echo grozomart_kses_basic($settings['layout_two_summary_text']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if (is_array($settings['layout_two_service_list'])) :
                    $delay = 100;
                    foreach ($settings['layout_two_service_list'] as $service) :
                ?>
                        <div class="col-xxl-<?php echo esc_attr($service['column_size']); ?> col-lg-4 col-sm-6" data-aos="<?php echo esc_attr($settings['layout_two_animation']); ?>" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="service-item hover-content">
                                <div class="image">
                                    <?php grozomart_elementor_rendered_image($service, 'image'); ?>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>>
                                            <?php \Elementor\Icons_Manager::render_icon($service['icon'], ['aria-hidden' => 'true'], 'i'); ?> <?php echo esc_html($service['title']); ?></a>
                                    </h4>
                                    <div class="inner-content">
                                        <p><?php echo esc_html($service['description']); ?></p>
                                        <a class="read-more" href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>>
                                            <?php echo esc_html($service['read_more_text']); ?> <i class="far fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $delay += 100;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Services Area end -->
<?php endif; ?>