/**
 * AJAX filtering for the Shop widget's Layout Two.
 *
 * Replaces the results column in place instead of reloading the page when a
 * sidebar filter, the sort dropdown or a pagination link changes. Each
 * .grozomart-shop-filter section is handled independently, so more than one
 * can sit on the same page.
 */
; (function ($) {
    "use strict";

    var SELECTOR = '.grozomart-shop-filter';

    function ShopFilter($section) {
        this.$section = $section;
        this.$form = $section.find('.shop-filter-form');
        this.$results = $section.find('.shop-filter-results');
        this.settings = $section.data('settings') || {};
        this.nonce = $section.data('nonce');
        this.postId = $section.data('post-id');
        this.elementId = $section.data('element-id');
        this.page = 1;
        this.orderby = this.settings.layout_two_default_orderby || '';
        this.view = '';
        this.request = null;

        this.bind();
    }

    /**
     * Collects the sidebar form's state, plus the sort/page/view that live
     * outside it. Serializing the form rather than reading each control
     * keeps this working if a filter section is toggled off in the widget's
     * settings.
     */
    ShopFilter.prototype.filters = function () {
        var filters = {};

        $.each(this.$form.serializeArray(), function (i, field) {
            if (/\[\]$/.test(field.name)) {
                var key = field.name.replace(/\[\]$/, '');
                filters[key] = filters[key] || [];
                filters[key].push(field.value);
            } else {
                filters[field.name] = field.value;
            }
        });

        if (this.orderby) {
            filters.orderby = this.orderby;
        }
        if (this.page > 1) {
            filters.product_page = this.page;
        }
        if (this.view) {
            filters.view = this.view;
        }

        return filters;
    };

    /**
     * Mirrors the filter state into the address bar so the result of a
     * filter can be reloaded, shared or reached with the back button, even
     * though the page itself never navigated.
     */
    ShopFilter.prototype.syncUrl = function (filters) {
        if (!window.history || !window.history.replaceState) {
            return;
        }

        var params = new URLSearchParams();

        $.each(filters, function (key, value) {
            if ($.isArray(value)) {
                $.each(value, function (i, item) {
                    params.append(key + '[]', item);
                });
            } else if (value !== '' && value !== null && typeof value !== 'undefined') {
                params.set(key, value);
            }
        });

        var query = params.toString();
        window.history.replaceState({}, '', query ? '?' + query : window.location.pathname);
    };

    ShopFilter.prototype.load = function () {
        var self = this;
        var filters = this.filters();

        if (this.request) {
            this.request.abort();
        }

        this.$results.addClass('is-loading');

        this.request = $.ajax({
            url: GrozomartObject.ajax_url,
            type: 'POST',
            data: {
                action: 'grozomart_shop_filter',
                nonce: this.nonce,
                post_id: this.postId,
                element_id: this.elementId,
                settings: this.settings,
                filters: filters
            }
        }).done(function (response) {
            if (!response || !response.success || !response.data) {
                return;
            }

            self.$results.html(response.data.html);
            self.refresh();
            self.syncUrl(filters);
        }).always(function () {
            self.$results.removeClass('is-loading');
            self.request = null;
        });
    };

    /**
     * The swapped-in markup carries a fresh sort <select>, which needs
     * nice-select applied again — the plugin builds its own wrapper element
     * next to the original, so the copy that arrived over AJAX is otherwise
     * left as a bare, unstyled control.
     */
    ShopFilter.prototype.refresh = function () {
        var $select = this.$results.find('.single-select').not('.theme-inited');
        if ($select.length && $.fn.niceSelect) {
            $select.addClass('theme-inited').niceSelect();
        }

        $(document.body).trigger('grozomart_shop_filtered', [this.$section]);
    };

    ShopFilter.prototype.bind = function () {
        var self = this;

        // Sidebar checkboxes apply immediately; the price slider waits for
        // the Filter button so dragging doesn't fire a request per step.
        this.$form.on('change', 'input[type="checkbox"]', function () {
            self.page = 1;
            self.load();
        });

        this.$form.on('submit', function (e) {
            e.preventDefault();
            self.page = 1;
            self.load();
        });

        this.$results.on('change', 'select[name="orderby"]', function () {
            self.orderby = $(this).val();
            self.page = 1;
            self.load();
        });

        this.$results.on('submit', 'form', function (e) {
            e.preventDefault();
        });

        this.$results.on('click', '.page-nav-wrap a.page-numbers', function (e) {
            e.preventDefault();

            var page = self.pageFromLink(this.href);
            if (!page) {
                return;
            }

            self.page = page;
            self.load();

            var top = self.$section.offset().top - 100;
            $('html, body').animate({ scrollTop: top > 0 ? top : 0 }, 300);
        });

        // Remember which pane the shopper is on so a filter change doesn't
        // drop them back to the widget's default view.
        this.$results.on('click', '.shop-showing .nav-link', function () {
            var href = $(this).attr('href') || '';
            self.view = href.indexOf('#list-') === 0 ? 'list' : 'grid';
        });
    };

    /**
     * paginate_links() renders real hrefs; read the page number back off
     * one rather than tracking prev/next state separately.
     */
    ShopFilter.prototype.pageFromLink = function (href) {
        var match = /[?&]product_page=(\d+)/.exec(href || '');
        if (match) {
            return parseInt(match[1], 10);
        }

        // Pretty permalinks can render /page/2/ instead of a query arg.
        match = /\/page\/(\d+)/.exec(href || '');

        return match ? parseInt(match[1], 10) : 0;
    };

    function init($scope) {
        $scope.find(SELECTOR).addBack(SELECTOR).each(function () {
            var $section = $(this);
            if ($section.data('shop-filter-inited')) {
                return;
            }
            $section.data('shop-filter-inited', true);
            new ShopFilter($section);
        });
    }

    $(function () {
        init($(document));
    });

    // Elementor re-renders a widget's markup on every edit in the editor.
    $(window).on('elementor/frontend/init', function () {
        if (typeof elementorFrontend === 'undefined') {
            return;
        }
        elementorFrontend.hooks.addAction('frontend/element_ready/grozomart-shop.default', function ($scope) {
            init($scope);
        });
    });

})(jQuery);
