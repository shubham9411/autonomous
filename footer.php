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
<div class="footer" id="footer-second">
	<div class="container">
		<div class="copyright pull-left">
			<p> B.T.K.I.T. Dwarahat &copy; <?php echo esc_html( current_time( 'Y' ) );?>. All Rights Reserved.</p>
		</div>
		<div class="designer pull-right">
			<p>Designed and Developed By <a href="https://shubhampandey.in" title="WordPress Developer" rel="designer">Shubham Pandey</a> &amp; <a href="https://facebook.com/rohit.juyal.507" rel="designer">Rohit Juyal</a> CSE Dept.</p>
		</div>
		
	</div>
</div>
	</div> <!-- .page-->
	<?php wp_footer(); ?>
</body>
</html>
