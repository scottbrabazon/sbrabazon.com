<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

		<?php

            global $wp_query;
            $tax = $wp_query->get_queried_object();

            $currency = get_option( 'nice_currency_symbol' );
			if ( empty ( $currency ) ) $currency = '$';

			$taxonomy_menu_grid = get_option( 'nice_taxonomy_menu_grid' );

			$subcategories =  get_categories( array( 'taxonomy' => 'menu-category', 'child_of' => $tax->term_id ) );

		?>

        <!-- BEGIN .col-full -->
        <section class="<?php if ( empty($subcategories) ) echo 'col-full'; else echo 'menu-list'; ?> clearfix">

            <header>
            	<h1 class="entry-title"><?php echo single_cat_title() ; ?></h1>
            </header>

            <?php $temp_query = $wp_query; // Save the query ?>

            <div class="menu-card">
				<?php

					if ( nice_bool( $taxonomy_menu_grid ) ) echo '<div>';
					else echo '<div class="menu-box">';

					echo '<p>' . $tax->description .'</p>';

					echo '<ul>';

						$menus = get_posts(	array (	'post_type' => 'menu',
													'order' => 'ASC',
													'orderby' => 'menu_order',
													'numberposts' => -1,
													'posts_per_page' => -1,
													'tax_query' => array(
																array(
																	'taxonomy' => 'menu-category',
																	'field' => 'slug',
																	'terms' =>  $tax->slug,
																	'include_children' => false
																)
															)
													)

											);

					    foreach ( $menus as $post ) {

					        setup_postdata( $post );

					        echo '<li><div class="title clearfix"><span><a href="' . get_permalink( $post->ID ) . '">' . get_the_title() . '</a></span>';

					        if ( $price = get_post_meta( $post->ID, 'price', true ) )
								echo '<span class="price">' . $currency . $price . '</span>' . "\n";

					        echo '</div><div class="description clearfix">';

					        if ( has_post_thumbnail() && nice_bool( get_post_meta( $post->ID, 'display_image_menu_list', true ) ) ) { ?>

				            	<figure class="featured-image fl">
				            		<a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>">
										<?php nice_image( array( 'width' => 120, 'height' => 80, 'class' => 'menu-image fl' ) ); ?>
				            		</a>
				                </figure>

							<?php }
							if ( get_the_excerpt() <> '' )
					        	echo '' . get_the_excerpt() . '';

					        echo '</div></li>';
					    }

					    echo '</ul>';

					if ( !empty ( $subcategories ) ) :

					$left_menu = '<ul>';

					foreach  ( $subcategories as $subcategory ) {

						if ( nice_bool( $taxonomy_menu_grid ) ) echo '<div class="menu-box">';

					    echo '<h3 class="menu-subcategory" name="subcategory-item-' . $subcategory->term_id . '">' . $subcategory->name.  '</h3>';

					    $left_menu .= '<li class="category-item"><a href="#subcategory-item-' . $subcategory->term_id . '">' . $subcategory->cat_name . '</a>';

					    if (  $subcategory->description <> '' )
					    	echo '<p>' . $subcategory->description .'</p>';

					    echo '<ul>';

					    foreach ( get_posts( array ( 'post_type' => 'menu', 'order' => 'ASC', 'orderby' => 'menu_order', 'numberposts' => -1, 'posts_per_page' => -1, 'menu-category' => $subcategory->category_nicename ) ) as $post) {

					        setup_postdata( $post );

					        echo '<li>';

					        echo '<div class="title clearfix"><span><a href="' . get_permalink( $post->ID ) . '">' . get_the_title() . '</span></a>';

					        if ( $price = get_post_meta( $post->ID, 'price', true ) )
								echo '<span class="price">' . $currency . $price . '</span>' . "\n";

					        echo '</div><div class="description clearfix">';

					        if ( has_post_thumbnail() && nice_bool( get_post_meta( $post->ID, 'display_image_menu_list', true ) ) ) { ?>

				            	<figure class="featured-image fl">
				            		<a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>">
										<?php nice_image( array( 'width' => 120, 'height' => 80, 'class' =>'menu-image fl' ) ); ?>
				            		</a>
				                </figure>

							<?php }
					        if ( get_the_excerpt() <> '' )
					        	echo '' . get_the_excerpt() . '';

					        echo '</div></li>';
					    }

					    echo '</ul>';

					    if ( nice_bool( $taxonomy_menu_grid ) ) echo '</div>';
					}

					$left_menu .= '</ul>';

					endif;

					echo '</div>';

					wp_reset_query();

				?>
               	</div>

    	<!-- END .col-full -->
    	</section>

    	<?php if ( !empty ( $left_menu ) ) : ?>

    		<aside id="sidebar">
				<?php echo $left_menu; ?>
			</aside>

    	<?php endif; ?>

<?php get_footer(); ?>