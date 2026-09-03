<?php

use GrozomartTheme\Classes\Grozomart_Post_Helper;

if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Blog Area start -->
    <section class="blog-area pb-130 rpb-100 rel z-1">
        <div class="container container-1290">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-50" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <span class="subtitle mb-15"><?php echo grozomart_kses_basic($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_title']) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row no-gap justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <?php
                    $custom_blog_post_query_args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true,
                        'post__in' => array($settings['select_left_post']),
                    );
                    $custom_blog_post_query = new \WP_Query($custom_blog_post_query_args);
                    ?>
                    <?php while ($custom_blog_post_query->have_posts()) :
                        $custom_blog_post_query->the_post();
                        if ($settings['title_word']) {
                            $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                        } else {
                            $the_title = get_the_title();
                        }

                        $excerpt_count = $settings['excerpt_count'];
                    ?>
                        <div class="blog-four-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <?php grozomart_elementor_rendered_image($settings, 'left_post_custom_image'); ?>
                            </div>
                            <div class="content">
                                <ul class="blog-meta">
                                    <li><a href="<?php the_permalink() ?>" class="category"><?php the_author(); ?></a></li>
                                    <li><?php the_time('M d, Y'); ?></li>
                                </ul>
                                <h5>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (!empty($settings['left_post_custom_title'])) {
                                            echo esc_html($settings['left_post_custom_title']);
                                        } else {
                                            echo esc_html($the_title);
                                        }
                                        ?>
                                    </a>
                                </h5>
                                <p>
                                    <?php if (!empty($settings['left_post_custom_summary_text'])) {
                                        echo grozomart_kses_basic($settings['left_post_custom_summary_text']);
                                    } else {
                                        if (has_excerpt()) {
                                            echo wp_trim_words(get_the_excerpt(), $excerpt_count, '...');
                                        } else {
                                            echo wp_trim_words(get_the_content(), $excerpt_count, '...');
                                        }
                                    } ?>
                                </p>
                                <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html($settings['read_more_text']); ?><i class="far fa-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="col-xl-6 col-lg-8">
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
                                    <div class="blog-four-item image-left" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="image">
                                            <?php grozomart_elementor_rendered_image($post, 'image'); ?>
                                        </div>
                                        <div class="content">
                                            <ul class="blog-meta">
                                                <li><a href="<?php the_permalink(); ?>" class="category"><?php the_author(); ?></a></li>
                                                <li><?php the_time('M d, Y'); ?></li>
                                            </ul>
                                            <h5><a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (!empty($post['title'])):
                                                        echo grozomart_kses_basic($post['title']);
                                                    else:
                                                        echo grozomart_kses_basic($the_title);
                                                    endif;
                                                    ?>
                                                </a>
                                            </h5>
                                            <?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html($settings['read_more_text']); ?><i class="far fa-arrow-right"></i></a>
                                            <?php endif; ?>
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
    </section>
    <!-- Blog Area end -->
<?php endif; ?>