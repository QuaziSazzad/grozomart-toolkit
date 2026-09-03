<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Project Area Two Start -->
    <section class="project-area-three rel z-2">
        <div class="container-fluid">
            <div class="row">
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
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="project-item-two wow fadeInUp delay-0-2s">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                <?php endif; ?>
                                <div class="content">
                                    <a class="plus" href="<?php echo esc_url($img_src[0]); ?>"><i class="fal fa-plus"></i></a>
                                    <<?php echo grozomart_escape_tags($settings['title_tag']); ?>>
                                        <a href="<?php the_permalink(); ?>"><?php echo grozomart_kses_basic($the_title); ?></a>
                                    </<?php echo grozomart_escape_tags($settings['title_tag']); ?>>
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
                    if (is_array($settings['layout_three_portfolio_list'])) :
                        foreach ($settings['layout_three_portfolio_list'] as $portfolio) :

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

                            ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="project-item-two wow fadeInUp delay-0-4s">
                                        <?php grozomart_elementor_rendered_image($portfolio, 'image'); ?>
                                        <div class="content">
                                            <a class="plus" href="<?php echo esc_url($portfolio['image']['url']); ?>"><i class="fal fa-plus"></i></a>
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
    <!-- Project Area Two End -->
<?php endif; ?>