<?php
use Frel\Frel_Helper;

class frelButton {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_button', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'btn_text'  			=> '',
			 'btn_url'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_button"><div class="container"><div class="inner"><a href="'.$btn_url.'">'.$btn_text.'</a></div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelButton();