<?php
/**
 * The Template for displaying all single posts
 *
 * @package CWP
 */

get_header(); ?>
		<main id="content" role="main" itemprop="" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php 
			if ($_GET['display']!=="wide" || get_post_meta( get_the_ID(), 'infographic', true )=="") { ?>

			<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
				<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
				<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
   <meta itemprop="name" content="Codeinwp">
   <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
      
      <meta itemprop="url" content="http://www.codeinwp.com/blog/wp-content/themes/CWPBlog_v2.6/images/logo.png">
      <meta itemprop="width" content="255">
      <meta itemprop="height" content="60">
    </div></div>
				<h1 class="singletitle" class="single-post-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
				<div class="metadata">
					<?php cwp_entry_meta(); ?>
					<?php comments_number( '- No Comments', '- One Comment', '- % Comments' ); ?>
				</div><!--/metadata-->
				<?php
					if ($featured_image_url != NULL) {
					    echo '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><img class="singleimg" src="'.$featured_image_url.'"><meta itemprop="url" content="'.$featured_image_url.'">
    <meta itemprop="width" content="800">
    <meta itemprop="height" content="400"></div>';
					
					}
				?>

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before'      => '<div class="page-links cf"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span><div class="page-links-center">',
								'after'       => '</div></div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );

        
                            if( has_tag() ) {
                                echo '<div class="post-tags">
            						'.the_tags().'
        						</div><!--/.post-tags-->';
                            }
                            else {

                            }
						?>

                        <div class="cf"></div>
					</div>
					<?php comments_template(); ?>
			</div><!--/post-->
			<?php } else { 
			
			?>
			    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3 class="singletitle"><?php the_title(); ?></h3>
				<img src="<?php echo get_post_meta( get_the_ID(), 'infographic', true );?>"></img>
			</div>
			<?php } endwhile; // end of the loop. 
			?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

