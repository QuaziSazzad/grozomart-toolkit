<?php if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Working Process Area start -->
    <section class="working-process-area pt-130 rpt-100 pb-80 rpb-50 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10">
                    <div class="section-title text-center mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_five_sub_title'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_five_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_five_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_five_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_five_title']); ?></<?php echo esc_attr($settings['layout_five_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($settings['layout_five_working_process_list'])) : ?>
                    <?php foreach ($settings['layout_five_working_process_list'] as $index => $item) : ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="working-process-three" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($index + 1) * 100); ?>" data-aos-duration="1500" data-aos-offset="50">
                                <?php if (!empty($item['index'])) : ?>
                                    <div class="step"><?php echo grozomart_kses_basic($item['index']); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($item['title'])) : ?>
                                    <h5 class="title"><?php echo grozomart_kses_basic($item['title']); ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($item['description'])) : ?>
                                    <p><?php echo grozomart_kses_basic($item['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Working Process Area end -->
<?php endif; ?>