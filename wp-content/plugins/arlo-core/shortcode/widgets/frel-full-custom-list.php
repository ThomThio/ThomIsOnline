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
class Frel_Full_Custom_List extends Widget_Base {

	public function get_name() {
		return 'frel-full-custom-list';
	}

	public function get_title() {
		return __( 'Full Custom List', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'top_bar_section',
			[
				'label' => __( 'Top Bar', 'frenify-core' ),
			]
		);
		
		
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Our Industries', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your description link here', 'frenify-core' ),
				 'default' 	   => __( 'The automotive industry is the technological trendsetter among manufacturing industries.', 'frenify-core' ),
			  ]
		);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Services', 'frenify-core' ),
			]
		);
		$this->add_control(
			'column_count',
			[
				'label' => __( 'Column Count', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => 1,
					]
				],
			]
		);
		$this->add_control(
			'view_more',
			  [
				 'label'       => __( 'View More Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type view more text here', 'frenify-core' ),
				 'default' 	   => __( 'View More', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'List Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type list title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_url',
			[
				'label'       => __( 'List URL', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type list URL here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
		  'list_img',
			  [
				 'label' => __( 'List Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			'check_list',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Aerospace and  Defense', 'frenify-core' ),
						'list_url' => '#',
						'list_img' => '',
					],
					[
						'list_title' => __( 'Automative Manufacturing', 'frenify-core' ),
						'list_url' => '#',
						'list_img' => '',
					],
					[
						'list_title' => __( 'Chemical Industry', 'frenify-core' ),
						'list_url' => '#',
						'list_img' => '',
					],
					[
						'list_title' => __( 'Energy & Commodities', 'frenify-core' ),
						'list_url' => '#',
						'list_img' => '',
					],
					[
						'list_title' => __( 'Medical Devices', 'frenify-core' ),
						'list_url' => '#',
						'list_img' => '',
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section3',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'heading_topbar',
			[
				'label' 	=> __( 'Top Bar', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			't_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .top_bar' => 'background-color: {{VALUE}};',
				],
				'default' => '#111724',
			]
		);
		$this->add_control(
			't_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .t_inner h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			't_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .t_inner span' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
			]
		);
		$this->add_control(
			'heading_control',
			[
				'label' 	=> __( 'Navigation Control', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'control_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .owl_control div' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
			]
		);
		$this->add_control(
			'control_arr_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .owl_control .fn_prev:after' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .owl_control .fn_next:after' => 'border-left-color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'heading_service',
			[
				'label' 	=> __( 'Service Section', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'service_hover_bg_color',
			[
				'label' => __( 'Hover Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service_part .item .img_holder:after' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.6)',
			]
		);
		$this->add_control(
			'service_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service_part .item .title h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'service_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service_part .item .title h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'service_link_color',
			[
				'label' => __( 'View More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service_part .item .view_more a' => 'color: {{VALUE}};border-color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'service_link_hover_color',
			[
				'label' => __( 'View More Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service_part .item .view_more a:hover' => 'color: {{VALUE}};border-color: {{VALUE}};',
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
		
		
		$view_more 		= $settings['view_more'];
		$title 			= $settings['title'];
		$desc 			= $settings['desc'];
		$column_count 	= $settings['column_count']['size'];
		$check_list 	= $settings['check_list'];
		
		
		$svg 			= '<span class="arrow"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" /></span>';
		
		$owl_control	= '<div class="owl_control"><div class="fn_prev"></div><div class="fn_next"></div></div>';
		
		$html 			= Frel_Helper::frel_open_wrap();
		$topbar 		= '<div class="top_bar"><div class="t_inner"><h3>'.$title.'</h3><span>'.$desc.'</span>'.$owl_control.'</div></div>';
		$html     	   .= '<div class="fn_cs_service_query" data-column-count="'.$column_count.'">'.$topbar;
		$service 		= '';
		if ( $check_list ) {
			$service = '<div class="service_part"><div class="owl-carousel">';
			foreach ( $check_list as $item ) {
				$post_image 		= $item['list_img']['url'];
				$post_permalink 	= $item['list_url'];
				$post_title 		= $item['list_title'];
				$img_holder			= '<div class="img_holder"><img src="'.FREL_PLUGIN_URL.'assets/img/thumb-480-700.jpg" alt="" /><div class="abs_img" data-bg-img="'.$post_image.'"><a href="'.$post_permalink.'"></a></div></div>';
				$title 				= '<div class="title"><h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3></div>';
				$view_more_link 	= '<div class="view_more"><a href="'.$post_permalink.'"><span class="text">'.$view_more.'</span>'.$svg.'</a></div>';
				$service 		   .= '<div class="item">'.$img_holder.$title.$view_more_link.'</div>';
			}
			$service .= '</div></div>';
		}
		
		$html .= $service.'</div>';
		$html .= Frel_Helper::frel_close_wrap();

		echo $html;
	}

}
