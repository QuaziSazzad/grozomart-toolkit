<?php if ('layout_eleven' == $settings['layout_type']) : ?>
    <!-- Services Area start -->
    <section class="services-two-area rel z-1">
        <div class="container container-1290">
            <div class="row justify-content-center">
                <?php
                if (is_array($settings['layout_eleven_service_list'])) :
                    foreach ($settings['layout_eleven_service_list'] as $service) :
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="flip-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="service-two-item style-two hover-two">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($service['icon'], ['aria-hidden' => 'true'], 'i'); ?></div>
                                <h6><a href="<?php echo esc_url($service['url']['url']); ?>" <?php if (!empty($service['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($service['title']); ?></a></h6>
                                <p><?php echo esc_html($service['description']); ?></p>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>
    <!-- Services Area end -->
<?php endif; ?>