/**
 * Keeps the [grozomart_wishlist] table in sync.
 *
 * Storzen owns the wishlist data and its own script already posts the
 * add/remove/clear requests. What it cannot do is refresh this table: its
 * handler replaces `.sz-wishlist-wrap`, a wrapper this design does not use.
 *
 * So this listens for the same clicks, lets Storzen's request go through
 * untouched, and then re-renders our table from the server. The removal
 * itself is never reimplemented here.
 */
(function ($) {
    'use strict';

    if (typeof window.grozomartWishlist === 'undefined') {
        return;
    }

    var settings = window.grozomartWishlist;

    /**
     * Pull a freshly rendered table and swap it in.
     */
    function refreshTable() {
        var $wrap = $('[data-grozomart-wishlist]').first();

        if (!$wrap.length) {
            return;
        }

        $wrap.addClass('is-loading');

        $.post(settings.ajaxUrl, { action: settings.action })
            .done(function (res) {
                if (res && res.success && res.data && typeof res.data.html === 'string') {
                    // The response is a full .wishlist-items block, so replace
                    // rather than fill, keeping the markup identical to the
                    // server-rendered page.
                    $wrap.replaceWith(res.data.html);
                }
            })
            .always(function () {
                $('[data-grozomart-wishlist]').removeClass('is-loading');
            });
    }

    $(function () {
        /**
         * Storzen binds the same selector on document, so both handlers run:
         * its own sends the AJAX request, this one refreshes the table once
         * the request has had time to land. Delegated, so rows added by a
         * refresh keep working.
         */
        $(document).on('click', '[data-grozomart-wishlist] [data-sz-wishlist-remove]', function () {
            var $row = $(this).closest('tr');

            // Fade the row immediately so the click feels answered, then let
            // the re-render settle the real state.
            $row.addClass('is-removing');

            window.setTimeout(refreshTable, 350);
        });

        // Storzen fires these after its own successful requests when present.
        $(document.body).on('storzen_wishlist_removed storzen_wishlist_cleared', refreshTable);
    });
})(jQuery);
