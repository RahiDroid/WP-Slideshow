(function( $ ) {
	'use strict';

	$(function() {
		$('.add-image').click(function(e) {
			e.preventDefault();

			var custom_uploader = wp.media({
				title: 'Select Image to Upload',
				button: {
					text: 'Upload Image'
				},
				multiple: false  // Set this to true to allow multiple files to be selected
			})
			.on('select', function() {
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				$('.images-container').append('<div class="image sortable" style="background-image: url(' + attachment.url + ');">' + 
				'<div class="delete-image">' + 
					'<span class="dashicons dashicons-trash"></span>' + 
				'</div>' +
			'</div>');
			})
			.open();
		});
	});

	// 
	$(function() {
		$('#btn-save').click(function(e) {

			var number_of_images = 0;
			var urls = ''; // all image urls appended with ';'

			// go through all 'sortable' images and get their image urls
			$('.sortable').each(function() {
				var url = $(this).css('background-image').replace(/(?:^url\(["']?|["']?\)$)/g, "");
				urls += url + ';';
				number_of_images++;
			});

			// create two input fields for storing options in options.php
			$('.images-container').append('<input type="hidden" id="mss_settings[image_urls]" name="mss_settings[image_urls]" value="' + urls + '"/>' +
				'<input type="hidden" id="mss_settings[images_number]" name="mss_settings[images_number]" value="' + number_of_images + '"/>');

			// submit the form
			$('#settings_form').submit();

		});
	});

	// make the 'add-image' block un-sortable
	$(function() {
		$('.images-container').sortable();
		$('.images-container').sortable({
			cancel: ".disable-sort-item"
	   });
	});

	// delete-image functionality
	$(function() {
		$('.delete-image').click( function() {
			$(this).parent().remove();
		});
	});

	/**
	 * All of the code for your admin-facing JavaScript source
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
