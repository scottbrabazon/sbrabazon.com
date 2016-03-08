<?php
/*
*	Menu - Custom post type
*/

add_action( 'init', 'add_nice_menu' );

function add_nice_menu()
{
  $labels = array(
    'name' => __( 'Food Menu', 'nicethemes' ),
    'singular_name' => __( 'Menu Item', 'nicethemes' ),
    'add_new' => __( 'Add New', 'nicethemes' ),
    'add_new_item' => __( 'Add New Menu Item', 'nicethemes' ),
    'edit_item' => __( 'Edit Menu Item', 'nicethemes' ),
    'new_item' => __( 'New Menu Item', 'nicethemes' ),
    'view_item' => __( 'View Menu Item', 'nicethemes' ),
    'search_items' => __( 'Search Menu Items', 'nicethemes' ),
    'not_found' =>  __( 'No Menu Item found', 'nicethemes' ),
    'not_found_in_trash' => __( 'No Menu Items found in Trash', 'nicethemes' ),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_icon' => get_template_directory_uri() . '/engine/admin/images/btn-menu.png',
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt' )
  );
  register_post_type( 'menu', $args );
}

add_action( 'init', 'create_menu_taxonomies', 0 );

// create taxonomies
function create_menu_taxonomies() {

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' =>				__( 'Menu Categories', 'nicethemes' ),
		'singular_name' => 		__( 'Menu Category', 'nicethemes' ),
		'search_items' =>  		__( 'Menu Categories', 'nicethemes' ),
		'all_items' =>			__( 'All Menu Categories', 'nicethemes' ),
		'parent_item' => 		__( 'Parent Menu Category', 'nicethemes' ),
		'parent_item_colon' => 	__( 'Parent Menu Category:', 'nicethemes' ),
		'edit_item' => 			__( 'Edit Menu Category', 'nicethemes' ),
		'update_item' => 		__( 'Update Menu Category', 'nicethemes' ),
		'add_new_item' => 		__( 'Add New Menu Category', 'nicethemes' ),
		'new_item_name' => 		__( 'New Menu Category', 'nicethemes' )
	);

	register_taxonomy( 'menu-category', array( 'menu' ) ,
							array(
								'hierarchical' => true,
								'labels' => $labels,
								'show_ui' => true,
								'query_var' => true,
								'rewrite' => array( 'slug' => 'menu-category' ),
							)
					 );

	}

?>