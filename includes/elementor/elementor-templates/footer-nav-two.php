<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="footer-widget widget-links" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
        <?php if (!empty($settings['layout_one_title'])) : ?>
            <h6 class="footer-title"><?php echo esc_html($settings['layout_one_title']); ?></h6>
        <?php endif; ?>
        <?php if (is_array($settings['layout_one_nav_menu'])) :  ?>
            <ul>
                <?php foreach ($settings['layout_one_nav_menu'] as $nav_menu) : ?>
                    <li><a href="<?php echo esc_url($nav_menu['url']['url']); ?>" <?php if (!empty($nav_menu['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($nav_menu['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>