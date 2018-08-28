/*global jQuery, console */
(function ($) {
    "use strict";

    // 01. Window Scroll Function
    $(window).on('scroll', function () {
        // Header Fix Bg Class
        var top = $(window).scrollTop();
        if (top >= 200) {
            $('#header-area').addClass('fixed');
        } else {
            $('#header-area').removeClass('fixed');
        }
    });

    //02. Feature Product Owl Carousel
    $('.feature-slider-warp').owlCarousel({
        center: true,
        items:3,
        loop:true,
        autoplay: false,
        lazyLoad: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn'
    });


}(jQuery));