<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Pricing Area start -->
    <section class="latest-work-area radius-shape-top pt-130 rpt-100 pb-100 rpb-70 rel z-2" style="background-image: url(<?php echo esc_url($settings['layout_four_bg_image']['url']); ?>);">
        <div class="container container-1290">
            <div class="row justify-content-center text-white">
                <div class="col-xl-6 co-lg-8 col-md-10 text-center" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-50">
                        <?php if ($settings['layout_four_sub_title']) : ?>
                            <span class="subtitle mt-10 mb-15"><?php echo grozomart_kses_basic($settings['layout_four_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_four_title']) : ?>
                            <<?php echo esc_attr($settings['layout_four_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_four_title']); ?></<?php echo esc_attr($settings['layout_four_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <ul class="nav pricing-tab-two mb-65" role="tablist">
                        <li>
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#monthly"><?php echo esc_html($settings['layout_four_monthly_heading']); ?></button>
                        </li>
                        <li>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#yearly"><?php echo esc_html($settings['layout_four_yearly_heading']); ?></button>
                        </li>
                    </ul>
                    <?php if (!empty($settings['layout_four_discount_text'])) :  ?>
                        <span class="save-percent"><?php echo esc_html($settings['layout_four_discount_text']); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="monthly">
                    <div class="row justify-content-center">
                        <?php foreach ($settings['layout_four_pricing_monthly_list'] as $index => $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-two-item">
                                    <?php if (!empty($item['badge'])) : ?>
                                        <span class="badge"><?php echo esc_html($item['badge']); ?></span>
                                    <?php endif; ?>
                                    <h6 class="title"><?php echo esc_html($item['plan_title']); ?></h6>
                                    <div class="text"><?php echo esc_html($item['description']); ?></div>
                                    <span class="price"><?php echo esc_html($item['price']); ?><span class="after-text"><?php echo esc_html($item['duration']); ?></span></span>
                                    <?php if (!empty($item['button_label'])) : ?>
                                        <a href="<?php echo esc_url($item['button_url']['url']); ?>" <?php if (!empty($item['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn style-two" data-hover="<?php echo esc_attr($item['button_label']); ?>">
                                            <span><?php echo esc_html($item['button_label']); ?></span>
                                        </a>
                                    <?php endif; ?>
                                    <ul class="list-style-three small">
                                        <?php echo grozomart_kses_basic($item['service_list']); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="yearly">
                    <div class="row justify-content-center">
                        <?php foreach ($settings['layout_four_pricing_yearly_list'] as $index => $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-two-item">
                                    <?php if (!empty($item['badge'])) : ?>
                                        <span class="badge"><?php echo esc_html($item['badge']); ?></span>
                                    <?php endif; ?>
                                    <h6 class="title"><?php echo esc_html($item['plan_title']); ?></h6>
                                    <div class="text"><?php echo esc_html($item['description']); ?></div>
                                    <span class="price"><?php echo esc_html($item['price']); ?><span class="after-text"><?php echo esc_html($item['duration']); ?></span></span>
                                    <?php if (!empty($item['button_label'])) : ?>
                                        <a href="<?php echo esc_url($item['button_url']['url']); ?>" <?php if (!empty($item['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn style-two" data-hover="<?php echo esc_attr($item['button_label']); ?>">
                                            <span><?php echo esc_html($item['button_label']); ?></span>
                                        </a>
                                    <?php endif; ?>
                                    <ul class="list-style-three small">
                                        <?php echo grozomart_kses_basic($item['service_list']); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Area end -->
<?php endif; ?>