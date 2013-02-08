<?php

/* ---------------------------------------------------------------------- */
/*	Show main and footer navigation
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_main_navigation')) {

	function sp_main_navigation() {
		
		// set default main menu if wp_nav_menu not active
		if ( function_exists ( 'wp_nav_menu' ) )
			wp_nav_menu( array(
				'container'      => false,
				'menu_class'	 => 'menu-nav',
				'theme_location' => 'primary_nav',
				'fallback_cb' => 'sp_main_nav_fallback'
				) );
		else
			sp_main_nav_fallback();	
	}
}

if (!function_exists('sp_main_nav_fallback')) {
	
	function sp_main_nav_fallback() {
    	
		$menu_html .= '<ul class="menu-nav">';
		$menu_html .= '<li><a href="'.admin_url('nav-menus.php').'">'.esc_html__('Add Main menu', 'sptheme').'</a></li>';
		$menu_html .= '</ul>';
		echo $menu_html;
		
	}
	
}

if (!function_exists('sp_footer_navigation')){
	
	function sp_footer_navigation() {
		
		// set default main menu if wp_nav_menu not active
		if ( function_exists ( 'wp_nav_menu' ) )
			wp_nav_menu( array(
				'container'      => false,
				'menu_class'	 => 'footer-nav',
				'after'		 	 => ' -',
				'theme_location' => 'footer_nav',
				'fallback_cb'	 => 'sp_footer_nav_fallback'
				));	
		else
			sp_footer_nav_fallback();	
	}
}

if (!function_exists('sp_footer_nav_fallback')) {
	
	function sp_footer_nav_fallback() {
    	
		$menu_html .= '<ul class="footer-nav">';
		$menu_html .= '<li><a href="'.admin_url('nav-menus.php').'">'.esc_html__('Add Footer menu', 'sptheme').'</a></li>';
		$menu_html .= '</ul>';
		echo $menu_html;
		
	}
	
}

/* ---------------------------------------------------------------------- */
/*	Get Custom Field
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_get_custom_field') ) {
	
	function sp_get_custom_field( $key, $post_id = null) {
		
		global $wp_query;
		
		$post_id = $post_id ? $post_id : $wp_query->get_queried_object()->ID;
		
		return get_post_meta( $post_id, $key, true );
	}
}

/* ---------------------------------------------------------------------- */
/*	Check page layout
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_check_page_layout') ) {

	function sp_check_page_layout( $single_project = null, $portfolio_category = null ) {

		$page_layout = sp_get_custom_field('sp_page_layout');

		/*if( $single_project )
			$page_layout = sp_get_custom_field('sp_project_page_layout');

		if( $portfolio_category )
			$page_layout = sp_get_custom_field( 'sp_page_layout', of_get_option('sp_portfolio_parent') );

		$site_structure = of_get_option('sp_site_structure');*/

		//if( ( $page_layout == '2cl' || $page_layout == '2cr' ) || ( $page_layout != '1col' && ( $site_structure == '2cl' || $site_structure == '2cr' ) ) )
		if( ( $page_layout == '2cl' || $page_layout == '2cr' ) )
			return true;
			
		//if( ( $page_layout == '3col' ) )
			//return $page_layout;	

		return false;

	}
	
}

/* ---------------------------------------------------------------------- */
/*	Check sidebar position
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_check_sidebar_position') ) {

	function sp_check_sidebar_position( $single_project = null, $portfolio_category = null ) {

		$page_layout = sp_get_custom_field('sp_page_layout');

		/*if( $single_project )
			$page_layout = sp_get_custom_field('sp_project_page_layout');

		if( $portfolio_category )
			$page_layout = sp_get_custom_field( 'sp_page_layout', of_get_option('sp_portfolio_parent') );

		$site_structure = of_get_option('sp_site_structure');

		if( $page_layout == '2cl' || ( $page_layout == '' && $site_structure == '2cl' ) )*/
		if( $page_layout == '2cl' )
			return 'sidebar-left';	

		return null;

	}
	
}

/* ---------------------------------------------------------------------- */
/*	Blog navigation
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_pagination') ) {

	function sp_pagination( $pages = '', $range = 2 ) {

		$showitems = ( $range * 2 ) + 1;

		global $paged, $wp_query;

		if( empty( $paged ) )
			$paged = 1;

		if( $pages == '' ) {

			$pages = $wp_query->max_num_pages;

			if( !$pages )
				$pages = 1;

		}

		if( 1 != $pages ) {

			$output = '<nav class="pagination">';

			// if( $paged > 2 && $paged >= $range + 1 /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( 1 ) . '" class="next">&laquo; ' . __('First', 'sptheme') . '</a>';

			if( $paged > 1 /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="next">&larr; ' . __('Next', 'sptheme') . '</a>';

			for ( $i = 1; $i <= $pages; $i++ )  {

				if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) )
					$output .= ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '">' . $i . '</a>';

			}

			if ( $paged < $pages /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="prev">' . __('Previous', 'sptheme') . ' &rarr;</a>';

			// if ( $paged < $pages - 1 && $paged + $range - 1 <= $pages /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( $pages ) . '" class="prev">' . __('Last', 'sptheme') . ' &raquo;</a>';

			$output .= '</nav>';

			return $output;

		}

	}

}

/* ---------------------------------------------------------------------- */
/*	Show the post content
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_post_content')) {

	function sp_post_content() {

		global $post, $user_ID;

		get_currentuserinfo();

		if ( is_singular() ) {

			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );

			$output = $content;

			$output .= wp_link_pages( array( 'echo' => false ) );

		} else {
			$output = sp_excerpt_length(120);	
		}
		
		/*if( user_can( $user_ID, 'edit_posts' ) )
			$output .= '<p><a class="button" title="' . __('Edit Post', 'sptheme') . '" href="' . get_edit_post_link( $post->ID ) . '" class="post-edit-link">' . __('Edit', 'sptheme') . '</a></p>';*/
		
		return $output;

	}

}

/* ---------------------------------------------------------------------- */
/*	Show the post meta (permalink, date, tags, categories & comments)
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_post_meta')) {

	function sp_post_meta() {

		global $post;
		
		$output = '<span>' . __('By: ', 'sptheme') . '</span>';
		$output .= '<span class="title">' . get_the_author() . ' &mdash; </span>';
		$output .= sp_posted_on() . ' &mdash; ';
		$output .= '<span class="post-categories">' . __(' in: ', 'sptheme') . ' ' . get_the_category_list(', ') . '</span>';
		
		return $output;
	}

}

/* ---------------------------------------------------------------------- */
/*	Show Heading image on page/post
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_check_heading_image')) {

	function sp_check_heading_image() {

		global $post;
		
		if( ( is_page() || is_single() ) && sp_get_custom_field( 'sp_heading_image', $post->ID ) ) {
		$image = wp_get_attachment_image_src( sp_get_custom_field( 'sp_heading_image', $post->ID ), 'full' ); 
		$output = '<img src="' . aq_resize( $image[0], 980, 157, true ) . '" />';
		} else { 
			//check heading of parent page
			if ( ( is_page() ) && sp_get_custom_field( 'sp_heading_image', $post->post_parent )) {
				$image = wp_get_attachment_image_src( sp_get_custom_field( 'sp_heading_image', $post->post_parent ), 'full' ); 
				$output = '<img src="' . aq_resize( $image[0], 980, 157, true ) . '" />';
			} elseif ( is_page_template() || is_singular() || is_single() ) { 
				$output = '<img src="' . SP_BASE_URL . 'images/default-heading-image-'.rand(1,7).'.jpg" />';
		    } elseif ( is_category() && function_exists('z_taxonomy_image_url') ) {
				if (z_taxonomy_image_url() != '') :
					$output = '<img src="' . aq_resize( z_taxonomy_image_url(), 980, 157, true ) . '" /> ';
				else: 
					$output = '<img src="' . SP_BASE_URL . 'images/default-heading-image-'.rand(1,7).'.jpg" />';
				endif;
			} else {
			
				//display blank image if options above are fail
				$output = '<img src="' . SP_BASE_URL . 'images/default-heading-image'.rand(1,7).'.jpg" />';
			}
		}
		return $output;
	}

}

/* ---------------------------------------------------------------------- */
/*	The current post—date/time
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_posted_on')) {

	function sp_posted_on() {

		return sprintf( __( '<time datetime="%1$s" pubdate>%2$s</time>', 'sptheme' ),
			esc_attr( get_the_date('c') ),
			esc_html( get_the_date('M d Y') )
		);

	}

}

/* ---------------------------------------------------------------------- */
/*	VideoJS Flash fallback url
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_videojs_fallback') ) {

	function sp_videojs_fallback() {
		?>

<script>
_V_.options.flash.swf = '<?php echo SP_BASE_URL; ?>js/video-js.swf';
</script>

		<?php

	}

}
add_action('wp_head', 'sp_videojs_fallback');