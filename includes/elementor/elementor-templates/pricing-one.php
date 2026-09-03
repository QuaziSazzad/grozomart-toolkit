<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Pricing Area start -->
    <section class="pricing-area rel z-1">
        <div class="container-fluid">
            <div class="pricing-wrap bgc-black pt-130 rpt-100 pb-100 rpb-70">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9">
                            <div class="section-title text-center text-white mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php if (!empty($settings['layout_one_subtitle'])): ?>
                                    <span class="sub-title mb-10"><?php echo esc_html($settings['layout_one_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_one_title'])): ?>
                                    <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ('yes' === $settings['layout_one_show_tabs']) : ?>
                            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <ul class="nav pricing-tab mb-50" role="tablist">
                                    <li>
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#monthly"><?php echo esc_html($settings['layout_one_monthly_text']); ?></button>
                                    </li>
                                    <li>
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#yearly"><?php echo esc_html($settings['layout_one_yearly_text']); ?></button>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="monthly">
                            <div class="row no-gap justify-content-center">
                                <?php
                                $delay = 0;
                                foreach ($settings['layout_one_pricing_items'] as $index => $item) :
                                    $button_url = !empty($item['layout_one_button_url']['url']) ? $item['layout_one_button_url']['url'] : '#';
                                    $target = !empty($item['layout_one_button_url']['is_external']) ? ' target="_blank"' : '';
                                    $nofollow = !empty($item['layout_one_button_url']['nofollow']) ? ' rel="nofollow"' : '';
                                ?>
                                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="pricing-item">
                                            <?php if ('yes' === $item['layout_one_is_popular']) : ?>
                                                <span class="badge"><?php echo esc_html($item['layout_one_popular_text']); ?></span>
                                            <?php endif; ?>
                                            <h4 class="title"><?php echo esc_html($item['layout_one_package_title']); ?></h4>
                                            <div class="text"><?php echo esc_html($item['layout_one_package_description']); ?></div>
                                            <span class="price"><?php echo esc_html($item['layout_one_price']); ?><span class="after-text"><?php echo esc_html($item['layout_one_duration']); ?></span></span>
                                            <h4 class="included"><?php echo esc_html($item['layout_one_included_text']); ?></h4>
                                            <ul class="list-style-one">
                                                <?php foreach ($item['layout_one_features'] as $feature) : ?>
                                                    <li><i class="far fa-check"></i> <?php echo esc_html($feature['layout_one_feature_text']); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <a href="<?php echo esc_url($button_url); ?>" class="theme-btn" data-hover="<?php echo esc_attr($item['layout_one_button_text']); ?>" <?php echo $target . $nofollow; ?>>
                                                <span><?php echo esc_html($item['layout_one_button_text']); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                    $delay += 100;
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <?php if ('yes' === $settings['layout_one_show_tabs']) : ?>
                            <div class="tab-pane fade" id="yearly">
                                <div class="row no-gap justify-content-center">
                                    <?php
                                    $delay = 0;
                                    foreach ($settings['layout_one_yearly_pricing_items'] as $index => $item) :
                                        $button_url = !empty($item['layout_one_button_url']['url']) ? $item['layout_one_button_url']['url'] : '#';
                                        $target = !empty($item['layout_one_button_url']['is_external']) ? ' target="_blank"' : '';
                                        $nofollow = !empty($item['layout_one_button_url']['nofollow']) ? ' rel="nofollow"' : '';
                                    ?>
                                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                                            <div class="pricing-item">
                                                <?php if ('yes' === $item['layout_one_yearly_is_popular']) : ?>
                                                    <span class="badge"><?php echo esc_html($item['layout_one_yearly_popular_text']); ?></span>
                                                <?php endif; ?>
                                                <h4 class="title"><?php echo esc_html($item['layout_one_yearly_package_title']); ?></h4>
                                                <div class="text"><?php echo esc_html($item['layout_one_yearly_package_description']); ?></div>
                                                <span class="price"><?php echo esc_html($item['layout_one_yearly_price']); ?><span class="after-text"><?php echo esc_html($item['layout_one_yearly_duration']); ?></span></span>
                                                <h4 class="included"><?php echo esc_html($item['layout_one_yearly_included_text']); ?></h4>
                                                <ul class="list-style-one">
                                                    <?php foreach ($item['layout_one_yearly_features'] as $feature) : ?>
                                                        <li><i class="far fa-check"></i> <?php echo esc_html($feature['layout_one_yearly_feature_text']); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <a href="<?php echo esc_url($button_url); ?>" class="theme-btn" data-hover="<?php echo esc_attr($item['layout_one_yearly_button_text']); ?>" <?php echo $target . $nofollow; ?>>
                                                    <span><?php echo esc_html($item['layout_one_yearly_button_text']); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                        $delay += 50;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Area end -->
<?php endif; ?>