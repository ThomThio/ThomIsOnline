<!DOCTYPE html >
<html <?php language_attributes(); ?>><head>
<?php 
	global $arlo_fn_option, $post;	
?>

<meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class();?>>


<?php 
	
	// NAVIGATIONS ----------------------------------------------------------------------------------
	$main_nav 					= array('theme_location'  => 'main_menu','menu_class' => 'arlo_fn_main_nav vert_nav');
	$mobile_nav 				= array('theme_location'  => 'mobile_menu','menu_class' => 'vert_menu_list nav_ver','menu_id' => 'vert_menu_list');
	
	// LOGO ----------------------------------------------------------------------------------
	$defaultLogo 				= get_template_directory_uri().'/framework/img/desktop-light-logo.png';
//	$retinaLogo 				= get_template_directory_uri().'/framework/img/retina-light-logo.png';
	$defaultLogoDark 			= get_template_directory_uri().'/framework/img/desktop-dark-logo.png';
//	$retinaLogoDark 			= get_template_directory_uri().'/framework/img/retina-dark-logo.png';
	$defaultLogoCustom 			= get_template_directory_uri().'/framework/img/desktop-custom-logo.png';
//	$retinaLogoCustom 			= get_template_directory_uri().'/framework/img/retina-custom-logo.png';
	$mobileLogo 				= get_template_directory_uri().'/framework/img/mobile-logo.png';
	
	$logoDesktop 				= $logoDesktopURL = '';
	if(isset($arlo_fn_option['desktop_logo_dark'])){
		$logoDesktop 			= $arlo_fn_option['desktop_logo_dark'];
	}
	if(isset($arlo_fn_option['desktop_logo_dark']['url'])){
		$logoDesktopURL 		= $arlo_fn_option['desktop_logo_dark']['url'];
	}
	if(isset($logoDesktop) && isset($logoDesktopURL)){
		if($logoDesktopURL !== ''){
			$defaultLogo 		= $logoDesktopURL;
		}
	}
	
	// since arlo
	$logoDesktopDark 			= $logoDesktopURLDark = '';
	if(isset($arlo_fn_option['desktop_logo_light'])){
		$logoDesktopDark 		= $arlo_fn_option['desktop_logo_light'];
	}
	if(isset($arlo_fn_option['desktop_logo_light']['url'])){
		$logoDesktopURLDark 	= $arlo_fn_option['desktop_logo_light']['url'];
	}
	if(isset($logoDesktopDark) && isset($logoDesktopURLDark)){
		if($logoDesktopURLDark !== ''){
			$defaultLogoDark = $logoDesktopURLDark;
		}
	}
	
	// since arlo
	$logoDesktopCustom 			= $logoDesktopURLCustom = '';
	if(isset($arlo_fn_option['desktop_logo_custom'])){
		$logoDesktopCustom 		= $arlo_fn_option['desktop_logo_custom'];
	}
	if(isset($arlo_fn_option['desktop_logo_custom']['url'])){
		$logoDesktopURLCustom 	= $arlo_fn_option['desktop_logo_custom']['url'];
	}
	if(isset($logoDesktopCustom) && isset($logoDesktopURLCustom)){
		if($logoDesktopURLCustom !== ''){
			$defaultLogoCustom = $logoDesktopURLCustom;
		}
	}
	
