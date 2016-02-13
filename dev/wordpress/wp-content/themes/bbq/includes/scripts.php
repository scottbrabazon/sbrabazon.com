<?php

if ( !is_admin() ):

	// he's watching the theme, let's load js and css scripts :)
	add_action( 'wp_print_scripts', 'nice_scripts_js' );
	add_action( 'wp_print_styles', 'nice_scripts_css' );

endif;


/**
 * nice_scripts_css()
 *
 * register css styles and enqueue them
 *
 * @since 1.0
 *
 * @uses wp_register_style, wp_enqueue_style
 *
 */

if ( ! function_exists( 'nice_scripts_css' ) ) :
	function nice_scripts_css()
	{

		wp_register_style( 'nice-fancybox', get_template_directory_uri() . '/includes/css/jquery.fancybox.css' );
        wp_enqueue_style( 'nice-fancybox' );

		do_action( 'nice_scripts_css' );

	} // end nice_scripts_css
endif;



/**
 * nice_scripts_js()
 *
 * register js scripts and enqueue them
 *
 * @since 1.0
 *
 * @uses wp_register_script, wp_enqueue_script
 *
 */

if ( ! function_exists( 'nice_scripts_js' ) ) :
	function nice_scripts_js()
	{
		global $nice_options;

		wp_register_script( 'nice-slides', get_template_directory_uri() . '/includes/js/slides.min.jquery.js', array( 'jquery' ) );
		wp_register_script( 'nice-feedback', get_template_directory_uri() . '/includes/js/feedback.js', array( 'jquery', 'nice-slides' ) );
		wp_register_script( 'nice-contact-validation', 'http://ajax.microsoft.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array('jquery') );
		wp_register_script( 'nice-fancybox-js', get_template_directory_uri() . '/includes/js/jquery.fancybox.js', array('jquery') );
		wp_register_script( 'nice-custom', get_template_directory_uri() . '/includes/js/custom.js', array( 'jquery' ) );

		wp_enqueue_script( 'nice-custom' );
		wp_enqueue_script( 'nice-fancybox-js' );

		$load_feedback_js = false;

		$load_feedback_js = apply_filters( 'nice_load_feedback_js', $load_feedback_js );

		if ($load_feedback_js || nice_bool( get_option( 'nice_feedback_footer' ) ) ) wp_enqueue_script( 'nice-feedback' );

		$load_contact_js = false;

		$load_contact_js = apply_filters( 'nice_load_contact_js', $load_contact_js );

		if ( $load_contact_js ) {
			wp_enqueue_script('nice-contact-validation');
			add_action( 'wp_head', 'nice_contact_js', 10 );
		}

		wp_register_script( 'nice-scrollto-js', get_template_directory_uri() . '/includes/js/jquery.scrollTo-min.js', array( 'jquery', 'jquery-ui-core' ) );
		wp_enqueue_script('nice-scrollto-js');
		wp_register_script( 'nice-localscroll-js', get_template_directory_uri() . '/includes/js/jquery.localscroll-min.js', array( 'jquery', 'jquery-ui-core' ) );
		wp_enqueue_script('nice-localscroll-js');

		$load_flexslider_js = false;

		$load_flexslider_js = apply_filters( 'nice_load_flexslider_js', $load_flexslider_js );

		if ( is_home() || is_front_page() || $load_flexslider_js  ) {

			if ( $nice_options['nice_slider'] == 'true' || $load_flexslider_js  ){
				wp_register_script( 'flexslider', get_template_directory_uri() . '/includes/js/jquery.flexslider-min.js', array( 'jquery' ) );
				wp_enqueue_script('flexslider');
				wp_register_script( 'froogaloop', 'http://a.vimeocdn.com/js/froogaloop2.min.js', array( 'jquery' ) );
				wp_enqueue_script('froogaloop');
				add_action( 'wp_head', 'nice_flexslider_js', 10 );
			}

		}

		do_action( 'nice_scripts_js' );

	} // end nice_scripts_js
endif;

/**
 * nice_contact_js()
 *
 * print js for contact form
 *
 * @since 1.0.0
 *
 */
if (! function_exists( 'nice_contact_js' )):

	function nice_contact_js()
	{
		// being here we can set admin-ajax.php for WP multisite
		?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {

			jQuery('#nice_contact').validate({

				messages: {
						"name":{"required":"Please enter your name."},
						"mail":{"required":"Please enter your email address."},
						"message":{"required":"Please enter a message."}
				},

				submitHandler: function(form) {

					var str = jQuery('#nice_contact').serialize();

					jQuery.ajax({
						type: "POST",
						url: "<?php echo admin_url();?>admin-ajax.php",
						data: 'action=nice_contact_form&nonce=<?php echo wp_create_nonce("play-nice");?>&' + str,
						success: function(msg) {
							jQuery("#node").ajaxComplete(function(event, request, settings){
									if(msg == 'sent') {
										jQuery(".nice-contact-form #node").hide();
										jQuery(".nice-contact-form #success").fadeIn("slow");
									}else {
										result = msg;
										jQuery(".nice-contact-form #node").html(result);
										jQuery(".nice-contact-form #node").fadeIn("slow");
									}
							});
						}
					});
					return false;
					form.submit();
				}
			});
		});
		</script>
        <?php

	}
