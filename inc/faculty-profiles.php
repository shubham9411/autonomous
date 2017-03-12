<?php
/**
 * Template for Faculty Profiles
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

/**
 * Function for adding custom fields to Profile menu
 *
 * @param array $user user object.
 */
function anomous_add_custom_user_profile_fields( $user ) {
?>
	<h3><?php esc_html_e( 'Extra Profile Infodrmation' , 'autonomous' ); ?></h3>
	
	<table class="form-table">
		<tr>
			<th>
				<label for="dept"><?php esc_html_e( 'Department', 'autonomous' ); ?>
			</label></th>
			<td>
				<select name="dept" id="dept">
					<option value="anomous_cse" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_cse' );?>>Computer Science Department</option>
					<option value="anomous_ece" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_ece' );?>>Electronics Department</option>
					<option value="anomous_me" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_me' );?>>Mechanical engineering</option>
					<option value="anomous_bce" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_bce' );?>>Biochemical engineering</option>
					<option value="anomous_ee" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_ee' );?>>Electrical engineering</option>
					<option value="anomous_ce" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_ce' );?>>Civil engineering</option>
					<option value="anomous_che" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_che' );?>>Chemical engineering</option>
					<option value="anomous_asd" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_asd' );?>>Applied and science engineering</option>
					<option value="anomous_mca" <?php selected( get_the_author_meta( 'dept', $user->ID ) , 'anomous_mca' );?>>MCA</option>
				</select>
				<span class="description"><?php esc_html_e( 'Plese Select your Department Name' , 'autonomous' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="faculty_position"><?php esc_html_e( 'Position' , 'autonomous' ); ?>
			</label></th>
			<td>
				<input type="text" name="faculty_position" id="faculty_position" value="<?php echo esc_html( get_the_author_meta( 'faculty_position', $user->ID ) );?>">
				<span class="description"><?php esc_html_e( 'Plese Enter your Position ex. Assistent Professor' , 'autonomous' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="faculty_qual"><?php esc_html_e( 'Qualification' , 'autonomous' ); ?>
			</label></th>
			<td>
				<input type="text" name="faculty_qual" id="faculty_qual" value="<?php echo esc_html( get_the_author_meta( 'faculty_qual' , $user->ID ) );?>">
				<span class="description"><?php esc_html_e( 'Plese Enter your Qualification' , 'autonomous' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="faculty_exp"><?php esc_html_e( 'Experience', 'autonomous' ); ?>
			</label></th>
			<td>
				<input type="number" name="faculty_exp" id="faculty_exp" value="<?php echo esc_html( get_the_author_meta( 'faculty_exp' , $user->ID ) );?>">
				<span class="description"><?php esc_html_e( 'Plese enter your Experience' , 'autonomous' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="faculty_specialization"><?php esc_html_e( 'Specialization/Area of Interst' , 'autonomous' ); ?>
			</label></th>
			<td>
				<input type="text" name="faculty_specialization" id="faculty_specialization" value="<?php echo esc_html( get_the_author_meta( 'faculty_specialization', $user->ID ) );?>">
				<span class="description"><?php esc_html_e( 'Plese Enter your Area of Interst', 'autonomous' ); ?></span>
			</td>
		</tr>
	</table>
<?php
}

/**
 * Function for saving profiles info of faculties
 *
 * @param int $user_id user id of the particular user.
 */
function anomous_save_custom_user_profile_fields( $user_id ) {
	
	if ( ! current_user_can( 'edit_user' , $user_id ) ) {
		return false;
	}
	update_usermeta( $user_id, 'dept', $_POST['dept'] );
	update_usermeta( $user_id, 'faculty_position', $_POST['faculty_position'] );
	update_usermeta( $user_id, 'faculty_qual', $_POST['faculty_qual'] );
	update_usermeta( $user_id, 'faculty_exp', $_POST['faculty_exp'] );
	update_usermeta( $user_id, 'faculty_specialization', $_POST['faculty_specialization'] );
}

add_action( 'show_user_profile', 'anomous_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'anomous_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'anomous_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'anomous_save_custom_user_profile_fields' );
