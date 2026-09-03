<?php

use GrozomartTheme\Classes\Grozomart_Post_Helper;

if ('layout_six' == $settings['layout_type']) : ?>
    <!-- Blog Area start -->
    <section class="blog-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-50 rmb-15" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                            <span class="sub-title color-primary mb-10"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo esc_html($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-title-right-btn mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_button_label']) && !empty($settings['layout_one_button_url']['url'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn mt-20"><?php echo esc_html($settings['layout_one_button_label']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
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

                    if ($wp_query->have_posts()) :
                        $i = 100;
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            $i += 100;
                            $title = wp_trim_words(get_the_title(), $settings['title_word'] ? $settings['title_word'] : 10, '...');
                            $excerpt = wp_trim_words(get_the_excerpt(), $settings['excerpt_count'] ? $settings['excerpt_count'] : 15, '...');
                            $categories = get_the_category();
                ?>
                            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($i); ?>" data-aos-duration="1500" data-aos-offset="50">
                                <div class="blog-item-two style-two">
                                    <?php if (has_post_thumbnail() && 'yes' === $settings['show_thumbnail']): ?>
                                        <div class="image">
                                            <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <ul class="blog-meta">
                                            <?php if (!empty($categories)) : ?>
                                                <li><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                                            <?php endif; ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php echo get_the_date('d F Y'); ?></a></li>
                                        </ul>
                                        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h4>
                                        <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                            <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['read_more_text'] ? $settings['read_more_text'] : 'Read More'); ?> <i class="far fa-arrow-right"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endif; ?>

                <?php if ('elementor-field' == $settings['post_type']) : ?>
                    <?php
                    if (is_array($settings['layout_four_post_list'])) :
                        $i = 100;
                        foreach ($settings['layout_four_post_list'] as $post) :
                            $i += 100;
                            $custom_post_post_query_args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 1,
                                'post__in' => array($post['select_post']),
                            );
                            $custom_post_post_query = new \WP_Query($custom_post_post_query_args);

                            if ($custom_post_post_query->have_posts()) :
                                while ($custom_post_post_query->have_posts()) : $custom_post_post_query->the_post();
                                    $title = wp_trim_words(get_the_title(), $settings['title_word'] ? $settings['title_word'] : 10, '...');
                                    $categories = get_the_category();
                    ?>
                                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($i); ?>" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="blog-item-two style-two">
                                            <div class="image">
                                                <?php grozomart_elementor_rendered_image($post, 'image'); ?>
                                            </div>
                                            <div class="content">
                                                <ul class="blog-meta">
                                                    <?php if (!empty($categories)) : ?>
                                                        <li><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                                                    <?php endif; ?>
                                                    <li><a href="<?php the_permalink(); ?>"><?php echo get_the_date('d F Y'); ?></a></li>
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
                                                <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                                    <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['read_more_text'] ? $settings['read_more_text'] : 'Read More'); ?> <i class="far fa-arrow-right"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        endforeach;
                    endif;
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Blog Area end -->
<?php endif; ?>