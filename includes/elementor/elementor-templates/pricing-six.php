<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Pricing Area start -->
    <section class="pricing-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 co-lg-8 col-md-10">
                    <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_six_subtitle'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_six_subtitle']); ?></span>
                        <?php endif; ?>

                        <?php if (!empty($settings['layout_six_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo wp_kses_post($settings['layout_six_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <ul class="nav pricing-tab-two style-two mb-50" role="tablist">
                        <li>
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#monthly">
                                <?php if (!empty($settings['layout_six_monthly_tab_text'])) : ?>
                                    <?php echo esc_html($settings['layout_six_monthly_tab_text']); ?>
                                <?php endif; ?>
                            </button>
                        </li>
                        <li>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#yearly">
                                <?php if (!empty($settings['layout_six_yearly_tab_text'])) : ?>
                                    <?php echo esc_html($settings['layout_six_yearly_tab_text']); ?>
                                <?php endif; ?>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="monthly">
                    <div class="row justify-content-center">
                        <?php if (!empty($settings['layout_six_monthly_pricing_items'])) :
                            foreach ($settings['layout_six_monthly_pricing_items'] as $index => $item) :
                                $delay = $index * 50;
                        ?>
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" <?php if ($delay > 0) : ?>data-aos-delay="<?php echo esc_attr($delay); ?>" <?php endif; ?>>
                                    <div class="pricing-two-item style-two">
                                        <?php if (!empty($item['layout_six_monthly_package_title'])) : ?>
                                            <h5 class="title"><?php echo esc_html($item['layout_six_monthly_package_title']); ?></h5>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_monthly_package_subtitle'])) : ?>
                                            <div class="text"><?php echo esc_html($item['layout_six_monthly_package_subtitle']); ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_monthly_price'])) : ?>
                                            <span class="price"><?php echo esc_html($item['layout_six_monthly_price']); ?>
                                                <?php if (!empty($item['layout_six_monthly_duration'])) : ?>
                                                    <span class="after-text"><?php echo esc_html($item['layout_six_monthly_duration']); ?></span>
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_monthly_description'])) : ?>
                                            <p><?php echo esc_html($item['layout_six_monthly_description']); ?></p>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_monthly_button_text'])) : ?>
                                            <a href="<?php echo esc_url(!empty($item['layout_six_monthly_button_url']['url']) ? $item['layout_six_monthly_button_url']['url'] : '#'); ?>" class="theme-btn" <?php if (!empty($item['layout_six_monthly_button_url']['is_external'])) : ?>target="_blank" <?php endif; ?> <?php if (!empty($item['layout_six_monthly_button_url']['nofollow'])) : ?>rel="nofollow" <?php endif; ?> data-hover="<?php echo esc_attr($item['layout_six_monthly_button_text']); ?>">
                                                <span><?php echo esc_html($item['layout_six_monthly_button_text']); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="yearly">
                    <div class="row justify-content-center">
                        <?php if (!empty($settings['layout_six_yearly_pricing_items'])) :
                            foreach ($settings['layout_six_yearly_pricing_items'] as $index => $item) :
                                $delay = $index * 50;
                        ?>
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" <?php if ($delay > 0) : ?>data-aos-delay="<?php echo esc_attr($delay); ?>" <?php endif; ?>>
                                    <div class="pricing-two-item style-two">
                                        <?php if (!empty($item['layout_six_yearly_package_title'])) : ?>
                                            <h5 class="title"><?php echo esc_html($item['layout_six_yearly_package_title']); ?></h5>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_yearly_package_subtitle'])) : ?>
                                            <div class="text"><?php echo esc_html($item['layout_six_yearly_package_subtitle']); ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_yearly_price'])) : ?>
                                            <span class="price"><?php echo esc_html($item['layout_six_yearly_price']); ?>
                                                <?php if (!empty($item['layout_six_yearly_duration'])) : ?>
                                                    <span class="after-text"><?php echo esc_html($item['layout_six_yearly_duration']); ?></span>
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_yearly_description'])) : ?>
                                            <p><?php echo esc_html($item['layout_six_yearly_description']); ?></p>
                                        <?php endif; ?>

                                        <?php if (!empty($item['layout_six_yearly_button_text'])) : ?>
                                            <a href="<?php echo esc_url(!empty($item['layout_six_yearly_button_url']['url']) ? $item['layout_six_yearly_button_url']['url'] : '#'); ?>" class="theme-btn" <?php if (!empty($item['layout_six_yearly_button_url']['is_external'])) : ?>target="_blank" <?php endif; ?> <?php if (!empty($item['layout_six_yearly_button_url']['nofollow'])) : ?>rel="nofollow" <?php endif; ?> data-hover="<?php echo esc_attr($item['layout_six_yearly_button_text']); ?>">
                                                <span><?php echo esc_html($item['layout_six_yearly_button_text']); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Area end -->
<?php endif; ?>