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
class Frel_Timeline extends Widget_Base {

	public function get_name() {
		return 'frel-timeline';
	}

	public function get_title() {
		return __( 'Timeline', 'frenify-core' );
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
			'list_year',
			[
				'label'       => __( 'Timeline Years', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type timeline years here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'Timeline Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type timeline title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'Timeline Description', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type timeline description here', 'frenify-core' ),
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
						'list_year' 	=> __( '2005 - 2006', 'frenify-core' ),
						'list_title' 	=> __( 'Graphic Designer', 'frenify-core' ),
						'list_desc' 	=> __( 'Photography is the art, application and practice of creating durable images by recording...', 'frenify-core' ),
					],
					[
						'list_year' 	=> __( '2006 - 2009', 'frenify-core' ),
						'list_title' 	=> __( 'Fronted Developer', 'frenify-core' ),
						'list_desc' 	=> __( 'Photography is the art, application and practice of creating durable images by recording...', 'frenify-core' ),
					],
					[
						'list_year' 	=> __( '2009 - 2010', 'frenify-core' ),
						'list_title' 	=> __( 'Mobile App Developer', 'frenify-core' ),
						'list_desc' 	=> __( 'Photography is the art, application and practice of creating durable images by recording...', 'frenify-core' ),
					],
					[
						'list_year' 	=> __( '2010 - 2012', 'frenify-core' ),
						'list_title' 	=> __( 'Junior Ui/Ux Designer', 'frenify-core' ),
						'list_desc' 	=> __( 'Photography is the art, application and practice of creating durable images by recording...', 'frenify-core' ),
					],
					[
						'list_year' 	=> __( '2012 - 2016', 'frenify-core' ),
						'list_title' 	=> __( 'Senior Ui/Ux Designer', 'frenify-core' ),
						'list_desc' 	=> __( 'Photography is the art, application and practice of creating durable images by recording...', 'frenify-core' ),
					],
					[
						'list_year' 	=> __( '2016 - Current', 'frenify-core' ),
						'list_title' 	=> __( 'Lead Ui/Ux Designer', 'frenify-core' ),
						'list_desc' 	=> __( 'Photography is the art, application and practice of creating durable images by recording...', 'frenify-core' ),
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
				'label' => __( 'Year Color', 'frenify-core' ),
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
			foreach ( $check_list as $item ) {				
				$html .= '<li><div class="item">';
					$html .= '<div class="number_holder"><h3>'.$item['list_year'].'</h3></div>';
					$html .= '<h3>'.$item['list_title'].'</h3>';
					$html .= '<p class="desc_h">'.$item['list_desc'].'</p>';
				$html .= '</div></li>';
			}
			$html .= '</ul></div>';
		}
		$html .= '</div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
