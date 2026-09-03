<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Client Logo Area start -->
    <div class="client-logo-area">
        <div class="container-fluid">
            <div class="client-logo-active pt-70 pb-40">
                <?php foreach ($settings['layout_one_sponsors'] as $item) : ?>
                    <div class="client-logo-item" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                        <a href="<?php echo esc_url($item['url']['url']); ?>" <?php if (!empty($item['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php grozomart_elementor_rendered_image($item, 'image'); ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Client Logo Area end -->
<?php endif; ?>