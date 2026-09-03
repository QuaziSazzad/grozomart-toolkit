<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Feature Section Start -->
    <div class="feature-section">
        <div class="container">
            <ul class="feature-support-list">
                <?php if (!empty($settings['layout_one_feature_items'])) : ?>
                    <?php foreach ($settings['layout_one_feature_items'] as $item) : ?>
                        <li>
                            <span></span>
                            <?php echo esc_html($item['feature_text']); ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
