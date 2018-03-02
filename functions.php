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
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2.8.4' );

	wp_enqueue_script( 'subheader-animation', get_template_directory_uri() . '/js/subheader-animation.js', array('jquery'), '11', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1', true );
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
        'name' => __( 'Home Sidebar', 'cwp' ),
        'id' => 'sidebar-4',
        'class'         => 'elementor-sidebar',
        'description' => __( 'Widgets in this area will be shown on Home.', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="widgetelem %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
    ) );

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

/**
 * Get the number of comments for a post
 *
 * @return string - number of comments
 */
function cwp_post_number_of_comments() {
	$comments_number = get_comments_number();
	if ( 1 === (int)$comments_number ) {
		return sprintf( _x( 'One Comment', 'comments title', 'cwp' ) );
	} else if ( 0 === (int)$comments_number ) {
		return sprintf( _x( 'No Comments', 'comments title', 'cwp' ) );
	} else {
		return sprintf(
			_nx(
				'%1$s Comment',
				'%1$s Comments',
				$comments_number,
				'comments title',
				'cwp'
			),
			number_format_i18n( $comments_number )
		);
	}
}

/**
 * Display entry meta for post
 *
 * @param bool $show_gravatar - show post's author's image
 */
function cwp_display_entry_meta( $show_gravatar = false ) {

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( ', ' );

	$m_time = get_the_modified_time( 'F jS, Y' );

	// Check if is a Single Post page and hide the date if post is older than 4 months
	if ( is_single() && (time()-(4*MONTH_IN_SECONDS)) > strtotime($m_time) ) {
		$date = '';
	} else {
		$date = sprintf(
			'<time class="entry-date">Updated on %1$s</time>',
			$m_time
		);
	}

	$author = get_the_author();
	$author_email = get_the_author_meta( 'user_email' );
	$author_avatar = get_avatar( $author_email, 40 );
	$post_comments_number = cwp_post_number_of_comments();

	// Translators: 1 is author's image, 2 is the author's name, 3 is category, 4 is the date, 5 is the number of comments for the post.
	if ( $categories_list && $show_gravatar ) {
		$utility_text = '<span class="by-author"><div class="author-with-img">%1$s</div><span class="author vcard"><b>%2$s</b></span></span> • in %3$s • %4$s <span class="number-of-comments"> %5$s</span>';
	} else if ( $show_gravatar ) {
		$utility_text = '<span class="by-author"><div class="author-with-img">%1$s</div><span class="author vcard"><b>%2$s</b></span></span> • %4$s<span class="number-of-comments"> %5$s</span>';
	} else if ( $categories_list ) {
		$utility_text = '<span class="by-author"><span class="author vcard">by<b> %2$s</b></span></span> • in %3$s • %4$s <span class="number-of-comments"> %5$s</span>';
	} else {
		$utility_text = '<span class="by-author"><span class="author vcard">by<b> %2$s</b></span></span> • %4$s<span class="number-of-comments"> %5$s</span>';
	}
	printf(
		$utility_text,
		$author_avatar,
		$author,
		$categories_list,
		$date,
		$post_comments_number
	);
}

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

if ( ! function_exists( 'codeinwpblog_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function codeinwpblog_paging_nav() {
	echo '<div class="clear"></div>';
	?>
	<nav class="navigation paging-navigation" role="navigation">
	
		<div class="nav-links">
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'ti' ) ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'ti' ) ); ?></div>
			<?php endif; ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
add_filter('wpseo_title', 'filter_product_wpseo_title');
function filter_product_wpseo_title($title) {
   // if(  is_singular( 'product') ) {
        $ntitle = str_replace("%month%",date('F Y'),$title);
    //}
    return $ntitle;
}

/**
 * Show footer copyright
 */
function cwp_display_copyright() {

	$current_year = date('Y');

	printf(
		'© %1$s codeinwp.com. All Rights Reserved. <br />WordPress logo is Copyright © WordPress.com',
		$current_year
	);
}


?>
