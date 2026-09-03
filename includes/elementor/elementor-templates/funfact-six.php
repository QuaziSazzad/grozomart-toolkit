<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Achievement Area start -->
    <section class="achievement-area style-two bgc-blue bgs-cover py-130 rpy-100 rel z-1" <?php if (!empty($settings['layout_six_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['layout_six_background_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="achievement-content text-white rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <?php if (!empty($settings['layout_six_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_six_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_six_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_six_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_six_description'])) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_six_description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_six_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_six_button_url']['url']); ?>" class="theme-btn mt-20" <?php echo ($settings['layout_six_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_six_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($settings['layout_six_button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="achievement-counter bg-white for-border-radius" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="row no-gap">
                            <?php if (!empty($settings['layout_six_counter_items'])) : ?>
                                <?php foreach ($settings['layout_six_counter_items'] as $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="counter-item style-four" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                            <div class="counter-text-wrap">
                                                <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_number']); ?>">0</span><span class="after"><?php echo esc_html($item['counter_suffix']); ?></span>
                                            </div>
                                            <span class="counter-title"><?php echo esc_html($item['counter_title']); ?></span>
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