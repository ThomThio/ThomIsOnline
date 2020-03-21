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
class Frel_Kenburnsy extends Widget_Base {

	public function get_name() {
		return 'frel-kenburnsy';
	}

	public function get_title() {
		return __( 'Kenburnsy', 'frenify-core' );
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
				'label' => __( 'Kenburnsy Slider', 'frenify-core' ),
			]
		);
		
		
		
		
		$this->add_control(
			'main_slide',
			[
				'label' => __( 'Each Slide', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[	
						'name' 	=> 'slide_image',
						'label' => __( 'Choose Image', 'frenify-core' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
			
				],
				'title_field' => 'Slide',
			]
		);
		
		$this->add_control(
			  'autoplay_delay',
			  [
				 'label'   => __( 'Autoplay Delay in ms', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 7000,
				 'min'     => 3000,
				 'max'     => 50000,
				 'step'    => 100,
			  ]
		);
		
		$this->end_controls_section();
		
		
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		
		
		$autoplayDelay 	= $settings['autoplay_delay'];
		$main_slide 	= $this->get_settings('main_slide');
		$html		 	= Frel_Helper::frel_open_wrap();
		
		
		$html .= '<div class="fn_cs_kenburnsy_wrap"><div class="fn_cs_kenburnsy" data-interval="'.$autoplayDelay.'">';
		if ( $main_slide ) {
			
			foreach ( $main_slide as $item ) {
				
				$html .= '<img src="'.$item['slide_image']['url'].'" alt="" />';
			}
		}
		$html .= '</div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
