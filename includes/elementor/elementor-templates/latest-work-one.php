<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Latest Works Area start -->
    <section class="latest-work-area radius-shape-top bgc-lighter py-130 rpy-100 rel z-2">
        <div class="container container-1290">
            <div class="row justify-content-center">
                <div class="col-xl-9 co-lg-11 text-center" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-70">
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <span class="subtitle color-primary mt-10 mb-15"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_title']) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="latest-work-wrap">
                <?php
                if (is_array($settings['layout_one_latest_work'])) :
                    $i = 1;
                    foreach ($settings['layout_one_latest_work'] as $item) :
                ?>
                        <div class="latest-work-item <?php echo esc_html('1' == $i ? 'active' : ''); ?>" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="content-wrap">
                                <div class="normal-area">
                                    <?php if (!empty($item['tag_line'])) : ?>
                                        <span class="category-wrap">
                                            <span class="category"><?php echo esc_html($item['tag_line']); ?></span>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($item['title'])) : ?>
                                        <span class="title h1"><?php echo esc_html($item['title']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="active-area">
                                    <div class="image">
                                        <?php grozomart_elementor_rendered_image($item, 'image'); ?>
                                    </div>
                                    <div class="content">
                                        <?php if (!empty($item['title'])) : ?>
                                            <span class="title h2"><?php echo esc_html($item['title']); ?></span>
                                        <?php endif; ?>
                                        <p><?php echo esc_html($item['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo esc_url($item['url']['url']); ?>" <?php if (!empty($item['url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="detail-btn"><i class="fal fa-arrow-right"></i></a>
                        </div>
                <?php $i++;
                    endforeach;
                endif; ?>
            </div>
        </div>
    </section>
    <!-- Latest Works Area end -->

<?php endif; ?>