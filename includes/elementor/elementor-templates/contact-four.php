<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Contact Form Area start -->
    <section class="contact-form-area pt-130 rpt-100 pb-120 rpb-90">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-9">
                    <div class="contact-info-part rmb-55" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-40">
                            <?php if (!empty($settings['layout_four_section_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo esc_html($settings['layout_four_section_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_four_section_title'])) : ?>
                                <h2><?php echo esc_html($settings['layout_four_section_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_four_section_desc'])) : ?>
                            <p><?php echo wp_kses_post($settings['layout_four_section_desc']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_four_contact_items'])) : ?>
                            <div class="contact-info-wrap mt-40">
                                <?php foreach ($settings['layout_four_contact_items'] as $item) : ?>
                                    <div class="contact-info-item">
                                        <div class="icon"><?php \Elementor\Icons_Manager::render_icon($item['contact_item_icon'], ['aria-hidden' => 'true']); ?></div>
                                        <div class="text">
                                            <?php if (!empty($item['contact_item_title'])) : ?>
                                                <span class="title"><?php echo esc_html($item['contact_item_title']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($item['contact_item_content'])) : ?>
                                                <p><?php echo wp_kses_post($item['contact_item_content']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-9">
                    <div class="contact-page-form z-1 rel" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div id="contactForm" class="contactForm">
                            <?php if (!empty($settings['layout_four_ct_from_title'])) : ?>
                                <h4><?php echo esc_html($settings['layout_four_ct_from_title']); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_four_ct_from_sub_title'])) : ?>
                                <p><?php echo esc_html($settings['layout_four_ct_from_sub_title']); ?></p>
                            <?php endif; ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['layout_four_select_cf7_form'] . '"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Area end -->
<?php endif; ?>