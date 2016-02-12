<?php
/**
 * Theme options.
 */

// make options global.
add_action( 'init', 'nice_options_global' );

function nice_options_global(){
	global $nice_options;
	$nice_options = get_option( 'nice_options' );
}

if ( ! isset( $content_width ) ) $content_width = 620;

add_action( 'admin_head', 'nice_options' );

function nice_options()
{

	$prefix = NICE_PREFIX;

	/*
	* Nice Options
	*/

	$nice_options 	= array ();

	/* General Settings */
	$nice_options[] = array( "name" => __( 'General Settings', 'nicethemes' ),
							 "type" => "heading" );

	$nice_options[] = array( "name" => __( "Custom Logo", 'nicethemes' ),
							 "desc" => __( "BBQ theme shared on W P L O C K E R .C O M - Upload a custom logo.", 'nicethemes' ),
							 "id" => $prefix . "_logo",
							 "std" => "",
							 "type" => "upload" );

	$nice_options[] = array( "name" => "Text Title",
							 "desc" => __( "Enable if you want Blog Title and Tagline to be text-based. Setup title/tagline in WP -> Settings -> General.", 'nicethemes' ),
							 "id" => $prefix . "_texttitle",
							 "std" => "false",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Site Title Typography', 'nicethemes' ),
							 "desc" => __( 'Change the site title typography. ( Only if Text Title is enabled )', 'nicethemes' ),
							 "id" => $prefix . "_font_site_title",
							 "std" => array( 'size' => '30', 'family' => 'Bree Serif', 'style' => '','color' => '#333333'),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Sidebar Position', 'nicethemes' ),
							 "desc" => __( 'Select if you want to show the full content or the excerpt on posts.', 'nicethemes' ),
							 "id" => $prefix . "_sidebar_position",
							 "type" => "select",
							 "std" => "right",
							 "tip" => "",
							 "options" => array( "right" => __( 'Sidebar on right side', 'nicethemes' ), "left" => __( 'Sidebar on left side', 'nicethemes' ) ) );

	$nice_options[] = array( "name" => __( 'Allow comments on pages', 'nicethemes'),
							 "desc" => __( 'Checking this option you\'ll enable comments on pages.' , 'nicethemes'),
							 "id" => $prefix . "_page_comments",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Display Menu Category as the Menu Grid Template', 'nicethemes'),
							 "desc" => __( 'Display the Food Menu Category template like the "Menu Grid" page template.' , 'nicethemes' ),
							 "id" => $prefix . "_taxonomy_menu_grid",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( "Display Feedback Above Footer", 'nicethemes' ),
							 "desc" => __( "This will enable a feedback section above the footer.", 'nicethemes' ),
							 "id" => $prefix . "_feedback_footer",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( "Post Author Box", 'nicethemes' ),
							 "desc" => __( "This will enable the post author box on the single posts page. Edit description in Users > Your Profile.", 'nicethemes' ),
							 "id" => $prefix . "_post_author",
							 "std" => "true",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( "Tracking Code", 'nicethemes' ),
							 "desc" => __( "Insert the code if you have one. Google analytics, etc.", 'nicethemes' ),
							 "id" => $prefix . "_tracking_code",
							 "std" => "",
							 "tip" => "",
							 "type" => "textarea" );

	/* Styles */
	$nice_options[] = array( "name" => __( 'Design & Styles', 'nicethemes' ),
							 "type" => "heading" );


	$nice_options[] = array( "name" => __( "Accent Color", 'nicethemes' ),
							 "desc" => __( "", 'nicethemes' ),
							 "id" => $prefix . "_accent_color",
							 "std" => "#F55D2D",
							 "tip" => "",
							 "type" => "color" );


	$nice_options[] = array( "name" => __( "Custom CSS", 'nicethemes' ),
							 "desc" => __( "Quickly add some CSS to your theme by adding it to this block.", 'nicethemes' ),
							 "id" => $prefix . "_custom_css",
							 "std" => "",
							 "tip" => "",
							 "type" => "textarea" );

	$nice_options[] = array( "name" => __( 'Menu Order', 'nicethemes' ),
							 "desc" 	=> __( 'Select the view order you wish to set for the main navigation. (This will work when you don\'t setup a WordPress menu.)', 'nicethemes' ),
							 "id" 		=> $prefix . "_menu_order",
							 "std"		=> "ID",
							 "type" 	=> "select",
							 "tip" => "",
							 "options" 	=> array( 'post_title' => __( 'Post Title', 'nicethemes') , 'menu_order' => __( 'Menu Order', 'nicethemes'), 'ID' => __( 'Post/Page ID', 'nicethemes') ));


		/* Typography */
	$nice_options[] = array( "name" => __( 'Typography', 'nicethemes' ),
							 "type" => "heading",
							 "desc" => "This is the description" );

	$nice_options[] = array( "name" => __( 'Enable Custom Typography', 'nicethemes' ),
							 "desc" => __( "Enable if you want to pick your fonts.", 'nicethemes' ),
							 "id" => $prefix . "_custom_typography",
							 "std" => "false",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'General Typography', 'nicethemes' ) ,
							 "desc" => __( 'Change the general font.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_body",
							 "std" => array( 'size' => '13', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#333333' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Navigation', 'nicethemes' ) ,
							 "desc" => __( 'Change the navigation font.', 'nicethemes' ),
							 "id" => $prefix . "_font_nav",
							 "std" => array( 'size' => '15', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#333333' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Sub Navigation (Submenus)', 'nicethemes' ) ,
							 "desc" => __( 'Change the navigation submenu font.', 'nicethemes' ),
							 "id" => $prefix . "_font_subnav",
							 "std" => array( 'size' => '13', 'unit' => 'px', 'family' => 'Gudea', 'style' => '', 'color' => '#FFFFFF' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Post Title', 'nicethemes' ) ,
							 "desc" => __( 'Change the post title.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_post_title",
							 "std" => array( 'size' => '24', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#333333' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Post Meta', 'nicethemes' ),
							 "desc" => __( 'Change the post meta.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_post_meta",
							 "std" => array( 'size' => '13', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#BBBBBB' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Post Entry', 'nicethemes' ) ,
							 "desc" => __( 'Change the post entry.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_post_entry",
							 "std" => array( 'size' => '14', 'unit' => 'px', 'family' => 'Gudea', 'style' => '', 'color' => '#333333' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Infoboxes Title', 'nicethemes' ) ,
							 "desc" => __( 'Change the infoboxes font.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_infobox_title",
							 "std" => array( 'size' => '18', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#333333' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Infoboxes & Menu Content', 'nicethemes' ) ,
							 "desc" => __( 'Change the infoboxes font.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_infobox_content",
							 "std" => array( 'size' => '15', 'unit' => 'px', 'family' => 'Gudea', 'style' => '', 'color' => '#656565' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Slider Title', 'nicethemes' ) ,
							 "desc" => __( 'Change the post title.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_slider_title",
							 "std" => array( 'size' => '36', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#FFFFFF' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Slider Content', 'nicethemes' ) ,
							 "desc" => __( 'Change the slider content.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_slider_content",
							 "std" => array( 'size' => '15', 'unit' => 'px', 'family' => 'Gudea', 'style' => '', 'color' => '#EEEEEE' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Sidebar Widget Titles', 'nicethemes' ) ,
							 "desc" => __( 'Change the sidebar widget titles.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_widget_titles",
							 "std" => array( 'size' => '21', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#333333' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Footer Widget Titles', 'nicethemes' ) ,
							 "desc" => __( 'Change the footer widget titles.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_footer_widget_titles",
							 "std" => array( 'size' => '18', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#FEFEFE' ),
							 "type" => "typography" );

	$nice_options[] = array( "name" => __( 'Footer Widget Content', 'nicethemes' ) ,
							 "desc" => __( 'Change the footer widget content.', 'nicethemes' ) ,
							 "id" => $prefix . "_font_footer_widget_content",
							 "std" => array( 'size' => '13', 'unit' => 'px', 'family' => 'Bree Serif', 'style' => '', 'color' => '#C9C9C9' ),
							 "type" => "typography" );


	/* Home Options */

	$nice_options[] = array( "name" => __( 'Home Options', 'nicethemes' ),
							 "type" => "heading" );

	$nice_options[] = array( "name" => __( 'Enable Info Boxes', 'nicethemes' ),
							 "desc" => __( 'This will enable the info boxes to be shown in the home page.', 'nicethemes' ),
							 "id" => $prefix . "_infobox_enable",
							 "std" => "true",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Info Boxes Order', 'nicethemes' ),
							 "desc" 	=> __( 'Select the view order you wish to set for the info boxes items on the home page.', 'nicethemes' ),
							 "id" 		=> $prefix . "_infobox_order",
							 "std"		=> "date",
							 "type" 	=> "select",
							 "tip" => "",
							 "options" 	=> array( 'date' => 'Date', 'menu_order' => 'Page Order', 'title' => 'Title', 'rand' => 'Random' ));

	/* Home Slider */

	$nice_options[] = array( "name" => __( 'Slider Options', 'nicethemes' ),
							 "type" => "heading" );

	$nice_options[] = array( "name" => __( 'Enable Slider', 'nicethemes' ),
							 "desc" => __( 'Enable the slider on the homepage.', 'nicethemes' ),
							 "id" => $prefix . "_slider",
							 "std" => "true",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Slider Entries', 'nicethemes' ),
							 "desc" => __( 'Select the number of entries that should appear in the home page slider.', 'nicethemes' ),
							 "id" => $prefix . "_slider_entries",
							 "std" => "3",
							 "type" => "select",
							 "tip" => "",
							 "options" => array(0=>__( 'Select the number from this list', 'nicethemes' ),1=>1,2=>2,3=>3,
												4=>4,5=>5,6=>6,7=>7,
												8=>8,9=>9,10=>10,11=>11,
												12=>12,13=>13,14=>14,15=>15,
												16=>16,17=>17,18=>18,19=>19
												));

	$nice_options[] = array( "name" => __( 'Effect', 'nicethemes' ),
							 "desc" => __( 'Select the animation effect.', 'nicethemes' ),
							 "id" => $prefix . "_slider_animation",
							 "type" => "select",
							 "std" => 'fade',
							 "tip" => "",
							 "options" => array( "slide" => __( 'Slide', 'nicethemes' ), "fade" => __( 'Fade', 'nicethemes' ) ) );

	$nice_options[] = array( "name" => __( 'Reverse Order', 'nicethemes' ),
							 "desc" => __( 'Reverse the animation direction.', 'nicethemes' ),
							 "id" => $prefix . "_slider_reverse",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Hover Pause', 'nicethemes' ),
							 "desc" => __( 'Hovering over slideshow will pause it.', 'nicethemes' ),
							 "id" => $prefix . "_slider_pause_on_hover",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Randomize', 'nicethemes' ),
							 "desc" => __( 'Select to randomize slides.', 'nicethemes' ),
							 "id" => $prefix . "_slider_randomize",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Animation loop', 'nicethemes' ),
							 "desc" => __( 'Should the animation loop?', 'nicethemes' ),
							 "id" => $prefix . "_slider_animation_loop",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Animation Speed', 'nicethemes' ),
							 "desc" => __( 'The time in <b>miliseconds</b> the animation between frames will take.', 'nicethemes' ),
							 "id" => $prefix . "_slider_animation_speed",
							 "std" => "600",
							 "tip" => "",
							 "type" => "text" );

	$nice_options[] = array( "name" => __( 'Auto Start', 'nicethemes' ),
							 "desc" => __( 'Set the slider to start sliding automatically.', 'nicethemes' ),
							 "id" => $prefix . "_slider_slideshow",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Auto Slide Interval', 'nicethemes' ),
							 "desc" => __( 'The time in <b>milliseconds</b> each slide pauses for, before sliding to the next.', 'nicethemes' ),
							 "id" => $prefix . "_slider_slideshow_speed",
							 "std" => "7000",
							 "tip" => "",
							 "type" => "text" );

	$nice_options[] = array( "name" => __( 'Enable Slider Pagination Bar', 'nicethemes' ),
							 "desc" => __( 'Check this option to enable the pagination bar.', 'nicethemes' ),
							 "id" => $prefix . "_slider_control_nav",
							 "std" => "false",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Previous/Next Navigation', 'nicethemes' ),
							 "desc" => __( 'Check this option to enable navigation for previous/next.', 'nicethemes' ),
							 "id" => $prefix . "_slider_direction_nav",
							 "std" => "true",
							 "tip" => "",
							 "type" => "checkbox" );

	$nice_options[] = array( "name" => __( 'Display Caption', 'nicethemes' ),
							 "desc" => __( 'Check this option to display the caption and content for each slide.', 'nicethemes' ),
							 "id" => $prefix . "_slider_caption",
							 "std" => "true",
							 "tip" => "",
							 "type" => "checkbox" );


	/* Contact information */
	$nice_options[] = array( "name" => __( 'Contact Information', 'nicethemes' ),
							 "type" => "heading" );

	$nice_options[] = array( "name" => __( 'Contact Form Email Address', 'nicethemes' ),
							 "desc" => __( 'Enter the email address where you\'d like to receive emails from the contact form, or leave blank to use admin email.', 'nicethemes' ),
							 "id" => $prefix . "_email",
							 "std" => "",
							 "tip" => "",
							 "type" => "text" );

	$nice_options[] = array( "name" => __( 'Contact Address', 'nicethemes' ),
							 "desc" => __( 'The physical address for the contact template.', 'nicethemes' ),
							 "id" => $prefix . "_address",
							 "std" => "",
							 "tip" => "",
							 "type" => "textarea" );

	$nice_options[] = array( "name" => __( 'Google Maps Embed Code', 'nicethemes' ),
							 "desc" => __( 'Insert the Google Map embed code for the contact template.', 'nicethemes' ),
							 "id" => $prefix . "_google_map",
							 "std" => "",
							 "tip" => "",
							 "type" => "textarea" );

	/* Business information */
	$nice_options[] = array( "name" => __( 'Business Setup', 'nicethemes' ),
							 "type" => "heading" );

	$nice_options[] = array( "name" => __( 'Currency Symbol', 'nicethemes' ),
							 "desc" => __( 'Specify the currency that your menu prices will be shown in.', 'nicethemes' ),
							 "id" => $prefix . "_currency_symbol",
							 "std" => "$",
							 "tip" => "",
							 "type" => "text" );

	$nice_options[] = array( "name" => __( 'Phone Number', 'nicethemes' ),
							 "desc" => __( '', 'nicethemes' ),
							 "id" => $prefix . "_phone_number",
							 "std" => "",
							 "tip" => "",
							 "type" => "text" );

	$nice_options[] = array( "name" => __( 'Hours Format', 'nicethemes' ),
							 "desc" => __( 'The format in which the business hours will be displayed. Default is "h:i A". To customise this field you must understand php\'s <a href="http://php.net/manual/en/function.date.php" target="_blank">date() formatting</a>.', 'nicethemes' ),
							 "id" => $prefix . "_hours_format",
							 "std" => "h:i A",
							 "tip" => "",
							 "type" => "text" );

	$nice_options[] = array( "name" => __( 'Monday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Monday.', 'nicethemes' ),
							 "id" => $prefix . "_monday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes') , '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	$nice_options[] = array( "name" => __( 'Tuesday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Tuesday.', 'nicethemes' ),
							 "id" => $prefix . "_tuesday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes') , '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	$nice_options[] = array( "name" => __( 'Wednesday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Wednesday.', 'nicethemes' ),
							 "id" => $prefix . "_wednesday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes') , '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	$nice_options[] = array( "name" => __( 'Thursday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Thursday.', 'nicethemes' ),
							 "id" => $prefix . "_thursday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes') , '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	$nice_options[] = array( "name" => __( 'Friday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Friday.', 'nicethemes' ),
							 "id" => $prefix . "_friday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes') , '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	$nice_options[] = array( "name" => __( 'Saturday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Saturday.', 'nicethemes' ),
							 "id" => $prefix . "_saturday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes'), '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	$nice_options[] = array( "name" => __( 'Sunday Business Hours', 'nicethemes' ),
							 "desc" => __( 'Use <strong>CTRL+Click (Windows)</strong> or <strong>CMD+Click (Mac)</strong> to select the times for which your business is open on a Sunday.', 'nicethemes' ),
							 "id" => $prefix . "_sunday_hours",
							 "std" => "0",
							 "tip" => "",
							 "type" => "select_multiple",
							 "options" => array( 0 => __( 'Closed', 'nicethemes'), '01:00' => '01:00', '01:30' => '01:30',
							 					 '02:00' => '02:00', '02:30' => '02:30', '03:00' => '03:00', '03:30' => '03:30', '04:00' => '04:00', '04:30' => '04:30',
							 					 '05:00' => '05:00', '05:30' => '05:30', '06:00' => '06:00', '06:30' => '06:30', '07:00' => '07:00', '07:30' => '07:30',
							 					 '08:00' => '08:00', '08:30' => '08:30', '09:00' => '09:00', '09:30' => '09:30', '10:00' => '10:00', '10:30' => '10:30',
							 					 '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:00', '13:30' => '13:30',
							 					 '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30',
							 					 '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30',
							 					 '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30',
							 					 '23:00' => '23:00', '23:30' => '23:30', '24:00' => '24:00', '24:30' => '24:30' )
							);

	/* Social Media */
	$nice_options[] = array( "name" => __( 'Social Media', 'nicethemes' ),
							 "type" => "heading" );

	$nice_options[] = array( "name" => __('Facebook URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_facebook_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Twitter URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_twitter_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Google+ URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_google_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Dribbble URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_dribbble_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Vimeo URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_vimeo_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Forrst URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_forrst_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Last.fm URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_lastfm_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Tumblr URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_tumblr_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Flickr URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_flickr_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Youtube URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_youtube_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Blogger URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_blogger_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	$nice_options[] = array( "name" => __('Linkedin URL', 'nicethemes' ),
							 "desc" => __('', 'nicethemes' ),
							 "id" => $prefix . "_linkedin_url",
							 "std" => "",
							 "tip" => "",
							 "type" => "text");

	if ( get_option( 'nice_template' ) != $nice_options) update_option( 'nice_template', $nice_options );

}
?>