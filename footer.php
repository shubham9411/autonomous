<?php
/**
 * Footer for the theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?>
</div> <!-- .content-->
<footer class="footer" id="footer-main">
	<div class="container">
		<?php get_sidebar( 'footer' ); ?>
	</div>
	</footer> <!-- .footer-->
	<footer class="footer" id="footer-second">
		<div class="container">
			<div class="copyright">
				<p> B.T.K.I.T. Dwarahat © <?php echo current_time( 'Y' );?>. All Rights Reserved.</p>
			</div>
			<div class="social">
				<div class="facebook"><a href="#"><i class="fa fa-facebook"></i><span class="sr-only">Facebook</span></a></div>
				<div class="twitter"><a href="#"><i class="fa fa-twitter"></i><span class="sr-only">Twitter</span></a></div>
				<div class="youtube"><a href="#"><i class="fa fa-youtube-play"></i><span class="sr-only">Youtube</span></a></div>
				<div class="g-plus"><a href="#"><i class="fa fa-google-plus"></i><span class="sr-only">Google Plus</span></a></div>
			</div>
		</div>
	</footer>
	</div> <!-- .page-->
	<?php wp_footer(); ?>
</body>
</html>
