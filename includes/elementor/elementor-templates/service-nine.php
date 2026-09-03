<?php if ('layout_nine' == $settings['layout_type']) : ?>
    <!-- Services Area Three start -->
    <section class="services-area-three py-100 rpy-70 rel z-1">
        <div class="container">
            <div class="row gap-100 align-items-center">
                <div class="col-lg-5">
                    <div class="services-content-three mb-30 rmb-65 wow fadeInUp delay-0-2s">
                        <div class="section-title mb-30">
                            <span class="sub-title mb-15"><?php echo grozomart_kses_basic($settings['layout_nine_sub_title']); ?></span>
                            <<?php echo esc_attr($settings['layout_nine_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_nine_title']); ?></<?php echo esc_attr($settings['layout_nine_title_tag']); ?>>
                        </div>
                        <p><?php echo grozomart_kses_basic($settings['layout_nine_description']); ?></p>
                        <ul class="list-style-one pt-5">
                            <?php foreach ($settings['layout_nine_list_items'] as $item) : ?>
                                <li><i class="far fa-check-circle"></i> <?php echo grozomart_kses_basic($item['list_item']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if (!empty($settings['layout_nine_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_nine_button_url']['url']); ?>" class="theme-btn mt-45" <?php echo ($settings['layout_nine_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_nine_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo grozomart_kses_basic($settings['layout_nine_button_text']); ?> <i class="fas fa-long-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <?php
                        $count = 0;
                        foreach ($settings['layout_nine_services'] as $index => $service) :
                            $count++;
                            $column_class = ($count > 2) ? 'col-sm-6' : 'col-sm-6';
                            $item_class = ($count == 3) ? 'service-item-five mt-60 wow fadeInUp delay-0-4s' : 'service-item-five wow fadeInUp delay-0-2s';

                            if ($count == 1 || $count == 3) :
                                echo '<div class="' . esc_attr($column_class) . '">';
                            endif;
                        ?>
                            <div class="<?php echo esc_attr($item_class); ?>">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($service['service_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                                <h4><a href="<?php echo esc_url($service['service_url']['url']); ?>" <?php echo ($service['service_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($service['service_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo grozomart_kses_basic($service['service_title']); ?></a></h4>
                                <p><?php echo grozomart_kses_basic($service['service_description']); ?></p>
                            </div>
                        <?php
                            if ($count == 2 || $count == 4) :
                                echo '</div>';
                            endif;
                        endforeach;

                        // Close the div if there's an odd number of services
                        if (count($settings['layout_nine_services']) % 2 != 0) :
                            echo '</div>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($settings['layout_nine_bg_image']['url'])) : ?>
            <div class="servcies-bg-shape">
                <?php grozomart_elementor_rendered_image($settings, 'layout_nine_bg_image'); ?>
            </div>
        <?php endif; ?>
    </section>
    <!-- Services Area Three end -->
<?php endif; ?>