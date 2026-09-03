<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Tooltip Area Start -->
    <section class="tooltip-area-one bgc-navyblue rel z-1 pt-130 rpt-100">
        <div class="container">
            <div class="section-title text-white text-center mb-115" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <h4><?php echo grozomart_kses_basic($settings['layout_three_title']); ?></h4>
            </div>
            <div class="tooltip-style-two" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                <?php if (!empty($settings['sponsors_list'])) : ?>
                    <?php foreach ($settings['sponsors_list'] as $item) : ?>
                        <div class="tooltip-item">
                            <div class="tooltip-btn">
                                <?php grozomart_elementor_rendered_image($item, 'sponsor_image'); ?>
                            </div>
                            <div class="tooltip-content">
                                <div class="tooltip-text"><?php echo esc_html($item['sponsor_name']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="tooltip-shapes">
            <div class="shape one">
                <?php grozomart_elementor_rendered_image($settings, 'shape_one'); ?>
            </div>
            <div class="shape two">
                <?php grozomart_elementor_rendered_image($settings, 'shape_two'); ?>
            </div>
            <div class="shape three">
                <?php grozomart_elementor_rendered_image($settings, 'shape_three'); ?>
            </div>
            <div class="shape four">
                <?php grozomart_elementor_rendered_image($settings, 'shape_four'); ?>
            </div>
        </div>
    </section>
    <!-- Tooltip Area End -->
<?php endif; ?>