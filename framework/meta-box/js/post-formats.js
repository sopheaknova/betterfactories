jQuery( document ).ready( function($) {

	var	$videoSettings = $('#post-video-settings').hide(),
		$audioSettings = $('#post-audio-settings').hide(),
		$linkSettings  = $('#post-link-settings').hide(), 
		$postdivrich   = $('#postdivrich'),
		$generalSettings  = $('#general-settings'), 
		$headingImage  = $('#heading-image'),
		$postFormat    = $('#post-formats-select input[name="post_format"]');
	
	$postFormat.each(function() {
		
		var $this = $(this);

		if( $this.is(':checked') )
			changePostFormat( $this.val() );

	});

	$postFormat.change(function() {

		changePostFormat( $(this).val() );

	});

	function changePostFormat( val ) {

		$videoSettings.hide();
		$audioSettings.hide();
		$linkSettings.hide();
		$postdivrich.show();
		$generalSettings.show();
		$headingImage.show();

		if( val === 'video' ) {

			$videoSettings.show();
			
		} else if( val === 'audio' ) {

			$audioSettings.show();
			
		} else if( val === 'link' ) {

			$linkSettings.show();
			$postdivrich.hide();
			$generalSettings.hide();
			$headingImage.hide();
			
		}

	}

});