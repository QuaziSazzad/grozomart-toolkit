<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="footer-widget footer-contact">
        <?php if (!empty($settings['layout_two_title'])) : ?>
            <div class="footer-title">
                <h6><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></h6>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['layout_two_social_icons'])) : ?>
            <div class="social-style-one mt-15">
                <?php foreach ($settings['layout_two_social_icons'] as $social_icon) : ?>
                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>" class="social-icon"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>