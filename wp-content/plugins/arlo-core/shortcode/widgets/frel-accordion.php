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
class Frel_Accordion extends Widget_Base {

	public function get_name() {
		return 'frel-accordion';
	}

	public function get_title() {
		return __( 'Accordion', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-accordion';
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
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Accordion Title', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'acc_header',
			[
				'label' => __( 'Title & Content', 'frenify-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Accordion Title' , 'frenify-core' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'acc_content',
			[
				'label' => __( 'Content', 'frenify-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Accordion Content', 'frenify-core' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'accordion',
			[
				'label' => __( 'Accordion Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'acc_header' => __( 'Accordion #1', 'frenify-core' ),
						'acc_content' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'frenify-core' ),
					],
					[
						'acc_header' => __( 'Accordion #2', 'frenify-core' ),
						'acc_content' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'title_field' => '{{{ acc_header }}}',
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_accordion h3' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'acc_head_color',
			[
				'label' => __( 'Accordion Header Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_accordion .acc_head p' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'acc_icon_color',
			[
				'label' => __( 'Accordion Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_accordion .plus:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_accordion .plus:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_accordion .plus' => 'border-color: {{VALUE}};',
				],
				'default' => '#45a2df',
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
					'{{WRAPPER}} .fn_cs_accordion .acc_content p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->end_controls_section();
		

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		
		
		$accordion 		= $settings['accordion'];
		$title 			= $settings['title'];
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$html 			.= '<div class="fn_cs_accordion"><h3>'.$title.'</h3>';
		$svg 			= '<span class="plus"></span>';
		if ( $accordion ) {
			foreach ( $accordion as $key => $item ) {
				if($key == 0){
					$abc = 'acc_active';
				}else{
					$abc = '';
				}
				$html .= '<div class="accordion_in '.$abc.'">';
				$html .= '<div class="acc_head">'.$svg.'<p>'.$item['acc_header'].'</p></div>';
				$html .= '<div class="acc_content"><p>'.$item['acc_content'].'</p></div>';
				$html .= '</div>';
			}
		}
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
