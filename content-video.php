<div class="entry-body">
	<?php if(is_single()) { ?>
		<h1 class="title"><?php the_title(); ?></h1>
    <?php } else {?>
    	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		<h1 class="title"><?php the_title(); ?></h1>
	</a>
    <?php } ?>
    <div class="entry-meta">
    
        <?php echo sp_post_meta(); ?>
    
    </div><!-- end .entry-meta -->

    
    <div class="entry-video">
	<?php 
		if( sp_get_custom_field( 'sp_video_external', $post->ID ) ) {
			echo do_shortcode( sp_get_custom_field( 'sp_video_external', $post->ID ) ); // work with files style.css, video-js.min.css, video-js.min.js, custom.js and video-js.swf
		}
		
		?>
	</div><!-- end .entry-video -->

	<?php echo sp_post_content(); ?>

</div><!-- end .entry-body -->