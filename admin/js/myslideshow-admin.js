(function( $ ) {
	'use strict';

	$(function() {
		$('#add-image').click(function(e) {
			e.preventDefault();

			var custom_uploader = wp.media({
				title: 'Select Image to Upload',
				library: { 
					type: 'image' // limits the frame to show only images
				},
				button: {
					text: 'Upload Image',
				},
				selection: {
					length: '10'
				},
				multiple: true  // Set this to true to allow multiple files to be selected
			})
			.on('select', function() {
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				$('#images-container').append('<div class="image sortable" style="background-image: url(' + attachment.url + ');">' + 
				'<div class="delete-image">' + 
					'<span class="dashicons dashicons-trash"></span>' + 
				'</div>' +
				'</div>');
				
			}).open();
			
			console.log(custom_uploader);

		});
	});

	// save changes
	$(function() {
		$('#btn-save').click(function() {

			var number_of_images = 0;
			var urls = ''; // each image urls appended with ';'

			// go through all 'sortable' images and get their image urls
			$('.sortable').each(function() {
				var url = $(this).css('background-image').replace(/(?:^url\(["']?|["']?\)$)/g, "");
				urls += url + ';';
				number_of_images++;
			});

			// create two input fields for storing options in options.php
			$('#images-container').append('<input type="hidden" id="mss_settings[image_urls]" name="mss_settings[image_urls]" value="' + urls + '"/>' +
				'<input type="hidden" id="mss_settings[images_number]" name="mss_settings[images_number]" value="' + number_of_images + '"/>');

			// submit the form
			$('#settings_form').submit();

		});
	});

	// make the 'add-image' block un-sortable
	$(function() {
		$('#images-container').sortable();
		$('#images-container').sortable({
			cancel: ".disable-sort-item"
	   });
	});

	// delete-image functionality
	$(function() {
		$('.delete-image').click( function() {
			$(this).parent().remove();
		});
	});

})( jQuery );
