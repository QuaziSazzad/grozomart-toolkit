<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Best Day Section Start -->
    <section class="best-day-banner-section fix section-padding pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="best-day-banner">
                        <?php if (!empty($settings['layout_two_left_light_image']['url'])) : ?>
                            <div class="light-1">
                                <img src="<?php echo esc_url($settings['layout_two_left_light_image']['url']); ?>" alt="img">
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <?php if (!empty($settings['layout_two_left_sub_title'])) : ?>
                                <span class="subs"><?php echo esc_html($settings['layout_two_left_sub_title']); ?></span>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_left_title'])) : ?>
                                <h2><?php echo wp_kses_post($settings['layout_two_left_title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_left_description'])) : ?>
                                <p class="text"><?php echo esc_html($settings['layout_two_left_description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_left_button_label'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_two_left_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_two_left_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_left_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($settings['layout_two_left_button_label']); ?>
                                </a>
                            <?php endif; ?>

                            <div class="coming-soon-time countdown" <?php echo !empty($settings['layout_two_left_countdown_date']) ? 'data-countdown-date="' . esc_attr($settings['layout_two_left_countdown_date']) . '"' : ''; ?>>
                                <div class="timer-content">
                                    <h2 class="day">00</h2>
                                </div>
                                <div class="timer-dot">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="timer-content style-2">
                                    <h2 class="hour">00</h2>
                                </div>
                                <div class="timer-dot">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="timer-content style-2">
                                    <h2 class="min">00</h2>
                                </div>
                                <div class="timer-dot">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="timer-content style-2">
                                    <h2 class="sec">00</h2>
                                </div>
                                <?php if (!empty($settings['layout_two_left_countdown_text'])) : ?>
                                    <p class="text-2">
                                        <?php echo esc_html($settings['layout_two_left_countdown_text']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['layout_two_left_image']['url'])) : ?>
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['layout_two_left_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_two_left_sub_title']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="shop-banner-items style-box-two wow fadeInUp" data-wow-delay=".5s">
                        <div class="content">
                            <?php if (!empty($settings['layout_two_middle_top_sub_title'])) : ?>
                                <span><?php echo esc_html($settings['layout_two_middle_top_sub_title']); ?></span>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_middle_top_title'])) : ?>
                                <h2 class="title"><?php echo wp_kses_post($settings['layout_two_middle_top_title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_middle_top_description'])) : ?>
                                <p><?php echo esc_html($settings['layout_two_middle_top_description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_middle_top_button_label'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_two_middle_top_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_two_middle_top_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_middle_top_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($settings['layout_two_middle_top_button_label']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_two_middle_top_image']['url'])) : ?>
                            <div class="thumb-4">
                                <img src="<?php echo esc_url($settings['layout_two_middle_top_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_two_middle_top_sub_title']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_middle_top_light_image']['url'])) : ?>
                            <div class="light-img">
                                <img src="<?php echo esc_url($settings['layout_two_middle_top_light_image']['url']); ?>" alt="img">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="shop-banner-items style-box-two-three wow fadeInUp" data-wow-delay=".7s">
                        <div class="content">
                            <?php if (!empty($settings['layout_two_middle_bottom_sub_title'])) : ?>
                                <span><?php echo esc_html($settings['layout_two_middle_bottom_sub_title']); ?></span>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_middle_bottom_title'])) : ?>
                                <h2 class="title"><?php echo wp_kses_post($settings['layout_two_middle_bottom_title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_middle_bottom_description'])) : ?>
                                <p><?php echo esc_html($settings['layout_two_middle_bottom_description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_middle_bottom_button_label'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_two_middle_bottom_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_two_middle_bottom_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_middle_bottom_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($settings['layout_two_middle_bottom_button_label']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_two_middle_bottom_image']['url'])) : ?>
                            <div class="thumb-5">
                                <img src="<?php echo esc_url($settings['layout_two_middle_bottom_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_two_middle_bottom_sub_title']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="best-day-banner">
                        <?php if (!empty($settings['layout_two_right_light_image']['url'])) : ?>
                            <div class="light-1">
                                <img src="<?php echo esc_url($settings['layout_two_right_light_image']['url']); ?>" alt="img">
                            </div>
                        <?php endif; ?>
                        <div class="content mb-0">
                            <?php if (!empty($settings['layout_two_right_sub_title'])) : ?>
                                <span class="subs"><?php echo esc_html($settings['layout_two_right_sub_title']); ?></span>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_right_title'])) : ?>
                                <h2><?php echo wp_kses_post($settings['layout_two_right_title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_right_description'])) : ?>
                                <p class="text"><?php echo esc_html($settings['layout_two_right_description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_two_right_button_label'])) : ?>
                                <a href="<?php echo esc_url($settings['layout_two_right_button_url']['url']); ?>" class="theme-btn small-btn" <?php echo !empty($settings['layout_two_right_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_two_right_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($settings['layout_two_right_button_label']); ?>
                                </a>
                            <?php endif; ?>

                            <div class="coming-soon-time countdown" <?php echo !empty($settings['layout_two_right_countdown_date']) ? 'data-countdown-date="' . esc_attr($settings['layout_two_right_countdown_date']) . '"' : ''; ?>>
                                <div class="timer-content">
                                    <h2 class="day">00</h2>
                                </div>
                                <div class="timer-dot">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="timer-content style-2">
                                    <h2 class="hour">00</h2>
                                </div>
                                <div class="timer-dot">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="timer-content style-2">
                                    <h2 class="min">00</h2>
                                </div>
                                <div class="timer-dot">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="timer-content style-2">
                                    <h2 class="sec">00</h2>
                                </div>
                                <?php if (!empty($settings['layout_two_right_countdown_text'])) : ?>
                                    <p class="text-2">
                                        <?php echo esc_html($settings['layout_two_right_countdown_text']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['layout_two_right_image']['url'])) : ?>
                            <div class="thumb style-2">
                                <img src="<?php echo esc_url($settings['layout_two_right_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_two_right_sub_title']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
