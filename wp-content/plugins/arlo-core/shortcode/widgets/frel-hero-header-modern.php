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
class Frel_Hero_Header_Modern extends Widget_Base {

	public function get_name() {
		return 'frel-hero-header-modern';
	}

	public function get_title() {
		return __( 'Hero Header Modern', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
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
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'A Global Leader in Automotive Seating & E-Systems.', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		
		$this->add_control(
		  	'description',
			  [
				 'label'   => __( 'Description', 'frenify-core' ),
				 'type'    => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your Description text here', 'frenify-core' ),
				 'default' 	   => __( 'Arlo Corporation is ranked #07 on the Fortune 500 with world-class products designed, engineered and manufactured by a diverse team of talented employees. Our vision is to be consistently recognized as the supplier of choice, an employer of choice, the investment of choice and a company that supports the communities where we do business.', 'frenify-core' ),
			  ]
		);
		
		
		
		$this->add_control(
			'video_text',
			  [
				 'label'       => __( 'Video Link Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your video text here', 'frenify-core' ),
				 'default' 	   => __( 'See how Arlo works', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		
		$this->add_control(
			  'video_link',
			  [
				 'label' => __( 'Video Link URL', 'frenify-core' ),
				 'type' => Controls_Manager::URL,
				 'default' => [
					'url' => '#',
					'is_external' => '',
				 ],
				 'show_external' => false, // Show the 'open in new tab' button.
			  ]
		);
		
		$this->add_control(
			  'video_type',
			  [
				 'label'       	=> __( 'Video Type', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT,
				 'default' 		=> 'youtube_vimeo',
				 'options' 		=> [
					'youtube_vimeo' 	=> __( 'Youtube / Vimeo', 'frenify-core' ),
					'mp4' 				=> __( 'MP4, WebM, Ogg, etc.', 'frenify-core' ),
				 ],
			  ]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_bg',
			[
				'label' => __( 'Background', 'frenify-core' ),
			]
		);
		$this->add_control(
			  'bg_img_url',
			  [
				 'label' => __( 'Background Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			  'bg_position',
			  [
				 'label'       => __( 'Image Position', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'center center',
				 'options' => [
					''						=> __( 'Default', 'frenify-core' ),
					'top left' 				=> __( 'Top Left', 'frenify-core' ),
					'top center' 			=> __( 'Top Center', 'frenify-core' ),
					'top right' 			=> __( 'Top Right', 'frenify-core' ),
					'center left' 			=> __( 'Center Left', 'frenify-core' ),
					'center center' 		=> __( 'Center Center', 'frenify-core' ),
					'center right' 			=> __( 'Center Right', 'frenify-core' ),
					'bottom left' 			=> __( 'Bottom Left', 'frenify-core' ),
					'bottom center' 		=> __( 'Bottom Center', 'frenify-core' ),
					'bottom right' 			=> __( 'Bottom Right', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_img' => 'background-position: {{VALUE}};',
				 ],
			  ]
		);
		$this->add_control(
			  'bg_repeat',
			  [
				 'label'       => __( 'Image Repeat', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'no-repeat',
				 'options' => [
					''					=> __( 'Default', 'frenify-core' ),
					'no-repeat' 		=> __( 'No-Repeat', 'frenify-core' ),
					'repeat' 			=> __( 'Repeat', 'frenify-core' ),
					'repeat-x' 			=> __( 'Repeat-X', 'frenify-core' ),
					'repeat-y' 			=> __( 'Repeat-Y', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_img' => 'background-repeat: {{VALUE}};',
				 ],
			  ]
		);
		$this->add_control(
			  'bg_size',
			  [
				 'label'       => __( 'Background Size', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'cover',
				 'options' => [
					''					=> __( 'Default', 'frenify-core' ),
					'auto' 				=> __( 'Auto', 'frenify-core' ),
					'cover' 			=> __( 'Cover', 'frenify-core' ),
					'contain' 			=> __( 'Contain', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_img' => 'background-size: {{VALUE}};',
				 ],
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
					'{{WRAPPER}} .o_color' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(20,21,30,0.9)',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_dimensions',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			  'h_wort',
			  [
				 'label'       => __( 'Height', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'vh',
				 'options' => [
					'custom'			=> __( 'Custom', 'frenify-core' ),
					'vh' 				=> __( 'Window Height', 'frenify-core' ),
				 ],
			  ]
		);
		
		$this->add_control(
			  'h_wort_pt',
			  [
				 'label'   => __( 'Padding Top (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 252,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .content_holder' => 'padding-top: {{VALUE}}px;',
				],
				'condition' => [
								'h_wort' => array('custom')
								]
			  ]
		);
		
		$this->add_control(
			  'h_wort_pb',
			  [
				 'label'   => __( 'Padding Bottom (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 260,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .content_holder' => 'padding-bottom: {{VALUE}}px;',
				],
				'condition' => [
								'h_wort' => array('custom')
								]
			  ]
		);
		
		$this->add_control(
			  'content_width',
			  [
				 'label'   => __( 'Content Width', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 800,
				 'min'     => 150,
				 'max'     => 1170,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .content_holder' => 'max-width: {{VALUE}}px;',
				],
			  ]
		);
		
		$this->add_control(
			  'video_section_width',
			  [
				 'label'   => __( 'Video Section Width', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 228,
				 'min'     => 150,
				 'max'     => 1170,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .video' => 'max-width: {{VALUE}}px;',
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Title Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content_holder h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
					'{{WRAPPER}} .content_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#ddd',
			]
		);
		
		
		$this->add_control(
			'v_color',
			[
				'label' => __( 'Video Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .video .text' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		
		$this->add_control(
			'v_icon_color',
			[
				'label' => __( 'Video Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .video .icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .video .icon:after' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .video .icon:before' => 'border-color: {{VALUE}};',
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
		
		
		$title 				= $settings['title'];
		$description 		= $settings['description'];
		$video_text 		= $settings['video_text'];
		$video_type 		= $settings['video_type'];
		
		$video_link 		= $this->get_settings( 'video_link' );
		$video_url 			= $video_link['url'];
		
		$h_wort 			= $settings['h_wort'];
		$bg_img_url 		= $settings['bg_img_url']['url'];
		
		$html = do_shortcode('[frenify_hero_header_modern title="'.$title.'" description="'.$description.'" video_text="'.$video_text.'" video_url="'.$video_url.'" h_wort="'.$h_wort.'" bg_img_url="'.$bg_img_url.'" video_type="'.$video_type.'"]');
		echo $html;
	}

}
