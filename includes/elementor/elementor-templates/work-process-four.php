<?php if ('layout_four' == $settings['layout_type']) : ?>

    <!-- Work Process Area Start -->
    <section class="work-process-area rel z-1 text-white bgc-primary pt-90 rpt-60 pb-80 rpb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h2><?php echo grozomart_kses_basic($settings['layout_four_title']); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row no-gap justify-content-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                <?php foreach ($settings['layout_four_items'] as $item) : ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-process-item<?php echo esc_attr($item['layout_four_with_arrow'] == 'yes' ? ' with-arrow' : ''); ?>">
                            <span class="number"><?php echo grozomart_kses_basic($item['layout_four_number']); ?></span>
                            <h5><?php echo grozomart_kses_basic($item['layout_four_item_title']); ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="work-process-shapes">
            <div class="shape one">
                <?php grozomart_elementor_rendered_image($settings, 'layout_four_shape_one'); ?>
            </div>
            <div class="shape two">
                <?php grozomart_elementor_rendered_image($settings, 'layout_four_shape_two'); ?>
            </div>
        </div>
    </section>
    <!-- Work Process Area End -->

    <?php if ($settings['layout_four_show_image_area'] == 'yes') : ?>
        <!-- Work Process Image Area Start -->
        <div class="work-process-image-area rel z-1 text-center bgc-primary">
            <div class="container">
                <div class="image ms-5" data-aos="zoom-in-up" data-aos-duration="1500" data-aos-offset="50">
                    <?php grozomart_elementor_rendered_image($settings, 'layout_four_image'); ?>
                </div>
            </div>
            <div class="work-process-shapes">
                <div class="shape one">
                    <?php grozomart_elementor_rendered_image($settings, 'layout_four_shape_three'); ?>
                </div>
                <div class="shape two">
                    <?php grozomart_elementor_rendered_image($settings, 'layout_four_shape_four'); ?>
                </div>
            </div>
        </div>
        <!-- Work Process Image Area End -->
    <?php endif; ?>
<?php endif; ?>