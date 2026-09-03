<?php if ('layout_five' == $settings['layout_type']) : ?>
    <div class="footer-cta-wrap">
        <div class="container">
            <div class="footer-cta-inner bgs-cover" style="background-image: url(<?php echo esc_url($settings['layout_five_bg_image']['url']); ?>);">
                <div class="section-title wow fadeInLeft delay-0-2s">
                    <?php if (!empty($settings['layout_five_sub_title'])) : ?>
                        <span class="sub-title"><?php echo esc_html($settings['layout_five_sub_title']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_five_title'])) : ?>
                        <<?php echo esc_attr($settings['layout_five_title_tag']); ?>><?php echo esc_html($settings['layout_five_title']); ?></<?php echo esc_attr($settings['layout_five_title_tag']); ?>>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['layout_five_button_label'])) : ?>
                    <a href="<?php echo esc_url($settings['layout_five_button_url']['url']); ?>" <?php echo ($settings['layout_five_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_five_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="theme-btn style-three wow fadeInRight delay-0-2s"><?php echo esc_html($settings['layout_five_button_label']); ?> <i class="fas fa-long-arrow-right"></i></a>
                <?php endif; ?>
                <div class="hotline wow fadeInRight delay-0-2s">
                    <i class="fas fa-phone"></i>
                    <div class="content">
                        <span><?php echo esc_html($settings['layout_five_email_text']); ?></span><br>
                        <a href="<?php echo esc_attr($settings['layout_five_email_address']); ?>"><?php echo esc_html($settings['layout_five_email_address']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>