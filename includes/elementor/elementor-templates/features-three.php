<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Shoping feature Section Start -->
    <section class="shoping-feature-section-2 section-padding fix">
        <div class="container">
            <div class="row g-4">
                <?php if (!empty($settings['layout_three_feature_items'])) : ?>
                    <?php
                    $wow_delays = ['.3s', '.5s', '.7s'];
                    ?>
                    <?php foreach ($settings['layout_three_feature_items'] as $index => $item) : ?>
                        <?php $wow_delay = $wow_delays[$index % count($wow_delays)]; ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                            <div class="shoping-feature-box-2">
                                <?php if (!empty($item['feature_icon']['url'])) : ?>
                                    <div class="icon">
                                        <img src="<?php echo esc_url($item['feature_icon']['url']); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if (!empty($item['feature_title'])) : ?>
                                        <h3 class="title"><?php echo esc_html($item['feature_title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($item['feature_description'])) : ?>
                                        <p><?php echo esc_html($item['feature_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
