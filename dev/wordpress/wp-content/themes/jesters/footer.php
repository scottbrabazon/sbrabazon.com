<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

?>
	<!-- END #container -->
	</div>

    <!-- BEGIN #footer -->
    <footer id="footer">

	    <?php if ( nice_bool( get_option( 'nice_feedback_footer' ) ) ) : ?>

    	<section class="testimonials clearfix">
	    	<div class="col-full">
	    		<header>
	    			<h4><?php _e( 'Client Testimonials', 'nicethemes' ); ?></h4>
	    		</header>

				<?php
				add_filter( 'nice_load_feedback_js', '__return_true', 10 );
				echo nice_display_feedback_items ( array (
													 	'echo' => false,
													 	'effect' => 'fade',
														'pagination' => true,
														'display_author' => true,
														'display_url' => true,
														'featured_image' => 0,
														'numberposts' => 5
													)
											);
				?>

	    	</div>
    	</section>

    	<?php endif; ?>

        <?php if ( 	is_active_sidebar( 'footer-1' ) ||
                    is_active_sidebar( 'footer-2' ) ||
                    is_active_sidebar( 'footer-3' ) ) : ?>

        <!-- BEGIN #footer-widget -->
        <div id="footer-widgets" class="col-full">

            <div class="widget-section odd">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
            <div class="widget-section even">
                <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
            <div class="widget-section odd last">
                <?php dynamic_sidebar( 'footer-3' ); ?>
            </div>
            <div class="fix"></div>

            <div class="footer-logo">
                <img src="wp-content/themes/jesters/images/logo.svg">
                <p>25 Church Street, Barnoldswick, BB18 5UR, Phone: 01282 816309</p>
            </div> 

        <!-- END #footer -->
        </div>

        <?php endif; ?>

        <div id="extended-footer">
        	<div class="inner">
                <p>Site designed by <a href="http://www.scottbrabazon.com" target="_blank">Scott Brabazon</a>
                </p>
        	</div>
        </div>

    <!-- END #footer -->
    </footer>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>
</body>
</html>