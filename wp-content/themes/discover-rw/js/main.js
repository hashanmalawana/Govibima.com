"use strict";

jQuery(document).ready(function ($) {

    // Search Button on Header
    $('.h-search').on('click', '#h-search-btn', function () {
        if ($('body').hasClass('search-show')) {
            $('body').removeClass('search-show');
        } else {
            $('body').addClass('search-show');
            return false;
        }
    });
    // Search Close on Header
    $('.h-search').on('click', '#h-search-close', function () {
        if ($('body').hasClass('search-show')) {
            $('body').removeClass('search-show');
        }
        return false;
    });
    $('html').on('click', 'body.search-show', function () {
        $('body').removeClass('search-show');
    });
    $('body').on('click', '.h-search', function(event){
        event.stopPropagation();
    });

    // Top Menu - Toggle Button
    $('.header-wrap').on('click', '#menu-btn', function () {
        if ($('body').hasClass('menu-opened')) {
            $('body').removeClass('menu-opened');
        } else {
            $('body').addClass('menu-opened');
            var window_height = $(window).height();
            var items_count = $('#mainmenu > ul > li').length;
            var items_height = Math.max((window_height-200)/items_count, 45);
            var items_height = Math.min(items_height, 85);
            $('#mainmenu > ul > li > a').each(function () {
                var item_height = $(this).height();
                var item_margin = items_height - item_height;
                $(this).css('padding-top', Math.round(item_margin/2));
                $(this).css('padding-bottom', Math.round(item_margin/2));
            });
        }
        return false;
    });
    $('body').on('click', '#mainmenu-close', function () {
        $('body').removeClass('menu-opened');
    });
    $('html').on('click', 'body.menu-opened', function () {
        $('body').removeClass('menu-opened');
    });
    $('body').on('click', '#mainmenu', function(event){
        event.stopPropagation();
    });


    // Top Menu Links - Equilize Height
    var has_children = $('#mainmenu > ul > li.menu-item-has-children');
    if ($(window).width() > 751) { // 768
        $('#mainmenu > ul > li.menu-item-has-children')
            .on( "mouseenter", function() {
                var window_height = $(window).height();
                var sub_items_count = $(this).find('> ul > li').length;
                var sub_items_height = Math.max((window_height-100)/sub_items_count, 40);
                sub_items_height = Math.min(sub_items_height, 85);

                $(this).find('> ul').fadeIn(200);

                $(this).find('> ul > li').each(function () {
                    var item_height = $(this).height();
                    var item_margin = sub_items_height - item_height;
                    $(this).css('margin-bottom', Math.round(item_margin));
                });
            })
            .on( "mouseleave", function() {
                $(this).find('> ul').fadeOut(200);
            });
    }
    $(window).resize(function () {
        if ($(window).width() > 751) { // 768
            $('#mainmenu > ul > li.menu-item-has-children')
                .on( "mouseenter", function() {
                    var window_height = $(window).height();
                    var sub_items_count = $(this).find('> ul > li').length;
                    var sub_items_height = Math.max((window_height-100)/sub_items_count, 40);
                    sub_items_height = Math.min(sub_items_height, 85);

                    $(this).find('> ul > li').each(function () {
                        var item_height = $(this).height();
                        var item_margin = sub_items_height - item_height;
                        $(this).css('margin-bottom', Math.round(item_margin));
                    });

                    $(this).find('> ul').fadeIn(200);
                })
                .on( "mouseleave", function() {
                    $(this).find('> ul').fadeOut(200);
                });
        } else {
            $('#mainmenu > ul > li.menu-item-has-children').off("mouseenter");
            $('#mainmenu > ul > li.menu-item-has-children').off("mouseleave");
        }
    });
    $('#mainmenu > ul li.menu-item-has-children > a').each(function () {
        $(this).append('<i class="fa fa-angle-down"></i>');
    });
    $('#mainmenu > ul li.menu-item-has-children > a > .fa').on('click', function () {
        if ($(this).parent().parent().hasClass('opened')) {
            $(this).parent().parent().removeClass('opened');
            $(this).parent().next('ul').slideUp();
        } else {
            $(this).parent().next('ul').slideDown();
            $(this).parent().parent().addClass('opened');
        }
        return false;
    });


    // Sticky Sidebar
    if ($('.sidebar-sticky').length > 0 && $('.content-sticky').length > 0) {
        $('.sidebar-sticky, .content-sticky').theiaStickySidebar({
            additionalMarginTop: 30
        });
    }


});


(function($) {
    jQuery(window).load(function(){

        // Masonry Posts
        if ($('#post-list').length > 0) {
            var $grid = $('#post-list').masonry({
                itemSelector: '.post-i',
                layoutMode: 'masonry'
            });
            if ($('#posts-sections').length > 0) {
                $('#posts-sections').on('click', 'a', function () {
                    var filterValue = $(this).attr('data-section');
                    $grid.masonry({filter: filterValue});
                });
                $('#posts-sections').each( function( i, buttonGroup ) {
                    var $buttonGroup = $( buttonGroup );
                    $buttonGroup.on('click', 'a', function() {
                        $buttonGroup.find('.active').removeClass('active');
                        $( this ).parent().addClass('active');
                        return false;
                    });
                });
            }
        }


        // More button for Sections
        if ($('.fr-posts-sections').length > 0) {
            if ($(window).width() > 975) {
                var menu_sections = $('.fr-posts-sections');
                var menu_width = menu_sections.width();
                var menu_items_width = 0;
                menu_sections.find('> li').each(function () {
                    if (!$(this).hasClass('fr-posts-sections-more')) {
                        menu_items_width = menu_items_width + ($(this).outerWidth(true) + 4);
                        if (menu_width < menu_items_width) {
                            $(this).addClass('fr-posts-sections-other');
                            $(this).appendTo('.fr-posts-sections-sub');
                        } else if ($(this).hasClass('fr-posts-sections-other')) {
                            $(this).removeClass('fr-posts-sections-other');
                            $(this).prependTo('.fr-posts-sections-sub');
                        }
                    }
                });
                if (menu_width < menu_items_width) {
                    $('.fr-posts-sections-more').show();
                    $('.fr-posts-sections').addClass('padding-right');
                }
            }

            $('.fr-posts-sections').addClass('sections-show');

            $(window).resize(function() {
                var menu_sections = $('.fr-posts-sections');
                var menu_width = menu_sections.width();
                var menu_items_width = 0;
                if ($(window).width() > 975) {
                    menu_sections.find('> li').each(function () {
                        menu_items_width = menu_items_width + ($(this).outerWidth(true) + 4);
                        if (!$(this).hasClass('fr-posts-sections-more')) {
                            if (menu_width < menu_items_width) {
                                $(this).addClass('fr-posts-sections-other');
                                $(this).appendTo('.fr-posts-sections-sub');
                            } else if ($(this).hasClass('fr-posts-sections-other')) {
                                $(this).removeClass('fr-posts-sections-other');
                                $(this).prependTo('.fr-posts-sections-sub');
                            }
                        }
                    });
                    if (menu_width < menu_items_width) {
                        $('.fr-posts-sections-more').show();
                        $('.fr-posts-sections').addClass('padding-right');
                    }
                } else {
                    menu_sections.find('li.fr-posts-sections-other').insertBefore('.fr-posts-sections-more');
                    menu_sections.find('li.fr-posts-sections-other').removeClass('fr-posts-sections-other');
                }
            });

        }




    });
})(jQuery);


