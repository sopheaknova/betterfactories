<?php
global $data;
/* ---------------------------------------------------------------------- */
/*	Basic Theme Settings
/* ---------------------------------------------------------------------- */
$sp_theme_info = wp_get_theme();

define( 'SP_BASE_DIR', TEMPLATEPATH . '/' );
define( 'SP_BASE_URL', get_template_directory_uri() . '/' );
define( 'THEME_VERSION', $sp_theme_info->Version);

/* ---------------------------------------------------------------------- */
/*	Setup and Load Parts
/* ---------------------------------------------------------------------- */

// Add setup functions
require_once( SP_BASE_DIR . 'framework/functions/setup-theme.php' );

// Add Admin Option
require_once( SP_BASE_DIR . 'framework/admin/index.php' );
// Add metaboxes
require_once( SP_BASE_DIR . 'framework/meta-box/class.php' );
require_once( SP_BASE_DIR . 'framework/meta-boxes.php' );

// Add widgets
require_once( SP_BASE_DIR . 'framework/widgets.php' );

require_once( SP_BASE_DIR . 'framework/functions/aq_resizer.php');
require_once( SP_BASE_DIR . 'framework/functions/custom-functions.php' );

//Add Shortcodes
require_once( SP_BASE_DIR . 'framework/shortcodes.php' );

// Add custom post type
require_once( SP_BASE_DIR . 'framework/custom-post-types.php' );

//Add Category images plugin
require_once( SP_BASE_DIR . 'framework/functions/categories-images/categories-images.php' );
