<?php if ('layout_twelve' == $settings['layout_type']) : ?>
    <!-- Why Choose Us Area start -->
    <section class="why-choose-us-area py-130 rpt-100 rpb-75 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-8 col-sm-10">
                    <div class="why-choose-left-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-50 rmb-30">
                            <?php if (!empty($settings['layout_twelve_subtitle'])): ?>
                                <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_twelve_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_twelve_title'])): ?>
                                <<?php echo esc_attr($settings['layout_twelve_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_twelve_title']); ?></<?php echo esc_attr($settings['layout_twelve_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_twelve_description'])): ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_twelve_description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_twelve_button_text'])): ?>
                            <a href="<?php echo esc_url($settings['layout_twelve_button_url']['url'] ?? '#'); ?>" class="theme-btn mt-35 rmt-20"><?php echo grozomart_kses_basic($settings['layout_twelve_button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <?php if (!empty($settings['layout_twelve_services'])):
                            $delay = 100;
                            foreach ($settings['layout_twelve_services'] as $index => $item):
                                $border_class = ($index % 2 == 0) ? 'border-right border-left' : 'border-right';
                                $border_class .= ($index < 2) ? ' for-border-bottom' : '';
                        ?>
                                <div class="col-sm-6 <?php echo esc_attr($border_class); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="feature-item-three style-two <?php echo ($index % 2 == 0) ? 'me-lg-auto ms-lg-auto' : 'me-lg-auto ms-sm-auto'; ?>">
                                        <?php if (!empty($item['service_icon'])): ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['service_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <?php if (!empty($item['service_title'])): ?>
                                                <h4><?php echo grozomart_kses_basic($item['service_title']); ?></h4>
                                            <?php endif; ?>
                                            <?php if (!empty($item['service_description'])): ?>
                                                <p><?php echo grozomart_kses_basic($item['service_description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                $delay += 100;
                            endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area end -->
<?php endif; ?>