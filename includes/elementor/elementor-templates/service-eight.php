<?php if ('layout_eight' == $settings['layout_type']) : ?>
    <!-- What We Provide Area Start -->
    <section class="what-we-provide rel z-1">
        <div class="container">
            <?php if ($settings['layout_eight_sub_title'] || $settings['layout_eight_title']) : ?>
                <div class="section-title text-center mb-55 wow fadeInUp delay-0-2s">
                    <span class="sub-title mb-10"><?php echo grozomart_kses_basic($settings['layout_eight_sub_title']); ?></span>
                    <<?php echo esc_attr($settings['layout_eight_title_tag']); ?>><?php echo grozomart_kses_basic($settings['layout_eight_title']); ?></<?php echo esc_attr($settings['layout_eight_title_tag']); ?>>
                </div>
            <?php endif; ?>
            <div class="service-four-slider">
                <?php foreach ($settings['layout_eight_service_list'] as $index => $item) : ?>
                    <div class="service-item-four <?php echo ($index == 1) ? 'active' : ''; ?> wow fadeInUp delay-0-<?php echo ($index + 1) * 2; ?>s">
                        <div class="image">
                            <?php echo grozomart_elementor_rendered_image($item, 'image'); ?>
                            <a class="plus" href="<?php echo esc_url($item['image']['url']); ?>" <?php if (!empty($item['image']['is_external'])) : ?> target="_blank" <?php endif; ?>><i class="fal fa-plus"></i></a>
                        </div>
                        <div class="content">
                            <div class="top-part">
                                <span class="number"><?php echo sprintf("%02d", $index + 1); ?></span>
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                                <h4><a href="<?php echo esc_url($item['url']['url']); ?>" <?php if (!empty($item['url']['is_external'])) : ?> target="_blank" <?php endif; ?>><?php echo grozomart_kses_basic($item['title']); ?></a></h4>
                            </div>
                            <div class="bottom-part">
                                <p><?php echo grozomart_kses_basic($item['description']); ?></p>
                                <a href="<?php echo esc_url($item['url']['url']); ?>" <?php if (!empty($item['url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="read-more"><?php echo grozomart_kses_basic($item['read_more_text']); ?> <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- What We Provide Area End -->
<?php endif; ?>