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
class Frel_Check_List extends Widget_Base {

	public function get_name() {
		return 'frel-check-list';
	}

	public function get_title() {
		return __( 'Checklist', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox';
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
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Checklist Title', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => __( 'Title', 'frenify-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'frenify-core' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'check_list',
			[
				'label' => __( 'Accordion Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'We Have ISO Certificate', 'frenify-core' ),
					],
					[
						'list_title' => __( 'We Provide High Services', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Most Expirienced Company', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Responsive and Respectful', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Environmental Sensitivity', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
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
					'{{WRAPPER}} .fn_cs_check_list h3' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
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
					'{{WRAPPER}} .fn_cs_check_list p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
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
					'{{WRAPPER}} .fn_cs_check_list svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_check_list img' => 'color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->end_controls_section();
		

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$check_list 	= $settings['check_list'];
		$title 			= $settings['title'];
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$html .= '<div class="fn_cs_check_list"><h3>'.$title.'</h3>';
		$svg 	= '<img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/check.svg" alt="" />';
		if ( $check_list ) {
			$html .= '<div class="list"><ul>';
			foreach ( $check_list as $item ) {
				
				$html .= '<li><div class="item">'.$svg.'<p>'.$item['list_title'].'</p></div></li>';
			}
			$html .= '</ul></div>';
		}
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
