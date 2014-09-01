<?php include TEMPLATEPATH.'/functions/hroptions/hroptionsinc.php'; ?>
<footer>
		<div id="footer_center">
			<div class="footer_item">
				<div class="footer_logo"><img src="<?php bloginfo( 'template_url' ); ?>/images/footer-logo.png" alt=""></div>
				<div class="footer_contact">
					<div class="call"><span>Call us</span><br><?= $hr_phone_nr; ?></div>
					<div class="email"><span>Email us</span><br><?= $hr_e_mail; ?></div>
				</div><!--/footer_contact-->
				<div class="copyright">
				Developed by <a href="http://www.codeinwp.com" rel="nofollow">Codeinwp.com</a>  <br> 
				WordPress icon / logo is Copyright © WordPress.com</div>
			</div><!--/footer_item-->
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer One') ) : ?>
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Two') ) : ?>
			<?php endif; ?>
		</div>
	</footer>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34374795-1']);
  _gaq.push(['_trackPageview']);
	_gaq.push(['_setSiteSpeedSampleRate', 100]);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
	<?php wp_footer(); ?>
</body>
</html>