<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Service Area start -->
    <section class="service-area bgc-blue pt-130 rpt-100 pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row align-items-end text-white mb-50">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title rmb-30" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_four_subtitle']); ?></span>
                        <<?php echo esc_attr($settings['layout_four_title_tag']); ?>><?php echo esc_html($settings['layout_four_title']); ?></<?php echo esc_attr($settings['layout_four_title_tag']); ?>>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="service-section-text ms-lg-auto" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <p><?php echo esc_html($settings['layout_four_description']); ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if (!empty($settings['layout_four_services'])) :
                    $delay = 100;
                    foreach ($settings['layout_four_services'] as $index => $service) :
                        $link_key = 'link_' . $index;
                        $this->add_link_attributes($link_key, $service['link']);
                ?>
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="service-item-three">
                                <div class="icon <?php echo esc_attr($service['icon_color']); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon($service['icon_class'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a <?php echo $this->get_render_attribute_string($link_key); ?>><?php echo esc_html($service['title']); ?></a></h4>
                                    <p><?php echo esc_html($service['description']); ?></p>
                                    <a class="read-more" <?php echo $this->get_render_attribute_string($link_key); ?>><?php echo esc_html($service['read_more_text']); ?> <i class="far fa-arrow-right"></i></a>
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
    <!-- Service Area end -->
<?php endif; ?>