<?php
use Frel\Frel_Helper;

class frelTitleWithDescription {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_title_with_description', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'title'  			=> '',
			 'desc'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		if($title != ''){
			$titleHTML = '<h3>'.$title.'</h3>';
		}else{
			$titleHTML = '';
		}
		if($desc != ''){
			$descHTML = '<p>'.$desc.'</p>';
		}else{
			$descHTML = '';
		}
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_title_with_desc"><div class="container"><div class="title_holder">'.$titleHTML.$descHTML.'</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelTitleWithDescription();