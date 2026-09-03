<?php if ('layout_nine' == $settings['layout_type']) : ?>
    <!-- About Page About Area Start -->
    <section class="about-page-about-area pt-130 rpt-100 pb-110 rpb-80">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-9">
                    <div class="about-page-about-left-content">
                        <div class="section-title mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <?php if (!empty($settings['layout_nine_subtitle'])) : ?>
                                <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_nine_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_nine_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_nine_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_nine_title']); ?></<?php echo esc_attr($settings['layout_nine_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <div class="row gap-70">
                            <?php if (!empty($settings['layout_nine_content_left'])) : ?>
                                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100" data-aos-offset="50">
                                    <p><?php echo grozomart_kses_basic($settings['layout_nine_content_left']); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_nine_content_right'])) : ?>
                                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200" data-aos-offset="50">
                                    <p><?php echo grozomart_kses_basic($settings['layout_nine_content_right']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="about-trusted-partners-area" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_nine_partners_title']) || !empty($settings['layout_nine_partners'])) : ?>
                            <div class="trusted-clients-wrap pb-40 mb-30">
                                <?php if (!empty($settings['layout_nine_partners_title'])) : ?>
                                    <h5><?php echo grozomart_kses_basic($settings['layout_nine_partners_title']); ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_nine_partners'])) : ?>
                                    <div class="trusted-clients">
                                        <?php foreach ($settings['layout_nine_partners'] as $partner) : ?>
                                            <?php if (!empty($partner['partner_image']['url'])) : ?>
                                                <?php echo grozomart_elementor_rendered_image($partner, 'partner_image'); ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_nine_trustpilot_logo'])) : ?>
                            <?php echo grozomart_elementor_rendered_image($settings, 'layout_nine_trustpilot_logo'); ?>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_nine_reviews_text'])) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_nine_reviews_text']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_nine_rating']['size'])) : ?>
                            <div class="ratting">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <?php if ($i <= $settings['layout_nine_rating']['size']) : ?>
                                        <i class="fas fa-star"></i>
                                    <?php else : ?>
                                        <i class="far fa-star"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Page About Area End -->

    <!-- About Page Image Start -->
    <div class="about-page-image-area">
        <div class="container-fluid">
            <div class="about-page-wrap">
                <div class="about-page-image" data-aos="fade-in" data-aos-duration="1500" data-aos-offset="50">
                    <?php echo grozomart_elementor_rendered_image($settings, 'layout_nine_bottom_image_one'); ?>
                </div>
                <div class="about-page-image" data-aos="fade-in" data-aos-duration="1500" data-aos-offset="50">
                    <?php echo grozomart_elementor_rendered_image($settings, 'layout_nine_bottom_image_two'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- About Page Image End -->
<?php endif; ?>