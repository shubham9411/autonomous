<?php
/**
 * Template part for displaying category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="' . anomous_new_class() . '">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<hr />
		<?php
			// the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'autonomous' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
