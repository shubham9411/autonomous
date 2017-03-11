<?php
/**
 * 404
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

get_header();
?>
<main class="container main">
	<div class="col-xs-12 text-center">
		<h1>Oops! That page can’t be found.</h1>
		<hr />
		<p>It looks like nothing was found at this location.</p>
		<?php get_search_form(); ?>
	</div>
</main>
<?php get_footer(); ?>
