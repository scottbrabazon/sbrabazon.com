<?php
/**
 * Table of Contents (panel.php)
 *
 *	- nice_admin_menu()
 *	- nice_admin_head()
 *	- nice_admin()
 *	- nicethemes()
 *	- nice_ajax_save_options()
 *
 */

// Action for backend menu.
add_action( 'admin_menu', 'nice_admin_menu' );

/**
 * nice_admin_menu()
 *
 * Create admin menu for nicethemes
 *
 * @since 1.0.0
 *
 */

function nice_admin_menu()
{

  add_object_page( __( 'Theme Options', 'nicethemes' ), 'Nice Themes', 'manage_options', 'nicethemes', 'nicethemes', NICE_TPL_DIR . '/engine/admin/images/btn-nicethemes.png' );

  // Theme Options.
  $niceadmin = add_submenu_page( 'nicethemes', __( 'Theme Options', 'nicethemes' ), __( 'Theme Options', 'nicethemes' ), 'manage_options', 'nicethemes', 'nicethemes' );

  // Updates.
  $niceadmin = add_submenu_page( 'nicethemes', __( 'NiceThemes Updates', 'nicethemes' ), __( 'Updates','nicethemes' ), 'manage_options', 'niceupdates', 'niceupdates' );

  // Support.
  $niceadmin = add_submenu_page( 'nicethemes', __( 'Support Forums', 'nicethemes'), __('Support', 'nicethemes'), 'manage_options', 'nicethemes-support', 'nicethemes_support_page');

  // More Themes.
  $niceadmin = add_submenu_page( 'nicethemes', __( 'More Themes', 'nicethemes' ), __( 'More Themes', 'nicethemes' ), 'manage_options', 'nicethemes-themes', 'nicethemes_themes_page' );

  if ( is_admin_niceframework() )
  {
  	wp_enqueue_style( 'admin-style', NICE_TPL_DIR.'/engine/admin/admin-style.css' );
  	wp_register_style( 'nice-datepicker', get_template_directory_uri() . '/engine/admin/css/datepicker.css' );

  	wp_register_script( 'jquery-ui-datepicker-js', get_template_directory_uri() . '/engine/admin/js/ui.datepicker.js', array( 'jquery-ui-core' ) );

  	add_action( 'admin_head', 'nice_admin_head' );
  	wp_enqueue_style( 'nice-datepicker' );
  	wp_enqueue_script( 'jquery-ui-datepicker-js' );

  }

}


/**
 * nice_admin_head()
 *
 * include all the js and css for the admin section
 *
 */