//	$logoRetina 				= $logoRetinaURL = '';
//	if(isset($arlo_fn_option['retina_logo_light'])){
//		$logoRetina 			= $arlo_fn_option['retina_logo_light'];
//	}
//	if(isset($arlo_fn_option['retina_logo_light']['url'])){
//		$logoRetinaURL 			= $arlo_fn_option['retina_logo_light']['url'];
//	}
//	if(isset($logoRetina) && isset($logoRetinaURL)){
//		if($logoRetinaURL !== ''){
//			$retinaLogo 		= $logoRetinaURL;
//		}
//	}
//	
//	// since arlo
//	$logoRetinaDark 			= $logoRetinaURLDark = '';
//	if(isset($arlo_fn_option['retina_logo_dark'])){
//		$logoRetinaDark 		= $arlo_fn_option['retina_logo_dark'];
//	}
//	if(isset($arlo_fn_option['retina_logo_dark']['url'])){
//		$logoRetinaURLDark 		= $arlo_fn_option['retina_logo_dark']['url'];
//	}
//	if(isset($logoRetinaDark) && isset($logoRetinaURLDark)){
//		if($logoRetinaURLDark !== ''){
//			$retinaLogoDark 	= $logoRetinaURLDark;
//		}
//	}
//	
//	// since arlo
//	$logoRetinaCustom 			= $logoRetinaURLCustom = '';
//	if(isset($arlo_fn_option['retina_logo_custom'])){
//		$logoRetinaCustom 		= $arlo_fn_option['retina_logo_custom'];
//	}
//	if(isset($arlo_fn_option['retina_logo_custom']['url'])){
//		$logoRetinaURLCustom 		= $arlo_fn_option['retina_logo_custom']['url'];
//	}
//	if(isset($logoRetinaCustom) && isset($logoRetinaURLCustom)){
//		if($logoRetinaURLCustom !== ''){
//			$retinaLogoCustom 	= $logoRetinaURLCustom;
//		}
//	}
//	
	$logoMobile 				= $logoMobileURL = '';
	if(isset($arlo_fn_option['mobile_logo'])){
		$logoMobile 			= $arlo_fn_option['mobile_logo'];
	}
	if(isset($arlo_fn_option['mobile_logo']['url'])){
		$logoMobileURL 			= $arlo_fn_option['mobile_logo']['url'];
	}
	if(isset($logoMobile) && isset($logoMobileURL)){
		if($logoMobileURL !== ''){
			$mobileLogo 		= $logoMobileURL;
		}
	}
	
	// navigation skin
	$nav_skin 					= 'light';
	if(isset($arlo_fn_option['nav_skin'])){
		$nav_skin 				= $arlo_fn_option['nav_skin'];
	}
	if(function_exists('rwmb_meta')){
		$nav_skin 				= get_post_meta(get_the_ID(),'arlo_fn_page_nav_color', true);
		if($nav_skin === 'default' && isset($arlo_fn_option['nav_skin'])){
			$nav_skin 			= $arlo_fn_option['nav_skin'];
		}
	}
	if(isset($arlo_fn_option['nav_skin'])){
		if($nav_skin === 'undefined' || $nav_skin === ''){
			$nav_skin 			= $arlo_fn_option['nav_skin'];
		}
	}
	if(is_404() || is_search() || is_archive()){
		$nav_skin 				= 'light';
		if(isset($arlo_fn_option['special_nav_skin'])){
			$nav_skin 			= $arlo_fn_option['special_nav_skin'];
		}
	}
	
	
	
	$mobMenuAutocollapse 		= 'disable';
	if(isset($arlo_fn_option['mobile_menu_autocollapse'])){
		$mobMenuAutocollapse 	= $arlo_fn_option['mobile_menu_autocollapse'];
	}
	
	
	$mobMenuOpen 				= 'disable';
	$mobileHambClass			= '';
	$mobileActiveClass			= '';
	$mobileMenuDisplay			= 'none';
	if(isset($arlo_fn_option['mobile_menu_open_default'])){
		$mobMenuOpen	 		= $arlo_fn_option['mobile_menu_open_default'];
		if($mobMenuOpen == 'enable'){
			$mobileMenuDisplay	= 'block';
			$mobileHambClass	= 'is-active';
		}
	}
	
	$navOpenDefault				= 'enable';
	if(isset($arlo_fn_option['navigation_open_default'])){
		$navOpenDefault	 		= $arlo_fn_option['navigation_open_default'];
	}
	
	if(isset($_GET['nav'])){$navOpenDefault = $_GET['nav'];}
	if($navOpenDefault == 'disable'){
		$navOpenDefault			= 'menu_opened';
	}else{
		$navOpenDefault			= '';
	}
	
	
	/* from 1.2 version : added preloader */
	$preloaderSwitch			= 'disable';
	$preloaderSkin				= 'dark';
	$preloaderHTML				= '';
	if(isset($arlo_fn_option['preloader_switch'])){
		$preloaderSwitch	 	= $arlo_fn_option['preloader_switch'];
	}
	if(isset($arlo_fn_option['preloader_skin'])){
		$preloaderSkin	 		= $arlo_fn_option['preloader_skin'];
	}
	
	if(isset($_GET['preloader'])){$preloaderSwitch 		= $_GET['preloader'];}
	if(isset($_GET['preloader_skin'])){$preloaderSkin 	= $_GET['preloader_skin'];}
	
	if($preloaderSwitch == 'enable'){
		$preloaderHTML 			 = '<div class="arlo_fn_preloader fn_'.$preloaderSkin.'">';
			$preloaderHTML			.= '<div class="spinner_wrap">';
				$preloaderHTML			.= '<div class="arlo_fn_spinner"></div>';
			$preloaderHTML			.= '</div>';
		$preloaderHTML			.= '</div>';
	}
