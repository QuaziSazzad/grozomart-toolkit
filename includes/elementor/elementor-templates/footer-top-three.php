<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Get Consultations Area start -->
    <section class="get-consultations-area bgs-cover pt-130 rpt-100 pb-100 rel z-1" style="background-image: url(<?php echo esc_url($settings['layout_three_bg_image']['url']); ?>);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="get-consultation-content text-white rmb-25" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_three_title']) || !empty($settings['layout_three_sub_title'])) : ?>
                            <div class="section-title mb-25">
                                <?php if (!empty($settings['layout_three_sub_title'])) : ?>
                                    <span class="sub-title mb-10"><?php echo esc_html($settings['layout_three_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_three_title'])) : ?>
                                    <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo esc_html($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_three_summary_text'])) : ?>
                            <p><?php echo esc_html($settings['layout_three_summary_text']); ?></p>
                        <?php endif; ?>
                        <div class="consultation-bottom-content mt-30">
                            <?php if (!empty($settings['layout_three_button_label'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_three_button_url']['url']); ?>" <?php echo ($settings['layout_three_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_three_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="theme-btn mb-30"><?php echo esc_html($settings['layout_three_button_label']); ?></a>
                            <?php endif; ?>
                            <div class="email-box mb-30">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="content">

                                    <span><?php echo esc_html($settings['layout_three_email_text']); ?></span>

                                    <a href="mailto:<?php echo esc_attr($settings['layout_three_email_address']); ?>"><?php echo esc_html($settings['layout_three_email_address']); ?></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['layout_three_logo']['url'])) : ?>
                    <div class="col-lg-4">
                        <div class="techmax-logo ms-lg-auto" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <img src="<?php echo esc_url($settings['layout_three_logo']['url']); ?>" width="<?php echo esc_attr($settings['layout_three_logo_size']['width']); ?>" height="<?php echo esc_attr($settings['layout_three_logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Get Consultations Area end -->
<?php endif; ?>