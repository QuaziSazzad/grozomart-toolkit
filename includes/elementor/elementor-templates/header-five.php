<?php

use GrozomartTheme\Classes\Grozomart_Nav_Walker;

if ('layout_five' == $settings['layout_type']) : ?>

    <!-- main header -->
    <div class="main-header header-one white-menu menu-absolute">
        <!--Header-Upper-->
        <div class="header-upper bordered-bottom bgc-black">
            <div class="container-fluid clearfix">

                <div class="header-inner rel d-flex align-items-center">
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_size']['width']); ?>" height="<?php echo esc_attr($settings['logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                    </div>

                    <div class="nav-outer me-lg-auto ps-lg-5 ms-xxl-4 clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header rpy-10">
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
                    <div class="menu-btns d-lg-flex align-items-center">
                        <?php if (!empty($settings['call_number'])) : ?>
                            <div class="header-number me-5 d-none d-xl-block">
                                <?php \Elementor\Icons_Manager::render_icon($settings['call_icon'], ['aria-hidden' => 'true']); ?>
                                <a href="<?php echo esc_attr($settings['call_url']); ?>"><?php echo esc_html($settings['call_number']); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" <?php if (!empty($settings['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn btn-small color-white" data-hover="<?php echo esc_attr($settings['button_label']); ?>">
                                <span><?php echo esc_html($settings['button_label']); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </div>
<?php endif; ?>