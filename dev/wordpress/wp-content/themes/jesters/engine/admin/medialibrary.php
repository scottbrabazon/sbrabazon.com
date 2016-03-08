<?php
/**
 * 	Table of Contents (medialibrary.php)
 *
 *	- nice_admin_scripts()
 *	- nice_admin_styles()
 *	- houdini_finger_snap()
 *	- houdini_get_post()
 *	- houdini_make_title()
 *
 */

if ( is_admin() ) :

	add_action( 'init', 'houdini_finger_snap' );
 
	if ( is_admin_niceframework() ) /*  || is_admin_post()also include for post is_admin_post()*/ 
	{
		
		add_action( 'admin_print_scripts', 'nice_admin_scripts' );
		add_action( 'admin_print_styles', 'nice_admin_styles' );
	}
 
endif;


/**
 * nice_admin_scripts() 
 *
 * enqueue scripts for admin section.
 *
 * @since 1.0.0
 *
 */

function nice_admin_scripts() 
{
	wp_enqueue_script ( 'media-upload' );
	wp_enqueue_script ( 'thickbox' );
	wp_register_script( 'nice-upload', NICE_TPL_DIR.'/engine/admin/js/medialibrary.js', array('jquery','media-upload','thickbox' ) );
	wp_enqueue_script ( 'nice-upload' );
}


/**
 * nice_admin_styles() 
 *
 * enqueue styles for admin section.
 *
 * @since 1.0.0
 *
 */
function nice_admin_styles() 
{
	wp_enqueue_style( 'thickbox' );
}


/**
 * houdini_finger_snap()
 *
 * register houdini post type. Houdini posts are created
 * in order to have something to associate the images with.
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'houdini_finger_snap' ) ) {

	function houdini_finger_snap () 
	{
		
		register_post_type( 'houdini', array(
			'labels' => array('name' => __( 'Houdini Post Type', 'nicethemes' ) ),
			'supports' => array( 'title', 'editor' ),
			'public' => true,
			'show_ui' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => false,
			'can_export' => true,
			'show_in_nav_menus' => false
			) 
		);
		
	} 

}


/**
 * houdini_get_post()
 *
 * get houdini post by slug.
 *
 * @since 1.0.0
 *
 * @param (str) post $slug
 * @return (int) post $id
 */
if ( ! function_exists( 'houdini_get_post' ) ) {

	function houdini_get_post ( $slug ) 
	{
		global $wpdb;
		
		$slug = strtolower( str_replace( ' ', '_', $slug ) ); // check sanitize
		
		$houdini = get_page_by_path( 'wpnt-'.$slug , OBJECT , 'houdini' );
		
		if ($houdini != NULL) 
		{	
			$id = $houdini->ID;
		}
		else
		{ 
				
			$args = array( 	'post_type' => 'houdini', 
						  	'post_name' => 'wpnt-' . $slug, 
							'post_title' => houdini_make_title( $slug ),  
							'post_status' => 'draft', 
							'comment_status' => 'closed', 
							'ping_status' => 'closed' );
			
			$id = wp_insert_post( $args );
			
		}
		
		return $id;
		
	} 

}

/**
 * houdini_make_title()
 *
 * create a title.
 *
 * @since 1.0.0
 *
 * @param (str) $s title
 * @return (str) string iwth the title
 */
if ( ! function_exists( 'houdini_make_title' ) ) {

	function houdini_make_title ( $s ) 
	{
		return ucwords( str_replace( '_', ' ', $s ) );
		
	}
}

?>