<?php
/**
 * Template for Content of notices etc
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><div class="row-fluid">
	<ul class="nav nav-tabs nav-justified">
		<li role="presentation" class="active"><a data-toggle="tab" href="#announcements">Announcements</a></li>
		<li role="presentation"><a data-toggle="tab" href="#event">Event</a></li>
		<li role="presentation"><a data-toggle="tab" href="#notice">Notice</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in" id="notice">
			<?php $category_id = get_cat_ID( 'notices' ); ?>
			<ul class="list-group no-list">
				<?php anomous_tabs_home( 'notices' ); ?>
				<li class="text-right"><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Notices" class="list-group-item">Read More</a></li>
			</ul>
		</div>
		<div class="tab-pane fade in" id="event">
			<?php $category_id = get_cat_ID( 'events' ); ?>
			<ul class="no-list">
				<?php anomous_tabs_home( 'events' ); ?>
				<li class="text-right"><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Events" class="list-group-item">Read More</a></li>
			</ul>
		</div>
		<div class="tab-pane fade in active" id="announcements">
			<?php $category_id = get_cat_ID( 'news' ); ?>
			<ul class="no-list">
				<?php anomous_tabs_home( 'news' ); ?>
				<li class="text-right"><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="News" class="list-group-item">Read More</a></	pli>
			</ul>
		</div>
	</div>
</div>
