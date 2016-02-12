<?php
  /*---------------------------------------------------------------------------------*/
 /* Twitter widget 																	*/
/*---------------------------------------------------------------------------------*/
class Nice_Twitter extends WP_Widget {

   function __construct() {

	   parent::__construct( false, __('Twitter (NiceThemes)', 'nicethemes'), array( 'description' => __('Add your Twitter feed with this widget.', 'nicethemes') ));
   } // end __construct

   function widget( $args, $instance ) {
    	extract( $args );
   		$title = $instance['title'];
    	$limit = $instance['limit']; if (!$limit) $limit = 1;
		if ( $limit > 1 ) $twclass = 'tweet-list'; else $twclass = 'one-tweet';
		$username = $instance['username'];
		$unique_id = $args['widget_id'];
		?>
			<?php if ( $username ) : ?>
                <?php echo $before_widget; ?>
                <?php if ( $title) echo $before_title . $title . $after_title; ?>
                <div class="back clearfix">
                	<ul id="twitter_update_list_<?php echo $unique_id; ?>" class="<?php echo $twclass; ?>">
                    	<li></li>
                    </ul>
                	<p class="tw-follow"><?php _e( 'Follow','nicethemes' ); ?> <a href="http://twitter.com/<?php echo $username; ?>" target="_blank">@<?php echo $username; ?></a> <?php _e('on Twitter','nicethemes'); ?></p>
                </div>
                <?php echo nice_twitter_script( $unique_id, $username, $limit ); ?>
                <?php echo $after_widget; ?>
            <?php endif; ?>

		<?php
   }

   function update( $new_instance, $old_instance ) {
       return $new_instance;
   }

   function form( $instance) {

       $title = esc_attr( $instance['title'] );
       $limit = esc_attr( $instance['limit'] );
	   $username = esc_attr( $instance['username'] );
       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','nicethemes'); ?>&nbsp;<small>(<?php _e('optional', 'nicethemes');?>)</small></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username','nicethemes'); ?>&nbsp;<small>(<?php _e('without @', 'nicethemes');?>)</small></label>
	       <input type="text" name="<?php echo $this->get_field_name('username'); ?>"  value="<?php echo $username; ?>" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" />
       </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of tweets to show:','nicethemes'); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('limit'); ?>"  value="<?php echo $limit; ?>" class="" size="3" id="<?php echo $this->get_field_id('limit'); ?>" /><br />
<small>(<?php _e('by default, 1', 'nicethemes');?>)</small>

       </p>
      <?php
   }
}

register_widget('Nice_Twitter');
?>