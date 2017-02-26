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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
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
	?>
		<div class="item <?php echo esc_attr( 0 == $i ) ? 'active' : '' ; ?>">
			<?php the_post_thumbnail( 'anomous-carousel' , 'class=img-responsive col-xs-12' ); ?>
		</div>
	<?php
		$i++;
	endwhile;
	?>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
