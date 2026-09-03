<?php
if ('layout_one' == $settings['layout_type']) :
    $idd             = get_the_ID();
    $categories_list = get_the_terms($idd, 'grozomart_portfolio_category', '', '', '');
?>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-4 col-lg-5">
                <div class="section-title mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php
                        if (!empty($settings['layout_one_custom_title'])) {
                            echo grozomart_kses_basic($settings['layout_one_custom_title']);
                        } else {
                            the_title();
                        }
                        ?>
                    </<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="case-details-info" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="row gap-90">
                        <div class="col-sm-6">

                            <div class="case-info-item">
                                <?php if (!empty($settings['layout_one_case_category_title'])) : ?>
                                    <h4 class="title"><?php echo esc_html($settings['layout_one_case_category_title']); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($categories_list)) : ?>
                                    <div class="content">
                                        <div class="category">
                                            <?php foreach ($categories_list as $category) : ?>
                                                <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="case-info-item">
                                <h4 class="title"><?php echo esc_html($settings['layout_one_client_title']); ?></h4>
                                <div class="content">
                                    <span class="client-name"><?php echo esc_html($settings['layout_one_client_name']); ?></span>
                                    <p><?php echo esc_html($settings['layout_one_client_description']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="case-info-item">
                                <h4 class="title"><?php echo esc_html($settings['layout_one_case_date_title']); ?></h4>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-6">
                                            <p><?php echo grozomart_kses_basic($settings['layout_one_case_start_date']); ?></p>
                                        </div>
                                        <div class="col-6">
                                            <p><?php echo grozomart_kses_basic($settings['layout_one_case_end_date']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="case-info-item">
                                <h4 class="title"><?php echo esc_html($settings['layout_one_location_title']); ?></h4>
                                <div class="content">
                                    <p><?php echo esc_html($settings['layout_one_location']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($settings['layout_one_image']['url'])) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="case-details-image mt-25" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php grozomart_elementor_rendered_image($settings, 'layout_one_image'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>