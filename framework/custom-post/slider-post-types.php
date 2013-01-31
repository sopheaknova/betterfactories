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