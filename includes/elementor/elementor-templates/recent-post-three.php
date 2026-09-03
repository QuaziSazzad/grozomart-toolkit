<?php

use GrozomartTheme\Classes\Grozomart_Post_Helper;

if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Blog Area start -->
    <section class="blog-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="blog-three-left-content mb-70 rmb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-40 rmb-25">
                            <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                                <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_title'])) : ?>
                                <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                            <?php endif; ?>

                        </div>
                        <?php if (!empty($settings['layout_one_summary_text'])) : ?>
                            <p><?php echo esc_html($settings['layout_one_summary_text']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn mt-30 rmt-15"><?php echo esc_html($settings['layout_one_button_label']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-8" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="blog-three-active">
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
                                <div class="blog-item-three">
                                    <div class="row gap-50 align-items-center">
                                        <div class="col-lg-6">
                                            <?php if (has_post_thumbnail() && 'yes' === $settings['show_thumbnail']): ?>
                                                <div class="image">
                                                    <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="content">
                                                <ul class="blog-meta">
                                                    <?php
                                                    if (has_category()) :
                                                        $categories = get_the_category();
                                                    ?>
                                                        <li><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                                                    <?php endif; ?>

                                                    <li><a href="<?php the_permalink(); ?>"><?php the_time('d F Y'); ?></a></li>

                                                </ul>
                                                <<?php echo grozomart_escape_tags($settings['title_tag'], 'h4'); ?> class="title">
                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html($the_title); ?></a>
                                                </<?php echo grozomart_escape_tags($settings['title_tag'], 'h4'); ?>>
                                                <p>
                                                    <?php
                                                    if (has_excerpt()) {
                                                        echo wp_trim_words(get_the_excerpt(), $excerpt_count, '...');
                                                    } else {
                                                        echo wp_trim_words(get_the_content(), $excerpt_count, '...');
                                                    }
                                                    ?>
                                                </p>
                                                <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                                    <a class="theme-btn btn-small" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['read_more_text']); ?></a>
                                                <?php endif; ?>
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
                            if (is_array($settings['layout_one_post_list'])) :
                                foreach ($settings['layout_one_post_list'] as $post) :

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
                                        <div class="blog-item-three">
                                            <div class="row gap-50 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="image">
                                                        <?php grozomart_elementor_rendered_image($post, 'image'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="content">
                                                        <ul class="blog-meta">
                                                            <?php
                                                            if (has_category()) :
                                                                $categories = get_the_category();
                                                            ?>
                                                                <li><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                                                            <?php endif; ?>
                                                            <li><a href="<?php the_permalink(); ?>"><?php the_time('d F Y'); ?></a></li>
                                                        </ul>
                                                        <<?php echo grozomart_escape_tags($settings['title_tag'], 'h4'); ?> class="title">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php
                                                                if (!empty($post['title'])):
                                                                    echo grozomart_kses_basic($post['title']);
                                                                else:
                                                                    echo grozomart_kses_basic($the_title);
                                                                endif;
                                                                ?>
                                                            </a>
                                                        </<?php echo grozomart_escape_tags($settings['title_tag'], 'h4'); ?>>
                                                        <p>
                                                            <?php if (!empty($post['summary_text'])):
                                                                echo grozomart_kses_basic($post['summary_text']);
                                                            else:
                                                                if (has_excerpt()) :
                                                                    echo wp_trim_words(get_the_excerpt(), $excerpt_count, '...');
                                                                else :
                                                                    echo wp_trim_words(get_the_content(), $excerpt_count, '...');
                                                                endif;
                                                            endif;
                                                            ?>
                                                        </p>
                                                        <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                                            <a class="theme-btn btn-small" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['read_more_text']); ?></a>
                                                        <?php endif; ?>
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
            </div>
        </div>
    </section>
    <!-- Blog Area end -->
<?php endif; ?>