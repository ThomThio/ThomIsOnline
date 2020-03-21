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
class Frel_Hero_Header_All_In_One extends Widget_Base {

	public function get_name() {
		return 'frel-hero-header-all-in-one';
	}

	public function get_title() {
		return __( 'Hero Header All In One', 'frenify-core' );
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
				 'default' 	   => __( 'Albert <span>Walkers</span>', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		
		$this->add_control(
		  	'desc',
			  [
				 'label'   => __( 'Description Pretext', 'frenify-core' ),
				 'type'    => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your Description pretext here', 'frenify-core' ),
				 'default' 	   => __( 'I\'m a', 'frenify-core' ),
			  ]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'module_title',
			[
				 'label'       	=> __( 'Description Slide Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide text here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'module_items',
			[
				'label' => __( 'Description Slide Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_title' 			=> __( 'Freelancer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Web Developer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Photographer', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ module_title }}}',
			]
		);
		
		$this->add_control(
			  'image_url',
			  [
				 'label' => __( 'Choose Center Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
				  'default' 	=> [
					'url' 		=> ARLO_PLACEHOLDERS_URL.'bro.jpg'
				 ],
			  ]
		);
		
		$this->add_control(
			'slide_down',
			  [
				 'label'       => __( 'Enter ID of your section to smooth jump', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'label_block' => true,
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
			'bg_type',
			[
				'label' => __( 'Background Type', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'parallax',
				'options' => [
					'static'  		=> __( 'Static Image', 'frenify-core' ),
					'parallax'  	=> __( 'Parallax', 'frenify-core' ),
					'glitch'  		=> __( 'Glitch', 'frenify-core' ),
					'water'  		=> __( 'Water Effect', 'frenify-core' ),
					'kenburnsy'  	=> __( 'Kenburnsy', 'frenify-core' ),
					'particles'  	=> __( 'Particles', 'frenify-core' ),
					'nothing'  		=> __( 'Nothing', 'frenify-core' ),
				],
			]
		);
		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
				'condition' => [
					'bg_type' => 'kenburnsy',
				]
			]
		);
		
		
		$this->add_control(
			  'bg_img_url',
			  [
				'label' => __( 'Background Image', 'frenify-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> ARLO_PLACEHOLDERS_URL.'bro_1.jpeg'
				],
				'condition' => [
					'bg_type' => array('static','parallax','particles','video','glitch')
				]
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
				'condition' => [
					'bg_type' => array('static','particles','video','glitch')
				]
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
				'condition' => [
					'bg_type' => array('static','particles','video','glitch')
				]
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
				'condition' => [
					'bg_type' => array('static','particles','video','glitch')
				]
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
			'title_span_color',
			[
				'label' => __( 'Title Span Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content_holder h3 span' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} .fn_cs_hero_header_exclusive .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_hero_header_exclusive > a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		
		$this->add_control(
			'bg_color',
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
				'default' => 'rgba(0,0,0,.6)',
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
		$description 		= $settings['desc'];
		
		$h_wort 			= $settings['h_wort'];
		$bg_img_url 		= $settings['bg_img_url']['url'];
		$image 				= $settings['image_url']['url'];
		$module_items		= $settings['module_items'];
		$items				= '';
		if($module_items){
			foreach($module_items as $module_item){
				$items .= $module_item['module_title'] . ':::';
			}
		}
		if($items != ''){
			$items = substr($items, 0, -3);
		}
		
		
		
		$bg_type 			= $settings['bg_type'];
		if($bg_type == 'parallax'){
			$oImage			 = '<div class="o_img jarallax" data-speed="0.5" data-bg-img="'.$bg_img_url.'"></div>';
			$oImage			.= '<div class="o_color"></div>';
		}else if($bg_type == 'static'){
			$oImage			 = '<div class="o_img" data-bg-img="'.$bg_img_url.'"></div>';
			$oImage			.= '<div class="o_color"></div>';
		}else if($bg_type == 'particles'){
			$oImage			 = '<div class="o_img" data-bg-img="'.$bg_img_url.'"></div><div id="particles-js"></div>';
			$oImage			.= '<div class="o_color"></div>';
		}else if($bg_type == 'glitch'){
			$oImage			 = '<div class="o_img fn_glitch" data-bg-img="'.$bg_img_url.'"></div>';
			$oImage			.= '<div class="o_color"></div>';
		}else if($bg_type == 'water'){
			$oImage			 = '<div class="o_img fn_ripple" style="background-image:url('.$bg_img_url.')"><div class="o_color"></div></div>';
		}else if($bg_type == 'kenburnsy'){
			$oImage			 = '<div class="fn_cs_kenburnsy_wrap"><div class="fn_cs_kenburnsy">';
			foreach($settings['gallery'] as $item){
				$oImage 	.= '<img src="'.$item['url'].'" alt="" />';
			}
			$oImage			.= '</div></div>';
			$oImage			.= '<div class="o_color"></div>';
		}else if($bg_type == 'nothing'){
			$oImage			 = '';
		}
		$html 				= Frel_Helper::frel_open_wrap();
		$title_holder		= '<div class="title_holder"><span class="t_image" style="background-image:url('.$image.')"></span><h3>'.$title.'</h3><p>'.$description.' <span class="arlo_fn_animation_text" data-items="'.$items.'"></span></p></div>';
		
		$icon				= '<a class="bounce" href="#'.$settings['slide_down'].'"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/down-1.svg" alt="svg" /></a>';
		
		$content 			= '<div class="container"><div class="content_holder">'.$title_holder.'</div></div>';
		$bGround			= '<div class="bg_holder">'.$oImage.'</div>';
		$html .= '<div class="fn_cs_hero_header_exclusive fn_cs_o_'.$bg_type.'" data-height="'.$h_wort.'">'.$content.$bGround.$icon.'</div>';
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
