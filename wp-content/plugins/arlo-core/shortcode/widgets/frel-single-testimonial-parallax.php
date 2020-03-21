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
class Frel_Single_Testimonial_Parallax extends Widget_Base {

	public function get_name() {
		return 'frel-single-testimonial-parallax';
	}

	public function get_title() {
		return __( 'Single Testimonial Parallax', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
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
			'image',
			[
				'label' 	=> __( 'Choose Image', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'quote',
			  [
				 'label'       => __( 'Quote', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Content goes here', 'frenify-core' ),
				 'default' 	   => __( '“Frenify team are easy to work with and helped me make amazing websites in a short amount of time. Thanks guys for works.”', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'name',
			  [
				 'label'       => __( 'Author Name', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Author name goes here', 'frenify-core' ),
				 'default' 	   => __( 'Jax Anderson - Photographer', 'frenify-core' ),
				 'label_block' => true,
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
			'quote_color',
			[
				'label' => __( 'Quote Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
					'{{WRAPPER}} .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} .fn_cs_single_testimonial_parallax .bg_overlay' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.8)',
			]
		);
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$quote 			= $settings['quote'];
		$name 			= $settings['name'];
		$image 			= $settings['image']['url'];
		$icon 			= '<span class="t_icon"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/img/quotes.svg" alt="" /></span>';
		
		$background		 = '<div class="testimonial_bg">';
			$background		.= '<div class="jarallax" data-speed="0" data-bg-img="'.$image.'"></div>';
			$background		.= '<div class="bg_overlay"></div>';
		$background		.= '</div>';
		
		$content		 = '<div class="testimonial_content">';
			$content		.= '<div class="content_holder">';
				$content		.= $icon;
				$content		.= '<p>'.$quote.'</p>';
				$content		.= '<h3>'.$name.'</h3>';
			$content		.= '</div>';
		$content		.= '</div>';
		
		
		
		// output goes here
		
		$html = Frel_Helper::frel_open_wrap();
		
		$html .= '<div class="fn_cs_single_testimonial_parallax">';
			$html .= $background;
			$html .= $content;
		$html .= '</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
