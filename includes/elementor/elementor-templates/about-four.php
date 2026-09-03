<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- About Us Area start -->
    <section class="about-us-area py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row gap-40 align-items-center">
                <div class="col-xl-6 col-lg-10">
                    <div class="about-three-left-image">
                        <img data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50" src="<?php echo esc_url($settings['layout_four_image_one']['url']); ?>" alt="<?php echo grozomart_get_elementor_thumbnail_alt($settings['layout_four_image_one']['id']); ?>">
                        <div class="clients-satisfied" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <?php \Elementor\Icons_Manager::render_icon($settings['layout_four_clients_satisfied_icon'], ['aria-hidden' => 'true']); ?>
                            <h4><?php echo esc_html($settings['layout_four_clients_satisfied_title']); ?></h4>
                        </div>
                        <div class="bottom-image" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <img src="<?php echo esc_url($settings['layout_four_image_two']['url']); ?>" alt="<?php echo grozomart_get_elementor_thumbnail_alt($settings['layout_four_image_two']['id']); ?>">
                        </div>
                        <div class="years-experience" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <?php \Elementor\Icons_Manager::render_icon($settings['layout_four_years_experience_icon'], ['aria-hidden' => 'true']); ?>
                            <h4><?php echo esc_html($settings['layout_four_years_experience_title']); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="about-three-right-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_four_subtitle']) || !empty($settings['layout_four_title'])): ?>
                            <div class="section-title mb-40">
                                <?php if (!empty($settings['layout_four_subtitle'])) : ?>
                                    <span class="sub-title mb-10"><?php echo esc_html($settings['layout_four_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_four_title'])) : ?>
                                    <h2><?php echo esc_html($settings['layout_four_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <p class="summary-text"><?php echo esc_html($settings['layout_four_description']); ?></p>
                        <div class="about-featured-wrap mt-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="row">
                                <?php foreach ($settings['layout_four_features'] as $feature) : ?>
                                    <div class="col-md-6">
                                        <div class="about-featured-item">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($feature['layout_four_feature_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <h5><a href="<?php echo esc_url($feature['layout_four_feature_link']['url']); ?>" <?php echo $feature['layout_four_feature_link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $feature['layout_four_feature_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($feature['layout_four_feature_title']); ?></a></h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="about-bottom-trusted-area mt-20" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="left-button">
                                <a href="<?php echo esc_url($settings['layout_four_button_link']['url']); ?>" <?php echo $settings['layout_four_button_link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $settings['layout_four_button_link']['nofollow'] ? 'rel="nofollow"' : ''; ?> class="theme-btn"><?php echo esc_html($settings['layout_four_button_text']); ?></a>
                            </div>
                            <div class="trusted-clients-wrap">
                                <h6><?php echo esc_html($settings['layout_four_clients_text']); ?></h6>
                                <div class="trusted-clients">
                                    <?php foreach ($settings['layout_four_clients'] as $client) : ?>
                                        <img src="<?php echo esc_url($client['layout_four_client_image']['url']); ?>" alt="<?php echo grozomart_get_elementor_thumbnail_alt($client['layout_four_client_image']['id']); ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area end -->
<?php endif; ?>