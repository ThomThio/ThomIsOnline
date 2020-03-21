<?php
use Frel\Frel_Helper;

class frelAbout {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_about', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'title'  			=> '',
			 'desc'  			=> '',
			 'signature'  		=> '',
			 'name'  			=> '',
			 'occ'  			=> '',
			 'rightimg'  		=> '',
			 'dots_img'  		=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$signatureImg = '';
		$defaultSignImage 	= FREL_PLUGIN_URL.'assets/img/about-sign.png';
		if($signature !== ''){
			$signatureImg = '<img src="'.$signature.'" alt="" />';
		}
		$defaultRightImage 	= FREL_PLUGIN_URL.'assets/img/about-right-image.jpg';
		$callBackImage	 	= '<img src="'.FREL_PLUGIN_URL.'assets/img/thumb-500-560.jpg" alt="" />';
		if($rightimg !== ''){
			$defaultRightImage = $rightimg;
		}
		$defaultDotsImage	 	= '';
		$customDots				= 'disable';
		if($dots_img !== ''){
			$defaultDotsImage = $dots_img;
			$customDots	= 'enable';
		}
		$html 		= Frel_Helper::frel_open_wrap();
		$LeftPart 	= '<div class="leftpart"><div class="title_holder"><h3 class="title">'.$title.'</h3><p class="desc">'.$desc.'</p></div><div class="sign_holder">'.$signatureImg.'<h3 class="name">'.$name.'</h3><p class="occ">'.$occ.'</p></div></div>';
		$RightPart	= '<div class="rightpart"><div class="r_inner" id="scene"><div class="layer border" data-depth="0.3"><span class="span1"></span><span class="span2"></span>'.$callBackImage.'</div><div class="img_holder layer" data-depth="0.5">'.$callBackImage.'<div class="abs_img" data-bg-img="'.$defaultRightImage.'"></div></div><div class="dots layer" data-switch="'.$customDots.'" data-depth="0.9" data-bg-img="'.$defaultDotsImage.'">'.$callBackImage.'</div></div></div>';
		$html .= '<div class="fn_cs_about"><div class="container"><div class="a_inner">'.$LeftPart.$RightPart.'</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelAbout();