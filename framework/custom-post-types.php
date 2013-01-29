<?php

/* ---------------------------------------------------------------------- */
/*	Slider
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Slider'
function sp_register_post_type_slider() {

	$labels = array(
		'name'               => __( 'Sliders', 'sptheme' ),
		'singular_name'      => __( 'Slider', 'sptheme' ),
		'add_new'            => __( 'Add New', 'sptheme' ),
		'add_new_item'       => __( 'Add New Slider', 'sptheme' ),
		'edit_item'          => __( 'Edit Slider', 'sptheme' ),
		'new_item'           => __( 'New Slider', 'sptheme' ),
		'view_item'          => __( 'View Slider', 'sptheme' ),
		'search_items'       => __( 'Search Sliders', 'sptheme' ),
		'not_found'          => __( 'No sliders found', 'sptheme' ),
		'not_found_in_trash' => __( 'No sliders found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Slider:', 'sptheme' ),
		'menu_name'          => __( 'Sliders', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title'),
		'taxonomies'          => array(''),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'slider' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-slider.png'
	);

	register_post_type( 'slider', $args );

} 
add_action('init', 'sp_register_post_type_slider');

// Custom colums for 'Slider'
function sp_edit_slider_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'title'       => __( 'Name', 'sptheme' ),
		'slide_count' => __( 'Slide Count', 'sptheme' ),
		'shortcode'   => __( 'Shortcode', 'sptheme' )
	);

	return $columns;

}
add_action('manage_edit-slider_columns', 'sp_edit_slider_columns');

// Custom colums content for 'Slider'
function sp_manage_slider_columns( $column, $post_id ) {

	global $post;

	switch ( $column ) {

		case 'slide_count':

			$slider_slides = get_post_meta( $post->ID, $id, true ) ? get_post_meta( $post->ID, $id, true ) : false;

			$slide_count = count( unserialize( $slider_slides['sp_slider_slides'][0] ) );
			
			echo $slide_count;

			break;

		case 'shortcode':
			
			echo '<span class="shortcode-field">[slider id="'. $post->post_name . '"]</span>';

			break;
		
		default:
			break;
	}

}
add_action('manage_slider_posts_custom_column', 'sp_manage_slider_columns', 10, 2);

// Sortable custom columns for 'Slider'
function sp_sortable_slider_columns( $columns ) {

	$columns['slide_count'] = 'slide_count';

	return $columns;

}
add_action('manage_edit-slider_sortable_columns', 'sp_sortable_slider_columns');

// Change default title for 'Slider'
function sp_change_slider_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'slider' )
		$title = __('Enter slider name here', 'sptheme');

	return $title;

}

add_filter('enter_title_here', 'sp_change_slider_title');

/* ---------------------------------------------------------------------- */
/*	Gallery
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Gallery'
function sp_register_post_type_gallery() {

	$labels = array(
		'name'               => __( 'Gallery', 'sptheme' ),
		'singular_name'      => __( 'Gallery', 'sptheme' ),
		'add_new'            => __( 'Add New Album', 'sptheme' ),
		'add_new_item'       => __( 'Add New Album', 'sptheme' ),
		'edit_item'          => __( 'Edit Album', 'sptheme' ),
		'new_item'           => __( 'New Album', 'sptheme' ),
		'view_item'          => __( 'View Album', 'sptheme' ),
		'search_items'       => __( 'Search Album', 'sptheme' ),
		'not_found'          => __( 'No Album found', 'sptheme' ),
		'not_found_in_trash' => __( 'No Album found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Album:', 'sptheme' ),
		'menu_name'          => __( 'Gallery', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title'),
		'taxonomies'          => array(''),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'gallery' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-gallery.png'
	);

	register_post_type( 'gallery', $args );

} 
add_action('init', 'sp_register_post_type_gallery');

// Custom colums for 'gallery'
function sp_edit_gallery_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'thumbnail'   => __( 'Cover Album', 'sptheme' ),
		'title'       => __( 'Name', 'sptheme' ),		
		'photo_number' => __( 'Photo number', 'sptheme' ),
		'shortcode'   => __( 'Shortcode', 'sptheme' )
	);

	return $columns;

}
add_action('manage_edit-gallery_columns', 'sp_edit_gallery_columns');

// Custom colums content for 'gallery'
function sp_manage_gallery_columns( $column, $post_id ) {

	global $post;

	$album = get_post_meta( $post->ID, 'sp_album_images', false );
	$photo_number = count( $album );
			
	switch ( $column ) {

		case 'thumbnail':
			
			//echo wp_get_attachment_link( $album[0], array(100,50) );
			echo '<a href="' . get_edit_post_link( $post_id ) . '" title="Edit ' . get_the_title( $post_id ) . '">' . wp_get_attachment_image( $album[0], array(50, 50) ) . '</a>';

			break;
		
		case 'photo_number':
			
			echo $photo_number;

			break;
		
		case 'shortcode':
			
			echo '<span class="shortcode-field">[album_name id="'. $post->post_name . '"]</span>';

			break;	
		
		default:
			break;
	}

}
add_action('manage_gallery_posts_custom_column', 'sp_manage_gallery_columns', 10, 2);

// Sortable custom columns for 'gallery'
function sp_sortable_gallery_columns( $columns ) {

	$columns['photo_number'] = 'photo_number';

	return $columns;

}
add_action('manage_edit-gallery_sortable_columns', 'sp_sortable_gallery_columns');

// Change default title for 'gallery'
function sp_change_gallery_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'gallery' )
		$title = __('Enter gallery name here', 'sptheme');

	return $title;

}

add_filter('enter_title_here', 'sp_change_gallery_title');

/* ---------------------------------------------------------------------- */
/*	Staff
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Staff'
function sp_register_post_type_staff() {

	$labels = array(
		'name'               => __( 'Staff', 'sptheme' ),
		'singular_name'      => __( 'Member', 'sptheme' ),
		'add_new'            => __( 'Add New', 'sptheme' ),
		'add_new_item'       => __( 'Add New Member', 'sptheme' ),
		'edit_item'          => __( 'Edit Member', 'sptheme' ),
		'new_item'           => __( 'New Member', 'sptheme' ),
		'view_item'          => __( 'View Member', 'sptheme' ),
		'search_items'       => __( 'Search Members', 'sptheme' ),
		'not_found'          => __( 'No members found', 'sptheme' ),
		'not_found_in_trash' => __( 'No members found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Member:', 'sptheme' ),
		'menu_name'          => __( 'Staff', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array(''),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'staff-member' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-staff.png'
	);

	register_post_type( 'staff', $args );

} 
add_action('init', 'sp_register_post_type_staff');

// Custom colums for 'Staff'
function sp_edit_staff_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'thumbnail'   => __( 'Photo', 'sptheme' ),
		'title'       => __( 'Name', 'sptheme' ),
		'job_title'   => __( 'Job Title', 'sptheme' ),
		'description' => __( 'Description', 'sptheme' ),
		'shortcode'   => __( 'Shortcode', 'sptheme' )
	);

	return $columns;

}
add_action('manage_edit-staff_columns', 'sp_edit_staff_columns');

// Custom colums content for 'Staff'
function sp_manage_staff_columns( $column, $post_id ) {

	global $post;

	switch ( $column ) {

		case 'thumbnail':

			echo '<a href="' . get_edit_post_link( $post_id ) . '">' . get_the_post_thumbnail( $post_id, array(50, 50), array( 'title' => get_the_title( $post_id ) ) ) . '</a>';

			break;

		case 'job_title':
			
			echo sp_get_custom_field( 'sp_job_title', $post_id );

			break;

		case 'description':
			
			echo get_the_excerpt();

			break;

		case 'shortcode':
			
			echo '<span class="shortcode-field">[staff_member id="'. $post->post_name . '"]</span>';

			break;
		
		default:
			break;
	}

}
add_action('manage_staff_posts_custom_column', 'sp_manage_staff_columns', 10, 2);

// Sortable custom columns for 'Staff'
function sp_sortable_staff_columns( $columns ) {

	$columns['job_title'] = 'job_title';

	return $columns;

}
add_action('manage_edit-staff_sortable_columns', 'sp_sortable_staff_columns');

// Change default title for 'staff'
function sp_change_staff_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'staff' )
		$title = __('Enter staff name here', 'sptheme');

	return $title;

}

add_filter('enter_title_here', 'sp_change_staff_title');

// Add styles for custom column page
function sp_add_column_custom_styles() {

	$screen = get_current_screen();

	if( $screen->post_type == 'slider' || $screen->post_type == 'staff' || $screen->post_type == 'gallery' )
		echo '<style> #posts-filter .column-shortcode .shortcode-field { background: #fafafa; border: 1px solid #e6e6e6; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; display: inline-block; padding: 2px 5px; }</style>';

	if( $screen->post_type == 'portfolio' || $screen->post_type == 'staff' )
		echo '<style> #posts-filter .column-thumbnail { width: 8%; }</style>';

}
add_action('admin_head', 'sp_add_column_custom_styles');