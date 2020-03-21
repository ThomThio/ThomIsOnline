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
class Frel_Project_Category_Filter extends Widget_Base {

	public function get_name() {
		return 'frel-project-category-filter';
	}

	public function get_title() {
		return __( 'Portfolio with category filter', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Portfolio', 'frenify-core' ),
			]
		);
		$this->add_control(
			'post_number',
			[
				'label' => __( 'Post Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 3,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					]
				],
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
            'category_filter',
            [
                'label' => esc_html__( 'Category Filter', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'disable' 	=> esc_html__( 'Disable', 'frenify-core' ),
                    'enable' 	=> esc_html__( 'Enable', 'frenify-core' )
                ],
                'default' => 'enable',

            ]
        );
		$this->end_controls_section();

		

		$this->start_controls_section(
			'section3',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'heading_project',
			[
				'label' 	=> __( 'Projects', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'category_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		$this->add_control(
			'category_active_color',
			[
				'label' => __( 'Category Active & Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a:hover,{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a.current' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'moving_bg_color',
			[
				'label' => __( 'Moving Content Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_moving_title,{{WRAPPER}} .fn_cs_project_moving_title span' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'moving_text_color',
			[
				'label' => __( 'Moving Content Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_moving_title h3,{{WRAPPER}} .fn_cs_project_moving_title span' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		
		$this->end_controls_section();
		
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 					= $this->get_settings();
		
		
		$post_number 				= $settings['post_number']['size'];
		$post_order 				= $settings['post_order'];
		$post_orderby 				= $settings['post_orderby'];
		$post_offset 				= $settings['post_offset'];
		$category_filter 			= $settings['category_filter'];
		if($post_orderby === 'select'){
			$post_orderby 	= '';
		}
		$html = do_shortcode('[frenify_project_category_filter category_filter="'.$category_filter.'" post_number="'.$post_number.'" post_order="'.$post_order.'" post_orderby="'.$post_orderby.'" post_offset="'.$post_offset.'"]');
		echo $html;
	}

}
