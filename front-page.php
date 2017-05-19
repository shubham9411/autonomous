<?php
/**
 * Engine For Autonomous theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
?>
<div class="container front-page">
	<div class="col-xs-12 col-sm-9 carousel-wrap">
		<section class="">
			<div id="carousel">
				<?php get_template_part( 'templates/home/home' , 'carousel' ); ?>
			</div>
		</section>
		<main class=" main ">
		<div class="col-xs-12 home-main">
			<?php get_template_part( 'templates/home/home' , 'content' ); ?>
		</div>
		</main>
	</div>
	<?php
		$post = array(
			'post_type'        => 'post',
			'posts_per_page'   => 10,
		);
		$loop = new WP_Query( $post );
	?>
	<div class="col-xs-12 col-sm-3 update-wrap">
		<div class="panel panel-default panel-update">
			<div class="panel-heading">
				<h3 class="text-center update-title">Updates</h3>
			</div>
			<div class="update-marquee">
				<div class="list-group">
				<?php
				if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
				?>
					<a href="<?php the_permalink();?>" class="list-group-item">
						<h4 class="list-group-item-heading <?php echo anomous_new_class();?>"><?php the_title();?></h4>
						<p class="list-group-item-text"><?php the_excerpt();?></p>
					</a>
				<?php
				endwhile;
				endif;
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-3 no-padding">
		<div class="panel panel-default more-update">
			<div class="panel-heading" style="height: 58px"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) );?>" class="btn btn-warning pull-right">More Updates</a></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
