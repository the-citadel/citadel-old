<?php 

defined( 'ABSPATH' ) || exit;

register_sidebar(array(
	'name' 			=> 'Home CTA',
	'id'         	=> 'home-cta',
	'before_widget' => '<div class="%1$s widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n",
) );

register_sidebar(array(
	'name' 			=> 'Home Featured Video',
	'id'         	=> 'home-featured-video',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<span class="hidden">',
	'after_title'   => "</span>\n",
) );

register_sidebar(array(
	'name' 			=> 'Sidebar Buttons',
	'id'         	=> 'sidebar-buttons',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<span class="hidden">',
	'after_title'   => "</span>\n",
) );

// Register and load the widget
function citadel_load_widget() {
    register_widget( 'citadel_cta_widget' );
}
add_action( 'widgets_init', 'citadel_load_widget' );
 
// Creating the widget 
class citadel_cta_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(

		// Base ID of your widget
		'citadel_cta_widget', 

		// Widget name will appear in UI
		__('Citadel CTA', 'citadel'), 

		// Widget description
		array( 'description' => __( 'Citadel Call to Action Button', 'citadel' ), ) 
		);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$link = $instance['link'];
		$fa = $instance['fa'];

		echo $args['before_widget'];
		
		if ( ! empty( $link ) )
		echo __( '<a href="' . $link . '">', 'citadel' );
		
		if ( ! empty( $fa ) )
		echo __( '<div class="cta-icon"><i class="fa-fw ' . $fa . '"></i></div>', 'citadel' );
		
		if ( ! empty( $title ) )
		echo __( '<span class="cta-title">' . $title . '</span></a>', 'citadel' );
		
		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( '', 'citadel' );
		}
		
		if ( isset( $instance[ 'link' ] ) ) {
			$link = $instance[ 'link' ];
		} else {
			$link = __( '', 'citadel' );
		}
		
		if ( isset( $instance[ 'fa' ] ) ) {
			$fa = $instance[ 'fa' ];
		} else {
			$fa = __( '', 'citadel' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'fa' ); ?>"><a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank"><?php _e( 'Font Awesome' ); ?></a> Classes:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'fa' ); ?>" name="<?php echo $this->get_field_name( 'fa' ); ?>" type="text" value="<?php echo esc_attr( $fa ); ?>" />
		</p>
	<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
		$instance['fa'] = ( ! empty( $new_instance['fa'] ) ) ? strip_tags( $new_instance['fa'] ) : '';
		return $instance;
	}
} // Class citadel_cta_widget ends here