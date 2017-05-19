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
			$user_data = get_user_meta( $user_id );
			$image = get_field( 'profile_picture', 'user_'.$user_id );
			$image_obj = wp_get_attachment_image( $image, 'anomous-alumni-avatar', "", array( "class" => "img-responsive img-circle") );
			$desc = get_user_meta( $user_id , 'description' )[0];
			?>
			<hr />
			<div class="col-xs-12 col-sm-3 col-md-2 author-avatar">
				<?php echo $image_obj;?>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-10 faculty-details">
				<h2><b><?php echo esc_html( $curauth->display_name );?></b></h2>
				<?php anomous_user_details( $user_id ); ?>
				<h4>
					<span><?php
					if( $curauth->user_email ) {
						echo '<b>Email : </b>' . $curauth->user_email .'&nbsp;&nbsp;';
					}
					?></span>
					<span><?php
					if( $curauth->user_url ) {
						echo '<b>Website : </b>' . $curauth->user_url ;
					}
					?></span>
				</h4>
				<h4><?php
				if( $desc )
					echo '<b>Description : </b>' . $desc;
				?></h4>
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
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
