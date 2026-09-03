<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Working Process Area start -->
    <section class="working-process-area rel z-1">
        <div class="container features-bg pt-130 rpt-100 pb-120 rpb-90">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_title']) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="accordion working-process" id="working-process" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                <?php
                if (is_array($settings['work_process_items'])) :
                    foreach ($settings['work_process_items'] as $index => $item) :
                        $collapse_id = 'collapse' . ($index + 1);
                        $step_number = 'Step ' . sprintf('%02d', $index + 1);
                        $is_active = $index === 1 ? 'show' : '';
                        $button_class = $index === 1 ? 'accordion-button' : 'accordion-button collapsed';
                ?>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="<?php echo esc_attr($button_class); ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>">
                                    <span class="step"><?php echo esc_html($step_number); ?></span>
                                    <span class="title"><?php echo grozomart_kses_basic($item['step_title']); ?></span>
                                    <span class="icon"><i class="far fa-arrow-right"></i></span>
                                </button>
                            </div>
                            <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo esc_attr($is_active); ?>" data-bs-parent="#working-process">
                                <div class="accordion-body">
                                    <div class="row gap-120">
                                        <div class="col-lg-6">
                                            <div class="content rmb-30">
                                                <p><?php echo grozomart_kses_basic($item['step_description']); ?></p>
                                                <?php if (!empty($item['step_list_items'])) : ?>
                                                    <ul class="list-style-one mt-25">
                                                        <?php echo wp_kses_post($item['step_list_items']); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="image">
                                                <?php grozomart_elementor_rendered_image($item, 'step_image'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Working Process Area end -->
<?php endif; ?>