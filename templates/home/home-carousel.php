<?php
/**
 * Template for carousel
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

/**
 * The WordPress Query class.
 *
 * @link http://codex.wordpress.org/Function_Reference/WP_Query
 */
$args = array(
	'post_type'      => 'carousel_anomous',
	'posts_per_page' => 5,
);
$loop = new WP_Query( $args );
$post_count = $loop->post_count;
?>
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
	<ol class="carousel-indicators">
	<?php
	for ( $i = 0 ; $i < $post_count ; $i++ ) { ?>
		<li data-target="#myCarousel" data-slide-to="<?php echo esc_attr( $i ); ?>" class="<?php echo esc_attr( 0 == $i ) ? 'active' : '' ; ?>"></li>
	<?php
	}
	?>
	</ol>
	<div class="carousel-inner" role="listbox">
	<?php
	$i = 0;
	while ( $loop->have_posts() ) :
		$loop->the_post();
		$get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
	?>
		<div class="item slide slide<?php echo ( 0 == $i ) ? esc_attr( ( $i + 1 ) . ' active' ) : esc_attr( ( $i + 1 ) ); //XSS: ok?>">
			<div class="row">
				<div class="container">
					<div class="text-left carousel-content bounceInDown">
						<h3 data-animation="animated bounceInDown"><?php the_title(); ?></h3>
						<?php
						if ( ! empty( $get_description ) ) {
						?>
						<h4 data-animation="animated bounceInUp">
						<?php
							echo esc_html( $get_description );
						?>
						</h4>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
		$i++;
	endwhile;
	?>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
	</a>
</div>
