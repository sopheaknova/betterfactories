<?php
/*
Template Name: Media Center Page
*/
?>
<?php get_header(); ?>
<section id="content" class="clearfix ">
	<div class="container">
    
    <div id="featured-media">
    <?php 
	$category_name = $data['infocus_cat'];;
	$category_link = get_category_link( get_cat_ID($category_name) ); 
	?>
    	<h3 class="featured-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
    <?php
	$args = array (
				'category_name' 	=> $category_name,
				'posts_per_page'	=> 5
			);
	$media_query = new WP_Query($args);
	if ($media_query->have_posts()) :
	while ( $media_query->have_posts() ) : $media_query->the_post();
	$post_thumb = get_post_thumbnail_id( $post->ID );
	$image_src = wp_get_attachment_image_src($post_thumb, 'full');
	$image = aq_resize( $image_src[0], 690, 381, true ); //resize & crop the image	
	?>
    	<div class="cat-slide-items">
        <?php if ($image) : ?>
            <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
		<?php else:	?>
        	<img src="<?php echo SP_BASE_URL; ?>images/media-landing-image-690x317.gif" alt="Photo media slide" />
        <?php endif; ?>
        <div class="caption">
        	<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        	<p>
            <?php sp_excerpt_length(120); ?>
            </p>
        </div>
        </div><!-- end .cat-slide-items -->
      <?php
	  endwhile;
	  endif;
	  ?>   
        <ul class="slider-nav">
        <?php
		if ($media_query->have_posts()) :
		while ( $media_query->have_posts() ) : $media_query->the_post();
		$post_thumb = get_post_thumbnail_id( $post->ID );
		$image_src = wp_get_attachment_image_src($post_thumb, 'full');
		$image = aq_resize( $image_src[0], 130, 85, true ); //resize & crop the image	
		?>
        	<?php if ($image) : ?>
                <li><a href="#"><img src="<?php echo $image;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a></li>
            <?php else:	?>
                <li><a href="#"><img src="<?php echo SP_BASE_URL; ?>images/media-landing-image-130x85.gif" alt="Photo media slide thumb" /></a></li>
            <?php endif; ?>
        <?php
		  endwhile;
		  endif;
		?>      
        </ul>
    </div><!-- end #featured-news -->
    
    <div id="media-latest-news" class="last">
    	<div class="widget">
        	<div class="widget-custom">
            <?php 
			$category_name = $data['latest_news_cat'];
			$category_link = get_category_link( get_cat_ID($category_name) ); 
			?>
            <h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
            <ul class="latest-news">
            <?php
			$args = array (
						'category_name' 	=> $category_name,
						'posts_per_page'	=> 7
					);
			$media_query = new WP_Query($args);
			if ($media_query->have_posts()) :
			while ( $media_query->have_posts() ) : $media_query->the_post();
			?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
                    <div class="entry-meta">
                        <span class="title"><?php _e( 'Posted on: ', 'sptheme' ); ?><?php echo sp_posted_on(); ?></span>
                    </div>
                </li>
            <?php
            endwhile;
            else:
            ?>
            <?php _e( 'Latest news are coming soon.', 'sptheme' ); ?>
            <?php	  
            endif;
            ?> 
            </ul>
            </div>            
        </div><!-- end .widget -->
    </div><!-- end #media-latest-news -->
    
    <div class="clear"></div>
    <hr class="dotted-3">
    
    <!--START MEDIA SIDEBAR-->
    <aside class="one_third">
        <div class="widget">
		<?php 
        $category_name = $data['bfc_voice_cat'];
        $category_link = get_category_link( get_cat_ID($category_name) ); 
        ?>
				<h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
        <?php
		$args = array (
					'category_name' 	=> $category_name,
					'posts_per_page'	=> 1
				);
		$media_query = new WP_Query($args);
		if ($media_query->have_posts()) :
		while ( $media_query->have_posts() ) : $media_query->the_post();
		$post_thumb = get_post_thumbnail_id( $post->ID );
	  	$image_src = wp_get_attachment_image_src($post_thumb, 'medium');
	  	$image = aq_resize( $image_src[0], 300, 145, true ); //resize & crop the image	
		?>
        <?php if ($image) : ?>
            <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
		<?php else:	?>
        	<img src="<?php echo SP_BASE_URL; ?>images/blank-photo-300.gif" alt="Blank photo" />
        <?php endif; ?>
            <h5><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
            <div class="entry-meta">
				<?php echo sp_post_meta(); ?>
            </div><!-- end .entry-meta -->
            <p>
            <?php sp_excerpt_length(90); ?>
            </p>
		<?php
        endwhile;
        endif;
        ?>
        <div class="more-posts">
            <ul>
        <?php $media_query = new WP_Query(array('posts_per_page' => '3', 'offset' => '1', 'category_name' => $category_name)); ?>	
        <?php if ($media_query->have_posts()) : while ( $media_query->have_posts() ) : $media_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
        <?php
        endwhile;
        endif;
        ?>
            </ul>
        <a href="<?php echo esc_url( $category_link ); ?>" class="learn-more"><?php _e('See more', 'sptheme')?> <?php echo get_cat_name( $category_name ); ?> »</a>   
        </div><!-- end .more-posts-->
            
        </div>
	</aside>
        
    <aside class="one_third">
        <div class="widget">
		<?php 
        $category_name = $data['video_cat'];
        $category_link = get_category_link( get_cat_ID($category_name) ); 
        ?>
            <h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
        <?php
        $args = array (
                    'category_name' 	=> $category_name,
                    'posts_per_page'	=> 1
                );
        $video_query = new WP_Query($args);
        if ($video_query->have_posts()) :
        while ( $video_query->have_posts() ) : $video_query->the_post();
        ?>
        <?php
		if( sp_get_custom_field( 'sp_video_id', $post->ID ) ) {
		?>
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		<img src="http://img.youtube.com/vi/<?php echo sp_get_custom_field( 'sp_video_id', $post->ID ); ?>/0.jpg" width="300" height="225"	/>
		</a>
		<h5><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
		<?php } ?>
        
		<div class="entry-meta">
			<?php echo sp_post_meta(); ?>
		</div><!-- end .entry-meta -->
            
        <?php
        endwhile;
        else:
        ?>
        <?php _e( 'Video are coming soon.', 'sptheme' ); ?>
        <?php	  
        endif; 
        ?>
        
        <div class="more-posts">
            <ul>
        <?php $media_query = new WP_Query(array('posts_per_page' => '3', 'offset' => '1', 'category_name' => $category_name)); ?>	
        <?php if ($media_query->have_posts()) : while ( $media_query->have_posts() ) : $media_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
        <?php
        endwhile;
        endif;
        ?>
            </ul>
        <a href="<?php echo esc_url( $category_link ); ?>" class="learn-more"><?php _e('See more', 'sptheme')?> <?php echo get_cat_name( $category_name ); ?> »</a>   
        </div><!-- end .more-posts-->
            
        </div>
     </aside>
        
     <aside class="one_third last">
        <div class="widget">
        <?php 
        $category_name = $data['press_release_cat'];
        $category_link = get_category_link( get_cat_ID($category_name) ); 
        ?>
				<h3 class="widget-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category_name; ?></a></h3>
        <?php
		$args = array (
					'category_name' 	=> $category_name,
					'posts_per_page'	=> 1
				);
		$media_query = new WP_Query($args);
		if ($media_query->have_posts()) :
		while ( $media_query->have_posts() ) : $media_query->the_post();
		$post_thumb = get_post_thumbnail_id( $post->ID );
	  	$image_src = wp_get_attachment_image_src($post_thumb, 'medium');
	  	$image = aq_resize( $image_src[0], 300, 145, true ); //resize & crop the image	
		?>
        <?php if ($image) : ?>
            <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
		<?php else:	?>
        	<img src="<?php echo SP_BASE_URL; ?>images/blank-photo-300.gif" alt="Blank photo" />
        <?php endif; ?>
            <h5><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
            <div class="entry-meta">
				<?php echo sp_post_meta(); ?>
            </div><!-- end .entry-meta -->
            <p>
            <?php sp_excerpt_length(90); ?>
            </p>
		<?php
        endwhile;
        endif;
        ?>
        
        <div class="more-posts">
            <ul>
        <?php $media_query = new WP_Query(array('posts_per_page' => '3', 'offset' => '1', 'category_name' => $category_name)); ?>	
        <?php if ($media_query->have_posts()) : while ( $media_query->have_posts() ) : $media_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
        <?php
        endwhile;
        endif;
        ?>
            </ul>
        <a href="<?php echo esc_url( $category_link ); ?>" class="learn-more"><?php _e('See more', 'sptheme')?> <?php echo get_cat_name( $category_name ); ?> »</a>   
        </div><!-- end .more-posts-->
        
        </div>
    </aside>
    
    <div class="clear"></div>
    
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>