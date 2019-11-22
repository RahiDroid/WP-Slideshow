(function( $ ) {
	'use strict';

	var current = 0;
	var num_of_slides = 0;

	$(function() {
		
		var slides = $('#slides-container .slide');
		num_of_slides = slides.length;

		reset();

		slides.eq(0).css('display', 'block');
		// slides.eq(0).css('transform', 'scaleX(1)');
	
		if( num_of_slides > 1 ) {
			setInterval(nextSlide, 3000);
		}
	});

	function reset() {
		
		$('#slides-container .slide').each(function() {
			$(this).css('display', 'none');
			// $(this).css('transform', 'scaleX(0)');
		});
	}

	function nextSlide() {

		$('.slide').eq(current).css('display', 'none');
		// $('.slide').eq(current).css('transform', 'scaleX(0)');
		
		current++;

		if ( current >= num_of_slides ) {
			current = 0;
		}

		$('#slides-container .slide').eq(current).css('display', 'block');
		// $('#slides-container .slide').eq(current).css('transform', 'scaleX(1)');
	}


	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );
