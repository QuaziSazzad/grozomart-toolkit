<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Testimonial Area start -->
    <section class="testimonial-area rel z-1">
        <div class="container-fluid">
            <div class="testimonial-wrap py-130 rpy-100">
                <div class="container">
                    <div class="testimonial-top-wrap pb-30 mb-60">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-5 col-lg-6">
                                <div class="section-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <?php if ($settings['layout_six_sub_title']) : ?>
                                        <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_six_sub_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($settings['layout_six_title']) : ?>
                                        <<?php echo esc_attr($settings['layout_six_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_six_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="trusted-clients-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <?php if ($settings['layout_six_client_title']) : ?>
                                        <h5><?php echo grozomart_kses_basic($settings['layout_six_client_title']); ?></h5>
                                    <?php endif; ?>
                                    <div class="trusted-clients mt-15">
                                        <?php if (is_array($settings['layout_six_client_image'])) : ?>
                                            <?php foreach ($settings['layout_six_client_image'] as $image) : ?>
                                                <img data-aos="fade-right" data-aos-duration="1500" data-aos-delay="50" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo grozomart_get_elementor_thumbnail_alt($image['id']); ?>">
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-inner">
                        <div class="testimonials-two-active">
                            <?php
                            if (is_array($settings['layout_six_testimonial'])) :
                                foreach ($settings['layout_six_testimonial'] as $item) :
                            ?>
                                    <div class="testimonial-item-two">
                                        <div class="ratting">
                                            <?php for ($i = 1; $i <= $item['rating']; $i++) : ?>
                                                <i class="fas fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="testi-text">
                                            <?php echo grozomart_kses_basic($item['testimonial']); ?>
                                        </div>
                                        <div class="testi-author">
                                            <?php grozomart_elementor_rendered_image($item, 'image'); ?>
                                            <span><b><?php echo esc_html($item['name']); ?> </b> /<?php echo esc_html($item['designation']); ?></span>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="testi-arrows style-two mt-70 rmt-50">
                            <button class="testi-arrow-left"><i class="far fa-arrow-left"></i></button>
                            <button class="testi-arrow-right"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area end -->
<?php endif; ?>