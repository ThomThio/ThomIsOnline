<?php
use Frel\Frel_Helper;

class frelIntroduce {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_introduce', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'subtitle'  			=> '',
			 'title'  				=> '',
			 'description'  		=> '',
			 'badge_title'  		=> '',
			 'badge_year'  			=> '',
			 'badge_desc'  			=> '',
			 'video_url'  			=> '',
			 'bg_img'  				=> '',
			 'wing_switch'  		=> '',
			 'video_type'  			=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$subtitle 		= $args['subtitle'];
		$title 			= $args['title'];
		$description 	= $args['description'];
		$badge_title 	= $args['badge_title'];
		$badge_year 	= $args['badge_year'];
		$badge_desc 	= $args['badge_desc'];
		$video_url 		= $args['video_url'];
		$bg_img 		= $args['bg_img'];
		$wing_switch 	= $args['wing_switch'];
		
		if($video_url === ''){
			$showURL = 'no';
		}else{
			$showURL = 'yes';
		}
		if($video_type === 'mp4'){
			$number = rand(20000, 90000);
			$video_browser = '
			<div style="display:none;" id="arlo_introduce_video_'.$number.'">
				<video class="lg-video-object lg-html5" controls preload="none">
					<source src="'.$video_url.'" type="video/mp4">
					 '.esc_html__('Your browser does not support HTML5 video.', 'arlo').'
				</video>
			</div>';
			$data_html 	= ' data-html="#arlo_introduce_video_'.$number.'"';
			$data_src 	= '';
		}else{
			$video_browser = '';
			$data_html 	= '';
			$data_src 	= ' data-src="'.$video_url.'"';
		}
		$title_holder	= '<div class="title_holder"><h5>'.$subtitle.'</h5><h3>'.$title.'</h3><p>'.$description.'</p></div>';
		$badge_holder	= '<div class="badge_holder"><div class="title"><h3>'.$badge_title.'</h3></div><div class="content"><span class="year">'.$badge_year.'</span><span>'.$badge_desc.'</span></div></div>';
		$video_holder	= '<span class="video lightbox"  '.$data_src.' '.$data_html.'><span></span></span>';
		
		$bgholder		= '<div class="bg"><div class="o_color"></div><div class="o_image" data-bg-img="'.$bg_img.'"></div></div>';
		$contentholder	= '<div class="content_holder">'.$title_holder.$badge_holder.'</div>';
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_introduce_wrap fn_cs_lightgallery" data-url-show="'.$showURL.'" data-wing-switch="'.$wing_switch.'">'.$video_browser.'<div class="container"><div class="fn_cs_introduce"><span class="wing11"></span><span class="wing12"></span><span class="wing21"></span><span class="wing22"></span>'.$video_holder.$bgholder.$contentholder.'</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelIntroduce();