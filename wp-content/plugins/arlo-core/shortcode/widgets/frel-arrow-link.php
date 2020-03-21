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
class Frel_Arrow_Link extends Widget_Base {

	public function get_name() {
		return 'frel-arrow-link';
	}

	public function get_title() {
		return __( 'Link with Arrow', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-arrow-right';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'link_text',
			  [
				 'label'       => __( 'Link Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type link text here', 'frenify-core' ),
				 'default' => __( 'Click Here', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'link_url',
			  [
				 'label'       => __( 'Link URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type link URL here', 'frenify-core' ),
				 'default' 	   => '#'
			  ]
		);
		$this->add_control(
			  'font_size',
			  [
				 'label'   => __( 'Font Size (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 18,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} a' => 'font-size: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'line_height',
			  [
				 'label'   => __( 'Line Height (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 24,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} a' => 'line-height: {{VALUE}}px;',
				],
			  ]
		);
		
		$this->add_control(
			'font_family',
			[
				'label' => __( 'Font Family', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "Rubik",
				'selectors' => [
					'{{WRAPPER}} a' => 'font-family: {{VALUE}}',
				],
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
			'link_color',
			[
				'label' => __( 'Link Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a svg' => 'color: {{VALUE}};',
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
		
		
		$link_text 		= $settings['link_text'];
		$link_url 		= $settings['link_url'];
		$html 			= do_shortcode('[frenify_arrow_link link_text="'.$link_text.'" link_url="'.$link_url.'"]');
		echo $html;
	}

}
