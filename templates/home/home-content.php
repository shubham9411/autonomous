<?php
/**
 * Template for Content of notices etc
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><div class="row-fluid">
	<div class="col-xs-12 col-sm-6 col-md-4 less-padding">
		<div class="card notice" id="notice">
			<?php $category_id = get_cat_ID( 'notices' ); ?>
			<h2><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Notices">Notices</a></h2>
			<ul class="no-list">
				<?php anomous_cards_home( 'notices' ); ?>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 less-padding">
		<div class="card event" id="event">
			<?php $category_id = get_cat_ID( 'events' ); ?>
			<h2><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Events">Events</a></h2>
			<ul class="no-list">
				<?php anomous_cards_home( 'events' ); ?>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 less-padding">
		<div class="card news" id="news">
			<?php $category_id = get_cat_ID( 'news' ); ?>
			<h2><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="News">News</a></h2>
			<ul class="no-list">
				<?php anomous_cards_home( 'news' ); ?>
			</ul>
		</div>
	</div>
</div>
