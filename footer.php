<?php if ( !is_page_template('page-contact.php') ) { ?>
<div class="container clearfix">
    <hr class="dotted-3">
    <div id="email-subscribe">
    <div class="icon-email-newsletter"><?php _e( 'Want to be notified when we updated? Enter your email address below to be the first to know.', 'sptheme' ); ?></div>
    <form>
        <label for="email"><?php _e( 'Email subscription', 'sptheme' ); ?></label>
        <input type="text" name="email" value="<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;" onblur="if (this.value == '') {this.value = '<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;';}" onfocus="if (this.value == '<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;') {this.value = '';}" class="youremail" />
        <input type="button" value="signup" class="subscribe-btn" />
    </form> 
    </div><!--end #email-subscribe -->
</div><!--end .container .clearfix-->
<?php } ?>

<footer id="footer-cols" class="clearfix">
    <div class="container">
    <!--<div class="one_fifth">
    <h5><a href="#">About BFC</a></h5>
    <ul>
        <li><a href="#">Our mission</a></li>
        <li><a href="#">Our teams</a></li>
        <li><a href="#">Our funders</a></li>
        <li><a href="#">Vacancies</a></li>
        <li><a href="#">Contact us</a></li>
    </ul>
    </div>
    <div class="one_fifth">
    <h5><a href="#">What we do</a></h5>
    <ul>
        <li><a href="#">Monitoring</a></li>
        <li><a href="#">Training</a></li>
        <li><a href="#">Advisory</a></li>
        <li><a href="#">Soicial change initiatives</a></li>
        <li><a href="#">Research</a></li>
    </ul>
    </div>
    <div class="one_fifth">
    <h5><a href="#">Training</a></h5>
    <ul>
        <li><a href="#">Training courses</a></li>
        <li><a href="#">Training schedules</a></li>
        <li><a href="#">Register for training</a></li>
    </ul>
    </div>
    <div class="one_fifth">
    <h5><a href="#">How we work</a></h5>
    <ul>
        <li><a href="#">Tripartite cooperation</a></li>
        <li><a href="#">Better work</a></li>
        <li><a href="#">Private and social parnters</a></li>
        <li><a href="#">Susstainability</a></li>
    </ul>
    </div>
    <div class="one_fifth last">
    <h5><a href="#">Download</a></h5>
    <ul>
        <li><a href="#">Third party access form</a></li>
        <li><a href="#">MOU</a></li>
        <li><a href="#">Buyer subscription form</a></li>
        <li><a href="#">Training registration form</a></li>
        <li><a href="#">Advisory services form</a></li>
    </ul>
    </div>-->
    
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
            <li class="facebook"><a href="#" title="Join us on Facebook">Facebook</a></li>
            <li class="youtube"><a href="#" title="Watch our video YouTube">YouTube</a></li>
            <li class="googleplus"><a href="#" title="Join us on Google plus">Googleplus</a></li>
            <!--<li class="vimeo"><a href="#" title="Watch our video Vimeo">Vimeo</a></li>
            <li class="linkedin"><a href="#" title="Connect us Linkedin">Linkedin</a></li>
            <li class="skype"><a href="#" title="Add our Skype">Skype</a></li>-->
            <li class="rss"><a href="#" title="Get our latest rss">rss</a></li>
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