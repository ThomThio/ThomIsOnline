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
class Frel_Portfolio_Images extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-images';
	}

	public function get_title() {
		return __( 'Portfolio Images', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Images', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		
		$this->add_control(
			'margin',
			[
				'label' => __( 'Margin', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'	=> [
					'top'		=> 0,
					'left'		=> 0,
					'right'		=> 0,
					'bottom'	=> 50,
					'unit' 		=> 'px',
				]
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		
		$html .= '<div class="fn_cs_portfolio_images"><div class="container"><ul>';
		if ($settings['gallery'] ) {
			
			foreach ( $settings['gallery'] as $item ) {
				
				$html .= '<li><div class="img_holder"><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-560-375.jpg" alt="" /><div class="abs_img" data-bg-img="'.$item['url'].'"></div></div></li>';
			}
		}
		$html .= '</ul></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
