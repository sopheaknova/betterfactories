<?php
/*
Template Name: Publication Reports Page
*/
?>
<?php get_header(); ?>
<section id="content" class="clearfix ">
	<div class="container">
    
    <?php if (have_posts()) while ( have_posts() ): the_post(); ?>
    <div class="page-header">
        
        <h1 class="page-title"><?php echo the_title(); ?></h1>
        
        <?php the_content(); ?>
        
    </div>

    <?php endwhile; ?>
    
	<?php 
	$cat_items = 1;
	$category_name = $data['media_center_cat'];
	$category_id = get_cat_ID($category_name);
	
	foreach (get_categories(array('parent' => $category_id)) as $cat) :  
	$image = aq_resize( z_taxonomy_image_url($cat->term_id), 300, 145, true ); 
	?>
    <aside class="one_third <?php if ( ($cat_items % 3) ==  0) echo 'last'; ?>">
    <div class="widget">
    <h3 class="widget-title"><a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo $cat->name; ?></a></h3>
    <?php if ($image) : ?>
        <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
    <?php else:	?>
        <img src="<?php echo SP_BASE_URL; ?>images/blank-photo-300.gif" alt="Blank photo" />
    <?php endif; ?>
    <?php
    $args = array (
            'cat' 	=> $cat->term_id,
            'posts_per_page'	=> 1
        );
    $report_query = new WP_Query($args);
    if ($report_query->have_posts()) :
    while ( $report_query->have_posts() ) : $report_query->the_post();
    ?>
    <h5><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
    <div class="entry-meta">
        <?php echo sp_post_meta(); ?>
    </div><!-- end .entry-meta -->
    <p>
    <?php sp_excerpt_length(90); ?>
    </p>
    <?php
    endwhile;
    endif;
    ?>
    
    <div class="more-posts">
    <ul>
    <?php $report_query = new WP_Query(array('posts_per_page' => '3', 'offset' => '1', 'cat' => $cat->term_id)); ?>	
    <?php if ($report_query->have_posts()) : while ( $report_query->have_posts() ) : $report_query->the_post(); ?>
    <li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
    <?php
    endwhile;
    endif;
    ?>
        </ul>
    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="learn-more"><?php _e('See more', 'sptheme')?> <?php echo $cat->name; ?> »</a>   
    </div><!-- end .more-posts-->
    </div><!-- end .widget -->
    </aside><!-- end .one_third -->
    
    <?php $cat_items++; endforeach; ?>
    
    <div class="clear"></div>
    
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>