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
			'featured_profile',
			esc_html__( 'Featured Profile', 'autonomous' ),
			array( 'description' => esc_html__( 'Featured Profile', 'autonomous' ), )
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
			$desc = get_user_meta( $dept_hod['ID'] , 'description' )[0];
			$specialization = $value = get_field( 'profile_specialisation', 'user_'.$dept_hod['ID'] );
			$auth_url = get_author_posts_url( $dept_hod['ID'] );
			$image = get_field( 'profile_picture', 'user_'.$dept_hod['ID'] );
			$image_obj = wp_get_attachment_image( $image, 'anomous-alumni-avatar', "", array( "class" => "img-responsive img-circle") );
			?>
			<h4 class="text-center"><?php echo esc_html( $title );?></h4 class="text-center">
			<a href="<?php echo esc_url( $auth_url );?>" class="hod-section">
				<?php echo $image_obj;?>
				<div class="hod-info">
					<h4 class=""><strong><?php echo esc_html( $name ); ?></strong></h4>
					<h4 class=""><?php echo esc_html( $specialization ); ?></h4>
					<h5 class="visible-sm hod-desc"><?php echo esc_html( $desc ); ?></h5>
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
			'department_menu',
			esc_html__( 'Department Menu', 'autonomous' ),
			array( 'description' => esc_html__( 'Department Menu on the sidebar', 'autonomous' ), )
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
					$title = htmlspecialchars_decode( get_the_title( $post->ID ) );
					$fac_categ = array_search( "$title" , $dept_names );
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
								global $post;
								$dept_names = get_theme_mod( 'dept_choices', '' );
								$title = htmlspecialchars_decode(get_the_title( $post->ID ));
								$fac_categ = array_search( "$title" , $dept_names );
								$fac = array(
								'meta_key'     => 'profile_department',
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
											<?php anomous_user_details( $user->ID ); ?>
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'autonomous' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'autonomous' ); ?></label> 
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