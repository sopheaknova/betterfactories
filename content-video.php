
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
    <h1 class="title"><?php the_title(); ?></h1>
</a>
<div class="entry-meta">

    <?php echo sp_post_meta(); ?>

</div><!-- end .entry-meta -->

<div class="entry-body">
    
    <div class="entry-video">
	<?php 
	
		if( sp_get_custom_field( 'sp_video_mp4', $post->ID ) || sp_get_custom_field( 'sp_video_webm', $post->ID ) || sp_get_custom_field( 'sp_video_ogg', $post->ID ) ) {
	
			$shortcode = '[video';
	
				if( sp_get_custom_field( 'sp_video_mp4', $post->ID ) )
					$shortcode .= ' mp4="' . sp_get_custom_field( 'sp_video_mp4', $post->ID ) . '"';
	
				if( sp_get_custom_field( 'sp_video_webm', $post->ID ) )
					$shortcode .= ' webm="' . sp_get_custom_field( 'sp_video_webm', $post->ID ) . '"';
	
				if( sp_get_custom_field( 'sp_video_ogg', $post->ID ) )
					$shortcode .= ' ogg="' . sp_get_custom_field( 'sp_video_ogg', $post->ID ) . '"';
	
				if( sp_get_custom_field( 'sp_video_preview', $post->ID ) )
					$shortcode .= ' poster="' . sp_get_custom_field( 'sp_video_preview', $post->ID ) . '"';
	
				if( sp_get_custom_field( 'sp_video_aspect_ratio', $post->ID ) )
					$shortcode .= ' aspect_ratio="' . sp_get_custom_field( 'sp_video_aspect_ratio', $post->ID ) . '"';
	
			$shortcode .= ']';
	
			echo do_shortcode( $shortcode );
	
		} elseif( sp_get_custom_field( 'sp_video_external', $post->ID ) ) {
	
			echo do_shortcode( sp_get_custom_field( 'sp_video_external', $post->ID ) ); // work with files style.css, video-js.min.css, video-js.min.js, custom.js and video-js.swf
	
		}
		
		?>
	</div><!-- end .entry-video -->

	<?php echo sp_post_content(); ?>

</div><!-- end .entry-body -->