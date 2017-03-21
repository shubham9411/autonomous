<?php
/**
 * Header template for top menu
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><nav class="navbar navbar-default" id="site-header-nav" data-spy="affix" data-offset-top="150">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand site-title-nav visible-xs" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>
		<div id="top-menu" class="navbar-collapse collapse">
			<?php
				$args = array(
					'theme_location' => 'top',
					'container' => 'ul',
					'menu_class' => 'nav navbar-nav navbar-left',
					'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth' => 0,
					'walker' => new Walker_Nav_top(),
				);
				wp_nav_menu( $args );
				if ( anomous_is_alumni() ) {
					anomous_alumni_nav();
				}
				?>
		</div><!--.nav-collapse -->
	</div>
</nav>
