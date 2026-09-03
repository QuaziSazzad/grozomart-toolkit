<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Consultations Area start -->
    <section class="consultations-area pt-75 rpt-45 rel z-1">
        <div class="container container-1440">
            <div class="row no-gap align-items-end">
                <div class="col-xl-6">
                    <div class="consultations-content mt-55 wow fadeInLeft delay-0-2s">
                        <div class="section-title mb-30">
                            <span class="sub-title mb-15"><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></span>
                            <?php printf('<%1$s>%2$s</%1$s>', $settings['layout_one_title_tag'], grozomart_kses_basic($settings['layout_one_title'])); ?>
                        </div>
                        <div class="consultations-bottom bgc-secondary text-white bgs-cover p-80 py-40" <?php if (!empty($settings['layout_one_background_image']['url'])): ?> style="background-image: url(<?php echo esc_url($settings['layout_one_background_image']['url']); ?>);" <?php endif; ?>>
                            <ul class="list-style-three mb-15">
                                <?php foreach ($settings['layout_one_list_items'] as $item): ?>
                                    <li><?php echo grozomart_kses_basic($item['list_item']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="about-btns">
                                <?php if (!empty($settings['layout_one_button_label'])): ?>
                                    <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn mt-15" <?php echo ($settings['layout_one_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_one_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo grozomart_kses_basic($settings['layout_one_button_label']); ?> <i class="fas fa-long-arrow-right"></i></a>
                                <?php endif; ?>
                                <div class="hotline mt-15">
                                    <i class="fas fa-phone"></i>
                                    <div class="content">
                                        <span><?php echo grozomart_kses_basic($settings['layout_one_hotline_text']); ?></span><br>
                                        <a href="<?php echo esc_url($settings['layout_one_hotline_number_url']); ?>"><?php echo grozomart_kses_basic($settings['layout_one_hotline_number']); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="consultations-video mt-55 wow fadeInRight delay-0-2s">
                        <?php echo grozomart_elementor_rendered_image($settings, 'layout_one_video_image'); ?>
                        <a href="<?php echo esc_url($settings['layout_one_video_url']['url']); ?>" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Consultations Area end -->
<?php endif; ?>