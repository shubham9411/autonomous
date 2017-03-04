<?php
/**
 * Template for Content of notices etc
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><div class="row-fluid">
	<ul class="nav nav-tabs tabs-home">
		<li role="presentation" class="active"><a data-toggle="tab" href="#announcements">Announcements</a></li>
		<li role="presentation"><a data-toggle="tab" href="#event">Event</a></li>
		<li role="presentation"><a data-toggle="tab" href="#notice">Notice</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in" id="notice">
			<?php $category_id = get_cat_ID( 'notices' ); ?>
			<?php anomous_tabs_home( 'notices' ); ?>
			<p class="text-right nounderline"><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Notices" class="btn btn-primary">Read More</a></p>
		</div>
		<div class="tab-pane fade in" id="event">
			<?php $category_id = get_cat_ID( 'events' ); ?>
			<?php anomous_tabs_home( 'events' ); ?>
			<p class="text-right nounderline"><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Events" class="btn btn-primary">Read More</a></p>
		</div>
		<div class="tab-pane fade in active" id="announcements">
			<?php $category_id = get_cat_ID( 'announcements' ); ?>
			<?php anomous_tabs_home( 'announcements' ); ?>
			<p class="text-right nounderline"><a href="<?php echo esc_url( get_category_link( $category_id ) );?>" title="Announcements" class="btn btn-primary">Read More</a></p>
		</div>
	</div>
</div>
