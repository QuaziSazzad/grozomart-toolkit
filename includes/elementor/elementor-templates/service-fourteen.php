<?php if ('layout_fourteen' == $settings['layout_type']) : ?>
    <!-- Services Area start -->
    <section class="services-area style-two bgs-cover pt-130 rpt-100 pb-100 rpb-70 rel z-1" style="background-image: url(<?php echo esc_url($settings['layout_fourteen_bg_image']['url']); ?>);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title text-white text-center mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_fourteen_subtitle'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_fourteen_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_fourteen_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_fourteen_title_tag']); ?> class="sec-title"><?php echo wp_kses_post($settings['layout_fourteen_title']); ?></<?php echo esc_attr($settings['layout_fourteen_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if (!empty($settings['layout_fourteen_services'])) :
                    foreach ($settings['layout_fourteen_services'] as $index => $item) :
                        $delay = ($index % 3 + 1) * 100;
                ?>
                        <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="service-item-six">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['service_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty($item['service_title'])) : ?>
                                        <h4 class="title service-title"><a href="<?php echo esc_url($item['service_link']['url']); ?>" <?php if (!empty($item['service_link']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($item['service_title']); ?></a></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($item['service_description'])) : ?>
                                        <p class="service-summary-text"><?php echo esc_html($item['service_description']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($item['service_link']['url'])) : ?>
                                        <a class="read-more" href="<?php echo esc_url($item['service_link']['url']); ?>" <?php if (!empty($item['service_link']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($item['read_more'] ?? 'Read More'); ?> <i class="far fa-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Services Area end -->
<?php endif; ?>