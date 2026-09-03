<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="footer-marquee pt-60 pb-75 rpy-90 rel">
        <div class="container blank-container bordered-x"></div>
        <span class="marquee-wrap">
            <span class="marquee-inner left">
                <?php foreach ($settings['layout_two_sliding_text'] as $index =>  $item) : ?>
                    <span class="marquee-item"><?php echo esc_html($item['text']); ?></span>
                    <span class="marquee-item"><?php echo esc_html($item['separator']); ?></span>
                <?php endforeach; ?>
            </span>
            <span class="marquee-inner left">
                <?php foreach ($settings['layout_two_sliding_text'] as $index =>  $item) : ?>
                    <span class="marquee-item"><?php echo esc_html($item['text']); ?></span>
                    <span class="marquee-item"><?php echo esc_html($item['separator']); ?></span>
                <?php endforeach; ?>
            </span>
            <span class="marquee-inner left">
                <?php foreach ($settings['layout_two_sliding_text'] as $index =>  $item) : ?>
                    <span class="marquee-item"><?php echo esc_html($item['text']); ?></span>
                    <span class="marquee-item"><?php echo esc_html($item['separator']); ?></span>
                <?php endforeach; ?>
            </span>
        </span>
    </div>
<?php endif; ?>