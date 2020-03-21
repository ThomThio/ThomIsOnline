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
class Frel_Principles_Modern extends Widget_Base {

	public function get_name() {
		return 'frel-principles-modern';
	}

	public function get_title() {
		return __( 'Principles Modern', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-masonry';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		
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
		$repeater->add_control(
			'service_url',
			[
				 'label'       	=> __( 'Principle URL', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'URL Here...', 'frenify-core' ),
				 'default' 	    => '#',
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
						'service_title' => __( 'Honesty', 'frenify-core' ),
						'service_content' => __( 'Be humble in all dealings with our partners, clients and team members. True wisdom and understanding belong to the humble.', 'frenify-core' ),
						'service_url' => '#',
					],
					[
						'service_title' => __( 'Passion', 'frenify-core' ),
						'service_content' => __( 'Success is when we can achieve results in the things we are passionate about and feel as though we are making a difference.', 'frenify-core' ),
						'service_url' => '#',
					],
					[
						'service_title' => __( 'Quality Work', 'frenify-core' ),
						'service_content' => __( 'We ensure that all projects are done with utmost professionalism using quality materials while offering clients the support and accessibility.', 'frenify-core' ),
						'service_url' => '#',
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
		  'shape_switch',
		  [
			 'label'       => __( 'Shape', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'enable',
			 'options' => [
				'enable'  => __( 'Enable', 'frenify-core' ),
				'disable' => __( 'Disable', 'frenify-core' ),
			 ]
		  ]
		);
		
		$this->add_control(
			'main_bg_color',
			[
				'label' => __( 'Main Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_principles_modern:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#111724',
			]
		);
		
		$this->add_control(
			'contained_bg_color',
			[
				'label' => __( 'Contained Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .inner' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .inner:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .inner:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#0e141f',
			]
		);
		
		$this->add_control(
			'shape_color',
			[
				'label' => __( 'Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .shape span.shape1' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .shape span.shape2' => 'border-left-color: {{VALUE}};',
				],
				'default' => 'rgba(49,99,151,0.4)',
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .item' => 'border-color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'badge_bg_color',
			[
				'label' => __( 'Badge Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .number_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
			]
		);
		
		$this->add_control(
			'badge_shape_color',
			[
				'label' => __( 'Badge Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .number_holder:after' => 'border-top-color: {{VALUE}};',
				],
				'default' => 'rgba(210,78,26,0.4)',
			]
		);
		
		$this->add_control(
			'badge_text_color',
			[
				'label' => __( 'Badge Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .number_holder' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
					'{{WRAPPER}} .item h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
					'{{WRAPPER}} .item p' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
					'{{WRAPPER}} .item a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
		$shape_switch 		= $settings['shape_switch'];
		
		if($shape_switch === 'enable'){
			$shape 			= '<div class="shape"><span class="shape1"></span><span class="shape2"></span></div>';
		}else{
			$shape			= '';
		}
		$html			= Frel_Helper::frel_open_wrap();
		$html 			.= '<div class="fn_cs_principles_modern '.$shape_switch.'"><div class="container"><div class="inner">'.$shape.'<ul class="fn_cs_miniboxes">';
		
		if ( $each_principle ) {
			
			foreach ( $each_principle as $key => $item ) {
				$key++;
				if($key<10){
					$number = '0'.$key;
				}else{
					$number = $key;
				}
				$html .= '<li class="fn_cs_minibox"><div class="item"><div class="title_holder"><a href="'.$item['service_url'].'"></a><h3>'.$item['service_title'].'</h3><p>'.$item['service_content'].'</p><span class="icon"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" /></span></div><div class="number_holder">'.$number.'</div></div></li>';
			}
		}
		$html .= '</ul></div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
