<?php
use Frel\Frel_Helper;

class frelBottomLine {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_bottom_line', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'title'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$title 		= $args['title'];
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_bottom_line"><div class="container"><div class="inner"><p>'.$title.'</p></div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelBottomLine();