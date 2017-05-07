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
<section class="container">
	<div id="carousel">
		<?php get_template_part( 'templates/home/home' , 'carousel' ); ?>
	</div>
</section>
<main class="container main">
	<div class="col-xs-12 home-main">
		<?php get_template_part( 'templates/home/home' , 'content' ); ?>
	</div>
</main>
<?php get_footer(); ?>
