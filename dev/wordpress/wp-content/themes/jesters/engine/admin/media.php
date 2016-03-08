<?php
/**
 * Table of Contents (media.php)
 *
 *	- nice_embed()
 *	- get_nice_image_path()
 *	- nice_image()
 *
 */


/**
 * nice_embed()
 *
 * nicely embed videos
 *
 * @since 1.0.0
 *
 * @param (array) [field, width, height, class, id]
 * @return (str/bool) html/0
 */
if ( !function_exists( 'nice_embed' ) ) :
function nice_embed( $args )
{
	//Defaults
	$field = 'embed';
	$width = null;
	$height = null;
	$class = 'video';
	$id = null;
	$wrap = true;
	$echo = true;
	$embed = '';
	$embed_id = 'nice_embed';

	if ( !is_array( $args ) ) parse_str( $args, $args );

	extract( $args );

    if ( empty( $embed ) ){

    	if( empty( $id ) )
	    {
			global $post;
			$id = $post->ID;
	    }

	    $embed = get_post_meta( $id, $field, true );

    }

    if ( !empty ( $embed ) ) :

		$embed = html_entity_decode( $embed ); // Decode HTML entities.

		$embed = nice_add_html_att ( array('tag'=>'id', 'value'=> $embed_id, 'code'=> $embed ) );

		if ( $width || $height ){

			$embed = nice_set_html_att ( array ( 'tag'=>'width', 'value'=> $width, 'code'=> $embed ) );
			$embed = nice_set_html_att ( array ( 'tag'=>'height', 'value'=> $height, 'code'=> $embed ) );

		}

		if ( $url = nice_get_html_att( array( 'html' => $embed, 'tag' => 'src' ) ) ){

			if ( strpos( $url, 'youtube' ) > 0 ) {

				$url = nice_add_url_param( array ( 'url' => $url, 'tag'=>'enablejsapi', 'value'=> '1' ) );

		    } elseif ( strpos( $url, 'vimeo' ) > 0 ) {

		        $url = nice_add_url_param( array ( 'url' => $url, 'tag'=>'api', 'value'=> '1' ) );
		        $url = nice_add_url_param( array ( 'url' => $url, 'tag'=>'player_id', 'value'=> $embed_id ) );

		    }

		    $embed = nice_set_html_att ( array ( 'tag' => 'src', 'value' => $url, 'code' => $embed ) );

	    }

		if ( nice_bool( $wrap ) )
			$html = '<div class="'. $class .'">' . $embed . '</div>';
		else
			$html =  $embed ;


		if ( nice_bool( $echo ) ) echo $html;
		else return $html;

	else :

		return false;

	endif;


}
endif;


/**
 * get_nice_image_path()
 *
 * Get image path / works with WPMU
 *
 * @since 1.0.0
 *
 * @param int $thumb_id
 * @return string $scr containing the full path
 */
function get_nice_image_path ( $thumb_id = null ) {

	$src = wp_get_attachment_url( $thumb_id );
	global $blog_id;
	if ( isset( $blog_id ) && $blog_id > 0 ) {
		$imageParts = explode( '/files/', $src );
		if ( isset( $imageParts[1] ) ) {
			$src = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $src;
}


/**
 * nice_image()
 *
 * display image. If $scr not defined search for
 * featured image or images associated to the post.
 * it uses timthumb.php for resizing
 *
 * @since 1.0.0
 *
 * @param (array) arguments for the function.
 * @return (str) html
 */
if ( !function_exists('nice_image') ) {
function nice_image ( $args )
{
	global $post;

	$width = null;
	$height = null;
	$class = '';
	$quality = 90;
	$limit = 1;
	$offset = 0;
	$id = null;
	$echo = true;
	$is_auto_image = false;
	$src = '';
	$meta = '';
	$alignment = 'c';
	$size = '';

	$output = '';

	if ( !is_array( $args ) )	parse_str( $args, $args );

	extract( $args );

	// set post ID
	if ( empty( $id ) ) $id = $post->ID;

	$thumb_id = get_post_thumbnail_id( $id );

	// if empty, get standards
	if ( empty( $width ) && empty( $height ) ) {
		$width = get_option( 'thumbnail_size_w', '150' );
		$height = get_option( 'thumbnail_size_h', '150' );
	}

	if ( !$src ):

		/* start searching for the image */
		if ( has_post_thumbnail( $id ) ):

			$src = get_nice_image_path( $thumb_id );

		else:

			// check the first attachment
			$attachments = get_children( array(	'post_parent' => $id,
												'numberposts' => $limit,
												'post_type' => 'attachment',
												'post_mime_type' => 'image',
												'order' => 'DESC',
												'orderby' => 'menu_order date')
										);

			// Search for and get the post attachment
			if ( !empty( $attachments ) ) :

				// get first
				$src = get_nice_image_path( array_shift( array_values( $attachments ) )->ID );

			else :

				$matches = '';
				$post = get_post( $id );

				ob_start();
				ob_end_clean();
				$how_many = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );

				if ( !empty($matches[1][0]) ) $src = $matches[1][0];


			endif;

		endif;
	endif;

	if ( !empty ( $src ) ) $output .= '<img src="'. get_template_directory_uri(). '/engine/timthumb.php?src='. $src .'&amp;w='.$width.'&amp;h='.$height.'&amp;q='.$quality.'&amp;a=' . $alignment . '" class="'.$class.'"  />';

	if ( nice_bool( $echo ) ) echo $output; else return $output;
}
}

?>