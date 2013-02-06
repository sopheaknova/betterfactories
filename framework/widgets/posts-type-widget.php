<?php 

add_action('widgets_init','sp_widget_posts_type');

function sp_widget_posts_type() {
	register_widget('sp_widget_posts_type');
	
	}

class sp_widget_posts_type extends WP_Widget {
	function sp_widget_posts_type() {
			
		$widget_ops = array('classname' => 'posts-widget','description' => __('Widget display Posts from a certain category','sptheme'));
		$this->WP_Widget('sp-posts',__('BFC - Posts by Category','sptheme'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$orderby = $instance['orderby'];
		$count = $instance['count'];
		$category = $instance['category'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			global $post;
?>

	
		<ul class="blog-posts-widget">
			<?php 
			$category_id = get_cat_ID($category);
			query_posts(array(   "ignore_sticky_posts" => 1, 'cat' => $category_id, 'showposts' => $count  )); 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			?>

		<li class="blog-post">
                 
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<div class="entry-meta">
		<?php _e( 'Posted on: ', 'sptheme' ); ?><?php echo sp_posted_on(); ?>
        </div><!-- end .entry-meta -->
		</li>

			<?php endwhile; ?>
			<?php  else:  ?>
			<!-- Else in here -->
			<?php  endif; ?>
			<?php wp_reset_query(); ?>
		</ul>

<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = $new_instance['count'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['category'] = $new_instance['category'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Post Type','sptheme'), 
			'count' => 3,
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>
        <p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e('select category:','sptheme'); ?></label>
        <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" class="widefat">
        <?php 
			$options_categories = array();  
			$options_categories_obj = get_categories('hide_empty=0');
			foreach ($options_categories_obj as $category) {
				$options_categories[$category->cat_ID] = $category->cat_name;
		?>
        <option <?php if ( $options_categories[$category->cat_ID] == $instance['category'] ) echo 'selected="selected"'; ?>><?php echo $options_categories[$category->cat_ID]; ?></option>
        <?php		
			}
		?>
		</select>
		</p>
        
       <p>
		<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e('Show post by:', 'sptheme') ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat">
		<option <?php if ( 'Video' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Video</option>
		<option <?php if ( 'Audio' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Audio</option>
		<option <?php if ( 'Slideshow' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Slideshow</option>
        <option <?php if ( 'Article' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Article</option>
		</select>
		</p>


		<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number Of Posts:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" class="widefat" />
		</p>
   <?php  
}
	} //end class
	
	