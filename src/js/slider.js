(function($) {
    var slider = $('.stf-slider'),
    list = $('.stf-slider ul'),
    slides = $('.stf-slider ul .slide'),
    prevBtn = $('.stf-slider .previous'),
    nextBtn = $('.stf-slider .next'),
    index = 0,
    left = 0,
    delay = 8000;

    // Start timer
    var timer = setInterval(nextSlide, delay);    

    // Remove arrows if no more than one image
    if(slides.length === 1) {
        prevBtn.css({'display': 'none'});
        nextBtn.css({'display': 'none'});
    }

    // Adjust width of container after amount of slides
    list.css({ 'width': 100 * slides.length + '%' });

    // Adjust image size after amount of slides
    slides.css({ 'width': 100 / slides.length + '%' });

    // Add current class to first slide
    $(slides[index]).find('div').addClass('current');

    /* Add click listeners */
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
        $(slides[index]).find('div').removeClass('current');

        if(left < 0) {
            index--;
            left += 100;

            // Add current class to next slide
            $(slides[index]).find('div').addClass('current');

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        } else {
            index = slides.length -1;
            left = -(slides.length * 100) + 100;

            // Add current class to last slide
            $(slides[index]).find('div').addClass('current');

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        }
    }

    function nextSlide() {

        // Remove current class
        $(slides[index]).find('div').removeClass('current');

        if(left > -((slides.length * 100) - 100)) {
            index++;
            left -= 100;

            // Add current class to next slide
            $(slides[index]).find('div').addClass('current');

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        } else {
            index = 0;
            left = 0;

            // Add current class to last slide
            $(slides[index]).find('div').addClass('current');

            $('.stf-slider ul').css({
                'left': left
            });
        }
    }
})(jQuery);