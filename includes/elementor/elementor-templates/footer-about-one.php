<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-widget footer-info" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
        <div class="footer-logo mb-30">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_size']['width']); ?>" height="<?php echo esc_attr($settings['logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
        </div>
        <?php if (!empty($settings['layout_one_summary_text'])) : ?>
            <div class="text mb-25">
                <p><?php echo grozomart_kses_basic($settings['layout_one_summary_text']); ?></p>
            </div>
        <?php endif; ?>
        <div class="info-item">
            <div class="icon"><i class="far fa-phone-rotary"></i></div>
            <div class="content">
                <?php echo esc_html($settings['layout_one_call_title']); ?> <br>
                <?php echo esc_html($settings['layout_one_call_text']); ?> <a href="<?php echo esc_url($settings['layout_one_call_url']); ?>"><?php echo esc_html($settings['layout_one_call_number']); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>