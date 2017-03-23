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
		<section id="depts-gallery">
			<h2 class="widget-title"><?php esc_html_e( $attr[ 'title' ] );?></h2>
			<ul id="dept-links-menu">
				<li>
					<?php
						global $post, $dept_names;
						$title = get_the_title( $post->ID );
						$fac_categ = array_search( "$title" , $dept_names );
						$fac_categ  = substr( $fac_categ , 8 );
					?>
					<a id="link-modal-faculty" href="<?php echo get_the_permalink( get_page_by_title( 'Faculties' ) ) . '#' . esc_attr( $fac_categ );?>" data-toggle="modal" data-target="#modalFaculties" >Faculties</a>
				</li>
				<li>
					<a href="<?php echo esc_url( $time_table->guid );?>" target="_blank">Time Table </a>
				</li>
				<?php
				if ( $dept_syllabus ) :
				?>
				<li>
					<a  data-toggle="collapse" data-target="#syllabusCollapse" href="#syllabus">Syllabus</a>
					<div id="syllabusCollapse" class="collapse">
						<ul class="">
						<?php
							foreach ($dept_syllabus as $key => $value) {
								$syllabus_link = wp_get_attachment_url( $value );
								$caption = wp_get_attachment_caption( $value );
								echo '<li class="list-group-"><a href="' . $syllabus_link . '" target="_blank">' . $caption . '</a></li>';
							}
						?>
						</ul>
					</div>
				</li>
				<?php
				endif;
				?>
			</ul>
		</section>
		<div class="modals">
			<div class="modal fade" id="modalFaculties" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close close-button" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Our Faculties!</h4>
						</div>
						<div class="modal-body">
							<?php
								global $post, $dept_names;
								$title = get_the_title( $post->ID );
								$fac_categ = array_search( "$title" , $dept_names );
								$args = array(
								'meta_key'     => 'dept',
								'meta_value'   => $fac_categ,
							);
							$blog_user = get_users( $args );
							foreach ( $blog_user as $user ) {
								?>
								<a href="<?php echo esc_url( get_author_posts_url( $user->id ) );?>" class="list-group-item">
									<div class="row">
										<div class="col-sm-3">
											<img src="<?php echo esc_url( get_avatar_url( $user->id , array( 'size' => 250 ) ) );?>" alt="Avatar" class="img-responsive">
										</div>
										<div class="col-sm-9">
											<h4><b><?php echo esc_html( $user->display_name );?></b></h4> 
											<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_position' )[0] );?></h4>
											<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_qual' )[0] );?></h4>
											<h4><?php echo esc_html( get_user_meta( $user->id, 'faculty_specialization' )[0] );?></h4>
										</div>
									</div>
								</a>
								<?php
							}
							?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;
	}
	add_shortcode( 'dept_menu' ,'anomous_dept_menu' );
}