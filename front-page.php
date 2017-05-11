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
<div class="container">
	<div class="col-xs-12 col-sm-9">
		<section class="">
			<div id="carousel">
				<?php get_template_part( 'templates/home/home' , 'carousel' ); ?>
			</div>
		</section>
		<main class=" main">
			<div class="col-xs-12 home-main">
				<?php get_template_part( 'templates/home/home' , 'content' ); ?>
			</div>
		</main>
	</div>
	<div class="col-xs-12 col-sm-3">
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer(); ?>
