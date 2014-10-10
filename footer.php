<?php
	$address = ot_get_option("address");
	$phone = ot_get_option("phone_number");
?>

<footer role="contentinfo">
	<div class="footer-top">
		<div class="wrapper">
			<div class="general-info">
				<div class="contact">
					<h3>Contact Us</h3>
					<h4>Morse Entertainment</h4>
					<div class="address"><?php echo $address; ?></div>
					<p class="phone"><?php echo 'Office: ' . $phone; ?></p>
				</div>
				<a class="button" href="http://www.djmikemorse.djintelligence.com/contact/">Book Your Event Today</a>
				<ul class="social">
		        	<li><a class="twitter" href="<?php echo ot_get_option('twitter_url'); ?>"><i class="icon-twitter"></i></a></li>
		        	<li><a class="facebook" href="<?php echo ot_get_option('facebook_url'); ?>"><i class="icon-facebook"></i></a></li>
		        	<li><a class="instagram" href="<?php echo ot_get_option('instagram_url'); ?>"><i class="icon-instagram"></i></a></li>
		        	<li><a class="youtube" href="<?php echo ot_get_option('youtube_url'); ?>"><i class="icon-youtube"></i></a></li>			
				</ul>
			</div>
			
			<div class="inquiry-form">
			<?php echo do_shortcode('[contact-form-7 id="19" title="Primary Contact Form"]'); ?>
			</div>
			
	        <nav role="navigation">
	            <?php
	                $args = array(
	                    'container' => 'false',
	                    'items_wrap' => '<ul>%3$s</ul>',
						'depth' => 1,
	                    );
	                wp_nav_menu($args);
	            ?>
	        </nav>
		</div>
	</div>
	
	<div class="footer-bottom">
		<div class="wrapper">
			<p>Copyright &copy;<?php echo date("Y"); ?> Morse Entertainment.  All Rights Reserved.</p>		
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- Scripts -->
    <!--
    Please be sure you need jQuery for your project, if you don't, remove it
    If lt IE9 support is needed, use jQuery 1.x.x, v2 doesn't support it -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/jquery-2.0.3.min.js"%3E%3C/script%3E'))</script>
    <script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/scripts.min.js"></script>

<!-- Scripts -->

<?php if ( is_singular() ) wp_print_scripts( 'comment-reply' ); ?>
</body>
</html>