(function($) {
    var
    slider  =   $('.onboard-slider'),
    list    =   $('.onboard-slider .holder'),
    slides  =   $('.onboard-slider .slide'),
    nav     =   $('.bli-medlem .slide-navigation'),
    index   =   0,
    left    =   0;

    // Calculate width of container
    list.css({ 'width': 100 * slides.length + '%' });

    // Calculate image width
    slides.css({ 'width': 100 / slides.length + '%' });

    // Add class to first slide
    $(slides[index]).addClass('current');

    // Submit contact form
    $('.wpcf7').on('wpcf7mailsent', function() {
        nextSlide();
    });

    // Previous buttons
    $('.buttons .previous').click(function() {
        if(index > 0) {
            prevSlide();
        }
    });

    // Next buttons
    $('.bli-medlem .begin').click(function() {
        if(slides.length-1 > index) {
            nextSlide();
        }
    });

    var slideIndex = 0;
    slides.map(function(slide) {
        if(slideIndex === 0) {
            nav.append('<div class="active"></div>');
        } else {
            nav.append('<div></div>');
        }
        slideIndex++;
    });

    nav.find('div:not(:last-child)').click(function() {

        if( index < $(this).index() ) {
            $(this).removeClass('active');
            navigate($(this).index());
        }
        if( index > $(this).index() ) {
            $(this).removeClass('active');
            navigate($(this).index());
        }
    });

    function prevSlide() {

        // Remove current class
        $(slides[index]).removeClass('current');
        $(document.querySelectorAll('.bli-medlem .slide-navigation div')[index]).removeClass('active');

        if(left < 0) {
            index--;
            left += 100;

            // Add current class to next slide
            $(slides[index]).addClass('current');

            list.css({
                'left': left + '%'
            });

            $(document.querySelectorAll('.bli-medlem .slide-navigation div')[index]).addClass('active');
        }

        changeElements();
    }

    function nextSlide() {

        // Scroll to the top
        $("html, body").animate({ scrollTop: 0 });

        // Remove current class
        $(slides[index]).removeClass('current');
        $(document.querySelectorAll('.bli-medlem .slide-navigation div')[index]).removeClass('active');

        if(left > -((slides.length * 100) - 100)) {
            index++;
            left -= 100;

            // Add current class to next slide
            $(slides[index]).addClass('current');

            list.css({
                'left': left + '%'
            });

            $(document.querySelectorAll('.bli-medlem .slide-navigation div')[index]).addClass('active');
        }

        changeElements();
    }

    function navigate(i) {
        $(document.querySelectorAll('.bli-medlem .slide-navigation div')[index]).removeClass('active');

        index = i;
        left = index * -100;

        // Remove current class
        $(slides[index]).removeClass('current');

        // Add current class to next slide
        $(slides[index]).addClass('current');

        list.css({
            'left': left + '%'
        });

        $(document.querySelectorAll('.bli-medlem .slide-navigation div')[index]).addClass('active');

        changeElements();
    }

    function changeElements() {

        // First slide
        if(index === 0) {
            $('.previous').fadeOut();
            $('.container h4:nth-of-type(2)').fadeOut();

            setTimeout(function() {
                $('.buttons .begin').fadeIn();
                $('.container h4:nth-of-type(1)').fadeIn();
            }, 400);
        } else {

            // Middle slide
            if(index != slides.length-1) {
                $('.buttons .begin').fadeOut();
                $('.container h4:nth-of-type(1)').fadeOut();

                setTimeout(function() {
                    $('.container h4:nth-of-type(2)').fadeIn();
                    $('.previous').fadeIn();
                }, 400);
            }

            // Last slide
            else {
                nav.fadeOut();
                $('.container h4:nth-of-type(2)').fadeOut();
                $('.buttons .previous').fadeOut();

                setTimeout(function() {
                    $('.container h4:nth-of-type(3)').fadeIn();
                }, 400);
            }
        }
    }
})(jQuery);
