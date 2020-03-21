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
class Frel_Services_Numbered_Modern extends Widget_Base {

	public function get_name() {
		return 'frel-services-numbered-modern';
	}

	public function get_title() {
		return __( 'Services Numbered Modern ', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-settings';
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
				'label'       => __( 'Service Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'Service Description', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service description here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'list_url',
			[
				'label'       => __( 'Service URL', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service URL here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_read',
			[
				'label'       => __( 'Service Link Text', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service link text here', 'frenify-core' ),
				'default'	  => __( 'Read More...', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'check_list',
			[
				'label' => __( 'Service List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_url' 		=> '#',
						'list_read' 	=> __( 'Read More...', 'frenify-core' ),
						'list_title' 	=> __( 'Web Development', 'frenify-core' ),
						'list_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
					],
					[
						'list_url' 		=> '#',
						'list_read' 	=> __( 'Read More...', 'frenify-core' ),
						'list_title' 	=> __( 'Graphic Design', 'frenify-core' ),
						'list_desc' 	=> __( 'Graphic design is the process of visual communication and problem-solving...', 'frenify-core' ),
					],
					[
						'list_url' 		=> '#',
						'list_read' 	=> __( 'Read More...', 'frenify-core' ),
						'list_title' 	=> __( 'Adobe Photoshop', 'frenify-core' ),
						'list_desc' 	=> __( 'Adobe Photoshop is software that is extensively used for raster image editing...', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
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
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0)',
			]
		);
		
		$this->add_control(
			'shadow_color',
			[
				'label' => __( 'Shadow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.05)',
			]
		);
		$this->add_control(
			'shadow_hover_color',
			[
				'label' => __( 'Shadow Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item:hover' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.2)',
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
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .number_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#e1e1e1',
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
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item > h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
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
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item p.desc_h' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
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
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item p.btn_h a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_services_numbered .snumbered_inner ul li .item p.btn_h a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		
		$this->end_controls_section();

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		
		
		$check_list 	= $settings['check_list'];
		$html		 	= Frel_Helper::frel_open_wrap();
		$html			.= '<div class="fn_cs_services_numbered fn_modern"><div class="container">';
		if ( $check_list ) {
			$html .= '<div class="snumbered_inner"><ul>';
			foreach ( $check_list as $key => $item ) {
				$key++;if($key<10){$keyy = '0'.$key;}else{$keyy = $key;}$number = '<div class="number_holder"><h3>'.$keyy.'</h3></div>';
				
				$html .= '<li><div class="item">';
					$html .= $number;
					$html .= '<h3>'.$item['list_title'].'</h3>';
					$html .= '<p class="desc_h">'.$item['list_desc'].'</p>';
					if($item['list_url'] != ''){
						$html .= '<p class="btn_h"><a href="'.$item['list_url'].'">'.$item['list_read'].'</a></p>';
					}
				$html .= '</div></li>';
			}
			$html .= '</ul></div>';
		}
		$html .= '</div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
