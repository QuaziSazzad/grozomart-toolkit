<?php if ('layout_eleven' == $settings['layout_type']) : ?>
    <!-- About Area start -->
    <section class="about-six-area pb-130 rpb-100 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-six-image rmb-60" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-six-image-wrap radius-animation-two">
                            <?php echo grozomart_elementor_rendered_image($settings, 'layout_eleven_image'); ?>
                        </div>
                        <div class="about-six-shape">
                            <?php echo grozomart_elementor_rendered_image($settings, 'layout_eleven_shape_image'); ?>
                        </div>
                        <div class="client-satisfied text-white">
                            <i class="flaticon-experience"></i>
                            <h4><?php echo esc_html($settings['layout_eleven_client_percentage']); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-six-content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-40">
                            <?php if (!empty($settings['layout_eleven_subtitle'])) : ?>
                                <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_eleven_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_eleven_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_eleven_title_tag']); ?> class="sec-title"><?php echo wp_kses_post($settings['layout_eleven_title']); ?></<?php echo esc_attr($settings['layout_eleven_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_eleven_description'])) : ?>
                            <p class="summary-text"><?php echo grozomart_kses_basic($settings['layout_eleven_description']); ?></p>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-style-five mb-25">
                                    <?php if (!empty($settings['layout_eleven_list_items_left'])) : ?>
                                        <?php foreach ($settings['layout_eleven_list_items_left'] as $item) : ?>
                                            <li><i class="far fa-check"></i> <?php echo esc_html($item['layout_eleven_list_item']); ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-style-five mb-25">
                                    <?php if (!empty($settings['layout_eleven_list_items_right'])) : ?>
                                        <?php foreach ($settings['layout_eleven_list_items_right'] as $item) : ?>
                                            <li><i class="far fa-check"></i> <?php echo esc_html($item['layout_eleven_list_item']); ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php if (!empty($settings['layout_eleven_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_eleven_button_url']['url']); ?>" class="theme-btn mt-25" <?php echo ($settings['layout_eleven_button_url']['is_external'] ? 'target="_blank"' : ''); ?> <?php echo ($settings['layout_eleven_button_url']['nofollow'] ? 'rel="nofollow"' : ''); ?>><?php echo esc_html($settings['layout_eleven_button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area end -->
<?php endif; ?>