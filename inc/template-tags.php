<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

/**
 * Function for adding checkbox to publish option.
 */
function anomous_new_checkbox()
{
	$post_id = get_the_ID();
	if ( get_post_type( $post_id ) != 'post' ) {
		return;
	}
	$value = get_post_meta($post_id, 'anomous_new_checkbox', true);
	wp_nonce_field('anomous_checkbox_new_nonce_'.$post_id, 'anomous_checkbox_new_nonce_');
	?>
	<div class="misc-pub-section misc-pub-section-last">
		<label><input type="checkbox" value="1" <?php checked($value, true, true); ?> name="anomous_new_checkbox" /><?php _e('Add \'New\' Label', 'autonomous'); ?></label>
	</div>
	<?php
}

/**
 * Saving the custom checkbox.
 */
function anomous_save_checkbox($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if ( !isset( $_POST['anomous_checkbox_new_nonce_'] ) ||!wp_verify_nonce( $_POST['anomous_checkbox_new_nonce_'] , 'anomous_checkbox_new_nonce_'.$post_id ) ) {
			return;
		}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (isset($_POST['anomous_new_checkbox'])) {
		update_post_meta($post_id, 'anomous_new_checkbox', $_POST['anomous_new_checkbox']);
	} else {
		delete_post_meta($post_id, 'anomous_new_checkbox');
	}
}

add_action( 'post_submitbox_misc_actions' , 'anomous_new_checkbox' );
add_action( 'save_post' , 'anomous_save_checkbox' );
