<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Why Choose Us Area start -->
    <section class="why-choose-us-five-area rel z-1 pt-130 rpt-100 pb-80">
        <div class="container container-1290">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4 col-lg-5" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="why-choose-us-content-five rmb-55">
                        <div class="section-title mb-50 rmb-30">
                            <?php if ($settings['layout_one_sub_title']) : ?>
                                <span class="subtitle color-primary mt-10 mb-15"><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></span>
                            <?php endif; ?>
                            <?php if ($settings['layout_one_title']) : ?>
                                <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <hr class="mb-50 rmb-30">
                        <?php if ($settings['layout_one_summary_text']) : ?>
                            <p class="summary-text"><?php echo grozomart_kses_basic($settings['layout_one_summary_text']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_one_image', 'br-10'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area end -->
<?php endif; ?>