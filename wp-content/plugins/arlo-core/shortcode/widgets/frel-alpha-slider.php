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
class Frel_Alpha_Slider extends Widget_Base {

	public function get_name() {
		return 'frel-alpha-slider';
	}

	public function get_title() {
		return __( 'Alpha Slider', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		
		$this->start_controls_section(
			'all_filter',
			[
				'label' => __( 'Slides', 'frenify-core' ),
			]
		);
		
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'module_title',
			[
				 'label'       	=> __( 'Slide Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide Title Here...', 'frenify-core' ),
				 'default' 	    => __( 'Slide Title', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'module_url',
			[
				 'label'       	=> __( 'Slide URL', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide URL Here...', 'frenify-core' ),
				 'default' 	    => '#',
				 'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'module_categories',
			[
				 'label'       	=> __( 'Slide Subtitle', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide Subtitle Here...', 'frenify-core' ),
				 'default' 	    => __( 'Subtitle', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'module_desc',
			[
				 'label'       	=> __( 'Slide Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Slide Description Here...', 'frenify-core' ),
				 'default' 	    => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'module_image',
			[
				 'label' 		=> __( 'Slide Image', 'frenify-core' ),
				 'type' 		=> Controls_Manager::MEDIA,
				 'default' 		=> [
					'url' 		=> ARLO_PLACEHOLDERS_URL.'1.jpg'
				 ],
			]
		);
		$this->add_control(
			'module_items',
			[
				'label' => __( 'Slide Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_title' 			=> __( 'Alpha Title', 'frenify-core' ),
						'module_categories' 	=> __( 'Modern', 'frenify-core' ),
						'module_url' 			=> '#',
						'module_desc' 			=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
						'module_image' 	=> [
							'url'		=> ARLO_PLACEHOLDERS_URL.'1.jpg',
						]
					],
					[
						'module_title' 			=> __( 'Beta Title', 'frenify-core' ),
						'module_categories' 	=> __( 'Colorful', 'frenify-core' ),
						'module_url' 			=> '#',
						'module_desc' 			=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
						'module_image' 	=> [
							'url'		=> ARLO_PLACEHOLDERS_URL.'2.jpg',
						]
					],
					[
						'module_title' 			=> __( 'Gamma Title', 'frenify-core' ),
						'module_categories' 	=> __( 'Beautiful', 'frenify-core' ),
						'module_url' 			=> '#',
						'module_desc' 			=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
						'module_image' 	=> [
							'url'		=> ARLO_PLACEHOLDERS_URL.'3.jpg',
						]
					],
					[
						'module_title' 			=> __( 'Delta Title', 'frenify-core' ),
						'module_categories' 	=> __( 'Amazing', 'frenify-core' ),
						'module_url' 			=> '#',
						'module_desc' 			=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
						'module_image' 	=> [
							'url'		=> ARLO_PLACEHOLDERS_URL.'4.jpg',
						]
					],
					[
						'module_title' 			=> __( 'Epsilon Title', 'frenify-core' ),
						'module_categories' 	=> __( 'Wonderful', 'frenify-core' ),
						'module_url' 			=> '#',
						'module_desc' 			=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
						'module_image' 	=> [
							'url'		=> ARLO_PLACEHOLDERS_URL.'5.jpg',
						]
					],
					[
						'module_title' 			=> __( 'Eta Title', 'frenify-core' ),
						'module_categories' 	=> __( 'Easy', 'frenify-core' ),
						'module_url' 			=> '#',
						'module_desc' 			=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat nibh vel odio auctor maximus. Praesent a magna ac nisl ornare vulputate. Vestibulum a leo non orci rhoncus semper.', 'frenify-core' ),
						'module_image' 	=> [
							'url'		=> ARLO_PLACEHOLDERS_URL.'6.jpg',
						]
					],
				],
				'title_field' => '{{{ module_title }}}',
			]
		);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'slider_alpha_design',
			[
				'label' => __( 'Design', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'sa_main_style',
			[
				'label' => __( 'Main Styles', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
            'box_position',
            [
                'label' => esc_html__( 'Title Box Position', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'tl' 					=> esc_html__( 'Top Left', 'frenify-core' ),
                    'tm' 					=> esc_html__( 'Top Middle', 'frenify-core' ),
                    'tr' 					=> esc_html__( 'Top Right', 'frenify-core' ),
                    'cl' 					=> esc_html__( 'Center Left', 'frenify-core' ),
                    'cm' 					=> esc_html__( 'Center Middle', 'frenify-core' ),
                    'cr' 					=> esc_html__( 'Center Right', 'frenify-core' ),
                    'bl' 					=> esc_html__( 'Bottom Left', 'frenify-core' ),
                    'bm' 					=> esc_html__( 'Bottom Middle', 'frenify-core' ),
                    'br' 					=> esc_html__( 'Bottom Right', 'frenify-core' ),
                ],
                'default' => 'cl',

            ]
        );
		
		$this->add_control(
            'slide_effect',
            [
                'label' => esc_html__( 'Slide Effect', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'slide' 				=> esc_html__( 'Slide', 'frenify-core' ),
                    'fade' 					=> esc_html__( 'Fade', 'frenify-core' ),
                    'cube' 					=> esc_html__( 'Cube', 'frenify-core' ),
                    'coverflow' 			=> esc_html__( 'Coverflow', 'frenify-core' ),
                    'flip' 					=> esc_html__( 'Flip', 'frenify-core' ),
                ],
                'default' => 'fade',

            ]
        );
		
		$this->add_control(
            'img_hover_effect',
            [
                'label' => esc_html__( 'Image Scale Effect', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'enabled' 				=> esc_html__( 'Enabled', 'frenify-core' ),
                    'disabled' 				=> esc_html__( 'Disabled', 'frenify-core' ),
                ],
                'default' => 'enabled',

            ]
        );
		$this->add_control(
            'title_hover_effect',
            [
                'label' => esc_html__( 'Title Smooth Effect', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'enabled' 				=> esc_html__( 'Enabled', 'frenify-core' ),
                    'disabled' 				=> esc_html__( 'Disabled', 'frenify-core' ),
                ],
                'default' => 'enabled',

            ]
        );
		$this->add_control(
            'progress_bar',
            [
                'label' => esc_html__( 'Progress Bar', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'enabled' 				=> esc_html__( 'Enabled', 'frenify-core' ),
                    'disabled' 				=> esc_html__( 'Disabled', 'frenify-core' ),
                ],
                'default' => 'disabled',

            ]
        );
		$this->add_control(
            'sa_autoplay_switch',
            [
                'label' => esc_html__( 'Autoplay', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'enabled' 				=> esc_html__( 'Enabled', 'frenify-core' ),
                    'disabled' 				=> esc_html__( 'Disabled', 'frenify-core' ),
                ],
                'default' => 'enabled',

            ]
        );
		$this->add_control(
			 'sa_autoplay_time',
			  [
				 'label'   => __( 'Autoplay Time in Milliseconds', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 7000,
				 'min'     => 500,
				 'max'     => 20000,
				 'step'    => 50,
				'condition' => ['sa_autoplay_switch' => 'enabled']
			  ]
		);
		
		$this->add_control(
			'sa_colors_style',
			[
				'label' => __( 'Box Style', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sa_title_bgcolor',
			[
				'label' => __( 'Title Holder Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(14,14,14,0.9)',
			]
		);
		
		$this->add_control(
			'sa_nav_color',
			[
				'label' => __( 'Navigation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .owl_control span.a' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .owl_control span.b' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .owl_control > div:after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .owl_control > div > span:hover:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .owl_control > div > span:hover:before' => 'border-top-color: {{VALUE}};border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha[data-nav-types="square"] .owl_control > div > span:before, {{WRAPPER}} .arlo_slider_alpha[data-nav-types="square"] .owl_control > div > span:after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .arlo_slider_alpha[data-nav-types="square"] .owl_control > div > span .c:before, {{WRAPPER}} .arlo_slider_alpha[data-nav-types="square"] .owl_control > div > span .c:after' => 'background: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'sa_nav_bg_color',
			[
				'label' => __( 'Navigation Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .owl_control > div' => 'background-color: {{VALUE}};',
				],
				'default' => '#d91a46',
			]
		);
		$this->add_control(
			'sa_category_style',
			[
				'label' => __( 'Subtitle Style', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'sa_category_show',
			[
				'label' => __( 'Subtitle Show', 'frenify-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' 	=> __( 'Show', 'frenify-core' ),
				'label_off' => __( 'Hide', 'frenify-core' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sa_typography_2',
				'label' => __( 'Subtitle Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .arlo_slider_alpha .item .title_holder p',
				'condition' => [
								'sa_category_show' => 'yes'
								]
			]
		);
		$this->add_control(
			'sa_category_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .title_holder p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .title_holder p a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'condition' => [
								'sa_category_show' => 'yes'
								],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'sa_title_style',
			[
				'label' => __( 'Title Style', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sa_typography_3',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .arlo_slider_alpha .title_holder h3 a',
			]
		);
		
		$this->add_control(
			'sa_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .title_holder h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'sa_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .title_holder h3:hover a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .arlo_slider_alpha .title_holder h3:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'sa_desc_style',
			[
				'label' => __( 'Description Style', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sa_desc_show',
			[
				'label' => __( 'Description Show', 'frenify-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' 	=> __( 'Show', 'frenify-core' ),
				'label_off' => __( 'Hide', 'frenify-core' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sa_typography_4',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .arlo_slider_alpha .item .title_holder .desc',
				'condition' => [
								'sa_desc_show' => 'yes'
								]
			]
		);
		$this->add_control(
			'sa_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .title_holder .desc' => 'color: {{VALUE}};',
				],
				'condition' => [
								'sa_desc_show' => 'yes'
								],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'sa_progress_style',
			[
				'label' => __( 'Progress Style', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sa_progress_color',
			[
				'label' => __( 'Progress Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .swiper-pagination-progressbar' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,140,0,0.23)',
			]
		);
		$this->add_control(
			'sa_progress_active_color',
			[
				'label' => __( 'Progress Active Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_slider_alpha .swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff8f03',
			]
		);
		$this->end_controls_section();

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		
		$module_items			= $settings['module_items'];
		$sa_category_show 		= $settings['sa_category_show'];
		$sa_desc_show 			= $settings['sa_desc_show'];
		$sa_autoplay_switch		= $settings['sa_autoplay_switch'];
		$slide_effect			= $settings['slide_effect'];
		$progress_bar			= $settings['progress_bar'];
		$sa_autoplay_time 		= $settings['sa_autoplay_time'];
		$box_position 			= $settings['box_position'];
		$title_hover_effect 	= $settings['title_hover_effect'];
		$img_hover_effect 		= $settings['img_hover_effect'];
		$arrow	 				= '<span><span class="a"></span><span class="b"></span><span class="c"></span></span>';



		$html 	 	= Frel_Helper::frel_open_wrap();
		$html 		.= '<div class="slider_version">
							<div class="arlo_slider_alpha" data-desc-show="'.$sa_desc_show.'" data-category-show="'.$sa_category_show.'" data-nav-types="square" data-autoplay-switch="'.$sa_autoplay_switch.'" data-autoplay-time="'.$sa_autoplay_time.'" data-effect="'.$slide_effect.'" data-progress="'.$progress_bar.'" data-box-pos="'.$box_position.'" data-img-effect="'.$img_hover_effect.'" data-text-effect="'.$title_hover_effect.'">
								<div class="owl_control">
									<div class="fn_prev">'.$arrow.'</div>
									<div class="fn_next">'.$arrow.'</div>
								</div>
								<div class="swiper-pagination"></div>
								<div class="swiper-wrapper">';

		// repeater
		if ( $module_items ) {

			foreach ( $module_items as $key => $item ) {
				$post_permalink 	= $item['module_url'];
				$post_cats 			= $item['module_categories'];
				$image 				= $item['module_image']['url'];
				$post_title 		= $item['module_title'];
				$desc 				= $item['module_desc'];
				$linkStart			= '';
				$linkEnd			= '';
				if($post_permalink != ''){
					$linkStart		= '<a href="'.$post_permalink.'">';
					$linkEnd		= '</a>';
				}
				$html .= '<div class="swiper-slide">
							<div class="item">
								<div class="img_holder" data-bg-img="'.$image.'" data-src="'.$image.'">
								</div>
								<div class="title_holder">
									<div class="inner">
										<div class="in">
											<p><span>'.$post_cats.'</span></p>
											<h3><span>'.$linkStart.$post_title.$linkEnd.'</span></h3>
											<div class="desc"><span>'.$desc.'<span></div>
										</div>
									</div>
								</div>
							</div>
						 </div>';
			}
		}
		// after repeater
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();

		// ECHO PROCESS
		echo $html;
	}

}
