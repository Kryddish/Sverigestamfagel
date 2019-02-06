(function($){

	$(window).scroll(function () {
		$('.lazy').each(function(index, image) {
			if($(image).visible()) {
				setTimeout(lazyLoad(image), 1000);
			}
		});
	});

	function lazyLoad(image) {
		var imageUrl = image.getAttribute('data-src');

		// change the src of the content image to load the new high res photo
		image.src = imageUrl;

		// listen for load event when the new photo is finished loading
		image.addEventListener('load', function() {
			// swap out the visible background image with the new fully downloaded photo
			image.style.backgroundImage = 'url(' + imageUrl + ')';
			// add a class to remove the blur filter to smoothly transition the image change
			image.className = image.className + ' is-loaded';
		});

	}

})(jQuery);
