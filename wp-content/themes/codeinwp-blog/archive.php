<?php get_header(); ?>
	<div id="wrap">
		<div id="content">

			<div class="archivetitle"><?php single_cat_title(); ?></div>
			
			<?php 
				if (have_posts()) : while (have_posts()) : the_post();  //Get posts
			?>
			<div class="post">
				<div class="date">in 
					<?php
					$category = get_the_category(); 
					echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';

					//print_r($category);
					//$category[0]->cat_name;
					?> 
					- <?php the_time('d M, Y') ?>
				</div>
				<div class="author">by <?php the_author(); ?> <span> - <?php comments_number( 'no comments', 'one comment', '% comments' ); ?></span></div><div class="clearfix"></div>
				<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="excerpt"><?php the_excerpt(); ?></div>
				<div class="readmore"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">read more</a></div><!--/readmore-->
			</div><!--/post-->
			<?php endwhile; ?>
   
			<div class="pagination">
				<div class="prev"><?php next_posts_link( __( 'prev', 'twentyten' ) ); ?></div>
	    		<?php pagenavi(); ?>
	    		 <div class="next"><?php previous_posts_link( __( 'next', 'twentyten' ) ); ?></div>
    		</div><!-- /pagination-->
	        <?php else : ?>
            404 Nothing here. Sorry.
	        <?php endif; ?>
			<!--
				<a class="prev">prev</a>
				<a href="">1</a>
				<a href="">2</a>
				<a href="">3</a>
				<a href="">4</a>
				<a href="">5</a>
				<a class="next">next</a>
			-->
		</div><!--/content-->
		<?php get_sidebar(); ?>
	</div><!--/wrap-->
<?php get_footer(); ?>