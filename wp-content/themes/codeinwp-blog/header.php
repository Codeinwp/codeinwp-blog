<!DOCTYPE html>
<?php include TEMPLATEPATH.'/functions/hroptions/hroptionsinc.php'; ?>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/1024.css" type="text/css" media="screen and (min-width: 768px) and (max-width: 1024px)" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/768.css" type="text/css" media="screen and (min-width: 481px) and (max-width: 767px)" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/480.css" type="text/css" media="screen and (max-width: 480px)" />
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]><script src="<?php bloginfo( 'template_url' ); ?>/js/html5shiv.js"></script><![endif]-->
	<?php wp_head(); ?>
	<style type="text/css">
	body { background: url(
		<?php
		$blog_url = get_bloginfo('url');

		if( $hr_bg_url == NULL ) {
			echo $blog_url.'/wp-content/themes/codeinwp-blog/images/bg.png';
		} else {
			echo $hr_bg_url;
		}

		?>
		); }
	</style>
    <meta name="google-site-verification" content="IEKbrccWi1grZiCp8_cSkYPC2rPBjbsevEiN3r3Jowk" />
</head>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=459158690783608";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="topnav">
		<nav>
			<?php 
				$menuParameters = array(
				  'container'       => false,
				  'echo'            => false,
				  'items_wrap'      => '%3$s',
				  'depth'           => 0,
				  'theme_location'=>'top-menu',
				);

				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); 
			?>
		</nav>
		<div id="socialmedia">
			<a href="<?= $hr_fb_link; ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/facebook.png" alt=""></a>
			<a style="display: block; margin-top: 1px;" href="<?= $hr_yt_link; ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/twitter.png" alt=""></a>
			<a href="<?= $hr_tw_link; ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/youtube.png" alt=""></a>
		</div><!--/socialmedia-->
	</div><!--/topnav-->
	<header>
		<div id="logo">
			<a href="<?php bloginfo( 'url' ); ?>">
				<img src="
				<?php
					$blog_url = get_bloginfo('url');

					if( $hr_logo_url == NULL ) {
						echo $blog_url.'/wp-content/themes/codeinwp-blog/images/logo.png';
					} else {
						echo $hr_logo_url;
					}

				?>
				" alt="<?php bloginfo( 'name' ); ?>">
			</a>
		</div><!--/logo-->
		<!--/responsive social media-->
			<div id="respon_socialmedia">
				<a href="<?= $hr_fb_link; ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/r_facebook.png" alt=""></a>
				<a href="<?= $hr_yt_link; ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/r_twitter.png" alt=""></a>
				<a href="<?= $hr_tw_link; ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/r_youtube.png" alt=""></a>
			</div><!--/socialmedia-->
		<!--/responsive social media-->
		<div id="search">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input class="search" type="text" value="type the keyword here" name="s" id="s" onfocus="this.value=''" />
				<input class="searchbutton" type="submit" id="searchsubmit" value="search" />
			</form>
		</div><!--/search-->
	</header>
	<div id="headernav">
		<?php 
				$menuParameters = array(
				  'container'       => false,
				  'echo'            => false,
				  'items_wrap'      => '%3$s',
				  'depth'           => 0,
				  'theme_location'=>'wrap-menu',
				);

				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); 
			?>
	</div><!--/headernav-->