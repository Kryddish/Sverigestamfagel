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

    $('.bli-medlem .next-slide').click(function() {
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

    nav.find('div').click(function() {

        if(index < $(this).index()) {
            $(this).removeClass('active');
            navigate($(this).index());
        }
        if(index > $(this).index()) {
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
    }

    function nextSlide() {

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

        if(left > -((slides.length * 100) - 100)) {
            

            

            

            
        }
    }
})(jQuery);