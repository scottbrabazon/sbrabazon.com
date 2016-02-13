<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/*
Template Name: Contact
*/

add_filter( 'nice_load_contact_js', '__return_true', 10 );

?>

<?php get_header(); ?>

<!-- BEGIN #content -->
<section id="content" class="full-width <?php echo $post->post_name; ?>">

<?php

			$nice_google_map = get_option( 'nice_google_map' );

			if ( !empty ( $nice_google_map ) ): ?>
				<div class="nice-contact-map clearfix">
					<?php echo nice_embed( array ( 'embed' => $nice_google_map, 'width' => 960, 'height' => 300) ); ?>
				</div>
			<?php
			endif;
		?>

<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php

			$nice_address = get_option( 'nice_address' );
			$nice_phone_number = get_option( 'nice_phone_number' );

			if ( !empty ( $nice_address ) ): ?>
				<aside class="nice-contact-sidebar">
					<div class="box">

						<header>
							<h3><?php _e( 'Address', 'nicethemes' ); ?></h3>
						</header>

						<?php echo nl2br ( $nice_address ); ?>

						<?php if ( $nice_phone_number <> '' ) : ?>

							<p><?php echo __( 'Phone', 'nicethemes' ) . ': ' . $nice_phone_number ; ?></p>

						<?php endif; ?>

					</div>

					<div class="box">

						<header>
							<h3><?php _e( 'Hours', 'nicethemes' ); ?></h3>
						</header>

						<?php echo nice_opening_hours(); ?>

					</div>

				</aside>

			<?php endif; ?>

        	<div class="nice-contact-form">

            	<header>
            		<h3><?php the_title(); ?></h3>
            	</header>


            		<div class="entry">
						<?php the_content( __( 'Continue reading', 'nicethemes' ) . ' &raquo;' ); ?>
            		</div>

                    <div id="node"></div>
                    <div id="success"><?php _e( 'Thank you for leaving a message.', 'nicethemes' ); ?></div>

                    <form name="nice_contact" id="nice_contact" method="post" >
                    <p>
	                    <label for="name" form="nice_contact"><?php _e( 'Your Name', 'nicethemes' ); ?><span class="required">*</span></label>
	                    <input type="text" id="name" name="name" value="" class="required" />
                    </p>
                    <p>
	                    <label for="subject" form="nice_contact"><?php _e( 'Subject', 'nicethemes' ); ?></label>
	                    <input type="text" name="subject" id="subject" value="" />
                    </p>
                    <p>
	                    <label for="mail" form="nice_contact"><?php _e( 'Your E-Mail', 'nicethemes' ); ?><span class="required">*</span></label>
	                    <input type="text" name="mail" id="mail" value="" class="required email" />
                    </p>
                    <p>
	                    <label for="message" form="nice_contact"><?php _e( 'Your Message', 'nicethemes' ); ?><span class="required">*</span></label><br />
	                    <textarea name="message" id="message" class="required"></textarea>
                    </p>
                    <p>
                    <input type="submit" value="<?php _e( 'Submit', 'nicethemes' ); ?>" />
                    </p>
                    </form>
                </div>

		<?php endwhile; ?>

<?php else : ?>

    		<header>
            	<h2><?php _e( 'Not Found', 'nicethemes' ); ?></h2>
    		</header>
            <p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'nicethemes' ); ?></p>
            <?php get_search_form(); ?>

<?php endif; ?>

		<!-- END #content -->
		</section>

<?php get_footer(); ?>er(); ?>