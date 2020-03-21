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
class Frel_Project_Sticky extends Widget_Base {

	public function get_name() {
		return 'frel-project-sticky';
	}

	public function get_title() {
		return __( 'Portfolio Query Sticky', 'frenify-core' );
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
				'label' => __( 'Projects - Right Section', 'frenify-core' ),
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
			'view_more',
			  [
				 'label'       => __( 'View More Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type view more text here', 'frenify-core' ),
				 'default' 	   => __( 'View More', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Content - Left Section', 'frenify-core' ),
			]
		);
		
		
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Our latest <span>Projects</span>', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your description link here', 'frenify-core' ),
				 'default' 	   => __( 'To provide exceptional services to the insurance industry and thier clients, the property owner. We are committed to providing the highest level of professionalism, service response, and quality workmanship.', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'view_all_text_project',
			  [
				 'label'       => __( 'View All link text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type view all link text here', 'frenify-core' ),
				 'default' 	   => __( 'View All Projects', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'view_all_url_project',
			  [
				 'label'       => __( 'View All link URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type view all link URL here', 'frenify-core' ),
				 'default' 	   => '#'
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
			'p_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'p_view_more_color',
			[
				'label' => __( 'View More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'p_view_more_hover_color',
			[
				'label' => __( 'View More Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .item:hover .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'p_line_color',
			[
				'label' => __( 'Bottom Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .item:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'p_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .img_holder a' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.2)',
			]
		);
		$this->add_control(
			'p_bg_hover_color',
			[
				'label' => __( 'Background Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .item:hover .img_holder a' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(15,15,22,.9)',
			]
		);
		$this->add_control(
			'p_plus_hover_color',
			[
				'label' => __( 'Hover Plus Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .img_holder a:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .right_part .img_holder a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'heading_content',
			[
				'label' 	=> __( 'Content', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
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
					'{{WRAPPER}} .left_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#181a2f',
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->add_control(
			'view_all_color',
			[
				'label' => __( 'Link Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part a' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'view_all_arrowcolor',
			[
				'label' => __( 'Link Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part a svg' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->end_controls_section();
		
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$view_all_text_project 		= $settings['view_all_text_project'];
		$view_all_url_project 		= $settings['view_all_url_project'];
		$view_more 					= $settings['view_more'];
		$title 						= $settings['title'];
		$desc 						= $settings['desc'];
		$post_number 				= $settings['post_number']['size'];
		$post_order 				= $settings['post_order'];
		$post_orderby 				= $settings['post_orderby'];
		$post_offset 				= $settings['post_offset'];
		if($post_orderby === 'select'){
			$post_orderby 	= '';
		}
		$html = do_shortcode('[frenify_project_sticky view_all_url_project="'.$view_all_url_project.'" view_all_text_project="'.$view_all_text_project.'" view_more="'.$view_more.'" title="'.$title.'" desc="'.$desc.'" post_number="'.$post_number.'" post_order="'.$post_order.'" post_orderby="'.$post_orderby.'" post_offset="'.$post_offset.'"]');
		echo $html;
	}

}
