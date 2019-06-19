'use strict';
jQuery(document).ready(function () {
    jQuery('.vi-ui.tabular.menu .item').tab({
        history: true,
        historyType: 'hash'
    }).on('click', function () {
        if ((jQuery(this).html()) === 'General') {
            jQuery('.eu-cookies-bar-cookies-bar-wrap').fadeOut(500);
        } else {
            jQuery('.eu-cookies-bar-cookies-bar-wrap').fadeIn(500);
        }
    });

    /*Setup tab*/
    var tabs,
        tabEvent = false,
        initialTab = 'general',
        navSelector = '.vi-ui.menu',
        panelSelector = '.vi-ui.tab',
        panelFilter = function () {
            jQuery(panelSelector + ' a').filter(function () {
                return jQuery(navSelector + ' a[title=' + jQuery(this).attr('title') + ']').size() !== 0;
            }).each(function () {
                jQuery(this).attr('href', '#' + $(this).attr('title').replace(/ /g, '_'));
            });

        };

    // Initializes plugin features
    jQuery.address.strict(false).wrap(true);

    if (jQuery.address.value() === '') {
        jQuery.address.history(false).value(initialTab).history(true);
    }

    // Address handler
    jQuery.address.init(function () {

        // Adds the ID in a lazy manner to prevent scrolling
        jQuery(panelSelector).attr('id', initialTab);

        // Enables the plugin for all the content links
        jQuery(panelSelector + ' a').address(function () {
            // return navFilter(this);
        });

        panelFilter();

        // Tabs setup
        tabs = jQuery('.vi-ui.menu')
            .tab({
                history: true,
                historyType: 'hash'
            });

        // Enables the plugin for all the tabs
        jQuery(navSelector + ' a').click(function () {
            tabEvent = true;
            tabEvent = false;
            return false;
        });

    });

    function handleDropdown() {
        jQuery('.vi-ui.dropdown').not('#eu_cookies_bar_user_cookies_settings_bar_position').unbind().dropdown();
        jQuery('#eu_cookies_bar_user_cookies_settings_bar_position').dropdown({
            onChange: function (val) {
                console.log(val);
                switch (val) {
                    case 'hide':
                        jQuery('.eu-cookies-bar-cookies-settings-call-container').addClass('eu-cookies-bar-cookies-bar-button-hide');
                        break;
                    case 'left':
                        jQuery('.eu-cookies-bar-cookies-settings-call-container').removeClass('eu-cookies-bar-cookies-bar-button-hide').removeClass('eu-cookies-bar-cookies-settings-call-position-right').addClass('eu-cookies-bar-cookies-settings-call-position-left');
                        break;
                    case 'right':
                        jQuery('.eu-cookies-bar-cookies-settings-call-container').removeClass('eu-cookies-bar-cookies-bar-button-hide').removeClass('eu-cookies-bar-cookies-settings-call-position-left').addClass('eu-cookies-bar-cookies-settings-call-position-right');
                        break;

                }
            }
        })
    }

    handleDropdown();
    jQuery('.eu-cookies-bar-browser-mockup').on('click', function () {
        jQuery('.eu-cookies-bar-browser-mockup').removeClass('eu-cookies-bar-browser-mockup-selected');
        jQuery(this).addClass('eu-cookies-bar-browser-mockup-selected');
    });
    jQuery('input[name="eu_cookies_bar_cookies_bar_position"]').on('click', function () {
        jQuery('.eu-cookies-bar-browser-mockup').removeClass('eu-cookies-bar-browser-mockup-selected');
        jQuery(this).parent().parent().parent().find('.eu-cookies-bar-browser-mockup').addClass('eu-cookies-bar-browser-mockup-selected');
        switch (jQuery(this).val()) {
            case 'top':
                jQuery('.eu-cookies-bar-cookies-bar-wrap').removeClass('eu-cookies-bar-cookies-bar-position-bottom').removeClass('eu-cookies-bar-cookies-bar-position-bottom_left').removeClass('eu-cookies-bar-cookies-bar-position-bottom_right').addClass('eu-cookies-bar-cookies-bar-position-top');
                break;
            case 'bottom':
                jQuery('.eu-cookies-bar-cookies-bar-wrap').removeClass('eu-cookies-bar-cookies-bar-position-top').removeClass('eu-cookies-bar-cookies-bar-position-bottom_left').removeClass('eu-cookies-bar-cookies-bar-position-bottom_right').addClass('eu-cookies-bar-cookies-bar-position-bottom');
                break;
            case 'bottom_left':
                jQuery('.eu-cookies-bar-cookies-bar-wrap').removeClass('eu-cookies-bar-cookies-bar-position-top').removeClass('eu-cookies-bar-cookies-bar-position-bottom').removeClass('eu-cookies-bar-cookies-bar-position-bottom_right').addClass('eu-cookies-bar-cookies-bar-position-bottom_left');
                break;
            case 'bottom_right':
                jQuery('.eu-cookies-bar-cookies-bar-wrap').removeClass('eu-cookies-bar-cookies-bar-position-top').removeClass('eu-cookies-bar-cookies-bar-position-bottom_left').removeClass('eu-cookies-bar-cookies-bar-position-bottom').addClass('eu-cookies-bar-cookies-bar-position-bottom_right');
                break;
        }
    });
    jQuery('#eu_cookies_bar_cookies_bar_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'color': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });

    jQuery('#eu_cookies_bar_cookies_bar_bg_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'background': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });
    jQuery('#eu_cookies_bar_cookies_bar_button_accept_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-button-accept').css({'color': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });

    jQuery('#eu_cookies_bar_cookies_bar_button_accept_bg_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-button-accept').css({'background': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });
    jQuery('#eu_cookies_bar_cookies_bar_button_decline_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-button-decline').css({'color': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });

    jQuery('#eu_cookies_bar_cookies_bar_button_decline_bg_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-button-decline').css({'background': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });
    jQuery('#eu_cookies_bar_user_cookies_settings_heading_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-settings-header').css({'color': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });

    jQuery('#eu_cookies_bar_user_cookies_settings_heading_bg_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-settings-header').css({'background': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });
    jQuery('#eu_cookies_bar_user_cookies_settings_button_save_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-settings-save-button').css({'color': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });

    jQuery('#eu_cookies_bar_user_cookies_settings_button_save_bg_color').iris({
        change: function (event, ui) {
            jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            jQuery('.eu-cookies-bar-cookies-bar-settings-save-button').css({'background': ui.color.toString()})
        },
        hide: true,
        border: true
    }).on('click', function (e) {
        jQuery('.iris-picker').hide();
        jQuery(this).parent().find('.iris-picker').show();
        e.stopPropagation();
    });
    jQuery('body').on('click', function () {
        jQuery('.iris-picker').hide();
    });
//    cookies bar preview
    if (window.location.href.indexOf('#general') !== -1) {
        jQuery('.eu-cookies-bar-cookies-bar-wrap').fadeOut(500);
    }

    jQuery('#eu_cookies_bar_cookies_bar_font_size').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'font-size': jQuery(this).val() + 'px'})
    });
    jQuery('#eu_cookies_bar_cookies_bar_margin').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'margin': jQuery(this).val() + 'px'})
    });
    jQuery('#eu_cookies_bar_cookies_bar_padding').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'padding': jQuery(this).val() + 'px'})
    });
    jQuery('#eu_cookies_bar_cookies_bar_border_radius').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'border-radius': jQuery(this).val() + 'px'})
    });
    jQuery('#eu_cookies_bar_cookies_bar_opacity').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-wrap').css({'opacity': jQuery(this).val()})
    });
    jQuery('#eu_cookies_bar_cookies_bar_show_button_decline').on('change', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.eu-cookies-bar-cookies-bar-button-decline').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        } else {
            jQuery('.eu-cookies-bar-cookies-bar-button-decline').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        }
    });
    jQuery('#eu_cookies_bar_cookies_bar_show_button_accept').on('change', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.eu-cookies-bar-cookies-bar-button-accept').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        } else {
            jQuery('.eu-cookies-bar-cookies-bar-button-accept').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        }
    });
    jQuery('#eu_cookies_bar_cookies_bar_show_button_close').on('change', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.eu-cookies-bar-cookies-bar-button-close').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        } else {
            jQuery('.eu-cookies-bar-cookies-bar-button-close').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        }
    });
    jQuery('#eu_cookies_bar_user_cookies_settings_enable').on('change', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.eu-cookies-bar-cookies-bar-button-settings').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        } else {
            jQuery('.eu-cookies-bar-cookies-bar-button-settings').toggleClass('eu-cookies-bar-cookies-bar-button-hide');
        }
    });
    jQuery('#eu_cookies_bar_cookies_bar_message').on('input', function () {
        jQuery('.eu-cookies-bar-cookies-bar-message div').html(jQuery(this).val());
    });
