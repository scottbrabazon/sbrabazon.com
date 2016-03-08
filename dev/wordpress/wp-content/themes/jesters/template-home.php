<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

			<?php

			$nice_infobox_enable = get_option( 'nice_infobox_enable' );
			$nice_infobox_order = get_option( 'nice_infobox_order' );

			if ( $nice_infobox_order == '' )
				$nice_infobox_order = 'date';

			if ( $nice_infobox_enable == 'true' ) :

			?>

			<section id="infobox" class="infobox home-block clearfix">

				<?php

				$query = new WP_Query( array(
							'post_type' => 'infobox',
							'orderby' => $nice_infobox_order,
							'posts_per_page' => 3,
							'order' => 'ASC'
						));

				?>

				<ul class="three-col-grid grid clearfix">

			 	<?php

			 	$columns = 3;

			 	$loop = 0;

			 	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

					$infobox_readmore = get_post_meta ( get_the_ID(), 'infobox_readmore', true );
					$infobox_readmore_anchor = get_post_meta ( get_the_ID(), 'infobox_readmore_text', true );

					$loop++;

					?>

					<li id="post-<?php the_ID(); ?>" class="<?php if ( $loop % $columns == 0) echo 'last'; if ( ($loop-1) % $columns ==0 ) echo 'first'; ?>">

						<span class="entry-title">
							<?php if ($infobox_readmore <> '' ) : ?>
							<a href="<?php echo $infobox_readmore ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>"> <?php the_title(); ?></a>
							<?php else: ?>
								<?php the_title(); ?>
							<?php endif; ?>
						</span>

						<?php if (  (function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() )  ) : ?>

							<div class="thumb">
                                <?php if ($infobox_readmore <> '' ) : ?><a href="<?php echo $infobox_readmore ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>"><?php endif; ?>
                                <?php nice_image( array ('key' =>'infobox-image', 'width' => 480, 'height' => 240 ) ); ?>
                                 <?php if ($infobox_readmore <> '' ) : ?></a><?php endif; ?>
                             </div>

						<?php endif; ?>

						<!-- BEGIN .entry-excerpt -->
						<div class="entry-excerpt">

							<?php nice_excerpt( 150 ); ?>

							<?php if ( $infobox_readmore <> '' ) : ?>
							<a href="<?php echo $infobox_readmore ?>" rel="bookmark" class="read-more" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>">
							<?php
								if ( $infobox_readmore_anchor <> '' )
									echo $infobox_readmore_anchor;
								else
									_e( 'Read more', 'nicethemes' );
							?>
							</a>
							<?php endif; ?>

						<!-- END .entry-excerpt -->
						</div>

					</li>

				<?php endwhile; endif; ?>

				</ul>

			<!-- END #infobox -->
			</section>

			<?php endif; ?>

			<?php if ( 	is_active_sidebar( 'pre-footer-1' ) ||
                    	is_active_sidebar( 'pre-footer-2' ) ||
                    	is_active_sidebar( 'pre-footer-3' ) ) : ?>

	            <section id="pre-footer-widgets" class="pre-footer-widgets home-block clearfix">

		            <div class="widget-section odd first">
		                <?php dynamic_sidebar( 'pre-footer-1' ); ?>
		            </div>

		            <div class="widget-section even">
		                <?php dynamic_sidebar( 'pre-footer-2' ); ?>
		            </div>

		            <div class="widget-section odd last">
		                <?php dynamic_sidebar( 'pre-footer-3' ); ?>
		            </div>

		        <!-- END #home-widgets -->
		        </section>

	        <?php endif; ?>

<?php get_footer(); ?>