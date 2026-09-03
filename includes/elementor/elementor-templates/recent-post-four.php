<?php

use GrozomartTheme\Classes\Grozomart_Post_Helper;

if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Blog Area Two start -->
    <section class="blog-area-three pb-70 rpb-40 rel z-1">
        <div class="container">

            <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                    <span class="sub-title mb-10"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                <?php endif; ?>
                <?php if (!empty($settings['layout_one_title'])) : ?>
                    <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                <?php endif; ?>
            </div>

            <div class="row justify-content-center">
                <?php if ('cpt' == $settings['post_type']) :

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = [
                        'post_type'           => 'post',
                        'post_status'         => 'publish',
                        'posts_per_page'      => $settings['post_limit'],
                        'orderby'             => $settings['order_by'],
                        'order'               => $settings['sort_order'],
                        'ignore_sticky_posts' => 1,
                        'paged'               => $paged
                    ];

                    if ('categories' == $settings['post_from'] && $settings['cat_slugs']) {
                        $args['tax_query'] = [
                            [
                                'taxonomy' => 'category',
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
                        $idd = get_the_ID();

                        if ($settings['title_word']) {
                            $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                        } else {
                            $the_title = get_the_title();
                        }

                        $excerpt_count = $settings['excerpt_count'];

                ?>
                        <div class="col-lg-6">
                            <div class="blog-item-five wow fadeInUp delay-0-2s">
                                <?php if (has_post_thumbnail() && 'yes' === $settings['show_thumbnail']): ?>
                                    <div class="image">
                                        <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <ul class="blog-meta">
                                        <li><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><?php the_time('d F Y'); ?></a></li>
                                        <li><i class="far fa-calendar-alt"></i> <a href="<?php comments_link(); ?>">
                                                <?php
                                                $count = get_comments_number();
                                                if ($count === 0) {
                                                    echo esc_html__('No Comments', 'grozomart-toolkit');
                                                } elseif ($count === 1) {
                                                    echo esc_html__('Comment (1)', 'grozomart-toolkit');
                                                } else {
                                                    printf(
                                                        esc_html__('Comments (%d)', 'grozomart-toolkit'),
                                                        $count
                                                    );
                                                }
                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <<?php echo grozomart_escape_tags($settings['title_tag'], 'h4'); ?>>
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html($the_title); ?></a>
                                    </<?php echo grozomart_escape_tags($settings['title_tag'], 'h4'); ?>>
                                    <div class="author-more">
                                        <span class="author"><?php echo esc_html__('By', 'grozomart-toolkit'); ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
                                        <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html($settings['read_more_text']); ?> <i class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();

                    if ('yes' === $settings['show_pagination']) {
                        Grozomart_Post_Helper::pagination($wp_query);
                    }
                    ?>
                <?php endif; ?>

                <?php if ('elementor-field' == $settings['post_type']) : ?>
                    <?php
                    if (is_array($settings['layout_four_post_list'])) :
                        foreach ($settings['layout_four_post_list'] as $post) :

                            $custom_post_post_query_args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page'      => 1,
                                'post__in' => array($post['select_post']),
                            );
                            $custom_post_post_query = new \WP_Query($custom_post_post_query_args);
                    ?>
                            <?php while ($custom_post_post_query->have_posts()) :
                                $custom_post_post_query->the_post();
                                $idd             = get_the_ID();
                                if ($settings['title_word']) {
                                    $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                                } else {
                                    $the_title = get_the_title();
                                }
                                $categories_list = get_the_terms($idd, 'category', '', '', '');

                            ?>
                                <div class="col-lg-6">
                                    <div class="blog-item-five wow fadeInUp delay-0-4s">
                                        <div class="image">
                                            <?php grozomart_elementor_rendered_image($post, 'image'); ?>
                                        </div>
                                        <div class="content">
                                            <ul class="blog-meta">
                                                <li><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><?php the_time('d F Y'); ?></a></li>
                                                <li><i class="far fa-calendar-alt"></i> <a href="<?php comments_link(); ?>">
                                                        <?php
                                                        $count = get_comments_number();
                                                        if ($count === 0) {
                                                            echo esc_html__('No Comments', 'grozomart-toolkit');
                                                        } elseif ($count === 1) {
                                                            echo esc_html__('Comment (1)', 'grozomart-toolkit');
                                                        } else {
                                                            printf(
                                                                esc_html__('Comments (%d)', 'grozomart-toolkit'),
                                                                $count
                                                            );
                                                        }
                                                        ?>
                                                    </a>
                                                </li>
                                            </ul>
                                            <h4>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (!empty($post['title'])):
                                                        echo grozomart_kses_basic($post['title']);
                                                    else:
                                                        echo grozomart_kses_basic($the_title);
                                                    endif;
                                                    ?>
                                                </a>
                                            </h4>
                                            <div class="author-more">
                                                <span class="author"><?php echo esc_html__('By', 'grozomart-toolkit'); ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
                                                <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html($settings['read_more_text']); ?> <i class="far fa-arrow-right"></i></a>
                                            </div>
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
    <!-- Blog Area Two end -->
<?php endif; ?>