<?php

use GrozomartTheme\Classes\Grozomart_Nav_Walker;

if ('layout_three' == $settings['layout_type']) : ?>
    <!-- main header -->
    <div class="main-header style-three">

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container container-1580 clearfix">

                <div class="header-inner before-after-none rel d-flex align-items-center">
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_size']['width']); ?>" height="<?php echo esc_attr($settings['logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                    </div>

                    <div class="nav-outer ms-lg-auto me-lg-auto clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header py-15">
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

                    <!-- Menu Button -->
                    <div class="menu-btns">
                        <?php if (!empty($settings['button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" <?php if (!empty($settings['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn btn-small ms-lg-4"><?php echo esc_html($settings['button_label']); ?></a>
                        <?php endif; ?>
                        <?php if (!empty($settings['enable_sidebar']) && $settings['enable_sidebar'] == 'yes') : ?>
                            <!-- menu sidbar -->
                            <div class="menu-sidebar ms-4">
                                <button class="bg-transparent"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </div>
    </div>
<?php endif; ?>