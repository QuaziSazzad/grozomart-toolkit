<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="row justify-content-between pt-10">
        <?php
        foreach ($settings['layout_one_skills_list'] as $index => $item) :
        ?>
            <div class="col-xl-3 col-sm-4 col-6">
                <div class="circle-progress" data-percentage="<?php echo esc_attr($item['percentage']); ?>">
                    <span class="counting">0</span>
                    <h6><?php echo esc_html($item['title']); ?></h6>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>