<?php
/**
 * Template part for displaying Gallery
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 * @version 1.0
 */

?>
<div class="grid-item">
	<a><?php the_post_thumbnail( 'anomous-gallery-cover',  array('class' => 'img-responsive gallery-image') ); ?></a>
	<a href="<?php the_permalink();?>" class="gallery-overlay">
		<div class="gallery-title"><?php the_title(); ?></div>
	</a>
</div>