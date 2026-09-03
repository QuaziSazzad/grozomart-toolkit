<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Headline Area Start -->
    <div class="headline-area rel z-1">
        <span class="marquee-wrap style-two py-20 rpy-10 bgc-secondary">
            <span class="marquee-inner left">
                <?php foreach ($settings['layout_one_sliding_text'] as $index =>  $item) : ?>
                    <span class="marquee-item"><i class="flaticon-asterisk"></i><?php echo esc_html($item['text']); ?></span>
                <?php endforeach; ?>
            </span>
            <span class="marquee-inner left">
                <?php foreach ($settings['layout_one_sliding_text'] as $index =>  $item) : ?>
                    <span class="marquee-item"><i class="flaticon-asterisk"></i><?php echo esc_html($item['text']); ?></span>
                <?php endforeach; ?>
            </span>
            <span class="marquee-inner left">
                <?php foreach ($settings['layout_one_sliding_text'] as $index =>  $item) : ?>
                    <span class="marquee-item"><i class="flaticon-asterisk"></i><?php echo esc_html($item['text']); ?></span>
                <?php endforeach; ?>
            </span>
        </span>
    </div>
    <!-- Headline Area End -->
<?php endif; ?>