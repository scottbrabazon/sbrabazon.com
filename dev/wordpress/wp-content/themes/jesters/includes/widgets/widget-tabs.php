<?php
  /*-----------------------------------------------------------------------------------*/
 /* Tabs Widget 																	  */
/*-----------------------------------------------------------------------------------*/

class Nice_Tabs extends WP_Widget {

	var $settings = array( 'limit', 'thumb_size', 'first', 'popular', 'recent', 'comments', 'tags', 'days' );

	function __construct() {

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'nice_tabs' );

		$this->alt_option_name = 'nice_tabs';

		/* Create the widget. */
		parent::__construct( 'nice_tabs',
							__( 'Tabs (NiceThemes)', 'nicethemes' ),
							array ( 'classname' => 'widget_nice_tabs',
								  	'description' => __( 'Tabs Widget. It contains the Popular posts, Recent Posts, Recent comments and a Tag cloud.', 'nicethemes' )
							),
							$control_ops );

		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );

	} // end __construct()

	function widget( $args, $instance) {

		$cache = wp_cache_get( 'widget_nice_tabs', 'widget' );

		if ( !is_array( $cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		extract( $args, EXTR_SKIP );
		$instance = $this->nice_init_settings( $instance );
		extract( $instance, EXTR_SKIP );
		echo $before_widget;

		?>

<div id="tabs">

    <ul class="niceTabs clearfix">

    <?php if ( $first == "recent" && !$recent == "on") : ?>
    	<li class="recent"><a href="#<?php echo $widget_id; ?>-tab-recent"><?php _e( 'Recent', 'nicethemes' ); ?></a></li>
    <?php elseif ( $first == "comments" && !$comments == "on") : ?>
    	<li class="comments"><a href="#<?php echo $widget_id; ?>-tab-comments"><?php _e( 'Comments', 'nicethemes' ); ?></a></li>
    <?php elseif ( $first == "tags" && !$tags == "on") : ?>
    	<li class="tags"><a href="#<?php echo $widget_id; ?>-tab-tags"><?php _e( 'Tags', 'nicethemes' ); ?></a></li>
    <?php endif; ?>

    <?php if (!$popular == "on") : ?>
    	<li class="popular"><a href="#<?php echo $widget_id; ?>-tab-popular"><?php _e( 'Popular', 'nicethemes' ); ?></a></li>
	<?php endif; ?>

	<?php if ( $first != "recent" && !$recent == "on") : ?>
    	<li class="recent"><a href="#<?php echo $widget_id; ?>-tab-recent"><?php _e( 'Recent', 'nicethemes' ); ?></a></li>
	<?php endif; ?>

    <?php if ( $first != "comments" && !$comments == "on") : ?>
    	<li class="comments"><a href="#<?php echo $widget_id; ?>-tab-comments"><?php _e( 'Comments', 'nicethemes' ); ?></a></li>
	<?php endif; ?>

	<?php if ( $first != "tags" && !$tags == "on") : ?>
    	<li class="tags"><a href="#<?php echo $widget_id; ?>-tab-tags"><?php _e( 'Tags', 'nicethemes' ); ?></a></li>
    <?php endif; ?>

    </ul>

    <div class="boxes box inside">

        <?php if ( $first == "recent" && !$recent == "on") { ?>
        <ul id="<?php echo $widget_id; ?>-tab-recent" class="list">
            <?php if ( function_exists( 'nice_tabs_recent' ) ) nice_tabs_recent( $limit, $thumb_size ); ?>
        </ul>
        <?php } elseif ( $first == "comments" && !$comments == "on") { ?>
		<ul id="<?php echo $widget_id; ?>-tab-comments" class="list">
            <?php if ( function_exists( 'nice_tabs_comments' ) ) nice_tabs_comments( $limit, $thumb_size ); ?>
        </ul>
        <?php } elseif ( $first == "tags" && !$tags == "on") { ?>
        <div id="<?php echo $widget_id; ?>-tab-tags" class="list">
            <?php wp_tag_cloud( array( 'smallest' => 12 ,'largest' => 20 ) ); ?>
        </div>
        <?php } ?>

        <?php if (!$popular == "on") { ?>
        <ul id="<?php echo $widget_id; ?>-tab-popular" class="list">
            <?php if ( function_exists( 'nice_tabs_popular' ) ) nice_tabs_popular( $limit, $thumb_size, $days); ?>
        </ul>
        <?php } ?>
        <?php if ( $first != "recent" && !$recent == "on") { ?>
        <ul id="<?php echo $widget_id; ?>-tab-recent" class="list">
            <?php if ( function_exists( 'nice_tabs_recent' ) ) nice_tabs_recent( $limit, $thumb_size ); ?>
        </ul>
        <?php } ?>
        <?php if ( $first != "comments" && !$comments == "on") { ?>
		<ul id="<?php echo $widget_id; ?>-tab-comments" class="list">
            <?php if ( function_exists( 'nice_tabs_comments' ) ) nice_tabs_comments( $limit, $thumb_size ); ?>
        </ul>
        <?php } ?>
        <?php if ( $first != "tags" && !$tags == "on") { ?>
        <div id="<?php echo $widget_id; ?>-tab-tags" class="list tags">
            <?php wp_tag_cloud( 'smallest=12&largest=20' ); ?>
        </div>
        <?php } ?>

    <!-- END .boxes -->
    </div>

<!-- END niceTabs -->
</div>

         <?php
         echo $after_widget;

		 $cache[$args['widget_id']] = ob_get_flush();
		 wp_cache_set( 'widget_nice_tabs', $cache, 'widget' );

   	} // end widget()

	function update ( $new_instance, $old_instance ) {

		$new_instance = $this->nice_init_settings( $new_instance );

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['nice_tabs']) )
			delete_option( 'nice_tabs' );

		return $new_instance;

	} // end update()

	function flush_widget_cache() {
		wp_cache_delete( 'widget_nice_tabs', 'widget' );
	}

	function nice_init_settings( $instance ) {

		$defaults = $this->nice_set_defaults();
		$instance = wp_parse_args( (array) $instance, $defaults );

		$instance['limit'] = intval( $instance['limit'] );
		if ( empty( $instance['limit']) || ( $instance['limit'] < 1) )	$instance['limit'] = $defaults['limit'];
		$instance['thumb_size'] = abs( intval( $instance['thumb_size'] ) );
		if ( empty( $instance['first'] ) ) $instance['first'] = $defaults['first'];

		return $instance;

	} // end nice_init_defaults()

	function nice_set_defaults() {
		// Set the default to a blank string
		$settings = array_fill_keys( $this->settings, '' );

		// Now set the more specific defaults
		$settings['limit'] = 5;
		$settings['thumb_size'] = 45;
		$settings['first'] = 'popular';

		return $settings;
	} // end nice_set_defaults

   function form( $instance ) {
		$instance = $this->nice_init_settings( $instance );
		extract( $instance, EXTR_SKIP );
?>
       <p>
	       <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Number of items to list:', 'nicethemes' ); ?>
	       <input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>" />
	       </label>
       </p>
       <p>
	       <label for="<?php echo $this->get_field_id( 'thumb_size' ); ?>"><?php _e( 'Thumbnail Size, in pixels (0 to disable):', 'nicethemes' ); ?>
	       <input class="widefat" id="<?php echo $this->get_field_id( 'thumb_size' ); ?>" name="<?php echo $this->get_field_name( 'thumb_size' ); ?>" type="text" value="<?php echo esc_attr( $instance['thumb_size'] ); ?>" />
	       </label>
       </p>
       <p>
            <label for="<?php echo $this->get_field_id( 'first' ); ?>"><?php _e( 'First Visible Tab:', 'nicethemes' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'first' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'first' ); ?>">
                <option value="popular" <?php selected( $instance['first'], 'popular' ); ?>><?php _e( 'Popular', 'nicethemes' ); ?></option>
                <option value="comments" <?php selected( $instance['first'], 'comments' ); ?>><?php _e( 'Comments', 'nicethemes' ); ?></option>
                <option value="recent" <?php selected( $instance['first'], 'recent' ); ?>><?php _e( 'Recent', 'nicethemes' ); ?></option>
                <option value="tags" <?php selected( $instance['first'], 'tags' ); ?>><?php _e( 'Tags', 'nicethemes' ); ?></option>
            </select>
       </p>
       <p><strong><?php _e( 'Hide Tabs:', 'nicethemes' ); ?></strong></p>

       <div style="width:50%; float:left;">
       <p>
       <input id="<?php echo $this->get_field_id( 'popular' ); ?>" name="<?php echo $this->get_field_name( 'popular' ); ?>" type="checkbox" <?php checked( $instance['popular'], 'on' ); ?>><?php _e( 'Popular', 'nicethemes' ); ?></input>
	   </p>
	   <p>
	   <input id="<?php echo $this->get_field_id( 'recent' ); ?>" name="<?php echo $this->get_field_name( 'recent' ); ?>" type="checkbox" <?php checked( $instance['recent'], 'on' ); ?>><?php _e( 'Recent', 'nicethemes' ); ?></input>
	   </p>
       </div>
       <div style="width:50%; float:left;">
	   <p>
	       <input id="<?php echo $this->get_field_id( 'comments' ); ?>" name="<?php echo $this->get_field_name( 'comments' ); ?>" type="checkbox" <?php checked( $instance['comments'], 'on' ); ?>><?php _e( 'Comments', 'nicethemes' ); ?></input>
	   </p>
	   <p>
	       <input id="<?php echo $this->get_field_id( 'tags' ); ?>" name="<?php echo $this->get_field_name( 'tags' ); ?>" type="checkbox" <?php checked( $instance['tags'], 'on' ); ?>><?php _e( 'Tags', 'nicethemes' ); ?></input>
       </p>
       </div>
       <p>
	       <label for="<?php echo $this->get_field_id( 'days' ); ?>"><?php _e( 'Popular limit (days):', 'nicethemes' ); ?>
	       <input class="widefat" id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>" type="text" value="<?php echo esc_attr( $instance['days'] ); ?>" />
	       </label>
       </p>


	<?php
	} // end form()

} // end Nice_Tabs

