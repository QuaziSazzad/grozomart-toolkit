<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Working Process Area start -->
    <section class="working-process-area-two pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 co-lg-8 col-md-10">
                    <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_six_sub_title'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_six_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_six_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_six_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="for-arrow"></div>
                </div>
                <?php if (!empty($settings['layout_six_working_process_list'])) : ?>
                    <?php foreach ($settings['layout_six_working_process_list'] as $index => $item) : ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($index + 1) * 100); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="work-process-four">
                                <div class="image">
                                    <?php if (!empty($item['image']['url'])) : ?>
                                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                    <?php endif; ?>
                                    <?php if (!empty($item['step_number'])) : ?>
                                        <span class="step"><?php echo esc_html($item['step_number']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty($item['title'])) : ?>
                                        <h4><?php echo grozomart_kses_basic($item['title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($item['description'])) : ?>
                                        <p><?php echo grozomart_kses_basic($item['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Working Process Area end -->
<?php endif; ?>