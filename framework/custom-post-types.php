<?php

require_once( SP_BASE_DIR . 'framework/custom-post/job-post-types.php' );
require_once( SP_BASE_DIR . 'framework/custom-post/teams-post-types.php' );

// Add styles for custom column page
function sp_add_column_custom_styles() {

	$screen = get_current_screen();

	if( $screen->post_type == 'slider' || $screen->post_type == 'staff' || $screen->post_type == 'gallery' )
		echo '<style> #posts-filter .column-shortcode .shortcode-field { background: #fafafa; border: 1px solid #e6e6e6; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; display: inline-block; padding: 2px 5px; }</style>';

	if( $screen->post_type == 'portfolio' || $screen->post_type == 'staff' )
		echo '<style> #posts-filter .column-thumbnail { width: 8%; }</style>';

}
add_action('admin_head', 'sp_add_column_custom_styles');