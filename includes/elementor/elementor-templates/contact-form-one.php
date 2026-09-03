<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Contact Map Section Start -->
    <section class="contact-map-section-in section-padding fix pt-0">
        <div class="container">
            <?php if ('yes' === $settings['layout_one_show_map'] && !empty($settings['layout_one_map_url'])) : ?>
                <div class="google-map-items">
                    <iframe src="<?php echo esc_url($settings['layout_one_map_url']); ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            <?php endif; ?>
            <div class="row g-4 justify-content-center">
                <div class="col-xl-8">
                    <div class="comment-form-wrap wow fadeInUp" data-wow-delay=".5s">
                        <?php if (!empty($settings['layout_one_title'])) : ?>
                            <h3><?php echo esc_html($settings['layout_one_title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_description'])) : ?>
                            <p><?php echo esc_html($settings['layout_one_description']); ?></p>
                        <?php endif; ?>
                        <?php
                        if (!empty($settings['layout_one_select_cf7_form'])) {
                            echo str_replace('<br />', '', trim(do_shortcode('[contact-form-7 id="' . esc_attr($settings['layout_one_select_cf7_form']) . '"]')));
                        } elseif (current_user_can('manage_options')) {
                            echo '<p>' . esc_html__('Please select a Contact Form 7 form in the widget settings.', 'grozomart-toolkit') . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
