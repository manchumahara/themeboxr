/*global jQuery, console */
(function ($) {
    "use strict";

    function bootstrapHoverMenu(bp) {

        // close all dropdowns that are open
        $('body').on('click', function (e) {
            $('.dropdown-menu.show').removeClass('show');
        });

        // show dropdown for the link clicked
        $('.nav-item').on('hover', function (e) {
            $('.dropdown-menu.show').removeClass('show');
            if (($(window).width() >= bp)) {
                var $dd = $(this).find('.dropdown-menu');
                $dd.addClass('show');
            }
        });

        // get href for top level link if clicked and open
        $('.dropdown').on('click', function (e) {
            if ($(window).width() < bp) {
                $('.dropdown-menu').css({'display': 'none'});
            }
            var $href = $(this).find('.nav-link').attr('href');
            window.open($href, '_self');
        });
    }

    $(document).ready(function ($) {
        var $windowhash 		= window.location.hash;
        if($windowhash != ''){
            $(window).stop(true);
            $.smoothScroll(
                {
                    scrollTarget: $windowhash,
                    speed : 2000,
                    offset: -70,
                    afterScroll  : function (settings) {
                        //console.log(settings);
                    }
                }
            );
        }


        $('.gotome').on('click', function (e) {
            e.preventDefault();

            var $this = $(this);
            var $target = $this.attr('href');

            $.smoothScroll(
                {
                    scrollTarget: $target,
                    speed : 2000,
                    offset: -70,
                    afterScroll  : function (settings) {
                        //console.log(settings);
                    }

                }
            );

        });

        /*$( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
            var $el = $( this );
            $el.toggleClass('active-dropdown');
            var $parent = $( this ).offsetParent( ".dropdown-menu" );
            if ( !$( this ).next().hasClass( 'show' ) ) {
                $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
            }
            var $subMenu = $( this ).next( ".dropdown-menu" );
            $subMenu.toggleClass( 'show' );

            $( this ).parent( "li" ).toggleClass( 'show' );

            $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
                $( '.dropdown-menu .show' ).removeClass( "show" );
                $el.removeClass('active-dropdown');
            } );

            if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
                $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
            }

            return false;
        } );*/


        $('.wpcf7-form-control.wpcf7-wooorders').addClass('form-control');

        $('.woocommerce-products-header').remove();
        $('.woocommerce-products-wrapper').each(function (index, element) {
           var $element = $(element);

			$element.find('ul.products').wrap('<div class="row products"/>').contents().unwrap();
			$element.find('li.product').each(function (index, element) {
			    var $class = $(element).attr('class');

			    //col-md-4 col-sm-6 col-xs-12
				$(element).wrap('<div class="col-md-4 col-sm-6 col-xs-12"><div class="'+$class+'"></div></div>').contents().unwrap();
			});


			//$('.woocommerce-products-wrapper ul.products').wrap('<div class="row"/>').contents().unwrap();
			//$('.woocommerce-products-wrapper li.product').wrap('<div class="col-md-4 col-sm-6 col-xs-12 "/>').contents().unwrap();

		});

        $('.woocommerce-ordering').find('.orderby').addClass('form-control form-control-lg');

        $('.single-product-page-wrapper').find('.summary.entry-summary').remove();
		//$('p:empty').remove();
        $('p:empty').not('[role="status"]').remove();


		$('.add_to_cart_button').addClass('btn btn-default-brand');
		$('.wpcf7-form-control.wpcf7-submit').addClass('btn btn-block');
        //$('.add_to_cart_inline').attr('style', '');

        //$('.col2-set').addClass('row').removeClass('col2-set');
        //$('.col-1').addClass('col-md-6 col-sm-12').removeClass('col-1');
        //$('.col-2').addClass('col-md-6 col-sm-12').removeClass('col-2');


        var is_admin_bar_showing = 0;
        if ($('#wpadminbar').length > 0) {
            is_admin_bar_showing = 1;
        }

        //add the off canvas

        $('#navMain').find('.navbar-nav').clone().prependTo('#off-canvas .offcanvaswrap_menus');
        //$(function () {
        $(document).trigger("enhance");
        //});
		$('#off-canvas').attr('style', '');
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
            items: 3,
            loop: true,
            autoplay: false,
            lazyLoad: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn'
        });

        //03. Products Filter
        var selectedClass = '',
            filItem = '.fil-cat';

        $(filItem).on('click', function () {
            $(filItem).removeClass('current');
            $(this).addClass('current');

            selectedClass = $(this).attr("data-rel");
            $("#productsContent").fadeTo(100, 0.1);
            $("#productsContent .product-item").not("." + selectedClass).fadeOut().removeClass('scale-amn');
            setTimeout(function () {
                $("." + selectedClass).fadeIn().addClass('scale-amn');
                $("#productsContent").fadeTo(300, 1);
            }, 300);

        });

        // 04. Video Popup
        /*$('.video-popup').magnificPopup({
            type: 'iframe'
        });*/

        // 05. Owl Carousel testimonial
        $('#testimonialContent').owlCarousel({
            items: 3,
            loop: true,
            margin: 30,
            dots: false,
            nav: true,
            navClass: ['owl-nav-item owl-prev', 'owl-nav-item owl-next'],
            navText: ['<i class="fa fa-arrow-left">', '<i class="fa fa-arrow-right">'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });

        // 06. Owl Carousel Featured
        $('#featuredCarousel').owlCarousel({
            items: 6,
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            navClass: ['owl-nav-item owl-prev', 'owl-nav-item owl-next'],
            navText: ['<i class="fa fa-arrow-left">', '<i class="fa fa-arrow-right">'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 6
                }
            }
        });
        

        $('.venobox').venobox();
        $('.product-screenshots').find('br').remove();

    });

    //search popup
    $('a[href="#cbxpopupsearch"]').on('click', function (event) {
        event.preventDefault();

        $('#cbxpopupsearch').addClass('open');
        $('#cbxpopupsearch > form > input[type="text"]').focus();
        $(document.body).addClass('cbxpopupsearch-active');
    });

    $('#cbxpopupsearch').on('click', '.close', function (e) {
        e.preventDefault();

        $(document.body).removeClass('cbxpopupsearch-active');
        $('#cbxpopupsearch').removeClass('open');
    });
    //end search popup

}(jQuery));