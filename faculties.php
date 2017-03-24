<?php
/**
 * Template Name: Faculties
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
global $dept_names;
?>
<section id="faculty" class="faculty">
	<div class="container faculty-wrap">
	<?php
	foreach ( $dept_names as $key => $dept ) {
		$args = array(
			'meta_key'     => 'dept',
			'meta_value'   => $key,
		);
		$blog_user = get_users( $args );
		if ( 0 != count( $blog_user ) ) {
			$fac_categ = substr( $key , 8 );
		?>
			<div id="<?php esc_attr_e( $fac_categ );?>" class="col-xs-12 well"><h2><?php echo esc_html( $dept ); ?></h2></div>
		<?php
		}
		foreach ( $blog_user as $user ) {
			?>
			<a href="<?php echo esc_url( get_author_posts_url( $user->id ) );?>">
				<div class="card">
					<img src="<?php echo esc_url( get_avatar_url( $user->id , array( 'size' => 250 ) ) );?>" alt="Avatar" class="img-responsive">
					<div class="faculty-details">
						<h4><b><?php echo esc_html( $user->display_name );?></b></h4> 
						<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_position' )[0] );?></h4>
						<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_qual' )[0] );?></h4>
						<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_exp' )[0] );?> Years Experience </h4>
						<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_specialization' )[0] );?></h4>
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
