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
 * Frel Team Member
 */
class Frel_Progress_Bar extends Widget_Base {

	public function get_name() {
		return 'frel-progress-bar';
	}

	public function get_title() {
		return __( 'Progress Bar', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		
		$this->start_controls_section(
			'slides',
			[
				'label' 		=> __( 'List', 'frenify-core' ),
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label' 		=> __( 'Progress Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		$repeater->add_control(
			'percentage',
			[
				'label'		 	=> __( 'Progress Percentage', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
			]
		);
		$this->add_control(
			'each_image',
			[
				'label' 	=> __( 'List', 'frenify-core' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'title' 		=> __('Creativity', 'frenify-core'),
					],
					[
						'title' 		=> __('Photoshop', 'frenify-core'),
					],
					[
						'title' 		=> __('Retouching', 'frenify-core'),
					],
					[
						'title' 		=> __('Design', 'frenify-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'options_section',
			[
				'label' 		=> __( 'Options', 'frenify-core' ),
			]
		);
		$this->add_control(
			'striped',
			[
				'label' 	=> __( 'Striped Filling', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'on',
				'options' => [
					'on' 		=> __( 'Enabled', 'frenify-core' ),
					'off' 		=> __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		$this->add_control(
			'height',
			[
				'label' 		=> __( 'Progress Height', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border radius', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg .fn_cs_bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
			'bg_color',
			[
				'label' 		=> __( 'Active Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_bar' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#333',
			]
		);
		$this->add_control(
			'in_bg_color',
			[
				'label' 		=> __( 'Inactive Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#eee',
			]
		);
		$this->add_control(
			'stripe_color',
			[
				'label' 		=> __( 'Stripe Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar' => 'background-image: linear-gradient(-45deg, {{VALUE}} 25%, transparent 25%, transparent 50%, {{VALUE}} 50%, {{VALUE}} 75%, transparent 75%, transparent);',
				],
				'default' 		=> 'rgba(255, 255, 255, .2)',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress span.label' => 'color: {{VALUE}};',
				],
				'default' 		=> '#333',
			]
		);
		$this->add_control(
			'perc_color',
			[
				'label' 		=> __( 'Percentage Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress span.number' => 'color: {{VALUE}};',
				],
				'default' 		=> '#999',
			]
		);
		
		
		
		$this->end_controls_section();

		
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$each_image		 	= $settings['each_image'];
		$striped		 	= $settings['striped'];
		$html				= Frel_Helper::frel_open_wrap();
		$html 			   .= '<div class="fn_cs_progress_bar">';
		if ( $each_image ) {
			foreach ( $each_image as $item ) {
				$html .= '<div class="fn_cs_progress_wrap" data-strip="'.$striped.'">';
				$html .= 	'<div class="fn_cs_progress" data-value="'.$item['percentage']['size'].'">';
				$html .= 		'<span><span class="label">'.$item['title'].'</span><span class="number">'.$item['percentage']['size'].'%</span></span>';
				$html .= 		'<div class="fn_cs_bar_bg">';
				$html .= 			'<div class="fn_cs_bar_wrap">';
				$html .= 				'<div class="fn_cs_bar"></div>';
				$html .= 			'</div>';
				$html .=		'</div>';
				$html .= 	'</div>';
				$html .= '</div>';
			}
		}
		$html 				.= '</div>';
		$html 				.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
