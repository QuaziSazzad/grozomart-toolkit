<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Pricing Area start -->
    <section class="pricing-area-two bgs-cover pt-130 rpt-100 pb-100 rpb-70 rel z-1" <?php if (!empty($settings['layout_two_background_image']['url'])) : ?>style="background-image: url(<?php echo esc_url($settings['layout_two_background_image']['url']); ?>);" <?php endif; ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center text-white mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_two_subtitle'])) : ?>
                            <span class="sub-title mb-10"><?php echo esc_html($settings['layout_two_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo esc_html($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="pricing-items">
                <?php foreach ($settings['layout_two_pricing_items'] as $item) : ?>
                    <div class="pricing-item style-two">
                        <div class="row align-items-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="col-xl-3 col-lg-8">
                                <?php if (!empty($item['layout_two_package_title'])) : ?>
                                    <h4 class="title"><?php echo esc_html($item['layout_two_package_title']); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($item['layout_two_package_description'])) : ?>
                                    <div class="text"><?php echo esc_html($item['layout_two_package_description']); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($item['layout_two_price'])) : ?>
                                    <span class="price"><?php echo esc_html($item['layout_two_price']); ?>
                                        <?php if (!empty($item['layout_two_duration'])) : ?>
                                            <span class="after-text"><?php echo esc_html($item['layout_two_duration']); ?></span>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <?php if (!empty($item['layout_two_features_left'])) : ?>
                                    <ul class="list-style-one">
                                        <?php
                                        $features_left = explode("\n", $item['layout_two_features_left']);
                                        foreach ($features_left as $feature) :
                                            if (!empty(trim($feature))) :
                                        ?>
                                                <li><i class="far fa-check"></i> <?php echo esc_html(trim($feature)); ?></li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <?php if (!empty($item['layout_two_features_right'])) : ?>
                                    <ul class="list-style-one">
                                        <?php
                                        $features_right = explode("\n", $item['layout_two_features_right']);
                                        foreach ($features_right as $feature) :
                                            if (!empty(trim($feature))) :
                                        ?>
                                                <li><i class="far fa-check"></i> <?php echo esc_html(trim($feature)); ?></li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-3 col-lg-4">
                                <?php if (!empty($item['layout_two_button_text'])) :
                                    $target = $item['layout_two_button_url']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $item['layout_two_button_url']['nofollow'] ? ' rel="nofollow"' : '';
                                ?>
                                    <a href="<?php echo esc_url($item['layout_two_button_url']['url']); ?>" class="theme-btn" data-hover="<?php echo esc_attr($item['layout_two_button_text']); ?>" <?php echo $target . $nofollow; ?>>
                                        <span><?php echo esc_html($item['layout_two_button_text']); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Pricing Area end -->
<?php endif; ?>