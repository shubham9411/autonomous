<?php
/**
 * Header template for master head information
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?>
<div class="jumbotron masthead hidden-xs" id="masthead">
	<div class="container">
		<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
		<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
	</div>
</div><!-- #masthead -->
