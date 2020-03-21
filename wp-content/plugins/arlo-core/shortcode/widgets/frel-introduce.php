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
class Frel_Introduce extends Widget_Base {

	public function get_name() {
		return 'frel-introduce';
	}

	public function get_title() {
		return __( 'Introduce', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Introduce', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'subtitle',
			  [
				 'label'       => __( 'Subtitle', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your subtitle text here', 'frenify-core' ),
				 'default'	   => __( 'Let Me Introduce', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
			
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default'	   => __( 'Our Company', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
			
		$this->add_control(
			'description',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default'	   => __( 'For over 47 years, the Constify family has been building relationships and projects that last. We build safe environments and eco-friendly solutions in the communities in which we work. Most importantly, we build strong relationships that allow us to build anything, anywhere.  No matter the job, we go beyond building.', 'frenify-core' ),
			  ]
		);
			
		$this->add_control(
			'badge_title',
			  [
				 'label'       => __( 'Badge Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your badge title text here', 'frenify-core' ),
				 'default'	   => __( "Worlds Leading Building<br />Corporation", "frenify-core" ),
			  ]
		);
			
		$this->add_control(
			'badge_year',
			  [
				 'label'       => __( 'Badge Year', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your badge year here', 'frenify-core' ),
				 'default'	   => __( '47', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'badge_desc',
			  [
				 'label'       => __( 'Badge Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your badge description text here', 'frenify-core' ),
				 'default'	   => __( 'years of experience', 'frenify-core' ),
			  ]
		);
			
		$this->add_control(
			'video_url',
			  [
				 'label'       => __( 'Video URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type video URL here', 'frenify-core' ),
				 'default'	   => 'https://www.youtube.com/watch?v=4sCMGhVX5Ts',
				 'label_block' => true,
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
			'section2',
			[
				'label' => __( 'Background', 'frenify-core' ),
			]
		);
		$this->add_control(
		  'wing_switch',
		  [
			 'label'       => __( 'Wing Switch', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'enable',
			 'options' => [
				'enable'  => __( 'Enable', 'frenify-core' ),
				'disable' => __( 'Disable', 'frenify-core' ),
			 ]
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
				'default' => '#081225',
			]
		);
		$this->add_control(
			  'bg_img',
			  [
				 'label' => __( 'Background Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			  'bg_position',
			  [
				 'label'       => __( 'Background Position', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'bottom left',
				 'options' => [
					'default'				=> __( 'Default', 'frenify-core' ),
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
					'{{WRAPPER}} .o_image' => 'background-position: {{VALUE}};',
				 ],
			  ]
		);
		$this->add_control(
			  'bg_repeat',
			  [
				 'label'       => __( 'Background Repeat', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'no-repeat',
				 'options' => [
					'default'			=> __( 'Default', 'frenify-core' ),
					'no-repeat' 		=> __( 'No-Repeat', 'frenify-core' ),
					'repeat' 			=> __( 'Repeat', 'frenify-core' ),
					'repeat-x' 			=> __( 'Repeat-X', 'frenify-core' ),
					'repeat-y' 			=> __( 'Repeat-Y', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_image' => 'background-repeat: {{VALUE}};',
				 ],
			  ]
		);
		$this->add_control(
			  'bg_size',
			  [
				 'label'       => __( 'Background Size', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'auto',
				 'options' => [
					'default'			=> __( 'Default', 'frenify-core' ),
					'auto' 				=> __( 'Auto', 'frenify-core' ),
					'cover' 			=> __( 'Cover', 'frenify-core' ),
					'contain' 			=> __( 'Contain', 'frenify-core' ),
				 ],
				 'selectors' => [ // You can use the selected value in an auto-generated css rule.
					'{{WRAPPER}} .o_image' => 'background-size: {{VALUE}};',
				 ],
			  ]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'top_wing_color',
			[
				'label' => __( 'Top Wing Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .wing12' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .wing11' => 'border-left-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.2)',
			]
		);
		$this->add_control(
			'bottom_wing_color',
			[
				'label' => __( 'Bottom Wing Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .wing22' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .wing21' => 'border-top-color: {{VALUE}};',
				],
				'default' => 'rgba(8,18,37,0.2)',
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder h5' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
				'default' => '#eee',
			]
		);
		$this->add_control(
			'title_line_color',
			[
				'label' => __( 'Title Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
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
			'badge_border_color',
			[
				'label' => __( 'Badge Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .badge_holder' => 'border-color: {{VALUE}};',
				],
				'default' => '#ad3110',
			]
		);
		$this->add_control(
			'badge_title_color',
			[
				'label' => __( 'Badge Titles Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .badge_holder h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .badge_holder .year' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'badge_content_color',
			[
				'label' => __( 'Badge Content Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .badge_holder span:not(.year)' => 'color: {{VALUE}};',
				],
				'default' => '#ad3110',
			]
		);
		$this->add_control(
			'video_bg_color',
			[
				'label' => __( 'Video Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_introduce span.video' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_introduce span.video span:before' => 'border-color: {{VALUE}};',
				],
				'default' => '#ad3110',
			]
		);
		$this->add_control(
			'video_icon_color',
			[
				'label' => __( 'Video Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_introduce span.video:before, {{WRAPPER}} .fn_cs_introduce span.video:after' => 'border-left-color: {{VALUE}};',
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
		
		
		$subtitle 		= $settings['subtitle'];
		$title 			= $settings['title'];
		$wing_switch 	= $settings['wing_switch'];
		$description 	= $settings['description'];
		$badge_title 	= $settings['badge_title'];
		$badge_year 	= $settings['badge_year'];
		$badge_desc 	= $settings['badge_desc'];
		$video_url 		= $settings['video_url'];
		$video_type 	= $settings['video_type'];
		$bg_img	 		= $settings['bg_img']['url'];
		
		
		$html = do_shortcode('[frenify_introduce subtitle="'.$subtitle.'" title="'.$title.'" description="'.$description.'" badge_title="'.$badge_title.'" badge_year="'.$badge_year.'" badge_desc="'.$badge_desc.'" video_url="'.$video_url.'" bg_img="'.$bg_img.'" wing_switch="'.$wing_switch.'" video_type="'.$video_type.'"]');
		echo $html;
	}

}
