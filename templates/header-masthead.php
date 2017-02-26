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
		<h1 class="site-title" id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description" id="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>
</div><!-- #masthead -->
