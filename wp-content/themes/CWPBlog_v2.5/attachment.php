<?php
/**
 * The Template for displaying all single posts
 *
 * @package CWP
 */

get_header(); ?>
		<main id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3 class="singletitle"><?php the_title(); ?></h3>
				<?php
					if ($featured_image_url != NULL) {
						echo '<img class="singleimg" src="'.$featured_image_url.'">';
					}
				?>
			</div><!--/post-->
			<?php endwhile; // end of the loop. ?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

