<?php
/* Menu */
add_action( 'init', 'nice_nav_menus' );

function nice_nav_menus() {
	
	register_nav_menu( 'navigation-menu', __( 'Navigation Menu', 'nicethemes' ) );
}

?>