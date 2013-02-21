<?php
/*
Template Name: Teams Page
*/
?>
<?php get_header(); ?>

<section id="content" class="clearfix ">
	<div class="container">
    <div class="entry-body">
    <h2><?php the_title(); ?></h2>
    <?php while(have_posts()) : the_post(); 	
			the_content();
    	 endwhile; 
    ?>
    
    <?php
    	// Featured staff
		$staff_query = array ('post_type' => 'staff', 'meta_key' => 'sp_staff_slide', 'meta_value' => 1, 'posts_per_page' => 5);
        
        query_posts($staff_query);
        
        if (have_posts()) : 
    ?>  
    
    <h2><?php _e('Featured staff', 'sptheme'); ?></h2>
    <div id="featured-staff">   
    
    <?php while(have_posts()) : the_post(); ?>
    <?php
	$post_thumb = get_post_thumbnail_id( $post->ID );
	$image_src = wp_get_attachment_image_src($post_thumb, 'full');
	$image = aq_resize( $image_src[0], 259, 195, true ); 
	?>
    
    <article class="staff-slide">
        <div class="one_third">
            <div class="profile-photo-frame">
            <?php if ($image) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
            <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
            </a>
            <?php else:	?>
        	<?php _e('This post have no photo', 'sptheme') ?>
        	<?php endif; ?>
            </div>
        </div>
        <div class="two_third last">
            <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <p class="postmetadata"><?php echo sp_get_custom_field( 'sp_job_title', $post->ID ); ?></p>
            <p><?php echo sp_excerpt_length(50); ?></p>
            <a class="learn-more button" href="<?php the_permalink(); ?>"><?php _e('View detail', 'sptheme'); ?></a>
        </div>
        <div class="clear"></div>
    </article>            
    
    <?php		
            endwhile; 
    ?>
    <div class="nav-slide"></div>
    </div> <!--END #featured-staff-->
    
    <?php else : ?>            
        
    <?php endif; wp_reset_query(); ?>
    
    <?php
    	// Management teams
        $gm_query = array ('post_type' => 'staff', 'meta_key' => 'sp_staff_slide', 'meta_value' => 0, 'paged' => $paged, 'posts_per_page' => 4);
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    
        query_posts($gm_query);
        
        if (have_posts()) : 
    ?>  
        
    <div id="teams">   
    <h2><?php _e('Management Teams', 'sptheme'); ?></h2>
    <?php while(have_posts()) : the_post(); ?>
    <?php
	$post_thumb = get_post_thumbnail_id( $post->ID );
	$image_src = wp_get_attachment_image_src($post_thumb, 'full');
	$image = aq_resize( $image_src[0], 195, 195, true ); 
	?>
    
    <article class="team-info profile-photo-frame">
    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
    <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
    </a>
    <div class="details orange">
        <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        <p><?php echo sp_get_custom_field( 'sp_job_title', $post->ID ); ?></p>
    </div>
    </article>            
    
    <?php		
            endwhile; 
    ?>
    <div class="clear"></div>
    </div> <!--END #teams-->
    
    <?php // Pagination
		if(function_exists('wp_pagenavi'))
			wp_pagenavi();
		else 
			echo sp_pagination(); 
	?>	
    
    <?php else : ?>            
        <p><?php _e('Sorry, we will update our teams soon.', 'sptheme'); ?></p>
    <?php endif; wp_reset_query(); ?>
    
    
    
    </div>  <!--END .entry-body-->
    
	
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>