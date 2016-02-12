<?php
/**
 * 	Table of Contents
 *
 *	- nice_pagenavi()
 *	- nice_post_meta()
 *	- nice_post_author()
 *	- nice_display_feedback_items()
 *
 */

/**
 * nice_pagenavi()
 *
 * If wp_pagenavi exists, it shows it.
 * else, it shows the < previous | next > links.
 *
 * @since 1.0.0
 *
 */

if ( !function_exists( 'nice_pagenavi' ) ) {

	function nice_pagenavi()
	{

		if (function_exists( 'wp_pagenavi' ) ) {

			wp_pagenavi();

		} else { ?>

			<?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>

	            <nav class="nav-entries">
	                <?php next_posts_link( '<div class="nav-prev fl">'. __( 'Older posts', 'nicethemes' ) . '</div>' ); ?>
	                <?php previous_posts_link( '<div class="nav-next fr">'. __( 'Newer posts', 'nicethemes' ) . '</div>' ); ?>
	                <div class="fix"></div>
	            </nav>

			<?php } ?>

		<?php }
	}
}


/**
 * nice_post_meta()
 *
 * Post metadata, nicely displayed.
 *
 * @since 1.0.0
 *
 */

if ( !function_exists( 'nice_post_meta' ) ) {

	function nice_post_meta()
	{
?>
		<p class="post-meta">
      	        <span class="post-author"><span class="small"><?php _e( 'By', 'nicethemes' ) ?></span> <?php the_author_posts_link(); ?></span> |
                <span class="post-date"><span class="small"><?php _e( 'On', 'nicethemes' ) ?></span> <?php the_time( get_option( 'date_format' ) ); ?></span> |
                <span class="post-category"><span class="small"><?php _e( 'in', 'nicethemes' ) ?></span> <?php the_category( ', ' ) ?></span>
                <span class="post-comments"><span class="small"><?php _e( 'with', 'nicethemes' ) ?></span> <?php comments_popup_link(__( 'No Comments', 'nicethemes' ), __( '1 Comment', 'nicethemes' ), __( '% Comments', 'nicethemes' ) ); ?></span>
                <?php edit_post_link( __( '{ Edit }', 'nicethemes' ), '<span class="small">', '</span>' ); ?>
        </p>
<?php
	}
}

/**
 * nice_post_author()
 *
 * Post author info, nicely displayed.
 *
 * @since 1.0.0
 *
 */

if ( !function_exists( 'nice_post_author' ) ) {

	function nice_post_author()
	{
		global $post, $nice_options;

		if ( $nice_options["nice_post_author"] == "true" )
		{
?>

			<div id="post-author">
				<div class="profile-image thumb"><?php echo get_avatar( get_the_author_meta( 'ID' ), '70' ); ?></div>
					<div class="profile-content">
						<h4 class="title"><?php printf( esc_attr__( 'About %s', 'nicethemes' ), get_the_author() ); ?></h4>
						<?php the_author_meta( 'description' ); ?>
						<div class="profile-link">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'nicethemes' ), get_the_author() ); ?>
							</a>
						</div><!-- #profile-link	-->
				</div><!-- .post-entries -->
				<div class="fix"></div>
			</div><!-- #post-author -->
<?php
		}
	}
}

