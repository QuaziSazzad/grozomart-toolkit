<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Cta-line Section Start -->
    <section class="cta-line-section-2 fix pb-0">
        <div class="container">
            <div class="cta-line-wrap-2 bg-cover" style="background-image: url('<?php echo esc_url($settings['layout_two_background_image']['url']); ?>');">
                <div class="cta-content">
                    <?php if (!empty($settings['layout_two_top_text'])) : ?>
                        <span><?php echo esc_html($settings['layout_two_top_text']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_two_title'])) : ?>
                        <<?php echo grozomart_escape_tags($settings['layout_two_title_tag'], 'h2'); ?> class="title">
                            <?php echo esc_html($settings['layout_two_title']); ?>
                        </<?php echo grozomart_escape_tags($settings['layout_two_title_tag'], 'h2'); ?>>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['layout_two_shape_image']['url'])) : ?>
                    <div class="cta-shape">
                        <img src="<?php echo esc_url($settings['layout_two_shape_image']['url']); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
