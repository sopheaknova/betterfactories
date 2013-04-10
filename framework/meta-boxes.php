<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit: 
 * @link http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 */

/********************* META BOX DEFINITIONS ***********************/

$prefix = 'sp_';

global $meta_boxes, $pagenow;

$meta_boxes = array();
		

/* ---------------------------------------------------------------------- */
/*	General for Page and CPT room
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'general-settings',
	'title'    => __('General Settings', 'sptheme'),
	'pages'    => array('page', 'post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name'     => __('Page Layout', 'sptheme'),
			'id'       => $prefix . 'page_layout',
			'type'     => 'radio_image',
			'options'  => array(
				//''     => '<img src="' . SP_BASE_URL . 'framework/assets/img/xcol.png" alt="' . __('Use theme default setting', 'sptheme') . '" title="' . __('Use theme default setting', 'sptheme') . '" />',
				'1col' => '<img src="' . SP_BASE_URL . 'framework/assets/img/1col.png" alt="' . __('Fullwidth - No sidebar', 'sptheme') . '" title="' . __('Fullwidth - No sidebar"', 'sptheme') . ' />',
				//'2cl'  => '<img src="' . SP_BASE_URL . 'framework/assets/img/2cl.png" alt="' . __('Sidebar on the left', 'sptheme') . '" title="' . __('Sidebar on the left', 'sptheme') . '" />',
				'2cr'  => '<img src="' . SP_BASE_URL . 'framework/assets/img/2cr.png" alt="' . __('Sidebar on the right', 'sptheme') . '" title="' . __('Sidebar on the right', 'sptheme') . '" />',
				//'3col' => '<img src="' . SP_BASE_URL . 'framework/assets/img/3col.png" alt="' . __('Sidebar on left and right', 'sptheme') . '" title="' . __('Sidebar on left and right', 'sptheme') . '" />'
			),
			'std'  => '1col',
			'desc' => __('select the layout structure for this page.', 'sptheme')
		),
		array(
			'name' => __('Choose a sidebar to display', 'sptheme'),
			'id'   => $prefix . 'selected_sidebar',
			'type' => 'sidebar',
			'std'  => '',
			'desc' => ''
		)
	)
);

$meta_boxes[] = array(
	'id'       => 'heading-image',
	'title'    => __('Heading Image', 'sptheme'),
	'pages'    => array('page', 'post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('Upload heading image', 'sptheme'),
			'id'   => $prefix . 'heading_image',
			'type' => 'plupload_image',
			'max_file_uploads' => 1,
			'std'  => '',
			'desc' => 'Good size 980px by 157px.'
		)
	)
);


/* ---------------------------------------------------------------------- */
/*	Slider
/* ---------------------------------------------------------------------- */

/*$meta_boxes[] = array(
	'id'       => 'slider-slides-settings',
	'title'    => __('Slides', 'sptheme'),
	'pages'    => array('slider'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('The Slides', 'sptheme'),
			'id'   => $prefix . 'slider_slides',
			'type' => 'slider_slides',
			'std'  => '',
			'desc' => ''
		)
	)
);*/

/* ---------------------------------------------------------------------- */
/*	Gallery
/* ---------------------------------------------------------------------- */

/*$meta_boxes[] = array(
	'id'       => 'album-images',
	'title'    => __('Album Images', 'sptheme'),
	'pages'    => array('gallery'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('Add media files from your computer', 'sptheme'),
			'id'   => $prefix . 'album_images',
			'type' => 'plupload_image',
			'std'  => '',
			'desc' => ''
		)
	)
);*/

/* ---------------------------------------------------------------------- */
/*	Job/ Career Opportunities
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'job-setting',
	'title'    => __('Job/Career setting', 'sptheme'),
	'pages'    => array('job'),
	'context'  => 'side',
	'priority' => 'default',
	'fields'   => array(
		array(
			'name' => __('Project title', 'sptheme'),
			'id'   => $prefix . 'project_title',
			'type' => 'text',
			'std'  => '',
			'desc' => 'e.g: Better Factories Cambodia'
		),
		array(
			'name' => __('Post level', 'sptheme'),
			'id'   => $prefix . 'post_level',
			'type' => 'text',
			'std'  => '',
			'desc' => 'e.g: GS‐4 (Approximately US$ 600 net per month)'
		),
		array(
			'name' => __('Contract type', 'sptheme'),
			'id'   => $prefix . 'contract_type',
			'type' => 'text',
			'std'  => '',
			'desc' => 'e.g: Fixed‐term Contract'
		),
		array(
			'name' => __('Duration of contract', 'sptheme'),
			'id'   => $prefix . 'contract_duration',
			'type' => 'text',
			'std'  => '',
			'desc' => 'e.g: Twelve months with the possibility of extension'
		),
		array(
			'name' => __('Duty station', 'sptheme'),
			'id'   => $prefix . 'duty_station',
			'type' => 'text',
			'std'  => '',
			'desc' => 'e.g: Phnom Penh, Cambodia'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Staff
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'member-setting',
	'title'    => __('Member setting', 'sptheme'),
	'pages'    => array('staff'),
	'context'  => 'side',
	'priority' => 'default',
	'fields'   => array(
		array(
			'name' => __('Job title', 'sptheme'),
			'id'   => $prefix . 'job_title',
			'type' => 'text',
			'std'  => '',
			'desc' => ''
		),
		array(
			'name' => __('Featured Staff', 'sptheme'),
			'id'   => $prefix . 'staff_slide',
			'type' => 'checkbox',
			'std'  => 0,
			'desc' => 'Check it for staff featured slideshow'
		)
	)
);



/* ---------------------------------------------------------------------- */
/*	Post Format: Video
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'post-video-settings',
	'title'    => __('External Video Settings', 'sptheme'),
	'pages'    => array('post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		/*array(
			'name' => __('MP4 File URL', 'sptheme'),
			'id'   => $prefix . 'video_mp4',
			'type' => 'text',
			'std'  => '',
			'desc' => __('For Safari, IE9, iPhone, iPad, Android, and Windows Phone 7.', 'sptheme')
		),
		array(
			'name' => __('WebM File URL', 'sptheme'),
			'id'   => $prefix . 'video_webm',
			'type' => 'text',
			'std'  => '',
			'desc' => __('For Firefox, Opera, and Chrome.', 'sptheme')
		),
		array(
			'name' => __('OGG File URL', 'sptheme'),
			'id'   => $prefix . 'video_ogg',
			'type' => 'text',
			'std'  => '',
			'desc' => __('For older Firefox and Opera versions.', 'sptheme')
		),
		array(
			'name' => __('Preview Image URL', 'sptheme'),
			'id'   => $prefix . 'video_preview',
			'type' => 'text',
			'std'  => '',
			'desc' => ''
		),
		array(
			'name' => __('Aspect Ratio', 'sptheme'),
			'id'   => $prefix . 'video_aspect_ratio',
			'type' => 'text',
			'std'  => '1.7',
			'desc' => __('Video width / video height. (default: 1.7)', 'sptheme')
		),
		array(
			'name' => __('Video Embedded Code', 'sptheme'),
			'id'   => $prefix . 'video_external',
			'type' => 'textarea',
			'std'  => '',
			'desc' => __('If you are not using self hosted video then you can include embedded code here. Best viewed at 600px wide.', 'sptheme'),
			'cols' => '40',
			'rows' => '8'
		)*/
		array(
			'name' => __('Video id', 'sptheme'),
			'id'   => $prefix . 'video_id',
			'type' => 'text',
			'std'  => '',
			'desc' => __('ex: http://www.youtube.com/watch?v=sdUUx5FdySs the id is "sdUUx5FdySs".', 'sptheme'),
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Audio
/* ---------------------------------------------------------------------- */
$meta_boxes[] = array(
	'id'       => 'post-audio-settings',
	'title'    => __('Audio Settings', 'sptheme'),
	'pages'    => array('post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('MP3 File URL', 'sptheme'),
			'id'   => $prefix . 'audio_mp3',
			'type' => 'text',
			'std'  => '',
			'desc' => __('For Safari, Internet Explorer, Chrome.', 'sptheme')
		),
		array(
			'name' => __('OGG File URL', 'sptheme'),
			'id'   => $prefix . 'audio_ogg',
			'type' => 'text',
			'std'  => '',
			'desc' => __('For Firefox, Opera, Chrome.', 'sptheme')
		),
		array(
			'name' => __('External Audio', 'sptheme'),
			'id'   => $prefix . 'audio_external',
			'type' => 'textarea',
			'std'  => '',
			'desc' => __('For example embed code. e.g: embeded code from soundcloud.com', 'sptheme'),
			'cols' => '40',
			'rows' => '8'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Link
/* ---------------------------------------------------------------------- */
/*$meta_boxes[] = array(
	'id'       => 'post-link-settings',
	'title'    => __('Link Settings', 'sptheme'),
	'pages'    => array('post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('Attach file', 'sptheme'),
			'id'   => $prefix . 'news_file',
			'type' => 'plupload_image',
			'max_file_uploads' => 1,
			'std'  => '',
			'desc' => __('Upload news file (.gif, .png, .pdf) that you have scanned from newspaper or from other media.', 'sptheme')
		),
		array(
			'name' => __('Source', 'sptheme'),
			'id'   => $prefix . 'news_source',
			'type' => 'text',
			'std'  => '',
			'desc' => __('Where is this new come from. e.g: Cambodia Daily or Phnom Penh Post...', 'sptheme')
		)
	)
);*/

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function sp_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'sp_register_meta_boxes' );