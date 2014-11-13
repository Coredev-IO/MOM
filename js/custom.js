/*Theme    : Quick
 * Author  : Design_mylife
 * Version : V1.0
 * 
 */

/* ==============================================
 Sticky Navbar
 =============================================== */

$(document).ready(function() {
    $(".navbar").sticky({topSpacing: 0});
});



/* ==============================================
 main flex slider
 =============================================== */
$(window).load(function() {
    $('.main-flex-slider').flexslider({
        slideshowSpeed: 5000,
        directionNav: false,
        animation: "fade",
        controlNav: false
    });
});


/* ==============================================
 Auto Close Responsive Navbar on Click
 =============================================== */

function close_toggle() {
    if ($(window).width() <= 768) {
        $('.navbar-collapse a').on('click', function() {
            $('.navbar-collapse').collapse('hide');
        });
    }
    else {
        $('.navbar .navbar-default a').off('click');
    }
}
close_toggle();

$(window).resize(close_toggle);



/* ==============================================
 Smooth Scroll To Anchor
 =============================================== */

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('.navbar a,.btn,.to-top').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 50
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

//owl carousel for testimonials
$(document).ready(function() {

    $("#testi-carousel,#work-slide").owlCarousel({
        // Most important owl features
        items: 1,
        itemsCustom: false,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        startDragging: true,
        autoPlay: true
    });

});

/*=========================*/
/*========portfolio mix====*/
/*==========================*/
$('#grid').mixitup();


/*=========================*/
/*========on hover dropdown navigation====*/
/*==========================*/


/************parallax*********************/
$(function() {
    $.stellar({
        horizontalScrolling: false
    });
});


/* ==============================================
 Counter Up
 =============================================== */
jQuery(document).ready(function($) {
    $('.counter').counterUp({
        delay: 100,
        time: 800
    });
});

/* ==============================================
 WOW plugin triggers animate.css on scroll
 =============================================== */

var wow = new WOW(
        {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 100, // distance to the element when triggering the animation (default is 0)
            mobile: false        // trigger animations on mobile devices (true is default)
        }
);
wow.init();


//MAGNIFIC POPUP
$('.show-image').magnificPopup({type: 'image'});

$(function() {
$('.knob').knob();
});
		