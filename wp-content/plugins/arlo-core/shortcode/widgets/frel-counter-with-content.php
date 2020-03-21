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
class Frel_Counter_With_Content extends Widget_Base {

	public function get_name() {
		return 'frel-counter-with-content';
	}

	public function get_title() {
		return __( 'Counter with Content', 'frenify-core' );
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
		
		$this->add_control(
			'left_color',
			[
				'label' => __( 'Left Section Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_content:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#0f0f16',
			]
		);
		
		$this->add_control(
			'right_color',
			[
				'label' => __( 'Right Section Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_content:before,{{WRAPPER}} .rightpart:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'counter_numbers_color',
			[
				'label' => __( 'Counter Numbers Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .leftpart h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'counter_title_color',
			[
				'label' => __( 'Counter Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .leftpart p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
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
						'value' => '3572',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '',
						'prefix' => '',
						'text' => __( 'Projects Completed', 'frenify-core' ),
					],
					[
						'value' => '371',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => __( 'K', 'frenify-core' ),
						'prefix' => '',
						'text' => __( 'Company Clients', 'frenify-core' ),
					],
					[
						'value' => '2345',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '',
						'prefix' => '',
						'text' => __( 'Professional Workers', 'frenify-core' ),
					],
					[
						'value' => '173',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '+',
						'prefix' => '',
						'text' => __( 'Company Awards', 'frenify-core' ),
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
			'content_subtitle',
			  [
				 'label'       => __( 'Subtitle', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'default' 	   => __( 'You Have a Reason', 'frenify-core' ),
				 'label_block' => true,
			  ]
			
		);
		$this->add_control(
			'content_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'default' 	   => __( 'Just Choose Us!', 'frenify-core' ),
				 'label_block' => true,
			  ]
			
		);
		$this->add_control(
			'content_content',
			  [
				 'label'       => __( 'Content', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'default' 	   => __( 'We aim to eliminate the task of dividing your project between different architecture and construction company. We are a company that offers design and build services for you from initial sketches to the final construction.', 'frenify-core' ),
			  ]
			
		);
		$this->add_control(
			  'image1',
			  [
				 'label' => __( 'Choose Image #1', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			  'image2',
			  [
				 'label' => __( 'Choose Image #2', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			  'image3',
			  [
				 'label' => __( 'Choose Image #3', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			'r_subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .rightpart h5' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'r_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .rightpart h3' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'r_content_color',
			[
				'label' => __( 'Content Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .rightpart p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
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
		$this->add_control(
			  'r_bg_img',
			  [
				 'label' => __( 'Background Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			  'r_bg_position',
			  [
				 'label'       => __( 'Background Position', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'bottom right',
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
			  'r_bg_repeat',
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
			  'r_bg_size',
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
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$each_counter 		= $settings['each_counter'];
		$content_subtitle 	= $settings['content_subtitle'];
		$content_title 		= $settings['content_title'];
		$content_content 	= $settings['content_content'];
		
		
		$html			= Frel_Helper::frel_open_wrap();
		$html 			.= '<div class="fn_cs_counter_with_content"><div class="container"><div class="inner">';
		$leftpart	  	= '<div class="leftpart"><ul>';
		
		$image1	= $settings['image1']['url'];
		$image2	= $settings['image2']['url'];
		$image3	= $settings['image3']['url'];
		$bgImg	= $settings['r_bg_img']['url'];
		$image_id1 		= arlo_fn_attachment_id_from_url($image1);
		$thumb1 		= arlo_fn_get_image_url_from_id($image_id1, 'thumbnail');
		$image_id2 		= arlo_fn_attachment_id_from_url($image2);
		$thumb2 		= arlo_fn_get_image_url_from_id($image_id2, 'thumbnail');
		$image_id3 		= arlo_fn_attachment_id_from_url($image3);
		$thumb3 		= arlo_fn_get_image_url_from_id($image_id3, 'thumbnail');
		if($bgImg == ''){
			$bgImg = FREL_PLUGIN_URL.'assets/img/cwc-bg.png';
		}
		$img_list = '<div class="img_list fn_cs_lightgallery"><ul><li><div class="lightbox" data-src="'.$image1.'" data-bg-img="'.$thumb1.'"><span class="plus"></span><img src="'.$thumb1.'" alt="" /></div></li><li><div class="lightbox" data-src="'.$image2.'" data-bg-img="'.$thumb2.'"><span class="plus"></span><img src="'.$thumb2.'" alt="" /></div></li><li><div class="lightbox" data-src="'.$image3.'" data-bg-img="'.$thumb3.'"><span class="plus"></span><img src="'.$thumb3.'" alt="" /></div></li></ul></div>';
		
		$title_holder 	= '<h5>'.$content_subtitle.'</h5><h3>'.$content_title.'</h3><p>'.$content_content.'</p>';
		$rightpart		= '<div class="rightpart"><div class="content_holder">'.$title_holder.$img_list.'</div><div class="bg_holder"><div class="o_color"></div><div class="o_image" data-bg-img="'.$bgImg.'"></div></div></div>';
		
		
		
		if ( $each_counter ) {
			
			foreach ( $each_counter as $item ) {
				
				$h3 = '<h3><span class="fn_cs_counter" data-from="'.$item['start_value'].'" data-to="'.$item['value'].'" data-speed="'.$item['speed'].'">0</span>'.$item['suffix'].'</h3>';
				$span = '<p>'.$item['text'].'</p>';
				$leftpart .= '<li><div>'.$h3.$span.'</div></li>';
			}
		}
		$leftpart .= '</ul></div>';
		
		
		$html .= $leftpart.$rightpart;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
