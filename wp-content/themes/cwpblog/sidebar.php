<?php
/**
 * The sidebar containing the main widget area
 *
 * @package CWP
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!--/sidebar-->
	<?php endif; ?>

