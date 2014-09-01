			<?php include TEMPLATEPATH.'/functions/hroptions/hroptionsinc.php'; ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post">
				<div class="title"><?php the_title(); ?></div>
				<div class="excerpt"><?php the_content(''); ?></div>
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="470" data-num-posts="10"></div>
			</div><!--/post-->
			<?php endwhile; /* Use PageNavi*/ else : ?>
				<b>404 Not Found</b>
			<?php endif; ?>