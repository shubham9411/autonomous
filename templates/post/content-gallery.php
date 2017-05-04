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
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'anomous-gallery-cover',  array('class' => 'img-responsive') ); ?>
	</a>
</div>