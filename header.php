<?php
	/* get theme options for further processing */
	global $data; 
?>
<!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js"  <?php language_attributes(); ?>     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js"  <?php language_attributes(); ?>     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" <?php language_attributes(); ?>>  <!--<![endif]-->
<head>
	<?php global $data; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- feeds, pingback -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php echo ($data['feedburner'] == '') ? bloginfo( 'rss2_url' ) :  $data['feedburner']; ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <link rel="shortcut icon" href="<?php echo ($data['theme_favico'] == '') ? SP_BASE_URL.'favicon.ico' : $data['theme_favico']; ?>" type="image/x-icon" /> 
    
	<?php wp_head(); ?>
    
    <?php if ( is_home() ) { ?>
    <script type="text/javascript">
	jQuery(document).ready(function($) {
		
		//featured home
		$('.featured-home').cycle({
			fx:       '<?php echo $data['cycle_effect']; ?>',
			slideExpr: '.slide-items',
			pager:  '.nav-slide',
			timeout:   <?php echo $data['cycle_timeout']; ?>,
			delay: <?php echo $data['cycle_speed']; ?>,
			pause: true
		});
		
	});
	</script>
    <?php } ?>
    
    <?php if ( is_page_template('page-teams.php') ) { ?>
    <script type="text/javascript">
	jQuery(document).ready(function($) {
		
		//Featured Staff
		$('#featured-staff').cycle({
			fx:       '<?php echo $data['cycle_effect']; ?>',
			slideExpr: '.staff-slide',
			pager:  '.nav-slide',
			timeout:   <?php echo $data['cycle_timeout']; ?>,
			delay: <?php echo $data['cycle_speed']; ?>,
			pause: true
		});
		
	});
	</script>
    <?php } ?>
    
    <?php if ( is_page_template('page-media-center.php') ) { ?>
    <script type="text/javascript">
	jQuery(document).ready(function($) {
		
		//featured media center page
		$('#featured-media').cycle({
			fx:       '<?php echo $data['cycle_effect']; ?>',
			slideExpr: '.cat-slide-items',
			timeout:   <?php echo $data['cycle_timeout']; ?>,
			delay: <?php echo $data['cycle_speed']; ?>,
			slideResize: 0,
			after: feature_media_after,
			before: feature_media_before,
			pager: 'ul.slider-nav',
			pause: true,
			pagerAnchorBuilder: function(idx, slide) { 
				// return selector string for existing anchor 
				return 'ul.slider-nav li:eq(' + idx + ') a'; 
			} 
			
		});
		
		function feature_media_after() {
			$('#featured-media .caption').stop().animate({opacity:1, bottom:0},{queue:false,duration:300 });
		}
		   
		function feature_media_before() {
			$('#featured-media .caption').stop().animate({opacity:1, bottom:'-120px'},{queue:false,duration:300});
		}
		
		//slider nav
		$('.slider-nav li:not(.activeSlide) a').click( 
				function () {
					$('.slider-nav li a').css('opacity', 0.7);
					$(this).css('opacity', 1);
				}
			);
			
		
		$('.slider-nav li:not(.slider-nav) a').hover( 
				function () {
					$(this).stop(true, true).animate({opacity: 1}, 300);
				}, function () {
					$(this).stop(true, true).animate({opacity: 0.7}, 300);
				}
			);
		
		
		
	});
	</script>
    <?php } ?>
    
</head>

<body <?php body_class(); ?>>

<header id="header">
<div class="container clearfix">
	<div class="logo">
	  	<h2>
        <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
		<?php if($data['theme_logo'] !== '') : ?>
        <img src="<?php echo $data['theme_logo']; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
        <?php else: ?>
        <h1><?php bloginfo('name'); ?></h1>
        <?php endif; ?>
        </a>
        </h2>
  	</div><!-- end .logo -->
    
    <?php 
	//WPML Language Switcher
	if (function_exists('icl_get_languages')) {
		languages_list_header(); 
	}
	?>
    
    <?php if(is_front_page()) : ?>
    <?php 
	$category_name = $data['feature_category'];	
	$category_id = get_cat_ID($category_name);
	  $args = array (
					'cat'  	=> $category_id,
					'posts_per_page'	=> 5
				);
	  $slide_query = new WP_Query($args);
	  if ($slide_query->have_posts()) :
	 ?>
     <div class="featured-home">
     <?php 
	  while ( $slide_query->have_posts() ) : $slide_query->the_post();		  
	  
	  $slide_image = get_post_thumbnail_id( $post->ID );
	  $slide_src = wp_get_attachment_image_src($slide_image, 'slideshow-home');
	  $image = aq_resize( $slide_src[0], 980, 380, true ); //resize & crop the image
	  ?>
      <div class="slide-items">
	  	<?php if ($image) : ?>
        	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
            <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
            </a>
		<?php else:	?>
        	<img src="<?php echo SP_BASE_URL; ?>images/featured-home-980x380.gif" alt="Featured Home" />
        <?php endif; ?>
	    
        <div class="caption">
        	<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        	<p>
            <?php echo sp_excerpt_length(15); ?>
            </p>
            <a class="learn-more button" href="<?php the_permalink(); ?>"><?php _e( 'Learn more »', 'sptheme' ); ?></a>
        </div>
      </div>  
        
      <?php
	  endwhile;
	  ?>
      <div class="nav-slide"></div>
      <?php else: ?>
      <div class="no-slide-status">
      <div class="wrap-status">
      <h3><?php _e('Slideshow are not available.', 'sptheme'); ?></h3>
      <p><?php _e('Make sure the post/article was checked in Slideshow category', 'sptheme'); ?></p>
      </div>
      </div>  
      <?php
	  endif; // end slide
	  ?>   
    </div><!-- end .featured-home -->
    <?php else: ?>
    <div class="heading-image">
    <?php echo sp_check_heading_image(); ?>
    </div>
    <?php endif; // end is_front_page?>
</div><!-- end .container.clearfix -->
</header><!-- end #header -->

<nav id="menu-bar">
<div class="container clearfix">
    <?php echo sp_main_navigation(); ?>
    <?php get_search_form(); ?>
</div>
</nav><!-- end .container.clearfix -->


