<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php add_filter( 'nice_load_flexslider_js', '__return_true', 10 ); ?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php

	$currency = get_option( 'nice_currency_symbol' );
	if ( empty ( $currency ) ) $currency = '$';

	$price = get_post_meta( $post->ID, 'price', true );

	if ( $price <> '' )
		$price = '<span class="price">' . $currency . $price . '</span>';

	$attachments = get_children( array(	'post_parent' => $post->ID,
										'post_type' => 'attachment',
										'post_mime_type' => 'image',
										'order' => 'DESC',
										'orderby' => 'menu_order date'
										)
								);

	if ( empty( $attachments ) && ( has_post_thumbnail() == false )  ) $css = ' class="no-image"';

?>

	<!-- BEGIN #sidebar -->
	<aside id="sidebar" role="complementary"<?php echo $css; ?>>

			<header>
	            	<h1><?php the_title(); ?><?php echo $price; ?></h1>
	        </header>

            <h4><?php echo get_the_term_list( get_the_ID(), 'menu-category', '<span class="menu-categories">', ', ', '</span><!--/.menu-categories-->' . "\n" ); ?></h4>

            <div class="post-content entry">
				<?php the_content( __('Continue reading', 'nicethemes') . ' &raquo;' ); ?>
			</div>

	<!-- END #sidebar -->
	</aside>

	<!-- BEGIN #content -->
	<div id="content"<?php echo $css; ?>>

		<article <?php post_class(); ?>>

	            <?php

				if ( has_post_thumbnail() || !empty( $attachments ) )
				{	?>
					<?php

					// Search for and get the post attachment
					if ( !empty( $attachments ) && ( count( $attachments ) > 1 ) ) {

						?>
						<div class="flexslider slider">

					    	<ul class="slides">
					    		<?php
					    		if ( get_post_meta( $post->ID, 'embed', $single = true) ) { ?>
										<li>
										<?php nice_embed( 'key=embed&width=610&wrap=true&embed_id=player_' . $post->ID ) . "\n"; ?>
										</li>
								<?php } ?>

					            <?php foreach ( $attachments as $att_id => $attachment ) :

											$src = get_nice_image_path( $att_id ); ?>
									<li>
					                    <?php if ( has_post_thumbnail( ) ) {
											 ?>
												<?php echo nice_image( 'echo=0&width=610&class=wp-post-image&src=' . $src ). "\n"; ?>
										<?php
											} ?>

					                </li>

					            <?php endforeach; ?>

							</ul>
						</div>

					<?php }else{ ?>

						<figure class="featured-image">
							<?php nice_image( array ( 'width' => 730, 'class' => 'wp-post-image' ) ); ?>
						</figure>

					<?php }?>

				<?php }	?>


	            </article>

	</div>
	<!-- END #content -->

	<section class="single-menu-meta">

		<?php

		if ( ( $calories = get_post_meta( $post->ID, 'calories', true ) ) <> ''  )
			echo '<div class="menu-meta clearfix"><span>' . __('Calories', 'nicethemes' ) . '</span>' . $calories . '</div>';

		if ( !nice_bool( get_post_meta( $post->ID, 'drink', true ) ) ) :

			echo '<div class="menu-meta clearfix"><span>' . __( 'Gluten Free', 'nicethemes' ) . '</span>';
			if ( nice_bool ( get_post_meta( $post->ID, 'glutenfree', true ) ) )
				_e( 'Yes', 'nicethemes' );
			else
				_e( 'No', 'nicethemes' );

			echo '</div>';

			echo '<div class="menu-meta clearfix"><span>' . __( 'Vegetarian', 'nicethemes' ) . '</span>';
			if ( nice_bool ( get_post_meta( $post->ID, 'vegetarian', true ) ) )
				_e( 'Yes', 'nicethemes' );
			else
				_e( 'No', 'nicethemes' );

			echo '</div>';

		endif;

		if ( ( $spiciness = get_post_meta( $post->ID, 'spiciness', true ) ) > 0  )
			echo '<div class="menu-meta clearfix"><span>' . __( 'Spiciness', 'nicethemes' ) . '</span>' . $spiciness . '</div>';

		?>

	</section>

<?php endwhile; ?>

<?php get_footer(); ?>