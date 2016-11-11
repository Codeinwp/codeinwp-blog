<?php
/**
 * The template for displaying Tag pages
 *
 * @package CWP
 */

get_header(); ?>
		<main id="content" role="main">

			<?php if ( have_posts() ) : ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'cwp' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

				<?php if ( tag_description() ) : // Show an optional tag description ?>
					<div class="archive-meta"><?php echo tag_description(); ?></div>
				<?php endif; ?>
				</header><!-- .archive-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content.
					 */
					 $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
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
						<?php the_excerpt(); ?>
					</div><!--/excerpt-->
				<?php endif; // is_single() ?>
				<?php if ( !is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" class="readmore">Continue Reading...</a>
				<?php endif; // is_single() ?>
			</div><!--/post-->

				<?php endwhile; ?>

				<?php cwp_kriesi_pagination(); ?> 

			<?php else : ?>
			<?php endif; ?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>