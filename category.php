<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

	<div class="container">

		<header class="page-header">

			<?php if ( have_posts() ): ?>
			
					<h1 class="page-title"><?php printf( __( 'Category Archives: %s', 'sptheme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php else: ?>
			
					<h1 class="page-title"><?php _e( 'Nothing Found', 'sptheme' ); ?></h1>

			<?php endif; ?>
					
			<?php if ( category_description() ): ?>

				<hr />

				<h2 class="page-subdescription"><?php echo category_description(); ?></h2>

			<?php endif; ?>

		</header><!-- end .page-header -->
        
		<section id="main">


		<?php if ( have_posts() ) : ?>
		    <?php if(sp_get_custom_field( 'sp_video_id', $post->ID )){?>

		        <article id="category-videos" <?php post_class('clearfix'); ?>>
                    
                   
		        	<h1 class="title"><?php the_title(); ?></h1>

                    <div class="entry-meta">
                         <?php echo sp_post_meta(); ?>
                    </div><!-- end .entry-meta -->
                    <div class="entry-video">
			            <iframe width="600" height="338" src="http://www.youtube.com/embed/<?php echo sp_get_custom_field( 'sp_video_id', $post->ID ); ?>?rel=0" frameborder="0" allowfullscreen></iframe>		
				    </div><!-- end .entry-video -->
				    <?php echo sp_post_content(); ?>
                    <hr />
                    <div class="clear"></div>
                  
                    <?php $category_name = $data['video_cat']; ?>
			        <?php $category_id = get_cat_ID($category_name); ?>
			        <?php $video_query = new WP_Query(array('cat' 	=> $category_id,'offset'=>1));?>
		        	<?php while ( $video_query->have_posts() ) : $video_query->the_post(); ?>

                        <ul>
                        	<li>
			            <div class="post-video">
	                      <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
			              <img src="http://img.youtube.com/vi/<?php echo sp_get_custom_field( 'sp_video_id', $post->ID );?>/0.jpg" width="210" height="130" />
			              </a>
			            </div>
			            <div class="post-description">
			            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		                <h1 class="title"><?php the_title(); ?></h1>
	                    </a>
	                    <?php echo sp_post_meta(); ?>
			            </div>
                            </li>
                           
                        </ul>
			             <div class="clear"></div>

			        <?php endwhile; ?>
		        </article><!-- end .hentry -->
		    <?php ;?>
		    <?php }else{?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

						<?php get_template_part( 'content', get_post_format() ); ?>

					</article><!-- end .hentry -->

				<?php endwhile; ?>
            <?php }?>
				<?php // Pagination
					if(function_exists('wp_pagenavi'))
						wp_pagenavi();
					else 
						echo sp_pagination(); 
				?>
		<?php else: ?>
		
			<article id="post-0" class="post no-results not-found">
		
				<h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sptheme' ); ?></h3>

			</article><!-- end .hentry -->

		<?php endif; ?>
		

			</section><!-- end #main -->

			<?php get_sidebar(); ?>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