function nice_admin_head()
{ ?>

<link rel="stylesheet" media="screen" type="text/css" href="<?php echo NICE_TPL_DIR; ?>/engine/admin/css/colorpicker.css" />
<script type="text/javascript" src="<?php echo NICE_TPL_DIR; ?>/engine/admin/js/colorpicker.js"></script>


<script type="text/javascript" language="javascript">

		jQuery(document).ready(function(){

			// nice help buttons
			jQuery(".nice-help-button").hover(
				function(){jQuery(this).parent().children().children( '.explain' ).fadeIn( 'slow' );return false;},
    	   		function(){jQuery(this).parent().children().children( '.explain' ).fadeOut( 'slow' );}
			);

			if (jQuery('#nice-header').length == 0 ){}
			else{
				// sticky header & nav
				var topHeight = jQuery( '#nice-header' ).offset().top - jQuery( '#wpadminbar' ).height();

				jQuery(window).scroll( function() {
					if(jQuery(document).scrollTop() > topHeight){
						jQuery( '#nice-header' ).css({position: 'fixed', marginTop: -topHeight});
						jQuery( '#nice-nav' ).css({position: 'fixed', marginTop: -topHeight});
					}else{
						jQuery( '#nice-header' ).css({position: 'absolute', marginTop: 0});
						jQuery( '#nice-nav' ).css({position: 'absolute', marginTop: 0});
					}

				});
			}

			//Color Picker
			<?php $nice_options = get_option( 'nice_template' );

			foreach( $nice_options as $option){
				if( $option['type'] == 'color' ){

					$option_id = $option['id'];
					$color = get_option( $option_id );
					?>
					 jQuery( '#<?php echo $option_id; ?>_picker' ).children( 'div' ).css( 'backgroundColor', '<?php echo $color; ?>' );
					 jQuery( '#<?php echo $option_id; ?>_picker' ).ColorPicker({
						color: '<?php echo $color; ?>',
						onChange: function (hsb, hex, rgb) {
							jQuery( '#<?php echo $option_id; ?>_picker' ).children( 'div' ).css( 'backgroundColor', '#' + hex);
							jQuery( '#<?php echo $option_id; ?>_picker' ).next( 'input' ).attr( 'value','#' + hex);

						},
						onShow: function (colpkr) {	jQuery(colpkr).fadeIn(600); return false;	},
						onHide: function (colpkr) {	jQuery(colpkr).fadeOut(600);return false;	}

					  });
				  <?php } elseif ( $option['type'] == 'typography' ){ ?>

				  	// typography

				  	<?php
				  		$option_id = $option['id'];
				  		$db = get_option( $option['id'] );
				  		$std = $option['std'];

						if ( ! is_array( $db ) || empty( $db ) ) {
							$std = $option['std'];
						}

						$font_color = $std['color'];
						if ( $db['color'] != "" ) { $font_color = $db['color']; }

					?>
						 jQuery( '#<?php echo $option_id; ?>_color_picker' ).children( 'div' ).css( 'backgroundColor', '<?php echo $font_color; ?>' );
						 jQuery( '#<?php echo $option_id; ?>_color_picker' ).ColorPicker({
							color: '<?php echo $font_color;  ?>',
							onChange: function (hsb, hex, rgb) {
								jQuery( '#<?php echo $option_id; ?>_color_picker' ).children( 'div' ).css( 'backgroundColor', '#' + hex);
								jQuery( '#<?php echo $option_id; ?>_color_picker' ).next( 'input' ).attr( 'value','#' + hex);

							},
							onShow: function (colpkr) {	jQuery(colpkr).fadeIn(600); return false;	},
							onHide: function (colpkr) {	jQuery(colpkr).fadeOut(600);return false;	}

						  });

				  <?php } ?>
			  <?php } ?>

			  // DATE Pickers
			  if ( jQuery( '.nice-date' ).length ) {
			 		jQuery( '.nice-date' ).each(function () {
			 			var buttonImageURL = jQuery( this ).parent().find( 'input[name=datepicker-image]' ).val();
			 			jQuery( this ).next( 'input[name=datepicker-image]' ).remove();

						jQuery( '#' + jQuery( this ).attr( 'id' ) ).datepicker( { showOn: 'button', buttonImage: buttonImageURL, buttonImageOnly: true, showAnim: 'slideDown' } );
					});
				}

			  jQuery( '#niceform' ).submit(function(){

					function newValues() {
					  var serializedValues = jQuery("#niceform").serialize();
					  return serializedValues;
					}
					jQuery(":checkbox, :radio").click(newValues);
					jQuery("select").change(newValues);
					jQuery( '.ajax-loading-img' ).fadeIn();
					var serializedReturn = newValues();

					var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';

					var data = {
						<?php if( isset ( $_REQUEST['page']) && $_REQUEST['page'] == 'nicethemes' ){ ?>
						type: 'options',
						<?php } ?>

						action: 'nice_post_action',
						data: serializedReturn
					};

					jQuery.post(ajax_url, data, function(response) {
						var success = jQuery( '#nice-popup-save' );
						var loading = jQuery( '.ajax-loading-img' );
						loading.fadeOut();
						success.fadeIn();
						window.setTimeout(function(){
						   success.fadeOut();
						}, 2500);
					});

					return false;

				});

		});

		</script>

		<?php //AJAX Upload ?>

		<script type="text/javascript">

			jQuery(document).ready(function(){

				jQuery( '.group' ).hide();
				jQuery( '.group:first' ).fadeIn();

				jQuery( '.group .collapsed' ).each(function(){
					jQuery(this).find( 'input:checked' ).parent().parent().parent().nextAll().each(
						function(){
           					if (jQuery(this).hasClass( 'last'  ) ) {
           						jQuery(this).removeClass( 'hidden' );
           						return false;
           					}
           					jQuery(this).filter( '.hidden' ).removeClass( 'hidden' );
           				});
           		});

				jQuery( '.group .collapsed input:checkbox' ).click(unhideHidden);

				function unhideHidden(){
					if (jQuery(this).attr( 'checked'  ) ) {
						jQuery(this).parent().parent().parent().nextAll().removeClass( 'hidden' );
					}
					else {
						jQuery(this).parent().parent().parent().nextAll().each(
							function(){
           						if (jQuery(this).filter( '.last' ).length) {
           							jQuery(this).addClass( 'hidden' );
									return false;
           						}
           						jQuery(this).addClass( 'hidden' );
           					});

					}
				}

				jQuery( '#nice-nav li:first' ).addClass( 'current' );
				jQuery( '#nice-nav li a' ).click(function(evt){

						jQuery( '#nice-nav li' ).removeClass( 'current' );
						jQuery(this).parent().addClass( 'current' );

						var clicked_group = jQuery(this).attr( 'href' );

						jQuery( '.group' ).hide();

						jQuery(clicked_group).fadeIn();
						evt.preventDefault();

					});

			// Update Message popup
			jQuery.fn.center = function () {
				this.animate({"top":( jQuery(window).height() - this.height() - 200 ) / 2+jQuery(window).scrollTop() + "px"},100);
				this.css("left", 250 );
				return this;
			}


			jQuery( '#nice-popup-save' ).center();
			jQuery(window).scroll(function() {

				jQuery( '#nice-popup-save' ).center();

			});
		});

		</script>
<?php

}

/**
 * nice_admin()
 *
 */

function nice_admin()
{
  	// mmm
}

/**
 * nicethemes()
 *
 * Create admin panel with options.
 *
 * @since 1.0.0
 *
 */
function nicethemes()
{

	$options = get_option( 'nice_template' );

	$interface = nice_formbuilder( $options );
	?>

    <div class="wrap" id="nice-container">

        <div id="nice-popup-save" class="nice-save-popup"><div class="nice-save-save"><?php _e( 'Changes saved successfully', 'nicethemes' ); ?></div></div>

        <form action="" enctype="multipart/form-data" id="niceform">

        <?php
    	// Add nonce for added security.
    	if ( function_exists( 'wp_nonce_field' ) ) { wp_nonce_field( 'nice-options-update' ); }

    	$nice_nonce = '';

    	if ( function_exists( 'wp_create_nonce' ) ) { $nice_nonce = wp_create_nonce( 'nice-options-update' ); }

    	if ( $nice_nonce != '' ) {

		?>
			<input type="hidden" name="_ajax_nonce" value="<?php echo $nice_nonce; ?>" />
		<?php
		}
		?>

        <!-- BEGIN #header -->
        <div id="nice-header" class="clearfix">
          <div class="logo">
          </div>
          <div class="icon-option"><input type="submit" value="<?php _e( 'Save Changes', 'nicethemes' ); ?>" class="button button-highlighted" /> </div>
          <div class="clear"></div>
        <!-- END #header -->
        </div>

        <!-- BEGIN #main -->
        <div id="main">

        	<div id="nice-nav">
            	<ul>
              	<?php echo $interface->menu; ?>
            	</ul>
          	</div>

            <div id="nice-content">
                <?php echo $interface->content; ?>
            </div>

        <div style="clear:both;"></div>

        <!-- END #main -->
        </div>

        </form>

    </div>
    <?php

}// end nicethemes()


add_action( 'wp_ajax_nice_post_action', 'nice_ajax_callback' );

/**
 * nice_ajax_save_options()
 *
 * Retrieve options and save them.
 *
 * @since 1.0.0
 *
 */
function nice_ajax_save_options()
{

	$nice_options = array();
	$data = array();
	$options = get_option( 'nice_template' );

	foreach( $options as $option ){
		if( isset ( $option['id'] ) ){
			$option_id = $option['id'];
			$option_type = $option['type'];

			if( is_array( $option_type ) ) {
				foreach( $option_type as $inner_option ){
					$option_id = $inner_option['id'];
					if ( isset( $data[$option_id] ) )
						$data[$option_id] .= get_option( $option_id );
					else
						$data[$option_id] = get_option( $option_id );
				}
			}
			else {
				$data[$option_id] = get_option( $option_id );
			}
		}
	}

	$output = "<ul>";

	foreach ( $data as $name => $value ){

		if( is_serialized( $value ) ) {

			$value = unserialize( $value );
			$nice_array_option = $value;
			$temp_options = '';
			foreach( $value as $v ){
				if( isset ( $v ) ) $temp_options .= $v . ',';
			}
			$value = $temp_options;
			$nice_array[$name] = $nice_array_option;
		} else {
			$nice_array[$name] = $value;
		}
		$output .= '<li><strong>' . $name . '</strong> - ' . $value . '</li>';
	}
	$output .= "</ul>";
	$output = base64_encode( $output );

	update_option( 'nice_options', $nice_array );
}


/**
 * nice_ajax_callback()
 *
 * save data.
 *
 * @since 1.0.0
 *
 */

