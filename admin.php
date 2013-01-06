<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Genesis Minimum Images Extended
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_image_size( 'gmie-custom', 300, 200, true ); //(cropped)

add_filter( 'cmb_meta_boxes', 'gmie_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function gmie_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_gmie_';

	$meta_boxes[] = array(
		'id'         => 'gmie_metabox',
		'title'      => 'Custom Image',
		'pages'      => array( 'page', 'post' ), // Post type
		'context'    => 'side',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Image',
				'desc' => 'Upload an image or enter a URL.',
				'id'   => $prefix . 'image',
				'type' => 'file',
			),
			array(
				'name'    => 'Alignment',
				'id'      => $prefix . 'align',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Left', 'value' => 'alignleft', ),
					// array( 'name' => 'Center', 'value' => 'aligncenter', ),
					array( 'name' => 'Right', 'value' => 'alignright', ),
					// array( 'name' => 'None', 'value' => 'alignnone', ),
				),
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}