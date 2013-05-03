<div class="entry-body">
    
    <div class="one_third">
    <div class="profile-photo-frame">
    <?php
	$post_thumb = get_post_thumbnail_id( $post->ID );
	$image_src = wp_get_attachment_image_src($post_thumb, 'full');
	$image = aq_resize( $image_src[0], 268, 268, true ); 
	?>
    <a href="<?php echo $image_src[0]; ?>" title="<?php printf( esc_attr__('%s, %s', 'sptheme'), the_title_attribute('echo=0'), sp_get_custom_field( 'sp_job_title', $post->ID ) ); ?>" rel="wp-prettyPhoto">
    <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
    </a>
    </div>
    </div>
    
    <div class="two_third last">
    <h2 class="profile-name"><?php the_title(); ?></h2>
    <p class="postmetadata"><?php echo sp_get_custom_field( 'sp_job_title', $post->ID ); ?></p>
    <?php the_content(); ?>
    </div>
    
    <a class="button" href="javascript: history.go(-1)"><?php _e('return to Our Team', 'sptheme'); ?></a>
    <div class="clear"></div>
    

</div><!-- end .entry-body -->