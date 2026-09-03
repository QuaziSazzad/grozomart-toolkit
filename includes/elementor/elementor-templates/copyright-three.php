<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="footer-bottom bgc-black mt-20 pt-20">
        <div class="container">
            <div class="row align-items-center">
                <?php if (is_array($settings['layout_three_nav_menu'])) :  ?>
                    <div class="col-lg-8">
                        <div class="footer-bottom-menu mb-10 wow fadeInRight delay-0-2s">
                            <ul>
                                <?php foreach ($settings['layout_three_nav_menu'] as $nav_menu) : ?>
                                    <li><a href="<?php echo esc_url($nav_menu['url']['url']); ?>" <?php if (!empty($nav_menu['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($nav_menu['title']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-4">
                    <div class="copyright-text text-lg-end wow fadeInLeft delay-0-2s">
                        <p><?php echo grozomart_kses_basic($settings['layout_three_copyright']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>