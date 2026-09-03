<?php if ('layout_five' == $settings['layout_type']) : ?>
    <!-- Counter Area start -->
    <div class="counter-area rel z-1">
        <div class="container-fluid">
            <div class="counter-wrap pt-70 pb-50 bgc-primary">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php if (!empty($settings['layout_five_counter_list'])) : ?>
                            <?php foreach ($settings['layout_five_counter_list'] as $item) :  ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="counter-item-two style-two" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="counter-text-wrap">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['number']); ?>">0</span><span class="after"><?php echo esc_html($item['symbol']); ?></span>
                                        </div>
                                        <span class="counter-title"><?php echo grozomart_kses_basic($item['title']); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Area end -->
<?php endif; ?>