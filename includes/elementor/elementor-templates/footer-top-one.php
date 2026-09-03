<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="container container-1500">
        <div class="footer-top pt-70 pb-40 rpt-60 px-4 bgs-cover" style="background-image: url(<?php echo esc_url($settings['layout_one_bg_image']['url']); ?>);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <?php if (!empty($settings['layout_one_title']) || !empty($settings['layout_one_sub_title'])) : ?>

                            <div class="section-title text-white mb-20" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                                    <span class="sub-title mb-5"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_one_title'])) : ?>
                                    <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="cta-right-content">
                            <?php if (!empty($settings['layout_one_button_label'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" <?php echo ($settings['layout_one_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_one_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="theme-btn style-two mb-20"><?php echo esc_html($settings['layout_one_button_label']); ?></a>
                            <?php endif; ?>
                            <div class="mail-info mb-20">
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <div class="content">
                                    <?php echo esc_html($settings['layout_one_email_text']); ?> <br>
                                    <a href="mailto:<?php echo esc_attr($settings['layout_one_email_address']); ?>"><?php echo esc_html($settings['layout_one_email_address']); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>