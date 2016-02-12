
jQuery(document).ready(function() {

	jQuery('.upload_button').click(function() {
	 formfield = jQuery(this).prev( 'input').attr( 'name' );
	 postID = jQuery(this).attr( 'rel' );
	 nicetitle = jQuery(this).parents( '.section').find( '.heading').text();
	 tb_show(nicetitle, 'media-upload.php?post_id='+postID+'&amp;TB_iframe=true');
	 return false;
	});
	
	window.original_send_to_editor = window.send_to_editor;
	
	window.send_to_editor = function(html) {

		if (formfield){
			imgurl = jQuery('img',html).attr('src');

			jQuery('#' + formfield).val(imgurl);
			
			itemurl = jQuery(html).html(html).find( 'img').attr( 'src' );
			
			btnContent = '<img src="'+imgurl+'" alt="" /><a href="#" class="mlu_remove">Remove Image</a>';
			
			jQuery( '#' + formfield).siblings( '.screenshot').slideDown().html(btnContent);
			
			tb_remove();
			
		}else{
			
			window.original_send_to_editor(html);	
		
		}
	 
	}
	     
    jQuery( '.mlu_remove').live( 'click', function(event) { 
        jQuery(this).hide();
        jQuery(this).parents().parents().children( '.nice-upload').attr( 'value', '' );
        jQuery(this).parents( '.screenshot').slideUp();
        
        return false;
    });
      
});