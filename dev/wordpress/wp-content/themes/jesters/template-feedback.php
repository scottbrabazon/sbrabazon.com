<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/*
Template Name: Testimonials (Feedback)
*/
?>
<?php get_header(); ?>

<!-- BEGIN #content -->
<section id="content" class="full-width <?php echo $post->post_name; ?>">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

            	

                <div class="entry">
                	<?php

                	the_content( __( 'Continue reading', 'nicethemes' ) . ' &raquo;' );

	               	$testimonials = get_posts(	array (	'post_type' => 'feedback', 'order' => 'DESC', 'orderby' => 'menu_order') );

	               	if ( !empty( $testimonials ) ) :

		               	$output = '';

						foreach ( $testimonials as $post ) {

							setup_postdata( $post );

							$meta = get_post_custom( $post->ID );


							if ( ( isset( $meta['feedback_author'] ) && ( $meta['feedback_author'][0] != '' ) ) || ( isset( $meta['feedback_url'] ) && ( $meta['feedback_url'][0] != '' ) ) ):
								$feedback_author = '<span class="feedback-author clearfix">';

								if ( isset( $meta['feedback_author'] ) && ( $meta['feedback_author'][0] != '' ) ) {
									$feedback_author .= '<cite class="feedback-author">' . $meta['feedback_author'][0] . '</cite>' . "\n";
								}

								if ( isset( $meta['feedback_url'] ) && ( $meta['feedback_url'][0] != '' ) ) {
									$feedback_author .= ' &mdash; <a href="' . $meta['feedback_url'][0] . '" title="' . esc_attr( $meta['feedback_author'][0] ) . '" class="feedback-url">' . $meta['feedback_url'][0] . '</a>';
								}

								$feedback_author .= '</span>';

							endif;

							$output .= '<div id="testimonial-' . $post->ID . '" class="testimonial clearfix">' . "\n";

							$output .= '<blockquote class="feedback-text">' . get_the_content() . '</blockquote>' . "\n";

							$output .= $feedback_author;

							$output .= '</div>' . "\n";

						}

						echo $output;

					else: ?>
						<p>
						<?php _e( 'There are no feedback items', 'nicethemes'); ?>
						</p>
					<?php
					endif;

					wp_reset_query();

					?>

				</div>

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