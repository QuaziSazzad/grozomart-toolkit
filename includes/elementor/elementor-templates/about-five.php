<?php if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Why Choose Us Area start -->
    <section class="why-choose-us-area rel z-1">
        <div class="container container-1600">
            <div class="why-choose-us-inner bgc-gray px-sm-4 py-130 rpy-100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7">
                            <div class="why-choose-three-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php if (!empty($settings['layout_five_subtitle']) || !empty($settings['layout_five_title'])) : ?>
                                    <div class="section-title mb-30">
                                        <span class="sub-title mb-10"><?php echo esc_html($settings['layout_five_subtitle']); ?></span>
                                        <?php
                                        $title_tag = $settings['layout_five_title_tag'];
                                        printf('<%1$s>%2$s</%1$s>', $title_tag, esc_html($settings['layout_five_title']));
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_five_description'])) : ?>
                                    <p class="summary-text"><?php echo esc_html($settings['layout_five_description']); ?></p>
                                <?php endif; ?>
                                <div class="row gap-50 pt-35" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="col-md-6">
                                        <div class="circle-progress-item">
                                            <div class="circle-progress one" data-percent="<?php echo esc_attr($settings['layout_five_progress_circle_one_value']); ?>">
                                                <span class="counting">0</span>
                                            </div>
                                            <h4><?php echo esc_html($settings['layout_five_progress_circle_one_title']); ?></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="circle-progress-item">
                                            <div class="circle-progress two" data-percent="<?php echo esc_attr($settings['layout_five_progress_circle_two_value']); ?>">
                                                <span class="counting">0</span>
                                            </div>
                                            <h4><?php echo esc_html($settings['layout_five_progress_circle_two_title']); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="proven-area pt-50 rpt-40 mt-35 rmt-15" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <h4><?php echo esc_html($settings['layout_five_proven_expertise_title']); ?></h4>
                                    <p><?php echo esc_html($settings['layout_five_proven_expertise_description']); ?></p>
                                    <ul class="list-style-one mt-20">
                                        <?php foreach ($settings['layout_five_list_items'] as $item) : ?>
                                            <li>
                                                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                                <?php echo esc_html($item['list_item']); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-10">
                            <div class="why-choose-three-image" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                <?php if (!empty($settings['layout_five_image']['url'])) : ?>
                                    <?php grozomart_elementor_rendered_image($settings, 'layout_five_image'); ?>
                                <?php endif; ?>
                                <div class="team-member" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['layout_five_team_member_icon'], ['aria-hidden' => 'true']); ?>
                                    <h4><?php echo esc_html($settings['layout_five_team_member_count']); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area end -->
<?php endif; ?>