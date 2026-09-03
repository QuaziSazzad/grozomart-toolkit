<?php if ('layout_seven' == $settings['layout_type']) : ?>
    <!-- Feature Area Start -->
    <section class="feature-area-two rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                if (!empty($settings['layout_seven_service_items'])) :
                    foreach ($settings['layout_seven_service_items'] as $index => $item) :
                        $mt_class = '';
                        $animation = '';

                        if ($index % 2 == 0) {
                            $mt_class = ($index == 0 || $index == 3) ? 'mt-25' : 'mt-45';
                            $animation = 'fadeInUp';
                        } else {
                            $mt_class = '';
                            $animation = 'fadeInDown';
                        }
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="feature-item style-three <?php echo esc_attr($mt_class); ?> wow <?php echo esc_attr($animation); ?> delay-0-2s">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['layout_seven_service_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                                <h4><a href="<?php echo esc_url($item['layout_seven_service_link']['url']); ?>" <?php if (!empty($item['layout_seven_service_link']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($item['layout_seven_service_title']); ?></a></h4>
                                <p><?php echo esc_html($item['layout_seven_service_description']); ?></p>
                                <a class="more-btn" href="<?php echo esc_url($item['layout_seven_service_link']['url']); ?>" <?php if (!empty($item['layout_seven_service_link']['is_external'])) : ?> target="_blank" <?php endif; ?>><i class="far fa-angle-right"></i></a>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Feature Area End -->
<?php endif; ?>