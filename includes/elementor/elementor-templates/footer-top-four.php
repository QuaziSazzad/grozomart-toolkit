<?php if ('layout_four' == $settings['layout_type']) : ?>
    <div class="container container-1290 pb-50">
        <div class="row gap-140 justify-content-between">
            <?php if (!empty($settings['layout_four_sec_title'])) : ?>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-text">
                        <span class="h1"><?php echo esc_html($settings['layout_four_sec_title']); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                <div class="footer-widget footer-contact">
                    <p><?php echo esc_html($settings['layout_four_email_title']); ?></p>
                    <div class="section-title">
                        <h2><a href="mailto:<?php echo esc_attr($settings['layout_four_email_address']); ?>"><?php echo esc_html($settings['layout_four_email_address']); ?></a></h2>
                    </div>
                    <?php if (!empty($settings['layout_four_social_icons'])) : ?>
                        <div class="social-style-two mt-10">
                            <?php foreach ($settings['layout_four_social_icons'] as $social_icon) : ?>
                                <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>