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
		add_image_size( 'anomous-alumni-avatar', 250, 250, true );
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

		wp_enqueue_style( 'anomous-style' , get_stylesheet_uri() , array( 'anomous-bootstrap', 'anomous-fa', 'anomous-animate' ) , '1.0' , 'all' );

		wp_enqueue_style( 'anomous-bootstrap' , get_theme_file_uri( '/css/bootstrap.css' ) , array() , '3.3.7' , 'all' );

		wp_enqueue_style( 'anomous-fa' , get_theme_file_uri( '/css/font-awesome.css' ) , array() , '4.6.3' , 'all' );

		wp_enqueue_style( 'anomous-animate' , get_theme_file_uri( '/css/animate.css' ) , array() , '3.5.1' , 'all' );

		wp_enqueue_script( 'anomous-main' , get_theme_file_uri( '/js/main.js' ) , array( 'jquery', 'anomous-bootstrap-js' ) , '1.0' , true );

		wp_enqueue_script( 'anomous-bootstrap-js' , get_theme_file_uri( '/js/bootstrap.js' ) , array( 'jquery' ) , '3.3.7' , true );

		if ( anomous_is_dept() ) {
			wp_enqueue_style( 'anomous-owl-css' , get_theme_file_uri( '/css/owl.carousel.min.css' ) , array() , '2.2.1' , 'all' );

			wp_enqueue_script( 'anomous-owl-js' , get_theme_file_uri( '/js/owl.carousel.min.js' ) , array( 'jquery' ) , '2.2.1' , true );

			wp_enqueue_script( 'anomous-owl-carousel-main' , get_theme_file_uri( '/js/owl-carousel-main.js' ) , array( 'anomous-owl-js' ) , '2.2.1' , true );
		}
	}
	add_action( 'wp_enqueue_scripts' , 'anomous_scripts' );
}

/**
 * Function for printing News, Events and Notices
 *
 * @since Autonomous 1.0
 * @param string $category Particular category for printing.
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
			<td class="table-date"><p class="flash-date entry-date"><?php echo esc_html( get_the_date() ); ?></p></td>
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
	$class = '';
	if ( 1 == $value ) {
		$class = 'new-post';
		return $class;
	}
	return '';
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
	$i = 1;
	while ( $loop->have_posts() ) :
		$loop->the_post();
		echo '#carousel .slide' . esc_html( $i ) . '{
			background-image : url( ' . esc_attr( get_the_post_thumbnail_url( 0 , $size = 'large' ) ) . ' );
			background-size: cover;
			background-repeat: no-repeat;
		}' . "\n";
		$i++;
	endwhile;
	echo '</style>' . "\n";
}

add_action( 'wp_head' , 'anomous_carousel' );

if ( ! function_exists( 'anomous_custom_excerpt_length' ) ) {
	/**
	 * Function for returning the length of the Excerpts.
	 */
	function anomous_custom_excerpt_length() {
		return 25;
	}
	add_filter( 'excerpt_length' , 'anomous_custom_excerpt_length' );
}
if ( ! function_exists( 'anomous_excerpt_more' ) ) {
	/**
	 * Function for returning the excerpt with read more link
	 *
	 * @param string $more string with read more text.
	 */
	function anomous_excerpt_more( $more ) {
		return ' ...<a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More' , 'anomous' ) . '</a>';
	}
	add_filter( 'excerpt_more', 'anomous_excerpt_more' );
}

add_filter('widget_text','do_shortcode');

/**
 * Function for Checking if a department page is selected.
 */
function anomous_is_dept() {
	global $post;
	wp_reset_postdata();
	$academics = get_page_by_title( 'Academics' );
	if (is_page() && $post->post_parent == $academics->ID ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Function for checking if page is Alumni Page
 */
function anomous_is_alumni() {
	global $post;
	$alumni = get_page_by_title( 'Alumni' );
	wp_reset_postdata();
	if ( is_page() && get_the_ID() == $alumni->ID )
		return true;
	else
		return false;
}

/**
 * Function for alumni login/signin navbar
 */
function anomous_alumni_nav() {
	?>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="https://btkit.almaconnect.com/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li><a href="https://btkit.almaconnect.com/signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	</ul>
	<?php
}

/**
 * Function for returning Alumni excerpt
 */
function alumni_the_excerpt() {
	global $post;
	$excerpt = get_the_excerpt();
	$charlength = 100;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
	} else {
		echo $excerpt;
	}
	echo '...';
}

/**
 * Function for Rendering HOF carousel
 */
function anomous_hof_render() {
	?>
	<section>
		<hr />
		<h1><u>Hall of Fame</u></h1>
		<div class="owl-carousel" id="hof-carousel">
			<?php
			$title = get_the_title();
			$title = explode(" ", $title)[0];
			$hof = array(
				'post_type'        => 'hof_anomous',
				'posts_per_page'   => 200,
				'tax_query' => array(
					'relation'  => 'AND',
						array(
							'taxonomy'         => 'hof-student',
							'field'            => 'name',
							'terms'            => array( $title ),
							'include_children' => true,
							'operator'         => 'IN'
						),
					),
			);
			$loop = new WP_Query( $hof );
			if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="hof">
				<div class="hof-wrap">
				<?php the_post_thumbnail( 'anomous-alumni-avatar', 'class=img-responsive' );?>
				<div><span class="hof-title"><?php the_title(); ?></span></div>
				</div>
			</div>
		<?php
		endwhile;
		endif;
			?>
		</div>
	</section>
	<?php
}
/**
 * Function for printing all the additional details of a user 
 */
function anomous_user_details( $user ) {
	$group_ID = 351;
	$fields = array();
	$fields = apply_filters('acf/field_group/get_fields', $fields, $group_ID);
	if( $fields )
	{
		foreach( $fields as $field )
		{
			if ( $field['name'] == 'profile_department' ) {
				continue;
			}
			$value = get_field( $field['name'], 'user_'.$user );
			if ( $field['name'] == 'profile_experience' ) {
				echo '<h4>' . $value . ' Years of Experience</h4>';
				continue;
			}
			echo '<h4>' . $value . '</h4>';
		}
	}
}

function my_acf_update_value( $value, $post_id, $field  ) {
    // only do it to certain custom fields
    if( $field['name'] == 'profile_department' ) {
    	$group_ID = 351;
		$fields = array();
		$fields = apply_filters('acf/field_group/get_fields', $fields, $group_ID);
        set_theme_mod( 'dept_choices', $fields[0]['choices']);
    }

	// don't forget to return to be saved in the database
    return $value;
    
}

// acf/update_value - filter for every field
add_filter('acf/update_value', 'my_acf_update_value', 10, 3);
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
 * Alumni Post type
 */
require( 'inc/alumni-post-type.php' );

/**
 * Notifications
 */
require( 'inc/notification-post-type.php' );

/**
 * Hall of Fame
 */
require( 'inc/hall-of-fame.php' );

/**
 * Constants
 */
require( 'inc/widgets.php' );