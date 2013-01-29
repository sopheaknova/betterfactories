<div class="entry-body">

	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		<h1 class="title"><?php the_title(); ?></h1>
	</a>
    
    <div class="entry-meta">

		<?php echo sp_post_meta(); ?>
    
    </div><!-- end .entry-meta -->

	<?php echo sp_post_content(); ?>

</div><!-- end .entry-body -->