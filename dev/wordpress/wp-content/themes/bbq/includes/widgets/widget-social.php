<?php

  /*---------------------------------------------------------------------------------*/
 /* Social widget 																	*/
/*---------------------------------------------------------------------------------*/
class Nice_Social extends WP_Widget {

   function __construct() {
	   $widget_ops = array('description' => 'Add your social links with this widget. (Note: To set the social links you have to do it on the theme options panel.)' );
       parent::__construct(false, __('Social Widget (NiceThemes)', 'nicethemes'),$widget_ops);
   }

   function widget( $args, $instance) {
    extract( $args );
   	$title = $instance['title'];
	$unique_id = $args['widget_id'];
	global $nice_options;
	?>
		<?php echo $before_widget; ?>
        <?php if ( $title) echo $before_title . $title . $after_title; ?>
        <?php

        		$social_items = '';

				if ( $nice_options["nice_facebook_url"] <> '' ) $social_items .= '<li id="facebook"><a href="' . $nice_options["nice_facebook_url"] . '"></a></li>';
				if ( $nice_options["nice_twitter_url"] <> '' ) 	$social_items .= '<li id="twitter"><a href="' . $nice_options["nice_twitter_url"] . '"></a></li>';
				if ( $nice_options["nice_google_url"] <> '' ) 	$social_items .= '<li id="google"><a href="' . $nice_options["nice_google_url"] . '"></a></li>';
				if ( $nice_options["nice_dribbble_url"] <> '' ) $social_items .= '<li id="dribbble"><a href="' . $nice_options["nice_dribbble_url"] . '"></a></li>';
				if ( $nice_options["nice_vimeo_url"] <> '' ) 	$social_items .= '<li id="vimeo"><a href="' . $nice_options["nice_vimeo_url"] . '"></a></li>';
				if ( $nice_options["nice_forrst_url"] <> '' ) 	$social_items .= '<li id="forrst"><a href="' . $nice_options["nice_forrst_url"] . '"></a></li>';
				if ( $nice_options["nice_lastfm_url"] <> '' ) 	$social_items .= '<li id="lastfm"><a href="' . $nice_options["nice_lastfm_url"] . '"></a></li>';
				if ( $nice_options["nice_tumblr_url"] <> '' ) 	$social_items .= '<li id="tumblr"><a href="' . $nice_options["nice_tumblr_url"] . '"></a></li>';
				if ( $nice_options["nice_flickr_url"] <> '' ) 	$social_items .= '<li id="flickr"><a href="' . $nice_options["nice_flickr_url"] . '"></a></li>';
				if ( $nice_options["nice_youtube_url"] <> '' ) 	$social_items .= '<li id="youtube"><a href="' . $nice_options["nice_youtube_url"] . '"></a></li>';
				if ( $nice_options["nice_blogger_url"] <> '' ) 	$social_items .= '<li id="blogger"><a href="' . $nice_options["nice_blogger_url"] . '"></a></li>';
				if ( $nice_options["nice_linkedin_url"] <> '' ) $social_items .= '<li id="linkedin"><a href="' . $nice_options["nice_linkedin_url"] . '"></a></li>';

				if ( !empty ( $social_items ) ) :
				?>

	            <div class="social-links clearfix">

	                <ul id="social">
	                    <?php echo $social_items; ?>
	                </ul>

	            </div>
	            <?php endif; ?>
        <?php echo $after_widget; ?>


	<?php
   }

   function update( $new_instance, $old_instance) {
       return $new_instance;
   }

   function form( $instance) {

       $title = esc_attr( $instance['title']);
       $limit = esc_attr( $instance['limit']);
	   $username = esc_attr( $instance['username']);
       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','nicethemes'); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
      <?php
   }

}
register_widget('Nice_Social');
?>