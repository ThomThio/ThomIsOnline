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
class Frel_Partners extends Widget_Base {

	public function get_name() {
		return 'frel-partners';
	}

	public function get_title() {
		return __( 'Partners', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-title';
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
			'gallery',
			[
				'label' => __( 'Add Images', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
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
			'bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_partners' => 'background-color: {{VALUE}};',
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

		
		$settings 	= $this->get_settings_for_display();
		
		
		
		$html  = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_partners"><div class="container"><div class="partners_inner"><div class="owl-carousel">';
		foreach ( $settings['gallery'] as $image ) {
			$html .= '<div class="item"><img src="' . $image['url'] . '" alt="" /></div>';
		}
		$html .= '</div></div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
