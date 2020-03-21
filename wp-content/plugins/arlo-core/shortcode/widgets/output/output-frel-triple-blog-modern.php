<?php
use Frel\Frel_Helper;

class frelTripleBlogModern {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_triple_blog_modern', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'post_order'  			=> '',
			 'post_orderby'  		=> '',
			 'post_offset'  		=> '',
			 'read_more'  			=> '',
			 'read_more_type'  		=> '',
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
		
		$arlo_post_loop = new WP_Query($query_args);
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_triple_blog_modern"><div class="container"><div class="inner">';
		$has_img 	= '';
		$posts_part	= '<ul>';
		
		$svg = '<img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" />';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_title			= $fn_post->post_title;
			$post_img			= get_the_post_thumbnail_url($post_id, 'full');
			$category			= Frel_Helper::post_term_list($post_id,'category',false,1);
			
			if($read_more_type === 'arr'){
				$read_more_span = '<span class="text">'.$read_more.'</span><span class="arrow">'.$svg.'</span><span class="arrow_hover">'.$svg.'</span>';
			}else{
				$read_more_span	= $read_more;
			}
			$title 				= '<p class="t_header"><span class="t_author">'.esc_html__('By ', 'frenify-core').'<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('user_nicename').'</a></span> — <span class="t_category">'.esc_html__('In ', 'frenify-core').$category.'</span></p><h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3><p class="t_footer"><a class="'.$read_more_type.'" href="'.$post_permalink.'">'.$read_more_span.'</a></p>';
			$post_time			= '<div class="time"><span></span><h3>'.get_the_time('d', $post_id).'</h3><h5>'.get_the_time('M', $post_id).'</h5><h5>'.get_the_time('Y', $post_id).'</h5></div>';
			if($post_img != ''){
				$has_img = 'has_img';
			}else{
				$has_img = 'no_img';
			}
			$img_holder = '<div class="img_holder" data-bg-img="'.$post_img.'">'.$post_time.'<a href="'.$post_permalink.'"></a><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-370-250.jpg" alt="" /></div>';
			$posts_part .= '<li><div class="item '.$has_img.'">'.$img_holder.'<div class="title_holder">'.$title.'</div></div></li>';
			wp_reset_postdata();
		}
		$posts_part .= '</ul>';
		$html .= $posts_part;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelTripleBlogModern();