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
			'flex-width'     => true,
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
	add_theme_support( 'html5' ,array(
		'gallery',
	) );
}

if ( ! function_exists( 'anomous_scripts' ) ) {
	/**
	 * Function for including all the css and js stuff
	 *
	 * @since 1.0
	 */
	function anomous_scripts() {
		wp_enqueue_style( 'anomous-style' , get_stylesheet_uri() , array( 'anomous-bootstrap' , 'anomous-fa' , 'anomous-animate' ) , '1.0' , 'all' );

		wp_enqueue_style( 'anomous-bootstrap' , get_theme_file_uri( '/css/bootstrap.css' ) , array() , '3.3.7' , 'all' );

		wp_enqueue_style( 'anomous-fa' , get_theme_file_uri( '/css/font-awesome.css' ) , array() , '4.6.3' , 'all' );

		wp_enqueue_style( 'anomous-animate' , get_theme_file_uri( '/css/animate.css' ) , array() , '3.5.1' , 'all' );

		wp_enqueue_script( 'anomous-main' , get_theme_file_uri( '/js/main.js' ) , array( 'jquery' , 'anomous-bootstrap-js' ) , '1.0' , true );

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
function anomous_tabs_home( $category ) {
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
	?>
	<table class="table table-home">
	<tbody>
	<?php
	while ( $loop->have_posts() ) :
		$loop->the_post();
	?>
		 <tr>
			<td class="table-date"><p class="flash-date entry-date"><?php echo esc_html(get_the_date()); ?></p></td>
			<td class="table-info">
				<a href="<?php echo esc_url( the_permalink() );?>" class="flash-home">
					<p class="<?php echo esc_attr( anomous_new_class() );?>"><?php the_title(); ?></p>
				</a>
			</td>
		</tr>
	<?php
	endwhile;
	?>
	</tbody>
	</table>
	<?php
}

/**
 * Returns the new post class for posts
 */
function anomous_new_class() {
	global $post;
	$post_id = get_the_ID();
	$value = get_post_meta( $post_id, 'anomous_new_checkbox' , true );
	$class= '';
	if( 1 == $value ){
		$class = 'new-post';
		return $class;
	}
	return 'lol';
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
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'anomous' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Footer Widgets', 'anomous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'anomous_widgets_init' );

/**
 * Function For adding background images for Carousel
 */
function anomous_carousel() {
	echo '<style type="text/css">' . "\n";
	$args = array(
		'post_type'      => 'carousel_anomous',
		'posts_per_page' => 5,
		);
	$loop = new WP_Query( $args );
	$post_count = $loop->post_count;
	$i=1;
	while ( $loop->have_posts() ) :
		$loop->the_post();
		echo '#carousel .slide' . $i . '{
			background-image : url( ' . get_the_post_thumbnail_url( $post , $size = 'large' ) . ');
			background-size: cover;
			background-repeat: no-repeat;
		}' . "\n";
		$i++;
	endwhile;
	echo '</style>' . "\n";
}

add_action( 'wp_head' , 'anomous_carousel' );

if(!function_exists('anomous_custom_excerpt_length')){
	function anomous_custom_excerpt_length(){
		return 25;
	}
	add_filter( 'excerpt_length' , 'anomous_custom_excerpt_length' );
}
if(!function_exists('anomous_excerpt_more')){
	function anomous_excerpt_more( $more ) {
		return ' ...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'anomous') . '</a>';
	}
	add_filter( 'excerpt_more', 'anomous_excerpt_more' );
}


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

/**
 * Faculty Profiles
 */
require( 'inc/faculty-profiles.php' );

define( 'JETPACK_DEV_DEBUG', true);
