/**
 * Shop Details — Layout Two variation buttons.
 *
 * The design shows variation attributes as a row of buttons, but
 * wc-add-to-cart-variation.js only understands `.variations select`. So the
 * real selects stay in the DOM (hidden by CSS) and these buttons drive them:
 * clicking one writes its value into the matching select and fires `change`,
 * which is what WooCommerce listens for to resolve the variation, update the
 * price/stock and fill in the hidden variation_id.
 */
; (function ($) {
    "use strict";

    /**
     * Mirrors each select's state onto its buttons: which one is active, and
     * which are no longer available.
     *
     * WooCommerce rewrites a select's <option> list as choices are made — an
     * option it removes is a combination that doesn't exist (this product has
     * no red+Yes, for example). Reflecting that on the buttons is what stops
     * a shopper picking a dead end and then being told "please select some
     * product options" with no clue which pairing was wrong.
     *
     * Runs on load and after every WooCommerce update, so the buttons can
     * never disagree with the field WooCommerce actually reads.
     */
    function syncButtons($form) {
        $form.find('.grozomart-variation-option').each(function () {
            var $button = $(this);
            var $select = $form.find('#' + $button.data('target'));

            if (!$select.length) {
                return;
            }

            var value = String($button.data('value'));
            var selected = String($select.val() || '');

            $button.toggleClass('active', selected !== '' && selected === value);

            // An option still present in the select is still selectable.
            var available = $select.find('option').filter(function () {
                return String($(this).val()) === value;
            }).length > 0;

            $button
                .toggleClass('disabled', !available)
                .prop('disabled', !available);
        });
    }

    $(document).on('click', '.grozomart-variation-option', function (e) {
        e.preventDefault();

        var $button = $(this);
        var $form = $button.closest('.grozomart-variation-form');
        var $select = $form.find('#' + $button.data('target'));

        if (!$select.length) {
            return;
        }

        var value = String($button.data('value'));

        // Clicking the active option clears it, matching how the select's
        // own "choose an option" entry behaves.
        $select.val($select.val() === value ? '' : value).trigger('change');

        syncButtons($form);
        syncCartButton($form);
    });

    /**
     * "Select options" until a full combination resolves, then "Add to cart".
     * WooCommerce fills the hidden variation_id only once every attribute is
     * chosen and the pairing exists, so that field is the honest signal —
     * more reliable than counting how many buttons look active.
     */
    function syncCartButton($form) {
        var $button = $form.find('.single_add_to_cart_button');

        if (!$button.length) {
            return;
        }

        var resolved = parseInt($form.find('input.variation_id').val(), 10) > 0;
        var label = resolved ? $button.data('cart-text') : $button.data('select-text');

        if (label) {
            $button.text(label);
        }
    }

    // WooCommerce fires these after it resolves or clears a variation.
    $(document).on('show_variation reset_data woocommerce_variation_has_changed hide_variation', '.grozomart-variation-form', function () {
        var $form = $(this);
        syncButtons($form);
        syncCartButton($form);
    });

    $(function () {
        $('.grozomart-variation-form').each(function () {
            syncButtons($(this));
            syncCartButton($(this));
        });
    });

})(jQuery);
