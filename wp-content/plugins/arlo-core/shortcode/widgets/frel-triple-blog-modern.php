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
class Frel_Triple_Blog_Modern extends Widget_Base {

	public function get_name() {
		return 'frel-triple-blog-modern';
	}

	public function get_title() {
		return __( 'Triple Blog Modern', 'frenify-core' );
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
			'read_more',
			  [
				 'label'       => __( 'Read More Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Read More text here', 'frenify-core' ),
				 'default'	   => __( 'Read More', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
            'read_more_type',
            [
                'label' => esc_html__( 'Read More Type', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'bg' 	=> esc_html__( 'With Background', 'frenify-core' ),
                    'arr' 	=> esc_html__( 'With Arrow', 'frenify-core' )
                ],
                'default' => 'bg',

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
			'time_bg_color',
			[
				'label' => __( 'Time Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .time span:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .time span:before' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
			]
		);
		$this->add_control(
			'time_text_color',
			[
				'label' => __( 'Time Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .time h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .time h5' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'time_line_color',
			[
				'label' => __( 'Time Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .time h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffc600',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Subtitle Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder p.t_header' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->add_control(
			'subtitle_link_color',
			[
				'label' => __( 'Subtitle Link Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p.t_header a' => 'color: {{VALUE}};border-bottom-color: {{VALUE}}',
				],
				'default' => '#45a2df',
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
			'read_more_color',
			[
				'label' => __( 'Read More Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p.t_footer a.bg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'read_more_bg_color',
			[
				'label' => __( 'Read More Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p.t_footer a.bg' => 'background-color: {{VALUE}};',
				],
				'default' => '#081225',
			]
		);
		$this->add_control(
			'read_more_h_text_color',
			[
				'label' => __( 'Read More Hover Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p.t_footer a.bg:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'read_more_h_bg_color',
			[
				'label' => __( 'Read More Hover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p.t_footer a.bg:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#ad3110',
			]
		);
		$this->add_control(
			'read_more_arr_color',
			[
				'label' => __( 'Read More Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} p.t_footer a.arr' => 'color: {{VALUE}};',
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
		$read_more 		= $settings['read_more'];
		$read_more_type	= $settings['read_more_type'];
		if($post_orderby === 'select'){
			$post_orderby 	= '';
		}
		$html = do_shortcode('[frenify_triple_blog_modern post_offset="'.$post_offset.'" post_order="'.$post_order.'" post_orderby="'.$post_orderby.'" read_more="'.$read_more.'" read_more_type="'.$read_more_type.'"]');
		echo $html;
	}

}
