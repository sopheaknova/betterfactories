<?php
/**
 * Template Name: Archives
 */
?>
<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

	<div class="container">

		<header class="page-header">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="cat-article">
                <h1 class="pagetitle"><?php esc_html_e('Archive Index Page', 'sptheme'); ?></h1>
                <div class="single_article_content">
                    <?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'sptheme')); ?>
                   
                </div> <!--Single Article content-->
            </article> <!--End Single Article-->
             <?php 
                endwhile; endif;
            ?>

		</header><!-- end .page-header -->
        <div class="clear"></div>
        
		<?php if( $has_sidebar ): ?>

			<section id="main">
            
		<?php endif; ?>
		<div class="entry-body">
            <div class="one_third">
            
            <h4><?php esc_html_e('Pages', 'sptheme'); ?></h4>
            <ul class="arrow dotted">
                <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                <?php wp_list_pages('title_li='); ?>
            </ul>
           
            <h4><?php esc_html_e('Archives by Year:', 'sptheme'); ?></h4>
            <ul class="arrow">
            <?php wp_get_archives('type=yearly'); ?>
            </ul>
        
            <h4><?php esc_html_e('Archives by Month:', 'sptheme'); ?></h4>
            <ul class="arrow">
            <?php wp_get_archives('type=monthly'); ?>
            </ul>
        
            <h4><?php esc_html_e('Archives by Subject:', 'sptheme'); ?></h4>
            <ul class="arrow">
            <?php wp_list_categories(); ?>
            </ul>
            
            </div><!-- end .one_half -->
            
            <div class="two_third last">
            
            <h3><?php esc_html_e('All Articles', 'sptheme'); ?></h3>
            <ol class="circle">
            <?php query_posts('showposts=-1');
                if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li style="margin-bottom:10px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><br /><?php the_time('j-M-y') ?> &bull; <?php the_author_posts_link(); ?></li>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
            </ol>
            
            </div><!-- end .one_half .last -->
            <div class="clear"></div>
		</div><!-- end .entry-body -->
		<?php if( $has_sidebar ): ?>				
			</section><!-- end #main -->

			<?php get_sidebar(); ?>

		<?php endif; ?>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
