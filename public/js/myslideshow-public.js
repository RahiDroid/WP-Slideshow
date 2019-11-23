(function( $ ) {
	'use strict';

	var current = 0;
	var num_of_slides = 0;

	$(function() {
		
		var slides = $('#slides-container .slide');
		num_of_slides = slides.length;

		$('#slides-container .slide').eq(current).css('transform-origin', 'left');
		slides.eq(0).css('transform', 'scaleX(1)');

		// setting listeners for arrow
		$('#slides-container .arrow.left').on('click', previousSlide);
		$('#slides-container .arrow.right').on('click', nextSlide);
	
		// setting the interval
		var intervalId = setInterval(nextSlide, 3000);

		// stop if hovering
		$('#slides-container').hover(function() {
			clearInterval(intervalId);
		}, function() {
			if( num_of_slides > 1 ) {
				intervalId = setInterval(nextSlide, 3000);
			}
		});
	});

	// shows next slide
	function nextSlide() {

		$('#slides-container .slide').eq(current).css('transform-origin', 'right');
		$('#slides-container .slide').eq(current).css('transform', 'scaleX(0)');
		
		current++;

		if ( current >= num_of_slides ) {
			current = 0;
		}

		$('#slides-container .slide').eq(current).css('transform-origin', 'left');
		$('#slides-container .slide').eq(current).css('transform', 'scaleX(1)');
	}

	// shows previous slide
	function previousSlide() {

		$('#slides-container .slide').eq(current).css('transform-origin', 'left');
		$('#slides-container .slide').eq(current).css('transform', 'scaleX(0)');
		
		current--;

		if ( current < 0 ) {
			current = num_of_slides-1;
		}

		$('#slides-container .slide').eq(current).css('transform-origin', 'right');
		$('#slides-container .slide').eq(current).css('transform', 'scaleX(1)');
	}


})( jQuery );
