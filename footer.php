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
				<div class="logo">	<div itemscope itemtype="http://schema.org/Corporation"><meta itemprop="name" content="Codeinwp"></meta><link itemprop="url" href="http://codeinwp.com/"> <img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/footer_logo.png "/><meta itemprop="vatID" content="RO29109287"></meta><meta itemprop="email" content="support@codeinwp.com"></meta><meta itemprop="legalName" content="Vertigo Studio SRL"></meta></div>
			</div>
				<div class="contact">
					<div class="phone">Call us<br /><span><?php echo get_theme_mod('cwp_footer_phone_number'); ?></span></div>
					<div class="email">Email us<br /><span><?php echo get_theme_mod('cwp_footer_email'); ?></span></div>
				</div><!--/contact-->
			<div class="copyright">
                <?php cwp_display_copyright(); ?>
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
	<script>
    jQuery(document).ready(function($) {
    	//Setup parallax
    	var scene = document.getElementById('subheader');
    	if (Parallax) var parallax = new Parallax(scene);
    });
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
  jQuery("#mc-embedded-subscribe").click(function(){

    _gaq.push(['_trackEvent', 'Subscribe', 'Subscribed', '<?php the_permalink();?>']);
    window._tfa = window._tfa || [];
    _tfa.push({notify:"action", name: 'conversion'});

  })

  jQuery(".mc-field-group .button").click(function(){

    _gaq.push(['_trackEvent', 'Subscribe', 'Subscribed', '<?php the_permalink();?>']);
    window._tfa = window._tfa || [];
    _tfa.push({notify:"action", name: 'conversion'});

  })
  




</script>

 
<script type="text/javascript">
(function (tos) {
  window.setInterval(function () {
    tos = (function (t) {
      return t[0] == 50 ? (parseInt(t[1]) + 1) + ':00' : (t[1] || '0') + ':' + (parseInt(t[0]) + 10);
    })(tos.split(':').reverse());
    window.pageTracker ? pageTracker._trackEvent('Time', 'Log', tos) : _gaq.push(['_trackEvent', 'Time', 'Log', tos]);
        
  
        

  }, 10000);
})('00');
</script>
<script>



jQuery(document).ready(function($) {
    var filetypes = /\.(zip|exe|dmg|pdf|doc.*|xls.*|ppt.*|mp3|txt|rar|wma|mov|avi|wmv|flv|wav)$/i;
    var baseHref = '';
    if (jQuery('base').attr('href') != undefined) baseHref = jQuery('base').attr('href');
 
    jQuery('a').on('click', function(event) {
      var el = jQuery(this);
      var track = true;
      var href = (typeof(el.attr('href')) != 'undefined' ) ? el.attr('href') :"";
      var isThisDomain = href.match(document.domain.split('.').reverse()[1] + '.' + document.domain.split('.').reverse()[0]);
      if (!href.match(/^javascript:/i)) {
        var elEv = []; elEv.value=0, elEv.non_i=false;
        if (href.match(/^mailto\:/i)) {
          elEv.category = "email";
          elEv.action = "click";
          elEv.label = href.replace(/^mailto\:/i, '');
          elEv.loc = href;
        }
        else if (href.match(filetypes)) {
          var extension = (/[.]/.exec(href)) ? /[^.]+$/.exec(href) : undefined;
          elEv.category = "download";
          elEv.action = "click-" + extension[0];
          elEv.label = href.replace(/ /g,"-");
          elEv.loc = baseHref + href;
        }
        else if (href.match(/^https?\:/i) && !isThisDomain) {
          elEv.category = "external";
          elEv.action = "click";
          elEv.label = href.replace(/^https?\:\/\//i, '');
          elEv.non_i = true;
          elEv.loc = href;
        }
        else if (href.match(/^tel\:/i)) {
          elEv.category = "telephone";
          elEv.action = "click";
          elEv.label = href.replace(/^tel\:/i, '');
          elEv.loc = href;
        }
        else track = false;
        // set cookie for external clicks
        
        function createCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }
        
        createCookie('externalclick','yes',7);
        
        //track fb event for external clicks
        window._fbq.push(['track', 'ViewContent', {type:'external'}]);
      }
    })
})
        </script>
</body>
</html>
