<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- FAQs Area start -->
    <section class="faqs-area pt-130 rpt-100 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="faqs-images">
                        <div class="left" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_two_image_1'); ?>
                            <?php grozomart_elementor_rendered_image($settings, 'layout_two_image_2'); ?>
                        </div>
                        <div class="right" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_two_image_3'); ?>
                            <?php grozomart_elementor_rendered_image($settings, 'layout_two_image_4'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="faqs-content rmt-30" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <?php if (!empty($settings['layout_two_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo esc_html($settings['layout_two_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_two_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo wp_kses_post($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_two_description'])) : ?>
                            <p><?php echo wp_kses_post($settings['layout_two_description']); ?></p>
                        <?php endif; ?>
                        <div class="accordion-one mt-25 mb-30 rmb-0" id="faq-accordion" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_two_faq_items'])) :
                                $i = 1;
                                foreach ($settings['layout_two_faq_items'] as $item) :
                                    $is_active = $item['layout_two_is_active'] === 'yes' ? 'show' : '';
                                    $button_class = $item['layout_two_is_active'] === 'yes' ? 'accordion-button' : 'accordion-button collapsed';
                                    $collapse_id = 'collapse' . $i;
                            ?>
                                    <div class="accordion-item-two">
                                        <h6 class="accordion-header">
                                            <button class="<?php echo esc_attr($button_class); ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>">
                                                <span class="title"><?php echo wp_kses_post($item['layout_two_faq_title']); ?></span>
                                                <span class="icon"><i class="far fa-arrow-right"></i></span>
                                            </button>
                                        </h6>
                                        <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo esc_attr($is_active); ?>" data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <p><?php echo wp_kses_post($item['layout_two_faq_content']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $i++;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQs Area end -->
<?php endif; ?>