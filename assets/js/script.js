(function ($) {

    'use strict';

    $('.header-menu .has-dropdown > a').append('<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path></svg></span>');

    $('.off-canvas-menu .has-dropdown').prepend('<span class="toggle-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path></svg></span>');

    $('.off-canvas-menu .has-dropdown > .toggle-btn').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).parent().children('.sub-menu').slideToggle();
        $(this).parent().siblings().children('.sub-menu').slideUp();
        $(this).parent().siblings().removeClass('active');
    });

    $(".off-canvas-overlay").on('click', function () {
        $(this).parent().removeClass('active');
        $('.off-canvas-wrap').removeClass('active');
    });
    $(".off-canvas-close").on('click', function () {
        $('.off-canvas-section').removeClass('active');
        $('.off-canvas-wrap').removeClass('active');
    });

    $(".menu-bar a").on('click', function (e) {
        e.preventDefault();
        $('.off-canvas-section').addClass('active');
        $('.off-canvas-wrap').addClass('active');
    });

    /*-------------------------------------------
        Sticky Header
    --------------------------------------------- */

    let win = $(window);
    let sticky_id = $(".header-area");
    win.on('scroll', function () {
        let scroll = win.scrollTop();
        if (scroll < 245) {
            sticky_id.removeClass("sticky-header");
        } else {
            sticky_id.addClass("sticky-header");
        }
    });

    /*------------------------------------
        Data-Background
    --------------------------------------*/
    $("[data-background]").each(function () {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background", $(this).attr("data-bg-color"))
    });

    function testimonialSliderActive() {
        if (jQuery(".testimonial-slider-active .swiper-container").length > 0) {
            let testimonialSlider1 = new Swiper('.testimonial-slider-active .swiper-container', {
                // Optional parameters
                slidesPerView: 1,
                slidesPerColumn: 1,
                paginationClickable: true,
                loop: true,
                // spaceBetween: 30,

                autoplay: {
                    delay: 3000,
                },

                scrollbar: {
                    el: '.swiper-scrollbar',
                    hide: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.testimonial-button-next',
                    prevEl: '.testimonial-button-prev',
                },

                a11y: false,
            })
        }
    }

    //slider
    if (jQuery(".review-active-wrap").length > 0) {
        let reviewSlider = new Swiper('.review-active-wrap .swiper-container', {
            // Optional parameters
            slidesPerView: 3,
            slidesPerColumn: 1,
            paginationClickable: true,
            loop: true,

            autoplay: {
                delay: 5000,
            },

            // If we need pagination
            pagination: {
                el: '.review-pagination',
                // type: 'fraction',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            a11y: false,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 2,
                },
                1200: {
                    slidesPerView: 3,
                },
            },
        });
    }


    //slider
    if (jQuery(".hero-slider-active").length > 0) {
        let heroSlider = new Swiper('.hero-slider-active .swiper', {
            // Optional parameters
            slidesPerView: 1,
            slidesPerColumn: 1,
            paginationClickable: true,
            loop: true,

            autoplay: {
                delay: 5000,
            },

            // If we need pagination
            pagination: {
                el: '.hero-pagination',
                // type: 'fraction',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.hero-button-next',
                prevEl: '.hero-button-prev',
            },

            a11y: false,
        });
    }


    function startAos() {
        // AOS.init({
        //     // Global settings:
        //     disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        //     startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        //     initClassName: 'aos-init', // class applied after initialization
        //     animatedClassName: 'aos-animate', // class applied on animation
        //     useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        //     disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        //     debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        //     throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        //
        //
        //     // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        //     offset: 120, // offset (in px) from the original trigger point
        //     delay: 0, // values from 0 to 3000, with step 50ms
        //     duration: 400, // values from 0 to 3000, with step 50ms
        //     easing: 'ease', // default easing for AOS animations
        //     once: false, // whether animation should happen only once - while scrolling down
        //     mirror: false, // whether elements should animate out while scrolling past them
        //     anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
        // });
    }

    // startAos();


    $(window).on('elementor/frontend/init', function () {
        // elementorFrontend.hooks.addAction('frontend/element_ready/hero.default', startAos);
        // elementorFrontend.hooks.addAction('frontend/element_ready/featured_list.default', startAos);
        // elementorFrontend.hooks.addAction('frontend/element_ready/service.default', startAos);
        // elementorFrontend.hooks.addAction('frontend/element_ready/cta.default', startAos);
        // elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', startAos);
        // elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', testimonialSliderActive);
    });


})(jQuery);
