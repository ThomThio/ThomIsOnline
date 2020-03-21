<?php

function arlo_fn_inline_styles() {
	
	global $arlo_fn_option; 
	
	
	
	wp_enqueue_style('arlo_fn_inline', get_template_directory_uri().'/framework/css/inline.css', array(), '1.0', 'all');
	/************************** START styles **************************/
	$arlo_fn_custom_css 		= "";
	
	/* new changes */
	$nav_font_family 			= '';
	$nav_font_size 				= '16px';
	$nav_font_weight 			= '500';
	if(isset($arlo_fn_option['nav_font'])){
		$nav_font_family 		= $arlo_fn_option['nav_font']['font-family'];
		$nav_font_size 			= $arlo_fn_option['nav_font']['font-size'];
		$nav_font_weight 		= $arlo_fn_option['nav_font']['font-weight'];
	}
	$nav_mob_font_family 		= '';
	$nav_mob_font_size 			= '18px';
	$nav_mob_font_weight 		= '400';
	if(isset($arlo_fn_option['nav_mob_font'])){
		$nav_mob_font_family 	= $arlo_fn_option['nav_mob_font']['font-family'];
		$nav_mob_font_size 		= $arlo_fn_option['nav_mob_font']['font-size'];
		$nav_mob_font_weight	= $arlo_fn_option['nav_mob_font']['font-weight'];
	}
	$body_font_family 			= '';
	$body_font_size 			= '14px';
	$body_font_weight 			= '400';
	if(isset($arlo_fn_option['body_font'])){
		$body_font_family 		= $arlo_fn_option['body_font']['font-family'];
		$body_font_size 		= $arlo_fn_option['body_font']['font-size'];
		$body_font_weight 		= $arlo_fn_option['body_font']['font-weight'];
	}
	$input_font_family 			= '';
	$input_font_size 			= '14px';
	$input_font_weight 			= '400';
	if(isset($arlo_fn_option['input_font'])){
		$input_font_family 		= $arlo_fn_option['input_font']['font-family'];
		$input_font_size 		= $arlo_fn_option['input_font']['font-size'];
		$input_font_weight		= $arlo_fn_option['input_font']['font-weight'];
	}
	$heading_font_family 		= '';
	$heading_font_weight 		= '400';
	if(isset($arlo_fn_option['heading_font'])){
		$heading_font_family 	= $arlo_fn_option['heading_font']['font-family'];
		$heading_font_weight 	= $arlo_fn_option['heading_font']['font-weight'];
	}
	$blockquote_font_family 	= '';
	$blockquote_font_size 		= '20px';
	$blockquote_font_weight 	= '400';
	if(isset($arlo_fn_option['blockquote_font'])){
		$blockquote_font_family = $arlo_fn_option['blockquote_font']['font-family'];
		$blockquote_font_size 	= $arlo_fn_option['blockquote_font']['font-size'];
		$blockquote_font_weight = $arlo_fn_option['blockquote_font']['font-weight'];
	}
	$extra_font_family 			= '';
	if(isset($arlo_fn_option['extra_font'])){
		$extra_font_family 		= $arlo_fn_option['extra_font']['font-family'];
	}
	/* new changes */
	
	/************************** font styles **************************/
	$arlo_fn_custom_css .= "
		
		#arlo_fn_fixedsub ul a,
		.arlo_fn_header .menu_nav ul.vert_nav li > a{
			font-family:'{$nav_font_family}', Rubik, Arial, Helvetica, sans-serif; 
			font-size:{$nav_font_size};  
			font-weight:{$nav_font_weight};  
		}
		
		.arlo_fn_mobilemenu_wrap .vert_menu_list a{
			font-family:'{$nav_mob_font_family}', Montserrat, Arial, Helvetica, sans-serif; 
			font-size:{$nav_mob_font_size};  
			font-weight:{$nav_mob_font_weight};  
		}
		
		.fn_cs_counter_with_rating .rating_holder h3.rating_text{
			font-family:'{$body_font_family}', Roboto, Arial, Helvetica, sans-serif;
		}
		body{
			font-family:'{$body_font_family}', Roboto, Arial, Helvetica, sans-serif; 
			font-size:{$body_font_size};  
			font-weight:{$body_font_weight};  
		}
		
		.woocommerce .quantity .qty, .uneditable-input, input[type=number], input[type=email], input[type=url], input[type=search], input[type=tel], input[type=color], input[type=text], input[type=password], input[type=datetime], input[type=datetime-local], input[type=date], input[type=month], input[type=time], input[type=week], input, button, select, textarea{
			font-family: '{$input_font_family}', Roboto, Arial, Helvetica, sans-serif; 
			font-size:{$input_font_size}; 
			font-weight:{$input_font_weight};
		}
		
		
		h1,h2,h3,h4,h5,h6{
			font-family: '{$heading_font_family}', Rubik, Arial, Helvetica, sans-serif;
			font-weight:{$heading_font_weight};
		}
		
		.arlo_fn_header .toll_free .tf_in p,
		.arlo_fn_mobilemenu_wrap .m_toll_free .tf_in p,
		.fn_cs_services_classic span.more_details a,
		.fn_cs_about_with_rating .badge_left .year,
		.fn_cs_about_with_rating .badge_left .text,
		.fn_cs_about_with_rating .bottom_section p,
		.fn_cs_project_sticky_full .left_part a,
		.fn_cs_project_sticky_full .right_part .title_holder p a,
		.service_list_as_function li a,
		ul.arlo_fn_service_list_default .read_more a,
		input[type=button],
		input[type=submit],
		button,
		.fn_cs_introduce .badge_holder span,
		.wid-title span,
		.arlo_fn_widget_estimate .bfwe_inner a,
		.arlo_fn_custom_lang_switcher span.click,
		.fn_cs_main_slider_with_content .control_panel .swiper_pagination > span,
		.fn_cs_button a,
		.fn_cs_principles .right_part .number_holder,
		.fn_cs_project_sticky_modern .left_part a,
		.fn_cs_project_sticky_modern .right_part .title_holder p a{
			font-family: '{$heading_font_family}', Rubik, Arial, Helvetica, sans-serif;
		}
		blockquote{
			font-family: '{$blockquote_font_family}', Lora, Arial, Helvetica, sans-serif; 
			font-size:{$blockquote_font_size}; 
			font-weight:{$blockquote_font_weight};
		}
		
		.fn_cs_counter_with_rating .rating_holder h3.rating_number,
		.arlo_fn_widget_brochure .text,
		ul.arlo_fn_archive_list .read_more a,
		.arlo_fn_portfolio_category_filter ul a,
		ul.ajax_pagination a,
		ul.arlo_fn_portfolio_list .title_holder p,
		a.arlo_fn_totop .text,
		.arlo_fn_searchpagelist_item a.read_more,
		.service_single .other_services .read_more a{
			font-family: '{$extra_font_family}', Montserrat, Arial, Helvetica, sans-serif;
		}
		
		";
		
		
		// PRIMARY COLOR
		$primary_color = '#316397';
		if(isset($arlo_fn_option['primary_color'])){
			$primary_color = $arlo_fn_option['primary_color'];
		}
		if(isset($_GET['primary_color'])){$primary_color = $_GET['primary_color'];}
		
		$arlo_fn_custom_css .= "
			.arlo_fn_footer .widget_oih_opt_in_widget button:hover{background-color: {$primary_color} !important;}
			table a,
			blockquote a,
			.arlo_fn_blog_single .fn-format-link a:hover,
			.arlo_fn_comment a.comment-reply-link,
			.arlo_fn_share_icons ul li a:hover,
			.arlo_fn_portfolio_details .info_list p,
			.arlo_fn_portfolio_details .info_list span a:hover,
			.arlo_fn_portfolio_details .video_holder .play_text,
			.arlo_fn_portfolio_justified .arlo_fn_share_icons ul li a:hover,
			ul.arlo_fn_service_list .title_holder h3 a:hover,
			.arlo_fn_helpful_fixed .address_list p a,
			.arlo_fn_sidebar .widget_businesshours .fn_days .hours,
			a.woocommerce-privacy-policy-link:hover,
			code a, pre a{color: {$primary_color};}
			
			
			
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce div.product form.cart .button,
			.woocommerce-message a.button.wc-forward,
			input[type=submit]:hover,
			input[type=button]:hover,
			.arlo_fn_pagelinks a,
			ul.arlo_fn_archive_list .read_more a:hover,
			.arlo_fn_portfolio_category_filter > a,
			.arlo_fn_prevnext[data-switch=prev] .prev a:hover,
			.arlo_fn_prevnext[data-switch=next] .next a:hover,
			.service_single .other_services .read_more a:hover,
			ul.ajax_pagination a:not(.inactive):hover,
			.arlo_fn_quick_contact input[type=button]:hover,
			ul.arlo_fn_service_list .item:hover .title_holder .read_more a{background-color: {$primary_color};}
			
			
			
			
			ul.arlo_fn_service_list .item:hover .title_holder{border-color: {$primary_color};}
		";
		
	
		// CLOSER COLOR
		$closer_color = '#ff4b36';
		if(isset($arlo_fn_option['closer_color'])){
			$closer_color = $arlo_fn_option['closer_color'];
		}
		$arlo_fn_custom_css .= "
			.arlo_fn_header .header_closer{background-color: {$closer_color};}
		";
		// SECONDARY COLOR
		$secondary_color = '#ff4b36';
		if(isset($arlo_fn_option['secondary_color'])){
			$secondary_color = $arlo_fn_option['secondary_color'];
		}
		$arlo_fn_custom_css .= "
			.wpcf7-form input[type=submit],
			input[type=submit],
			input[type=button],
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce-message a.button.wc-forward:hover,
			.arlo_fn_quick_contact input[type=button],
			ul.arlo_fn_service_list_default .read_more a:hover,
			ul.arlo_fn_archive_list .read_more a,
			.service_single .other_services .read_more a,
			.arlo_fn_comment div.comment-text .comment-reply-link:hover,
			.arlo_fn_widget_estimate .bfwe_inner,
			.arlo_fn_portfolio_category_filter > a,
			ul.arlo_fn_portfolio_list .item:after,
			ul.arlo_fn_portfolio_list .img_holder a:after,
			.arlo_fn_portfolio_single_list .plus:after,
			.arlo_fn_portfolio_single_list .plus:before,
			.arlo_fn_portfolio_justified .j_list .plus:after,
			.arlo_fn_portfolio_justified .j_list .plus:before,
			ul.arlo_fn_portfolio_list .img_holder a:before,
			.arlo_fn_prevnext[data-switch=prev] .prev a,
			.arlo_fn_prevnext[data-switch=next] .next a,
			.arlo_fn_prevnext[data-switch=yes] a,
			.arlo_fn_pagination li span,
			ul.ajax_pagination a,
			.arlo_fn_pagelinks span.number,
			.arlo_fn_pagelinks span.number:hover,
			.woocommerce nav.woocommerce-pagination ul li span.current,
			.woocommerce nav.woocommerce-pagination ul li a:hover,
			.arlo_fn_pagination li a:hover,
			.woocommerce div.product form.cart .button:hover{background-color: {$secondary_color};}
			ul.arlo_fn_service_list_default .read_more a:hover:after{
				border-right-color: {$secondary_color};
			}
			@media(max-width: 768px){
				.arlo_fn_comment div.comment-text .comment-reply-link:hover{background-color: {$secondary_color};}
			}
			ul.arlo_fn_archive_list h3 a:hover,
			h1 > a:hover,
			h2 > a:hover,
			h3 > a:hover,
			h4 > a:hover,
			h5 > a:hover,
			h6 > a:hover,
			.arlo_fn_footer .bottom_widget .widget_nav_menu ul li a:hover,
			.arlo_fn_comment .logged-in-as,
			.arlo_fn_comment .logged-in-as a:first-child,
			.arlo_fn_comment .logged-in-as a:last-child,
			.arlo_fn_comment_wrapper a,
			.arlo_fn_portfolio_justified .video_holder .play_text span,
			.arlo_fn_portfolio_justified .helpful_part p,
			.arlo_fn_portfolio_justified .helpful_part span a:hover,
			ul.arlo_fn_portfolio_list .item .title_holder p a,
			.arlo_fn_comment a.comment-edit-link,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
			.tagged_as a:hover,
			.posted_in a:hover,
			.woocommerce-account .woocommerce-MyAccount-navigation .is-active a,
			.woocommerce-account .woocommerce-MyAccount-navigation a:hover,
			.arlo_fn_breadcrumbs a:hover,
			a.woocommerce-privacy-policy-link,
			.arlo_fn_comment div.comment-text p > a,
			.woocommerce-account .woocommerce-MyAccount-content p a,
			.woocommerce-account .woocommerce-MyAccount-navigation a:hover,
			a.woocommerce-review-link,
			.woocommerce p.stars:hover a::before,
			.woocommerce p.stars.selected a:not(.active)::before,
			.woocommerce p.stars.selected a.active::before,
			.woocommerce .star-rating span::before,
			.widget_block a:hover,
			.arlo_fn_error_page .error_box h1,
			.arlo_fn_searchpagelist_item a.read_more,
			.arlo_fn_comment h3.comment-reply-title a,
			ul.arlo_fn_postlist .info_holder p a,
			.posted_in,
			.woocommerce table.shop_table td a,
			.tagged_as,
			.sku_wrapper,
			.woocommerce div.product form.cart .group_table td a,
			.arlo_fn_woo_login_inner p a,
			.arlo_fn_wrapper_all div.wpcf7 input span,
			.arlo_fn_password_protected .message_holder h1,
			.widget_businesshours .fn_days .hours,
			blockquote a:hover,table a:hover, code a:hover, pre a:hover{color: {$secondary_color};}
			
			.arlo_fn_widget_estimate .helper1,
			.arlo_fn_widget_estimate .helper5,
			ul.arlo_fn_service_list .item:hover span.roof:after,
			ul.arlo_fn_service_list .item:hover .title_holder .read_more:after{border-left-color: {$secondary_color};}
			
			.arlo_fn_widget_estimate .helper2,
			.arlo_fn_widget_estimate .helper6,
			ul.arlo_fn_service_list .item:hover span.roof:before{border-right-color: {$secondary_color};}
			
			.arlo_fn_footer .widget_oih_opt_in_widget button{background-color: {$secondary_color} !important;}
			
		";
		// HEADING COLOR
		$heading_color = '#000';
		if(isset($arlo_fn_option['heading_color'])){
			$heading_color = $arlo_fn_option['heading_color'];
		}
		if(isset($_GET['heading_color'])){$heading_color = $_GET['heading_color'];}
		
		$arlo_fn_custom_css .= "
			.comment-reply-title,
			.woocommerce div.product .woocommerce-tabs .panel strong,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.single_product_related_wrap h2,
			.woocommerce div.product .product_title,
			.woocommerce ul.products li.product .woocommerce-loop-category__title,
			.woocommerce ul.products li.product .woocommerce-loop-product__title,
			.woocommerce ul.products li.product h3,
			h1,h2,h3,h4,h5,h6,h1>a,h2>a,h3>a,h4>a,h5>a,h6>a,
			.wid-title span,
			.arlo_fn_widget_estimate .bfwe_inner a,
			.arlo_fn_footer .widget_tag_cloud .tagcloud a,
			.arlo_fn_pagetitle h3,
			.blog_single_title .title_holder h3,
			.arlo_fn_comment span.author,
			.arlo_fn_comment span.author a,
			.arlo_fn_comment h3.comment-reply-title,
			ul.arlo_fn_postlist .sticky_icon,
			ul.arlo_fn_archive_list h3 a,
			.arlo_fn_share_icons label,
			.arlo_fn_share_icons ul li a,
			.arlo_fn_portfolio_details .title_holder h3,
			ul.arlo_fn_service_list .title_holder h3 a{color: {$heading_color};}
		";
		
		
		
		// Footer Background
		$footer_bg_1 	= '#14131b';
		$footer_bg_2 	= '#14131b';
		if(isset($arlo_fn_option['footer_bg_1'])){
			$footer_bg_1 	= $arlo_fn_option['footer_bg_1'];
		}
		if(isset($arlo_fn_option['footer_bg_2'])){
			$footer_bg_2 	= $arlo_fn_option['footer_bg_2'];
		}
		
		if(isset($_GET['footer_bg_1'])){$footer_bg_1 = $_GET['footer_bg_1'];}
		if(isset($_GET['footer_bg_2'])){$footer_bg_2 = $_GET['footer_bg_2'];}
	
		$arlo_fn_custom_css .= "
			.arlo_fn_footer .footer_bottom{background-color: {$footer_bg_2};}
			.arlo_fn_footer .top_footer:after{background-color: {$footer_bg_1};}
		";
	
		
		// Box Shadow
		$arlo_box_shadow 	= 'enable';
		if(isset($arlo_fn_option['arlo_box_shadow'])){
			$arlo_box_shadow 	= $arlo_fn_option['arlo_box_shadow'];
			if($arlo_box_shadow === 'disable'){
				$arlo_fn_custom_css .= "
					.arlo_fn_wrapper_all, .arlo_fn_wrapper_all *{box-shadow: none !important;}
				";
			}
		}
	
		
	
		// HEADING COLOR
		$bgColorCustom = '#224b7a';
		if(isset($arlo_fn_option['custom_bg_color'])){
			$bgColorCustom = $arlo_fn_option['custom_bg_color'];
		}
		if(isset($_GET['custom_bg_color'])){$bgColorCustom = $_GET['custom_bg_color'];}
		$arlo_fn_custom_css .= "
			.arlo_fn_wrapper_all[data-nav-skin='custom'] #arlo_fn_fixedsub ul,
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_header{background-color: {$bgColorCustom};}
		";
	
		// HEADING COLOR
		$customTextColor = '#fff';
		if(isset($arlo_fn_option['custom_text_color'])){
			$customTextColor = $arlo_fn_option['custom_text_color'];
		}
		$changedColor	 = arlo_fn_hex2rgba($customTextColor, 0.3);
		if(isset($_GET['custom_text_color'])){$customTextColor = $_GET['custom_text_color'];}
		$arlo_fn_custom_css .= "
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline .tline_search a,
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline input[type=text],
			.arlo_fn_wrapper_all[data-nav-skin='custom'] #arlo_fn_fixedsub ul a,
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_header .menu_nav ul.vert_nav li > a{color: {$customTextColor};}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_header .menu_nav ul.vert_nav li > a:after,
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_header .menu_nav ul.vert_nav li > a:before{
				background-color: {$changedColor};
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] #arlo_fn_fixedsub li.menu-item-has-children > a:after,
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_header ul.vert_nav li.menu-item-has-children:after{
				border-left-color: {$changedColor};
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline input[type=text]{
				border-bottom-color: {$changedColor};
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline .tline_search:after{
				background-color: {$changedColor};
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline input[type=text]::-webkit-input-placeholder{
				color: {$customTextColor} !important;
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline input[type=text]::-moz-placeholder{
				color: {$customTextColor} !important;
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline input[type=text]:-ms-input-placeholder{
				color: {$customTextColor} !important;
			}
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline input[type=text]:-moz-placeholder{
				color: {$customTextColor} !important;
			}
			
		";
		// HEADING COLOR
		$customTextHoverColor = '#bed2e8';
		if(isset($arlo_fn_option['custom_text_hover_color'])){
			$customTextHoverColor = $arlo_fn_option['custom_text_hover_color'];
		}
		if(isset($_GET['custom_text_hover_color'])){$customTextHoverColor = $_GET['custom_text_hover_color'];}
		$arlo_fn_custom_css .= "
			.arlo_fn_wrapper_all[data-nav-skin='custom'] #arlo_fn_fixedsub ul a:hover,
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_header .menu_nav ul.vert_nav li > a:hover{color: {$customTextHoverColor};}
		";
	
		// HEADING COLOR
		$customSocialColor = '#fff';
		if(isset($arlo_fn_option['custom_social_color'])){
			$customSocialColor = $arlo_fn_option['custom_social_color'];
		}
		if(isset($_GET['custom_social_color'])){$customSocialColor = $_GET['custom_social_color'];}
		$arlo_fn_custom_css .= "
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline .social_list ul li a{color: {$customSocialColor};}
			
		";
	
		// HEADING COLOR
		$customSocialHoverColor = '#bed2e8';
		if(isset($arlo_fn_option['custom_social_hover_color'])){
			$customSocialHoverColor = $arlo_fn_option['custom_social_hover_color'];
		}
		if(isset($_GET['custom_social_hover_color'])){$customSocialHoverColor = $_GET['custom_social_hover_color'];}
		$arlo_fn_custom_css .= "
			.arlo_fn_wrapper_all[data-nav-skin='custom'] .arlo_fn_tagline .social_list ul li a:hover{color: {$customSocialHoverColor};}
		";
		
		// since 1.5
		$mob_nav_bg_color = '#0f0f16';
		if(isset($arlo_fn_option['mob_nav_bg_color'])){
			$mob_nav_bg_color = $arlo_fn_option['mob_nav_bg_color'];
		}
		$arlo_fn_custom_css .= "
			.arlo_fn_mobilemenu_wrap .logo_hamb{background-color: {$mob_nav_bg_color};}
		";
		
		// since 1.5
		$mob_nav_hamb_color = '#ccc';
		if(isset($arlo_fn_option['mob_nav_hamb_color'])){
			$mob_nav_hamb_color = $arlo_fn_option['mob_nav_hamb_color'];
		}
		$arlo_fn_custom_css .= "
			.hamburger .hamburger-inner::before,
			.hamburger .hamburger-inner::after,
			.hamburger .hamburger-inner{background-color: {$mob_nav_hamb_color};}
		";
		
		// since 1.5
		$mob_nav_ddbg_color = '#090909';
		if(isset($arlo_fn_option['mob_nav_ddbg_color'])){
			$mob_nav_ddbg_color = $arlo_fn_option['mob_nav_ddbg_color'];
		}
		$arlo_fn_custom_css .= "
			.arlo_fn_mobilemenu_wrap .mobilemenu{background-color: {$mob_nav_ddbg_color};}
		";
		
		// since 1.5
		$mob_nav_ddlink_color = '#ccc';
		if(isset($arlo_fn_option['mob_nav_ddlink_color'])){
			$mob_nav_ddlink_color = $arlo_fn_option['mob_nav_ddlink_color'];
		}
		$arlo_fn_custom_css .= "
			.arlo_fn_mobilemenu_wrap .vert_menu_list a{color: {$mob_nav_ddlink_color};}
			.arlo_fn_mobilemenu_wrap .vert_menu_list li.menu-item-has-children > a:after{border-left-color: {$mob_nav_ddlink_color};}
		";
		
		// since 1.5
		$mob_nav_ddlink_ha_color = '#ccc';
		if(isset($arlo_fn_option['mob_nav_ddlink_ha_color'])){
			$mob_nav_ddlink_ha_color = $arlo_fn_option['mob_nav_ddlink_ha_color'];
		}
		$arlo_fn_custom_css .= "
			.arlo_fn_mobilemenu_wrap .vert_menu_list li.active.menu-item-has-children > a,
			.arlo_fn_mobilemenu_wrap .vert_menu_list a:hover{color: {$mob_nav_ddlink_ha_color};}
			.arlo_fn_mobilemenu_wrap .vert_menu_list li.active.menu-item-has-children > a:after,
			.arlo_fn_mobilemenu_wrap .vert_menu_list li.menu-item-has-children > a:hover:after{border-left-color: {$mob_nav_ddlink_ha_color};}
		";
		
		/****************************** END styles *****************************/
		if(isset($arlo_fn_option['custom_css'])){
			$arlo_fn_custom_css .= "{$arlo_fn_option['custom_css']}";	
		}
		
		wp_add_inline_style( 'arlo_fn_inline', $arlo_fn_custom_css );

			
}

?>