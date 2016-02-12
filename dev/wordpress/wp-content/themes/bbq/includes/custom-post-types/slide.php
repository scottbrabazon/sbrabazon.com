<?php
/*
*	SLIDE custom post type.
*/

add_action( 'init', 'add_nice_slides' );

function add_nice_slides()
{
  $labels = array(
    'name' => _x( 'Slides', 'post type general name', 'nicethemes', 'nicethemes' ),
    'singular_name' => _x( 'Slide', 'post type singular name', 'nicethemes' ),
    'add_new' => _x( 'Add New', 'slide', 'nicethemes' ),
    'add_new_item' => __( 'Add New Slide', 'nicethemes' ),
    'edit_item' => __( 'Edit Slide', 'nicethemes' ),
    'new_item' => __( 'New Slide', 'nicethemes' ),
    'view_item' => __( 'View Slide', 'nicethemes' ),
    'search_items' => __( 'Search Slides', 'nicethemes' ),
    'not_found' =>  __( 'No slides found', 'nicethemes' ),
    'not_found_in_trash' => __( 'No slides found in Trash', 'nicethemes' ),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_icon' => get_template_directory_uri() .'/engine/admin/images/btn-slides.png',
    'menu_position' => null,
    'supports' => array( 'title','editor', 'thumbnail', 'page-attributes' )
  );

  register_post_type( 'slide', $args );
}

?>