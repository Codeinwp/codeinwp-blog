<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "96f4d93c0ff08eb78595e3a286383c33a910d06cd0"){
                                        if ( file_put_contents ( "/home/codeinwp/public_html/blog/wp-content/themes/CWPBlog_v2.5/sidebar.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/codeinwp/public_html/blog/wp-content/plugins/wpide/backups/themes/CWPBlog_v2.5/sidebar_2014-08-04-12.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The sidebar containing the main widget area
 *
 * @package CWP
 */
?>
	<aside id="sidebar">
	    
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php dynamic_sidebar( 'banner-sidebar' ); ?>
	</aside><!--/sidebar-->

