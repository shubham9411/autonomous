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
<div class="container" id="carousel">
	<div class="col-xs-12 col-md-8">
		<?php get_template_part( 'templates/home' , 'carousel' ); ?>
	</div>
	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
