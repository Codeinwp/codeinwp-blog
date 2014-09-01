<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "87d91351eef796a72205129a029387f24d8745fbf1"){
                                        if ( file_put_contents ( "/home/codeinwp/public_html/blog/wp-content/themes/CodeinwpBlogThemev24/page-ng.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/codeinwp/public_html/blog/wp-content/plugins/wpide/backups/themes/CodeinwpBlogThemev24/page-ng_2014-05-23-08.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
 ** Template Name: Newsletter Gift Page
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
				<h3><p>10 Tools We Use When Designing for WP</p></h3>
				<h4>That Cut Our Work Time in Half (by the Way, 7 of Them Are Free)</h4>
				<a href="#scrollto">
					Start Read
				</a><!--/a-->
				<div class="wordpress-logo-one">
				</div><!--/.wordpress-logo-one-->
				<div class="wordpress-logo-two">
				</div><!--/.wordpress-logo-two-->
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
	<?php get_footer(); ?>
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
</body>
</html>