function nice_ajax_callback()
{
	global $wpdb; // this is how you get access to the database

	$save_type = $_POST['type'];

	//Uploads
	if( $save_type == 'upload' ){

		$clickedID = $_POST['data']; // Acts as the name
		$filename = $_FILES[ $clickedID ];
       	$filename['name'] = preg_replace( '/[^a-zA-Z0-9._\-]/', '', $filename['name'] );

		$override['test_form'] = false;
		$override['action'] = 'wp_handle_upload';
		$uploaded_file = wp_handle_upload( $filename, $override );

				$upload_tracking[] = $clickedID;
				update_option( $clickedID , $uploaded_file['url'] );

		 if( !empty( $uploaded_file['error'] ) ) { echo 'Upload Error: ' . $uploaded_file['error']; }
		 else { echo $uploaded_file['url']; } // Is the Response
	}
	elseif( $save_type == 'image_reset' ){

			$id = $_POST['data']; // Acts as the name
			echo $id;
			global $wpdb;
			$query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
			$wpdb->query( $query );

	}
	elseif ( $save_type == 'options' OR $save_type == 'framework' ) {

		$data = $_POST['data'];

		parse_str( $data, $output );

		//Pull options
        $options = get_option( 'nice_template' );

		foreach( $options as $option_array ){

			if( isset ( $option_array['id'] ) ){
				$id = $option_array['id'];
			} else { $id = NULL; }

			$old_value = get_option( $id );
			$new_value = '';

			if( isset ( $output[$id] ) ){
				$new_value = $output[ $option_array['id'] ];
			}

			if( isset ( $option_array['id'] ) ) { // Non - Headings...

					$type = $option_array['type'];


					if ( is_array( $type ) ){

						foreach( $type as $array ){
							if( $array['type'] == 'text' ){
								$id = $array['id'];
								$std = $array['std'];
								$new_value = $output[$id];
								if( $new_value == '' ){ $new_value = $std; }
								update_option( $id, stripslashes( $new_value ) );
								echo $new_value;
							}
						}

					} elseif( $new_value == '' && $type == 'checkbox' ){ // Checkbox Save

						update_option( $id,'false' );

					} elseif ( $new_value == 'true' && $type == 'checkbox' ){ // Checkbox Save

						update_option( $id,'true' );

					} elseif ( $type == 'multicheck' ){ // Multi Check Save

						$option_options = $option_array['options'];

						foreach ( $option_options as $options_id => $options_value ){

							$multicheck_id = $id . "_" . $options_id;

							if(!isset( $output[$multicheck_id] ) ){
							  update_option( $multicheck_id, 'false' );
							}
							else{
							   update_option( $multicheck_id, 'true' );
							}
						}

					} elseif ( $type == 'select_multiple' ) {

						update_option( $id, $new_value );

					} elseif ( $type == 'typography' ) {

						$typography_array = array();

						foreach ( array( 'size', 'family', 'style', 'color' ) as $v  ) {
							$value = '';
							$value = $output[ $option_array['id'] . '_' . $v ];
							if ( $v == 'family' ) {
								$typography_array[$v] = stripslashes( $value );
							} else {
								$typography_array[$v] = $value;
							}
						}

						update_option( $id, $typography_array );

					} elseif ( $type != 'upload_min' ) {

						update_option( $id, stripslashes( $new_value ) );

					}
				}
			}


		if( $save_type == 'options' OR $save_type == 'framework' ){
			/* Create, Encrypt and Update the Saved Settings */
			nice_ajax_save_options();

		}

  	die();

	}
}


/**
 * nicethemes_themes_page()
 *
 * The "More Themes" page handler.
 *
 * @since 1.0.2
 *
 * @print (html)
 */
function nicethemes_themes_page(){

	?>
	<div class="wrap">

		<div id="icon-themes" class="icon32"></div>

		<h2><?php _e( 'Themes by NiceThemes.com', 'nicethemes' ); ?></h2>

		<div id="nicethemes-themes">

		    <ul>
    			<?php
    			if( $rss_items = nicethemes_more_themes_rss() ){

    				foreach ( $rss_items as $item ){
    					?>
    					<li>
        					<div class="theme">
           						<p><?php echo html_entity_decode( $item->get_content() ); ?></p>
        						<h3><a href="<?php echo nicethemes_theme_url( $item->get_title() ); ?>" target="_blank"><?php echo $item->get_title(); ?></a></h3>
        						<p><a href="<?php echo nicethemes_theme_url( $item->get_title() ) ?>" class="button-primary" target="_blank"><?php _e( 'More Info', 'nicethemes' ); ?></a></p>
        					</div>
    					</li>
    					<?php
    				} // end foreach;

    			} else {
    				_e( '<p>Error: Error when fetching themes.</p>', 'nicethemes' );
    			}
    			?>
			</ul>

		</div>

	</div>
	<?php
}

/**
 * nicethemes_support_page()
 *
 * The "Support" page handler.
 *
 * @since 1.0.2
 *
 * @print (html)
 */
function nicethemes_support_page(){

	?>
	<div class="wrap">
		<div id="icon-tools" class="icon32"></div>
		<h2><?php _e( 'NiceThemes.com Support', 'nicethemes' ); ?></h2>
		<div id="nicethemes-support">
			<p>We have a variety of resources to help you get the most out of our themes.</p>
			<p><a href="http://nicethemes.com/support/" class="button-primary" target="_blank">Visit the Support Center &rarr;</a></p>

		</div>

	</div>
	<?php
}

?>