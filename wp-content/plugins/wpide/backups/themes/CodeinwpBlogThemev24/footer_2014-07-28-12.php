<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "96f4d93c0ff08eb78595e3a286383c337b79aff5cb"){
                                        if ( file_put_contents ( "/home/codeinwp/public_html/blog/wp-content/themes/CodeinwpBlogThemev24/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/codeinwp/public_html/blog/wp-content/plugins/wpide/backups/themes/CodeinwpBlogThemev24/footer_2014-07-28-12.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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
    		<?php 
                if ( is_active_sidebar( 'sidebar-2' ) ) {
                    dynamic_sidebar( 'sidebar-2' );
    		    } 
                
                
            ?>
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
    <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34374795-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  jQuery("#mc-embedded-subscribe").click(function(){
  
    _gaq.push(['_trackEvent', 'Subscribe', 'Subscribed', '<?php the_permalink();?>']);
    
  })
  
  jQuery(".mc-field-group .button").click(function(){
  
    _gaq.push(['_trackEvent', 'Subscribe', 'Subscribed', '<?php the_permalink();?>']);
    
  })
  
  

</script>
<script type="text/javascript">
  (function() {
    window._pa = window._pa || {};
    // _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
    // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
    // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/52b64a399cbe25d21f000003.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
</script>
  <script type="text/javascript">
(function(){
    window._EP   = "https://www.manycontacts.com";
    window.__bID = "53a149b780df1a843f68e6d3";
    document.body.appendChild(
        document.createElement("script")
    ).src = window._EP + "/assets/js/manycontacts.min.js";
})();
</script>              
</body>
</html>