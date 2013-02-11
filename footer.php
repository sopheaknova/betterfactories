<?php global $data; ?>
<?php if ( !is_page_template('page-contact.php') ) { ?>
<div class="container clearfix">
    <hr class="dotted-3">
    <?php 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Bottom sidebar') ) :	
	else :
	?>	
		<div class="non-widget">
		<h3>About This Sidebar</h3>
		<p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place Newsletter widgets into the <strong><em>Footer Bottom sidebar</em></strong> Area', 'sptheme'); ?></p>
		</div>
	<?php	
		endif;
	?>
    
    
</div><!--end .container .clearfix-->
<?php } ?>

<footer id="footer-cols" class="clearfix">
    <div class="container">
    
	<?php 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer sidebar') ) :	
	else :
	?>	
		<div class="non-widget">
		<h3>About This Sidebar</h3>
		<p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place Custom Menu widgets into the <strong><em>Footer sidebar</em></strong> Area', 'sptheme'); ?></p>
		</div>
	<?php	
		endif;
	?>
    
    </div><!--end .container-->
</footer><!--end #footer-cols-->

<footer id="footer-bottom" class="clearfix">
	<div class="container">
    	<div class="one_half">
        <?php echo sp_footer_navigation(); ?>
        <div class="copyright">
        <?php if ( $data['copyrights'] != '') : ?>
        	&copy; <?php echo date('Y');?> BETTER FACTORIES CAMBODIA.
        <?php 
		else: 
        	echo $data['copyrights'];
        endif; 
		?>    
        </div> 
        <ul class="social-links">
        	<!--<li class="twitter"><a href="#" title="Share with us on Twitter">Twitter</a></li>-->
        <?php if ( $data['fb_url'] != '') : ?>
            <li class="facebook"><a href="<?php echo $data['fb_url']; ?>" target="_blank" title="Join us on Facebook">Facebook</a></li>
        <?php endif; ?>    
        <?php if ( $data['youtube_url'] != '') : ?>    
            <li class="youtube"><a href="<?php echo $data['youtube_url']; ?>" target="_blank" title="Watch our video YouTube">YouTube</a></li>
        <?php endif; ?>    

            <!--<li class="googleplus"><a href="#" title="Join us on Google plus">Googleplus</a></li>
            <li class="vimeo"><a href="#" title="Watch our video Vimeo">Vimeo</a></li>
            <li class="linkedin"><a href="#" title="Connect us Linkedin">Linkedin</a></li>
            <li class="skype"><a href="#" title="Add our Skype">Skype</a></li>
            <li class="rss"><a href="#" title="Get our latest rss">rss</a></li>-->
        </ul>
        </div><!--end .two_third--> 
        <div class="power-by one_half last">
        	<a href="<?php echo $data['ilo_url']; ?>" target="_blank" title="International labour organization"><img src="<?php echo SP_BASE_URL; ?>images/ilo-logo.png" alt="International labour organization" /></a>
            <a href="<?php echo $data['ifc_url']; ?>" target="_blank" title="International finance corporation"><img src="<?php echo SP_BASE_URL; ?>images/ifc-logo.png" alt="International finance corporation" /></a>
        </div><!--end .one_third .last--> 
   </div><!--end .container--> 
</footer> <!--end #footer-bottom-->   

<?php echo $data['google_analytics']; ?>

<?php wp_footer(); ?>

</body>
</html>