?>

<!-- WRAPPER ALL -->
<div class="arlo_fn_wrapper_all <?php echo esc_attr($navOpenDefault);?>" 
	data-nav-skin="<?php echo esc_attr($nav_skin); ?>" 
	data-mobile-autocollapse="<?php echo esc_attr($mobMenuAutocollapse); ?>" 
	>
	<div id="arlo_fn_fixedsub">
		<ul></ul>
	</div>
	
	<?php 
		echo wp_kses_post($preloaderHTML);
	?>
	

	<!-- WRAPPER -->
	<div class="arlo_fn_wrapper">
	
		<!-- HEADER -->
		<div class="arlo_fn_header">
			<div class="header_inner">
				<div class="menu_logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img class="desktop_logo" src="<?php echo esc_url($defaultLogo);?>" alt="<?php esc_attr(bloginfo('description')); ?>" />
						<img class="desktop_logo_dark" src="<?php echo esc_url($defaultLogoDark);?>" alt="<?php esc_attr(bloginfo('description')); ?>" />
						<img class="desktop_logo_custom" src="<?php echo esc_url($defaultLogoCustom);?>" alt="<?php esc_attr(bloginfo('description')); ?>" />
<!--
						<img class="retina_logo" src="<?php //echo esc_url($retinaLogo);?>" alt="<?php //esc_attr(bloginfo('description')); ?>" />
						<img class="retina_logo_dark" src="<?php //echo esc_url($retinaLogoDark);?>" alt="<?php //esc_attr(bloginfo('description')); ?>" />
