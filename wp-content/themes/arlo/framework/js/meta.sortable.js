jQuery(document).ready(function(){ 
	"use strict";
	
	
	// SOME META BOX FIXES
	var field = jQuery('.rwmb-meta-box .rwmb-field');
	
	field.each(function(){
		var item 	= jQuery(this);
		var uid		= item.find('.rwmb-label label').attr('for');
		item.addClass(uid);
	});
	
	
	
	// PAGE TEMPLATE SELECT
	jQuery('#pageparentdiv #page_template').on('change', function(){
		
		
		
		var selected_option 				= jQuery(this).children("option:selected").val();
		
		// We don't need sidebar options here
		if(selected_option === 'default' || selected_option === 'page-blog.php'){
			jQuery('.arlo_fn_page_style').slideDown(200);
			jQuery('.arlo_fn_page_sidebar').slideDown(200);
			
		}else{
			jQuery('.arlo_fn_page_style').slideUp(200);
			jQuery('.arlo_fn_page_sidebar').delay(100).slideUp(200);
		}

	});
	jQuery("#pageparentdiv #page_template").triggerHandler("change");
	
	
	
	// RTANSFER SIDEBAR SELECT OPTIONS
	var sidebaroptions = jQuery('.sbg_container select[name="sidebar_generator_replacement[0]"]').html();
	jQuery('select#arlo_fn_page_sidebar').html(sidebaroptions);
	jQuery('select#arlo_fn_page_sidebar').on('change', function(){
		var changed = jQuery(this).children('option:selected').val();
		jQuery('.sbg_container select[name="sidebar_generator_replacement[0]"] option[value="'+changed+'"]').attr('selected', 'selected');
	});
	jQuery('select#arlo_fn_page_sidebar').triggerHandler("change");
	
	
	fn_page_footer();
	fn_blogpostformats();
	
});

function fn_page_footer(){
	"use strict";
	
	var page_footer_select = jQuery('select#arlo_fn_page_footer_switch');
	page_footer_select.on('change', function(){
		var chosed 				= jQuery(this).children('option:selected').val();
		var allFooterSwitchers 	= jQuery('.arlo_fn_page_footer_notice_switch, .arlo_fn_page_footer_widget_switch, .arlo_fn_page_footer_copyright_switch');
		
		allFooterSwitchers.slideDown();
		if(chosed === 'enable'){
			allFooterSwitchers.slideDown();
		}
		else{
			allFooterSwitchers.slideUp();
		}
	});
	jQuery('select#arlo_fn_page_footer_switch').triggerHandler("change");
	
}

function fn_blogpostformats(){
	"use strict";
	jQuery('#post-formats-select input').change(checkFormat);
	
	function checkFormat(){
		var format = jQuery('#post-formats-select input:checked').attr('value');
		
		//only run on the posts page
		if(typeof format !== 'undefined'){
			
			jQuery('#post-body div[id^=frenify-meta-post-]').hide();
			jQuery('#post-body #frenify-meta-post-'+format+'').stop(true,true).fadeIn(500);
					
		}
	}
	checkFormat();
}