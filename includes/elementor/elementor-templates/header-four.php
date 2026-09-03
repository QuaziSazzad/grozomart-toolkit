<?php

use GrozomartTheme\Classes\Grozomart_Nav_Walker;

if ('layout_four' == $settings['layout_type']) : ?>
    <!-- main header -->
    <div class="main-header menu-absolute no-border">
        <!--Header-Top-->
        <div class="header-top-wrap bgc-primary">
            <div class="container container-1660">
                <div class="header-top">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-6">
                            <div class="top-left text-center text-md-start">
                                <ul>
                                    <?php if (!empty($settings['enable_sidebar']) && $settings['enable_sidebar'] == 'yes') : ?>
                                        <?php if (!empty($settings['sidebar_icon']['url'])) : ?>
                                            <li>
                                                <!-- menu sidbar -->
                                                <div class="menu-sidebar pb-1">
                                                    <button>
                                                        <?php grozomart_elementor_rendered_image($settings, 'sidebar_icon'); ?>
                                                    </button>
                                                </div>
                                            </li>
                                    <?php endif;
                                    endif; ?>
                                    <li><a href="mailto:<?php echo esc_attr($settings['email_address']); ?>"><?php echo esc_html($settings['email_address']); ?><i class="fal fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-5 d-xl-block d-none">
                            <div class="top-middle text-center">
                                <?php echo grozomart_kses_basic($settings['top_text']); ?>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="top-right text-center text-lg-end">
                                <ul>
                                    <li>
                                        <span><?php echo esc_html($settings['social_title']); ?></span>
                                    </li>
                                    <li>
                                        <div class="social-icons">
                                            <?php
                                            if (!empty($settings['social_icons'])) :
                                                foreach ($settings['social_icons'] as $social_icon) :
                                            ?>
                                                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
                                            <?php endforeach;
                                            endif; ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Header-Upper-->
        <div class="header-upper">
            <div class="container container-1660 clearfix">

                <div class="header-inner py-5 rel d-flex align-items-center">
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_size']['width']); ?>" height="<?php echo esc_attr($settings['logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                    </div>

                    <div class="nav-outer ms-lg-auto clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header py-10">
                                <div class="mobile-logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url($settings['mobile_logo']['url']); ?>" width="<?php echo esc_attr($settings['mobile_logo_size']['width']); ?>" height="<?php echo esc_attr($settings['mobile_logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    </a>
                                </div>

                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => $settings['nav_menu'],
                                    'menu_class' => 'navigation clearfix',
                                    'container'       => 'div',
                                    'fallback_cb'     => false,
                                    'container_class' => 'navbar-collapse collapse clearfix',
                                    'walker'          => new Grozomart_Nav_Walker()
                                )
                            );
                            ?>

                        </nav>
                        <!-- Main Menu End-->
                    </div>

                    <!-- Nav Search -->
                    <div class="nav-search ms-xl-2 ms-4 me-xl-auto py-10">
                        <button class="far fa-search"></button>
                        <form action="<?php echo esc_url('/'); ?>" class="hide">
                            <input type="text" name="s" placeholder="<?php esc_html__('Search', 'grozomart-addon'); ?>" class="searchbox" required="">
                            <button type="submit" class="searchbutton far fa-search"></button>
                        </form>
                    </div>

                    <?php if (!empty($settings['button_label'])) : ?>
                        <div class="menu-btns ms-lg-auto">
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" <?php if (!empty($settings['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn style-two"><?php echo esc_html($settings['button_label']); ?> <i class="far fa-arrow-right"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-lines">
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </div>
        <!--End Header Upper-->
    </div>
<?php endif; ?>