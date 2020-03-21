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
class Frel_About extends Widget_Base {

	public function get_name() {
		return 'frel-about';
	}

	public function get_title() {
		return __( 'About', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-image-box';
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
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'We are Arlo', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'desc',
		  [
			 'label'   => __( 'Description', 'frenify-core' ),
			 'type'    => Controls_Manager::TEXTAREA,
			 'placeholder' => __( 'Type description here', 'frenify-core' ),
			 'default' 	   => __( '<span>Arlo is a pioneer in design-build specializing in engineering, architecture and construction services to both domestic and international customers. Founded in 1960, Arlo is a family-owned company headquartered in Lexington, Ky. with offices across the U.S., Canada and Japan.</span><span>To provide exceptional services to the insurance industry and thier clients, the property owner. We are committed to providing the highest level of professionalism, service response, and quality workmanship.</span>', 'frenify-core' ),
		  ]
		);
		
		
		
		$this->add_control(
		  'signature',
		  [
			 'label' => __( 'Choose Signature', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
		  ]
		);
		
		$this->add_control(
			'name',
			  [
				 'label'       => __( 'Name', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your name here', 'frenify-core' ),
				 'default' 	   => __( 'Alan Michaelis', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'occ',
			  [
				 'label'       => __( 'Occupation', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your occupation here', 'frenify-core' ),
				 'default' 	   => __( 'Chief Executive', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'right_img',
		  [
			 'label' => __( 'Choose Right Image', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
		  ]
		);
		
		$this->add_control(
		  'dots_img',
		  [
			 'label' => __( 'Choose Dots Part (png)', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .leftpart h3.title' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
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
					'{{WRAPPER}} .leftpart h3.title:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
					'{{WRAPPER}} .leftpart p.desc' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .leftpart h3.name' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
			]
		);
		$this->add_control(
			'occ_color',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .leftpart p.occ' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->add_control(
			'right_border_color',
			[
				'label' => __( 'Right Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .rightpart .border .span1:after,{{WRAPPER}} .rightpart .border .span1:before,{{WRAPPER}} .rightpart .border .span2:after,{{WRAPPER}} .rightpart .border .span2:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
			]
		);
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$title 			= $settings['title'];
		$desc 			= $settings['desc'];
		$signature 		= $settings['signature']['url'];
		$name 			= $settings['name'];
		$occ 			= $settings['occ'];
		$rightimg 		= $settings['right_img']['url'];
		$dots_img 		= $settings['dots_img']['url'];
		
		
		$html = do_shortcode('[frenify_about title="'.$title.'" desc="'.$desc.'" signature="'.$signature.'" name="'.$name.'" occ="'.$occ.'" rightimg="'.$rightimg.'" dots_img="'.$dots_img.'"]');
		echo $html;
	}

}
