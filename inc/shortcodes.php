<?php
/**
 * Includes ShortCodes in Theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

/**
 * Included ShortCodes are
 * clg_gallery Show Gallery for Particular Dept
 * featured_profile for showing Featured Profile
 */

if ( ! function_exists( 'anomous_clg_gallery' ) ) {
	/**
	 * Function for Showing the Featured Images of Departments.
	 */
	function anomous_clg_gallery() {
		if ( anomous_is_dept() && get_field( 'clg_gallery' ) ) :
			$galleries = get_field( 'clg_gallery' );
			$count_img = count( $galleries );
			?>
			<section id="dept-gallery" class="widget widget-gallery">
				<!-- <h4>Department Insight!</h4> -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php for( $i = 0; $i < $count_img; $i++ ) {
						?>
						<div class="item <?php echo ( $i == 0 ) ? 'active' : ''; ?>">
							<img id="dept-img-<?php esc_attr_e( $i+1 );?>" src="<?php esc_html_e( $galleries[$i]->guid );?>" class="img-responsive dept-img" alt="<?php esc_html_e( $galleries[$i]->post_excerpt );?>">
						</div>
						<div id="dept-modal-<?php esc_attr_e( $i+1 );?>" class="modal">
							<span class="close" onclick="document.getElementById( 'dept-modal-<?php esc_attr_e( $i+1 );?>' ).style.display='none'">&times;</span>
							<img id="dept-img-modal-<?php esc_attr_e( $i+1 );?>" class="modal-content" >
							<div id="dept-img-caption-<?php esc_attr_e( $i+1 );?>" class="caption"></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php
		endif;
	}
	add_shortcode( 'clg_gallery' ,'anomous_clg_gallery' );
}

if ( ! function_exists( 'anomous_featured_profile' ) ) {
	/**
	 * Function for Showing the Featured Profile of HOD or the Incharge of the Particular Department.
	 */
	function anomous_featured_profile() {
		if ( anomous_is_dept() ) :
			$title = get_field( 'user_profile' );
			$dept_hod = get_field( 'featured_profile' );
			$name = $dept_hod['display_name'];
			$avatar_src = get_avatar_url( $dept_hod[ID] , array( 'size' => 200 ) );
			$desc = get_user_meta( $dept_hod[ID] , 'description' )[0];
			$specialization = get_user_meta( $dept_hod[ID] , 'faculty_specialization' )[0];
			$auth_url = get_author_posts_url( $dept_hod[ID] );
			?>
			<section id="hod-profile" class="widget widget-hod">
				<h4 class="text-center"><?php esc_html_e( $title );?></h4 class="text-center">
				<a href="<?php echo esc_url( $auth_url );?>" class="hod-section">
					<img src="<?php esc_html_e( $avatar_src );?>" class="img-responsive img-circle" alt="Avatar" >
					<div class="hod-info">
						<h4 class=""><strong><?php esc_html_e( $name ); ?></strong></h4>
						<h4 class=""><?php esc_html_e( $specialization ); ?></h4>
						<h5 class="visible-sm hod-desc"><?php esc_html_e( $desc ); ?></h5>
					</div>
				</a>
			</section>
		<?php
		endif;
	}
	add_shortcode( 'featured_profile' ,'anomous_featured_profile' );
}

if ( ! function_exists( 'anomous_dept_menu' ) ) {
	/**
	 * Function Displays the menu for Showing Time Table and Syallabus
	 */
	function anomous_dept_menu( $attr ) {
		if ( anomous_is_dept() ) :
			$time_table = get_field( 'time_table' );
			$dept_syllabus = get_field( 'dept_syllabus' );
			if ( ! $time_table ) {
				$time_table->guid = '#';
			}
			if ( ! $attr['title'] ) {
				$attr['title'] = 'Useful Links'; //Fallback.
			}
		?>
			<h1 class="widget-title"><?php esc_html_e( $attr[ 'title' ] );?></h1>
			<ul id="dept-links-menu">
				<li>
					<a href="<?php echo esc_url( $time_table->guid );?>" target="_blank">Time Table </a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#syllabusModal" href="#syllabus">Syllabus</a>
				</li>
			</ul>
			<div class="modal fade" id="syllabusModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close close-button" data-dismiss="modal">×</button>
							<h4><span class="fa fa-graduation-cap"></span> Syllabus</h4>
						</div>
						<div class="modal-body">
							<ul class="list-group">
							<?php
								$year = array( 
									1 => 'First',
									2 => 'Second',
									3 => 'Third',
								 );
								foreach ($dept_syllabus as $key => $value) {
									$syllabus_link = wp_get_attachment_url( $value );
									echo '<a class="list-group-item" href="' . $syllabus_link . '" target="_blank">' . $year[$key+1] . ' Year</a>';
								}
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php
		endif;
	}
	add_shortcode( 'dept_menu' ,'anomous_dept_menu' );
}