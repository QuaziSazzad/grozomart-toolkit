<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Service Get Consultations Area start -->
    <section class="service-get-consultaions-area pb-130 rpb-100 rel z-1">
        <div class="container">
            <div class="service-get-consultations-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="left-content rmb-50" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-105 rmb-40">
                                <?php if (!empty($settings['layout_three_subtitle'])) : ?>
                                    <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_three_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_three_title'])) : ?>
                                    <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo wp_kses_post($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php if (!empty($settings['layout_three_address_title'])) : ?>
                                        <h5><?php echo esc_html($settings['layout_three_address_title']); ?></h5>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['layout_three_address'])) : ?>
                                        <p><?php echo wp_kses_post($settings['layout_three_address']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php if (!empty($settings['layout_three_contact_title'])) : ?>
                                        <h5><?php echo esc_html($settings['layout_three_contact_title']); ?></h5>
                                    <?php endif; ?>
                                    <div class="contact-content">
                                        <?php if (!empty($settings['layout_three_email'])) : ?>
                                            <a href="mailto:<?php echo esc_attr($settings['layout_three_email']); ?>"><?php echo esc_html($settings['layout_three_email']); ?></a><br>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['layout_three_phone'])) : ?>
                                            <a href="callto:<?php echo esc_attr(str_replace(' ', '', $settings['layout_three_phone'])); ?>"><?php echo esc_html($settings['layout_three_phone']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="get-consultations-form-area" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_three_ct_from_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_three_ct_from_title_tag']); ?>><?php echo wp_kses_post($settings['layout_three_ct_from_title']); ?></<?php echo esc_attr($settings['layout_three_ct_from_title_tag']); ?>>
                            <?php endif; ?>
                            <?php
                            if (!empty($settings['layout_three_select_cf7_form'])) {
                                echo do_shortcode('[contact-form-7 id="' . $settings['layout_three_select_cf7_form'] . '"]');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Get Consultations Area end -->
<?php endif; ?>