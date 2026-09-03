<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Benefits Area start -->
    <section class="benefits-area bgc-blue pt-130 rpt-100 pb-100 rpb-70 rel z-1" <?php if (!empty($settings['layout_one_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['layout_one_background_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="benefits-image-area mb-30" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_image']['url'])) : ?>
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_image'); ?>
                        <?php endif; ?>
                        <div class="benefit-achievement" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="circle-progress-achievement one">
                                <i class="far fa-arrow-right"></i>
                                <div class="achievement-content">
                                    <span class="counting"><?php echo esc_html($settings['layout_one_awards_number']); ?></span>
                                    <h6><?php echo esc_html($settings['layout_one_awards_text']); ?></h6>
                                </div>
                            </div>
                            <div class="circle-progress-achievement two">
                                <i class="far fa-arrow-right"></i>
                                <div class="achievement-content">
                                    <span class="counting"><?php echo esc_html($settings['layout_one_reviews_number']); ?></span>
                                    <h6><?php echo esc_html($settings['layout_one_reviews_text']); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8">
                    <div class="benefits-faq-area mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title text-white mb-25">
                            <?php if (!empty($settings['layout_one_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo esc_html($settings['layout_one_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <div class="accordion-one mt-50 mb-30 rmb-0" id="benefits-accordion" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_one_faq_items'])) :
                                $i = 1;
                                foreach ($settings['layout_one_faq_items'] as $item) :
                                    $is_active = $item['layout_one_is_active'] === 'yes' ? 'show' : '';
                                    $is_collapsed = $item['layout_one_is_active'] === 'yes' ? '' : 'collapsed';
                            ?>
                                    <div class="accordion-item-three">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button <?php echo esc_attr($is_collapsed); ?>" data-bs-toggle="collapse" data-bs-target="#collapseBf<?php echo esc_attr($i); ?>">
                                                <span class="title"><?php echo esc_html($item['layout_one_faq_title']); ?></span>
                                                <span class="icon"><i class="far fa-angle-down"></i></span>
                                            </button>
                                        </h6>
                                        <div id="collapseBf<?php echo esc_attr($i); ?>" class="accordion-collapse collapse <?php echo esc_attr($is_active); ?>" data-bs-parent="#benefits-accordion">
                                            <div class="accordion-body">
                                                <p><?php echo esc_html($item['layout_one_faq_content']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $i++;
                                endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits Area end -->
<?php endif; ?>