<?php	 
// Creating the widget 
class Kisima_Packages_Widget extends WP_Widget {
	 
	public function __construct() 
	{
		parent::__construct(
	 
	// Base ID of your widget
		'kisima_packages_widget', 
	 
	// Widget name will appear in UI
		__('Packages', 'kisima_widget_domain'), 
		 
		// Widget description
		array( 'description' => __( 'Kisima safari packages widgets', 'kisima_widget_domain' ), ) 
		);
	}
	 
	// Creating widget front-end
	 
	public function widget( $args, $instance ) 
	{
		$args['before_title'] = "<h2 class='display-7 widget-title font-raleway'>";
		$args['after_title'] = "</h2><div class='content f-1 font'>";
		$args['before_widget'] = "<div class='package-sd py-3 px-3 mb-3 bg-white text-muted'>";
		$args['after_widget'] = "</div></div>";

		$title = apply_filters( 'widget_title', $instance['title'] );
	 
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		 
		// This is where you run the code and display the output
		// echo __( $instance['content'], 'kisima_widget_domain' );
		echo '<div id="accordion" role="tablist" aria-multiselectable="true">';
		wp_nav_menu( [ 
				'theme_location' => 'packages',
				'container' => '',
				'container_class' => '',
				'menu_class' => '',
				'walker' => ''
			] 
		 );
		echo '</div>';

		// echo "<a href='#' class='k-bg-primary bx text-white free-enquiry d-block text-center py-2 mt-3 font-raleway f-2'>Send us free enquiry</a>";
		echo $args['after_widget'];
	}
	         
	// Widget Backend 
	public function form( $instance ) 
	{
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'kisima_widget_domain' );
		}

		if ( isset( $instance[ 'content' ] ) ) {
			$content = $instance[ 'content' ];
		}
		else {
		$content = __( 'New Content', 'kisima_widget_domain' );
		}
	// Widget admin form
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input 
				class="widefat" 
				id="<?php echo $this->get_field_id( 'title' ); ?>" 
				name="<?php echo $this->get_field_name( 'title' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $title ); ?>"
			/>
		</p>
		<?php 
		}
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		// $instance['content'] .= ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
		return $instance;
	}
}