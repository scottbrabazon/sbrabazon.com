<?php
/*
*	Feedback!
*/

add_action( 'init', 'add_nice_feedback' );
function add_nice_feedback()
{
  $labels = array(
    'name' => _x( 'Feedback', 'post type general name', 'nicethemes', 'nicethemes' ),
    'singular_name' => _x( 'Feedback Item', 'post type singular name', 'nicethemes' ),
    'add_new' => _x( 'Add New ', 'slide', 'nicethemes' ),
    'add_new_item' => __( 'Add New Feedback Item', 'nicethemes' ),
    'edit_item' => __( 'Edit Feedback Item', 'nicethemes' ),
    'new_item' => __( 'New Feedback Item', 'nicethemes' ),
    'view_item' => __( 'View Feedback Item', 'nicethemes' ),
    'search_items' => __( 'Search Feedback Item', 'nicethemes' ),
    'not_found' =>  __( 'No Feedback Items found', 'nicethemes' ),
    'not_found_in_trash' => __( 'No Feedback Items found in Trash', 'nicethemes' ),
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
    'menu_icon' => get_template_directory_uri() .'/engine/admin/images/btn-feedback.png',
    'menu_position' => null,
    'supports' => array( 'title','editor', 'thumbnail', 'page-attributes' )
  );
  register_post_type( 'feedback',$args);
}

?>