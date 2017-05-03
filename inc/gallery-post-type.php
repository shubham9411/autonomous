<?php
/**
 * Post type for Gallery
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
function anomous_gallery_post() {

	$labels = array(
		'name'                => __( 'Gallery', 'autonomous' ),
		'singular_name'       => __( 'Gallery', 'autonomous' ),
		'add_new'             => _x( 'Add New Gallery', 'autonomous', 'autonomous' ),
		'add_new_item'        => __( 'Add New Gallery', 'autonomous' ),
		'edit_item'           => __( 'Edit Gallery', 'autonomous' ),
		'new_item'            => __( 'New Gallery', 'autonomous' ),
		'view_item'           => __( 'View Gallery', 'autonomous' ),
		'search_items'        => __( 'Search Gallery', 'autonomous' ),
		'not_found'           => __( 'No Gallery found', 'autonomous' ),
		'not_found_in_trash'  => __( 'No Gallery found in Trash', 'autonomous' ),
		'menu_name'           => __( 'Gallery', 'autonomous' ),
	);

	$args = array(
		'labels'              => $labels,
		'description'         => 'Gallery For Each Department and Festivels',
		'public'              => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'gallery','with_front' => false ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'thumbnail',
			'editor',
		),
	);

	register_post_type( 'gallery_anomous', $args );
}

add_action( 'init', 'anomous_gallery_post' );