//    button
    jQuery('#eu_cookies_bar_cookies_bar_button_accept_border_radius').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-button-accept').css({'border-radius': jQuery(this).val() + 'px'})
    });
    jQuery('#eu_cookies_bar_cookies_bar_button_decline_border_radius').on('change', function () {
        jQuery('.eu-cookies-bar-cookies-bar-button-decline').css({'border-radius': jQuery(this).val() + 'px'})
    });
    jQuery('#eu_cookies_bar_cookies_bar_button_accept_title').on('keyup', function () {
        jQuery('.eu-cookies-bar-cookies-bar-button-accept span').html(jQuery(this).val())
    });
    jQuery('#eu_cookies_bar_cookies_bar_button_decline_title').on('keyup', function () {
        jQuery('.eu-cookies-bar-cookies-bar-button-decline span').html(jQuery(this).val())
    });

//    cookies settings form
    function userCookiesSettingsTab() {
        jQuery('.eu-cookies-bar-cookies-bar-settings-nav div').on('click', function () {
            jQuery('.eu-cookies-bar-cookies-bar-settings-nav div').toggleClass('eu-cookies-bar-cookies-bar-settings-nav-active');
            jQuery('.eu-cookies-bar-cookies-bar-settings-content-child').toggleClass('eu-cookies-bar-cookies-bar-settings-content-child-inactive');
        })
    }

    userCookiesSettingsTab();
    jQuery('#eu_cookies_bar_user_cookies_settings_heading_title').on('keyup', function () {
        jQuery('.eu-cookies-bar-cookies-bar-settings-header-text').html(jQuery(this).val())
    });
});