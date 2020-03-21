<?php
use Frel\Frel_Helper;

class frelCallToAction {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_call_to_action', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'link_text'  			=> '',
			 'link_url'  			=> '',
			 'title'  				=> '',
			 'desc'  				=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$html 	= Frel_Helper::frel_open_wrap();
		$html 	.= '<div class="fn_cs_call_to_action"><div class="container"><div class="cta_holder">';
		$title_holder 	= '<div class="title_holder"><h3>'.$title.'</h3><p>'.$desc.'</p></div>';
		$link_holder	= '<div class="link_holder"><a href="'.$link_url.'"><span>'.$link_text.'</span></a></div>';
		$html	.= $title_holder.$link_holder;
		$html 	.= '</div></div></div>';
		$html 	.= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelCallToAction();