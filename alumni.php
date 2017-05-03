<?php
/**
 * Template Name: Alumni template
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
?>
<section id="alumni" class="alumni">
	<div class="container alumni-wrap">
		<?php
		$alumni = array(
			'post_type'        => 'alumnus_anomous',
			'posts_per_page'   => 10,
		);
		$loop = new WP_Query( $alumni );
		if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<a href="<?php the_permalink();?>">
			<div class="card">
				<?php the_post_thumbnail( 'anomous-medium-avatar' , 'class=img-responsive' ); ?>
				<div class="alumni-details">
					<h4><b><?php the_title();?></b></h4>
					<h5><b><?php alumni_the_excerpt();?></b></h5>
				</div>
			</div>
		</a>
		<?php
		endwhile;
		endif;
		wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'autonomous' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
		) );
		?>
	</div>
</section>
<div class="modals">
	<div class="modal fade" id="joinAlumniModal" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close close-button" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Welcome! Alumni/Student</h4>
				</div>
				<div class="modal-body text-center">
					<p>Login/Sign Up to connect with the Community!</p>
					<ul class="alumni-login">
						<li class="btn btn-warning"><a href="https://btkit.almaconnect.com/signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li class="btn btn-info"><a href="https://btkit.almaconnect.com/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					</ul>
				</div>
				<div class="modal-footer alumni-modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
