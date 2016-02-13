jQuery(document).ready(function($){

	jQuery("<select />").appendTo(".responsive-nav");
	jQuery("<option />", {
	"selected": "selected",
	"value" : "",
	"text" : "Go to..."
	}).appendTo(".responsive-nav select");
	// Populate dropdown with menu items
	jQuery("nav li").each(function() {
		var depth = jQuery(this).parents('ul').length - 1;
		var indent = '';
		if( depth > 0 ) { indent = ' - '; }
		if( depth > 1 ) { indent = ' - - '; }
		if( depth > 2 ) { indent = ' - - -'; }
		if( depth > 3 ) { indent = ' - - - -'; }
		var el = jQuery(this).children('a');
		jQuery("<option />", {
			"value" : el.attr("href"),
			"text" : (indent+el.text())
		}).appendTo("nav select");
	});
	jQuery("nav select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});

	// menu fix (child center alignment)
	jQuery("#navigation ul.nav > li").each( function()
	{
	    if( jQuery(this).find("ul:first").length > 0 )
	    {
	        var parent_width = jQuery(this).outerWidth( true );
	        var child_width = jQuery(this).find("ul:first").outerWidth( true );
	        var new_width = parseInt( (child_width - parent_width ) / 2 );
	        jQuery(this).find("ul:first").css( 'margin-left', -( new_width + 25 ) + "px");
	    }
	});

	if( jQuery.browser.msie || jQuery.browser.mozilla ){ Screen = jQuery("html"); }
	else { Screen = jQuery("body"); }

	if (jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').length == 0 ){}
	else{
		jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').localScroll();

		var sidebar_offset = jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').offset().top;
		var sidebar_height = jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').height();
		var footer_height = jQuery('#footer').height();
		var window_height = jQuery(window).height();
		var document_height = jQuery(document).height();

		jQuery(window).scroll( function() {

			if( (jQuery(document).scrollTop() > sidebar_offset ) && ( ( Screen.scrollTop() + sidebar_height )  < ( document_height - footer_height  ) ) ){
				jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').css({ position: 'fixed', top: 0 });

			}else if( Screen.scrollTop() && ( (Screen.scrollTop() + sidebar_height ) > ( document_height - footer_height ) ) ){
					jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').css({position: 'absolute', top: document_height - ( footer_height + sidebar_height )});
			}
			else{
				jQuery('body.page-template-template-menu-list-php #sidebar, body.tax-menu-category #sidebar').css({ position: 'relative', marginTop: 0, top: 0 });
			}

		});

	}



	// fancybox
	jQuery(".fancybox").fancybox();

});