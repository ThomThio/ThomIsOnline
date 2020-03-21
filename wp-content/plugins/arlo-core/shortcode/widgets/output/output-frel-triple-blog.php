<?php
use Frel\Frel_Helper;

class frelTripleBlog {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_triple_blog', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'post_order'  			=> '',
			 'post_orderby'  		=> '',
			 'post_offset'  		=> '',
			 'time_format'  		=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$query_args = array(
			'post_type' 			=> 'post',
			'posts_per_page' 		=> 3,
			'post_status' 			=> 'publish',
			'offset' 				=> $args['post_offset'],
			'order' 				=> $args['post_order'],
			'orderby' 				=> $args['post_orderby'],
		);
		
		
		if($time_format === 'month_d_y'){
			$format = 'F j, Y';
		}else if($time_format === 'm_d_y'){
			$format = 'm/d/Y';
		}else if($time_format === 'y_m_d'){
			$format = 'Y/m/d';
		}else if($time_format === 'time'){
			$format = 'G:i';
		}else if($time_format === 'time_pm'){
			$format = 'g:i a';
		}
		
		$arlo_post_loop = new WP_Query($query_args);
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_triple_blog"><div class="container"><div class="inner">';
		$has_img 	= '';
		$posts_part	= '<ul>';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_title			= $fn_post->post_title;
			$post_img			= get_the_post_thumbnail_url($post_id, 'full');
			$title 				= '<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
			$post_time			= '<p>'.get_the_time($format, $post_id).'</p>';
			if($post_img != ''){
				$has_img = 'has_img';
			}else{
				$has_img = 'no_img';
			}
			$icon 		= '<a class="icon" href="'.$post_permalink.'"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="" /></a>';
			$img_holder = '<div class="img_holder" data-bg-img="'.$post_img.'"><a href="'.$post_permalink.'"></a><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-370-250.jpg" alt="" /></div>';
			$posts_part .= '<li><div class="item '.$has_img.'">'.$img_holder.'<div class="title_holder">'.$title.$post_time.$icon.'</div></div></li>';
			wp_reset_postdata();
		}
		$posts_part .= '</ul>';
		$html .= $posts_part;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelTripleBlog();