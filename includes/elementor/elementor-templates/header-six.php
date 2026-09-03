<?php

use GrozomartTheme\Classes\Grozomart_Nav_Walker;

if ('layout_six' == $settings['layout_type']) : ?>

    <div class="main-header header-three white-menu menu-absolute">
        <?php if (!empty($settings['top_text']) || !empty($settings['button_label'])) : ?>
            <div class="header-top-wrap bgc-secondary">
                <div class="container">
                    <div class="header-top">
                        <div class="text"><?php echo grozomart_kses_basic($settings['top_text']); ?><a href="<?php echo esc_url($settings['button_url']['url']); ?>" <?php if (!empty($settings['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo esc_html($settings['button_label']); ?></a></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container clearfix">

                <div class="header-inner rel d-flex align-items-center">
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
                    <div class="nav-search py-10">
                        <button class="far fa-search"></button>
                        <form action="<?php echo esc_url(home_url('/')); ?>" class="hide">
                            <input type="text" name="s" placeholder="<?php esc_attr__('Search', 'grozomart-toolkit'); ?>" class="searchbox" required="">
                            <button type="submit" class="searchbutton far fa-search"></button>
                        </form>
                    </div>

                    <!-- Menu Button -->
                    <div class="menu-btns">
                        <?php if (!empty($settings['enable_sidebar']) && $settings['enable_sidebar'] == 'yes') : ?>
                            <!-- menu sidbar -->
                            <div class="menu-sidebar ms-sm-5">
                                <button>
                                    <span class="toggle-btn"></span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </div>
<?php endif; ?>