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
class Frel_Bottom_Line extends Widget_Base {

	public function get_name() {
		return 'frel-bottom-line';
	}

	public function get_title() {
		return __( 'Bottom Line', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Bottom Line', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( "We are construction partners who are passionate about what we do and our partners success. We pride ourselves on being solution providers.", "frenify-core" ),
			  ]
		);
		$this->add_control(
			  'padding_top',
			  [
				 'label'   => __( 'Padding Top (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 33,
				 'min'     => 0,
				 'max'     => 400,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .inner' => 'padding-top: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'max_width',
			  [
				 'label'   => __( 'Max Width (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 560,
				 'min'     => 0,
				 'max'     => 1170,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .inner p' => 'max-width: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'font_size',
			  [
				 'label'   => __( 'Font Size (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 14,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} p' => 'font-size: {{VALUE}}px;',
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
					'{{WRAPPER}} p' => 'line-height: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			'font_family',
			[
				'label' => __( 'Font Family', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} p' => 'font-family: {{VALUE}}',
				],
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
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
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
					'{{WRAPPER}} .inner' => 'border-top-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.1)',
			]
		);
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$title 		= $settings['title'];
		$html = do_shortcode('[frenify_bottom_line title="'.$title.'"]');
		echo $html;
	}

}
