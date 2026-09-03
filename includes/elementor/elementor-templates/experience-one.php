<?php if ('layout_one' == $settings['layout_type']) : ?>
    <h4 class="sec-title"><?php echo esc_html($settings['layout_one_title']); ?></h4>
    <p class="description"><?php echo esc_html($settings['layout_one_description']); ?></p>
    <?php
    foreach ($settings['layout_one_experience_list'] as $index => $item) :
    ?>
        <div class=" experience-item <?php echo esc_attr($index == 0 ? 'mt-40' : ''); ?>">
            <div class="icon"><?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'], 'i'); ?></div>
            <div class="content">
                <h6><?php echo esc_html($item['title']); ?></h6>
                <span class="years"><?php echo esc_html($item['year']); ?></span>
            </div>
            <span class="company"><?php echo esc_html($item['company']); ?></span>
        </div>
    <?php endforeach; ?>
<?php endif; ?>