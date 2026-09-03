<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Hero Section Start -->
    <section class="hero-area style-three bgc-blue rpy-100 rel z-1" style="background-image: url(<?php echo esc_url($settings['layout_three_background']['url']); ?>);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 align-self-center">
                    <div class="hero-content text-white py-160 rpy-0" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_three_subtitle'])) : ?>
                            <span class="sub-title mb-15"><?php echo esc_html($settings['layout_three_subtitle']); ?></span>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_three_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo esc_html($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_three_description'])) : ?>
                            <p><?php echo esc_html($settings['layout_three_description']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_three_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_three_button_url']['url']); ?>" class="theme-btn mt-15" <?php echo ($settings['layout_three_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_three_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($settings['layout_three_button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-three">
                        <?php if (!empty($settings['layout_three_image_one']['url'])) : ?>
                            <div class="image one">
                                <img data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50" src="<?php echo esc_url($settings['layout_three_image_one']['url']); ?>" alt="<?php echo esc_attr__('Hero', 'grozomart-toolkit'); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_three_image_two']['url'])) : ?>
                            <div class="image two">
                                <img data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50" src="<?php echo esc_url($settings['layout_three_image_two']['url']); ?>" alt="<?php echo esc_attr__('Hero', 'grozomart-toolkit'); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_three_image_three']['url'])) : ?>
                            <div class="image three">
                                <img data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50" src="<?php echo esc_url($settings['layout_three_image_three']['url']); ?>" alt="<?php echo esc_attr__('Hero', 'grozomart-toolkit'); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_three_image_four']['url'])) : ?>
                            <div class="image four">
                                <img data-aos="fade-down" data-aos-duration="1500" data-aos-offset="50" src="<?php echo esc_url($settings['layout_three_image_four']['url']); ?>" alt="<?php echo esc_attr__('Hero', 'grozomart-toolkit'); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<?php endif; ?>