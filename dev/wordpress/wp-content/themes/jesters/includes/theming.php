<?php
/**
 * 	Table of Contents
 *
 *	- nice_custom_styling()
 *  - nice_custom_fonts()
 *
 */

/*-----------------------------------------------------------------------------------*/
/* Add Custom Styling to HEAD */
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_head', 'nice_custom_styling', 8 );

if ( ! function_exists( 'nice_custom_styling' ) ) {

	function nice_custom_styling() {

		global $nice_options;

		$output = '';

		if ( $nice_options['nice_accent_color'] ) {

			$output .= '#wrapper, .infobox .entry-title{ border-top-color: ' . $nice_options['nice_accent_color']. '; }' . "\n";
			$output .= '.entry blockquote{ border-left-color:' . $nice_options['nice_accent_color']. '; }' . "\n";
			$output .= '.flex-caption p a { border-bottom-color:' . $nice_options['nice_accent_color']. '; }' . "\n";
			$output .= 'a, span.required, #footer .testimonials .feedback .feedback-url, .menu-box li .title a:hover, .wp-pagenavi span.current, #extended-footer a:hover, .nice-contact-form #node { color: ' . $nice_options['nice_accent_color']. '; }' . "\n";
			$output .= '#navigation .nav > li:hover a, #navigation .nav > li.current_page_item a,  #navigation .nav > li.current-menu-item a, #navigation .nav > li.sfHover{ color: ' . $nice_options['nice_accent_color']. ' !important; }' . "\n";

			$output .= '.infobox .entry-excerpt a.read-more, .nav li ul, .menu-box .featured-image a, .nice-contact-form input[type="submit"]:hover,
#commentform .button:hover, #respond input[type="submit"]:hover , #tabs .inside .tags a:hover, ul.four-col-grid .thumb a, .infobox .thumb a, .single .featured-image a, .post .featured-image a{ background-color: ' . $nice_options['nice_accent_color']. '; }' . "\n";

		}


		if ( nice_bool( $nice_options['nice_taxonomy_menu_grid'] ) ){

			$output .= 'body.tax-menu-category .menu-box  { width: 45% !important; margin: 0 50px 15px 0; }' . "\n";
			$output .= 'body.tax-menu-category .menu-card { width: 1000px; }' . "\n";

		}

		if ( isset( $output ) && $output != '' ) {
			$output = strip_tags( $output );
			$output = "<!-- Nice Custom Styling -->\n<style type=\"text/css\">\n" . $output .  "</style>\n";
			echo $output;
		}

	}
}


add_action( 'wp_head', 'nice_custom_fonts', 20 );

/*
*/

