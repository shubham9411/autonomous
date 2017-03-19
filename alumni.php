<?php
/**
 * Template Name: Alumni
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
		$categ = array(
			'post_type'        => 'alumnus_anomous',
			'posts_per_page'   => 10,
		);
		$loop = new WP_Query( $categ );
		if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<a href="<?php the_permalink();?>">
			<div class="card">
				<?php the_post_thumbnail( 'anomous-alumni-avatar' , 'class=img-responsive' ); ?>
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
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Welcome!</h4>
				</div>
				<div class="modal-body">
					<p>This is a large modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
