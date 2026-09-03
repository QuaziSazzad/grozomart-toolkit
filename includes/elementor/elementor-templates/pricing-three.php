<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Pricing Area Start -->
    <section class="pricing-area-four bgc-lighter overflow-hidden rel z-1 pt-125 rpt-95 pb-100 rpb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-11">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_three_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if (!empty($settings['layout_three_pricing_items'])) :
                    $delay = 0;
                    foreach ($settings['layout_three_pricing_items'] as $index => $package) :
                        $color_class = !empty($package['layout_three_package_color']) ? $package['layout_three_package_color'] : '';
                ?>
                        <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="pricing-item style-four">
                                <div class="title-price">
                                    <h5 class="title <?php echo esc_attr($color_class); ?>"><?php echo esc_html($package['layout_three_package_title']); ?></h5>
                                    <div class="price"><span class="prev">$</span><?php echo esc_html($package['layout_three_price']); ?><span class="next"><?php echo esc_html($package['layout_three_duration']); ?></span></div>
                                </div>
                                <hr>
                                <div class="text"><?php echo esc_html($package['layout_three_description']); ?></div>
                                <ul class="icon-list">
                                    <?php
                                    if (!empty($package['layout_three_features'])) :
                                        foreach ($package['layout_three_features'] as $feature) :
                                            $hide_class = 'yes' === $feature['is_hidden'] ? 'hide' : '';
                                    ?>
                                            <li class="<?php echo esc_attr($hide_class); ?>"><i class="fal fa-check"></i> <?php echo esc_html($feature['feature_text']); ?></li>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                                <?php if (!empty($package['layout_three_button_text'])) : ?>
                                    <a href="<?php echo esc_url($package['layout_three_button_url']['url']); ?>" <?php echo !empty($package['layout_three_button_url']['is_external']) ? 'target="_blank"' : ''; ?> class="theme-btn style-two"><?php echo esc_html($package['layout_three_button_text']); ?> <i class="far fa-arrow-right"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($package['layout_three_footer_text'])) : ?>
                                    <div class="footer-text"><?php echo esc_html($package['layout_three_footer_text']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                        $delay += 100;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="bg-circle-shapes">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Pricing Area End -->
<?php endif; ?>