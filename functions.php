<?php
/**
 * Engine For Autonomous theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

if ( ! function_exists( 'anomous_setup' ) ) {
	/**
	 * Function for setting up all the required things
	 *
	 * @since 1.0
	 */
	function anomous_setup() {
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-logo', array(
			'width'          => 100,
			'height'         => 100,
			'flex-width'     => false,
			'flex-height'    => false,
		) );

		add_image_size( 'anomous-thumbnail-avatar', 100, 100, true );
		add_image_size( 'anomous-carousel', 1024, 768, true );

		add_editor_style( array( 'css/editor-style.css' ) );

		register_nav_menus( array(
			'top'    => __( 'Top Menu' , 'anomous' ),
			'social' => __( 'Social' , 'anomous' ),
		) );
	}
	add_action( 'after_setup_theme' , 'anomous_setup' );
}

if ( ! function_exists( 'anomous_scripts' ) ) {
	/**
	 * Function for including all the css and js stuff
	 *
	 * @since 1.0
	 */
	function anomous_scripts() {
		wp_enqueue_style( 'anomous-style' , get_stylesheet_uri() , array( 'anomous-bootstrap' ) , '1.0' , 'all' );

		wp_enqueue_style( 'anomous-bootstrap' , get_theme_file_uri( '/css/bootstrap.css' ) , array() , '3.3.7' , 'all' );

		wp_enqueue_script( 'anomous-main' , get_theme_file_uri( '/js/main.js' ) , array( 'jquery' ) , '1.0' , true );

		wp_enqueue_script( 'anomous-bootstrap-js' , get_theme_file_uri( '/js/bootstrap.js' ) , array( 'jquery' ) , '3.3.7' , true );
	}
	add_action( 'wp_enqueue_scripts' , 'anomous_scripts' );
}

/**
 * Function for printing News, Events and Notices
 *
 * @since Autonomous 1.0
 * @param string category Particular category for printing.
 */
function anomous_cards_home( $category ) {
	/**
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$categ = array(
		'category_name'    => $category,
		'post_type'        => 'post',
		'posts_per_page'   => 5,
	);
	$loop = new WP_Query( $categ );
	while ( $loop->have_posts() ) :
		$loop->the_post();
	?>
		<li><a href="<?php echo esc_url( the_permalink() );?>" class="<?php echo esc_attr( anomous_new_class() );?>" ><?php the_title(); ?></a></li>
	<?php
	endwhile;
}

/**
 * Returns the new post class for posts
 */
function anomous_new_class() {
	global $post;
	$post_date = get_the_date('Y-m-d');
	$date_compare = date('Y-m-d', strtotime(' -7 day'));
	$class= '';
	if( $date_compare < $post_date ){
		$class = 'new-post';
	}
	return $class;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anomous_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'anomous' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'anomous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'anomous_widgets_init' );

/**
 * Template Tags file.
 */
require( 'inc/template-tags.php' );


/**
 * Walker class for top nav.
 */
require( 'inc/walker-nav.php' );

/**
 * Carousel Post type
 */
require( 'inc/carousel-post-type.php' );
