<?php
use Frel\Frel_Helper;

class frelDescription {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_description', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'desc'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_description"><div class="container"><div class="desc_holder"><p>'.$desc.'</p></div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelDescription();