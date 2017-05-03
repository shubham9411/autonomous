<?php
/**
 * Post type for Carousel
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
function anomous_carousel_post() {

	$labels = array(
		'name'                => __( 'Carousel', 'autonomous' ),
		'singular_name'       => __( 'Carousel', 'autonomous' ),
		'add_new'             => _x( 'Add New Image', 'autonomous', 'autonomous' ),
		'add_new_item'        => __( 'Add New Image', 'autonomous' ),
		'edit_item'           => __( 'Edit Image', 'autonomous' ),
		'new_item'            => __( 'New Image', 'autonomous' ),
		'view_item'           => __( 'View Image', 'autonomous' ),
		'search_items'        => __( 'Search Image', 'autonomous' ),
		'not_found'           => __( 'No Image found', 'autonomous' ),
		'not_found_in_trash'  => __( 'No Image found in Trash', 'autonomous' ),
		'menu_name'           => __( 'Carousel', 'autonomous' ),
	);

	$args = array(
		'labels'              => $labels,
		'description'         => 'Carousel For Website',
		'public'              => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'carousel','with_front' => false ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'thumbnail',
		),
	);

	register_post_type( 'carousel_anomous', $args );
}

add_action( 'init', 'anomous_carousel_post' );
