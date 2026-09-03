<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Countries Area Start -->
    <section class="countries-area rel z-1 pt-125 rpt-95 pb-70 rpb-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9 col-sm-11">
                    <div class="section-title text-center mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <<?php echo esc_attr($settings['layout_four_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_four_title']); ?></<?php echo esc_attr($settings['layout_four_title_tag']); ?>>
                    </div>
                </div>
            </div>
        </div>
        <div class="marquee-slider-right style-three iconic-slider-right">
            <?php foreach ($settings['layout_four_countries_right_list'] as $item) : ?>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <?php echo grozomart_elementor_rendered_image($item, 'flag_image'); ?>
                    </div>
                    <div class="content">
                        <h6 class="title"><?php echo grozomart_kses_basic($item['country_name']); ?></h6>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="marquee-slider-left style-three iconic-slider-left" dir="rtl">
            <?php foreach ($settings['layout_four_countries_left_list'] as $item) : ?>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <?php echo grozomart_elementor_rendered_image($item, 'flag_image'); ?>
                    </div>
                    <div class="content">
                        <h6 class="title"><?php echo grozomart_kses_basic($item['country_name']); ?></h6>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="container">
            <div class="image mt-40 text-center" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                <?php echo grozomart_elementor_rendered_image($settings, 'layout_four_map_image'); ?>
            </div>
        </div>

        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Countries Area End -->
<?php endif; ?>