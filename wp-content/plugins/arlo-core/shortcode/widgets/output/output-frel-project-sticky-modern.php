<?php
use Frel\Frel_Helper;

class frelProjectStickyModern {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_project_sticky_modern', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'view_all_text_project'  			=> '',
			 'view_all_url_project'  			=> '',
			 'view_more'  						=> '',
			 'desc'  							=> '',
			 'title'  							=> '',
			 'post_number'  					=> '',
			 'post_order'  						=> '',
			 'post_orderby'  					=> '',
			 'animation_type'  					=> '',
			 'post_offset'  					=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$query_args = array(
			'post_type' 			=> 'arlo-project',
			'posts_per_page' 		=> $args['post_number'],
			'post_status' 			=> 'publish',
			'order' 				=> $args['post_order'],
			'orderby' 				=> $args['post_orderby'],
			'offset' 				=> $args['post_offset'],
		);
		
		
		
		
		$arlo_post_loop = new WP_Query($query_args);
		
		$title					= $args['title'];
		$desc 					= $args['desc'];
		$view_more 				= $args['view_more'];
		$view_all_text_project 	= $args['view_all_text_project'];
		$view_all_url_project 	= $args['view_all_url_project'];
		
		$svg = '<img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" />';
		if($view_all_url_project !== ''){
			$view_all_link = '<a href="'.$view_all_url_project.'">'.$view_all_text_project.'</a>';
		}else{
			$view_all_link = '';
		}
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_project_sticky_modern" data-animation-type="'.$animation_type.'"><div class="container"><div class="inner fn_cs_sminiboxes"><div class="left_part fn_cs_sminibox"><div class="fn_cs_sticky_section"><div class="left_part_in"><h3>'.$title.'</h3><p>'.$desc.'</p>'.$view_all_link.'</div></div></div><div class="right_part fn_cs_sminibox"><div class="fn_cs_sticky_section"><ul>';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
			$post_title			= $fn_post->post_title;
			
			$img_holder	= '<div class="img_holder"><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-560-375.jpg" alt="" /><div class="abs_img" data-bg-img="'.$post_image.'"><a href="'.$post_permalink.'"></a></div></div>';
			$title_holder = '<div class="title_holder"><h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3><p><a href="'.$post_permalink.'"><span class="text">'.$view_more.'</span><span class="arrow">'.$svg.'</span></a></p><a href="'.$post_permalink.'"></a></div>';
			$html .= '<li><div class="item">'.$img_holder.$title_holder.'</div></li>';
			wp_reset_postdata();
		}
		$html .= '</ul></div></div>';
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelProjectStickyModern();