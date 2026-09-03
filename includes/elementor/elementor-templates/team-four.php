<?php if ('layout_four' == $settings['layout_type']) : ?>
   <!-- Team Area start -->
   <section class="team-area py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-70 rmb-15" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_four_sub_title'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_four_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php
                        $title_tag = !empty($settings['layout_four_title_tag']) ? $settings['layout_four_title_tag'] : 'h2';
                        if (!empty($settings['layout_four_title'])) :
                        ?>
                            <<?php echo esc_attr($title_tag); ?>>
                                <?php echo wp_kses_post($settings['layout_four_title']); ?>
                            </<?php echo esc_attr($title_tag); ?>>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-title-right-btn mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200" data-aos-offset="50">
                        <?php if (!empty($settings['layout_four_button_url']['url']) && !empty($settings['layout_four_button_text'])) : ?>
                            <a 
                                href="<?php echo esc_url($settings['layout_four_button_url']['url']); ?>" 
                                class="theme-btn mt-20"
                                <?php if (!empty($settings['layout_four_button_url']['is_external'])) echo (' target="_blank"'); ?>
                                <?php if (!empty($settings['layout_four_button_url']['nofollow'])) echo (' rel="nofollow"'); ?>
                            >
                                <?php echo esc_html($settings['layout_four_button_text']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="team-slider">
                <?php
                if (!empty($settings['layout_four_team_list']) && is_array($settings['layout_four_team_list'])) :
                    $delay = 100;
                    foreach ($settings['layout_four_team_list'] as $index => $member) :
                        $image_url = !empty($member['image']['url']) ? $member['image']['url'] : \Elementor\Utils::get_placeholder_image_src();
                        $name = !empty($member['name']) ? $member['name'] : '';
                        $designation = !empty($member['designation']) ? $member['designation'] : '';
                        $profile_url = !empty($member['url']['url']) ? $member['url']['url'] : '#';
                        $is_external = !empty($member['url']['is_external']) ? ' target="_blank"' : '';
                        $nofollow = !empty($member['url']['nofollow']) ? ' rel="nofollow"' : '';
                        $social = !empty($member['social']) ? $member['social'] : '';
                ?>
                <div class="team-item style-three" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($name); ?>">
                        <div class="icon">
                            <div class="plus">
                                <i class="far fa-plus"></i>
                            </div>
                            <div class="social-style-one">
                                <?php echo wp_kses_post($social); ?>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <?php if ($name) : ?>
                            <h5 class="name"><a href="<?php echo esc_url($profile_url); ?>"<?php echo ($is_external . $nofollow); ?>><?php echo esc_html($name); ?></a></h5>
                        <?php endif; ?>
                        <?php if ($designation) : ?>
                            <span class="designations"><?php echo esc_html($designation); ?></span>
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
    </section>
    <!-- Team Area end -->
<?php endif; ?>