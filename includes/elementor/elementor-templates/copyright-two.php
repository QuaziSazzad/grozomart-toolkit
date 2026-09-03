<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="container container-1290">
        <div class="footer-bottom bordered-top pt-30 pb-10">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo mb-15 text-center text-md-start">
                        <img src="<?php echo esc_url($settings['layout_two_logo']['url']); ?>" width="<?php echo esc_attr($settings['layout_two_logo_size']['width']); ?>" height="<?php echo esc_attr($settings['layout_two_logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    </div>
                </div>
                <div class="col-md-9 text-center text-lg-end">
                    <div class="copyright-text text-center text-md-end">
                        <p><?php echo grozomart_kses_basic($settings['layout_two_copyright']); ?></p>
                    </div>
                </div>
            </div>
            <?php if ('yes' == $settings['layout_two_enable_back_to_top']): ?>
                <!-- Scroll Top Button -->
                <button class="scroll-top scroll-to-target" data-target="html"><?php \Elementor\Icons_Manager::render_icon($settings['layout_two_icon'], ['aria-hidden' => 'true'], 'i'); ?></button>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>