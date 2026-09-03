<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Team Area start -->
    <section class="team-area pb-80 rpb-50 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_three_sub_title'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo grozomart_kses_basic($settings['layout_three_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_three_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_three_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_three_title']); ?></<?php echo esc_attr($settings['layout_three_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row gap-70">
                <?php if (!empty($settings['layout_three_team_list'])) : ?>
                    <?php foreach ($settings['layout_three_team_list'] as $index => $member) : ?>
                        <div class="col-lg-6">
                            <div class="team-item-two" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($index + 1) * 100); ?>" data-aos-duration="1500" data-aos-offset="50">
                                <div class="image">
                                    <?php echo grozomart_elementor_rendered_image($member, 'image'); ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty($member['name'])) : ?>
                                        <h3 class="name">
                                            <?php if (!empty($member['url']['url'])) : ?>
                                                <a href="<?php echo esc_url($member['url']['url']); ?>"><?php echo grozomart_kses_basic($member['name']); ?></a>
                                            <?php else : ?>
                                                <?php echo grozomart_kses_basic($member['name']); ?>
                                            <?php endif; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (!empty($member['designation'])) : ?>
                                        <span class="designation"><?php echo grozomart_kses_basic($member['designation']); ?></span>
                                    <?php endif; ?>
                                    <div class="bottom-part">
                                        <?php if (!empty($member['description'])) : ?>
                                            <p><?php echo grozomart_kses_basic($member['description']); ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($member['url']['url'])) : ?>
                                            <a class="details-btn" href="<?php echo esc_url($member['url']['url']); ?>"><i class="far fa-arrow-right"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($member['social'])) : ?>
                                            <div class="social-style-five">
                                                <?php echo grozomart_kses_basic($member['social']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Team Area end -->
<?php endif; ?>