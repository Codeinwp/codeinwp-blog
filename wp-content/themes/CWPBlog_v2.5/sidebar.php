<?php
/**
 * The sidebar containing the main widget area
 *
 * @package CWP
 */
?>
	<aside id="sidebar">
	    <?php if ( !wp_is_mobile() ) { ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php dynamic_sidebar( 'banner-sidebar' ); ?>
		<?php } ?>
	</aside><!--/sidebar-->

