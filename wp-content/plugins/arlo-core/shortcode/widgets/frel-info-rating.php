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
class Frel_Info_Rating extends Widget_Base {

	public function get_name() {
		return 'frel-info-rating';
	}

	public function get_title() {
		return __( 'Info and Rating', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_left',
			[
				'label' => __( 'Content - Left Section', 'frenify-core' ),
			]
		);
		$this->add_control(
			'l_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Worlds Leading Building Corporation', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'l_desc',
		  [
			 'label'   => __( 'Description', 'frenify-core' ),
			 'type'    => Controls_Manager::TEXTAREA,
			 'placeholder' => __( 'Type description here', 'frenify-core' ),
			 'default' 	   => __( 'To further develop our corporate strengths we have established a corporate mandate to maintain strong core values that truly reflect the companys philosophy.', 'frenify-core' ),
		  ]
		);
		
		$this->add_control(
			'img_list',
			[
				'label' => __( 'Image List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					  [
						 'name' 	  => 'right_image',
						 'label' 	  => __( 'Choose Image', 'frenify-core' ),
						 'type'	 	  => Controls_Manager::MEDIA,
					  ],
				],
				'title_field' => 'Image #',
			]
		);
		
		$this->add_control(
			'video_url',
			  [
				 'label'       => __( 'Video Link URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type video link URL here', 'frenify-core' ),
				 'default' 	   => '#',
				 'label_block' => true
			  ]
		);
		
		$this->add_control(
			'video_link_text',
			  [
				 'label'       => __( 'Video Link Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type video link text here', 'frenify-core' ),
				 'default' 	   => __( 'View Company Promo Video', 'frenify-core' ),
				 'label_block' => true
			  ]
		);
		$this->add_control(
			  'l_pt',
			  [
				 'label'   => __( 'Padding Top (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 150,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .left_part' => 'padding-top: {{VALUE}}px;',
				],
			  ]
		);
		
