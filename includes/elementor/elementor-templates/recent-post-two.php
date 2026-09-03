<?php

if ('layout_two' == $settings['layout_type']) : ?>
    <!-- News Section Start -->
    <section class="news-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <?php
                $wow_delays = ['.3s', '.5s', '.7s'];
                $index      = 0;
                ?>
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
                        $wow_delay     = $wow_delays[$index % count($wow_delays)];
                        $index++;
                ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                            <div class="news-box-items mt-0">
                                <?php if (has_post_thumbnail() && 'yes' === $settings['show_thumbnail']): ?>
                                    <div class="thumb">
                                        <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <ul>
                                        <?php if (has_category()) :
                                            $categories = get_the_category();
                                        ?>
                                            <li><?php echo esc_html($categories[0]->name); ?></li>
                                        <?php endif; ?>
                                        <li><?php the_time('d F Y'); ?></li>
                                    </ul>
                                    <<?php echo grozomart_escape_tags($settings['title_tag'], 'h3'); ?> class="title">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html($the_title); ?></a>
                                    </<?php echo grozomart_escape_tags($settings['title_tag'], 'h3'); ?>>
                                    <?php if ('yes' === $settings['show_excerpt']) : ?>
                                        <p>
                                            <?php
                                            if (has_excerpt()) {
                                                echo wp_trim_words(get_the_excerpt(), $excerpt_count, '...');
                                            } else {
                                                echo wp_trim_words(get_the_content(), $excerpt_count, '...');
                                            }
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                        <a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo esc_html($settings['read_more_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
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
                                $idd = get_the_ID();
                                if ($settings['title_word']) {
                                    $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                                } else {
                                    $the_title = get_the_title();
                                }
                                $wow_delay = $wow_delays[$index % count($wow_delays)];
                                $index++;
                            ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>">
                                    <div class="news-box-items mt-0">
                                        <?php if ('yes' === $settings['show_thumbnail']) : ?>
                                            <div class="thumb">
                                                <?php if (!empty($post['image']['url'])) : ?>
                                                    <img src="<?php echo esc_url($post['image']['url']); ?>" alt="<?php echo esc_attr($the_title); ?>">
                                                <?php elseif (has_post_thumbnail()) : ?>
                                                    <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <ul>
                                                <?php if (has_category()) :
                                                    $categories = get_the_category();
                                                ?>
                                                    <li><?php echo esc_html($categories[0]->name); ?></li>
                                                <?php endif; ?>
                                                <li><?php the_time('d F Y'); ?></li>
                                            </ul>
                                            <<?php echo grozomart_escape_tags($settings['title_tag'], 'h3'); ?> class="title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (!empty($post['title'])):
                                                        echo grozomart_kses_basic($post['title']);
                                                    else:
                                                        echo esc_html($the_title);
                                                    endif;
                                                    ?>
                                                </a>
                                            </<?php echo grozomart_escape_tags($settings['title_tag'], 'h3'); ?>>
                                            <?php if ('yes' === $settings['show_excerpt']) : ?>
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
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo esc_html($settings['read_more_text']); ?></a>
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

            <?php if ('cpt' == $settings['post_type'] && 'yes' === $settings['show_pagination'] && !empty($wp_query) && $wp_query->max_num_pages > 1) : ?>
                <div class="page-nav-wrap text-center">
                    <?php
                    $big = 999999999;

                    $page_links = paginate_links([
                        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'type'      => 'array',
                        'current'   => max(1, $paged),
                        'end_size'  => 1,
                        'mid_size'  => 1,
                        'total'     => $wp_query->max_num_pages,
                        'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                        'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                    ]);
                    ?>
                    <?php if (!empty($page_links)) : ?>
                        <ul>
                            <?php foreach ($page_links as $link) : ?>
                                <li class="<?php echo (strpos($link, 'current') !== false) ? 'active' : ''; ?>">
                                    <?php echo wp_kses_post($link); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
