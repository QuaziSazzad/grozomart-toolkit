<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Shop Category Section Start -->
    <section class="shop-category-section shop-category-section-twoss section-padding">
        <div class="container">
            <div class="shop-category-wrapper">
                <div class="swiper shop-category-slider">
                    <div class="swiper-wrapper">
                        <?php if (!empty($settings['layout_two_category_items'])) : ?>
                            <?php foreach ($settings['layout_two_category_items'] as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="shop-category-items style-two">
                                        <?php if (!empty($item['category_image']['url'])) : ?>
                                            <div class="thumb">
                                                <img src="<?php echo esc_url($item['category_image']['url']); ?>" alt="<?php echo esc_attr($item['category_title']); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($item['category_title'])) : ?>
                                            <h2 class="title">
                                                <a href="<?php echo esc_url($item['category_url']['url']); ?>" <?php echo !empty($item['category_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($item['category_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                    <?php echo esc_html($item['category_title']); ?>
                                                </a>
                                            </h2>
                                        <?php endif; ?>
                                        <?php if (!empty($item['category_count_text'])) : ?>
                                            <p class="textss"><?php echo esc_html($item['category_count_text']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="array-button">
                    <button class="array-prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="array-next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
