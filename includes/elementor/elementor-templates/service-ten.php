<?php if ('layout_ten' == $settings['layout_type']) : ?>
    <!-- Services Area start -->
    <section class="services-area-five radius-shape-top bg-white pt-130 rpt-100 pb-70 rel z-2">
        <div class="container container-1290">
            <div class="row justify-content-center">
                <div class="col-xl-10 text-center" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-50">
                        <?php if ($settings['layout_ten_sub_title']) : ?>
                            <span class="subtitle color-primary mb-15"><?php echo esc_html($settings['layout_ten_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_ten_title']) : ?>
                            <<?php echo esc_attr($settings['layout_ten_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_ten_title']); ?></<?php echo esc_attr($settings['layout_ten_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-xl-4 col-md-6">
                    <?php
                    if (is_array($settings['layout_ten_service_list'])) :
                        foreach ($settings['layout_ten_service_list'] as $index => $service) :
                    ?>
                            <div class="service-two-item style-three" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($service['icon'], ['aria-hidden' => 'true'], 'i'); ?></div>
                                <h4><a href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($service['title']); ?></a></h4>
                            </div>
                    <?php
                            if ($index == 1) { // Break after the second iteration
                                break;
                            }
                        endforeach;
                    endif;
                    ?>
                </div>

                <?php
                if (is_array($settings['layout_ten_service_list'])) :
                    foreach ($settings['layout_ten_service_list'] as $index => $service) :
                        if ($index <= 1) { // Skip index 2
                            continue;
                        }
                ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="service-two-item style-three height-100" data-aos="flip-left" data-aos-duration="1500" data-aos-offset="50">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($service['icon'], ['aria-hidden' => 'true'], 'i'); ?></div>
                                <h4><a href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($service['title']); ?></a></h4>
                            </div>
                        </div>
                <?php
                        break; // Break after rendering this item
                    endforeach;
                endif;
                ?>

                <div class="col-xl-4 col-md-6" data-aos="flip-up">
                    <?php
                    if (is_array($settings['layout_ten_service_list'])) :
                        foreach ($settings['layout_ten_service_list'] as $index => $service) :
                            if ($index <= 2) { // Skip index 3
                                continue;
                            }
                    ?>
                            <div class="service-two-item style-three" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($service['icon'], ['aria-hidden' => 'true'], 'i'); ?></div>
                                <h4><a href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($service['title']); ?></a></h4>
                            </div>
                    <?php
                            if ($index == 4) { // Break after index 4
                                break;
                            }
                        endforeach;
                    endif;
                    ?>
                </div>

            </div>
        </div>
    </section>
    <!-- Services Area end -->
<?php endif; ?>