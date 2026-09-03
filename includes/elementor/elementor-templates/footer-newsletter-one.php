<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-widget newsletter-widget" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
        <?php if (!empty($settings['layout_one_title'])) : ?>
            <h5 class="footer-title"><?php echo esc_html($settings['layout_one_title']); ?></h5>
        <?php endif; ?>
        <?php if (!empty($settings['layout_one_summary_text'])) : ?>
            <p><?php echo esc_html($settings['layout_one_summary_text']); ?></p>
        <?php endif; ?>
        <form class="newsletter-form mt-30 mc-form" action="#">
            <input type="email" class="mc-form__input" placeholder="<?php echo esc_attr($settings['layout_one_placeholder']); ?>" required>
            <button type="submit"><i class="far fa-paper-plane"></i></button>
        </form>
        <p class="mc-form__feedback text-white"></p>
    </div>
<?php endif; ?>