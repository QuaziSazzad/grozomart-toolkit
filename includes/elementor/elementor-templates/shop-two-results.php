<?php

/**
 * Shop widget — Layout Two results column.
 *
 * Renders the toolbar (result count, view switcher, sort dropdown) plus the
 * product grid/list and pagination. Kept apart from shop-two.php so the
 * exact same markup can be produced two ways: inline while the widget
 * renders, and standalone from the AJAX filter handler
 * (Grozomart_Shop_Filter::render), which swaps only this fragment into the
 * page instead of reloading it.
 *
 * Expects these to be in scope (see Grozomart_Shop_Filter::render for the
 * non-widget path, which sets up the identical variables):
 *
 * @var array    $settings                     Widget settings.
 * @var array    $shop_two_products            WC_Product objects for this page.
 * @var WP_Query $shop_two_query               The query they came from.
 * @var int      $shop_two_paged               Current page number.
 * @var int      $shop_two_total               Total matching products.
 * @var int      $shop_two_first               Index of the first result shown.
 * @var int      $shop_two_last                Index of the last result shown.
 * @var string   $shop_two_active_view         'grid' or 'list'.
 * @var array    $shop_two_views               View id => icon class.
 * @var array    $shop_two_sort_labels         Sort value => label.
 * @var string   $shop_two_orderby_choice      Selected sort value.
 * @var string   $shop_two_uid                 Unique id for tab anchors.
 * @var callable $shop_two_render_card         Grid card renderer.
 * @var callable $shop_two_render_list_item    List row renderer.
 * @var callable $shop_two_persist_query_args  Hidden-input emitter.
 *
 * @package GrozomartToolkit
 */

defined('ABSPATH') || exit;

/**
 * Pagination is rendered under both the grid and the list pane, so build it
 * once here. add_query_arg() keeps every active filter on the link; the JS
 * filter reads the page number back off it rather than following the href.
 */
$shop_two_pagination = '';
if ('yes' === $settings['layout_two_show_pagination'] && $shop_two_query->max_num_pages > 1) {
    $shop_two_pagination = paginate_links([
        'base'      => esc_url_raw(add_query_arg('product_page', '%#%')),
        'format'    => '',
        'current'   => $shop_two_paged,
        'total'     => $shop_two_query->max_num_pages,
        'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
        'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
        'type'      => 'list',
    ]);
}
?>
<div class="shop-notices-wrapper style-two">
    <?php if ('yes' === $settings['layout_two_show_result_count']) : ?>
        <p>
            <?php
            if ($shop_two_total) {
                printf(
                    /* translators: 1: first result, 2: last result, 3: total results */
                    wp_kses(__('Showing <b>%1$d&#8211;%2$d of %3$d</b> results', 'grozomart-toolkit'), ['b' => []]),
                    (int) $shop_two_first,
                    (int) $shop_two_last,
                    (int) $shop_two_total
                );
            } else {
                esc_html_e('No products found', 'grozomart-toolkit');
            }
            ?>
        </p>
    <?php endif; ?>
    <div class="shop-showing">
        <?php if ('yes' === $settings['layout_two_show_view_tabs']) : ?>
            <ul class="nav">
                <?php foreach ($shop_two_views as $shop_two_view_id => $shop_two_view_icon) : ?>
                    <li class="nav-item">
                        <a href="#<?php echo esc_attr($shop_two_view_id . '-' . $shop_two_uid); ?>" data-bs-toggle="tab" class="nav-link<?php echo $shop_two_view_id === $shop_two_active_view ? ' active' : ''; ?>">
                            <i class="<?php echo esc_attr($shop_two_view_icon); ?>"></i>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if ('yes' === $settings['layout_two_show_ordering']) : ?>
            <div class="form-clt">
                <form class="form" method="get">
                    <?php $shop_two_persist_query_args(); ?>
                    <select class="single-select w-100" name="orderby">
                        <?php foreach ($shop_two_sort_labels as $shop_two_val => $shop_two_label) : ?>
                            <option value="<?php echo esc_attr($shop_two_val); ?>"<?php selected($shop_two_orderby_choice, $shop_two_val); ?>><?php echo esc_html($shop_two_label); ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if (empty($shop_two_products)) : ?>
    <p class="woocommerce-info"><?php esc_html_e('No products were found matching your selection.', 'grozomart-toolkit'); ?></p>
<?php else : ?>
    <div class="tab-content">
        <div id="<?php echo esc_attr('grid-' . $shop_two_uid); ?>" class="tab-pane fade<?php echo 'grid' === $shop_two_active_view ? ' show active' : ''; ?>">
            <div class="row">
                <?php foreach ($shop_two_products as $product) : ?>
                    <?php $shop_two_render_card($product); ?>
                <?php endforeach; ?>
            </div>

            <?php if ($shop_two_pagination) : ?>
                <div class="page-nav-wrap text-center">
                    <?php echo wp_kses_post($shop_two_pagination); ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="<?php echo esc_attr('list-' . $shop_two_uid); ?>" class="tab-pane fade<?php echo 'list' === $shop_two_active_view ? ' show active' : ''; ?>">
            <?php foreach ($shop_two_products as $product) : ?>
                <?php $shop_two_render_list_item($product); ?>
            <?php endforeach; ?>

            <?php if ($shop_two_pagination) : ?>
                <div class="page-nav-wrap text-center">
                    <?php echo wp_kses_post($shop_two_pagination); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
