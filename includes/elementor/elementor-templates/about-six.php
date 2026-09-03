<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Artificial Intelligenc Area Start -->
    <section class="artificial-intelligence-area rel pt-50 rpt-20 pb-130 rpb-100 z-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-11">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_six_section_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                        <p><?php echo grozomart_kses_basic($settings['layout_six_section_description']); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-1070">
            <div class="row pb-30 rpb-65 gap-100 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="ai-image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_six_first_image'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ai-content mb-40 rmb-0" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <span class="subtitle"><?php echo grozomart_kses_basic($settings['layout_six_first_subtitle']); ?></span>
                        <h3><?php echo grozomart_kses_basic($settings['layout_six_first_title']); ?></h3>
                        <p><?php echo grozomart_kses_basic($settings['layout_six_first_description']); ?></p>
                        <a href="<?php echo esc_url($settings['layout_six_first_button_url']['url']); ?>" <?php if (!empty($settings['layout_six_first_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn style-two mt-25"><?php echo esc_html($settings['layout_six_first_button_text']); ?> <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row gap-100 align-items-center">
                <div class="col-lg-6">
                    <div class="ai-image rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_six_second_image'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ai-content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <span class="subtitle"><?php echo grozomart_kses_basic($settings['layout_six_second_subtitle']); ?></span>
                        <h3><?php echo grozomart_kses_basic($settings['layout_six_second_title']); ?></h3>
                        <p><?php echo grozomart_kses_basic($settings['layout_six_second_description']); ?></p>
                        <ul class="icon-list style-two mt-25 mb-20">
                            <?php if (!empty($settings['layout_six_list_items'])) : ?>
                                <?php foreach ($settings['layout_six_list_items'] as $item) : ?>
                                    <li><i class="fas fa-check"></i> <?php echo grozomart_kses_basic($item['list_item']); ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <a href="<?php echo esc_url($settings['layout_six_second_button_url']['url']); ?>" <?php if (!empty($settings['layout_six_second_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn style-three mt-25"><?php echo esc_html($settings['layout_six_second_button_text']); ?> <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Artificial Intelligenc Area End -->
<?php endif; ?>