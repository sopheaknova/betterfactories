<div class="entry-body">
	
    <div class="entry-audio">
	
    <?php
	
	if( sp_get_custom_field( 'sp_audio_mp3', $post->ID ) || sp_get_custom_field( 'sp_audio_ogg', $post->ID ) ) {

		$shortcode = '[audio';

			if( sp_get_custom_field( 'sp_audio_mp3', $post->ID ) )
				$shortcode .= ' mp3="' . sp_get_custom_field( 'sp_audio_mp3', $post->ID ) . '"';

			if( sp_get_custom_field( 'sp_audio_ogg', $post->ID ) )
				$shortcode .= ' ogg="' . sp_get_custom_field( 'sp_audio_ogg', $post->ID ) . '"';

		$shortcode .= ']';

		echo do_shortcode( $shortcode );

	} elseif( sp_get_custom_field( 'sp_audio_external', $post->ID ) ) {

		echo do_shortcode( sp_get_custom_field( 'sp_audio_external', $post->ID ) );

	}
	
	?>
	
	</div><!-- end .entry-audio -->
	
    <div class="entry-meta">

		<?php echo sp_post_meta(); ?>
    
    </div><!-- end .entry-meta -->

	<?php echo sp_post_content(); ?>

</div><!-- end .entry-body -->