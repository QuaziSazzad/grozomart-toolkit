<?php if ('layout_four' == $settings['layout_type']) : ?>
    <div class="footer-widget footer-newsletter">
        <div class="footer-logo mb-20">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($settings['layout_four_logo']['url']); ?>" width="<?php echo esc_attr($settings['layout_four_logo_size']['width']); ?>" height="<?php echo esc_attr($settings['layout_four_logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
        </div>
        <p><?php echo grozomart_kses_basic($settings['layout_four_summary_text']); ?></p>
        <form class="newsletter-form mt-25 mc-form">
            <label for="news-email"><i class="fas fa-envelope"></i></label>
            <input id="news-email" type="email" class="mc-form__input" placeholder="<?php echo esc_attr($settings['layout_four_input_placeholder']); ?>" required>
            <button type="submit" class="theme-btn btn-small bgc-secondary hover-secondary" data-hover="<?php echo esc_attr($settings['layout_four_btn_label']); ?>">
                <span><?php echo esc_html($settings['layout_four_btn_label']); ?></span>
            </button>
        </form>
        <p class="mc-form__feedback text-white"></p>
    </div>
<?php endif; ?>