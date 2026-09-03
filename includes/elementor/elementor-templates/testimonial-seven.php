<?php if ('layout_seven' == $settings['layout_type']) : ?>
    <!-- Testimonials Area start -->
    <section class="testimonials-area bgc-gray bgs-cover py-130 rpy-100 rel z-1" <?php if (!empty($settings['layout_seven_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['layout_seven_bg_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_seven_sub_title']) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_seven_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_seven_title']) : ?>
                            <<?php echo esc_attr($settings['layout_seven_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_seven_title']); ?></<?php echo esc_attr($settings['layout_seven_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="testimonials-six-active">
                <?php
                if (is_array($settings['layout_seven_testimonial'])) :
                    foreach ($settings['layout_seven_testimonial'] as $item) :
                ?>
                        <div class="testimonial-item-six">
                            <div class="testi-author">
                                <?php grozomart_elementor_rendered_image($item, 'image'); ?>
                                <span><?php echo esc_html($item['name']); ?> </span> /<?php echo esc_html($item['designation']); ?>
                            </div>
                            <div class="testi-text">
                                <?php echo grozomart_kses_basic($item['testimonial']); ?>
                            </div>
                            <div class="text-ratting">
                                <h6>"<?php echo esc_html($item['service_title']); ?>"</h6>
                                <div class="ratting">
                                    <?php for ($i = 1; $i <= $item['rating']; $i++) : ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Testimonials Area end -->
<?php endif; ?>