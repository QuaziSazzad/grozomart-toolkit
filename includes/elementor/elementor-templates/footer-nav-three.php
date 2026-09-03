<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="footer-widget widget_nav_menu wow fadeInUp delay-0-3s">
        <?php if (!empty($settings['layout_one_title'])) : ?>
            <h4 class="footer-title"><?php echo esc_html($settings['layout_one_title']); ?></h4>
        <?php endif; ?>
        <?php if (is_array($settings['layout_one_nav_menu'])) :  ?>
            <ul class="list-style-four">
                <?php foreach ($settings['layout_one_nav_menu'] as $nav_menu) : ?>
                    <li><a href="<?php echo esc_url($nav_menu['url']['url']); ?>" <?php if (!empty($nav_menu['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($nav_menu['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>