<?php
use Frel\Frel_Helper;

class frelArrowLink {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_arrow_link', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'link_text'  			=> '',
			 'link_url'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$html 	= Frel_Helper::frel_open_wrap();
		$arrow	= '<span class="arrow"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" /></span>';
		$arrow2 = '<span class="arrow_hover"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" /></span>';
		$html 	.= '<div class="fn_cs_arrow_link"><div class="container"><div class="link_holder"><a href="'.$link_url.'"><span class="text">'.$link_text.'</span>'.$arrow.$arrow2.'</a></div></div></div>';
		$html 	.= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelArrowLink();