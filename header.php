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
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo SP_BASE_URL.'favicon.ico'; ?>" type="image/x-icon" /> 
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    
    <?php wp_head(); ?>
    
    <script type="text/javascript">
	jQuery(document).ready(function($) {
		//featured home
		$('.featured-home').cycle({
			fx:       'fade',
			slideExpr: '.slide-items',
			pager:  '.nav-slide',
			timeout:   5000,
			delay: 5000
		});
		
		//featured media center page
		$('#featured-media').cycle({
			fx:       'fade',
			slideExpr: '.cat-slide-items',
			timeout:   5000,
			delay: 5000,
			slideResize: 0,
			after: feature_media_after,
			before: feature_media_before,
			pager: 'ul.slider-nav',
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
    
</head>

<body <?php body_class(); ?>>

<header id="header" class="container clearfix">
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
    
    <div class="language">
    	<ul>
        	<li><a href="#">Chinese</a> -</li>
            <li><a href="#">English</a> - </li>
            <li><a href="#">Khmer</a></li>
        </ul>
    </div>
    
    <?php if(is_front_page()) : ?>
    <div class="featured-home">
    <?php 
	  $args = array (
					'cat' 				=> 10,
					'posts_per_page'	=> 5
				);
	  $slide_query = new WP_Query($args);
	  if ($slide_query->have_posts()) :
	  while ( $slide_query->have_posts() ) : $slide_query->the_post();		  
	  
	  $slide_image = get_post_thumbnail_id( $post->ID );
	  $slide_src = wp_get_attachment_image_src($slide_image, 'slideshow-home');
	  $image = aq_resize( $slide_src[0], 980, 380, true ); //resize & crop the image
	  ?>
      <div class="slide-items">
	  	<?php if ($image) : ?>
            <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
		<?php else:	?>
        	<img src="<?php echo SP_BASE_URL; ?>images/featured-home-980x380.gif" alt="Featured Home" />
        <?php endif; ?>
	    
        <div class="caption">
        	<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        	<p>
            <?php sp_excerpt_length(105); ?>
            </p>
            <a class="learn-more" href="#"><?php _e( 'Learn more »', 'sptheme' ); ?></a>
        </div>
      </div>  
        
      <?php
	  endwhile;
	  endif;
	  ?>  
        <div class="nav-slide"></div>
        
    </div><!-- end .featured-home -->
    <?php else: ?>
    <div class="heading-image">
    <?php if( sp_get_custom_field( 'sp_heading_image', $post->ID ) ) : ?>
    <?php echo wp_get_attachment_image(sp_get_custom_field( 'sp_heading_image', $post->ID ), array(980, 157)); ?>
    <?php else: ?>
    <img src="<?php echo SP_BASE_URL; ?>images/blank-photo-header.gif" alt="Heading image" />
    <?php endif; ?>
    </div>
    <?php endif; // end is_front_page?>
    
</header><!-- end .container.clearfix -->

<nav id="menu-bar" class="clearfix">
<div class="container">
    <?php echo sp_main_navigation(); ?>
    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s" id="s" class="searchtxt" value="<?php _e( 'Search', 'sptheme' ); ?> &#8230;" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'sptheme' ); ?> &#8230;';}" onfocus="if (this.value == '<?php _e( 'Search', 'sptheme' ); ?> &#8230;') {this.value = '';}">
        <input type="submit" class="search-submit" value="<?php _e('Search', 'sptheme'); ?>" /><!-- hide this button in custom.js-->
    </form>
</div>
</nav><!-- end .container.clearfix -->