/**
 * nice_display_feedback_items()
 *
 * Retrieve feedback items, display them according to settings
 * in @param $args.
 *
 * @since 1.0.0
 *
 *
 * @param array $args Optional. Display info
 * @return string, if $args['echo'] is false.
 */

 if ( ! function_exists( 'nice_display_feedback_items' ) ) {

	function nice_display_feedback_items ( $args = '' )
	{
		$defaults = array(
			'post_type' => 'feedback',
			'no_found_rows' => true,
			'numberposts' => 5,
			'orderby' => 'rand',
			'order' => 'DESC',
			'id' => 0,
			'display_author' => true,
			'display_url' => true,
			'effect' => 'fade', // Options: 'fade', 'none', 'slide'
			'pagination' => false,
			'echo' => true
		);

		$args = wp_parse_args( $args, $defaults );

		$output = '';

		$items = get_posts( $args );

		// display items
		if ( ! is_wp_error( $items ) && is_array( $items ) && count( $items ) > 0 )  {

			$effect = '';

			if ( $args['effect'] != 'none' ) $effect = ' ' . $args['effect'];

			$output .= '<div class="feedback' . $effect . '">' . "\n";
			$output .= '<div class="feedback-list">' . "\n";

			foreach ( $items as $post ) {

				setup_postdata( $post );

				$feedback_author = '';

				// If we need to display either the author, URL or both, get the data.
				if ( $args['display_author'] == true || $args['display_url'] == true ) {
					$meta = get_post_custom( $post->ID );

					if ( isset( $meta['feedback_author'] ) && ( $meta['feedback_author'][0] != '' ) && $args['display_author'] == true ) {
						$feedback_author .= '<cite class="feedback-author">' . $meta['feedback_author'][0] . '</cite>' . "\n";
					}

					if ( isset( $meta['feedback_url'] ) && ( $meta['feedback_url'][0] != '' ) && $args['display_url'] == true ) {
						$feedback_author .= ' &mdash; <a href="' . $meta['feedback_url'][0] . '" title="' . esc_attr( $meta['feedback_author'][0] ) . '" class="feedback-url">' . $meta['feedback_url'][0] . '</a>';
					}
				}

				$img_class = '';

				$output .= '<div id="quote-' . $post->ID . '" class="quote">' . "\n";

				if ($args['featured_image'] > 0 ){

					$img = nice_image( 'echo=0&height='.$args['featured_image'].'&width='.$args['featured_image'].'&class=thumbnail&single=true&id='.$post->ID );
					if ($img) $output .= '<div class="thumb alignleft">'. $img . '</div>';
					else $img_class = ' no-img';

				}else{
					$img_class = ' no-img';
				}
					$output .= '<blockquote class="feedback-text' . $img_class . '">' . get_the_content() . '</blockquote>' . "\n";
					$output .= $feedback_author;
				$output .= '</div>' . "\n";

				wp_reset_postdata();
			}

			$output .= '</div>' . "\n";

			if ( $args['pagination'] == true && count( $items ) > 1 && $args['effect'] != 'none' ) {

				$output .= '<div class="pagination">' . "\n";
				$output .= '<a href="#" class="btn-prev">&larr; ' . __( 'Previous', 'nicethemes' ) . '</a>' . "\n";
		        $output .= '<a href="#" class="btn-next">' .  __( 'Next', 'nicethemes' ) . ' &rarr;</a>' . "\n";
		        $output .= '</div>' . "\n";

			}

			$output .= '</div>' . "\n";
		}


		if ( $args['echo'] != true ) { return $output; }

		// Should only run is "echo" is set to true.
		echo $output;


		wp_reset_query();

	} // end nice_display_feedback_items()
}

function nice_contact_ajax() {

	global $nice_options;

	check_ajax_referer( 'play-nice', 'nonce' );

    if( !empty( $_POST ) ) {

    	$admin_email = get_option( 'nice_email' );

		if ( trim( $admin_email ) == '' )
			$admin_email = get_bloginfo( 'admin_email' );

		$name = 	$_POST['name'];
		$subject = 	$_POST['subject'];
		$mail = 	$_POST['mail'];
		$msg = 		$_POST['message'];

		$error = "";

		if( !$name ) {
			$error .= __( 'Please tell us your name','nicethemes' ) . "<br />";
		}
		if( !$mail ) {
			$error .= __( 'Please tell us your E-Mail address','nicethemes' ) . "<br />";
		}
		if( !$msg ) {
			$error .= __( 'Please add a message','nicethemes' );
		}

		if( empty( $error ) ) {

			$mail_subject = '[' . get_bloginfo( 'name' ) . '] ' . __( 'New contact form received','nicethemes' );

			$body = __( 'Name: ', 'nicethemes' ) . "$name \n\n";
			if( !empty( $subject ) )
				$body .= __( 'Subject: ', 'nicethemes' ) ."$subject\n\n";

			$body .= __( 'Email: ', 'nicethemes') ."$mail \n\n" . __( 'Comments: ', 'nicethemes' )  ."$msg";

			$headers[] = __( 'From: ', 'nicethemes' ) . $name . ' <' . $mail . '>';
			$headers[] = __( 'Reply-To: ', 'nicethemes' ) . $mail ;
			$headers[] = "X-Mailer: PHP/" . phpversion();

			if( $sent = wp_mail( $admin_email, $mail_subject, $body, $headers ) ) {
				_e( 'Thank you for leaving a message.', 'nicethemes' );
			}else {
				_e( 'There has been an error, please try again.', 'nicethemes' );
			}

		} else {
			echo $error;
		}
    }
	die();
}

	add_action('wp_ajax_nopriv_nice_contact_form', 'nice_contact_ajax');
	add_action('wp_ajax_nice_contact_form', 'nice_contact_ajax');

