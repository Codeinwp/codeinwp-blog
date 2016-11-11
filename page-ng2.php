<?php
/*
 ** Template Name: Newsletter Gift Page 2
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ngstyle.css">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/cwpfavicon.png">
	<script type="text/javascript">
    window._tfa = window._tfa || [];
    _tfa.push({notify:"action", name: 'conversion'});
</script>
<script src="//cdn.taboola.com/libtrc/VertigoStudioSRLsc/tfa.js"></script>
</head>
<body>
	<section id="intro">
		<header class="container cf">
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/gift/logo.png" alt="">
				</a>
			</div><!--/logo-->
			<nav id="headernav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			</nav>
		</header><!--/container-->
		<div class="container">
			<div class="subheader">
				<em>Thank you for subscribing!</em>
				<h2>Here's the content we promised you:</h2>
				<a href="#scrollto">
					Start Reading
				</a><!--/a-->
			</div><!--/.subheader-->
		</div><!--/container-->
	</section><!--/intro-->
	<a name="scrollto" id="scrollto"></a>
	<section id="stripe">
	
		<div class="container cf">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php the_content(); ?>
			<?php endwhile; ?>
		</div><!--/.container .cf-->
	</section><!--/stripe-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script>
	var viewportHeight = $(window).height()
	$('#intro').css('height', viewportHeight);
	$('.subheader a').click(function() {
	    $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 500);
        return false;
	});
	</script>
	<?php get_footer(); ?>
	
