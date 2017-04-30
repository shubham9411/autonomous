<?php
/**
 * Widgets for the Theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

/**
 * Adds Featured_Profile widget.
 */
class Featured_Profile extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'featured_profile', // Base ID
			esc_html__( 'Featured Profile', 'anomous' ), // Name
			array( 'description' => esc_html__( 'Featured Profile', 'anomous' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( anomous_is_dept() ) :
		echo $args['before_widget'];
		wp_reset_postdata();
			$title = get_field( 'user_profile' );
			$dept_hod = get_field( 'featured_profile' );
			$name = $dept_hod['display_name'];
			$avatar_src = get_avatar_url( $dept_hod['ID'] , array( 'size' => 200 ) );
			$desc = get_user_meta( $dept_hod['ID'] , 'description' )[0];
			$specialization = get_user_meta( $dept_hod['ID'] , 'faculty_specialization' )[0];
			$auth_url = get_author_posts_url( $dept_hod['ID'] );
			?>
			<h4 class="text-center"><?php esc_html_e( $title );?></h4 class="text-center">
			<a href="<?php echo esc_url( $auth_url );?>" class="hod-section">
				<img src="<?php esc_html_e( $avatar_src );?>" class="img-responsive img-circle" alt="Avatar" >
				<div class="hod-info">
					<h4 class=""><strong><?php esc_html_e( $name ); ?></strong></h4>
					<h4 class=""><?php esc_html_e( $specialization ); ?></h4>
					<h5 class="visible-sm hod-desc"><?php esc_html_e( $desc ); ?></h5>
				</div>
			</a>
		<?php
		echo $args['after_widget'];
		endif;
	}

} // class featured_profile.

// register featured_profile widget
function anomous_register_featured_profile() {
    register_widget( 'Featured_Profile' );
}
add_action( 'widgets_init', 'anomous_register_featured_profile' );

/**
 * Adds Department_Menu widget.
 */
class Department_Menu extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'department_menu', // Base ID
			esc_html__( 'Department Menu', 'anomous' ), // Name
			array( 'description' => esc_html__( 'Department Menu on the sidebar', 'anomous' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( anomous_is_dept() ) :
		echo $args['before_widget'];
		wp_reset_postdata();
			$time_table = get_field( 'time_table' );
			$dept_syllabus = get_field( 'dept_syllabus' );
			if ( ! $time_table ) {
				$time_table->guid = '#';
			}
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
		?>
		<ul id="dept-links-menu">
			<li>
				<?php
					global $post;
					$dept_names = get_theme_mod( 'dept_choices', '' );
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
								$fac = array(
								'meta_key'     => 'dept',
								'meta_value'   => $fac_categ,
							);
							$blog_user = get_users( $fac );
							foreach ( $blog_user as $user ) {
								?>
								<a href="<?php echo esc_url( get_author_posts_url( $user->ID ) );?>" class="list-group-item">
									<div class="row">
										<div class="col-sm-3">
											<img src="<?php echo esc_url( get_avatar_url( $user->ID , array( 'size' => 250 ) ) );?>" alt="Avatar" class="img-responsive">
										</div>
										<div class="col-sm-9">
											<h4><b><?php echo esc_html( $user->display_name );?></b></h4> 
											<h4><?php echo esc_html( get_user_meta( $user->ID, 'faculty_position' )[0] );?></h4>
											<h4><?php echo esc_html( get_user_meta( $user->ID, 'faculty_qual' )[0] );?></h4>
											<h4><?php echo esc_html( get_user_meta( $user->ID, 'faculty_specialization' )[0] );?></h4>
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
		echo $args['after_widget'];
		endif;
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class featured_profile.

// register featured_profile widget
function anomous_register_department_menu() {
    register_widget( 'Department_Menu' );
}
add_action( 'widgets_init', 'anomous_register_department_menu' );