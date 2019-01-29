(function ($) {
    var
        header = $('.site-header'),
        scrollTop = $('html, body').scrollTop(),
        navbar = $('.main-navigation'),
        navHeight = navbar.height(),
        navTop = navbar.offset().top;

    // if (!isMobile()) {
        $(window).scroll(function () {

            scrollTop = $('html, body').scrollTop();

            /* Stick navbar */
            if (scrollTop > navTop) {
                navbar.addClass('stick');
                header.css({
                    'padding-bottom': navHeight
                });
            } else {
                navbar.removeClass('stick');
                header.css({
                    'padding-bottom': 0
                });
            }
        });
    // } else {
        header.css({
            'padding-bottom': navHeight
        });
    // }

    // Lazy load images
    $('.lazy').Lazy();

})(jQuery);

function isMobile() {
    if (/Mobi/.test(navigator.userAgent)) return true;
}
