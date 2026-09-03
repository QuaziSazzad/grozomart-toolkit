<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Team Area start -->
    <section class="team-area bgc-gray py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_two_sub_title'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_two_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo esc_html($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="team-slider">
                <?php if (!empty($settings['layout_two_team_list'])) :
                    $delay = 100;
                    foreach ($settings['layout_two_team_list'] as $item) : ?>
                        <div class="team-item style-two" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <?php echo grozomart_elementor_rendered_image($item, 'image'); ?>
                                <div class="icon">
                                    <i class="far fa-plus"></i>
                                    <div class="social-style-one">
                                        <?php if (!empty($item['social'])) : ?>
                                            <?php echo grozomart_kses_basic($item['social']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <?php if (!empty($item['name'])) : ?>
                                    <h5 class="name">
                                        <?php if (!empty($item['url']['url'])) : ?>
                                            <a href="<?php echo esc_url($item['url']['url']); ?>" <?php if (!empty($item['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($item['name']); ?></a>
                                        <?php else : ?>
                                            <?php echo esc_html($item['name']); ?>
                                        <?php endif; ?>
                                    </h5>
                                <?php endif; ?>
                                <?php if (!empty($item['designation'])) : ?>
                                    <span class="designations"><?php echo esc_html($item['designation']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                        $delay = ($delay == 100) ? 200 : (($delay == 200) ? 300 : (($delay == 300) ? 400 : 100));
                    endforeach;
                endif; ?>
            </div>
        </div>
    </section>
    <!-- Team Area end -->
<?php endif; ?>