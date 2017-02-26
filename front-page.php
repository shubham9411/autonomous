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
<section class="row-fluid">
	<div id="carousel">
		<?php get_template_part( 'templates/home/home' , 'carousel' ); ?>
	</div>
</section>
<main class="container main">
	<div class="col-xs-12 col-md-8">
		<?php get_template_part( 'templates/home/home' , 'content' ); ?>
	</div>
	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>
