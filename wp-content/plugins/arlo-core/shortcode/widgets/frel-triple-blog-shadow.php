<?php
namespace Frel\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Frel\Frel_Helper;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Frel Site Title
 */
class Frel_Triple_Blog_Shadow extends Widget_Base {

	public function get_name() {
		return 'frel-triple-blog-shadow';
	}

	public function get_title() {
		return __( 'Triple Blog Shadow', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
            'post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'frenify-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0'
            ]
        );
		
		$this->add_control(
            'post_order',
            [
                'label' => esc_html__( 'Post Order', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'frenify-core' ),
                    'desc' 	=> esc_html__( 'Descending', 'frenify-core' )
                ],
                'default' => 'desc',

            ]
        );
		
		$this->add_control(
            'post_orderby',
            [
                'label' => esc_html__( 'Post Orderby', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'select' 			=> esc_html__( 'Select Option', 'frenify-core' ),
                    'ID' 				=> esc_html__( 'By ID', 'frenify-core' ),
                    'author' 			=> esc_html__( 'By Author', 'frenify-core' ),
                    'title' 			=> esc_html__( 'By Title', 'frenify-core' ),
                    'name' 				=> esc_html__( 'By Name', 'frenify-core' ),
                    'rand' 				=> esc_html__( 'Random', 'frenify-core' ),
                    'comment_count' 	=> esc_html__( 'By Number of Comments', 'frenify-core' ),
                    'menu_order' 		=> esc_html__( 'By Page Order', 'frenify-core' ),
                ],
                'default' => 'select',

            ]
        );
		$this->add_control(
            'time_format',
            [
                'label' => esc_html__( 'Date Format', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'month_d_y' 			=> esc_html__( 'Jule 3, 2019', 'frenify-core' ),
                    'm_d_y' 				=> esc_html__( '07/03/2019', 'frenify-core' ),
                    'y_m_d' 				=> esc_html__( '2019/07/03', 'frenify-core' ),
                    'time'	 				=> esc_html__( '18:30', 'frenify-core' ),
                    'time_pm' 				=> esc_html__( '06:30pm', 'frenify-core' ),
                ],
                'default' => 'month_d_y',

            ]
        );
		
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'shadow_color',
			[
				'label' => __( 'Shadow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_triple_blog_shadow .inner ul li .item' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.08)',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
			]
		);
		$this->add_control(
			'author_color',
			[
				'label' => __( 'Author Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder p a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .title_holder p a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		$this->add_control(
			'title_h_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		
		$this->end_controls_section();

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$post_offset 	= $settings['post_offset'];
		$post_order 	= $settings['post_order'];
		$post_orderby 	= $settings['post_orderby'];
		$time_format 	= $settings['time_format'];
		if($post_orderby === 'select'){
			$post_orderby 	= '';
		}
		$query_args = array(
			'post_type' 			=> 'post',
			'posts_per_page' 		=> 3,
			'post_status' 			=> 'publish',
			'offset' 				=> $post_offset,
			'order' 				=> $post_order,
			'orderby' 				=> $post_orderby,
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
		
		$arlo_post_loop = new \WP_Query($query_args);
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_triple_blog_shadow"><div class="container"><div class="inner">';
		$has_img 	= '';
		$posts_part	= '<ul>';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_title			= $fn_post->post_title;
			$author_id			= $fn_post->post_author;
			$authorName			= get_the_author_meta( 'user_nicename' , $author_id );
			$authorURL			= get_the_author_meta( 'user_url' , $author_id );
			$authorURL			= get_author_posts_url(get_the_author_meta('ID'));
			$post_img			= get_the_post_thumbnail_url($post_id, 'full');
			$title 				= '<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
			$info				= '<p><span class="b_by">'.esc_html__('By', 'frenify-core').' <a href="'.$authorURL.'">'.$authorName.'</a></span><span class="b_date">'.get_the_time($format, $post_id).'</span></p>';
			if($post_img != ''){
				$has_img = 'has_img';
			}else{
				$has_img = 'no_img';
			}
			
			$img_holder 		= '<div class="img_holder" data-bg-img="'.$post_img.'"><a href="'.$post_permalink.'"></a><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-370-250.jpg" alt="" /></div>';
			$posts_part 		.= '<li><div class="item '.$has_img.'">'.$img_holder.'<div class="title_holder">'.$info.$title.'</div></div></li>';
			wp_reset_postdata();
		}
		$posts_part .= '</ul>';
		$html .= $posts_part;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