-->
						<span><span class="span_a"></span><span class="span_b"></span></span>
					</a>
				</div>
				<div class="menu_nav">

					<?php if(has_nav_menu('main_menu')){ wp_nav_menu( $main_nav );} else{echo '<ul class="vert_nav"><li><a href="">'.esc_html__('No menu assigned', 'arlo').'</a></li></ul>';}?>

				</div>
				<div class="header_closer"></div>
				<div class="arlo_fn_tagline">
					<?php if($arlo_fn_option['search_switch'] !== 'disable'){?>
					<div class="tline_search">
						<form action="<?php echo esc_url(home_url('/')); ?>" method="get" >
							<input type="text" placeholder="<?php esc_attr_e('Search', 'arlo');?>" name="s" autocomplete="off" />
							<input type="submit" class="pe-7s-search" value="" />
							<a href="#" class="right"><img class="arlo_fn_svg" src="<?php echo get_template_directory_uri();?>/framework/svg/search.svg" alt="<?php echo esc_attr__('svg', 'arlo');?>" /></a>
							<a href="#" class="left"><img class="arlo_fn_svg" src="<?php echo get_template_directory_uri();?>/framework/svg/search.svg" alt="<?php echo esc_attr__('svg', 'arlo');?>" /></a>
						</form>
					</div>
					<?php }?>
					<?php 
						if(isset($arlo_fn_option['helpful_social_switch'])){
							if($arlo_fn_option['helpful_social_switch'] === 'enable'){?>
								<div class="social_list">
									<ul>
										<?php if(isset($arlo_fn_option['facebook_helpful']) == 1 && $arlo_fn_option['facebook_helpful'] != '') { ?>
										<li><a class="facebook" href="<?php echo esc_url($arlo_fn_option['facebook_helpful']); ?>" target="_blank"><i class="xcon-facebook"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['twitter_helpful']) == 1 && $arlo_fn_option['twitter_helpful'] != '') { ?>
										<li><a class="twitter" href="<?php echo esc_url($arlo_fn_option['twitter_helpful']); ?>" target="_blank"><i class="xcon-twitter"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['instagram_helpful']) == 1 && $arlo_fn_option['instagram_helpful'] != '') { ?>
										<li><a class="instagram" href="<?php echo esc_url($arlo_fn_option['instagram_helpful']); ?>" target="_blank"><i class="xcon-instagram"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['pinterest_helpful']) == 1 && $arlo_fn_option['pinterest_helpful'] != '') { ?>
										<li><a class="pinterest" href="<?php echo esc_url($arlo_fn_option['pinterest_helpful']); ?>" target="_blank"><i class="xcon-pinterest"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['linkedin_helpful']) == 1 && $arlo_fn_option['linkedin_helpful'] != '') { ?>
										<li><a class="linkedin" href="<?php echo esc_url($arlo_fn_option['linkedin_helpful']); ?>" target="_blank"><i class="xcon-linkedin"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['behance_helpful']) == 1 && $arlo_fn_option['behance_helpful'] != '') { ?>
										<li><a class="behance" href="<?php echo esc_url($arlo_fn_option['behance_helpful']); ?>" target="_blank"><i class="xcon-behance"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['vimeo_helpful']) == 1 && $arlo_fn_option['vimeo_helpful'] != '') { ?>
										<li><a class="vimeo" href="<?php echo esc_url($arlo_fn_option['vimeo_helpful']); ?>" target="_blank"><i class="xcon-vimeo"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['youtube_helpful']) == 1 && $arlo_fn_option['youtube_helpful'] != '') { ?>
										<li><a class="youtube" href="<?php echo esc_url($arlo_fn_option['youtube_helpful']); ?>" target="_blank"><i class="xcon-youtube"></i></a></li>
										<?php } ?>
										<?php if(isset($arlo_fn_option['google_helpful']) == 1 && $arlo_fn_option['google_helpful'] != '') { ?>
										<li><a class="google" href="<?php echo esc_url($arlo_fn_option['google_helpful']); ?>" target="_blank"><i class="xcon-gplus"></i></a></li>
										<?php } ?>
									</ul>
								</div>
					<?php 
							}
						}
					?>	
				</div>
			</div>
		</div>
		<!-- /HEADER -->

		<!-- MOBILE MENU -->
		<div class="arlo_fn_mobilemenu_wrap">
			
			
			<!-- LOGO & HAMBURGER -->
			<div class="logo_hamb">
				<div class="in">
					<div class="menu_logo">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($mobileLogo);?>" alt="<?php esc_attr(bloginfo('description')); ?>" /></a>
					</div>
					<div class="hamburger hamburger--collapse-r <?php echo esc_attr($mobileHambClass);?>">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- /LOGO & HAMBURGER -->

			<!-- MOBILE DROPDOWN MENU -->
			<div class="mobilemenu <?php echo esc_attr($mobileActiveClass);?>" style="display: <?php echo esc_attr($mobileMenuDisplay);?>">
				<?php if(has_nav_menu('mobile_menu')){ wp_nav_menu( $mobile_nav );}?>
			</div>
			<!-- /MOBILE DROPDOWN MENU -->

		</div>
		<!-- /MOBILE MENU -->
		
		
		<!-- WRAPPER for HEIGHT -->
		<div class="arlo_fn_wfh">
  		