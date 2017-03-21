<?php
/**
 * Post type for gallery
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
function anomous_notification_post() {

	$labels = array(
		'name'                => __( 'Notification', 'autonomous' ),
		'singular_name'       => __( 'Notification', 'autonomous' ),
		'add_new'             => _x( 'Add New Notification', 'autonomous', 'autonomous' ),
		'add_new_item'        => __( 'Add New Notification', 'autonomous' ),
		'edit_item'           => __( 'Edit Notification', 'autonomous' ),
		'new_item'            => __( 'New Notification', 'autonomous' ),
		'view_item'           => __( 'View Notification', 'autonomous' ),
		'search_items'        => __( 'Search Notification', 'autonomous' ),
		'not_found'           => __( 'No Notification found', 'autonomous' ),
		'not_found_in_trash'  => __( 'No Notification found in Trash', 'autonomous' ),
		'menu_name'           => __( 'Notifications', 'autonomous' ),
	);

	$args = array(
		'labels'              => $labels,
		'description'         => 'Notification For Website',
		'public'              => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'notification','with_front' => false ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'thumbnail',
		),
	);

	register_post_type( 'notification_anomous', $args );
}

add_action( 'init', 'anomous_notification_post' );
