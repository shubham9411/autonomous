<?php
/**
 * Template Name: Single Page View
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
?>

<div class="container wrap">
	<div id="primary" class="content-area col-xs-12">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'templates/post/content', 'page' );
					echo '<hr />';
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<nav aria-label="pagination">
			<?php
			if ( get_next_posts_link() ) :
			?>
			<li class="btn btn-info alignleft">
				<?php next_posts_link( 'Previous' ); ?>
			</li>
			<?php
			endif;
			if ( get_previous_posts_link() ) :
			?>
			<li class="btn btn-info alignright">
				<?php previous_posts_link( 'Next' ); ?>
			</li>
			<?php
			endif;
			?>
		</nav>
		<?php else : ?>
			<main>
				<h1 class="center"><?php esc_html_e( 'No Result found...' , 'autonomous' ); ?></h1>
				<hr/>
			</main>
		<?php endif; ?>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
