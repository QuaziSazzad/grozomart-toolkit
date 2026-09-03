<?php if ('layout_thirteen' == $settings['layout_type']) : ?>
 <!-- Features Area start -->
 <section class="features-wrap pt-30 pb-100 rpb-70 rel z-1">
    <div class="row justify-content-center">

        <?php if (!empty($settings['layout_thirteen_services'])):
            $delay = 0;
            foreach ($settings['layout_thirteen_services'] as $item): ?>
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                    <div class="feature-item-four">
                        <div class="inner-head">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['feature_icon'], ['aria-hidden' => 'true'], 'i'); ?>
                                </div>
                            <?php if (!empty($item['feature_title'])): ?>
                                <h5 class="title">
                                    <?php if (!empty($item['feature_link']['url'])): ?>
                                        <a href="<?php echo esc_url($item['feature_link']['url']); ?>" <?php echo ($item['feature_link']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($item['feature_link']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo grozomart_kses_basic($item['feature_title']); ?>
                                        </a>
                                    <?php else: ?>
                                        <?php echo grozomart_kses_basic($item['feature_title']); ?>
                                    <?php endif; ?>
                                </h5>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($item['feature_description'])): ?>
                            <div class="content">
                                <p><?php echo grozomart_kses_basic($item['feature_description']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                $delay += 100;
            endforeach;
        endif; ?>
        
    </div>
</section>
<!-- Features Area end -->
<?php endif; ?>