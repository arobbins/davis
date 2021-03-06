/* global wpseoMediaL10n */
/* global ajaxurl */
/* global wp */
/* jshint -W097 */
/* jshint -W003 */
/* jshint unused:false */
'use strict';
// Taken and adapted from http://www.webmaster-source.com/2013/02/06/using-the-wordpress-3-5-media-uploader-in-your-plugin-or-theme/
jQuery(document).ready(
	function($) {
		$('.wpseo_image_upload_button').each(function(index, element) {
			var wpseo_target_id = $(element).attr('id').replace(/_button$/, '');
			var wpseo_custom_uploader = wp.media.frames.file_frame = wp.media({
				title: wpseoMediaL10n.choose_image,
				button: { text: wpseoMediaL10n.choose_image },
				multiple: false
			});

			wpseo_custom_uploader.on( 'select', function() {
					var attachment = wpseo_custom_uploader.state().get( 'selection' ).first().toJSON();
					$( '#' + wpseo_target_id ).val( attachment.url );
				}
			);

			$(element).click( function( e ) {
				e.preventDefault();
				wpseo_custom_uploader.open();
			} );
		} );
	}
);
