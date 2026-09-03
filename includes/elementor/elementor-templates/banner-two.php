<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Hero Section Start -->
    <section class="hero-section-2">
        <div class="hero-2">
            <?php if (!empty($settings['layout_two_bottom_image']['url'])) : ?>
                <div class="hero-bottom">
                    <img src="<?php echo esc_url($settings['layout_two_bottom_image']['url']); ?>" alt="">
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="swiper hero-slider">
                    <div class="swiper-wrapper">
                        <?php if (!empty($settings['layout_two_slides'])) : ?>
                            <?php foreach ($settings['layout_two_slides'] as $index => $slide) : ?>
                                <div class="swiper-slide">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="hero-content">
                                                <?php if (!empty($slide['slide_sub_title'])) : ?>
                                                    <span class="hero-sub wow fadeInUp">
                                                        <?php echo wp_kses_post($slide['slide_sub_title']); ?>
                                                    </span>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['slide_title'])) : ?>
                                                    <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                                        <?php echo wp_kses_post($slide['slide_title']); ?>
                                                    </h1>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['slide_description'])) : ?>
                                                    <p class="text wow fadeInUp" data-wow-delay=".5s">
                                                        <?php echo esc_html($slide['slide_description']); ?>
                                                    </p>
                                                <?php endif; ?>

                                                <div class="price-items wow fadeInUp" data-wow-delay=".7s">
                                                    <?php if (!empty($slide['slide_button_label'])) : ?>
                                                        <a href="<?php echo esc_url($slide['slide_button_url']['url']); ?>" class="theme-btn" <?php echo !empty($slide['slide_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($slide['slide_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                            <?php echo esc_html($slide['slide_button_label']); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($slide['slide_price'])) : ?>
                                                        <p>
                                                            <?php echo esc_html($slide['slide_price_text']); ?> <span><?php echo esc_html($slide['slide_price']); ?></span>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                            <div class="hero-image">
                                                <?php if (!empty($slide['slide_image']['url'])) : ?>
                                                    <img src="<?php echo esc_url($slide['slide_image']['url']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($slide['slide_title'])); ?>">
                                                <?php endif; ?>
                                                <?php if (!empty($slide['slide_offer_image']['url'])) : ?>
                                                    <div class="offer-shape">
                                                        <img src="<?php echo esc_url($slide['slide_offer_image']['url']); ?>" alt="">
                                                    </div>
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
            <?php if (!empty($settings['layout_two_scroll_down_image']['url'])) : ?>
                <div id="scrollDown" class="scroll-down">
                    <img src="<?php echo esc_url($settings['layout_two_scroll_down_image']['url']); ?>" alt="img">
                </div>
            <?php endif; ?>
            <div class="array-button">
                <button class="array-prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="array-next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
<?php endif; ?>