/*----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------

  * Registers this widget.
----------------------------------------*/

add_action( 'widgets_init', create_function( '', 'return register_widget("Nice_Tabs");' ), 1 );
?>
<?php
// Tabs Javascript
if(is_active_widget( null,null,'nice_tabs' ) == true) {
	add_action( 'wp_footer','nice_tabs_js' );
}

function nice_tabs_js(){
?>
<!-- Nice Tabs Widget -->
<script type="text/javascript">

jQuery(document).ready(function(){

	jQuery( 'ul.niceTabs' ).each(function(){
		jQuery(this).children( 'li' ).children( 'a:first' ).addClass( 'active' );
	});

	jQuery( '.inside > *' ).hide();
	jQuery( '.inside > *:first-child' ).show();

	jQuery( 'ul.niceTabs li a' ).click(function(event){

		event.preventDefault();
		jQuery(this).parent().parent().children( 'li' ).children( 'a' ).removeClass( 'active' );
		jQuery(this).addClass( 'active' );
		jQuery(this).parent().parent().parent().children( '.inside' ).children( '*' ).hide();

		jQuery( '.inside ' + jQuery(this).attr( 'href' ) ).fadeIn(800);

	});
});

</script>
<?php
}

/*-----------------------------------------------------------------------------------*/
/* Tabs - Popular Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists( 'nice_tabs_popular' )) {
	function nice_tabs_popular( $posts = 5, $size = 45, $days = null ) {
		global $post;

		if ( $days ) {
			global $popular_days;
			$popular_days = $days;

			// Register the filtering function
			add_filter( 'posts_where', 'nice_filter' );
		}

		$p = get_posts( array( 'post_type' => 'post', 'post_status' => 'publish', 'no_found_rows' => true, 'suppress_filters' => false, 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count', 'numberposts' => $posts) );
		foreach( $p as $post) :
			setup_postdata( $post);
	?>
	<li class="clearfix">
		<?php if ( $size != 0) nice_image( 'height='.$size.'&width='.$size.'&class=thumbnail&single=true' ); ?>
		<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
	</li>
	<?php endforeach;
		wp_reset_postdata();

		if (has_filter( 'posts_where', 'nice_filter' )) remove_filter( 'posts_where', 'nice_filter' );
	}
}

//Create a new filtering function that will add our where clause to the query
function nice_filter( $where = '' ) {
  global $popular_days;

  	$filter .= " AND post_type = 'post' AND post_status = 'publish' AND post_date >= '" . date( 'Y-m-d', strtotime( '-'.$popular_days.' days' )) . "'";
  	return $filter;
}

/*-----------------------------------------------------------------------------------*/
/* Tabs - Recent Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists( 'nice_tabs_recent' )) {
	function nice_tabs_recent( $posts = 5, $size = 45 ) {
		global $post;
		$args = array( 'no_found_rows' => true, 'ignore_sticky_posts' => 1, 'posts_per_page' => $posts, 'orderby' => 'post_date', 'order' => 'desc' );
		$r = get_posts( $args );
		foreach( $r as $post ) :
			setup_postdata( $post );
	?>
	<li class="clearfix">
		<?php if ( $size != 0) nice_image( 'height='.$size.'&width='.$size.'&class=thumbnail&single=true' ); ?>
		<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
	</li>
	<?php endforeach;
		wp_reset_postdata();

	}
}



/*-----------------------------------------------------------------------------------*/
/* Tabs - Recent Comments */
/*-----------------------------------------------------------------------------------*/
if (!function_exists( 'nice_tabs_comments' )) {
	function nice_tabs_comments( $posts = 5, $size = 45 ) {
		global $wpdb;

		$comments = get_comments( array( 'status' => 'approve', 'number' => $posts ) );
		if ( !empty( $comments ) ) :
			foreach ( $comments as $comment) :
				$post = get_post( $comment->comment_post_ID );
			?>
				<li class="recentcomments clearfix">
					<?php if ( $size > 0 ) echo get_avatar( $comment, $size ); ?>
					<a href="<?php echo get_comment_link( $comment->comment_ID); ?>" title="<?php echo wp_filter_nohtml_kses( $comment->comment_author); ?> <?php _e( 'on', 'nicethemes' ); ?> <?php echo $post->post_title; ?>"><?php echo wp_filter_nohtml_kses( $comment->comment_author); ?></a>: <?php echo stripslashes( substr( wp_filter_nohtml_kses( $comment->comment_content ), 0, 50 ) ); ?>&hellip;
				</li>
			<?php
			endforeach;
 		endif;
	}
}

?>