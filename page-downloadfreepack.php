<?php
/**
 *	Template name: Download Free Pack
 *
 *	The template for displaying Download Free Pack.
 *
 *	@package CodeInWp.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php the_title(); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round:400,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/downloadfreepack.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/nivo-lightbox.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/themes/default/default.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/nivo-lightbox.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="wrapper cf">
			<a href="<?php echo home_url(); ?>" id="logo" title="<?php the_title(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-1.png" alt="">
			</a> <!-- a#logo -->
			<h1><?php the_title(); ?></h1>
		</div> <!-- /.wrapper -->
	</header>
	<section role="main" class="cf">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				$downloadfreepack_images = get_post_meta($post->ID, 'cwp_downloadfreepack_images', true); ?>

				<div class="wrapper cf">
					<?php
					if ( $featured_image ) {
						echo '<div id="assets"><img src="'. $featured_image[0] .'" title="'. get_the_title() .'" alt="'. $get_the_title .'" /></div>';
					}

					if ( $featured_image == NULL ) {
						$content_form_class = ' no-featured-image';
					}
					?>
					<div class="content-form<?php echo $content_form_class; ?>">
						<?php the_content(); ?>
					</div> <!-- /#content-form -->

					<div class="cf"></div>
					<a data-popup-target="#example-popup" id="dld" class="popup_window"><?php _e( 'Download', 'cwp' ); ?></a>

					<?php
					if ( $downloadfreepack_images ) {
						echo '<div class="content-gallery cf">';

						foreach( $downloadfreepack_images as $downloadfreepack_image ) {
							echo '<a href="'. $downloadfreepack_image['title'] .'" data-lightbox-gallery="gallery">';
							echo '<div class="content-gallery-image" style="background-image: url('. $downloadfreepack_image['title'] .');"></div>';
							echo '</a>';
						}

						echo '</div>';
					}
					?>

					<div id="example-popup" class="popup">
					    <div class="popup-body"><span class="popup-exit"></span>
					        <div class=" popup-content">
					            <h2 class="popup-title"><?php _e( 'Download Something', 'cwp' ); ?></h2>
					            <?php
					            /*
					            <form>
					            	 <input type="text" placeholder="<?php _e( 'Your email', 'ti' ); ?>">
					            	 <input type="submit" value="<?php _e( 'Send', 'ti' ); ?>">
					           	</form>
					           	*/
					           	?>

					           	<form action="http://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate cf" target="_blank" novalidate>
						            <input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>
						            <div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value="">
						            </div>
						            <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">
						        </form>
					        </div> <!-- popup-content -->
					    </div>
					</div> <!-- #example-popup .popup -->
					<div class="popup-overlay">
					</div><!-- /.popup-overlay -->
					<script>
						jQuery(document).ready(function($) {

							$(window).load(function(){
								jQuery(document).ready(function ($) {

									$('[data-popup-target]').click(function () {
										$('html').addClass('overlay');
										var activePopup = $(this).attr('data-popup-target');
										$(activePopup).addClass('visible');

									});

									$(document).keyup(function (e) {
										if (e.keyCode == 27 && $('html').hasClass('overlay')) {
										    clearPopup();
										}
									});

									$('.popup-exit').click(function () {
										clearPopup();

									});

									$('.popup-overlay').click(function () {
										clearPopup();
									});

									function clearPopup() {
										$('.popup.visible').addClass('transitioning').removeClass('visible');
										$('html').removeClass('overlay');

										setTimeout(function () {
										    $('.popup').removeClass('transitioning');
										}, 200);
									}

								});
							});

							$(document).ready(function(){
							    $('.content-gallery a').nivoLightbox();
							});
						});
					</script>
				</div> 	<!-- /.wrapper -->
			<?php }
			}
		?>
	</section>
	<div class="cf"></div>
	<footer class="cf">
		<div class="wrapper">
			<p><?php _e( 'Copyright &copy; 2014', 'cwp' ); ?> <a href="http://www.themeisle.com" title="<?php _e( 'ThemeIsle', 'ti' ); ?>" target="_blank"><?php _e( 'ThemeIsle', 'ti' ); ?></a></p>
			<nav>
				<ul>
					<li><a href="http://www.codeinwp.com/blog" title="<?php _e( 'Blog', 'cwp' ); ?>" target="_blank"><?php _e( 'Blog', 'cwp' ); ?></a></li>
					<li><a href="http://www.codeinwp.com" title="<?php _e( 'Services', 'cwp' ); ?>" target="_blank"><?php _e( 'Services', 'cwp' ); ?></a></li>
				</ul>
			</nav>
		</div>	<!-- /.wrapper -->
	</footer>
</body>
</html>