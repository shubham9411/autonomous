<?php
/**
 * Template for Content of notices etc
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

wp_reset_postdata();
$tab_category = get_field( 'tabs_categories' );
$tabs = '';
foreach ($tab_category as $key => $value) {
	$active = ( $key == 0 ) ? 'active' : ' ';
	$category = get_category( $value );
	$tabs .= '<li role="presentation" class="' . $active . '"><a data-toggle="tab" href="#' . $category->slug . '">' . $category->name . '&nbsp;<span id="' . $category->slug . '-badge" class="badge"></span></a></li>';
}
?><div class="row-fluid">
	<ul class="nav nav-tabs tabs-home" id="tabs-home">
		<?php echo $tabs; // WPCS xss ok. ?>
	</ul>
	<div class="tab-content">
	<?php
	foreach ($tab_category as $key => $value) {
		$category = get_category( $value );
		$active = ( $key == 0 ) ? 'active' : ' ';
	?>
		<div class="tab-pane fade in <?php echo esc_html( $active );?>" id="<?php echo esc_attr( $category->slug ); ?>">
			<?php anomous_tabs_home( $category->slug ); ?>
			<p class="text-right nounderline"><a href="<?php echo esc_url( get_category_link( $category->term_id ) );?>" title="Notices" class="btn btn-info">Read More</a></p>
		</div>
	<?php
	}
	?>
	</div>
</div>
