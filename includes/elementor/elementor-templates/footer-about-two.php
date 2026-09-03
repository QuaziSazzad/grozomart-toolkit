<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="footer-widget widget-about" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
        <?php if (!empty($settings['layout_two_title'])) : ?>
            <h6 class="footer-title"><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></h6>
        <?php endif; ?>
        <?php if (!empty($settings['layout_two_summary_text'])) : ?>
            <p><?php echo grozomart_kses_basic($settings['layout_two_summary_text']); ?></p>
        <?php endif; ?>
        <div class="social-style-two mt-10">
            <?php
            if (!empty($settings['layout_two_social_icons'])) :
                foreach ($settings['layout_two_social_icons'] as $social_icon) :
            ?>
                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
<?php endif; ?>