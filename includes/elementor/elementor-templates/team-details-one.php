<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Team Details area start -->
    <section class="team-detial-area pt-130 rpt-100 pb-110 rpb-80 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-detials-left-part rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_team_image']['url'])) : ?>
                            <div class="team-details-image">
                                <?php grozomart_elementor_rendered_image($settings, 'layout_one_team_image'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_team_name'])) : ?>
                            <h3><?php echo esc_html($settings['layout_one_team_name']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_team_designation'])) : ?>
                            <p><?php echo esc_html($settings['layout_one_team_designation']); ?></p>
                        <?php endif; ?>
                        <hr class="mt-35 mb-40">

                        <div class="team-contact-info">
                            <?php if (!empty($settings['layout_one_contact_title'])) : ?>
                                <h5 class="title"><?php echo esc_html($settings['layout_one_contact_title']); ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_team_email'])) : ?>
                                <div class="team-info-item">
                                    <?php if (!empty($settings['layout_one_team_email_title'])) : ?>
                                        <span><?php echo esc_html($settings['layout_one_team_email_title']); ?></span>
                                    <?php endif; ?>

                                    <a href="mailto:<?php echo esc_attr($settings['layout_one_team_email']); ?>"><?php echo esc_html($settings['layout_one_team_email']); ?></a>

                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_team_phone'])) : ?>
                                <div class="team-info-item">
                                    <?php if (!empty($settings['layout_one_team_phone_title'])) : ?>
                                        <span><?php echo esc_html($settings['layout_one_team_phone_title']); ?></span>
                                    <?php endif; ?>
                                    <a href="callto:<?php echo esc_attr($settings['layout_one_team_phone']); ?>"><?php echo esc_html($settings['layout_one_team_phone']); ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_team_location'])) : ?>
                                <div class="team-info-item">
                                    <?php if (!empty($settings['layout_one_team_location_title'])) : ?>
                                        <span><?php echo esc_html($settings['layout_one_team_location_title']); ?></span>
                                    <?php endif; ?>
                                    <p><?php echo esc_html($settings['layout_one_team_location']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <hr class="my-40">

                        <div class="team-contact-info social-icons">
                            <?php if (!empty($settings['layout_one_follow_title'])) : ?>
                                <h5 class="title"><?php echo esc_html($settings['layout_one_follow_title']); ?></h5>
                            <?php endif; ?>
                            <div class="social-style-six">
                                <?php if (!empty($settings['layout_one_social_links'])) : ?>
                                    <?php foreach ($settings['layout_one_social_links'] as $social) : ?>
                                        <?php if (!empty($social['social_link']['url'])) : ?>
                                            <a href="<?php echo esc_url($social['social_link']['url']); ?>" <?php echo ($social['social_link']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($social['social_link']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                <?php \Elementor\Icons_Manager::render_icon($social['social_icon'], ['aria-hidden' => 'true']); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-detials-right-part" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_eight_title'])) : ?>
                            <div class="section-title mb-20">
                                <h2><?php echo esc_html($settings['layout_one_eight_title']); ?></h2>
                            </div>
                        <?php endif; ?>

                        <?php echo wp_kses_post($settings['layout_one_eight_content']); ?>
                        <?php if (is_array($settings['layout_one_progressbar']) && !empty($settings['layout_one_progressbar'])) : ?>
                            <div class="progress-bar-wrap my-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php foreach ($settings['layout_one_progressbar'] as $skillbar) : ?>
                                    <div class="skillbar" data-percent="<?php echo esc_attr($skillbar['number']['size']); ?>">
                                        <span class="skillbar-title"><?php echo esc_html($skillbar['title']); ?></span>
                                        <div class="skillbar-wrap">
                                            <div class="skillbar-bar"></div>
                                        </div>
                                        <span class="skill-bar-percent"></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_bottom_title'])) : ?>
                            <h3 class="mb-15"><?php echo esc_html($settings['layout_one_bottom_title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_bottom_content'])) : ?>
                            <p><?php echo wp_kses_post($settings['layout_one_bottom_content']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Details area end -->
<?php endif; ?>