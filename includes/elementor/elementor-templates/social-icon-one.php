<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-widget footer-contact">
        <?php if (!empty($settings['layout_one_title'])) : ?>
            <div class="footer-title">
                <h6><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></h6>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['social_icons'])) : ?>
            <div class="social-style-two mt-15">
                <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>" class="social-icon"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>