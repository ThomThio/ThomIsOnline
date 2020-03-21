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
class Frel_Info_List extends Widget_Base {

	public function get_name() {
		return 'frel-info-list';
	}

	public function get_title() {
		return __( 'Info list', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox';
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
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'List Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type list title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'List Description', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type list description here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'check_list',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'We Have ISO Certificate', 'frenify-core' ),
						'list_desc' => __( 'An ISO 1900:2007', 'frenify-core' ),
					],
					[
						'list_title' => __( 'We Provide High Services', 'frenify-core' ),
						'list_desc' => __( 'That you have expected', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Most Expirienced Company', 'frenify-core' ),
						'list_desc' => __( 'In the constrution business', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_options',
			[
				'label' => __( 'Options', 'frenify-core' ),
			]
		);
		$this->add_control(
		  'type',
		  [
			 'label'       => __( 'Type', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'contained',
			 'options' => [
				'contained'  	=> __( 'Contained', 'frenify-core' ),
				'full' 			=> __( 'Full', 'frenify-core' ),
			 ]
		  ]
		);
		
		$this->add_control(
		  'cols',
		  [
			 'label'       => __( 'Column Count', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => '3',
			 'options' => [
				'2'  => __( '2 Columns', 'frenify-core' ),
				'3' => __( '3 Columns', 'frenify-core' ),
			 ]
		  ]
		);
		$this->add_control(
			  'h_wort_pt',
			  [
				 'label'   => __( 'Padding Top (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 20,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .fn_cs_info_list.full' => 'padding-top: {{VALUE}}px;',
					'{{WRAPPER}} .fn_cs_info_list.contained .list' => 'padding-top: {{VALUE}}px;',
				],
			  ]
		);
		
		$this->add_control(
			  'h_wort_pb',
			  [
				 'label'   => __( 'Padding Bottom (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 0,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .fn_cs_info_list.full' => 'padding-bottom: {{VALUE}}px;',
					'{{WRAPPER}} .fn_cs_info_list.contained .list' => 'padding-bottom: {{VALUE}}px;',
				],
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
			'bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_info_list.full' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_info_list.contained .list' => 'background-color: {{VALUE}};',
				],
				'default' => '#081225',
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
					'{{WRAPPER}} .fn_cs_info_list h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_info_list p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_info_list svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_info_list .icon' => 'border-color: {{VALUE}};',
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

		
		$settings 	= $this->get_settings();
		
		
		$cols 			= $settings['cols'];
		$check_list 	= $settings['check_list'];
		$type 			= $settings['type'];
		$html		 	= Frel_Helper::frel_open_wrap();
		$html			.= '<div class="fn_cs_info_list '.$type.'" data-cols="'.$cols.'">';
		if($type === 'full'){
			
		}
		$svg 			= '<span class="icon"><img class="arlo_w_fn_svg svg_always" src="'.FREL_PLUGIN_URL.'assets/svg/checked.svg" alt="svg" /><img class="arlo_w_fn_svg svg_hover" src="'.FREL_PLUGIN_URL.'assets/svg/checked.svg" alt="svg" /></span>';
		if ( $check_list ) {
			$html .= '<div class="container"><div class="list"><ul>';
			foreach ( $check_list as $item ) {
				
				$html .= '<li><div class="item">'.$svg.'<h3>'.$item['list_title'].'</h3><p>'.$item['list_desc'].'</p></div></li>';
			}
			$html .= '</ul></div></div>';
		}
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