endif;

/**
 * nice_flexslider_js()
 *
 * print js for contact form
 *
 * @since 1.0.1
 *
 */
if (! function_exists( 'nice_flexslider_js' )):

	function nice_flexslider_js()
	{
	global $nice_options;


	$fields = array(
		'nice_slider_animation' => 'slide',
		'nice_slider_animation_loop' => 'false',
		'nice_slider_direction' => 'horizontal',
		'nice_slider_reverse' => 'false',
		'nice_slider_pause_on_hover' => 'false',
		'nice_slider_randomize' => 'false',
		'nice_slider_animation_speed' => '600',
		'nice_slider_slideshow' => 'true',
		'nice_slider_slideshow_speed' => '7000',
		'nice_slider_control_nav' => 'true',
		'nice_slider_direction_nav' => 'true'
		);

	foreach ( $fields as $k => $v ) {
		if ( is_array( $nice_options ) && isset( $nice_options[ $k ] ) && $nice_options[ $k ] != '' ) {
			${$k} = $nice_options[ $k ];
		}
	}

	extract($fields, EXTR_SKIP);

	?>

	<script type='text/javascript'>

	jQuery(window).load(function() {

		var vimeoPlayers = jQuery('.flexslider').find('iframe'),
		player;

		for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
		    player = vimeoPlayers[i];
		    $f(player).addEvent('ready', ready);
		}

		function addEvent(element, eventName, callback) {
	    	if (element.addEventListener) {
		    	element.addEventListener(eventName, callback, false)
		    } else {
	      		element.attachEvent(eventName, callback, false);
	      	}
	    }

	    function ready(player_id) {
	    	var froogaloop = $f(player_id);
	    	froogaloop.addEvent('play', function(data) {
		    	jQuery('.flexslider').flexslider("pause");
		    });
		    froogaloop.addEvent('pause', function(data) {
			    jQuery('.flexslider').flexslider("play");
		    });
		}



		jQuery(".flexslider")
		.flexslider({
			animation: "<?php echo $nice_slider_animation; ?>",
			direction: "<?php echo $nice_slider_direction; ?>",
			reverse: <?php echo $nice_slider_reverse; ?>,
			animationLoop: <?php echo $nice_slider_animation_loop; ?>,
			randomize:<?php echo $nice_slider_randomize; ?>,
			slideshow: <?php echo $nice_slider_slideshow; ?>,
			slideshowSpeed: <?php echo $nice_slider_slideshow_speed; ?>,
			animationSpeed: <?php echo $nice_slider_animation_speed; ?>,
			pauseOnHover: <?php echo $nice_slider_pause_on_hover; ?>,
			useCSS: false,
			smoothHeight: true,
			controlNav: <?php echo $nice_slider_control_nav; ?>,
			directionNav: <?php echo $nice_slider_direction_nav; ?>,
			before: function(slider){
				if ( slider.slides.eq(slider.currentSlide).find('iframe').length !== 0 )
					$f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
			}
		});
	});

	</script>

	<?php
	}

endif;
?>