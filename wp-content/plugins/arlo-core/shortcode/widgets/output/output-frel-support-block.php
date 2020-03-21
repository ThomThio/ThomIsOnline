<?php
use Frel\Frel_Helper;

class frelSupportBlock {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_support_block', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'link_text'  			=> '',
			 'link_url'  			=> '',
			 'tall_free'			=> '',
			 'desc'  				=> '',
			 'image'  				=> '',
			 'icon_type'  			=> '',
			 'elementor_icons'  	=> '',
			 'frenify_icons'  		=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		// TALL FREE
		if($tall_free == ''){
			$tall_free_wrap = '';
		}else{
			$tall_free_wrap = '<div class="tfree_block"><p>'.$tall_free.'</p></div>';
		}
		
		// LINK
		if($link_url == ''){
			$link = '';
		}else{
			$link = '<div class="link_block"><a href="'.$link_url.'">'.$link_text.'</a></div>';
		}
		// BOTTOM SECTION
		if($tall_free == '' && $link_url == ''){
			$bottom_section = '';
		}else{
			$bottom_section = '<div class="bottom_section">'.$link.$tall_free_wrap.'</div>';
		}
		$content 	= '<div class="content"><div class="desc"><p>'.$desc.'</p></div>'.$bottom_section.'</div>';
		
		if($icon_type === 'frenify_icons'){
			$icon = '<span class="icon"><span></span><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/service-'.$frenify_icons.'.svg" alt="svg" /></span>';
		}else if($icon_type === 'elementor_icons'){
			$icon = '<span class="icon"><span></span><i class="'.$elementor_icons.'" area-hidden="true"></i></span>';
		}else{
			$icon = '';
		}
		
		if($image == ''){
			$right_img_url = FREL_PLUGIN_URL.'assets/img/support.png';
		}else{
			$right_img_url = $image;
		}
		$img_wrap = '<div class="img_wrap"><span></span><img src="'.$right_img_url.'" alt="" /></div>';
		
		
		$html 	= Frel_Helper::frel_open_wrap();
		$html 	.= '<div class="fn_cs_support_block" data-icon-type="'.$icon_type.'"><div class="container"><div class="support_block">'.$content.$icon.$img_wrap.'</div></div></div>';
		$html 	.= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelSupportBlock();