<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="container">
        <div class="footer-bottom pt-30 pb-15">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright-text">
                        <p><?php echo grozomart_kses_basic($settings['layout_one_copyright']); ?></p>
                    </div>
                </div>
                <?php if (is_array($settings['layout_one_nav_menu'])) :  ?>
                    <div class="col-lg-6 text-lg-end">
                        <ul class="footer-bottom-nav">
                            <?php foreach ($settings['layout_one_nav_menu'] as $nav_menu) : ?>
                                <li><a href="<?php echo esc_url($nav_menu['url']['url']); ?>" <?php if (!empty($nav_menu['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($nav_menu['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ('yes' == $settings['layout_one_enable_back_to_top']): ?>
                <!-- Scroll Top Button -->
                <button class="scroll-top scroll-to-target" data-target="html"><?php \Elementor\Icons_Manager::render_icon($settings['layout_one_icon'], ['aria-hidden' => 'true'], 'i'); ?></button>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>