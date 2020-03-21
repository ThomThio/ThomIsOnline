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
class Frel_Principles extends Widget_Base {

	public function get_name() {
		return 'frel-principles';
	}

	public function get_title() {
		return __( 'Principles', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-masonry';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Left Section', 'frenify-core' ),
			]
		);
		$this->add_control(
			'left_title',
			[
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Title Here...', 'frenify-core' ),
				 'default' 	    => __( 'Our Guiding Principles', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$this->add_control(
			'left_content',
			[
				 'label'       	=> __( 'Content', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Content Here...', 'frenify-core' ),
				 'default' 	    => __( '<span>For over 35 years, the Arlo family has been building relationships and projects that last.  As a diversified construction management, design-build, and general contracting firm, Arlo is recognized as one of Upstate New York\'s largest construction companies.</span><span> 
				 Serving an impressive list of long-term clients, we are an organization of seasoned professionals with a tremendous breadth of construction experience and expertise across multiple industries.</span>', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'principles',
			[
				'label' => __( 'Principles', 'frenify-core' ),
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'service_title',
			[
				 'label'       	=> __( 'Principle Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Title Here...', 'frenify-core' ),
				 'default' 	    => __( 'Title goes here', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$repeater->add_control(
			'service_content',
			[
				 'label'       	=> __( 'Principle Content', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Content Here...', 'frenify-core' ),
				 'default' 	    => __( 'Content goes here', 'frenify-core' ),
			]
		);
		$this->add_control(
			'each_principle',
			[
				'label' => __( 'Each Principle Item', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'service_title' => __( 'Humility', 'frenify-core' ),
						'service_content' => __( 'Be humble in all dealings with our partners, clients and team members. True wisdom and understanding belong to the humble.', 'frenify-core' ),
					],
					[
						'service_title' => __( 'Honesty', 'frenify-core' ),
						'service_content' => __( 'Be sure of our facts and be honest and straightforward in all of our dealings with each other and our clients.', 'frenify-core' ),
					],
					[
						'service_title' => __( 'Passion', 'frenify-core' ),
						'service_content' => __( 'Success is when we can achieve results in the things we are passionate about and feel as though we are making a difference.', 'frenify-core' ),
					],
					[
						'service_title' => __( 'Quality Work', 'frenify-core' ),
						'service_content' => __( 'We ensure that all projects are done with utmost professionalism using quality materials while offering clients the support and accessibility.', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ service_title }}}',
			]
		);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Design', 'frenify-core' ),
			]
		);
		
		$this->add_control(
		  'design_mode',
		  [
			 'label'       => __( 'Layout', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'modern',
			 'options' => [
				'modern'  => __( 'Modern', 'frenify-core' ),
				'classic' => __( 'Classic', 'frenify-core' ),
			 ]
		  ]
		);
		$this->add_control(
			'left_part_coloring',
			[
				'label' => __( 'Left Section', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'l_title_color',
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
				'default' => '#041230',
			]
		);
		
		$this->add_control(
			'l_title_line_color',
			[
				'label' => __( 'Title Line Color', 'frenify-core' ),
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
			'l_content_color',
			[
				'label' => __( 'Content Color', 'frenify-core' ),
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
			'right_part_coloring',
			[
				'label' => __( 'Right Section', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'frame_color',
			[
				'label' => __( 'Frame Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} li .title_holder:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} li .item:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} li .title_holder:before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} li .item:before' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#e9eff4',
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
					'{{WRAPPER}} .item .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .right_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .number_holder' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'number_bgcolor',
			[
				'label' => __( 'Number Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .number_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#ad3110',
			]
		);
		
		
		
		
		
		$this->end_controls_section();

		
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$each_principle 	= $settings['each_principle'];
		$left_title 		= $settings['left_title'];
		$left_content 		= $settings['left_content'];
		$design_mode 		= $settings['design_mode'];
		
		
		$html			= Frel_Helper::frel_open_wrap();
		$html 			.= '<div class="fn_cs_principles '.$design_mode.'"><div class="container"><div class="inner">';
		$left_part		= '<div class="left_part"><h3>'.$left_title.'</h3><p>'.$left_content.'</p></div>';
		$right_part		= '<div class="right_part"><ul class="fn_cs_masonry">';
		if ( $each_principle ) {
			
			foreach ( $each_principle as $key => $item ) {
				$key++;
				if($key<10){
					$number = '0'.$key;
				}else{
					$number = $key;
				}
				$right_part .= '<li class="fn_cs_masonry_in"><div class="item"><div class="title_holder"><h3>'.$item['service_title'].'</h3><p>'.$item['service_content'].'</p></div><div class="number_holder">'.$number.'</div></div></li>';
			}
		}
		$right_part .= '</ul></div>';
		$html .= $left_part.$right_part;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
