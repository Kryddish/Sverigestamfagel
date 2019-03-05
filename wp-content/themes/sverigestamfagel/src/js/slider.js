(function($) {
    var slider = $('.stf-slider'),
    list = $('.stf-slider ul'),
    slides = $('.stf-slider ul .slide'),
    prevBtn = $('.stf-slider .previous'),
    nextBtn = $('.stf-slider .next'),
    index = 0,
    left = 0,
    delay = 8 * 1000; // Time in milliseconds

    // Start timer
    var timer = setInterval(nextSlide, delay);

    // Remove arrows if no more than one image
    if(slides.length === 1) {
        prevBtn.css({'display': 'none'});
        nextBtn.css({'display': 'none'});
    }

    // Calculate width of container
    list.css({ 'width': 100 * slides.length + '%' });

    // Calculate image width
    slides.css({ 'width': 100 / slides.length + '%' });

    // Add class to first slide
    $(slides[index]).addClass('current');

    /* Add event listeners */
    prevBtn.click(function() {
        prevSlide();
        clearInterval(timer);
        timer = setInterval(nextSlide, delay);
    });
    nextBtn.click(function() {
        nextSlide();
        clearInterval(timer);
        timer = setInterval(nextSlide, delay);
    });

    /* Functions */

    function prevSlide() {

        // Remove current class
        $(slides[index]).removeClass('current');

        if(left < 0) {
            index--;
            left += 100;

            // Add current class to next slide
            $(slides[index]).addClass('current');

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        } else {
            index = slides.length -1;
            left = -(slides.length * 100) + 100;

            // Add current class to last slide
            $(slides[index]).addClass('current');

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        }
    }

    function nextSlide() {

        // Remove current class
        $(slides[index]).removeClass('current');

        if(left > -((slides.length * 100) - 100)) {
            index++;
            left -= 100;

            // Add current class to next slide
            $(slides[index]).addClass('current');

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        } else {
            index = 0;
            left = 0;

            // Add current class to last slide
            $(slides[index]).addClass('current');

            $('.stf-slider ul').css({
                'left': left
            });
        }
    }
})(jQuery);
