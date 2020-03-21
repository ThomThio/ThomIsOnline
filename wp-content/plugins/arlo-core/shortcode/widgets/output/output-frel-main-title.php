<?php
use Frel\Frel_Helper;

class frelMainTitle {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_main_title', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'title'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_main_title"><div class="container"><div class="title_holder"><h3>'.$title.'</h3></div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelMainTitle();