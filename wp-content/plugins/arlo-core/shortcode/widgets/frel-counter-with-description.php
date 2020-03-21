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
class Frel_Counter_With_Description extends Widget_Base {

	public function get_name() {
		return 'frel-counter-with-description';
	}

	public function get_title() {
		return __( 'Counter with Description', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Counter', 'frenify-core' ),
			]
		);
		
		
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'value',
			[
				 'label'   => __( 'Counter Value', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 2000,
				 'min'     => 1,
				 'step'    => 1,
			]
		);
		$repeater->add_control(
			'start_value',
			[
				 'label'   => __( 'Counter Starting Value', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 0,
				 'min'     => 0,
				 'step'    => 1,
			]
		);
		$repeater->add_control(
			'speed',
			[
				 'label'   => __( 'Counter Speed (in milliseconds)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 2000,
				 'min'     => 1,
				 'step'    => 1,
			]
		);
		$repeater->add_control(
			'suffix',
			[
				 'label'       	=> __( 'Counter Suffix', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Counter Suffix', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$repeater->add_control(
			'prefix',
			[
				 'label'       	=> __( 'Counter Prefix', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Counter Prefix', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$repeater->add_control(
			'text',
			[
				 'label'       	=> __( 'Counter Box Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Text Here...', 'frenify-core' ),
				 'default' 	    => __( 'Text Here', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		
		$this->add_control(
			'each_counter',
			[
				'label' => __( 'Each Counter', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'value' => '95',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Web Development', 'frenify-core' ),
					],
					[
						'value' => '80',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Brand Identity', 'frenify-core' ),
					],
					[
						'value' => '85',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Adobe Photoshop', 'frenify-core' ),
					],
					[
						'value' => '70',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Adobe Illustrator', 'frenify-core' ),
					],
					[
						'value' => '77',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'JavaScript', 'frenify-core' ),
					],
					[
						'value' => '83',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'WordPress', 'frenify-core' ),
					],
					[
						'value' => '83',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'CSS & PHP', 'frenify-core' ),
					],
				],
				'title_field' => '{{{text}}}',
			]
		);
		
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		$this->add_control(
			'content_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'default' 	   => __( 'In a <span>short time</span>, I have been able to achieve excellence in all areas of development.', 'frenify-core' ),
				 'label_block' => true,
			  ]
			
		);
		$this->add_control(
			'content_content',
			  [
				 'label'       => __( 'Content', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'default' 	   => __( 'I provide cost-effective and high quality products to meet our Clients’ needs of timely We provide cost-effective and high quality products to meet our Clients’ needs of timely.', 'frenify-core' ),
			  ]
			
		);
		
		$this->add_control(
			'r_bg_color',
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
				'default' => '#fff',
			]
		);
		
		$this->end_controls_section();
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$each_counter 		= $settings['each_counter'];
		$content_title 		= $settings['content_title'];
		$content_content 	= $settings['content_content'];
		
		
		$html			= Frel_Helper::frel_open_wrap();
		$html 			.= '<div class="fn_cs_counter_with_descr"><div class="container"><div class="inner">';
		$leftpart	  	= '<div class="bottom_part"><ul>';
		
		
		
		$title_holder 	= '<h3>'.$content_title.'</h3><p>'.$content_content.'</p>';
		$rightpart		= '<div class="top_part">'.$title_holder.'</div>';
		
		
		
		if ( $each_counter ) {
			
			foreach ( $each_counter as $item ) {
				
				$counter 	= '<span><span class="fn_cs_counter" data-from="'.$item['start_value'].'" data-to="'.$item['value'].'" data-speed="'.$item['speed'].'">0</span>'.$item['suffix'].'</span>';
				$label 		= '<label>'.$item['text'].'</label>';
				$leftpart .= '<li><div>'.$label.$counter.'</div></li>';
			}
		}
		$leftpart .= '</ul></div>';
		
		
		$html .= $rightpart.$leftpart;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
