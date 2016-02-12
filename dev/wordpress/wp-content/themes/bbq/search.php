<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

<!-- BEGIN #content -->
<div id="content" class="<?php echo $post->post_name; ?>">

<header>
	<h1 class="archive-header"><?php _e( 'Search Results', 'nicethemes' ); ?>: <?php the_search_query(); ?></h1>
</header>

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

                <article class="post clearfix">

	                <header>
	                	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>"><?php the_title(); ?></a></h2>
						<?php nice_post_meta(); ?>
	                </header>

	                <?php if ( has_post_thumbnail() ) :?>

		            	<figure class="featured-image">
							<?php nice_image( array( 'width' => 620, 'height' => 285, 'class' => 'wp-post-image' ) ); ?>
		                </figure>

					<?php endif; ?>

					<?php nice_excerpt(); ?>

                </article>

		<?php endwhile; ?>

        <?php nice_pagenavi(); ?>

<?php else : ?>

	<?php _e ( 'Sorry, no posts matched your criteria.', 'nicethemes' ); ?>

<?php endif; ?>

<!-- END #content -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>ter(); ?>