<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="footer-widget widget_about wow fadeInUp delay-0-2s">
        <div class="footer-square-logo mb-30">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($settings['layout_three_logo']['url']); ?>" width="<?php echo esc_attr($settings['layout_three_logo_size']['width']); ?>" height="<?php echo esc_attr($settings['layout_three_logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
        </div>
        <?php if (!empty($settings['layout_three_summary_text'])) : ?>
            <p><?php echo grozomart_kses_basic($settings['layout_three_summary_text']); ?></p>
        <?php endif; ?>
        <?php if (!empty($settings['layout_three_button_label'])) : ?>
            <a href="<?php echo esc_url($settings['layout_three_button_url']['url']); ?>" <?php echo ($settings['layout_three_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_three_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="read-more"><?php echo esc_html($settings['layout_three_button_label']); ?> <i class="fas fa-long-arrow-right"></i></a>
        <?php endif; ?>
    </div>
<?php endif; ?>