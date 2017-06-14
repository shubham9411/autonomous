<?php
/**
 * Post type for Hall of Fame
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
function hof_carousel_post() {

	$labels = array(
		'name'                => __( 'Hall of Fame', 'autonomous' ),
		'singular_name'       => __( 'Hall of Fame', 'autonomous' ),
		'add_new'             => _x( 'Add New Student', 'autonomous', 'autonomous' ),
		'add_new_item'        => __( 'Add New Student', 'autonomous' ),
		'edit_item'           => __( 'Edit Student', 'autonomous' ),
		'new_item'            => __( 'New Student', 'autonomous' ),
		'view_item'           => __( 'View Student', 'autonomous' ),
		'search_items'        => __( 'Search Student', 'autonomous' ),
		'not_found'           => __( 'No Student found', 'autonomous' ),
		'not_found_in_trash'  => __( 'No Student found in Trash', 'autonomous' ),
		'menu_name'           => __( 'Hall of Fame', 'autonomous' ),
	);

	$args = array(
		'labels'              => $labels,
		'description'         => 'Hall of Fame of Website',
		'public'              => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'student','with_front' => false ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'thumbnail',
		),
		'capabilities' => array(
			'edit_post'          => 'hod_priv',
			'read_post'          => 'hod_priv',
			'delete_post'        => 'hod_priv',
			'edit_posts'         => 'hod_priv',
			'edit_others_posts'  => 'hod_priv',
			'delete_posts'       => 'hod_priv',
			'publish_posts'      => 'hod_priv',
			'read_private_posts' => 'hod_priv'
		),
	);

	register_post_type( 'hof_anomous', $args );
}

add_action( 'init', 'hof_carousel_post' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function hof_taxonomy() {

	$labels = array(
		'name'					=> _x( 'Departments', 'Departments', 'autonomous' ),
		'singular_name'			=> _x( 'Department', 'Department', 'autonomous' ),
		'search_items'			=> __( 'Search Department', 'autonomous' ),
		'popular_items'			=> __( 'Popular Departments', 'autonomous' ),
		'all_items'				=> __( 'All Departments', 'autonomous' ),
		'edit_item'				=> __( 'Edit Department', 'autonomous' ),
		'update_item'			=> __( 'Update Department', 'autonomous' ),
		'add_new_item'			=> __( 'Add New Department', 'autonomous' ),
		'new_item_name'			=> __( 'New Department Name', 'autonomous' ),
		'add_or_remove_items'	=> __( 'Add or remove Departments', 'autonomous' ),
		'choose_from_most_used'	=> __( 'Choose from most used Departments', 'autonomous' ),
		'menu_name'				=> __( 'Department', 'autonomous' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => false,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => false,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'hall-of-fame','with_front' => false ),
		'query_var'         => true,
		'capabilities' => array(
			'edit_post'          => 'update_core',
			'read_post'          => 'update_core',
			'delete_post'        => 'update_core',
			'edit_posts'         => 'update_core',
			'edit_others_posts'  => 'update_core',
			'delete_posts'       => 'update_core',
			'publish_posts'      => 'update_core',
			'read_private_posts' => 'update_core'
		),
	);

	register_taxonomy( 'hof-student', array( 'hof_anomous' ), $args );
}

add_action( 'init', 'hof_taxonomy' );

/**
 * Function for adding Batch field in the Post UI
 */
function hof_column_field( $defaults ) {
	if ( is_post_type_archive( 'hof_anomous' ) )
		$defaults['batch'] = 'Batch';
	return $defaults;
}
add_filter( 'manage_posts_columns' , 'hof_column_field' );

/**
 * Function prints the batch year in column
 */
function hof_column_content ( $column_name , $post_ID ) {
	if ( $column_name == 'batch' ) {
		$batch = hof_batch( $post_ID );
		if ( $batch ) {
			echo $batch;
		}
	}
}
add_action( 'manage_posts_custom_column' , 'hof_column_content' , 10 , 2 );

/**
 * Function for return batch year
 */
function hof_batch( $post_ID ) {
	$batch_year = get_field( 'batch' , $post_ID );
	if ($batch_year) {
		return $batch_year;
	}
}