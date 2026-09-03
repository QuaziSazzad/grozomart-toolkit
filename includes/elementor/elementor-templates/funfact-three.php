<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- Counter Area Start -->
    <section class="counter-area-four bgc-primary rel z-2 pt-130 rpt-100">
        <div class="container">
            <?php if ($settings['layout_three_title']) : ?>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="section-title text-center text-white mb-60" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <?php
                            $title_tag = $settings['layout_three_title_tag'];
                            printf('<%1$s>%2$s</%1$s>', $title_tag, grozomart_kses_basic($settings['layout_three_title']));
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center gap-70">
                <?php
                if (!empty($settings['layout_three_counter_list'])) :
                    $delay = 0;
                    foreach ($settings['layout_three_counter_list'] as $item) :
                        $symbol_class = '';
                        if ($item['symbol'] === 'k-plus') {
                            $symbol_class = 'k-plus';
                        } elseif ($item['symbol'] === 'percent') {
                            $symbol_class = 'percent';
                        } elseif ($item['symbol'] === 'm-plus') {
                            $symbol_class = 'm-plus';
                        }
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="counter-item style-three counter-text-wrap" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                                <span class="count-text <?php echo esc_attr($symbol_class); ?>" data-speed="3000" data-stop="<?php echo esc_attr($item['number']); ?>">0</span>
                                <hr>
                                <span class="counter-title"><?php echo grozomart_kses_basic($item['title']); ?></span>
                                <div class="bg"></div>
                            </div>
                        </div>
                <?php
                        $delay += 50;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Counter Area End -->
<?php endif; ?>