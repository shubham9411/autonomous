<?php
/**
 * Header template for Notification area
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

$notification = array(
	'post_type'        => 'notification_anomous',
	'posts_per_page'   => 5,
);
$loop = new WP_Query( $notification );
?><div id="text-carousel" class="carousel slide" data-ride="carousel">
	<div class="row-fluid">
		<div class="carousel-inner">
		<?php
			$post_count = $loop->post_count;
			$i = 1;
			while ( $loop->have_posts() ) :
				$loop->the_post();
			?>
			<div class="item <?php echo ( $i == 1 ) ? 'active' : ''; ?>">
				<div class="carousel-content">
					<a href="<?php echo (get_field('notification_link') ) ? get_field('notification_link') : '#'; ?>" class="white-text"><p><?php the_title();?></p></a>
				</div>
			</div>
			<?php
			$i++;
			endwhile;
			?>
		</div>
		<a class="left carousel-control" href="#text-carousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left text-carousel-button"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#text-carousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right text-carousel-button"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>