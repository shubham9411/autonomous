<?php
/**
 * Template Name: Faculties
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
$dept_names = get_theme_mod( 'dept_choices', '' );
$user_data = get_user_meta( 12 );
?> 
<section id="faculty" class="faculty">
	<div class="container faculty-wrap">
	<?php
	foreach ( $dept_names as $key => $dept ) {
		$args = array(
			'meta_query' => array(
			array(
					'key'     => 'profile_department',
					'value'   => $key,
					'compare' => '=='
				),
			),
			'orderby'      => 'meta_value_num',
			'meta_key'     => 'profile_experience',
			'fields'       => 'id',
			'order'        => 'DSC',
		);
		$blog_user = get_users( $args );
		if ( 0 != count( $blog_user ) ) {
		?>
			<div id="<?php echo esc_attr( $key );?>" class="col-xs-12 well"><h2><?php echo esc_html( $dept ); ?></h2></div>
		<?php
		}
		foreach ( $blog_user as $user ) {
			$user_data = get_userdata( $user );
			$image = get_field( 'profile_picture', 'user_'.$user );
			$image_obj = wp_get_attachment_image( $image, 'anomous-alumni-avatar', "", array( "class" => "img-responsive") );
			?>
			<a href="<?php echo esc_url( get_author_posts_url( $user ) );?>">
				<div class="card">
					<?php echo $image_obj;?>
					<div class="faculty-details">
						<h4><b><?php echo esc_html( get_the_author_meta('display_name',$user) );?></b></h4> 
						<?php anomous_user_details( $user ); ?>
					</div>
				</div>
			</a>
			<?php
		}
	}
	?>
	</div>
</section>
<?php
get_footer();
