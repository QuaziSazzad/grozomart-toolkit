<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Statistics Area start -->
    <section class="statistics-area-three pt-130 rpt-100 pb-100 rpb-80 text-white bgc-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="row rmb-35">
                        <?php foreach ($settings['layout_four_counter_list'] as $item) : ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="counter-item-three counter-text-wrap <?php echo ($item['symbol'] === 'percent') ? 'mt-20 wow fadeInUp' : 'wow fadeInDown'; ?> delay-0-3s">
                                    <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                    <span class="count-text <?php echo esc_attr($item['symbol']); ?>" data-speed="3000" data-stop="<?php echo esc_html($item['number']); ?>">0</span>
                                    <span class="counter-title"><?php echo grozomart_kses_basic($item['title']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="statistics-two-content mb-30 rmb-0 wow fadeInUp delay-0-2s">
                        <div class="section-title mb-30">
                            <<?php echo esc_attr($settings['layout_four_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_four_title']); ?></<?php echo esc_attr($settings['layout_four_title_tag']); ?>>
                        </div>
                        <p><?php echo grozomart_kses_basic($settings['layout_four_description']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics Area end -->
<?php endif; ?>