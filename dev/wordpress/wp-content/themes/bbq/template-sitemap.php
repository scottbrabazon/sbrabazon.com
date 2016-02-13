<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>

<!-- BEGIN #content -->
<section id="content" class="full-width <?php echo $post->post_name; ?>">

<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

            	<header>
	            	<h1 class="entry-title"><?php the_title(); ?></h1>
	            </header>

                <article class="entry">

                	<?php the_content( __( 'Continue reading', 'nicethemes' ) . ' &raquo;' ); ?>

               	</article>


		<?php endwhile; ?>

		<div class="two-col entry">
			<div class="col-1">

				<header>
				<h3><?php _e( 'Pages', 'nicethemes' ) ?></h3>
				</header>
					<ul>
				    	<?php wp_list_pages( 'depth=0&sort_column=menu_order&title_li=' ); ?>
				    </ul>

				<header>
				<h3><?php _e( 'Categories', 'nicethemes' ) ?></h3>
			    </header>
			    	<ul>
		    	    	<?php wp_list_categories( 'title_li=&hierarchical=0&show_count=1') ?>
		        	</ul>
			</div>

			<div class="col-2">
				<header>
					<h3><?php _e( 'Posts per category', 'nicethemes' ); ?></h3>
				</header>
					<?php
						$cats = get_categories();
				        foreach ($cats as $cat) { query_posts( 'cat='.$cat->cat_ID ); }
				    ?>
				<header>
					<h4><?php echo $cat->cat_name; ?></h4>
				</header>
					<ul>
						<?php while (have_posts()) : the_post(); ?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php _e( 'Comments', 'nicethemes' ) ?> (<?php echo $post->comment_count ?>)</li>
						<?php endwhile;  ?>
					</ul>
			</div>

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