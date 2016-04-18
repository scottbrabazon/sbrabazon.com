<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/*
Template Name: Gallery
*/
?>
<?php get_header(); ?>

<!-- BEGIN #content -->
<section id="content" class="full-width <?php echo $post->post_name; ?>">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

                <div class="entry clearfix">
                	<?php the_content( __( 'Continue reading', 'nicethemes' ) . ' &raquo;' ); ?>
               	</div>

               	<?php

               	$attachments = get_children( array(	'post_parent' => $post->ID,
										'post_type' => 'attachment',
										'post_mime_type' => 'image',
										'order' => 'DESC',
										'numberposts' => -1,
										'orderby' => 'menu_order date'
										)
								);

				if ( !empty( $attachments ) && ( count( $attachments ) > 1 ) ) {

						?>
						<div class="gallery-container clearfix">

					    	<ul class="four-col-grid grid clearfix">

					            <?php foreach ( $attachments as $att_id => $attachment ) : ?>

									<?php $src = get_nice_image_path( $att_id ); ?>

									<li>
										<figure class="thumb">
											<a class="fancybox" rel="group" href="<?php echo wp_get_attachment_url( $att_id ); ?>" title="<?php echo get_the_title($att_id ); ?>">
						                    <?php nice_image( array ( 'width' =>375, 'height' => 250, 'class' => 'wp-post-image', 'src' =>  $src ) ); ?>
											</a>
										</figure>
					                </li>

					            <?php endforeach; ?>

							</ul>

						</div>

				<?php }else{

						_e( 'There are no images for this gallery', 'nicethemes' );
				}

				?>

		<?php endwhile; ?>

<?php else : ?>

		<header>
			<h2><?php _e( 'Not Found', 'nicethemes' ); ?></h2>
		</header>
		<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'nicethemes' ); ?></p>

		<?php get_search_form(); ?>

<?php endif; ?>

<!-- END #content -->
</section>

<?php get_footer(); ?>

<div id="extended-footer">
    <div class="inner">
        <div class="footer-logo">
            <img src="../../wp-content/themes/jesters/images/logo.svg">
            <p>25 Church Street, Barnoldswick, BB18 5UR, Phone: 01282 816309</p>
        </div> 
        <p>Site designed by <a href="http://www.scottbrabazon.com" target="_blank">Scott Brabazon</a>
        </p>
    </div>
</div>