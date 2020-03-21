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
class Frel_Why_Choose_Us extends Widget_Base {

	public function get_name() {
		return 'frel-why-choose-us';
	}

	public function get_title() {
		return __( 'Why Choose Us', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-title';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Images', 'frenify-core' ),
			]
		);
		$this->add_control(
			'image_1',
			[
				'label' => __( 'Upload #1 Image', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => ARLO_PLACEHOLDERS_URL.'why-1.jpg'
				],
			]
		);
		$this->add_control(
			'image_2',
			[
				'label' => __( 'Upload #2 Image', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => ARLO_PLACEHOLDERS_URL.'why-2.jpg'
				],
			]
		);
	
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		$this->add_control(
			'icon_type',
			[
				'label' 		=> __( 'Icon Type', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'frenify_icons',
				'label_block'	=> true,
				'options' => [
					'frenify_icons' 				=> __( 'Frenify Icons', 'frenify-core' ),
					'elementor_icons' 				=> __( 'Elementor Icons', 'frenify-core' ),
					'none' 							=> __( 'None', 'frenify-core' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'frenify_icons',
			[
				'label' 		=> __( 'Frenify Icons', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'learning',
				'label_block'	=> true,
				'options' => [					
					'birthday-1'			=> __( 'Birthday #1', 'frenify-core' ),
					'birthday-2'			=> __( 'Birthday #2', 'frenify-core' ),
					'birthday-3'			=> __( 'Birthday #3', 'frenify-core' ),
					'birthday-4'			=> __( 'Birthday #4', 'frenify-core' ),
					
					'browser-1'				=> __( 'Browser #1', 'frenify-core' ),
					'browser-2'				=> __( 'Browser #2', 'frenify-core' ),
					'browser-3'				=> __( 'Browser #3', 'frenify-core' ),
					'browser-4'				=> __( 'Browser #4', 'frenify-core' ),
					'browser-5'				=> __( 'Browser #5', 'frenify-core' ),
					'browser-6'				=> __( 'Browser #6', 'frenify-core' ),
					'browser-7'				=> __( 'Browser #7', 'frenify-core' ),
					
					'calendar-1'			=> __( 'Calendar #1', 'frenify-core' ),
					'calendar-2'			=> __( 'Calendar #2', 'frenify-core' ),
					'calendar-3'			=> __( 'Calendar #3', 'frenify-core' ),
					'calendar-4'			=> __( 'Calendar #4', 'frenify-core' ),
					
					'call-1'				=> __( 'Call #1', 'frenify-core' ),
					'call-2'				=> __( 'Call #2', 'frenify-core' ),
					'call-3'				=> __( 'Call #3', 'frenify-core' ),
					'call-4'				=> __( 'Call #4', 'frenify-core' ),
					'call-5'				=> __( 'Call #5', 'frenify-core' ),
					'call-6'				=> __( 'Call #6', 'frenify-core' ),
					'call-7'				=> __( 'Call #7', 'frenify-core' ),
					'call-8'				=> __( 'Call #8', 'frenify-core' ),
					'call-9'				=> __( 'Call #9', 'frenify-core' ),
					'call-10'				=> __( 'Call #10', 'frenify-core' ),
					
					'category-1'			=> __( 'Category #1', 'frenify-core' ),
					'category-2'			=> __( 'Category #2', 'frenify-core' ),
					
					'client-1'				=> __( 'Client #1', 'frenify-core' ),
					'client-2'				=> __( 'Client #2', 'frenify-core' ),
					'client-3'				=> __( 'Client #3', 'frenify-core' ),
					'client-4'				=> __( 'Client #4', 'frenify-core' ),
					'client-5'				=> __( 'Client #5', 'frenify-core' ),
					'client-6'				=> __( 'Client #6', 'frenify-core' ),
					'client-7'				=> __( 'Client #7', 'frenify-core' ),
					
					'degree-1'				=> __( 'Degree #1', 'frenify-core' ),
					'degree-2'				=> __( 'Degree #2', 'frenify-core' ),
					'degree-3'				=> __( 'Degree #3', 'frenify-core' ),
					'degree-4'				=> __( 'Degree #4', 'frenify-core' ),
					'degree-5'				=> __( 'Degree #5', 'frenify-core' ),
					'degree-6'				=> __( 'Degree #6', 'frenify-core' ),
					'degree-7'				=> __( 'Degree #7', 'frenify-core' ),
					
					'down-1'				=> __( 'Down #1', 'frenify-core' ),
					'down-2'				=> __( 'Down #2', 'frenify-core' ),
					'down-3'				=> __( 'Down #3', 'frenify-core' ),
					
					'facebook-1'			=> __( 'Facebook #1', 'frenify-core' ),
					'facebook-2'			=> __( 'Facebook #2', 'frenify-core' ),
					'facebook-3'			=> __( 'Facebook #3', 'frenify-core' ),
					'facebook-4'			=> __( 'Facebook #4', 'frenify-core' ),
					'facebook-5'			=> __( 'Facebook #5', 'frenify-core' ),
					'facebook-6'			=> __( 'Facebook #6', 'frenify-core' ),
					
					'hobby-1'				=> __( 'Hobby #1', 'frenify-core' ),
					'hobby-2'				=> __( 'Hobby #2', 'frenify-core' ),
					'hobby-3'				=> __( 'Hobby #3', 'frenify-core' ),
					'hobby-4'				=> __( 'Hobby #4', 'frenify-core' ),
					'hobby-5'				=> __( 'Hobby #5', 'frenify-core' ),
					'hobby-6'				=> __( 'Hobby #6', 'frenify-core' ),
					
					'instagram-1'			=> __( 'Instagram #1', 'frenify-core' ),
					'instagram-2'			=> __( 'Instagram #2', 'frenify-core' ),
					'instagram-3'			=> __( 'Instagram #3', 'frenify-core' ),
					'instagram-4'			=> __( 'Instagram #4', 'frenify-core' ),
					
					'linkedin-1'			=> __( 'Linkedin #1', 'frenify-core' ),
					'linkedin-2'			=> __( 'Linkedin #2', 'frenify-core' ),
					'linkedin-3'			=> __( 'Linkedin #3', 'frenify-core' ),
					'linkedin-4'			=> __( 'Linkedin #4', 'frenify-core' ),
					
					'location-1'			=> __( 'Location #1', 'frenify-core' ),
					'location-2'			=> __( 'Location #2', 'frenify-core' ),
					'location-3'			=> __( 'Location #3', 'frenify-core' ),
					'location-4'			=> __( 'Location #4', 'frenify-core' ),
					'location-5'			=> __( 'Location #5', 'frenify-core' ),
					
					'message-1'				=> __( 'Message #1', 'frenify-core' ),
					'message-2'				=> __( 'Message #2', 'frenify-core' ),
					'message-3'				=> __( 'Message #3', 'frenify-core' ),
					'message-4'				=> __( 'Message #4', 'frenify-core' ),
					'message-5'				=> __( 'Message #5', 'frenify-core' ),
					
					'ok-1'					=> __( 'Classmates #1', 'frenify-core' ),
					'ok-2'					=> __( 'Classmates #2', 'frenify-core' ),
					'ok-3'					=> __( 'Classmates #3', 'frenify-core' ),
					
					'pinterest-1'			=> __( 'Pinterest #1', 'frenify-core' ),
					'pinterest-2'			=> __( 'Pinterest #2', 'frenify-core' ),
					'pinterest-3'			=> __( 'Pinterest #3', 'frenify-core' ),
					
					'portfolio-1'			=> __( 'Portfolio #1', 'frenify-core' ),
					'portfolio-2'			=> __( 'Portfolio #2', 'frenify-core' ),
					'portfolio-3'			=> __( 'Portfolio #3', 'frenify-core' ),
					'portfolio-4'			=> __( 'Portfolio #4', 'frenify-core' ),
					'portfolio-5'			=> __( 'Portfolio #5', 'frenify-core' ),
					'portfolio-6'			=> __( 'Portfolio #6', 'frenify-core' ),
					
					'quote-1'				=> __( 'Quote #1', 'frenify-core' ),
					'quote-2'				=> __( 'Quote #2', 'frenify-core' ),
					'quote-3'				=> __( 'Quote #3', 'frenify-core' ),
					'quote-4'				=> __( 'Quote #4', 'frenify-core' ),
					'quote-5'				=> __( 'Quote #5', 'frenify-core' ),
					'quote-6'				=> __( 'Quote #6', 'frenify-core' ),
					'quote-7'				=> __( 'Quote #7', 'frenify-core' ),
					'quote-8'				=> __( 'Quote #8', 'frenify-core' ),
					'quote-9'				=> __( 'Quote #9', 'frenify-core' ),
					
					'responsive-1'			=> __( 'Responsive #1', 'frenify-core' ),
					'responsive-2'			=> __( 'Responsive #2', 'frenify-core' ),
					'responsive-3'			=> __( 'Responsive #3', 'frenify-core' ),
					'responsive-4'			=> __( 'Responsive #4', 'frenify-core' ),
					'responsive-5'			=> __( 'Responsive #5', 'frenify-core' ),
					
					'skype-1'				=> __( 'Skype #1', 'frenify-core' ),
					'skype-2'				=> __( 'Skype #2', 'frenify-core' ),
					
					'snapchat-1'			=> __( 'Snapchat #1', 'frenify-core' ),
					'snapchat-2'			=> __( 'Snapchat #2', 'frenify-core' ),
					
					'study-1'				=> __( 'Study #1', 'frenify-core' ),
					'study-2'				=> __( 'Study #2', 'frenify-core' ),
					'study-3'				=> __( 'Study #3', 'frenify-core' ),
					'study-4'				=> __( 'Study #4', 'frenify-core' ),
					'study-5'				=> __( 'Study #5', 'frenify-core' ),
					
					'support-1'				=> __( 'Support #1', 'frenify-core' ),
					'support-2'				=> __( 'Support #2', 'frenify-core' ),
					'support-3'				=> __( 'Support #3', 'frenify-core' ),
					'support-4'				=> __( 'Support #4', 'frenify-core' ),
					'support-5'				=> __( 'Support #5', 'frenify-core' ),
					'support-6'				=> __( 'Support #6', 'frenify-core' ),
					'support-7'				=> __( 'Support #7', 'frenify-core' ),
					
					'twitter-1'				=> __( 'Twitter #1', 'frenify-core' ),
					'twitter-2'				=> __( 'Twitter #2', 'frenify-core' ),
					'twitter-3'				=> __( 'Twitter #3', 'frenify-core' ),
					'twitter-4'				=> __( 'Twitter #4', 'frenify-core' ),
					
					'vk-1'					=> __( 'Vkontakte #1', 'frenify-core' ),
					'vk-2'					=> __( 'Vkontakte #2', 'frenify-core' ),
					'vk-3'					=> __( 'Vkontakte #3', 'frenify-core' ),
					'vk-4'					=> __( 'Vkontakte #4', 'frenify-core' ),
					
					'wechat-1'				=> __( 'Wechat #1', 'frenify-core' ),
					'wechat-2'				=> __( 'Wechat #2', 'frenify-core' ),
					
					'whatsapp-1'			=> __( 'Whatsapp #1', 'frenify-core' ),
					'whatsapp-2'			=> __( 'Whatsapp #2', 'frenify-core' ),
					'whatsapp-3'			=> __( 'Whatsapp #3', 'frenify-core' ),
					'whatsapp-4'			=> __( 'Whatsapp #4', 'frenify-core' ),
					
					'youtube-1'				=> __( 'Youtube #1', 'frenify-core' ),
					'youtube-2'				=> __( 'Youtube #2', 'frenify-core' ),
					'youtube-3'				=> __( 'Youtube #3', 'frenify-core' ),
					'youtube-4'				=> __( 'Youtube #4', 'frenify-core' ),
				],
			]
		);
		$repeater->add_control(
			'elementor_icons',
			[
				'label' => __( 'Elementor Icons', 'Frenify Core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'module_label',
			[
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Title goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'module_value',
			[
				 'label'       	=> __( 'Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Description goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_label' 			=> __( 'Fully Responsive', 'frenify-core' ),
						'module_value' 			=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu.', 'frenify-core' ),
						'frenify_icons' 		=> 'responsive-1',
					],
					[
						'module_label' 			=> __( 'Friendly Support', 'frenify-core' ),
						'module_value' 			=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu.', 'frenify-core' ),
						'frenify_icons' 		=> 'support-7',
					],
					[
						'module_label' 			=> __( 'Cross Browsing', 'frenify-core' ),
						'module_value' 			=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu.', 'frenify-core' ),
						'frenify_icons' 		=> 'browser-1',
					],
					
				],
				'title_field' => '{{{ module_label }}}',
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
			'icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item .icon svg,{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item .icon .arlo_w_fn_svg,{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item .icon i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
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
					'{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item span' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
			]
		);
		
		$this->end_controls_section();
		
		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		
		$image1				= $settings['image_1']['url'];
		$image2				= $settings['image_2']['url'];
		$infoList			= $settings['info_list'];
		$icon_type			= $settings['icon_type'];
		
		$noIcon				= '';
		if($icon_type == 'none'){$noIcon = 'no_icon';}
		
		$leftPart			 = '<div class="left_part">';
			$leftPart			.= '<ul>';
				$leftPart			.= '<li>';
					$leftPart			.= '<div class="lp_item" data-bg-img="'.$image1.'">';
						$leftPart			.='<img src="'.FREL_PLUGIN_URL.'assets/img/thumb-500-800.jpg" alt="" />';
					$leftPart			.= '</div>';
				$leftPart			.= '</li>';
				$leftPart			.= '<li>';
					$leftPart			.= '<div class="lp_item" data-bg-img="'.$image2.'">';
						$leftPart			.='<img src="'.FREL_PLUGIN_URL.'assets/img/thumb-500-800.jpg" alt="" />';
					$leftPart			.= '</div>';
				$leftPart			.= '</li>';
			$leftPart			.= '</ul>';
		$leftPart			.= '</div>';
		
		
		echo Frel_Helper::frel_open_wrap();
		
		echo '<div class="fn_cs_why_choose_us"><div class="container"><div class="wcu_inner">';
			echo $leftPart;
			echo '<div class="right_part">';
			if($infoList){
				echo '<div class="info_list">';
					echo '<ul>';
						foreach($infoList as $infoItem){
							echo '<li><div class="info_item '.$noIcon.'">';
								if($icon_type == 'frenify_icons'){
									echo '<span class="icon"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/'.$infoItem['frenify_icons'].'.svg" alt="svg" /></span>';
								}else if($icon_type == 'elementor_icons'){
									echo '<span class="icon">';
									\Elementor\Icons_Manager::render_icon( $infoItem['elementor_icons'], [ 'aria-hidden' => 'true' ] );
									echo '</span>';
								}
								echo '<h3>'.$infoItem['module_label'].'</h3><span>'.$infoItem['module_value'].'</span>';
							echo '</div></li>';
						}
					echo '</ul>';
				echo '</div>';
			}
			echo '</div>';
		echo '</div></div></div>';
		
		echo Frel_Helper::frel_close_wrap();
	}

}
