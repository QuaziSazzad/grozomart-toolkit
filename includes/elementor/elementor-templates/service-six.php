<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Generative AI Area Start -->
    <section class="generative-ai-area pt-100 rpt-65 rel z-1">
        <div class="container">
            <div class="row justify-content-between mb-45 rmb-90">
                <div class="col-xl-5 col-lg-7 col-md-8" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-40">
                        <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_six_section_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5 text-lg-end" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <a href="<?php echo esc_url($settings['layout_six_button_url']['url']); ?>" <?php if (!empty($settings['layout_six_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn"><?php echo esc_html($settings['layout_six_button_text']); ?> <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                <?php
                if (!empty($settings['layout_six_service_items'])) :
                    foreach ($settings['layout_six_service_items'] as $index => $item) :
                        $delay = $index % 2 == 1 ? ' data-aos-delay="100"' : '';
                ?>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" <?php echo $delay; ?>>
                            <div class="iconic-box style-ten">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['layout_six_service_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                                <div class="content">
                                    <h5><a href="<?php echo esc_url($item['layout_six_service_link']['url']); ?>" <?php if (!empty($item['layout_six_service_link']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($item['layout_six_service_title']); ?></a></h5>
                                    <p><?php echo esc_html($item['layout_six_service_description']); ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Generative AI Area End -->
<?php endif; ?>