<?php if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Testimonials Area Start -->
    <section class="testimonials-area-five pt-130 rpt-100 pb-75 rpb-45">
        <div class="container container-1290">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-50 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_five_sub_title']) : ?>
                            <span class="subtitle color-primary mt-10 mb-15"><?php echo grozomart_kses_basic($settings['layout_five_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_five_title']) : ?>
                            <h2><?php echo grozomart_kses_basic($settings['layout_five_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6">
                    <div class="testimonials-content-five mb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="testimonials-four-active">
                            <?php
                            if (is_array($settings['layout_five_testimonial'])) :
                                foreach ($settings['layout_five_testimonial'] as $item) :
                            ?>
                                    <div class="testimonial-item style-two">
                                        <div class="author-logo">
                                            <div class="quote"><?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'], 'i'); ?></div>
                                        </div>
                                        <div class="text"><?php echo grozomart_kses_basic($item['testimonial']); ?></div>
                                        <div class="quote-title">
                                            <div class="author"><?php grozomart_elementor_rendered_image($item, 'image'); ?></div>
                                            <h6><?php echo esc_html($item['name']); ?></h6>
                                            <span class="designation"><?php echo esc_html($item['designation']); ?></span>
                                        </div>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                        <div class="testimonial-dots pt-20 mb-10"></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testimonials-image-and-customers mb-55" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_five_section_image'); ?>
                        <div class="trusted-client-part text-center text-white">
                            <h4><?php echo grozomart_kses_basic($settings['layout_five_image_caption']); ?></h4>
                            <hr class="mt-30 mb-40">
                            <div class="trusted-clients">
                                <?php grozomart_elementor_rendered_image($settings, 'layout_five_client_images'); ?>
                                <i data-aos="fade-right" data-aos-duration="1500" data-aos-delay="250" class="far fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Area End -->
<?php endif; ?>