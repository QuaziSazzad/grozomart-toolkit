<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Feature Section Start -->
    <section class="feature-section-2 section-padding pt-0 fix">
        <div class="container">
            <div class="feature-wrapper-2 <?php echo ('yes' === $settings['layout_two_bordered_style']) ? 'style-two' : ''; ?>">
                <?php if (!empty($settings['layout_two_feature_items'])) : ?>
                    <?php
                    $wow_delays = ['.2s', '.4s', '.6s', '.8s'];
                    ?>
                    <?php foreach ($settings['layout_two_feature_items'] as $index => $item) : ?>
                        <?php $wow_delay = $wow_delays[$index % count($wow_delays)]; ?>
                        <div class="feature-items wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                            <?php if (!empty($item['feature_icon']['url'])) : ?>
                                <div class="feature-icon">
                                    <img src="<?php echo esc_url($item['feature_icon']['url']); ?>" alt="<?php echo esc_attr($item['feature_title']); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="content">
                                <?php if (!empty($item['feature_title'])) : ?>
                                    <h2 class="title"><?php echo esc_html($item['feature_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($item['feature_description'])) : ?>
                                    <p><?php echo esc_html($item['feature_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
