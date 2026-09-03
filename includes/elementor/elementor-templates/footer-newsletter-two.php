<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="container">
        <div class="footer-newsletter text-white">
            <div class="row align-items-center justify-content-between">
                <?php if (!empty($settings['layout_two_title'])) : ?>
                    <div class="col-lg-6">
                        <div class="section-title pt-30 rpt-0 rpb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <h2><?php echo esc_html($settings['layout_two_title']); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-6">
                    <div class="form-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <form class="newsletter-form mc-form" action="#">
                            <input type="email" class="mc-form__input" placeholder="<?php echo esc_attr($settings['layout_two_placeholder']); ?>" required="">
                            <button type="submit"><b><?php echo esc_html($settings['layout_two_btn_text']); ?> <i class="far fa-arrow-right"></i></b></button>
                        </form>
                        <p class="mc-form__feedback text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>