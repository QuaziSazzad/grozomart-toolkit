<?php
if ('layout_two' == $settings['layout_type']) :

?>
    <div class="container">
        <div class="row mt-80">
            <div class="col-lg-6">
                <div class="section-title mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2><?php echo esc_html($settings['layout_two_title']); ?></h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="case-details-cotnent" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <?php if (!empty($settings['layout_two_content'])) : ?>
                        <p><?php echo grozomart_kses_basic($settings['layout_two_content']); ?></p>
                    <?php endif; ?>
                    <?php echo wp_kses_post($settings['layout_two_more_content']); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>