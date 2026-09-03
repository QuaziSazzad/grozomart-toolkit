<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Contact Form Section Start -->
    <section class="contact-form-area py-130 rpy-100 bgs-cover" <?php if (!empty($settings['layout_one_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['layout_one_background_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <div class="row gap-100 align-items-center">
                <div class="col-lg-7">
                    <div class="contact-form-two bg-white p-80 rmb-55 wow fadeInRight delay-0-2s">
                        <div class="section-title mb-30">
                            <?php if ($settings['layout_one_form_title']) : ?>
                                <h3><?php echo grozomart_kses_basic($settings['layout_one_form_title']); ?></h3>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_one_select_cf7_form'])) : ?>
                            <?php echo str_replace("<br />", "", trim(do_shortcode('[contact-form-7 id="' . $settings['layout_one_select_cf7_form'] . '" ]'))); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-info-wrap wow fadeInLeft delay-0-2s">
                        <div class="section-title mb-40">
                            <?php if ($settings['layout_one_info_subtitle']) : ?>
                                <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_one_info_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if ($settings['layout_one_info_title']) : ?>
                                <h2><?php echo grozomart_kses_basic($settings['layout_one_info_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="contact-info-part-two">
                            <div class="contact-info-item-two">
                                <div class="icon">
                                    <i class="far fa-map-marked-alt"></i>
                                </div>
                                <div class="content">
                                    <?php if ($settings['layout_one_location_label']) : ?>
                                        <span><?php echo grozomart_kses_basic($settings['layout_one_location_label']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($settings['layout_one_location_text']) : ?>
                                        <h5><?php echo grozomart_kses_basic($settings['layout_one_location_text']); ?></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="contact-info-item-two">
                                <div class="icon">
                                    <i class="far fa-envelope-open-text"></i>
                                </div>
                                <div class="content">
                                    <?php if ($settings['layout_one_email_label']) : ?>
                                        <span><?php echo grozomart_kses_basic($settings['layout_one_email_label']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($settings['layout_one_email_text']) : ?>
                                        <h5><a href="mailto:<?php echo esc_attr($settings['layout_one_email_text']); ?>"><?php echo grozomart_kses_basic($settings['layout_one_email_text']); ?></a></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="contact-info-item-two">
                                <div class="icon">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="content">
                                    <?php if ($settings['layout_one_phone_label']) : ?>
                                        <span><?php echo grozomart_kses_basic($settings['layout_one_phone_label']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($settings['layout_one_phone_text']) : ?>
                                        <h5><a href="tel:<?php echo esc_attr(str_replace(' ', '', $settings['layout_one_phone_text'])); ?>"><?php echo grozomart_kses_basic($settings['layout_one_phone_text']); ?></a></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->
<?php endif; ?>