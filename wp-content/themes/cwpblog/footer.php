<?php
/**
 * The template for displaying the footer
 *
 * @package CWP
 */
?>
	</div><!--container / wrap-->
	<footer>
		<div class="container">
			<div class="aboutus">
				<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/footer_logo.png" alt=""></div>
				<div class="contact">
					<div class="phone">Call us<br /><span><?php echo get_theme_mod('cwp_footer_phone_number'); ?></span></div>
					<div class="email">Email us<br /><span><?php echo get_theme_mod('cwp_footer_email'); ?></span></div>
				</div><!--/contact-->
				<div class="copyright">
					© 2012 codeinwp.com. All Rights Reserved. <br />
					WordPress logo is Copyright © WordPress.com
				</div><!--/copyright-->
			</div><!--/aboutus-->
			<nav class="fmenu">
				<div class="title">Support & Contact</div>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary') ); ?>
			</nav><!--/fmenu-->

			<nav class="fmenu">
				<div class="title">Services</div>
				<?php wp_nav_menu( array( 'theme_location' => 'third') ); ?>
			</nav><!--/fmenu-->
		</div><!--/container  footer-->
	</footer>
	<!-- Scripts -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.min.js"></script>
	<script>
		//Setup parallax
		var scene = document.getElementById('subheader');
		var parallax = new Parallax(scene);

	</script>
	<?php wp_footer(); ?>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34374795-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>