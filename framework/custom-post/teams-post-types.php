<?php
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