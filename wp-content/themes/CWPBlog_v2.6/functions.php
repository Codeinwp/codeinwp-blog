<?php
/**
 * Theme functions and definitions
 *
 * @package CWP
 */

/**
 *  Require Once
 */
require_once ( 'inc/custom-widgets.php' ); // Custom Widgets
require_once ( 'inc/custom-shortcodes.php' ); // Custom Shortcodes
require_once ( 'inc/metaboxes/custom-metaboxes.php' ); // Custom Metaboxes
/**
 *  Theme Name Scripts
 */
function cwp_theme_name_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2.6' );
	wp_enqueue_style( 'font-family-source-sans-pro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' );
	wp_enqueue_style( 'font-family-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300' );
    wp_enqueue_style( 'font-family-lato', 'http://fonts.googleapis.com/css?family=Lato:400,700' );
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'subheader-animation', get_template_directory_uri() . '/js/subheader-animation.js', array('jquery'), '1', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1', true );
    wp_enqueue_script( 'pint', '//assets.pinterest.com/js/pinit.js', array('jquery'), '1', true );
}

add_action( 'wp_enqueue_scripts', 'cwp_theme_name_scripts' );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
}

add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
	'primary' => 'Primary Navigation'
));
// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;


// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );


/*
 * Register sidebars.
 */
 function cwp_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'cwp' ),
		'id' => 'sidebar-1',
		'description' => __( 'Main Sidebar', 'cwp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

    register_sidebar( array(
        'name' => __( 'Footer', 'cwp' ),
		'id' => 'sidebar-2',
		'description' => __( 'Add maximum 2 widgets to footer area.', 'cwp' ),
		'before_widget' => '<aside id="%1$s" class="fmenu %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
        'name' => __( 'Sidebar banner', 'cwp' ),
		'id' => 'banner-sidebar',
		'description' => __( 'Add here a banner in right sidebar. Max 250px wide.', 'cwp' ),
		'before_widget' => '<aside id="%1$s" class="banner-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
	) );
}
add_action( 'widgets_init', 'cwp_widgets_init' );


if ( ! function_exists( 'cwp_entry_meta' ) ) :
/*
 * Set up post entry meta.
 */
function cwp_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'cwp' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'cwp' ) );




	$date = '<time class="entry-date">'.the_modified_time( 'F jS, Y' ).'</time>';

	$author = sprintf( '<span class="author vcard"><b>%1$s</b></span>',
		get_the_author()
	);

	// Translators: 1 is category, 2 is the date and 3 is the author's name.
	if ( $categories_list ) {
		$utility_text = __( ' %2$s • in %1$s<span class="by-author"> • by %3$s</span>', 'cwp' );
	} else {
		$utility_text = __( ' %2$s<span class="by-author"> • by %3$s</span>', 'cwp' );
	}

	printf(
		$utility_text,
		$categories_list,
		$date,
		$author
	);
}
endif;


if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/*
 * Displays navigation to next/previous pages when applicable.
 */
function cwp_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( '', 'cwp' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'cwp' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'cwp' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;
/*Customizer */
include 'inc/customizer.php' ;

/*
 * Add Markup Pages
 */
function cwp_add_markup_pages($output) {
    $output= preg_replace('/menu-item/', 'first-menu-item-steaua menu-item', $output, 1);
	$output=substr_replace($output, "night last-menu-item menu-item night", strripos($output, "menu-item"), strlen("menu-item"));
    return $output;
}
add_filter('wp_nav_menu', 'cwp_add_markup_pages');

/*
** Kriesi Pagination
*/
function cwp_kriesi_pagination($pages = '', $range = 1)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<nav id='pagination'>";
         if($paged > 0 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'></a>";
         if($paged > 0 && $showitems < $pages) echo "<a class='prev' href='".get_pagenum_link($paged - 1)."'></a><div class='pages'>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+3 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "</div><a class='next' href='".get_pagenum_link($paged + 1)."'></a>";
         echo "</nav>\n";
     }
}

/*
** WP List Comments
*/
if ( ! function_exists( 'shape_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Shape 1.0
 */
function shape_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'shape' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <div>
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 80 ); ?>
                    <?php printf( __( '%s <span class="says">says:</span>', 'shape' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', 'shape' ); ?></em>
                    <br />
                <?php endif; ?>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'shape' ), get_comment_date(), get_comment_time() ); ?>
                    </time></a>
                    <?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
            </div>

            <div class="comment-content"><?php comment_text(); ?></div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->

    <?php
            break;
    endswitch;
}
endif; // ends check for shape_comment()

/*
 * Change related title from jetpack plugin
 */
function jetpackme_related_posts_headline( $headline ) {
    $related_title = get_theme_mod('cwp_relatedtext');
$headline = sprintf(
            '<h3 class="jp-relatedposts-headline"><em>%s</em></h3>',
            esc_html($related_title)
            );
return $headline;
}
add_filter( 'jetpack_relatedposts_filter_headline', 'jetpackme_related_posts_headline' );

?>