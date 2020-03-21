<?php
use Frel\Frel_Helper;

class frelHeroHeaderModern {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_hero_header_modern', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'title'  					=> '',
			 'description'  			=> '',
			 'video_text'  				=> '',
			 'video_url'  				=> '',
			 'h_wort'  					=> '',
			 'bg_img_url'  				=> '',
			 'video_type'  				=> '',
		), $args );
		extract( $defaults );

		self::$args = $defaults;
		if($video_url === ''){
			$showURL = 'no';
		}else{
			$showURL = 'yes';
		}
		if($video_type === 'mp4'){
			$number = rand(20000, 90000);
			$video_browser = '
			<div style="display:none;" id="arlo_hero_header_modern_video_'.$number.'">
				<video class="lg-video-object lg-html5" controls preload="none">
					<source src="'.$video_url.'" type="video/mp4">
					 '.esc_html__('Your browser does not support HTML5 video.', 'arlo').'
				</video>
			</div>';
			$data_html 	= ' data-html="#arlo_hero_header_modern_video_'.$number.'"';
			$data_src 	= '';
		}else{
			$video_browser = '';
			$data_html 	= '';
			$data_src 	= ' data-src="'.$video_url.'"';
		}
		$html 			= Frel_Helper::frel_open_wrap();
		$title_holder	= '<div class="title_holder"><h3>'.$title.'</h3><p>'.$description.'</p></div>';
		$btn_holder		= '<div class="btn_holder fn_cs_lightgallery"><span class="video lightbox" '.$data_src.' '.$data_html.'><span class="icon"></span><span class="text">'.$video_text.'</span></span></div>';
		$content 		= '<div class="container"><div class="content_holder">'.$title_holder.$btn_holder.'</div></div>';
		$bGround		= '<div class="bg_holder"><div class="o_img" data-bg-img="'.$bg_img_url.'"></div><div class="o_color"></div></div>';
		$html .= '<div class="fn_cs_hero_header_modern" data-url-show="'.$showURL.'" data-height="'.$h_wort.'">'.$video_browser.$content.$bGround.'</div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelHeroHeaderModern();