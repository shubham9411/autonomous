<?php
/**
 * Template Name: Faculties
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
// global $;
$dept_names = (get_theme_mod( 'dept_choices', '' ));
$user_data = get_user_meta( 12 );
?> 
<section id="faculty" class="faculty">
	<div class="container faculty-wrap">
	<?php
	foreach ( $dept_names as $key => $dept ) {
		$args = array(
			'meta_key'     => 'profile_department',
			'meta_value'   => $key,
			'fields'       => 'id',
		);
		$blog_user = get_users( $args );
		if ( 0 != count( $blog_user ) ) {
			$fac_categ = substr( $key , 8 );
		?>
			<div id="<?php esc_attr_e( $fac_categ );?>" class="col-xs-12 well"><h2><?php echo esc_html( $dept ); ?></h2></div>
		<?php
		}
		foreach ( $blog_user as $user ) {
			$user_data = get_userdata( $user );
			?>
			<a href="<?php echo esc_url( get_author_posts_url( $user ) );?>">
				<div class="card">
					<img src="<?php echo esc_url( get_avatar_url( $user , array( 'size' => 250 ) ) );?>" alt="Avatar" class="img-responsive">
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
