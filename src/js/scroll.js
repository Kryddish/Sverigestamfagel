(function( $ ) {
    var header = $('header'),
        scrollTop = $('html, body').scrollTop(),
        navbar = $('.main-navigation'),
        navHeight = navbar.height(),
        navTop = navbar.offset().top;

    $(window).scroll(function() {

        scrollTop = $('html, body').scrollTop();
        
        /* Stick navbar */
        setTimeout(function() {
            
            if(scrollTop > navTop) {
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
        }, 20);
    });
})( jQuery );