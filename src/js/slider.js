(function( $ ) {

    var slider = $('.stf-slider'),
    list = $('.stf-slider ul'),
    images = $('.stf-slider ul img'),
    prevBtn = $('.stf-slider .previous'),
    nextBtn = $('.stf-slider .next'),
    left = 0;

    // Remove arrows if no more than one image
    if(images.length === 1) {
        prevBtn.css({'display': 'none'});
        nextBtn.css({'display': 'none'});
    }

    // Adjust width of container after amount of images
    list.css({
        'width': 100 * images.length + '%'
    });

    // Adjust image size after amount of images
    images.css({
        'width': 100 / images.length + '%'
    });

    prevBtn.click(function() {
        if(left < 0) {
            left += 100;

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        } else {
            left = -(images.length * 100) + 100;

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        }
    });

    nextBtn.click(function() {
        if(left > -((images.length * 100) - 100)) {
            left -= 100;

            $('.stf-slider ul').css({
                'left': left + '%'
            });
        } else {
            left = 0;

            $('.stf-slider ul').css({
                'left': left
            });
        }
    });

} )( jQuery );