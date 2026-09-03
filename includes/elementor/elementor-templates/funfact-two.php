<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Counter Area start -->
    <div class="counter-area pt-85 pb-55 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                foreach ($settings['layout_two_counter_list'] as $index => $item) :
                    $delay = ($index + 1) * 100;
                ?>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                        <div class="counter-item-two">
                            <div class="counter-text-wrap">
                                <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['number']); ?>">0</span><span class="after"><?php echo esc_html($item['symbol']); ?></span>
                            </div>
                            <span class="counter-title"><?php echo grozomart_kses_basic($item['title']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Counter Area end -->
<?php endif; ?>