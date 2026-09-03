<?php if ('layout_seven' == $settings['layout_type']) :
    $uid = $this->get_id();
?>

    <!-- FAQs Area start -->
    <section class="faqs-area pb-130 rpb-100 rel z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="faqs-content rmb-60" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-50">
                            <?php if (!empty($settings['layout_seven_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_seven_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_seven_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_seven_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_seven_title']); ?></<?php echo esc_attr($settings['layout_seven_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <div class="accordion" id="faq-accordion-<?php echo esc_attr($uid); ?>" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <?php
                            if (!empty($settings['layout_seven_faq_items'])) :
                                $i = 0;
                                foreach ($settings['layout_seven_faq_items'] as $item) :
                                    $i++;
                                    $collapsed = ($item['is_active'] == 'yes') ? '' : 'collapsed';
                                    $show = ($item['is_active'] == 'yes') ? 'show' : '';
                            ?>
                                    <div class="accordion-item-five">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button <?php echo esc_attr($collapsed); ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($i . $uid); ?>">
                                                <span class="title"><?php echo grozomart_kses_basic($item['faq_title']); ?></span>
                                                <span class="icon"><i class="far fa-arrow-right"></i></span>
                                            </button>
                                        </h6>
                                        <div id="collapse<?php echo esc_attr($i . $uid); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" data-bs-parent="#faq-accordion-<?php echo esc_attr($uid); ?>">
                                            <div class="accordion-body">
                                                <p><?php echo grozomart_kses_basic($item['faq_content']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="faq-right-image" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_seven_image'); ?>
                        <div class="site-logo">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_seven_logo'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQs Area end -->
<?php endif; ?>