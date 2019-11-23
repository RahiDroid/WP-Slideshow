(function ($) {
	'use strict';

	class SlideShow {

		constructor(context) {
			// initialize variables
			this.intervalId;
			this.current = 0;
			this.slides = context.find('.slide');
			this.indicators = context.find('.indicators li');
			this.num_of_slides = this.slides.length;

			// display first slide on start
			this.toggleActive(this.indicators.eq(this.current));
			this.slides.eq(this.current).css('transform-origin', 'left');
			this.slides.eq(0).css('transform', 'scaleX(1)');
		}
		
		/**
		 * function: nextSlide
		 * Shows the next image slide on arrow click
		 * 
		 * @since 1.0.3
		 * @param args contains the object on which the operation is to be done 
		 */
		nextSlide(object) {
			
			var slides = object.slides;
			var indicators = object.indicators;
			var num_of_slides = object.num_of_slides; 
			// cant store current because it has to be changed everytime
			
			object.toggleActive(indicators.eq(object.current));
			slides.eq(object.current).css('transform-origin', 'right');
			slides.eq(object.current).css('transform', 'scaleX(0)');
			
			object.current++;
			
			if (object.current >= num_of_slides) {
				object.current = 0;
			}
			
			object.toggleActive(indicators.eq(object.current));
			slides.eq(object.current).css('transform-origin', 'left');
			slides.eq(object.current).css('transform', 'scaleX(1)');
		}
		
		/**
		 * function: nextSlideHelper
		 * this function is required because the arguments passed through the interval
		 * function and a listener are different. This function implicitly calls the
		 * original nextSlide function after extracting the object from the args.
		 * 
		 * @since 1.0.3
		 * @param args contains the object on which the operation is to be done
		 */
		nextSlideHelper(args) {
			var object = args.data.object;
			object.nextSlide(object);
		}

		/**
		 * function: previousSlide
		 * Shows the previous image slide on arrow click
		 * 
		 * @since 1.0.3
		 * @param args contains the object on which the operation is to be done 
		 */
		previousSlide( args ) {

			var object = args.data.object;
			var slides = object.slides;
			var indicators = object.indicators;
			var num_of_slides = object.num_of_slides;
			// cant store current because it has to be changed everytime

			object.toggleActive(indicators.eq(object.current));
			slides.eq(object.current).css('transform-origin', 'left');
			slides.eq(object.current).css('transform', 'scaleX(0)');

			object.current--;

			if (object.current < 0) {
				object.current = num_of_slides - 1;
			}

			object.toggleActive(indicators.eq(object.current));
			slides.eq(object.current).css('transform-origin', 'right');
			slides.eq(object.current).css('transform', 'scaleX(1)');
		}

		/**
		 * function: nextSlide
		 * toggles the active class on the bottom slide indicators
		 * 
		 * @since 1.0.3
		 * @param indicator contains the object on which the operation is to be done 
		 */
		toggleActive(indicator) {
			indicator.toggleClass('active');
		}
	};

	/**
	 * create SlideShow objects for every container
	 */
	$(function () {
		// bind slideshows for each container on page
		$('.mss-slides-container').each(bindSlideShow);
	});

	// core slideshow mechanism
	function bindSlideShow() {
		var slideShow = new SlideShow($(this));

		// setting listeners for arrows
		$(this).find('.arrow.left').on('click', {object: slideShow }, slideShow.previousSlide);
		$(this).find('.arrow.right').on('click', { object: slideShow }, slideShow.nextSlideHelper);

		// setting the interval
		slideShow.intervalId = setInterval(slideShow.nextSlide, 5000, slideShow);

		// stop if hovering
		$(this).hover(function () {
			clearInterval(slideShow.intervalId);
		}, function () {
			if (slideShow.num_of_slides > 1) {
				slideShow.intervalId = setInterval(slideShow.nextSlide, 5000, slideShow);
			}
		});

	}


})(jQuery);
