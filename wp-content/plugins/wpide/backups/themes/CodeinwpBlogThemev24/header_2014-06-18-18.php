<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "96f4d93c0ff08eb78595e3a286383c3347b5c34259"){
                                        if ( file_put_contents ( "/home/codeinwp/public_html/blog/wp-content/themes/CodeinwpBlogThemev24/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/codeinwp/public_html/blog/wp-content/plugins/wpide/backups/themes/CodeinwpBlogThemev24/header_2014-06-18-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The Header for our theme
 *
 * @package CWP
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/cwpfavicon.png">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="container cf">
		<div id="logo">
			<?php
				if (get_theme_mod('cwp_header_logo') == false) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('title'); ?>"/>
					</a><!--/a-->
			<?php } else { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_theme_mod('cwp_header_logo'); ?>" alt="<?php bloginfo('title'); ?>"/>
				</a>
			<?php } ?>
		</div><!--/logo-->
		<nav id="headernav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
		</nav>
		<div class="socialmedia">
			<a href="<?php echo get_theme_mod('cwp_header_facebook'); ?>" target="_blank" class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt=""></a>
			<a href="<?php echo get_theme_mod('cwp_header_twitter'); ?>" target="_blank" class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt=""></a>
		</div><!--/socialmedia-->
	</header><!--/container-->
	<section id="subheader">
	</section><!--/subheader-->

	<script>
			var currentTime = new Date().getHours();
				//console.log(currentTime);

			if (0 <= currentTime&&currentTime < 12) {
				jQuery('#subheader').addClass('morning');
				var morning = '<div class="container">' +
								'<div data-depth="0.20" class="layer triunghi_mare noon"></div>' +
								'<div data-depth="0.10" class="layer triunghi_mic noon"></div>' +
								'<div data-depth="0.0" class="layer sunmorning"></div>' +
								'<div data-depth="0.20" class="layer poly_globe"></div>' +
								'<div data-depth="0.60" class="layer noonrocketmorning"></div>' +
								
								'<form action="http://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' +
									'<div class="newsletter">Get the list of 10 Tools We Use <br /><span>When Designing for WP That Cut<br />Our Work Time in Half<br />(by the Way, 7 of Them Are Free)</span></div>' +
									'<input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>' +
                                    '<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value=""></div>' +
                                    '<input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">' +
								'</form>' +
								
							'</div><!--/container-->';
				jQuery('#subheader').append(morning);
				jQuery('#headernav ul li:last').addClass('morning');
		    }

		    if (12 <= currentTime&&currentTime < 20) {
		    	jQuery('#subheader').addClass('noonday');
		    	var noon = '<div class="container">' +
								'<div data-depth="0.20" class="layer triunghi_mare noon"></div>' +
								'<div data-depth="0.10" class="layer triunghi_mic noon"></div>' +
								'<div data-depth="0.40" class="layer sun"></div>' +
								'<div data-depth="0.20" class="layer poly_globe"></div>' +
								'<div data-depth="0.60" class="layer noonrocket"></div>' +
								'<div data-depth="0.30" class="layer circleone"></div>' +
								'<div data-depth="0.90" class="layer circletwo"></div>' +
								'<form action="http://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' +
    								'<div class="newsletter">Get the list of 10 Tools We Use <br /><span>When Designing for WP That Cut<br />Our Work Time in Half<br />(by the Way, 7 of Them Are Free)</span></div>' +
									'<input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>' +
                                    '<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value=""></div>' +
                                    '<input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">' +
								'</form>' +
							'</div><!--/container-->';
				jQuery('#subheader').append(noon);
				jQuery('#headernav ul li:last').addClass('day');
		    }

		    if (20 <= currentTime&&currentTime < 24) {
		    	jQuery('#subheader').addClass('night');
		    	var night = '<div class="container">' +
								'<div data-depth="0.20" class="layer triunghi_mare"></div>' +
								'<div data-depth="0.10" class="layer triunghi_mic"></div>' +
								'<div data-depth="0.40" class="layer stars"></div>' +
								'<div data-depth="0.30" class="layer astar_big">' +
									'<div class="star dot_one"></div>' +
									'<div class="star dot_two"></div>' +
									'<div class="star dot_three"></div>' +
									'<div class="star dot_four"></div>' +
								'</div><!--/astar_big-->' +

								'<div data-depth="0.10" class="layer astar_small">' +
									'<div class="star_small dot_five"></div>' +
									'<div class="star_small dot_six"></div>' +
									'<div class="star_small dot_seven"></div>' +
									'<div class="star_small dot_eight"></div>' +
									'<div class="star_small dot_nine"></div>' +
								'</div><!--/astar_small-->' +
								'<div data-depth="0.50" class="layer wordpress_stars"></div>' +
								'<div data-depth="0.20" class="layer poly_globe"></div>' +
								'<div data-depth="0.60" class="layer night_rocket"></div>' +
							
								'<form action="http://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' +
    								'<div class="newsletter">Get the list of 10 Tools We Use <br /><span>When Designing for WP That Cut <br />Our Work Time in Half <br />(by the Way, 7 of Them Are Free)</span></div>' +
									'<input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>' +
                                    '<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value=""></div>' +
                                    '<input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">' +
								'</form>' +
								
							'</div><!--/container-->';
				jQuery('#subheader').append(night);
				jQuery('#headernav ul li:last').addClass('night');
		    }

	</script>



	<div id="page" class="container cf">