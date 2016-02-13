<?php

/* Theme Sidebars */

if ( !function_exists( 'nice_sidebars_init' ) ) {
	function nice_sidebars_init()
	{

		if ( !function_exists( 'register_sidebar' ) ) { return; }

		register_sidebar(array(
				'name' => 'Primary',
				'id' => 'primary',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Page',
				'id' => 'page',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Pre Footer 1',
				'id' => 'pre-footer-1',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Pre Footer 2',
				'id' => 'pre-footer-2',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Pre Footer 3',
				'id' => 'pre-footer-3',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Footer 1',
				'id' => 'footer-1',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Footer 2',
				'id' => 'footer-2',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

		register_sidebar(array(
				'name' => 'Footer 3',
				'id' => 'footer-3',
				'description' => '',
				'before_widget' => '<div class="box widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));

	}
}


add_action( 'init', 'nice_sidebars_init' );

?>