<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Testimonial Area start -->
    <section class="testimonial-area-three bgc-blue py-130 rpy-100 rel z-1" <?php if (!empty($settings['layout_three_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['layout_three_background_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <?php if (!empty($settings['layout_three_title']) || !empty($settings['layout_three_sub_title'])) : ?>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-9">
                        <div class="section-title text-center text-white mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_three_sub_title'])) : ?>
                                <span class="sub-title mb-10"><?php echo wp_kses_post($settings['layout_three_sub_title']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_three_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo wp_kses_post($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['layout_three_testimonial'])) : ?>
                <div class="testimonials-wrap">
                    <div class="testimonials-three-active">
                        <?php foreach ($settings['layout_three_testimonial'] as $item) : ?>
                            <div class="testimonial-item-two style-two">
                                <?php if (!empty($item['rating'])) : ?>
                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= $item['rating']; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item['testimonial'])) : ?>
                                    <div class="testi-text">
                                        <?php echo wp_kses_post($item['testimonial']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="testi-author">
                                    <?php if (!empty($item['image']['url'])) : ?>
                                        <?php grozomart_elementor_rendered_image($item, 'image'); ?>
                                    <?php endif; ?>
                                    <?php if (!empty($item['name']) || !empty($item['designation'])) : ?>
                                        <span><b><?php echo esc_html($item['name']); ?> </b> /<?php echo esc_html($item['designation']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="testi-arrows style-three mt-70 rmt-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <button class="testi-arrow-left"><i class="far fa-arrow-left"></i></button>
                    <button class="testi-arrow-right"><i class="far fa-arrow-right"></i></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="testimonial-images">
            <?php if (!empty($settings['layout_three_left_image']['url'])) : ?>
                <div class="image image-one" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <?php grozomart_elementor_rendered_image($settings, 'layout_three_left_image'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['layout_three_right_image']['url'])) : ?>
                <div class="image image-two" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <?php grozomart_elementor_rendered_image($settings, 'layout_three_right_image'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['layout_three_background_shape']['url'])) : ?>
                <div class="image image-three">
                    <?php grozomart_elementor_rendered_image($settings, 'layout_three_background_shape'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Testimonial Area end -->
<?php endif; ?>