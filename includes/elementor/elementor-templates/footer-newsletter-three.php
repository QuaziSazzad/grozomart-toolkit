<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="footer-widget widget_newsletter wow fadeInUp delay-0-6s">
        <?php if (!empty($settings['layout_three_title'])) : ?>
            <h4 class="footer-title"><?php echo esc_html($settings['layout_three_title']); ?></h4>
        <?php endif; ?>
        <?php if (!empty($settings['layout_three_summary_text'])) : ?>
            <p><?php echo esc_html($settings['layout_three_summary_text']); ?></p>
        <?php endif; ?>
        <form action="#" class="mc-form">
            <label for="email"><i class="far fa-envelope"></i></label>
            <input id="email" type="email" class="mc-form__input" placeholder="<?php echo esc_attr($settings['layout_three_placeholder']); ?>" required>
            <button><?php echo esc_html($settings['layout_three_btn_label']); ?></button>
        </form>
        <p class="mc-form__feedback text-white"></p>
        <?php if (!empty($settings['layout_three_social_title'])) : ?>
            <h5 class="text-white"><?php echo esc_html($settings['layout_three_social_title']); ?></h5>
        <?php endif; ?>
        <?php if (!empty($settings['layout_three_social_icons'])) : ?>
            <div class="social-style-one">
                <?php foreach ($settings['layout_three_social_icons'] as $social_icon) : ?>
                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>