<?php
/**
 * The template for displaying the footer
 *
 * @package CWP
 */
?>
	
	</div><!--container / wrap-->
	<div>	<?php echo do_shortcode( '[elementor-template id="23941"]' ); ?></div>
	<footer>

		<div class="container">
		
			<div class="aboutus">
				<div class="logo">	<div itemscope itemtype="http://schema.org/Corporation"><meta itemprop="name" content="Codeinwp"></meta><link itemprop="url" href="https://codeinwp.com/"> <img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/footer_logo.png "/><meta itemprop="vatID" content="RO29109287"></meta><meta itemprop="email" content="support@codeinwp.com"></meta><meta itemprop="legalName" content="Vertigo Studio SRL"></meta></div>
			</div>
				<div class="contact">
					<div class="phone">Call us<br /><span><?php echo get_theme_mod('cwp_footer_phone_number'); ?></span></div>
					<div class="email">Email us<br /><span><?php echo get_theme_mod('cwp_footer_email'); ?></span></div>
				</div><!--/contact-->
			<div class="copyright"><?php cwp_display_copyright(); ?></div><!--/copyright-->
			</div><!--/aboutus-->
    		<?php
                if ( is_active_sidebar( 'sidebar-2' ) ) {
                    dynamic_sidebar( 'sidebar-2' );
    		    }


            ?>
		</div><!--/container  footer-->
	</footer>
	<!-- Scripts -->
<?php wp_footer(); ?>
</body>
</html>
