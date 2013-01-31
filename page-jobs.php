<?php
/*
Template Name: Jobs Page
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
    </div>        
	<?php
    
        $wpq = array ('post_type' => 'job', 'orderby' => 'name', 'order' => 'desc', 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 16);
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    
        query_posts($wpq);
        
        if (have_posts()) : 
    ?>            
    <table class="job-list">
    <tr>
        <th width="15%">Date Post</th>
        <th width="40%">Job Title</th>
        <th width="15%">Job Type</th>
        <th width="20%">Workplace</th>
    </tr>
    <?php while(have_posts()) : the_post(); ?>
    <tr>
        <td><?php the_time('F j, Y') ?></td>
        <td><strong><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong></td>
        <td><?php echo sp_get_custom_field( 'sp_post_level', $post->ID ); ?></td>
        <td><?php echo sp_get_custom_field( 'sp_duty_station', $post->ID ); ?></td>
    </tr>            
    
    <?php		
            endwhile; 
    ?>
    </table>            
    <!--/job-list-->
    
    <?php // Pagination
		if(function_exists('wp_pagenavi'))
			wp_pagenavi();
		else 
			echo sp_pagination(); 
	?>	
    
    <?php else : ?>            
        <p><?php _e('Sorry, the job announcement not available yet.', 'sptheme'); ?></p>
    <?php endif; wp_reset_query(); ?>
    
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>