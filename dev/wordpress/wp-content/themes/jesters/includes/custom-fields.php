<?php

// add action nice_fields()
add_action('admin_head','nice_fields');


/**
 * nice_fields()
 *
 * Load array with custom fields depending on post type,
 * save the array into wp options.
 *
 * @since 1.0.0
 *
 */

function nice_fields()
{

	$nice_fields = array();

	global $post;

	if ( get_post_type() == 'page' || !get_post_type() ) {

		$nice_fields[] = array( 	"name" => "page-info",
									"label" => __( "Page Information", 'nicethemes' ),
									"type" => "info",
									"desc" => __( '<p>You can select the page template from the "Template" dropdown on the "Page Attributes" box.</p><p>If you are using the "Gallery Template" plase be sure to upload images from the "Add Media" button at the top of this page. (Don\'t insert the gallery in the page content, just add the images).</p>','nicethemes'));


	}

	/* Slides */
	if ( get_post_type() == 'slide' || !get_post_type() ) {

		$nice_fields[] = array( 	"name" => "slide-info",
									"label" => "Slide Image",
									"type" => "info",
									"desc" => __("Slides use the wordpress featured image as the slide image. Don't know what featured images are? How to use them? <a href='http://en.support.wordpress.com/featured-images/#setting-a-featured-image'>Take a look at wordpress docs on Featured Images</a>.",'nicethemes'));

		$nice_fields[] = array( 	"name" => "slide-description",
									"label" => "Slide Description",
									"std" => "",
									"type" => "textarea",
									"desc" => "Enter slide description here to be displayed in the slide navigation bar.");

		$nice_fields[] = array (  	"name"  => "embed",
									"std"  => "",
									"label" => "Video Embed Code",
									"type" => "textarea",
									"desc" => "Enter the video embed code for your video (YouTube, Vimeo or similar). Will show instead of your image.");

	} // end slide


	/* Post */
	if ( get_post_type() == 'post' || !get_post_type() ) {


		$nice_fields[] = array (  	"name"  => "embed",
									"std"  => "",
									"label" => "Video Embed Code",
									"type" => "textarea",
									"desc" => "Enter the video embed code for your video (YouTube, Vimeo or similar).");

	} // end post


	/* Feedback */
	if ( get_post_type() == 'feedback' || !get_post_type() ) {

		$nice_fields[] = array( 	"name" => "feedback-item-info",
									"label" => "Feedback Image",
									"type" => "info",
									"desc" => __("Feedback Items use the wordpress featured image as the feedback image. Don't know what featured images are? How to use them? <a href='http://en.support.wordpress.com/featured-images/#setting-a-featured-image'>Take a look at wordpress docs on Featured Images</a>.",'nicethemes'));

		$nice_fields['feedback_author'] = array (
								"name" => "feedback_author",
								"label" => __( 'Feedback Author', 'nicethemes' ),
								"type" => "text",
								"desc" => __( 'The name of the author of the feedback (e.g. John Doe)', 'nicethemes' )
			);

		$nice_fields['feedback_url'] = array (
								"name" => "feedback_url",
								"label" => __( 'Feedback URL', 'nicethemes' ),
								"type" => "text",
								"desc" => __( 'The URL to the feedback author e.g. http://www.johndoe.com - (optional)', 'nicethemes' )
			);
	} // end feedback


	/* Infoboxes */
	if ( get_post_type() == 'infobox' || !get_post_type() ) {

		$nice_fields[] = array( 	"name" => "infobox-item-info",
									"label" => "Info Box Image",
									"type" => "info",
									"desc" => __("Info Boxes Items use the wordpress featured image as the feedback image. Don't know what featured images are? How to use them? <a href='http://en.support.wordpress.com/featured-images/#setting-a-featured-image'>Take a look at wordpress docs on Featured Images</a>.",'nicethemes')
			);

		$nice_fields[] = array (
								"name" => "infobox_readmore",
								"std" => "",
								"label" => __( '"Read more" URL', 'nicethemes' ),
								"type" => "text",
								"desc" => __( 'Add an URL for your Read More button in your Info Box on homepage (optional)', 'nicethemes' )
			);

		$nice_fields[] = array (
								"name" => "infobox_readmore_text",
								"std" => "",
								"label" => __( '"Read more" Text', 'nicethemes' ),
								"type" => "text",
								"desc" => __( 'Add the anchor text for the "Read More" link.', 'nicethemes' )
			);

	} // end infobox


	/* Menu Items */
	if ( get_post_type() == 'menu' || !get_post_type() ) {

		$nice_fields[] = array( 	"name" => "menu-item-info",
									"label" => "Image",
									"type" => "info",
									"desc" => __("Menu Items use the wordpress featured image as the item image. Don't know what featured images are? How to use them? <a href='http://en.support.wordpress.com/featured-images/#setting-a-featured-image'>Take a look at wordpress docs on Featured Images</a>.",'nicethemes'));

		$nice_fields['drink'] = array (
								"name" => "drink",
								"label" => __( 'Drink or non food item', 'nicethemes' ),
								"type" => "checkbox",
								"desc" => __( 'This item is not a food item - Checking this option will hide the Gluten Free & Calories options from the template.', 'nicethemes' ) );

		$nice_fields['price'] = array (
								"name" => "price",
								"label" => __( 'Price', 'nicethemes' ),
								"type" => "text",
								"desc" => __( 'Don\'t include the currency symbol, just the price in numbers. (i.e.: 4.00)', 'nicethemes' ) );

		$nice_fields['calories'] = array (
								"name" => "calories",
								"label" => __( 'Calories', 'nicethemes' ),
								"type" => "text",
								"desc" => __( 'Calories per serving.', 'nicethemes' ) );

		$nice_fields['glutenfree'] = array (
								"name" => "glutenfree",
								"label" => __( 'Gluten-free', 'nicethemes' ),
								"type" => "checkbox",
								"desc" => __( '', 'nicethemes' ) );

		$nice_fields['vegetarian'] = array (
								"name" => "vegetarian",
								"label" => __( 'Vegetarian', 'nicethemes' ),
								"type" => "checkbox",
								"desc" => __( '', 'nicethemes' ) );

		$nice_fields['spiciness'] = array (
								"name" => "spiciness",
								"label" => __( 'Spiciness scale', 'nicethemes' ),
								"type" => "select",
								"desc" => __( 'From 1 to 5. Pick a value for spicy foods.', 'nicethemes' ),
								"options" => array ( 0=>__( 'Select the number from this list', 'nicethemes' ),1=>1 ,2=>2 ,3=>3 ,
												4=>4,5=>5 )
								);

		$nice_fields['display_image_menu'] = array (
								"name" => "display_image_menu",
								"label" => __( 'Display thumbnail in Menu Template', 'nicethemes' ),
								"type" => "checkbox",
								"desc" => __( '', 'nicethemes' ) );

		$nice_fields['display_image_menu_list'] = array (
								"name" => "display_image_menu_list",
								"label" => __( 'Display thumbnail in Menu Template (List)', 'nicethemes' ),
								"type" => "checkbox",
								"desc" => __( '', 'nicethemes' ) );

	} // End Menu


	if ( get_option(' nice_custom_fields' ) != $nice_fields ) update_option( 'nice_custom_fields', $nice_fields );

}


?>