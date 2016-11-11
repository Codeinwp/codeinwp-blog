<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'cwp_';

	/* Download Free Pack Metaboxes */
	$meta_boxes['downloadfreepack_metaboxes'] = array(
		'id'         => 'downloadfreepack_metaboxes',
		'title'      => __( 'Options', 'cwp' ),
		'pages'      => array( 'page' ),
		'show_on'    => array( 'key' => 'page-template', 'value' => 'page-downloadfreepack.php' ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'downloadfreepack_images',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Image {#}', 'cwp' ),
					'add_button'    => __( 'Add another image', 'cwp' ),
					'remove_button' => __( 'Remove image', 'cwp' ),
					'sortable'      => true,
				),
				'fields'      => array(
					array(
						'name' => 'Entry image',
						'id'   => 'title',
						'type' => 'file',
					),
				),
			),
		),
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
