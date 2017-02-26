<?php
/**
 * Template for Content of notices etc
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><div class="row-fluid">
	<div class="col-xs-12 col-sm-6 ">
		<div class="card notice" id="notice">
			<?php $category_id = get_cat_ID( 'notices' ); ?>
			<h4><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Notices">Notices</a></h4>
			<ul class="no-list">
				<?php anomous_cards_home( 'notices' ); ?>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 ">
		<div class="card event" id="event">
			<?php $category_id = get_cat_ID( 'events' ); ?>
			<h4><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Events">Events</a></h4>
			<ul class="no-list">
				<?php anomous_cards_home( 'events' ); ?>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 ">
		<div class="card news" id="news">
			<?php $category_id = get_cat_ID( 'news' ); ?>
			<h4><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="News">News</a></h4>
			<ul class="no-list">
				<?php anomous_cards_home( 'news' ); ?>
			</ul>
		</div>
	</div>
</div>
