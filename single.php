<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container wrap">
	<div id="primary" class="content-area col-xs-12 col-md-9">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'templates/post/content' );
					?>
					<hr class="gap col-xs-12" />
					<?php
					the_post_navigation( array(
						'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'autonomous' ) . '</span><span aria-hidden="true" class="btn btn-info nav-subtitle">' . __( 'Previous', 'autonomous' ) . '</span>',
						'next_text' => '<span class="sr-only">' . __( 'Next Post', 'autonomous' ) . '</span><span aria-hidden="true" class="btn btn-info nav-subtitle">' . __( 'Next', 'autonomous' ) . '</span>',
					) );
					?>
					<div class="clearfix"></div>
					<?php
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="col-xs-12 col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div><!-- .wrap -->

<?php get_footer();
