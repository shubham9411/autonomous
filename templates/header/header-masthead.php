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
		<div class="custom-image">
		<?php the_custom_logo(); ?>
		</div>
		<div class="header-text">
			<h1 class="site-title" id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description" id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		<div class="header-search-box">
			<form action="/" method="get">
				<div class="form-group">
					<div class="search-input">
						<input type="text" class="form-control top-search" name="s" id="search" value="" placeholder="Search" >
						<i class="form-control-feedback glyphicon glyphicon-search"></i>
					</div>
				</div>
			</form>
		</div>
	</div>
</div><!-- #masthead -->
