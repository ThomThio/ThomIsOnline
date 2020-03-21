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
class Frel_Location_List extends Widget_Base {

	public function get_name() {
		return 'frel-location-list';
	}

	public function get_title() {
		return __( 'Location List', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
            'layout',
            [
                'label' => esc_html__( 'Layout', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'column' 		=> esc_html__( 'Column', 'frenify-core' ),
                    'list' 			=> esc_html__( 'List', 'frenify-core' ),
                ],
                'default' => 'column',

            ]
        );
		$this->add_control(
            'img_show',
            [
                'label' => esc_html__( 'Images', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'enable' 			=> esc_html__( 'Enable', 'frenify-core' ),
                    'disable' 			=> esc_html__( 'Disable', 'frenify-core' ),
                ],
                'default' => 'disable',

            ]
        );
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'location_title',
			[
				'label' => __( 'Address Title & Description', 'frenify-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Address Title' , 'frenify-core' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'location_description',
			[
				'label' => __( 'Address Description', 'frenify-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Address Description', 'frenify-core' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'location_img',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'main_slide',
			[
				'label' => __( 'Address List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'location_title' => __( 'Washington Office', 'frenify-core' ),
						'location_description' => __( '<span>100-120 Ft.Drive NE, Washington, DC 20011</span><span>Phone: +1 202-415-7234</span><span>Email: <a href="mailto:w.arlo@gmail.com">w.arlo@gmail.com</a></span>', 'frenify-core' ),
					],
					[
						'location_title' => __( 'New-York Office', 'frenify-core' ),
						'location_description' => __( '<span>110-115 Ft.Consort NE, New-York, DC 20031</span><span>Phone: +1 272-436-4524</span><span>Email: <a href="mailto:n.arlo@gmail.com">n.arlo@gmail.com</a></span>', 'elementor' ),
					],
					[
						'location_title' => __( 'Boston Office', 'frenify-core' ),
						'location_description' => __( '<span>100-120 Ft.Albemarle NE, Boston, DC 20017</span><span>Phone: +1 252-925-7564</span><span>Email: <a href="mailto:b.arlo@gmail.com">b.arlo@gmail.com</a></span>', 'elementor' ),
					],
				],
				'title_field' => '{{{ location_title }}}',
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
			'titlebgcolor',
			[
				'label' => __( 'Title Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_location_list .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#111422',
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
					'{{WRAPPER}} .fn_cs_location_list h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'icon_bgcolor',
			[
				'label' => __( 'Icon Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_location_list .icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_location_list .shape' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
					'{{WRAPPER}} .fn_cs_location_list .icon' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		
		$this->add_control(
			'contentbgcolor',
			[
				'label' => __( 'Content Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_location_list .content_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#0d0e13',
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
					'{{WRAPPER}} .fn_cs_location_list p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_location_list a' => 'color: {{VALUE}};',
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
		
		
		$main_slide 	= $settings['main_slide'];
		$img_show 		= $settings['img_show'];
		$layout 		= $settings['layout'];
		$img_holder		= '';
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$html 	.= '<div class="fn_cs_location_list">';
		$loc 	= '<span class="icon_wrapper"><span class="icon"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/location.svg" alt="" /></span><span class="shape"></span></span>';
		if($layout == 'column'){
			$pMini 	= 'fn_cs_miniboxes';
			$chMini = 'fn_cs_minibox';
		}else{
			$pMini 	= '';
			$chMini = '';
		}
		if ( $main_slide ) {
			$html .= '<ul class="'.$layout.' '.$pMini.'">';
			foreach ( $main_slide as $item ) {
				if($img_show == 'enable'){
					$img_holder = '<div class="img_holder"><div class="abs_img" data-bg-img="'.$item['location_img']['url'].'"></div></div>';
				}
				
				$title_holder = '<div class="title_holder '.$chMini.'">'.$loc.'<h3>'.$item['location_title'].'</h3></div>';
				$content_holder = '<div class="content_holder"><p>'.$item['location_description'].'</p></div>';
				$html .= '<li><div class="item">'.$img_holder.$title_holder.$content_holder.'</div></li>';
			}
			$html .= '</ul>';
		}
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
