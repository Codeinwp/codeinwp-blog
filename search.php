<?php
/**
 * The template for displaying Search Results pages
 *
 * @package CWP
 */

get_header(); ?>
		<main id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'c' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_single() ) : ?>
						<h3><a><?php the_title(); ?></a></h3>
					<?php else : ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php endif; // is_single() ?>
					<div class="metadata">
						<?php cwp_entry_meta(); ?>
						<?php comments_number( '- No Comments', '- One Comment', '- % Comments' ); ?>
					</div><!--/metadata-->
					<?php
						if ($featured_image_url != NULL) {
							echo '<div class="image" style="background-image: url(' .$featured_image_url .');"></div>';
						}
					?>
					<?php if ( is_single() ) : ?>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					<?php else : ?>
						<div class="excerpt">
							<?php the_content(); ?>
						</div><!--/excerpt-->
					<?php endif; // is_single() ?>
					<?php if ( !is_single() ) : ?>
					<a href="<?php the_permalink(); ?>" class="readmore">Continue Reading...</a>
					<?php endif; // is_single() ?>
				</div><!--/post-->
				<?php endwhile; ?>

				<?php cwp_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'cwp' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cwp' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</main><!--/content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>