<?php if ('layout_ten' == $settings['layout_type']) : ?>
    <!-- Team Page Area start -->
    <section class="team-page-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="team-page-left-content rmb-20" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <?php if (!empty($settings['layout_ten_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_ten_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_ten_title']); ?></<?php echo esc_attr($settings['layout_ten_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_ten_description'])) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_ten_description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_ten_progress_items'])) : ?>
                            <div class="row pt-35 rpt-25">
                                <?php foreach ($settings['layout_ten_progress_items'] as $index => $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="circle-progress-item-two">
                                            <div class="circle-progress-two <?php echo esc_attr($index == 0 ? 'one' : 'two'); ?>">
                                                <span class="counting"><?php echo esc_html($item['progress_value']); ?></span>
                                            </div>
                                            <?php if (!empty($item['progress_title'])) : ?>
                                                <h4><?php echo grozomart_kses_basic($item['progress_title']); ?></h4>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="team-page-right-image mb-30" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php echo grozomart_elementor_rendered_image($settings, 'layout_ten_image'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Page Area end -->
<?php endif; ?>