		$this->add_control(
			  'l_pb',
			  [
				 'label'   => __( 'Padding Bottom (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 150,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .left_part' => 'padding-bottom: {{VALUE}}px;',
				],
			  ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_middle',
			[
				'label' => __( 'Rating - Middle Section', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'rating_url',
			  [
				 'label'       => __( 'Rating URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type rating url here', 'frenify-core' ),
				 'default' 	   => '#',
				 'label_block' => true
			  ]
		);
		$this->add_control(
			'rating_number',
			  [
				 'label'       => __( 'Rating Number', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type rating number here', 'frenify-core' ),
				 'default' 	   => '9.7',
				 'label_block' => true
			  ]
		);
		$this->add_control(
			'rating_text',
			  [
				 'label'       => __( 'Rating Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type rating text here', 'frenify-core' ),
				 'default' 	   => __( 'Customer Rating', 'frenify-core' ),
				 'label_block' => true
			  ]
		);
		$this->add_control(
			'rating_tagline',
			  [
				 'label'       => __( 'Rating Tagline', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type rating tagline here', 'frenify-core' ),
				 'default' 	   => __( 'Full reviews at trustpilot', 'frenify-core' ),
				 'label_block' => true
			  ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_right',
			[
				'label' => __( 'Image - Right Section', 'frenify-core' ),
			]
		);
		$this->add_control(
			  'bg_img_url',
			  [
				 'label' => __( 'Background Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
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
				'default' => 'rgba(14,14,22,0)',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'lp_coloring',
			[
				'label' => __( 'Left Section', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'lp_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .left_part:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .left_part:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#081225',
			]
		);
		$this->add_control(
			'lp_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'lp_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
			]
		);
		
		$this->add_control(
			'lp_video_text_color',
			[
				'label' => __( 'Video Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .l_video .text' => 'color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'lp_video_icon_color',
			[
				'label' => __( 'Video Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .l_video .icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .l_video .icon' => 'border-color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		$this->add_control(
			'lp_video_border_color',
			[
				'label' => __( 'Video Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .l_video .text:after' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.3)',
			]
		);
		
		$this->add_control(
			'mp_coloring',
			[
				'label' => __( 'Middle Section', 'frenify-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'mp_section_color',
			[
				'label' => __( 'Section Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part .m_in' => 'background-color: {{VALUE}};',
				],
				'default' => '#041230',
			]
		);
		$this->add_control(
			'mp_rating_bg_color',
			[
				'label' => __( 'Rating Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part .rating_holder' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .middle_part .r_header' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .middle_part .r_footer:before' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .middle_part .r_footer:after' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#d1122d',
			]
		);
		$this->add_control(
			'mp_rating_shape_color',
			[
				'label' => __( 'Rating Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part .r_header:before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .middle_part .r_header:after' => 'border-right-color: {{VALUE}};',
				],
				'default' => '#6c2c35',
			]
		);
		$this->add_control(
			'mp_rating_stars_color',
			[
				'label' => __( 'Rating Stars Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part .rating_holder' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'mp_rating_number_color',
			[
				'label' => __( 'Rating Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part h3.rating_number' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'mp_rating_text_color',
			[
				'label' => __( 'Rating Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part h3.rating_text' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'mp_rating_tagline_color',
			[
				'label' => __( 'Rating Tagline Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part .tagline_holder span' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'mp_rating_tagline_line_color',
			[
				'label' => __( 'Rating Tagline Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .middle_part .tagline_holder span:after' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.5)',
			]
		);
		$this->end_controls_section();
		

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		
		
		$l_title 			= $settings['l_title'];
		$l_desc 			= $settings['l_desc'];
		$img_list 			= $settings['img_list'];
		$video_link_text 	= $settings['video_link_text'];
		$video_url 			= $settings['video_url'];
		
		$rating_url 		= $settings['rating_url'];
		$rating_number 		= $settings['rating_number'];
		$rating_text 		= $settings['rating_text'];
		$rating_tagline 	= $settings['rating_tagline'];
		$bg_img_url 		= $settings['bg_img_url']['url'];
		$html				= Frel_Helper::frel_open_wrap();
		
		// --------------------------> MAIN DIV OPENER
		$html	    .= '<div class="fn_cs_info_rating"><div class="container"><div class="inner">';
		
		// LEFT SECTION
		$left_part	= '<div class="left_part">';
		$left_part	.= '<div class="title_holder">';
		$left_part	.= '<h3 class="l_title">'.$l_title.'</h3>';
		$left_part	.= '<p class="l_desc">'.$l_desc.'</p>';
		$left_part	.= '</div>';
		if ( $img_list ) {
			$left_part .= '<div class="img_list fn_cs_lightgallery"><div class="owl-carousel">';
			foreach ( $img_list as $item ) {
				$rightImageURL 	= $item['right_image']['url'];
				$image_id 		= arlo_fn_attachment_id_from_url($rightImageURL);
				$thumb 			= arlo_fn_get_image_url_from_id($image_id, 'thumbnail');
				$left_part .= '<div class="item lightbox" data-src="'.$rightImageURL.'"><span class="plus"></span><img src="'.$thumb.'" alt="" /><div class="abs_img" data-bg-img="'.$thumb.'"></div></div>';
			}
			$left_part .= '</div></div>';
		}
		if($video_url !== ''){
			$left_part	.= '<div class="l_video fn_cs_lightgallery"><span class="lightbox" data-src="'.$video_url.'"><span class="icon"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/play-video.svg" alt="svg" /></span><span class="text">'.$video_link_text.'</span></span></div>';
		}
		$left_part	.= '</div>';
		
		// MIDDLE SECTION
		$middle_part	= '<div class="middle_part"><div class="m_in">';
		
		$middle_part	.= '<div class="rating_holder">';
		$middle_part	.= '<div class="r_header"></div>';
		$middle_part	.= '<div class="r_footer"></div>';
		if($rating_url !== ''){
			$middle_part	.= '<a href="'.$rating_url.'"></a>';
		}
		
		$middle_part 	.= '<img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/stars.svg" alt="svg" />';
		$middle_part 	.= '<h3 class="rating_number">'.$rating_number.'</h3>';
		$middle_part 	.= '<h3 class="rating_text">'.$rating_text.'</h3>';
		$middle_part 	.= '</div>';
		$middle_part 	.= '<div class="tagline_holder"><div class="tl_inner">';
		$middle_part 	.= '<span>'.$rating_tagline.'</span>';
		$middle_part 	.= '</div></div>';
		
		$middle_part 	.= '</div></div>';
		
		// RIGHT SECTION
		$right_part		= '<div class="right_part">';
		if($bg_img_url == ''){
			$bg_img_url	= FREL_PLUGIN_URL.'assets/img/info_rating.jpg';
		}
		$right_part		.= '<div class="o_img" data-bg-img="'.$bg_img_url.'"></div>';
		$right_part		.= '<div class="o_color"></div>';
		$right_part		.= '</div>';
		
		$html .= $left_part.$middle_part.$right_part;
		// --------------------------> MAIN DIV CLOSER
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
