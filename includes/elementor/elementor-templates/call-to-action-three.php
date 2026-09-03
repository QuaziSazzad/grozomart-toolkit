<?php if ('layout_three' == $settings['layout_type']) :
    $title      = $settings['layout_three_title'];
    $link_text  = $settings['layout_three_title_link_text'];
    $title_html = esc_html($title);

    if (!empty($link_text) && false !== strpos($title, $link_text)) {
        $link_html = sprintf(
            '<a href="%1$s" %2$s %3$s>%4$s</a>',
            esc_url($settings['layout_three_title_link_url']['url']),
            !empty($settings['layout_three_title_link_url']['is_external']) ? 'target="_blank"' : '',
            !empty($settings['layout_three_title_link_url']['nofollow']) ? 'rel="nofollow"' : '',
            esc_html($link_text)
        );
        $title_html = str_replace(esc_html($link_text), $link_html, esc_html($title));
    }
    ?>
    <!-- Feature Line Section Start -->
    <section class="feature-line-section-2 pt-0 fix">
        <div class="container">
            <div class="feature-line-wrap-2">
                <div class="feature-line-box">
                    <?php if (!empty($settings['layout_three_title'])) : ?>
                        <h3 class="title"><?php echo wp_kses_post($title_html); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_three_code_text'])) : ?>
                        <a href="<?php echo esc_url($settings['layout_three_code_url']['url']); ?>" class="link-btn" <?php echo !empty($settings['layout_three_code_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo !empty($settings['layout_three_code_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                            <?php echo esc_html($settings['layout_three_code_text']); ?>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($settings['layout_three_description'])) : ?>
                        <p><?php echo esc_html($settings['layout_three_description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Line Section End -->
<?php endif; ?>
