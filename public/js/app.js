// FUNCTION CLICK ON MENU  (REPONSIVE)

$(document).ready(function () {
    $(".menu-icon").on("click", function () {
        $("nav ul").toggleClass("showing");
    });
});

// SCROLLING EFFECT WHEN SCROLL DOWN 

$(window).on("scroll", function () {
    if ($(window).scrollTop() > 150) {
        $('nav').addClass('black');
    }

    else {
        $('nav').removeClass('black');
    }
})