if ( ! function_exists( 'nice_custom_fonts' ) ) {

	function nice_custom_fonts() {

		global $nice_options;

		$output = '';

		if ( isset( $nice_options['nice_custom_typography'] ) && ( nice_bool( $nice_options['nice_custom_typography'] ) ) ) {

			if ( isset( $nice_options['nice_font_body'] ) && $nice_options['nice_font_body'] )
				$output .= 'body { ' . nice_custom_font_css( $nice_options['nice_font_body'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_nav'] ) && $nice_options['nice_font_nav'] )
				$output .= '#navigation .nav li a { ' . nice_custom_font_css( $nice_options['nice_font_nav'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_subnav'] ) && $nice_options['nice_font_subnav'] )
				$output .= '#top #navigation .nav li ul li a { ' . nice_custom_font_css( $nice_options['nice_font_subnav'] ) . ' }' . "\n";

			// from now onwards
			if ( isset( $nice_options['nice_font_post_title'] ) && $nice_options['nice_font_post_title'] )
				$output .= '.post h2 { ' . nice_custom_font_css( $nice_options['nice_font_post_title'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_post_meta'] ) && $nice_options['nice_font_post_meta'] )
				$output .= '.post-meta { ' . nice_custom_font_css( $nice_options['nice_font_post_meta'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_post_entry'] ) && $nice_options['nice_font_post_entry'] )
				$output .= '.entry { ' . nice_custom_font_css( $nice_options['nice_font_post_entry'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_infobox_title'] ) && $nice_options['nice_font_infobox_title'] )
				$output .= '.infobox .entry-title { ' . nice_custom_font_css( $nice_options['nice_font_infobox_title'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_infobox_content'] ) && $nice_options['nice_font_infobox_content'] )
				$output .= '.infobox .entry-excerpt, .menu-box li .description, .menu-box p { ' . nice_custom_font_css( $nice_options['nice_font_infobox_content'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_slider_title'] ) && $nice_options['nice_font_slider_title'] )
				$output .= '.flexslider .slides li h2 {' . nice_custom_font_css( $nice_options['nice_font_slider_title'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_slider_content'] ) && $nice_options['nice_font_slider_content'] )
				$output .= '.flex-caption p { ' . nice_custom_font_css( $nice_options['nice_font_slider_content'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_widget_titles'] ) && $nice_options['nice_font_widget_titles'] )
				$output .= '#sidebar .widget h3 { ' . nice_custom_font_css( $nice_options['nice_font_widget_titles'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_footer_widget_titles'] ) && $nice_options['nice_font_footer_widget_titles'] )
				$output .= '#footer-widgets h3 { ' . nice_custom_font_css( $nice_options['nice_font_footer_widget_titles'] ) . ' }' . "\n";

			if ( isset( $nice_options['nice_font_footer_widget_content'] ) && $nice_options['nice_font_footer_widget_content'] )
				$output .= '#footer-widgets .widget { ' . nice_custom_font_css( $nice_options['nice_font_footer_widget_content'] ) . ' }' . "\n";


		}

		// Add Text title and tagline if text title option is enabled
		if ( isset( $nice_options['nice_texttitle'] ) && ( nice_bool( $nice_options['nice_texttitle'] ) ) ) {

			if ( $nice_options['nice_font_site_title'] ){

				$output .= '#header #top #logo a .text-logo { '. nice_custom_font_css( $nice_options['nice_font_site_title'] ).' }' . "\n";

			}
		}

		if ( isset( $output ) && $output != '' ) {
			$output = strip_tags( $output );
			$output = "<!-- Nice Custom Fonts -->\n<style type=\"text/css\">\n" . $output .  "</style>\n";
			echo $output;
		}

	}

} // endif;


add_action( 'wp_head', 'nice_load_web_fonts', 15 );

if ( ! function_exists( 'nice_load_web_fonts' ) ) {

	function nice_load_web_fonts() {

		global $google_fonts;
		$fonts = '';
		$html = '';

		global $nice_options;

		// Go through the options
		if ( !empty( $nice_options ) ) {

			foreach ( $nice_options as $option ) :

				if ( is_array( $option ) && isset( $option['family'] ) ) {

					foreach ( $google_fonts as $font ) :

						if ( $option['family'] == $font['name'] && !strstr( $fonts, $font['name'] ) ) {

							$fonts .= $font['name'] . $font['variant'] . "|";

						}

					endforeach;
				}

			endforeach;

			// Output google font css in header
			if ( $fonts ) {

				$fonts = str_replace( " ", "+", $fonts );
				$html .= "\n\n<!-- Nice Google fonts -->\n";
				$html .= '<link href="http'. ( is_ssl() ? 's' : '' ) .'://fonts.googleapis.com/css?family=' . $fonts .'" rel="stylesheet" type="text/css" />'."\n";
				$html = str_replace( '|"', '"', $html);

				echo $html . "\n\n";

			} else {
				// fix for updated themes where no typography options were saved
				?>

					<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
					<link href='http://fonts.googleapis.com/css?family=Gudea:400,700,400italic' rel='stylesheet' type='text/css'>

				<?php

			}
		}
	} // End nice_custom_fonts()
}

?>