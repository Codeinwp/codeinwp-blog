<?php
//Admin panel
include TEMPLATEPATH.'/functions/hroptions/hroptionsframework.php'; 
include TEMPLATEPATH.'/functions/hroptions/hroptionsarray.php';

//menus
register_nav_menus(
  array(
    'top-menu' => __( 'Top Menu' ),
    'wrap-menu' => __( 'Content Menu' ))
  );

//Remove rubbish
function remove_cat_item($wp_list_categories) {

		$patterns = array(); $replacements = array();

		$patterns[0] = '/class=\"(cat-item cat-item-[0-9]+) current-cat\"/';

		$replacements[0] = 'class="current-cat" ';

		$patterns[1] = '/ class="cat-item cat-item-(.*?)\"/';

		$replacements[1] = '';

		return preg_replace($patterns, $replacements, $wp_list_categories);

}

add_filter('wp_list_categories','remove_cat_item');



function remove_tag_link($wp_tag_cloud) {

	return preg_replace('/ class=\'tag-link-(.*?)\'/', '', $wp_tag_cloud);

}

add_filter('wp_tag_cloud', 'remove_tag_link');



function remove_page_class($wp_list_pages) {
	
return preg_replace('/\<li class="page_item[^>]*>/', '<li>', $wp_list_pages);

}

add_filter('wp_list_pages', 'remove_page_class');


//Pagenavi
function pagenavi( $p = 5 ) {
 
if ( is_singular() ) return;
 
global $wp_query, $paged;
 
$max_page = $wp_query->max_num_pages;
 
if ( $max_page == 1 ) return;
 
if ( empty( $paged ) ) $paged = 1;
 
//echo '<span>' . $paged . ' / ' . $max_page . ' </span> '; 
 
if ( $paged > $p + 1 ) p_link( 1, '' );
 
if ( $paged > $p + 2 ) echo '<span>...</span>';
 
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
 
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='current'>{$i}</span> " : p_link( $i );
 
}
if ( $paged < $max_page - $p - 1 ) echo '<span>...</span>'; 

if ( $paged < $max_page - $p ) p_link( $max_page, '' );
}
 
function p_link( $i, $title = '' ) {
 
if ( $title == '' ) $title = "";
 
echo "<a href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";
 
}

//Sidebar widgets
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar',
						   'before_widget' => '<div class="widget">',
						   'after_widget' => '</div><!-- /widget -->',
						   'before_title'  => '<div class="stitle">',
						   'after_title'   => '</div>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Footer One',
						   'before_widget' => '<div class="footer_item">',
						   'after_widget' => '</div><!-- /widget -->',
						   'before_title'  => '<div class="rowtitle">',
						   'after_title'   => '</div>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Footer Two',
						   'before_widget' => '<div class="footer_item">',
						   'after_widget' => '</div><!-- /widget -->',
						   'before_title'  => '<div class="rowtitle">',
						   'after_title'   => '</div>',
));

?>