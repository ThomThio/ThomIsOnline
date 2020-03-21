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
class Frel_Single_Testimonial extends Widget_Base {

	public function get_name() {
		return 'frel-single-testimonial';
	}

	public function get_title() {
		return __( 'Single Testimonial', 'frenify-core' );
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
            'content_width',
            [
                'label' => esc_html__( 'Content Width', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'full' 			=> esc_html__( 'Full', 'frenify-core' ),
                    'contained' 	=> esc_html__( 'Contained', 'frenify-core' )
                ],
                'default' => 'contained',

            ]
        );
		$this->add_control(
			'quote',
			  [
				 'label'       => __( 'Quote', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Content goes here', 'frenify-core' ),
				 'default' 	   => __( 'Hiday Motors needed to build a brand new 28,000 sf facility that would both meet our needs and comply with GMs standards - which seemed daunting, to say the least. Arlo alleviated all of our concerns and communicated with us every step of the way. We have received dozens of compliments from our customers, and our employees love the new store!', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'name',
			  [
				 'label'       => __( 'Author Name', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Author name goes here', 'frenify-core' ),
				 'default' 	   => __( 'Steve Lehman', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'occ',
			  [
				 'label'       => __( 'Author Occupation', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Author occupation goes here', 'frenify-core' ),
				 'default' 	   => __( 'CEO of Hiday Motors.', 'frenify-core' ),
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
			'occ_color',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h5' => 'color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
					'{{WRAPPER}} .inner' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(238,238,238,0.2)',
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
					'{{WRAPPER}} svg,{{WRAPPER}} img' => 'color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
		$occ 			= $settings['occ'];
		$content_width 	= $settings['content_width'];
		$html = do_shortcode('[frenify_single_testimonial quote="'.$quote.'" name="'.$name.'" occ="'.$occ.'" content_width="'.$content_width.'"]');
		echo $html;
	}

}
