<!-- Get Touch Section Start -->
<section class="get-touch-contact-section fix section-padding pt-0">
    <div class="container">
        <div class="get-touch-contact-wrapper">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="content">
                        <?php if (!empty($settings['layout_one_title'])) : ?>
                            <h2>
                                <?php echo esc_html($settings['layout_one_title']); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_description'])) : ?>
                            <p>
                                <?php echo esc_html($settings['layout_one_description']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4">
                        <?php if (!empty($settings['layout_one_location_items'])) : ?>
                            <?php foreach ($settings['layout_one_location_items'] as $item) : ?>
                                <div class="col-lg-6">
                                    <div class="content-2">
                                        <?php if (!empty($item['location_title'])) : ?>
                                            <h2>
                                                <?php echo esc_html($item['location_title']); ?>
                                            </h2>
                                        <?php endif; ?>
                                        <?php if (!empty($item['location_address'])) : ?>
                                            <p class="mb-3">
                                                <?php echo wp_kses_post($item['location_address']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($item['location_email'])) : ?>
                                            <a class="mb-3" href="mailto:<?php echo esc_attr($item['location_email']); ?>"><?php echo esc_html($item['location_email']); ?></a>
                                        <?php endif; ?>
                                        <?php if (!empty($item['location_phone'])) : ?>
                                            <a class="mb-3" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $item['location_phone'])); ?>"><?php echo esc_html($item['location_phone']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
