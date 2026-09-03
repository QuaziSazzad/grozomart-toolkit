<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Working Process Area start -->
    <section class="working-process-area pt-100 pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70 rmb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_three_subtitle']); ?></span>
                        <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo esc_html($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="working-process-two-active">
                        <?php
                        if (!empty($settings['layout_three_process_items'])) :
                            foreach ($settings['layout_three_process_items'] as $item) :
                        ?>
                                <div class="working-process-two">
                                    <span class="step"><?php echo esc_html($item['layout_three_step_number']); ?></span>
                                    <h5><?php echo esc_html($item['layout_three_step_title']); ?></h5>
                                    <p><?php echo esc_html($item['layout_three_step_description']); ?></p>
                                </div>
                            <?php
                            endforeach;
                            // Duplicate items for slider effect
                            foreach ($settings['layout_three_process_items'] as $item) :
                            ?>
                                <div class="working-process-two">
                                    <span class="step"><?php echo esc_html($item['layout_three_step_number']); ?></span>
                                    <h5><?php echo esc_html($item['layout_three_step_title']); ?></h5>
                                    <p><?php echo esc_html($item['layout_three_step_description']); ?></p>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="working-process-image-two ms-lg-auto mb-30 rmt-40">
                        <?php if (!empty($settings['layout_three_image']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['layout_three_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_three_title']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Working Process Area end -->
<?php endif; ?>