<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
?>

<div class="container wrap">
	<div id="primary" class="col-xs-12 col-md-9 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/post/content', 'page' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<?php
		if ( anomous_is_dept() ) {
			anomous_hof_render();
		}
		?>
	</div><!-- #primary -->
	<div class="col-xs-12 col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div><!-- .wrap -->


<?php get_footer();
