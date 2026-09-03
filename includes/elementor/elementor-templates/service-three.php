<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Service Area start -->
    <section class="service-area rel z-1">
        <div class="container-fluid">
            <div class="services-wrap bgc-gray py-130 rpy-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section-title text-center mb-65" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php if ($settings['layout_three_title']) : ?>
                                    <<?php echo esc_attr($settings['layout_three_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion service-accordion" id="service-accordion" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <?php
                        if (is_array($settings['layout_three_accordion_items'])) :
                            foreach ($settings['layout_three_accordion_items'] as $index => $item) :
                                $collapse_id = 'serviceCollapse' . ($index + 1);
                                $is_active = $item['is_active'] === 'yes' ? 'show' : '';
                                $button_class = $item['is_active'] === 'yes' ? '' : 'collapsed';
                        ?>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button <?php echo esc_attr($button_class); ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>">
                                            <span class="step"><?php echo esc_html($item['step_number']); ?></span>
                                            <span class="title"><?php echo esc_html($item['accordion_title']); ?></span>
                                            <span class="icon first"><i class="far fa-arrow-right"></i></span>
                                            <span class="icon second"><i class="far fa-times-circle"></i></span>
                                        </button>
                                    </div>
                                    <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo esc_attr($is_active); ?>" data-bs-parent="#service-accordion">
                                        <div class="accordion-body">
                                            <div class="row gap-50 align-items-center">
                                                <div class="col-xl-4 col-lg-2"></div>
                                                <div class="col-xl-4 col-lg-5">
                                                    <div class="image">
                                                        <?php grozomart_elementor_rendered_image($item, 'accordion_image'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-5">
                                                    <div class="content">
                                                        <p><?php echo esc_html($item['accordion_content']); ?></p>
                                                        <a class="read-more" href="<?php echo esc_url($item['button_url']['url']); ?>" <?php echo ($item['button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($item['button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($item['button_text']); ?> <i class="far fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <?php if ($settings['layout_three_view_more_url']) : ?>
                        <div class="service-accordion-btn text-center">
                            <a href="<?php echo esc_url($settings['layout_three_view_more_url']['url']); ?>" <?php echo ($settings['layout_three_view_more_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_three_view_more_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="theme-btn mt-70"><?php echo esc_html($settings['layout_three_view_more_text']); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Area end -->
<?php endif; ?>