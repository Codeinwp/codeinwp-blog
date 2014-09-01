<?php
/**
 * The template for displaying all pages
 *
 * @package CWP
 */


get_header(); ?>
		<main id="content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
			<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3><a><?php the_title(); ?></a></h3>
				<div class="metadata">
				<?php cwp_entry_meta(); ?>
				<?php comments_number( '- No Comments', '- One Comment', '- % Comments' ); ?>
				</div><!--/metadata-->
				<div class="entry-content excerpt">
					<?php the_content(); ?>
				    <?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>
				</div><!--/entry-content-->
			</div><!--/post-->


			<?php	endwhile; 	?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

