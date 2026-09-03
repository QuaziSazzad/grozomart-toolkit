<?php

// header sidebar
?>

<!--Form Back Drop-->
<div class="form-back-drop"></div>
<!-- Hidden Sidebar -->
<section class="hidden-bar">
    <div class="inner-box">
        <div class="cross-icon"><span class="fa fa-times"></span></div>

        <!--Search Box-->
        <div class="widget widget-search" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <form action="<?php echo esc_url(home_url('/')); ?>" class="default-search-form">
                <input type="text" name="s" placeholder="<?php echo esc_attr_e('Search here', 'grozomart'); ?>">
                <button type="submit" class="searchbutton far fa-search"></button>
            </form>
        </div>

        <!--Recent Post-->
        <div class="widget widget-news" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <?php if (!empty($settings['sidebar_title'])) : ?>
                <h4 class="widget-title"><?php echo esc_html($settings['sidebar_title']); ?></h4>
            <?php endif; ?>
            <ul>
                <?php
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
                ?>
                    <li>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image">
                                <?php the_post_thumbnail('grozomart_blog_80X64'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <h5>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (!empty($post['title'])):
                                        echo grozomart_kses_basic($post['title']);
                                    else:
                                        echo grozomart_kses_basic($the_title);
                                    endif;
                                    ?>
                                </a>
                            </h5>
                            <span class="date"><?php the_time('D M Y'); ?></span>
                        </div>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>

        <!--Social Icons-->
        <div class="social-style-one">
            <?php
            if (!empty($settings['sidebar_social_icons'])) :
                foreach ($settings['sidebar_social_icons'] as $social_icon) :
            ?>
                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>
<!--End Hidden Sidebar -->