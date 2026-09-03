<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Contact Us area start -->
    <section class="contact-us-area rel z-2">
        <div class="container container-1290">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="contact-image-five rel rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_two_image'); ?>
                        </div>

                        <div class="abs-headings" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50" data-aos-delay="100">
                            <?php echo grozomart_kses_basic($settings['layout_two_caption']); ?>
                        </div>
                        <div class="logo"><a href="<?php echo esc_url($settings['layout_two_logo_url']['url']) ?>"><img src="<?php echo esc_url($settings['layout_two_logo']['url']); ?>" alt="<?php echo esc_attr($settings['layout_two_logo']['alt']); ?>" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50" class="aos-init aos-animate"></a></div>

                    </div>
                </div>
                <div class="col-lg-6 text-white">
                    <div class="contact-form style-two bgc-primary z-1 rel" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_two_ct_from_title'])): ?>
                            <<?php echo esc_attr($settings['layout_two_ct_from_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_two_ct_from_title']); ?></<?php echo esc_attr($settings['layout_two_ct_from_title_tag']); ?>>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_ct_from_sub_title'])) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_two_ct_from_sub_title']); ?></p>
                        <?php endif; ?>
                        <?php echo str_replace("<br />", "", trim(do_shortcode('[contact-form-7 id="' . $settings['layout_two_select_cf7_form'] . '" ]'))); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us area end -->
<?php endif; ?>