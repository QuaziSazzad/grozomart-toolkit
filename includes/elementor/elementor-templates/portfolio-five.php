<?php
if ('layout_five' == $settings['layout_type']) :
    $terms = get_terms([
        'taxonomy'   => 'grozomart_portfolio_category',
        'hide_empty' => true,
    ]);
?>
    <!-- Case Studies Area Start -->
    <section class="case-studies-area pt-130 rpt-100 pb-75 rpb-45 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="case-top-wrap text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_one_title']) : ?>
                            <div class="section-title mb-20">
                                <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                            </div>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <p><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ('yes' == $settings['layout_five_enable_filter']) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <ul class="case-nav mb-45" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li data-filter="*" class="active"><?php echo esc_html($settings['layout_five_show_all_text']); ?></li>
                            <?php foreach ($terms as $index => $term) : ?>
                                <li data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row case-active">
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
                        <div class="col-lg-4 col-md-6 item <?php if ($categories_list && !is_wp_error($categories_list)) {
                                                                $cat_slug = wp_list_pluck($categories_list, 'slug');
                                                                echo implode(' ', $cat_slug);
                                                            }
                                                            ?>">
                            <div class="case-item-two">
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
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                <?php if ('elementor-field' == $settings['portfolio_type']) : ?>
                    <?php
                    if (is_array($settings['layout_five_portfolio_list'])) :
                        foreach ($settings['layout_five_portfolio_list'] as $index => $portfolio) :

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
                                <div class="col-lg-<?php echo esc_attr($portfolio['column_size']); ?> col-md-6 item <?php if ($categories_list && !is_wp_error($categories_list)) {
                                                                                                                        $cat_slug = wp_list_pluck($categories_list, 'slug');
                                                                                                                        echo implode(' ', $cat_slug);
                                                                                                                    }
                                                                                                                    ?>">
                                    <div class="case-item-two">
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
    <!-- Case Studies Area End -->
<?php endif; ?>