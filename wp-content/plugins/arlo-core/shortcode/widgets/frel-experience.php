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
class Frel_Experience extends Widget_Base {

	public function get_name() {
		return 'frel-experience';
	}

	public function get_title() {
		return __( 'Experience', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_badge',
			[
				'label' => __( 'Badge', 'frenify-core' ),
			]
		);
		$this->add_control(
			'badge_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Worlds Leading Building <br />Corporation', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'badge_number',
			[
				'label' => __( 'Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 47,
				],
			]
		);
		$this->add_control(
		  'badge_desc',
		  [
			 'label'   => __( 'Description', 'frenify-core' ),
			 'type'    => Controls_Manager::TEXT,
			 'placeholder' => __( 'Type description here', 'frenify-core' ),
			 'default' 	   => __( 'Years of Experience', 'frenify-core' ),
		  ]
		);
		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_list',
			[
				'label' => __( 'Abilities List', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'check_list',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_title' => __( 'Unrivalled workmanship', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Responsive and Respectful', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Professional and Qualified', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Personalised solutions', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Competitive prices', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Integrated Design', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Performance Measures', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Functional Objectives', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Environmental Sensitivity', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Urban Context', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Core Placement', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Critical thinking', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Communication skills', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Problem solving', 'frenify-core' ),
					],
				],
				'fields' => [
				   [
						'name' 		  => 'list_title',
					 	'label'       => __( 'List Title', 'frenify-core' ),
					 	'type'        => Controls_Manager::TEXT,
					 	'placeholder' => __( 'Type list title here', 'frenify-core' ),
						'label_block' => true,
				   ],
			
				],
				'title_field' => '{{list_title}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_bg',
			[
				'label' => __( 'Background', 'frenify-core' ),
			]
		);
		$this->add_control(
			  'bg_img_url',
			  [
				 'label' => __( 'Background Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			  'bg_position',
			  [
				 'label'       => __( 'Image Position', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'center center',
				 'options' => [
					''						=> __( 'Default', 'frenify-core' ),
					'top left' 				=> __( 'Top Left', 'frenify-core' ),
					'top center' 			=> __( 'Top Center', 'frenify-core' ),
					'top right' 			=> __( 'Top Right', 'frenify-core' ),
					'center left' 			=> __( 'Center Left', 'frenify-core' ),
					'center center' 		=> __( 'Center Center', 'frenify-core' ),
					'center right' 			=> __( 'Center Right', 'frenify-core' ),
					'bottom left' 			=> __( 'Bottom Left', 'frenify-core' ),
					'bottom center' 		=> __( 'Bottom Center', 'frenify-core' ),
					'bottom right' 			=> __( 'Bottom Right', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_img' => 'background-position: {{VALUE}};',
				 ],
			  ]
		);
		$this->add_control(
			  'bg_repeat',
			  [
				 'label'       => __( 'Image Repeat', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'no-repeat',
				 'options' => [
					''					=> __( 'Default', 'frenify-core' ),
					'no-repeat' 		=> __( 'No-Repeat', 'frenify-core' ),
					'repeat' 			=> __( 'Repeat', 'frenify-core' ),
					'repeat-x' 			=> __( 'Repeat-X', 'frenify-core' ),
					'repeat-y' 			=> __( 'Repeat-Y', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_img' => 'background-repeat: {{VALUE}};',
				 ],
			  ]
		);
		$this->add_control(
			  'bg_size',
			  [
				 'label'       => __( 'Background Size', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'cover',
				 'options' => [
					''					=> __( 'Default', 'frenify-core' ),
					'auto' 				=> __( 'Auto', 'frenify-core' ),
					'cover' 			=> __( 'Cover', 'frenify-core' ),
					'contain' 			=> __( 'Contain', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_img' => 'background-size: {{VALUE}};',
				 ],
			  ]
		);
		
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .o_color' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(17,17,25,0.9)',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'badge_coloring',
			[
				'label' => __( 'Badge', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'badge_border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .badge_holder' => 'border-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'badge_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'badge_number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .desc span.year' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'badge_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .desc span.text' => 'color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		
		
		
		$this->add_control(
			'list_coloring',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'list_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .list span' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
			]
		);
		$this->add_control(
			'list_line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .list span:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		
		$this->end_controls_section();
		

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		
		
		$badge_title 		= $settings['badge_title'];
		$badge_number 		= $settings['badge_number']['size'];
		$badge_desc 		= $settings['badge_desc'];
		$check_list 		= $settings['check_list'];
		$bg_img_url 		= $settings['bg_img_url']['url'];
		$html				= Frel_Helper::frel_open_wrap();
		
		// --------------------------> MAIN DIV OPENER
		$bg			= '<div class="bg_holder"><div class="o_img" data-bg-img="'.$bg_img_url.'"></div><div class="o_color"></div></div>';
		$badge_holder = '<div class="badge_holder"><div class="title"><h3>'.$badge_title.'</h3></div><div class="desc"><span class="year">'.$badge_number.'</span><span class="text">'.$badge_desc.'</span></div></div>';
		$html	    .= '<div class="fn_cs_experience">'.$bg.'<div class="container"><div class="inner">'.$badge_holder;
		if ( $check_list ) {
			$html .= '<div class="list"><ul>';
			foreach ( $check_list as $item ) {
				
				$html .= '<li><div class="item"><span>'.$item['list_title'].'</span></div></li>';
			}
			$html .= '</ul></div>';
		}
		// --------------------------> MAIN DIV CLOSER
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
