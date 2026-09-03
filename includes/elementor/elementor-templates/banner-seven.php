<?php if ('layout_seven' == $settings['layout_type']) : ?>
          <!-- Hero Section Start -->
          <section class="hero-area-seven pt-155 rpt-130 pb-80 rel z-1" style="background-image: url(<?php echo esc_url($settings['layout_seven_bg_image']['url']); ?>);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 align-self-center">
                        <div class="hero-content text-white rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_seven_title']) ) : ?>
                                <<?php echo esc_attr($settings['layout_seven_title_tag']); ?>>
                                    <?php echo grozomart_kses_basic($settings['layout_seven_title']); ?>
                                </<?php echo esc_attr($settings['layout_seven_title_tag']); ?>>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_seven_description'])) : ?>
                                <p><?php echo grozomart_kses_basic($settings['layout_seven_description']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_seven_list_items'])) : ?>
                                <ul class="hero-list">
                                    <?php foreach ($settings['layout_seven_list_items'] as $item) : ?>
                                        <li>
                                            <?php if (!empty($item['icon'])) : ?>
                                                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                            <?php endif; ?>
                                            <?php echo esc_html($item['text']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_seven_button_text'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_seven_button_url']['url']); ?>" <?php if (!empty($settings['layout_seven_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn mt-15">
                                    <?php echo esc_html($settings['layout_seven_button_text']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-image" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <?php grozomart_elementor_rendered_image($settings, 'layout_seven_image'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
<?php endif; ?>