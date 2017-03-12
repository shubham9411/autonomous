<?php
/**
 * Template Name: Faculties
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
$dept_name = array(
	'anomous_cse' => 'Computer Science Engineering',
	'anomous_ece' => 'Electronic and Comm. engineering', 
	'anomous_me' => 'Mechanical engineering', 
	'anomous_bce' => 'Biochemical engineering',
	'anomous_ee' => 'Electrical engineering',
	'anomous_ce' => 'Civil engineering',
	'anomous_che' => 'Chemical engineering',
	'anomous_asd' => 'Applied and science engineering',
	'anomous_mca' => 'MCA',
);
?>
<section id="faculty" class="faculty">
	<div class="container faculty-wrap">
	<?php
	foreach ( $dept_name as $key => $dept ) {
		$args = array(
			'meta_key'     => 'dept',
			'meta_value'   => $key,
		);
		$blog_user = get_users( $args );
		if ( 0 != count( $blog_user ) ) {
		?>
			<div class="col-xs-12 well"><h2><?php echo esc_html( $dept ); ?></h2></div>
		<?php
		}
		foreach ( $blog_user as $user ) {
			?>
			<a href="<?php echo get_author_posts_url( $user->id );?>">
				<div class="card">
					<img src="<?php echo esc_url( get_avatar_url( $user->id , array( 'size' => 250) ) );?>" alt="Avatar" class="img-responsive">
					<div class="faculty-details">
						<h3><b><?php echo esc_html( $user->display_name );?></b></h3> 
						<h3><?php echo esc_html( get_user_meta( $user->id, 'faculty_position' )[0] );?></h3>
						<h3><?php echo esc_html( get_user_meta( $user->id, 'faculty_qual' )[0] );?></h3>
						<h3><?php echo esc_html( get_user_meta( $user->id, 'faculty_exp' )[0] );?> Years Experience </h3>
						<h3><?php echo esc_html( get_user_meta( $user->id, 'faculty_specialization' )[0] );?></h3>
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
