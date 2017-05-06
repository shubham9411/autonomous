<?php
/**
 * The sidebar containing the Footer Widget Area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Autonomous
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>

<aside id="footer-widgets" class="widget-area" role="complementary">
	<section class="widget address">
		<h2 class="widget-title">B. T. K. I. T. Dwarahat</h2>
		<ul class="unstyled address">
			<li>
				<i class="fa fa-home"></i><strong>Address:</strong> Dwarahat, Almora, Uttarakhand<br>
			</li>
			<li>
				<i class="fa fa-envelope"></i>
				<strong>Email: </strong> <a href="mailto:director@kecua.ac.in" style="color:#ccc">director@kecua.ac.in</a>
			</li>
			<li>
				<i class="fa fa-globe"></i>
				<strong>Website:</strong> www.kecua.ac.in
			</li>
			<li>
				<i class="fa fa-phone"></i>
				<strong>Phone:</strong> +91.5966-244250
			</li>
			<li>
				<i class="fa fa-phone"></i>
				<strong>Fax:</strong> +91.5966-244114
			</li>
		</ul>
	</section>
	<?php dynamic_sidebar( 'footer' ); ?>
</aside><!-- #secondary -->
