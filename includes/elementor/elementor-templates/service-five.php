<?php if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Numbered box Area Start -->
    <section class="numbered-box-area rel pt-130 rpt-100 rel z-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-11">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <<?php echo esc_attr($settings['layout_five_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_five_title']); ?></<?php echo esc_attr($settings['layout_five_title_tag']); ?>>
                        <p><?php echo grozomart_kses_basic($settings['layout_five_description']); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($settings['layout_five_service_list'])) :
                    $delay = 0;
                    foreach ($settings['layout_five_service_list'] as $index => $item) :
                        $delay_attr = $index > 0 ? 'data-aos-delay="' . ($index * 100) . '"' : '';
                ?>
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" <?php echo $delay_attr; ?> data-aos-duration="1500" data-aos-offset="50">
                            <div class="numbered-box style-three <?php echo esc_attr($item['box_bg_class']); ?>">
                                <div class="number"><?php echo esc_html($item['number']); ?></div>
                                <div class="content">
                                    <h4>
                                        <?php if (!empty($item['url']['url'])) : ?>
                                            <a href="<?php echo esc_url($item['url']['url']); ?>" <?php echo ($item['url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($item['url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                <?php echo esc_html($item['title']); ?>
                                            </a>
                                        <?php else : ?>
                                            <?php echo esc_html($item['title']); ?>
                                        <?php endif; ?>
                                    </h4>
                                    <p><?php echo grozomart_kses_basic($item['description']); ?></p>
                                    <?php if (!empty($item['url']['url'])) : ?>
                                        <a href="<?php echo esc_url($item['url']['url']); ?>" class="read-more" <?php echo ($item['url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($item['url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo esc_html__('Read More', 'grozomart-toolkit'); ?> <i class="far fa-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php grozomart_elementor_rendered_image($item, 'image'); ?>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Numbered box Area End -->
<?php endif; ?>