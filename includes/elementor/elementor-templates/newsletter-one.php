<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- CTA Area Start -->
    <section class="cta-two-area rel z-1">
        <div class="container px-sm-0 bordered-x pb-100">
            <div class="cta-two-wrap bgc-primary br-10" style="background-image: url(<?php echo esc_url($settings['layout_one_shape']['url']); ?>);">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="cta-content-two rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title text-white mb-25">
                                <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                                    <span class="subtitle mt-10 mb-15"><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_one_title'])) : ?>
                                    <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                                <?php endif; ?>
                                <p><?php echo esc_html($settings['layout_one_input_label']); ?></p>
                            </div>
                            <form class="newsletter-form mc-form">
                                <label for="news-email"><i class="fas fa-envelope"></i></label>
                                <input id="news-email" class="mc-form__input" type="email" placeholder="<?php echo esc_attr($settings['layout_one_input_placeholder']); ?>" required>
                                <button type="submit" class="theme-btn bgc-secondary hover-secondary" data-hover="<?php echo esc_attr($settings['layout_one_button_label']); ?>">
                                    <span><?php echo esc_html($settings['layout_one_button_label']); ?></span>
                                </button>
                            </form>
                            <p class="mc-form__feedback text-white"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-xl-end">
                        <div class="cta-two-image-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_one_bg_image'); ?>
                            <div class="shape logo">
                                <?php grozomart_elementor_rendered_image($settings, 'layout_one_logo'); ?>
                            </div>
                            <div class="shape one">
                                <?php \Elementor\Icons_Manager::render_icon($settings['layout_one_icon_one'], ['aria-hidden' => 'true'], 'i'); ?>
                            </div>
                            <div class="shape two">
                                <?php \Elementor\Icons_Manager::render_icon($settings['layout_one_icon_two'], ['aria-hidden' => 'true'], 'i'); ?>
                            </div>
                            <div class="shape three">
                                <?php \Elementor\Icons_Manager::render_icon($settings['layout_one_icon_three'], ['aria-hidden' => 'true'], 'i'); ?>
                            </div>
                            <div class="shape four">
                                <?php \Elementor\Icons_Manager::render_icon($settings['layout_one_icon_four'], ['aria-hidden' => 'true'], 'i'); ?>
                            </div>
                            <div class="abs-headings">
                                <h6 class="shape five bgc-primary text-white"><?php echo grozomart_kses_basic($settings['layout_one_caption_one']); ?></h6>
                                <h6 class="shape six bgc-green"><?php echo grozomart_kses_basic($settings['layout_one_caption_two']); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Area End -->
<?php endif; ?>