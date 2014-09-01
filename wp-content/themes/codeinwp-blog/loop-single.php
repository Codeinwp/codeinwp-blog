			<?php include TEMPLATEPATH.'/functions/hroptions/hroptionsinc.php'; ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
				<div class="title"><?php the_title(); ?></div>
				<div class="excerpt"><?php the_content(''); ?></div>
				<!--<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="470" data-num-posts="10"></div>-->
			<div class="headerbanner">
                        <a href="http:///www.guide.codeinwp.com" target="_blank"><img src="http://themes.codeinwp.com/wp-content/themes/Themeshop/images/468x60.png"></a>
                    </div>
            </div><!--/post-->
			<?php comments_template( '', true ); ?>
			<?php endwhile; /* Use PageNavi*/ else : ?>
				<b>404 Not Found</b>
			<?php endif; ?>