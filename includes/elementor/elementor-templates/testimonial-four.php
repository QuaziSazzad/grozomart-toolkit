<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Testimonials Area Three Start -->
    <section class="testimonials-three-area py-130 rpy-100">
        <div class="container">
            <div class="row gap-80 align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="testimonials-three-image rmb-55 wow fadeInLeft delay-0-2s">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_four_image'); ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonials-three-wrap wow fadeInRight delay-0-2s">
                        <div class="section-title mb-45">
                            <?php if (!empty($settings['layout_four_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_four_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_four_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_four_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_four_title']); ?></<?php echo esc_attr($settings['layout_four_title_tag']); ?>>
                            <?php endif; ?>
                        </div>
                        <div class="testimonial-five-slider">
                            <?php foreach ($settings['layout_four_testimonials'] as $item) : ?>
                                <div class="testimonial-item-four">
                                    <div class="content">
                                        <div class="testi-header">
                                            <?php if (!empty($item['title'])) : ?>
                                                <h4><?php echo grozomart_kses_basic($item['title']); ?></h4>
                                            <?php endif; ?>
                                            <?php if (!empty($item['rating'])) : ?>
                                                <div class="ratting">
                                                    <?php
                                                    $rating = floatval($item['rating']);
                                                    $full_stars = floor($rating);
                                                    $half_star = ($rating - $full_stars) >= 0.5;

                                                    for ($i = 0; $i < $full_stars; $i++) {
                                                        echo '<i class="fas fa-star"></i>';
                                                    }

                                                    if ($half_star) {
                                                        echo '<i class="fas fa-star-half-alt"></i>';
                                                    }
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($item['content'])) : ?>
                                            <div class="testi-text">
                                                <?php echo grozomart_kses_basic($item['content']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="testi-footer">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <div class="title">
                                                <?php if (!empty($item['name'])) : ?>
                                                    <h4><?php echo grozomart_kses_basic($item['name']); ?></h4>
                                                <?php endif; ?>
                                                <?php if (!empty($item['designation'])) : ?>
                                                    <span class="designation"><?php echo grozomart_kses_basic($item['designation']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Area Three End -->
<?php endif; ?>