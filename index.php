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
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'templates/post/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'autonomous' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'autonomous' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"><i class="glyphicon glyphicon-arrow-left"></i></span>%title</span>',
						'next_text' => '<span class="sr-only">' . __( 'Next Post', 'autonomous' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'autonomous' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="glyphicon glyphicon-arrow-right"></i></span></span>',
					) );

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
<?php get_footer();
