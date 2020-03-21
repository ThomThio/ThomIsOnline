<?php
function arlo_fn_fonts() {
	global $arlo_fn_option;
	$customfont = '';
	
	$default = array(
					'arial',
					'verdana',
					'trebuchet',
					'georgia',
					'times',
					'tahoma',
					'helvetica');
	
	$googlefonts = array(
					$arlo_fn_option['body_font']['font-family'],
					$arlo_fn_option['nav_font']['font-family'],
					$arlo_fn_option['nav_mob_font']['font-family'],
					$arlo_fn_option['heading_font']['font-family'],
					$arlo_fn_option['blockquote_font']['font-family'],
					$arlo_fn_option['extra_font']['font-family'],
					);
				
	foreach($googlefonts as $getfonts) {
		
		if(!in_array($getfonts, $default)) {
				$customfont = str_replace(' ', '+', $getfonts). ':400,400italic,500,500italic,600,600italic,700,700italic|' . $customfont;
		}
	}
	
	
	
	
	if($customfont != '' && isset($arlo_fn_option)){
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'arlo_fn_googlefonts', "$protocol://fonts.googleapis.com/css?family=" . substr_replace($customfont ,"",-1) . "&subset=latin,cyrillic,greek,vietnamese" );
	}	
}
add_action( 'wp_enqueue_scripts', 'arlo_fn_fonts' );
?>