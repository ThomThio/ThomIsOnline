<?php
use Frel\Frel_Helper;

class frelProjectCategoryFilter {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_project_category_filter', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'post_number'  					=> '',
			 'post_order'  						=> '',
			 'post_orderby'  					=> '',
			 'post_offset'  					=> '',
			 'category_filter'  				=> '',
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
		
		
		$fn_filter 	= '<ul class="posts_filter">';
		$fn_filter 	.= '<li><a href="#" class="current" data-filter="*">All</a></li>';
		$post_cats3	= '';
		$fn_list	= '<ul class="posts_list">';
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_project_category"><div class="container"><div class="inner">';
		$html .= '<div class="fn_cs_project_moving_title"></div>';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
			$post_title			= $fn_post->post_title;
			$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
			
			$post_cats			= Frel_Helper::post_term_list($post_id, $post_taxonomy[0], false, 9999, ', ');
			$post_cats2			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0]);
			
			$img_holder			= '<div class="img_holder"><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-square.jpg" alt="" /><div class="abs_img" data-bg-img="'.$post_image.'"><a href="'.$post_permalink.'"></a></div></div>';
			$hiddenTitleHolder	= '<div class="title_holder"><h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3><p>'.$post_cats.'</p></div>';
			$fn_list .= '<li class="'.$post_cats2.'"><div class="item" data-title="'.$post_title.'" data-category="'.$post_cats2.'">'.$img_holder.$hiddenTitleHolder.'</div></li>';
			$post_cats3 .= $post_cats2.' ';
			wp_reset_postdata();
		}
		$removedLastCharacter 	= rtrim($post_cats3,", "); 				// remove last character from string
		$stringToArray 			= explode(" ", $removedLastCharacter);	// string to array
		$removeUniqueElements 	= array_unique($stringToArray);			// remove unique elements from array
		
		foreach($removeUniqueElements as $cat){
			$fn_filter 	.= '<li><a href="#" data-filter=".'.$cat.'">'.$cat.'</a></li>';
		}
		
		$fn_list 	.= '</ul>';
		$fn_filter 	.= '</ul>';
		$fn_filter 	.= '<div class="fn_clearfix"></div>';
		if($category_filter == 'enable'){
			$html .= $fn_filter;
		}
		
		$html .= $fn_list;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelProjectCategoryFilter();