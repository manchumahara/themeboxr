/*global jQuery, console */
(function ($) {
    "use strict";

	function bootstrapHoverMenu (bp) {

		// close all dropdowns that are open
		$('body').click( function (e) {
			$('.dropdown-menu.show').removeClass('show');
		});

		// show dropdown for the link clicked
		$('.nav-item').hover(function (e) {
			$('.dropdown-menu.show').removeClass('show');
			if(( $(window).width() >= bp )) {
				var $dd = $(this).find('.dropdown-menu');
				$dd.addClass('show');
			}
		});

		// get href for top level link if clicked and open
		$('.dropdown').click(function (e) {
			if( $(window).width() < bp ) {
				$('.dropdown-menu').css({'display': 'none'});
			}
			var $href = $(this).find('.nav-link').attr('href');
			window.open($href, '_self');
		});
	}

	$(document).ready(function ($) {
		var is_admin_bar_showing = 0;
		if ($('#wpadminbar').length > 0) {
			is_admin_bar_showing = 1;
		}

		//add the off canvas

		$(".navbar-nav").clone().prependTo("#off-canvas .offcanvaswrap_menus");
		$(function() {
			$(document).trigger("enhance");
		});
		//end add offcanvas


		// 01. Window Scroll Function
		$(window).on('scroll', function () {
			// Header Fix Bg Class
			var top = $(window).scrollTop();
			if (top >= 150) {
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

        //03. Products Filter
        var selectedClass = '',
            filItem = '.fil-cat';

        $(filItem).click(function(){
            $(filItem).removeClass('current');
            $(this).addClass('current');

            selectedClass = $(this).attr("data-rel");
            $("#productsContent").fadeTo(100, 0.1);
            $("#productsContent .product-item").not("."+selectedClass).fadeOut().removeClass('scale-amn');
            setTimeout(function() {
                $("."+selectedClass).fadeIn().addClass('scale-amn');
                $("#productsContent").fadeTo(300, 1);
            }, 300);

        });

    });

}(jQuery));