<?php
/**
 * Table of Contents (functions.php)
 *
 *	- is_admin_niceframework()
 *	- is_admin_post()
 *	- nice_set_html_att()
 *	- nice_admin_notice()
 *	- nice_bool()
 *	- nicethemes_more_themes_rss()
 *	- nicethemes_theme_url()
 *
 */

/**
 * is_admin_niceframework()
 *
 * check if current page is part of niceframework
 * @since 1.0.0
 *
 * @return (bool)
 */
function is_admin_niceframework()
{
	if ( isset ( $_REQUEST['page'] ) ){

		$page = $_REQUEST['page'];// sanitize

		if ( substr( $page, 0, 4 ) == 'nice' ) return true;

	}

	return false;

}

/**
 * is_admin_post()
 *
 * check if current page is a post page
 *
 * @since 1.0.0
 *
 * @return (bool)
 */
function is_admin_post()
{

	if ( is_admin_niceframework() ) return true;
	//$_current_url =  strtolower( strip_tags( trim( $_SERVER['REQUEST_URI'] ) ) ); if ( ( substr( basename( $_current_url ), 0, 8 ) == 'post.php' ) || substr( basename( $_current_url ), 0, 12 ) == 'post-new.php' )

	return false;

}

/**
 * nice_set_html_att()
 *
 * set attributes to an html element
 *
 * @since 1.0.0
 *
 * @return (bool)
 */
function nice_set_html_att( $args)
{

	// defaults
	$separator = '=';

	if ( !is_array( $args ) ) parse_str( $args, $args );

	extract( $args );

	if ( $tag && $value ) :

		$regex = '/' . $tag . $separator . '"(.*?)"/';

		$new_value = $tag . $separator . '"'.$value.'"';

		$code = preg_replace( $regex , $new_value , stripslashes( $code ) );

	endif;

	return $code;

}

/**
 * nice_add_html_att()
 *
 * add attributes to an html element
 *
 * @since 1.0.1
 *
 * @return (bool)
 */
function nice_add_html_att($args)
{

	// defaults
	$separator = '=';

	if ( !is_array( $args ) ) parse_str( $args, $args );

	extract( $args );

	if ( $tag && $value ) :

		$code = preg_replace("/(<\b[^><]*)>/i", "$1 $tag$separator\"$value\">", $code);

	endif;

	return $code;

}

/**
 * nice_get_html_att()
 *
 * get attribute from an html element
 *
 * @since 1.0.1
 *
 * @return (value) or (bool)
 */
function nice_get_html_att( $args )
{

	// defaults
	$separator = '=';

	if ( !is_array( $args ) ) parse_str( $args, $args );

	extract( $args );

	if ( $html && $tag ) :

		$r = '/' . preg_quote( $tag ) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is' ;

		if ( preg_match ( $r, $html, $match ) ) {
			return urldecode( $match[2] );
		}

	endif;

	return false;

}

function nice_add_url_param ( $args )
{
	if ( !is_array( $args ) ) parse_str( $args, $args );

	extract( $args );

    if ( $url ){

    	$url_data = parse_url ( $url );

    	if( ! isset ( $url_data["query"] ) )
	    	$url_data["query"]="";

	    $params = array();

	    parse_str( $url_data['query'], $params );

	    $params[$tag] = $value;

	    $url_data['query'] = http_build_query( $params );

	    return nice_build_url( $url_data );
    }

    return false;
}


function nice_build_url( $url_data )
{
	$url = '';

	if( isset( $url_data['host'] ) )
	{
		$url .= $url_data['scheme'] . '://';

		if ( isset( $url_data['user'] ) ) {

			$url .= $url_data['user'];

			if ( isset ( $url_data['pass'] ) ) {
				$url .= ':' . $url_data['pass'];
			}

			$url .= '@';
		}

		$url .= $url_data['host'];

		if ( isset ( $url_data['port']) ) {
			$url .= ':' . $url_data['port'];
		}
	}

	$url .= $url_data['path'];

	if ( isset ( $url_data['query'] ) ) {
		$url .= '?' . $url_data['query'];
	}

	if ( isset ( $url_data['fragment'] ) ) {
		$url .= '#' . $url_data['fragment'];
	}

	return $url;
}

/**
 * nice_admin_notice()
 *
 * set attributes to an html element
 *
 * @since 1.0.0
 *
 * @return (bool)
 */
function nice_admin_notice()
{
    /*echo '<div class="updated">
       <p>Aenean eros ante, porta commodo lacinia.</p>
    </div>';

	echo '<div class="error">
       <p>Aenean eros ante, porta commodo lacinia.</p>
    </div>';*/
}

add_action( 'admin_notices', 'nice_admin_notice' );

/**
 * nice_bool()
 *
 * solve the bool php problem for strings
 *
 * @since 1.0.1
 *
 * @return (bool)
 */
function nice_bool( $value = false )
{

	if ( is_string ( $value ) ){

		if ( $value && strtolower( $value ) !== 'false' )
	    	return true;
	    else
	      	return false;

	}else{

	  	return ( $value ? true : false );
  	}

}

/**
 * nicethemes_more_themes_rss()
 *
 * fetch the rss feed for themes.
 *
 * @since 1.0.2
 *
 * @return (obj)
 */
function nicethemes_more_themes_rss(){

	include_once( ABSPATH . WPINC . '/feed.php' );

	$rss = fetch_feed( 'http://demo.nicethemes.com/feed/?post_type=theme' );
	if ( !is_wp_error( $rss ) ){
	    return $rss->get_items();
	}

	return false;

}

/**
 * nicethemes_theme_url()
 *
 * build the nicetheme.com theme url.
 *
 * @since 1.0.2
 *
 * @return (string)
 */
function nicethemes_theme_url( $name = '' ){

	return 'http://nicethemes.com/theme/' . trim( sanitize_title( $name ) ) . '/';

}

?>