function nice_open_hours_is_next( $previous, $current ){

	$prev_h = intval ( substr( $previous, 0, 2 ) );
	$prev_m = intval ( substr( $previous, -2 ) );
	$curr_h = intval ( substr( $current, 0, 2) );
	$curr_m = intval ( substr( $current, -2 ) );

	//if ( $prev_h == 24)
	if ( ( $prev_h + 1 ) == $curr_h ){

		if ( $prev_m == '30' ) return true;
		else return false;

	}else{

		if ( $curr_m == '30' && ( $curr_h == $prev_h) ) return true;
		else return false;

	}

}

function nice_open_hours_day( $open_hours ){

	if ( !$open_hours ) return false;

	$hours = array();
	$start = $prev = '';

	foreach ( $open_hours as $h ){

		if ( !$h ) return false;

		if ( !$start ) $start = $h;

		if ( $prev ){

			if ( !nice_open_hours_is_next( $prev, $h ) ){

				$hours[ $start ] = $prev;
				$start = $h;
				$prev = '';

			}else{
				$prev = $h;
			}

		}else{
			$prev = $h;
		}
	}

	$hours[ $start ] =  $prev;

	// cinderella fix! check if place is open after midnight.
	if( ( 0 < ( $key = array_search( '24:30', $hours ) ) ) && ( array_key_exists( '01:00', $hours ) ) ){
		$hours[ $key ] = $hours[ '01:00' ];
		unset( $hours[ '01:00' ] );
	}

	return $hours;
}

function nice_opening_hours(){

	$days = array ( __( 'Monday', 'nicethemes' ) => 'nice_monday_hours',
					__( 'Tuesday', 'nicethemes' ) => 'nice_tuesday_hours',
					__( 'Wednesday', 'nicethemes' ) => 'nice_wednesday_hours',
					__( 'Thursday', 'nicethemes' ) => 'nice_thursday_hours',
					__( 'Friday', 'nicethemes' ) => 'nice_friday_hours',
					__( 'Saturday', 'nicethemes' ) => 'nice_saturday_hours',
					__( 'Sunday', 'nicethemes' ) => 'nice_sunday_hours' );

	$html = '';

	$hours_format = get_option( 'nice_hours_format' );
	if ( empty( $hours_format ) ) $hours_format = 'h:i A';

	foreach ( $days as $day => $h ){

		$html .= '<div class="day clearfix">';
		$hours = nice_open_hours_day( get_option( $h ) );
		$html .= '<span class="name">' . $day . '</span>';
		$html .= '<span class="hours">';
		if ( empty($hours) ) { $html .= __( 'Closed', 'nicethemes' ); }
		else{

			foreach ( $hours as $from => $to ) $html .= date( $hours_format, strtotime( $from ) ) . ' &mdash; ' . date( $hours_format, strtotime( $to ) ) . '<br />';

		}
		$html .= '</span>';

		$html .= '</div>';
	}

	return $html;

}

function nice_opengraph_for_posts() {

    if ( is_singular() ) {
        global $post;
        setup_postdata( $post );
        $output  = '<meta property="og:type" content="article" />' . "\n";
        $output .= '<meta property="og:title" content="' . esc_attr( get_the_title() ) . '" />' . "\n";
        $output .= '<meta property="og:url" content="' . get_permalink() . '" />' . "\n";
        $output .= '<meta property="og:description" content="' . esc_attr( get_the_excerpt() ) . '" />' . "\n";
        if ( has_post_thumbnail() ) {
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $output .= '<meta property="og:image" content="' . $imgsrc[0] . '" />' . "\n";
        }
        echo $output;
    }

}

add_action( 'wp_head', 'nice_opengraph_for_posts' );

?>