<?php
/**
 * Template File for author pages
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
?>

<div class="container wrap">
	<div id="primary" class="content-area col-xs-12">
		<section class="container-fluid no-padding author-info">
			<?php
			$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug' , $author_name ) : get_userdata( intval( $author ) );
			$user_id = $curauth->ID;
			?>
			<hr />
			<div class="col-xs-12 col-sm-3 col-md-2 author-avatar">
				<img src="<?php echo esc_url( get_avatar_url( $user_id , array( 'size' => 250 ) ) );?>" alt="Faculty Avatar" class="img-responsive img-circle">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-10 faculty-details">
				<h2><b><?php echo esc_html( get_author_name( $user_id ) );?></b></h2>
				<h3><?php echo esc_html( get_user_meta( $user_id, 'faculty_position' )[0] );?></h3>
				<h3><?php echo esc_html( get_user_meta( $user_id, 'faculty_qual' )[0] );?></h3>
				<h3><?php echo esc_html( get_user_meta( $user_id, 'description' )[0] ); ?></h3>
			</div>
			<hr class="col-xs-12" />
		</section>
		<main id="main" class="site-main" role="main">
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'templates/post/content', '' );
					echo '<hr />';
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<nav aria-label="pagination">
			<?php
			if ( get_next_posts_link() ) :
			?>
			<li class="btn btn-primary alignleft">
				<?php next_posts_link( 'Previous' ); ?>
			</li>
			<?php
			endif;
			if ( get_previous_posts_link() ) :
			?>
			<li class="btn btn-primary alignright">
				<?php previous_posts_link( 'Next' ); ?>
			</li>
			<?php
			endif;
			?>
		</nav>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
