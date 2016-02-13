<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
global $nice_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/includes/js/html5.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/includes/js/respond.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrapper -->
<div id="wrapper">

	<!-- BEGIN #header -->
	<header id="header" class="clearfix">

		<!-- BEGIN #top -->
        <div id="top" class="col-full">

        	<!-- BEGIN #logo -->
            <div id="logo" class="fl">
                <h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
                <?php if ( $nice_options['nice_texttitle'] == 'true' ) :  ?>
                	<span class="text-logo"><?php bloginfo( 'name' ); ?></span>
	            <?php elseif ( $nice_options['nice_logo'] <> '' ) : ?>
					<img src="<?php echo $nice_options['nice_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>" />
	            <?php else: ?>
	            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
	            <?php endif;?>
            </a></h1>

            <!-- END #logo -->
            </div>

            <!-- BEGIN #navigation -->
            <nav id="navigation">

            <?php $defaults = array(
                              'menu'            => '',
                              'container'       => 'div',
                              'container_class' => '',
                              'container_id'    => '',
                              'menu_class'      => 'nav fl sf-js-enabled clearfix',
                              'menu_id'         => 'main-nav',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',
                              'before'          => '',
                              'after'           => '',
                              'link_before'     => '',
                              'link_after'      => '',
                              'depth'           => 0,
                              'walker'          => '',
                              'theme_location'  => 'navigation-menu' );
            ?>

            <?php wp_nav_menu( $defaults ); ?>

            <!-- END #navigation -->
            </nav>

        <!-- END #top -->
        </div>

    <!-- END #header -->
    </header>

<!-- BEGIN #container -->
<div id="container" class="clearfix">

<nav class="responsive-nav"></nav>


<?php if ( nice_bool( $nice_options['nice_slider'] ) && ( is_home() || is_front_page() ) ) : ?>

	<?php

	$slides = get_posts( array ( 'post_type' => 'slide', 'showposts' => $nice_options['nice_slider_entries'], 'orderby' => 'menu_order', 'order' => 'ASC' ) );

	?>
	<?php if ( !empty ( $slides ) ) : ?>

		<!-- BEGIN .flexslider -->
		<div class="flexslider slider">

	    	<ul class="slides">

	            <?php foreach ( $slides as $post ) : setup_postdata( $post ); ?>
					<li>
	                    <?php 	if ( get_post_meta( $post->ID, 'embed', $single = true ) ) {
									nice_embed( array ( 'key' => 'embed', 'width' => 960, 'height' => 400, 'wrap' => true, 'embed_id' => 'player_'.$post->ID ) ) . "\n";
								} elseif ( has_post_thumbnail() ) {
									nice_image( array ( 'key' => 'slider-image', 'width' => 956, 'height' => 400 ) ) . "\n";

									if ( $nice_options['nice_slider_caption'] == 'true' ) {

										$slide_description = get_post_meta( $post->ID, 'slide-description', true );

										?>

										<div class="flex-caption">
				                        	<h2><?php the_title(); ?></h2>
				                        	<?php if ( $slide_description <> '' ) { ?><p><?php echo $slide_description; ?></p><?php } ?>
				                        </div>
				                    <?php } ?>
						<?php 	} ?>

	                </li>

				<?php endforeach; ?>

			</ul>

		<!-- END .flexslider -->
		</div>

	<?php endif; ?>

<?php endif; ?>