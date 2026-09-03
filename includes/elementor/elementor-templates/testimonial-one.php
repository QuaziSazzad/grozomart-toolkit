<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Testimonial Section Start -->
    <section class="testimonial-section fix section-padding pt-0">
        <div class="container">
            <div class="testimonial-wrapper">
                <?php if (!empty($settings['layout_one_title'])) : ?>
                    <<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h2'); ?> class="sec-title">
                        <?php echo esc_html($settings['layout_one_title']); ?>
                    </<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h2'); ?>>
                <?php endif; ?>

                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        <?php if (!empty($settings['layout_one_testimonial'])) : ?>
                            <?php foreach ($settings['layout_one_testimonial'] as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-items">
                                        <?php if (!empty($item['rating'])) : ?>
                                            <div class="star">
                                                <?php for ($i = 1; $i <= $item['rating']; $i++) : ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($item['testimonial'])) : ?>
                                            <p class="text">
                                                <?php echo esc_html($item['testimonial']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <div class="line-1"></div>

                                        <div class="client-info">
                                            <?php if (!empty($item['image']['url'])) : ?>
                                                <div class="image">
                                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="info-content">
                                                <?php if (!empty($item['name'])) : ?>
                                                    <span class="name"><?php echo esc_html($item['name']); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($item['designation'])) : ?>
                                                    <p><?php echo esc_html($item['designation']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
