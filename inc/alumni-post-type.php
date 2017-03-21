<?php
/**
 * Post type for Alumnies
 *
 * @package WordPress
 * @subpackage Autonomous
 * @version 1.0
 */

/**
 * Registers a new post type
 *
 * @uses $wp_post_types Inserts new post type object into the list.
 */
function anomous_alumnus_post() {

	$labels = array(
		'name'                => __( 'Alumni', 'autonomous' ),
		'singular_name'       => __( 'Alumni', 'autonomous' ),
		'add_new'             => _x( 'Add New Alumni', 'autonomous', 'autonomous' ),
		'add_new_item'        => __( 'Add New Alumni', 'autonomous' ),
		'edit_item'           => __( 'Edit Alumni', 'autonomous' ),
		'new_item'            => __( 'New Alumni', 'autonomous' ),
		'view_item'           => __( 'View Alumni', 'autonomous' ),
		'search_items'        => __( 'Search Alumni', 'autonomous' ),
		'not_found'           => __( 'No Alumni found', 'autonomous' ),
		'not_found_in_trash'  => __( 'No Alumni found in Trash', 'autonomous' ),
		'menu_name'           => __( 'Alumni', 'autonomous' ),
	);

	$args = array(
		'labels'                   => $labels,
		'description'         => 'Alumni Profiles',
		'public'              => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'alumni','with_front' => false ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'thumbnail',
			'editor',
		),
	);

	register_post_type( 'alumnus_anomous', $args );
}

add_action( 'init', 'anomous_alumnus_post' );
