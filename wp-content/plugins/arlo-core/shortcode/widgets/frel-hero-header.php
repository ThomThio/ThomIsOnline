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
class Frel_Hero_Header extends Widget_Base {

	public function get_name() {
		return 'frel-hero-header';
	}

	public function get_title() {
		return __( 'Hero Header', 'frenify-core' );
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
				 'default' 	   => __( 'Main Mission <span>Statement</span>', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		
		$this->add_control(
		  	'description',
			  [
				 'label'   => __( 'Description', 'frenify-core' ),
				 'type'    => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your Description text here', 'frenify-core' ),
				 'default' 	   => __( 'We are committed to providing the highest level of professionalism, service response, and quality workmanship.', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'discover_text',
			  [
				 'label'       => __( 'Discover Link Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your discover text here', 'frenify-core' ),
				 'default' 	   => __( 'Discover', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		
		
		$this->add_control(
			'discover_link',
			  [
				 'label'       => __( 'Discover Link URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type discover link URL here', 'frenify-core' ),
				 'default' 	   => '#',
				 'label_block' => true,
			  ]
		);
		
		$this->add_control(
			'video_text',
			  [
				 'label'       => __( 'Video Link Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your video text here', 'frenify-core' ),
				 'default' 	   => __( 'Watch Video', 'frenify-core' ),
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
				'default' => 'rgba(14,14,22,0.6)',
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
				 'default' => 200,
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
				 'default' => 200,
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
				 'default' => 330,
				 'min'     => 150,
				 'max'     => 1170,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .content_holder' => 'max-width: {{VALUE}}px;',
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
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content_holder h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
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
				'default' => '#ccc',
			]
		);
		
		$this->add_control(
			'd_color',
			[
				'label' => __( 'Discover Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.discover' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		
		
		$this->add_control(
			'd_bg_color',
			[
				'label' => __( 'Discover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.discover' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		
		$this->add_control(
			'd_hover_color',
			[
				'label' => __( 'Discover Hover Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.discover:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		
		$this->add_control(
			'd_hover_bg_color',
			[
				'label' => __( 'Discover Hover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.discover:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#0f0f16',
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
				'default' => '#ccc',
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
				'default' => '#ccc',
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
		$discover_text 		= $settings['discover_text'];
		$video_text 		= $settings['video_text'];
		$discover_url 		= $settings['discover_link'];
		$video_type 		= $settings['video_type'];
		
		$video_link 		= $this->get_settings( 'video_link' );
		$video_url 			= $video_link['url'];
		
		$h_wort 			= $settings['h_wort'];
		$bg_img_url 		= $settings['bg_img_url']['url'];
		
		$html = do_shortcode('[frenify_hero_header title="'.$title.'" description="'.$description.'" discover_text="'.$discover_text.'" video_text="'.$video_text.'" discover_url="'.$discover_url.'" video_url="'.$video_url.'" h_wort="'.$h_wort.'" bg_img_url="'.$bg_img_url.'" video_type="'.$video_type.'"]');
		echo $html;
	}

}
