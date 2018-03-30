<?php
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

<meta property="fb:pages" content="355212467929786" />




	<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "https://www.codeinwp.com/blog/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.codeinwp.com/blog/?s={search_term}",
    "query-input": "required name=search_term"
  }
}
</script>
<!-- Load the Content Experiment JavaScript API client for the experiment -->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<header class="container cf">
		<?php
		if ( wp_is_mobile() ) {
		//	echo 'Se afiseaza pe mobil';
		//is just a test
		}
		?>
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
			<a href="<?php echo get_theme_mod('cwp_header_facebook'); ?>" target="_blank" class="icon-facebook">
			</a><!--/.icon-->
			<a href="<?php echo get_theme_mod('cwp_header_twitter'); ?>" target="_blank" class="icon-twitter">
			</a><!--/.icon-->
		</div><!--/socialmedia-->
	</header><!--/container-->
    <section id="subheader">
    </section><!--/subheader-->





	<div id="page" class="container cf">
