<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

<!-- BEGIN #content -->
<section id="content">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?>>

			<header>
	            	<h1><?php the_title(); ?></h1>
	            	<?php nice_post_meta(); ?>
	        </header>

            <div class="entry">

	            <?php
	            $embed = get_post_meta( $id, 'embed', true );
	            $video_class = '';

	            if ( $embed <> '' ){
		            echo nice_embed( array ( 'id' => $post->ID ) );
		            $video_class = ' has-video';
	            }
				elseif ( has_post_thumbnail() ) { ?>

	            	<figure class="featured-image">
						<?php nice_image( array( 'width' => 730, 'height' => 338, 'class' => 'wp-post-image' ) ); ?>
	                </figure>

				<?php } ?>

					<div class="post-content<?php echo $video_class; ?>">
						<?php the_content( __( 'Continue reading', 'nicethemes' ) . ' &raquo;' ); ?>
					</div>

			</div>

       	</article>

       	<?php
       		if ( nice_bool ( get_option( 'nice_post_author' ) ) )
            	nice_post_author();
        ?>

		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>

<!-- END #content -->
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>get_footer(); ?>