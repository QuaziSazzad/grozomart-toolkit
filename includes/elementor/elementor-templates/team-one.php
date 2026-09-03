<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Team Area start -->
    <section class="team-area py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['section_subtitle']); ?></span>
                        <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['section_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                    </div>
                </div>
            </div>
            <div class="team-slider">
                <?php
                if ($settings['team_members']) {
                    $delay = 100;
                    foreach ($settings['team_members'] as $index => $item) {
                        $delay_value = ($index < 4) ? $delay * ($index + 1) : 100;
                ?>
                        <div class="team-item style-two" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay_value); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <?php if (!empty($item['member_image']['url'])) : ?>
                                    <img src="<?php echo esc_url($item['member_image']['url']); ?>" alt="<?php echo esc_attr($item['member_name']); ?>">
                                <?php endif; ?>
                                <div class="icon">
                                    <i class="far fa-plus"></i>
                                    <div class="social-style-one">
                                        <?php echo wp_kses($item['social_items'], [
                                            'a' => ['href' => [], 'target' => [], 'rel' => []],
                                            'i' => ['class' => []]
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="<?php echo esc_url($item['url']['url']); ?>" <?php if (!empty($item['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($item['member_name']); ?></a></h5>
                                <span class="designations"><?php echo esc_html($item['member_designation']); ?></span>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Team Area end -->
<?php endif; ?>