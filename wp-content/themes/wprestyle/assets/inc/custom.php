<?php

// Custom functions for WPRestyle's Jetpack portfolio support

add_filter( 'cmb_meta_boxes', 'wprestyle_custom_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function wprestyle_custom_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_wprestyle_';

	$meta_boxes[] = array(
		'id'         => 'widget_title',
		'title'      => __( 'Project Widget Title', 'wprestyle' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Widget Title', 'wprestyle' ),
				'desc'    => __( 'This will act as the widget enabler as well as the title - if left blank widget will not appear and the information entered below will not be shown!', 'wprestyle' ),
				'id'      => $prefix . 'widget_title',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_url',
		'title'      => __( 'Project Link', 'wprestyle' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Project url', 'wprestyle' ),
				'desc'    => __( 'This url will be used to link the post title i.e project name (on single project view page) to the project website!', 'wprestyle' ),
				'id'      => $prefix . 'project_url',
				'type'    => 'text',
				'sanitize_callback' => 'esc_url_raw'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_type',
		'title'      => __( 'Project Type', 'wprestyle' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Project Type', 'wprestyle' ),
				'desc'    => __( 'Enter project type i.e. Website, Mobile App, Theme or Graphics!', 'wprestyle' ),
				'id'      => $prefix . 'project_type',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_status',
		'title'      => __( 'Project Status', 'wprestyle' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Project Status', 'wprestyle' ),
				'desc'    => __('Enter project status i.e. New, Ongoing, Completed or Shelved/On Hold!', 'wprestyle' ),
				'id'      => $prefix . 'project_status',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'wprestyle_meta_boxes_cmb_initialize', 9999 );
/**
 * Initialize the metabox class.
 */
function wprestyle_meta_boxes_cmb_initialize() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}
