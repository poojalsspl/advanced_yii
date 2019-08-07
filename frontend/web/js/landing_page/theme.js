// -----------------------------

//   js index
/* =================== */
/*  
    

    

*/
// -----------------------------


(function($) {
    "use strict";



    /*---------------------
    preloader
    --------------------- */

    $(window).on('load', function() {
        $('#preloader').delay(1000).fadeOut('slow', function() { $(this).remove(); });
    });

    //=========================
    //  Active current menu while scrolling
    //=========================

    //ACTIVE CURRENT MENU WHILE SCROLLING

    $(window).on("scroll", function() {

        activeMenuItem($(".nav-menu"));

    });

    // function for active menuitem
    function activeMenuItem($links) {
        var top = $(window).scrollTop(),
            windowHeight = $(window).height(),
            documentHeight = $(document).height(),
            cur_pos = top + 2,
            sections = $("section"),
            nav = $links,
            nav_height = nav.outerHeight(),
            home = nav.find(" > ul > li:first");


        sections.each(function() {
            var top = $(this).offset().top - nav_height - 40,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find("> ul > li > a").parent().removeClass("active");
                nav.find("a[href='#" + $(this).attr('id') + "']").parent().addClass("active");
            } else if (cur_pos === 2) {
                nav.find("> ul > li > a").parent().removeClass("active");
                home.addClass("active");
            } else if ($(window).scrollTop() + windowHeight > documentHeight - 400) {
                nav.find("> ul > li > a").parent().removeClass("active");
            }
        });
    }

    //=========================
    // Smoth Scroll
    //=========================

    function smoothScrolling($links, $topGap) {
        var links = $links;
        var topGap = $topGap;

        links.on("click", function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
                if (target.length) {
                    $("html, body").animate({
                        scrollTop: target.offset().top - topGap
                    }, 1000, "easeInOutExpo");
                    return false;
                }
            }
            return false;
        });
    }

    $(window).on("load", function() {
        smoothScrolling($(".main-menu > nav > ul > li > a[href^='#']"), 70);
    });

    //=========================
    // Slick Nav Activation
    //=========================
    $('.nav-menu > ul').slicknav({
        'prependTo': '.mobile_menu'
    });

    /*---------------------
    screen slider
    --------------------- */
    function screen_slider() {
        var owl = $(".screen-slider");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            navigation: false,
            items: 5,
            smartSpeed: 1000,
            dots: true,
            autoplay: true,
            center: true,
            autoplayTimeout: 2000,
            dotsEach: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 3
                },
                760: {
                    items: 3
                },
                1080: {
                    items: 5
                },
                1920: {
                    items: 5
                }
            }
        });
    }
    screen_slider();

   
    
    $('.counter').counterUp({
        delay: 100,
        time: 2000
    });

    


}(jQuery));