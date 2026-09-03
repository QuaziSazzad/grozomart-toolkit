<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Related Case Area Start -->
    <section class="related-case-area pt-115 rpt-85 pb-80 rpb-50 rel z-1">
        <div class="container">
            <?php if ($settings['layout_one_title']) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <?php if ('cpt' == $settings['portfolio_type']) : ?>
                    <?php
                    $args = [
                        'post_type'           => 'grozomart_portfolio',
                        'post_status'         => 'publish',
                        'posts_per_page'      => $settings['post_limit'],
                        'orderby'             => $settings['order_by'],
                        'order'               => $settings['sort_order'],
                        'ignore_sticky_posts' => 1,
                    ];

                    if ('categories' == $settings['post_from'] && $settings['cat_slugs']) {
                        $args['tax_query'] = [
                            [
                                'taxonomy' => 'grozomart_portfolio_category',
                                'field'    => 'slug',
                                'terms'    => $settings['cat_slugs'],
                            ],
                        ];
                    }

                    if ('specific-post' == $settings['post_from'] && $settings['post_ids']) {
                        $args['post__in'] = $settings['post_ids'];
                    }

                    $wp_query = new WP_Query($args);

                    $i = 0;

                    while ($wp_query->have_posts()): $wp_query->the_post();
                        $idd             = get_the_ID();
                        $categories_list = get_the_terms($idd, 'grozomart_portfolio_category', '', '', '');

                        $portfolio_meta = get_post_meta($idd, 'grozomart_portfolio_meta', true);
                        $portfolio_summary = $portfolio_meta['summary_text'];

                        if ($settings['title_word']) {
                            $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                        } else {
                            $the_title = get_the_title();
                        }

                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($idd), 'full');

                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="case-item-two" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="image">
                                        <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">

                                    <<?php echo grozomart_escape_tags($settings['title_tag']); ?>>
                                        <a href="<?php the_permalink(); ?>"><?php echo grozomart_kses_basic($the_title); ?></a>
                                    </<?php echo grozomart_escape_tags($settings['title_tag']); ?>>
                                    <?php if (!empty($categories_list[0]->name) && 'yes' === $settings['show_category']) : ?>
                                        <span><?php echo esc_html($categories_list[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                <?php if ('elementor-field' == $settings['portfolio_type']) : ?>
                    <?php
                    if (is_array($settings['layout_two_portfolio_list'])) :
                        foreach ($settings['layout_two_portfolio_list'] as $index => $portfolio) :

                            $custom_portfolio_post_query_args = array(
                                'post_type' => 'grozomart_portfolio',
                                'post_status' => 'publish',
                                'posts_per_page'      => 1,
                                'post__in' => array($portfolio['select_portfolio']),
                            );
                            $custom_portfolio_post_query = new \WP_Query($custom_portfolio_post_query_args);
                    ?>
                            <?php while ($custom_portfolio_post_query->have_posts()) :
                                $custom_portfolio_post_query->the_post();
                                $idd             = get_the_ID();
                                if ($settings['title_word']) {
                                    $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                                } else {
                                    $the_title = get_the_title();
                                }
                                $categories_list = get_the_terms($idd, 'grozomart_portfolio_category', '', '', '');

                                $portfolio_meta = get_post_meta($idd, 'grozomart_portfolio_meta', true);
                                $portfolio_summary = $portfolio_meta['summary_text'];

                                $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($idd), 'full');

                            ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="case-item-two" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="image">
                                            <?php grozomart_elementor_rendered_image($portfolio, 'image'); ?>
                                        </div>
                                        <div class="content">
                                            <<?php echo grozomart_escape_tags($settings['title_tag']); ?>>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (!empty($portfolio['title'])):
                                                        echo grozomart_kses_basic($portfolio['title']);
                                                    else:
                                                        echo grozomart_kses_basic($the_title);
                                                    endif;
                                                    ?>
                                                </a>
                                            </<?php echo grozomart_escape_tags($settings['title_tag']); ?>>
                                            <?php if (!empty($categories_list[0]->name) && 'yes' === $settings['show_category']) : ?>
                                                <span><?php echo esc_html($categories_list[0]->name); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                        endforeach;
                    endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Related Case Area End -->
<?php endif; ?>