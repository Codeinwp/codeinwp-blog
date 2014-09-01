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
				<?php if ( is_single() ) : ?>
					<h3 class="singletitle"><?php the_title(); ?></h3>
				<?php else : ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php endif; // is_single() ?>
				<div class="metadata">
					<?php cwp_entry_meta(); ?>
					<?php comments_number( '-No Comments', '-One Comment', '-% Comments' ); ?>
				</div><!--/metadata-->
				<?php
					if ($featured_image_url != NULL) {
						echo '<img class="singleimg" src="'.$featured_image_url.'">';
					}
				?>
				<?php if ( is_single() ) : ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before'      => '<div class="page-links cf"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span><div class="page-links-center">',
								'after'       => '</div></div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
						<div class="post-tags">
							<?php the_tags(); ?>
						</div><!--/.post-tags-->
					</div>
				<?php else : ?>
					<div class="excerpt">
						<?php the_excerpt(); ?>
					</div><!--/excerpt-->
				<?php endif; // is_single() ?>
					<?php comments_template(); ?>
			</div><!--/post-->
			<?php endwhile; // end of the loop. ?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

