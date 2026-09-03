<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Integrations Area start -->
    <section class="integrations-area pt-100 rpt-70 pb-210 rpb-130 rel z-1">
        <div class="container container-1290">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 text-center mb-35" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-30">
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <span class="subtitle color-primary mt-10 mb-15"><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_title']) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                    <?php if ($settings['layout_one_summary']) : ?>
                        <p class="summary-text"><?php echo grozomart_kses_basic($settings['layout_one_summary']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11">
                    <div class="integration-wrap">
                        <?php foreach ($settings['layout_one_integrating_image'] as $item) : ?>
                            <div class="integration-item" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php grozomart_elementor_rendered_image($item, 'image'); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Integrations Area end -->
<?php endif; ?>