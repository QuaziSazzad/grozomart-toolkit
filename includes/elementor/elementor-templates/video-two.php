<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Case Studies Area Start -->
    <section class="case-studies-area bgc-lighter-green py-100">
        <div class="container container-1290">
            <div class="row justify-content-between align-items-end pb-25">
                <?php if ($settings['layout_two_title']) : ?>
                    <div class="col-lg-8" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-25">
                            <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['layout_two_button_label'])) : ?>
                    <div class="col-lg-4 text-lg-end" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a href="<?php echo esc_url($settings['layout_two_button_url']['url']); ?>" class="<?php echo esc_attr($settings['layout_two_button_style']); ?>" <?php if (!empty($settings['layout_two_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> data-hover="<?php echo esc_attr($settings['layout_two_button_label']); ?>">
                            <span><?php echo esc_html($settings['layout_two_button_label']); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="case-studies-wrap">
                <?php
                if (is_array($settings['layout_two_video_list'])) :
                    foreach ($settings['layout_two_video_list'] as $index => $item) :
                ?>
                        <div class="case-study-item <?php echo esc_attr($index == 0 ? 'active' : ''); ?>" style="background-image: url(<?php echo esc_url($item['image']['url']); ?>);">
                            <a href="<?php echo esc_url($item['video_url']); ?>" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                            <div class="content">
                                <h4><?php echo esc_html($item['title']); ?></h4>
                                <p><?php echo esc_html($item['description']); ?></p>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>
    <!-- Case Studies Area End -->
<?php endif; ?>