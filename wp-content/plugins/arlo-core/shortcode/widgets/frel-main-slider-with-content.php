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
class Frel_Main_Slider_With_Content extends Widget_Base {

	public function get_name() {
		return 'frel-main-slider-with-content';
	}

	public function get_title() {
		return __( 'Main Slider', 'frenify-core' );
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
				'label' => __( 'Main Slider', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
		  'slider_title',
		  [
			 'label'       	=> __( 'Title', 'frenify-core' ),
			 'type'        	=> Controls_Manager::TEXT,
			 'placeholder' 	=> __( 'Type your title text here', 'frenify-core' ),
			 'default' 		=> __( 'We Are More Than Builders.', 'frenify-core' ),
			 'label_block' => true,
		  ]
		);
		
		
		$this->add_control(
		  'slider_content',
		  [
			 'label'       	=> __( 'Content', 'frenify-core' ),
			 'type'        	=> Controls_Manager::TEXTAREA,
			 'placeholder' 	=> __( 'Type your content text here', 'frenify-core' ),
			 'default' 		=> __( 'We offer the most complete house renovating services in the country, from kitchen design to bathroom re-modelling.', 'frenify-core' ),
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
				 'default' => 5000,
				 'min'     => 500,
				 'max'     => 50000,
				 'step'    => 100,
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
			'overlay_color',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .o_color' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.7)',
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
					'{{WRAPPER}} .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
			]
		);
		
		$this->add_control(
			'nav_panel_bgcolor',
			[
				'label' => __( 'Navigation Panel Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .swiper_controller div' => 'background-color: {{VALUE}};',
				],
				'default' => '#081225',
			]
		);
		
		$this->add_control(
			'nav_panel_arrowcolor',
			[
				'label' => __( 'Navigation Panel Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .swiper_controller .fn_next:after' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .swiper_controller .fn_prev:after' => 'border-right-color: {{VALUE}};',
				],
				'default' => '#ccc',
			]
		);
		
		$this->add_control(
			'pagination_color',
			[
				'label' => __( 'Pagination Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .swiper_pagination > span' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$sliderTitle 	= $settings['slider_title'];
		$sliderContent 	= $settings['slider_content'];
		$autoplayDelay = $settings['autoplay_delay'];
		$main_slide 	= $this->get_settings('main_slide');
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$pagination 	= '<div class="swiper_pagination"></div>';
		$prevnext		= '<div class="swiper_controller"><div class="fn_prev"></div><div class="fn_next"></div></div>';
		$pg_PrevNext 	= '<div class="control_panel"><div class="in">'.$prevnext.$pagination.'</div></div>';
		$slider_title 	= '<div class="content_wrapper"><div class="container"><div class="content_inner"><div class="title_holder"><h3>'.$sliderTitle.'</h3><p>'.$sliderContent.'</p></div>'.$pg_PrevNext.'</div></div></div>';
		$html .= '<div class="fn_cs_main_slider_with_content" data-autoplay-delay="'.$autoplayDelay.'"><div class="inner"><div class="o_color"></div>'.$slider_title.'<div class="swiper-wrapper">';
		if ( $main_slide ) {
			
			foreach ( $main_slide as $item ) {
				
				$slide_image = '<div class="abs_img" data-bg-img="'.$item['slide_image']['url'].'"></div>';
				$html .= '<div class="swiper-slide"><div class="item_holder">'.$slide_image.'</div></div>';
			}
		}
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
