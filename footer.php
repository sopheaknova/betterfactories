<?php global $data; ?>
<?php if ( !is_page_template('page-contact.php') ) { ?>
<div class="container clearfix">
    <hr class="dotted-3">
    <div id="email-subscribe">
    <div class="icon-email-newsletter"><?php _e( 'Want to be notified when we updated? Enter your email address below to be the first to know.', 'sptheme' ); ?></div>
    <form>
        <label for="email"><?php _e( 'Email subscription', 'sptheme' ); ?></label>
        <input type="text" name="email" value="<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;" onblur="if (this.value == '') {this.value = '<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;';}" onfocus="if (this.value == '<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;') {this.value = '';}" class="youremail" />
        <input type="submit" value="signup" class="subscribe-btn" />
    </form> 
    </div><!--end #email-subscribe -->
</div><!--end .container .clearfix-->
<?php } ?>

<footer id="footer-cols" class="clearfix">
    <div class="container">
    
	<?php 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer sidebar') ) :	
	endif;
	?>
    
    </div><!--end .container-->
</footer><!--end #footer-cols-->

<footer id="footer-bottom" class="clearfix">
	<div class="container">
    	<div class="one_half">
        <?php echo sp_footer_navigation(); ?>
        <div class="copyright">&copy; <?php echo date('Y');?> BETTER FACTORIES CAMBODIA.</div> 
        <ul class="social-links">
        	<!--<li class="twitter"><a href="#" title="Share with us on Twitter">Twitter</a></li>-->
        <?php if ( $data['fb_url'] != '') : ?>
            <li class="facebook"><a href="#" title="Join us on Facebook">Facebook</a></li>
        <?php endif; ?>    
        <?php if ( $data['youtube_url'] != '') : ?>    
            <li class="youtube"><a href="#" title="Watch our video YouTube">YouTube</a></li>
        <?php endif; ?>    

            <!--<li class="googleplus"><a href="#" title="Join us on Google plus">Googleplus</a></li>
            <li class="vimeo"><a href="#" title="Watch our video Vimeo">Vimeo</a></li>
            <li class="linkedin"><a href="#" title="Connect us Linkedin">Linkedin</a></li>
            <li class="skype"><a href="#" title="Add our Skype">Skype</a></li>
            <li class="rss"><a href="#" title="Get our latest rss">rss</a></li>-->
        </ul>
        </div><!--end .two_third--> 
        <div class="power-by one_half last">
        	<a href="#" target="_blank" title="International labour organization"><img src="<?php echo SP_BASE_URL; ?>images/ilo-logo.png" alt="International labour organization" /></a>
            <a href="#" target="_blank" title="International finance corporation"><img src="<?php echo SP_BASE_URL; ?>images/ifc-logo.png" alt="International finance corporation" /></a>
        </div><!--end .one_third .last--> 
   </div><!--end .container--> 
</footer> <!--end #footer-bottom-->   
<?php wp_footer(); ?>
</body>
</html>