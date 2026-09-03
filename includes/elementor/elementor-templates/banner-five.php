<?php if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Slider Section Start -->
    <section class="slider-area bgs-cover pt-185 pb-160" style="background-image: url(<?php echo esc_url($settings['layout_five_background_image']['url']); ?>);">
        <div class="container">
            <div class="main-slider-active">
                <?php if (!empty($settings['banner_five_slides'])) : ?>
                    <?php foreach ($settings['banner_five_slides'] as $slide) : ?>
                        <div class="slider-item">
                            <div class="slide-content text-white">
                                <?php if (!empty($slide['slide_subtitle'])) : ?>
                                    <span class="sub-title"><?php echo esc_html($slide['slide_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($slide['slide_tagline'])) : ?>
                                    <span class="h2"><?php echo esc_html($slide['slide_tagline']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($slide['slide_title'])) : ?>
                                    <h1><?php echo esc_html($slide['slide_title']); ?></h1>
                                <?php endif; ?>
                                <?php if (!empty($slide['slide_button_text'])) : ?>
                                    <a href="<?php echo esc_url($slide['slide_button_url']['url']); ?>" <?php if (!empty($slide['slide_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn"><?php echo esc_html($slide['slide_button_text']); ?> <i class="fas fa-long-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Slider Section End -->
<?php endif; ?>