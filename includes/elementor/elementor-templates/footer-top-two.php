<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="container">
        <div class="support-join-area mb-80">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-top-item">
                        <div class="content text-white">
                            <?php if (!empty($settings['layout_two_left_title'])) : ?>
                                <h3><?php echo esc_html($settings['layout_two_left_title']); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_two_left_summary_text'])) : ?>
                                <p><?php echo esc_html($settings['layout_two_left_summary_text']); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_two_left_url']['url'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_two_left_url']['url']); ?>" <?php echo ($settings['layout_two_left_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_two_left_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="icon"><i class="far fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-top-item ms-lg-auto">
                        <div class="content text-white">
                            <?php if (!empty($settings['layout_two_right_title'])) : ?>
                                <h3><?php echo esc_html($settings['layout_two_right_title']); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_two_right_summary_text'])) : ?>
                                <p><?php echo esc_html($settings['layout_two_right_summary_text']); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_two_right_url']['url'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_two_right_url']['url']); ?>" <?php echo ($settings['layout_two_right_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['layout_two_right_url']['nofollow']) ? 'rel="nofollow"' : ''; ?> class="icon"><i class="far fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>