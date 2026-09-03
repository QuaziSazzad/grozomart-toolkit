<?php if ('layout_one' == $settings['layout_type']) :
$background_image = !empty($settings['layout_one_background_image']['url']) ? $settings['layout_one_background_image']['url'] : GROZOMART_TOOLKIT_THEME_ASSETS . '/img/home-1/hero-bg.jpg';
$image             = !empty($settings['layout_one_image']['url']) ? $settings['layout_one_image']['url'] : GROZOMART_TOOLKIT_THEME_ASSETS . '/img/home-1/hero-image.png';
?>
    <!-- Hero Section Start -->
    <section class="hero-section fix bg-cover" style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class="hero-1">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hero-content">
                            <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                                <span class="hero-sub wow fadeInUp">
                                    <?php echo wp_kses_post($settings['layout_one_sub_title']); ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_one_title'])) : ?>
                                <<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h1'); ?> class="wow fadeInUp" data-wow-delay=".3s">
                                    <?php echo wp_kses_post(nl2br($settings['layout_one_title'])); ?>
                                </<?php echo grozomart_escape_tags($settings['layout_one_title_tag'], 'h1'); ?>>
                            <?php endif; ?>

                            <?php if (!empty($settings['layout_one_description'])) : ?>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                    <?php echo esc_html($settings['layout_one_description']); ?>
                                </p>
                            <?php endif; ?>

                            <div class="price-items wow fadeInUp" data-wow-delay=".7s">
                                <?php if (!empty($settings['layout_one_price'])) : ?>
                                    <h2 class="price">
                                        <?php if (!empty($settings['layout_one_price_currency'])) : ?>
                                            <sub><?php echo esc_html($settings['layout_one_price_currency']); ?></sub>
                                        <?php endif; ?>
                                        <?php echo esc_html($settings['layout_one_price']); ?>
                                    </h2>
                                <?php endif; ?>

                                <?php if (!empty($settings['layout_one_button_label'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" class="theme-btn" <?php echo !empty($settings['layout_one_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_one_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                        <?php echo esc_html($settings['layout_one_button_label']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="hero-image">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($settings['layout_one_title']); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
