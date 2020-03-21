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
class Frel_Triple_Blog extends Widget_Base {

	public function get_name() {
		return 'frel-triple-blog';
	}

	public function get_title() {
		return __( 'Triple Blog', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
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
            'post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'frenify-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0'
            ]
        );
		
		$this->add_control(
            'post_order',
            [
                'label' => esc_html__( 'Post Order', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'frenify-core' ),
                    'desc' 	=> esc_html__( 'Descending', 'frenify-core' )
                ],
                'default' => 'desc',

            ]
        );
		
		$this->add_control(
            'post_orderby',
            [
                'label' => esc_html__( 'Post Orderby', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'select' 			=> esc_html__( 'Select Option', 'frenify-core' ),
                    'ID' 				=> esc_html__( 'By ID', 'frenify-core' ),
                    'author' 			=> esc_html__( 'By Author', 'frenify-core' ),
                    'title' 			=> esc_html__( 'By Title', 'frenify-core' ),
                    'name' 				=> esc_html__( 'By Name', 'frenify-core' ),
                    'rand' 				=> esc_html__( 'Random', 'frenify-core' ),
                    'comment_count' 	=> esc_html__( 'By Number of Comments', 'frenify-core' ),
                    'menu_order' 		=> esc_html__( 'By Page Order', 'frenify-core' ),
                ],
                'default' => 'select',

            ]
        );
		$this->add_control(
            'time_format',
            [
                'label' => esc_html__( 'Date Format', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'month_d_y' 			=> esc_html__( 'Jule 3, 2019', 'frenify-core' ),
                    'm_d_y' 				=> esc_html__( '07/03/2019', 'frenify-core' ),
                    'y_m_d' 				=> esc_html__( '2019/07/03', 'frenify-core' ),
                    'time'	 				=> esc_html__( '18:30', 'frenify-core' ),
                    'time_pm' 				=> esc_html__( '06:30pm', 'frenify-core' ),
                ],
                'default' => 'month_d_y',

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
					'{{WRAPPER}} .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'title_h_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => __( 'Date Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.icon' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		
		$this->end_controls_section();

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		
		$post_offset 	= $settings['post_offset'];
		$post_order 	= $settings['post_order'];
		$post_orderby 	= $settings['post_orderby'];
		$time_format 	= $settings['time_format'];
		if($post_orderby === 'select'){
			$post_orderby 	= '';
		}
		$html = do_shortcode('[frenify_triple_blog time_format="'.$time_format.'" post_offset="'.$post_offset.'" post_order="'.$post_order.'" post_orderby="'.$post_orderby.'"]');
		echo $html;
	}

}
