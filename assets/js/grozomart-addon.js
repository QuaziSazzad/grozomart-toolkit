; (function ($) {
    "use strict";

    var WidgetDefaultHandler = function ($scope) {

        // ## Video Popup
        var $videoPlay = $scope.find('.video-play').not('.theme-inited');
        if ($videoPlay.length && $.fn.magnificPopup) {
            $videoPlay.addClass('theme-inited').magnificPopup({
                type: 'video',
            });
        }

        // ## Video Popup With Text
        var $videoPlayText = $scope.find('.video-play-text').not('.theme-inited');
        if ($videoPlayText.length && $.fn.magnificPopup) {
            $videoPlayText.addClass('theme-inited').magnificPopup({
                type: 'video',
            });
        }

        // ## Main Slider
        var $mainSlider = $scope.find('.main-slider-active').not('.slick-initialized');
        if ($.fn.slick && $mainSlider.length) {
            $mainSlider.slick({
                infinite: true,
                arrows: true,
                dots: false,
                fade: true,
                autoplay: true,
                prevArrow: '<button class="prev-arrow"><i class="fal fa-angle-left"></i></button>',
                nextArrow: '<button class="next-arrow"><i class="fal fa-angle-right"></i></button>',
                autoplaySpeed: 5000,
                pauseOnHover: false,
                slidesToScroll: 1,
                slidesToShow: 1,
            });
        }

        // ## Client Logo Slider
        var $clientLogoSlider = $scope.find('.client-logo-active').not('.slick-initialized');
        if ($.fn.slick && $clientLogoSlider.length) {
            $clientLogoSlider.slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: false,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });
        }

        // ## Testimonial Slider
        var $testimonialsActive = $scope.find('.testimonials-active').not('.slick-initialized');
        if ($.fn.slick && $testimonialsActive.length) {
            $testimonialsActive.slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                prevArrow: '.testi-arrow-left',
                nextArrow: '.testi-arrow-right',
                responsive: [
                    {
                        breakpoint: 990,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }

        // ## Testimonial Two Slider
        var $testimonialsTwoActive = $scope.find('.testimonials-two-active').not('.slick-initialized');
        if ($.fn.slick && $testimonialsTwoActive.length) {
            $testimonialsTwoActive.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                prevArrow: '.testi-arrow-left',
                nextArrow: '.testi-arrow-right'
            });
        }

        // ## Testimonial Three Slider
        var $testimonialsThreeActive = $scope.find('.testimonials-three-active').not('.slick-initialized');
        if ($.fn.slick && $testimonialsThreeActive.length) {
            $testimonialsThreeActive.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                prevArrow: '.testi-arrow-left',
                nextArrow: '.testi-arrow-right'
            });
        }


        // ## Testimonials Four Carousel
        var $testimonialsFourActive = $scope.find('.testimonials-four-active').not('.slick-initialized');
        if ($.fn.slick && $testimonialsFourActive.length) {
            $testimonialsFourActive.slick({
                infinite: true,
                speed: 400,
                arrows: false,
                dots: true,
                appendDots: '.testimonial-dots',
                focusOnSelect: true,
                autoplay: true,
                autoplaySpeed: 5000,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        }


        // ## Testimonial Five
        var $testimonialFiveSlider = $scope.find('.testimonial-five-slider').not('.slick-initialized');
        if ($.fn.slick && $testimonialFiveSlider.length) {
            $testimonialFiveSlider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                speed: 400,
                arrows: false,
                dots: true,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
            });
        }

        // ## Testimonial Six Slider
        var $testimonialsSixActive = $scope.find('.testimonials-six-active').not('.slick-initialized');
        if ($.fn.slick && $testimonialsSixActive.length) {
            $testimonialsSixActive.slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    speed: 400,
                    arrows: false,
                    dots: true,
                    focusOnSelect: true,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    responsive: [
                        {
                            breakpoint: 990,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                });
            }

        // ## Marquee Right Slider
        var $marqueeSliderRight = $scope.find('.marquee-slider-right').not('.slick-initialized');
        if ($.fn.slick && $marqueeSliderRight.length) {
            $marqueeSliderRight.slick({
                speed: 8000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: true,
                cssEase: 'linear',
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: false,
            });
        }


        // ## Marquee Left Slider
        var $marqueeSliderLeft = $scope.find('.marquee-slider-left').not('.slick-initialized');
        if ($.fn.slick && $marqueeSliderLeft.length) {
            $marqueeSliderLeft.slick({
                speed: 8000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: true,
                cssEase: 'linear',
                slidesToShow: 1,
                slidesToScroll: -1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: true,
                rtl: true,
            });
        }



        // ## Working Process Two Slider
        var $wsSlider = $scope.find(".working-process-two-active").not('.slick-initialized');
        if ($.fn.slick && $wsSlider.length) {
            $wsSlider
                .on('init', () => {
                    mouseWheel($wsSlider)
                })
                .slick({
                    dots: false,
                    vertical: true,
                    arrows: false,
                    infinite: false,
                    slidesToShow: 3
                })
        }
        function mouseWheel($wsSlider) {
            $(window).on('wheel', { $wsSlider: $wsSlider }, mouseWheelHandler)
        }
        function mouseWheelHandler(event) {
            event.preventDefault()
            const $wsSlider = event.data.$wsSlider
            const delta = event.originalEvent.deltaY
            if (delta > 0) {
                $wsSlider.slick('slickNext')
            }
            else {
                $wsSlider.slick('slickPrev')
            }
        }


        // ## Blog Three Slider
        var $blogSlider = $scope.find(".blog-three-active").not('.slick-initialized');
        if ($.fn.slick && $blogSlider.length) {
            $blogSlider
                .on('init', () => {
                    mouseWheel($blogSlider)
                })
                .slick({
                    dots: false,
                    vertical: true,
                    arrows: false,
                    infinite: false,
                    slidesToShow: 2
                })
        }
        function mouseWheel($blogSlider) {
            $(window).on('wheel', { $blogSlider: $blogSlider }, mouseWheelHandler)
        }
        function mouseWheelHandler(event) {
            event.preventDefault()
            const $blogSlider = event.data.$blogSlider
            const delta = event.originalEvent.deltaY
            if (delta > 0) {
                $blogSlider.slick('slickNext')
            }
            else {
                $blogSlider.slick('slickPrev')
            }
        }


        // ## Team Slider
        var $teamSlider = $scope.find('.team-slider').not('.slick-initialized');
        if ($.fn.slick && $teamSlider.length) {
            $teamSlider.slick({
                slidesToShow: 4,
                slidesToScroll: 2,
                infinite: true,
                speed: 400,
                arrows: false,
                dots: true,
                focusOnSelect: true,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }


        // ## Service Four Slider
        var $serviceFourSlider = $scope.find('.service-four-slider').not('.slick-initialized');
        if ($.fn.slick && $serviceFourSlider.length) {
            $serviceFourSlider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: false,
                speed: 400,
                arrows: false,
                dots: true,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        // ## Service Image Popup Gallery
        var $serviceItemFourPopup = $scope.find('.service-item-four .image .plus').not('.theme-inited');
        if ($serviceItemFourPopup.length && $.fn.magnificPopup) {
            $serviceItemFourPopup.addClass('theme-inited').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                },
            });
        }


        // Service Item Four Ative
        $scope.find(".service-item-four").not('.theme-inited').addClass('theme-inited').hover(function () {
            $scope.find(".service-item-four").removeClass("active");
            $(this).addClass("active");
        });



        // ## Hover Content
        $scope.find('.hover-content').not('.theme-inited').addClass('theme-inited').hover(
            function () {
                $(this).find('.inner-content').slideDown();
            }, function () {
                $(this).find('.inner-content').slideUp();
            }
        );


        /* ## Fact Counter + Text Count - Our Success */
        var $counterTextWrap = $scope.find('.counter-text-wrap').not('.theme-inited');
        if ($.fn.appear && $counterTextWrap.length) {
            $counterTextWrap.addClass('theme-inited').appear(function () {

                var $t = $(this),
                    n = $t.find(".count-text").attr("data-stop"),
                    r = parseInt($t.find(".count-text").attr("data-speed"), 10);

                if (!$t.hasClass("counted")) {
                    $t.addClass("counted");
                    $({
                        countNum: $t.find(".count-text").text()
                    }).animate({
                        countNum: n
                    }, {
                        duration: r,
                        easing: "linear",
                        step: function () {
                            $t.find(".count-text").text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $t.find(".count-text").text(this.countNum);
                        }
                    });
                }

            }, {
                accY: 0
            });
        }


        /* ## Circle Progress */
        if ($.fn.circleProgress && $.fn.appear) {
            var progressOne = $scope.find('.circle-progress.one').not('.theme-inited');
            if (progressOne.length) {
                progressOne.addClass('theme-inited').appear(function () {
                    progressOne.circleProgress({
                        value: 0.89,
                        size: 120,
                        thickness: 1,
                        fill: "#002FF5",
                        // lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(89 * progress) + '<span>%</span>');
                    });
                });
            }
        }
        if ($.fn.circleProgress && $.fn.appear) {
            var progressTwo = $scope.find('.circle-progress.two').not('.theme-inited');
            if (progressTwo.length) {
                progressTwo.addClass('theme-inited').appear(function () {
                    progressTwo.circleProgress({
                        value: 0.89,
                        size: 120,
                        thickness: 1,
                        fill: "#002FF5",
                        // lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(5 * progress) + '<span>k+</span>');
                    });
                });
            }
        }


        /* ## Circle Progress Team */
        if ($.fn.circleProgress && $.fn.appear) {
            var progressTeamOne = $scope.find('.circle-progress-two.one').not('.theme-inited');
            if (progressTeamOne.length) {
                progressTeamOne.addClass('theme-inited').appear(function () {
                    progressTeamOne.circleProgress({
                        value: 0.85,
                        size: 100,
                        thickness: 5,
                        fill: "#FC5546",
                        lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(85 * progress) + '<span>%</span>');
                    });
                });
            }
        }
        if ($.fn.circleProgress && $.fn.appear) {
            var progressTeamTwo = $scope.find('.circle-progress-two.two').not('.theme-inited');
            if (progressTeamTwo.length) {
                progressTeamTwo.addClass('theme-inited').appear(function () {
                    progressTeamTwo.circleProgress({
                        value: 0.79,
                        size: 100,
                        thickness: 5,
                        fill: "#FC5546",
                        lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(79 * progress) + '<span>%</span>');
                    });
                });
            }
        }


        /* ## Circle Progress Achievement */
        if ($.fn.circleProgress && $.fn.appear) {
            var progressAchieveOne = $scope.find('.circle-progress-achievement.one').not('.theme-inited');
            if (progressAchieveOne.length) {
                progressAchieveOne.addClass('theme-inited').appear(function () {
                    progressAchieveOne.circleProgress({
                        value: 0.84,
                        size: 65,
                        thickness: 5,
                        fill: "white",
                        lineCap: 'round',
                        emptyFill: "rgba(255, 255, 255, .2)",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(65 * progress) + '<span>+</span>');
                    });
                });
            }
        }
        if ($.fn.circleProgress && $.fn.appear) {
            var progressAchieveTwo = $scope.find('.circle-progress-achievement.two').not('.theme-inited');
            if (progressAchieveTwo.length) {
                progressAchieveTwo.addClass('theme-inited').appear(function () {
                    progressAchieveTwo.circleProgress({
                        value: 0.75,
                        size: 65,
                        thickness: 5,
                        fill: "white",
                        lineCap: 'round',
                        emptyFill: "rgba(255, 255, 255, .2)",
                        startAngle: Math.PI / 4 * 2,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(4.8 * progress));
                    });
                });
            }
        }

        // ## Case Filter
        var $caseActive = $scope.find('.case-active').not('.theme-inited');
        if ($.fn.imagesLoaded && $.fn.isotope && $caseActive.length) {
            $caseActive.addClass('theme-inited').imagesLoaded(function () {
                var items = $caseActive.isotope({
                    itemSelector: '.item',
                    percentPosition: true,
                });
                // items on button click
                $scope.find('.case-nav').on('click', 'li', function () {
                    var filterValue = $(this).attr('data-filter');
                    items.isotope({
                        filter: filterValue
                    });
                });
                // menu active class
                $scope.find('.case-nav li').on('click', function (event) {
                    $(this).siblings('.active').removeClass('active');
                    $(this).addClass('active');
                    event.preventDefault();
                });
            });
        }


        // ## Price Range Fliter jQuery UI
        var $priceSliderRange = $scope.find('.price-slider-range').not('.theme-inited');
        if ($.fn.slider && $priceSliderRange.length) {
            $priceSliderRange.addClass('theme-inited').slider({
                range: true,
                min: 5,
                max: 100,
                values: [10, 65],
                slide: function (event, ui) {
                    $scope.find("#price").val("$ " + ui.values[0] + " - $ " + ui.values[1]);
                }
            });
            $scope.find("#price").val("$ " + $priceSliderRange.slider("values", 0) +
                " - $ " + $priceSliderRange.slider("values", 1));
        }


        // ## SkillBar
        var $skillbar = $scope.find('.skillbar').not('.theme-inited');
        if ($.fn.appear && $.fn.skillBars && $skillbar.length) {
            $skillbar.addClass('theme-inited').appear(function () {
                $skillbar.skillBars({
                    from: 0,
                    speed: 4000,
                    interval: 100,
                });
            });
        }


        // ## Scroll to Top
        if ($scope.find('.scroll-to-target').length) {
            $scope.find(".scroll-to-target").on('click', function () {
                var target = $(this).attr('data-target');
                // animate
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 1000);

            });
        }


        // ## Nice Select
        var $select = $scope.find('select').not('.theme-inited');
        if ($.fn.niceSelect && $select.length) {
            $select.addClass('theme-inited').niceSelect();
        }


    };

    //elementor front start
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/widget",
            WidgetDefaultHandler
        );

    });

    /* ==========================================================================
     When document is loaded, do
  ========================================================================== */

    $(window).on('load', function () {


        // ## Latest Work
        $('.latest-work-item').click(function () {
            $('.latest-work-item').removeClass('active');
            $(this).addClass('active');
            $('.normal-area').slideDown();
            $(this).find('.normal-area').slideUp();
            $('.active-area').slideUp();
            $(this).find('.active-area').slideDown();
        });

        // ## Latest Work
        $('.latest-work-item .active-area').hide();
        $('.latest-work-item.active .active-area').show();
        $('.latest-work-item .normal-area').show();
        $('.latest-work-item.active .normal-area').hide();


        // ## Preloader is handled by the theme (theme.js) so it still hides
        // when this plugin is deactivated.

    });

    // ## FAQ Nav Fixed
    if ($('.faq-tab-wrap').length) {
        var faqOffset = $('.faq-tab-wrap').offset().top;
        var footerOffset = $('.for-sticky').offset().top;
    }


    $(window).on('scroll', function () {

        // ## FAQ Nav Fixed
        var sticky = $('.faq-tab-wrap'),
            scroll = $(window).scrollTop();

        if (scroll >= faqOffset) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
        if (scroll >= footerOffset) sticky.removeClass('fixed');

    });

    // ## AOS Animation
    window.onload = function () {
        setTimeout(() => {
            if (typeof AOS !== 'undefined') {
                AOS.init();
            }
        }, 500); // Adjust delay if needed
    };


    $('.mc-form').on('submit', function (e) {
        e.preventDefault();

        let email = $('.mc-form__input').val();

        $.ajax({
            url: GrozomartObject.ajax_url,
            type: 'POST',
            data: {
                action: 'subscribe_user', // WP AJAX action
                email: email
            },
            success: function (response) {
                $('.mc-form__feedback').html(response);
                $('.mc-form__input').val('');
            },
            error: function (error) {
                $('.mc-form__feedback').html(response.error_text);
            }
        });
    });

    function GrozomartCartClickEvents() {
		// h-btn-cart
		$(".add_to_cart_button").on('click', function (e) {
			e.preventDefault();

			$('.widget-cart-wrap').addClass('cart-open');
		});

		$('.cart-close').on('click', function (e) {
			e.preventDefault();

			$('.widget-cart-wrap').removeClass('cart-open');
		});
	}

  GrozomartCartClickEvents();

})(jQuery);
