<?php get_header(); ?>
<div id="wrap">
	<div id="content">
		<?php include TEMPLATEPATH.'/functions/hroptions/hroptionsinc.php'; ?>
		<?php get_template_part( 'loop', 'page' ); ?>
	</div><!--/content-->
	<?php get_sidebar(); ?>
</div><!--/wrap-->
<?php get_footer(); ?>