<?php
add_action( 'wp_ajax_dry_quick_preview', 'dry_quick_preview' );

function dry_quick_preview() {
	$post_ID = (int) $_POST['post_ID'];
	$q_args = array();
	$q_args['preview_id'] = $post_ID;
	$q_args['preview'] = 'true';
	$q_args['preview_nonce'] = wp_create_nonce( 'post_preview_' . $post_ID );
	
	$url = add_query_arg( $q_args, get_permalink( $post_ID ) );
	echo $url;
	die();
}
?>