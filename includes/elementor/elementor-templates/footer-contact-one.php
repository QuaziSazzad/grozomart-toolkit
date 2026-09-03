<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-widget widget-contact" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">

        <h6 class="footer-title"><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></h6>
        <?php if (is_array($settings['layout_one_contact_list'])) : ?>
            <ul>
                <?php foreach ($settings['layout_one_contact_list'] as $item) : ?>
                    <li><?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'], 'i'); ?> <?php echo grozomart_kses_basic($item['title']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>