<?php if ('layout_five' == $settings['layout_type']) :
    $uid = $this->get_id();
?>

    <!-- Service Details Content Area start -->
    <section class="service-details-content-area py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-7">
                    <div class="service-accordion-left-content rmb-50" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-50">
                            <?php if (!empty($settings['layout_five_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_five_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_five_title']); ?></<?php echo esc_attr($settings['layout_five_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php grozomart_elementor_rendered_image($settings, 'layout_five_image'); ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="service-details-accordion-wrap" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="accordion-one" id="service-details-accordion-<?php echo esc_attr($uid); ?>">
                            <?php
                            if (!empty($settings['layout_five_faq_items'])) :
                                $i = 0;
                                foreach ($settings['layout_five_faq_items'] as $item) :
                                    $i++;
                                    $collapsed = ($item['is_active'] == 'yes') ? '' : 'collapsed';
                                    $show = ($item['is_active'] == 'yes') ? 'show' : '';
                            ?>
                                    <div class="accordion-item-four">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button <?php echo esc_attr($collapsed); ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($i . $uid); ?>">
                                                <span class="title"><?php echo grozomart_kses_basic($item['faq_title']); ?></span>
                                                <span class="icon first"><i class="fas fa-plus"></i></span>
                                                <span class="icon second"><i class="fas fa-minus"></i></span>
                                            </button>
                                        </h6>
                                        <div id="collapse<?php echo esc_attr($i . $uid); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" data-bs-parent="#service-details-accordion-<?php echo esc_attr($uid); ?>">
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
            </div>
        </div>
    </section>
    <!-- Service Details Content Area end -->
<?php endif; ?>