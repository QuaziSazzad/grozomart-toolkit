<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Features Area start -->
    <section class="features-area rel z-1">
        <div class="container features-bg pt-130 rpt-100 pb-100 rpb-70">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title text-center mb-35" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_title']) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_description']) : ?>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <p><?php echo esc_html($settings['layout_one_description']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if (is_array($settings['layout_one_service_list'])) :
                    $delay = 100;
                    foreach ($settings['layout_one_service_list'] as $service) :
                ?>
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="feature-item hover-content">
                                <div class="image">
                                    <?php grozomart_elementor_rendered_image($service, 'image'); ?>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($service['title']); ?></a></h4>
                                    <p><?php echo esc_html($service['description']); ?></p>
                                    <div class="inner-content">
                                        <a class="read-more" href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($service['read_more']); ?><?php \Elementor\Icons_Manager::render_icon($service['read_more_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
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
    <!-- Features Area end -->
<?php endif; ?>