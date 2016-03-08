<?php
  /*---------------------------------------------------------------------------------*/
 /* Adspace Widget 																	*/
/*---------------------------------------------------------------------------------*/

class Nice_Ad_Widget extends WP_Widget {

	var $settings = array( 'title', 'code', 'image', 'href', 'alt', 'title_text' );

	function __construct() {

		$this->alt_option_name = 'nice_ad';

		parent::__construct('nice_ad', __('Adspace (NiceThemes)', 'nicethemes'), array('description' => 'With this widget you can add any type of Ad as a widget.' ));

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );

	} // end __construct()

	function widget($args, $instance) {

		$cache = wp_cache_get('widget_nice_ad', 'widget');

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

		if ( $code <> '' ) {
			echo $code;
		} else {
			?><a href="<?php echo esc_url( $href ); ?>" title="<?php echo esc_attr( $title_text ); ?>"><img src="<?php echo esc_attr( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" /></a><?php
		}

		echo $after_widget;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_nice_ad', $cache, 'widget');

	}

	function update( $new_instance, $old_instance ) {

		foreach ( array( 'title', 'image', 'href', 'alt', 'title_text' ) as $setting )
			$new_instance[$setting] = strip_tags( $new_instance[$setting] );

		$this->flush_widget_cache();

		if ( !current_user_can( 'unfiltered_html' ) )
			$new_instance['code'] = $old_instance['code'];

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['nice_ad'] ) )
			delete_option('nice_ad');

		return $new_instance;
	} // end update()

	function flush_widget_cache() {
		wp_cache_delete('widget_nice_ad', 'widget');
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
	<p>
		<label for="<?php echo $this->get_field_id('code'); ?>"><?php _e('Code:','nicethemes'); ?></label>
		<textarea name="<?php echo $this->get_field_name('code'); ?>" class="widefat" id="<?php echo $this->get_field_id('code'); ?>"><?php echo esc_textarea( $code ); ?></textarea>
	</p>
	<p><strong><?php _e('Else, you can use an image','nicethemes'); ?></strong></p>
    <p>
		<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image URL:','nicethemes'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo esc_attr( $image ); ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Image Alt text:','nicethemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo esc_attr( $alt ); ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','nicethemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_attr( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id('title_text'); ?>"><?php _e('Link Title text:','nicethemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title_text'); ?>" value="<?php echo esc_attr( $title_text ); ?>" class="widefat" id="<?php echo $this->get_field_id('title_text'); ?>" />
	</p>
<?php
	}
}

add_action( 'widgets_init', create_function( '', 'return register_widget("Nice_Ad_Widget");' ), 1 );
?>
