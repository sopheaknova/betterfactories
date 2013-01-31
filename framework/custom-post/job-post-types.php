<?php
/* ---------------------------------------------------------------------- */
/*	Job / Career
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Job'
function sp_register_post_type_job() {

	$labels = array(
		'name'               => __( 'Job', 'sptheme' ),
		'singular_name'      => __( 'Job', 'sptheme' ),
		'add_new'            => __( 'Add New', 'sptheme' ),
		'add_new_item'       => __( 'Add New Job', 'sptheme' ),
		'edit_item'          => __( 'Edit Job', 'sptheme' ),
		'new_item'           => __( 'New Job', 'sptheme' ),
		'view_item'          => __( 'View Job', 'sptheme' ),
		'search_items'       => __( 'Search Job', 'sptheme' ),
		'not_found'          => __( 'No job found', 'sptheme' ),
		'not_found_in_trash' => __( 'No jobs found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Job:', 'sptheme' ),
		'menu_name'          => __( 'Job', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor' ),
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
		'rewrite'             => array( 'slug' => 'job' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/portfolio.png'
	);

	register_post_type( 'job', $args );

} 
add_action('init', 'sp_register_post_type_job');



// Change default title for 'job'
function sp_change_job_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'job' )
		$title = __('Enter job name here', 'sptheme');

	return $title;

}

add_filter('enter_title_here', 'sp_change_job_title');