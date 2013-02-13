<?php
/**
 * @package WordPress
 * @subpackage Better_Factories_Cambodia
 * @since Better Factories Cambodia 1.0
 */
?>
<?php get_header(); ?>

<section id="content" class="clearfix ">
	<div class="container">
    <div class="two_third">
    <?php 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Home Sidebar 1') ) :	
	else :
	?>	
		<div class="non-widget">
		<h3><?php _e('About This Sidebar', 'sptheme'); ?></h3>
		<p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place text widgets into the <strong><em>Home sidebar 1</em></strong> Area', 'sptheme'); ?></p>
		</div>
	<?php	
		endif;
	?>
    </div>
    <div class="one_third last">
    <?php 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Home Sidebar 2') ) :	
	else :
	?>	
		<div class="non-widget">
		<h3><?php _e('About This Sidebar', 'sptheme'); ?></h3>
		<p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place Register widgets into the <strong><em>Home Sidebar 2</em></strong> Area', 'sptheme'); ?></p>
		</div>
	<?php	
		endif;
	?>
    </div>
    <div class="clear"></div>
    
    <!--START HOME SIDEBAR-->
    <div id="home-sidebar">
    <aside class="one_third">
        <div class="widget">
        <?php 
			$category_name = $data['infocus_cat'];
			$category_id = get_cat_ID($category_name);
			$category_link = get_category_link( get_cat_ID($category_name) ); 
			?>
				<h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
        <?php
		$args = array (
					'cat' 	=> $category_id,
					'posts_per_page'	=> 1
				);
		$focus_query = new WP_Query($args);
		if ($focus_query->have_posts()) :
		while ( $focus_query->have_posts() ) : $focus_query->the_post();
		$post_thumb = get_post_thumbnail_id( $post->ID );
	  	$image_src = wp_get_attachment_image_src($post_thumb, 'medium');
	  	$image = aq_resize( $image_src[0], 300, 145, true ); //resize & crop the image	
		?>
        	
            <?php if ($image) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
                </a>
            <?php else:	?>
                <img src="<?php echo SP_BASE_URL; ?>images/blank-photo-300.gif" alt="Blank photo" />
            <?php endif; ?>
            
            <h5><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
            <div class="entry-meta">
				<span><?php _e( 'Posted on: &mdash; ', 'sptheme' ); ?><?php echo sp_posted_on(); ?></span>
            </div><!-- end .entry-meta -->
            <p>
            <?php sp_excerpt_length(150); ?>
            </p>
		<?php
        endwhile;
		else:
		?>
		<?php _e( $category_name.' are coming soon.', 'sptheme' ); ?>
		<?php	  
        endif;
        ?>	
            
        </div><!-- end .widget -->   
	</aside><!-- end #home-sidebar-1 -->      
    <aside class="one_third">
            <div class="widget">
            <?php
			$category_name = $data['video_cat'];
			$category_id = get_cat_ID($category_name);
			$category_link = get_category_link( get_cat_ID($category_name) ); 
			?>
				<h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
            <?php
			$args = array (
						'cat' 	=> $category_id,
						'posts_per_page'	=> 1
					);
			$video_query = new WP_Query($args);
			if ($video_query->have_posts()) :
			while ( $video_query->have_posts() ) : $video_query->the_post();
			?>
            <?php
			if( sp_get_custom_field( 'sp_video_id', $post->ID ) ) {
			?>
            <a class="hover-1" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
			<img src="http://img.youtube.com/vi/<?php echo sp_get_custom_field( 'sp_video_id', $post->ID ); ?>/0.jpg" width="300" height="225"	/>
            <span class="block-over"></span>
            </a>
            <h5><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
			<?php } ?>
            <div class="entry-meta">
                <span><?php _e( 'Posted on: &mdash; ', 'sptheme' ); ?><?php echo sp_posted_on(); ?></span>
            </div><!-- end .entry-meta -->
                
			<?php
            endwhile;
            else:
            ?>
            <?php _e( $category_name.' are coming soons.', 'sptheme' ); ?>
            <?php	  
            endif; 
            ?>    
            </div>
     </aside><!-- end #home-sidebar-2 --> 
        
     <aside class="one_third last">
        <div class="widget">
        <?php 
		$category_name = $data['latest_news_cat'];
		$category_id = get_cat_ID($category_name);
		$category_link = get_category_link( get_cat_ID($category_name) ); 
		?>
            <h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
            <ul class="latest-news">
            <?php
			$args = array (
						'cat' 	=> $category_id,
						'posts_per_page'	=> 5
					);
			$news_query = new WP_Query($args);
			if ($news_query->have_posts()) :
			while ( $news_query->have_posts() ) : $news_query->the_post();
			?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
                    <div class="entry-meta">
                        <span class="title"><?php _e( 'Posted on: &mdash; ', 'sptheme' ); ?><?php echo sp_posted_on(); ?></span>
                    </div>
                </li>
            <?php
            endwhile;
            else:
            ?>
            <?php _e( $category_name.' are coming soon.', 'sptheme' ); ?>
            <?php	  
            endif;
            ?>    
            </ul>
        </div>
    </aside><!-- end #home-sidebar-3 -->
    </div><!-- end #home-sidebar -->
    <div class="clear"></div>
    
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>