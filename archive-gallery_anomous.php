<?php
/**
 * Template Name: Gallery
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
<div class="container-fluid wrap">
	<div id="primary" class="content-area col-xs-12">
		<main id="main" class="site-main" role="main">
			<div class="grid">
			<?php 
		$alumni = array(
			'post_type'        => 'gallery_anomous',
		);
		$loop = new WP_Query( $alumni );?>
			<?php if ( $loop->have_posts() ) : ?>
				<?php
					/* Start the Loop */
					while ( $loop->have_posts() ) : $loop->the_post();
						get_template_part( 'templates/post/content', 'gallery' );
					endwhile; // End of the loop.
				?>
			</div>
		</main><!-- #main -->
		<?php else : ?>
		<main>
			<h1 class="center"><?php esc_html_e( 'No Result found...' , 'autonomous' ); ?></h1>
			<hr/>
		</main>
		<?php endif; ?>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
