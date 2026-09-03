<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Achievement Area start -->
    <section class="achievement-area bgc-blue bgs-cover pt-100 rpt-70 pb-130 rpb-130 rel z-1" <?php if (!empty($settings['layout_one_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['layout_one_bg_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="achievement-content text-white rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <?php if (!empty($settings['layout_one_section_sub_title'])) : ?>
                                <span class="sub-title mb-10"><?php echo esc_html($settings['layout_one_section_sub_title']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_section_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_section_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_one_description'])) : ?>
                            <p><?php echo esc_html($settings['layout_one_description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn mt-20" <?php echo ($settings['layout_one_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_one_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($settings['layout_one_button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="achievement-counter bg-white" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="row no-gap">
                            <?php if (!empty($settings['layout_one_counter_list'])) : ?>
                                <?php foreach ($settings['layout_one_counter_list'] as $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="counter-item" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                            <div class="counter-text-wrap">
                                                <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['number']); ?>">0</span><span class="after"><?php echo esc_html($item['symbol']); ?></span>
                                            </div>
                                            <span class="counter-title"><?php echo esc_html($item['title']); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Achievement Area end -->
<?php endif; ?>