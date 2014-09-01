<?php 
/**
 * The main template file
 *
 * @package CWP
 */
get_header(); ?>
		<main id="content" role="main">
		<?php if ( have_posts() ) : ?>

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
					<?php comments_number( '-No Comments', '-One Comment', '-% Comments' ); ?>
				</div><!--/metadata-->
				<?php
    				$get_permalink = get_permalink();
					if ($featured_image_url != NULL) {
						echo '<a href="' . $get_permalink . '" class="image"><img src="' . $featured_image_url . '" /></a>';
					}
				?>
				<?php if ( is_single() ) : ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				<?php else : ?>
					<div class="excerpt">
						<?php 
							$myExcerpt = get_the_excerpt();
	 						$tags = array("<p>", "</p>");
	  						$myExcerpt = str_replace($tags, "", $myExcerpt);
	  						echo $myExcerpt; 
  						?> 
						<a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
					</div><!--/excerpt-->
				<?php endif; // is_single() ?>
				<?php if ( !is_single() ) : ?>
				
				<?php endif; // is_single() ?>
			</div><!--/post-->
			<?php endwhile; ?>

			<?php cwp_kriesi_pagination(); ?>

		<?php else : ?>

			<div id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'cwp' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'cwp' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'cwp' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'cwp' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</div><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>