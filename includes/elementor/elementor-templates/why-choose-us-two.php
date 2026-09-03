<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Why Choose Us Area start -->
    <section class="why-choose-us-area py-130 rpt-100 rpb-75 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-50 rmb-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_two_subtitle'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_two_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['layout_two_items'])) : ?>
                <div class="row justify-content-center">
                    <?php foreach ($settings['layout_two_items'] as $index => $item) :
                        $delay = ($index % 3 + 1) * 100;
                        $border_class = '';

                        if ($index < 3) {
                            $border_class = ($index == 0) ? 'border-right border-left for-border-bottom' : 'border-right for-border-bottom';
                        } else {
                            $border_class = ($index == 3) ? 'border-right border-left' : 'border-right';
                        }

                        $margin_class = '';
                        if ($index == 0 || $index == 5) {
                            $margin_class = 'me-auto ms-lg-auto';
                        } elseif ($index == 1 || $index == 3) {
                            $margin_class = 'me-lg-auto ms-sm-auto';
                        } elseif ($index == 2) {
                            $margin_class = 'me-auto ms-lg-auto';
                        } elseif ($index == 4) {
                            $margin_class = 'me-lg-auto ms-lg-auto';
                        } elseif ($index == 6) {
                            $margin_class = 'me-lg-auto ms-md-auto';
                        }
                    ?>
                        <div class="col-lg-4 col-sm-6 <?php echo esc_attr($border_class); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="feature-item-three style-two <?php echo esc_attr($margin_class); ?>">
                                <?php if (!empty($item['layout_two_item_icon'])) : ?>
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item['layout_two_item_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if (!empty($item['layout_two_item_title'])) : ?>
                                        <h4><?php echo grozomart_kses_basic($item['layout_two_item_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($item['layout_two_item_description'])) : ?>
                                        <p><?php echo grozomart_kses_basic($item['layout_two_item_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Why Choose Us Area end -->
<?php endif; ?>