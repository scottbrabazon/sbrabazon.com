<?php
  /*-----------------------------------------------------------------------------------*/
 /*	Feedback Widget																	  */
/*-----------------------------------------------------------------------------------*/

class Nice_Feedback extends WP_Widget {

	function __construct () {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_nice_feedback', 'description' => __( 'With this widget you can display your feedback in a customised manner.', 'nicethemes' ) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'nice_feedback' );

		$this->alt_option_name = 'nice_feedback';

		/* Create the widget. */
		parent::__construct( 'nice_feedback', __('Feedback (NiceThemes)', 'nicethemes' ), $widget_ops, $control_ops );

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );

		// load js only if the widget is active
		if ( is_active_widget( false, false, $this->id_base, true ) ) {
			add_filter( 'nice_load_feedback_js', '__return_true', 10 );
		}

	} // end __construct

 	/*----------------------------------------
	  widget()
	  ----------------------------------------

	  * Displays the widget on the frontend.
	----------------------------------------*/

	function widget( $args, $instance ) {

		$cache = wp_cache_get('widget_nice_feedback', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$html = '';

		extract( $args, EXTR_SKIP );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base );

		$limit = $instance['limit']; if ( ! intval( $limit ) ) { $limit = 5; }
		$featured_image = $instance['featured_image']; if ( ! intval( $featured_image ) ) { $limit = 0; }

		$effect = $instance['effect'];
		$pagination = $instance['pagination'];
		$display_author = $instance['display_author'];
		$display_url = $instance['display_url'];
		$unique_id = $args['widget_id'];

		foreach ( array( 'pagination', 'display_author', 'display_url' ) as $i ) :
			if ( isset( $instance[$i] ) ) :
				if ( $instance[$i] == true ) $$i = true;
				else $$i = false;
			else :
				$$i = false;
			endif;
		endforeach;

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;

		echo nice_display_feedback_items ( array (
													 	'echo' => false,
													 	'effect' => $effect,
														'pagination' => $pagination,
														'display_author' => $display_author,
														'display_url' => $display_url,
														'featured_image' => $featured_image,
														'numberposts' => $limit
													)
											);


		echo $after_widget;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_nice_feedback', $cache, 'widget');

	} // End widget()

	/*----------------------------------------
	  update()
	  ----------------------------------------
	----------------------------------------*/

	function update ( $new_instance, $old_instance ) {

		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['limit'] = esc_attr( $new_instance['limit'] );

		/* The select box is returning a text value, so we escape it. */
		$instance['effect'] = esc_attr( $new_instance['effect'] );

		/* The checkbox is returning a Boolean (true/false), so we check for that. */
		$instance['pagination'] = (bool) esc_attr( $new_instance['pagination'] );
		$instance['display_author'] = (bool) esc_attr( $new_instance['display_author'] );
		$instance['display_url'] = (bool) esc_attr( $new_instance['display_url'] );
		$instance['featured_image'] = esc_attr( $new_instance['featured_image'] );

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['nice_feedback']) )
			delete_option('nice_feedback');

		return $instance;

	} // end update()

	function flush_widget_cache() {
		wp_cache_delete('widget_nice_feedback', 'widget');
	} // end flush_widget_cache

	/*----------------------------------------
	  form()
	  ----------------------------------------
	----------------------------------------*/

   function form( $instance ) {

       /* Set up some default widget settings. */
		$defaults = array(
						'title' => __( 'Feedback', 'nicethemes' ),
						'limit' => 5,
						'effect' => 'fade',
						'pagination' => false,
						'display_author' => false,
						'display_url' => false,
						'featured_image' => 0
					);

		$instance = wp_parse_args( (array) $instance, $defaults );
?>
       <!-- Widget Title: Text Input -->
       <p>
	   	   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title (optional):', 'nicethemes' ); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
       </p>
       <!-- Widget Limit: Text Input -->
       <p>
	   	   <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:', 'nicethemes' ); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name( 'limit' ); ?>"  value="<?php echo $instance['limit']; ?>" class="" size="3" id="<?php echo $this->get_field_id( 'limit' ); ?>" />
       </p>
       <!-- Widget Effect: Select Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'effect' ); ?>"><?php _e( 'Effect:', 'nicethemes' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'effect' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'effect' ); ?>">
				<option value="none"<?php selected( $instance['effect'], 'none' ); ?>><?php _e( 'None', 'nicethemes' ); ?></option>
                <option value="slide"<?php selected( $instance['effect'], 'slide' ); ?>><?php _e( 'Slide', 'nicethemes' ); ?></option>
				<option value="fade"<?php selected( $instance['effect'], 'fade' ); ?>><?php _e( 'Fade', 'nicethemes' ); ?></option>
			</select>
		</p>
		<!-- Widget Pagination: Checkbox Input -->
       	<p>
        	<input id="<?php echo $this->get_field_id( 'pagination' ); ?>" name="<?php echo $this->get_field_name( 'pagination' ); ?>" type="checkbox"<?php checked( $instance['pagination'], 1 ); ?> />
        	<label for="<?php echo $this->get_field_id( 'pagination' ); ?>"><?php _e( 'Enable Pagination', 'nicethemes' ); ?></label>
        	<br /><small>(<?php _e( 'Disabled if the "limit" is 1', 'nicethemes' ); ?>)</small>
	   	</p>

	   	<!-- Widget Display Author: Checkbox Input -->
       	<p>
        	<input id="<?php echo $this->get_field_id( 'display_author' ); ?>" name="<?php echo $this->get_field_name( 'display_author' ); ?>" type="checkbox"<?php checked( $instance['display_author'], 1 ); ?> />
        	<label for="<?php echo $this->get_field_id( 'display_author' ); ?>"><?php _e( 'Display Author', 'nicethemes' ); ?></label>
	   	</p>

	   	<!-- Widget Display URL: Checkbox Input -->
       	<p>
        	<input id="<?php echo $this->get_field_id( 'display_url' ); ?>" name="<?php echo $this->get_field_name( 'display_url' ); ?>" type="checkbox"<?php checked( $instance['display_url'], 1 ); ?> />
        	<label for="<?php echo $this->get_field_id( 'display_url' ); ?>"><?php _e( 'Display URL', 'nicethemes' ); ?></label>
        </p>
        <p>
	       <label for="<?php echo $this->get_field_id( 'featured_image' ); ?>"><?php _e( 'Thumbnail Size, in pixels (0 to disable):', 'nicethemes' ); ?>
	       <input class="widefat" id="<?php echo $this->get_field_id( 'featured_image' ); ?>" name="<?php echo $this->get_field_name( 'featured_image' ); ?>" type="text" value="<?php echo esc_attr( $instance['featured_image'] ); ?>" />
	       </label>
       </p>
<?php
	} // end form()

} // end Nice_Widget_Feedback

/*----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------

  * Registers this widget.
----------------------------------------*/

add_action( 'widgets_init', create_function( '', 'return register_widget("Nice_Feedback");' ), 1 );
?>