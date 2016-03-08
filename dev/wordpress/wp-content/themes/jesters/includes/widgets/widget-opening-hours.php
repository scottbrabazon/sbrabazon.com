<?php
  /*---------------------------------------------------------------------------------*/
 /* Opening Hours Widget 															*/
/*---------------------------------------------------------------------------------*/

class Nice_Opening_Hours_Widget extends WP_Widget {

	var $settings = array( 'title' );

	function __construct() {

		$this->alt_option_name = 'nice_opening_hours';

		parent::__construct('nice_opening_hours', __('Opening Hours (NiceThemes)', 'nicethemes'), array('description' => 'Display your business Opening Hours with this widget.' ));

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );

	} // end __construct()

	function widget($args, $instance) {

		$cache = wp_cache_get('widget_nice_opening_hours', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$settings = array_fill_keys( $this->settings, '' );

		extract( $args, EXTR_SKIP );

		$instance = wp_parse_args( $instance, $settings );

		extract( $instance, EXTR_SKIP );

		echo $before_widget;

		if ( $title <> '' ) echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;

		// get times and do the magic!
		echo nice_opening_hours();

		echo $after_widget;

		$cache[ $args[ 'widget_id' ] ] = ob_get_flush();
		wp_cache_set( 'widget_nice_opening_hours', $cache, 'widget' );

	}

	function update( $new_instance, $old_instance ) {

		foreach ( array( 'title', 'image', 'href', 'alt', 'title_text' ) as $setting )
			$new_instance[$setting] = strip_tags( $new_instance[$setting] );

		$this->flush_widget_cache();

		if ( !current_user_can( 'unfiltered_html' ) )
			$new_instance['code'] = $old_instance['code'];

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['nice_opening_hours'] ) )
			delete_option('nice_opening_hours');

		return $new_instance;
	} // end update()

	function flush_widget_cache() {
		wp_cache_delete('widget_nice_opening_hours', 'widget');
	} // end flush_widget_cache()


	function form($instance) {

		$settings = array_fill_keys( $this->settings, '' );

		$instance = wp_parse_args( $instance, $settings );

		extract( $instance, EXTR_SKIP );
?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','nicethemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>
<?php
	}
}

add_action( 'widgets_init', create_function( '', 'return register_widget("Nice_Opening_Hours_Widget");' ), 1 );
?>
