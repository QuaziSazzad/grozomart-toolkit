<?php if ('layout_three' == $settings['layout_type']) :
    $uid = $this->get_id();
?>

    <div class="accordion-one pt-80 rpt-0" id="faq-accordion-one-<?php echo esc_attr($uid); ?>">
        <?php if ($settings['layout_three_title']) : ?>
            <h4><?php echo grozomart_kses_basic($settings['layout_three_title']); ?></h4>
        <?php endif; ?>
        <?php if ($settings['layout_three_summary_text']) : ?>
            <div class="text pt-10 pb-25">
                <p><?php echo grozomart_kses_basic($settings['layout_three_summary_text']); ?></p>
            </div>
        <?php endif; ?>
        <?php
        foreach ($settings['layout_three_faq_list'] as $index =>  $item) : ?>
            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <h6 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#grozomart_three<?php echo esc_attr($index . $uid); ?>">
                        <?php echo esc_html($item['title']); ?>
                    </button>
                </h6>
                <div id="grozomart_three<?php echo esc_attr($index . $uid); ?>" class="accordion-collapse collapse <?php echo esc_attr($index == 1 ? 'show' : ''); ?>" data-bs-parent="#faq-accordion-one-<?php echo esc_attr($uid); ?>">
                    <div class="accordion-body">
                        <p><?php echo esc_html($item['faq_content']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>