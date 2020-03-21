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
class Frel_About_Text_Slider extends Widget_Base {

	public function get_name() {
		return 'frel-about-text-slider';
	}

	public function get_title() {
		return __( 'About with text slider', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-arrow-right';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'image',
			[
				'label' => __( 'Upload Image', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => ARLO_PLACEHOLDERS_URL.'bro.jpg'
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title', 'frenify-core' ),
			]
		);
		
		$this->add_control(
		  	'pretext',
			  [
				 'label'   => __( 'Title Pretext', 'frenify-core' ),
				 'type'    => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title pretext here', 'frenify-core' ),
				 'default' 	   => __( 'I\'m Albert Walkers and', 'frenify-core' ),
			  ]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'module_title',
			[
				 'label'       	=> __( 'Title Slide Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide text here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'module_items',
			[
				'label' => __( 'Title Slide Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_title' 			=> __( 'Freelancer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Web Developer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Photographer', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ module_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_description',
			[
				'label' => __( 'Description', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'desc',
			  [
				 'label'       	=> __( 'Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type description text here', 'frenify-core' ),
				 'default'	 	=> __( 'Hi! My name is <span>Albert Walkers</span>. I am a Web Developer, and I\'m very passionate and dedicated to my work. With 20 years experience as a professional Web developer, I have acquired the skills and knowledge necessary to make your project a success. I enjoy every step of the design process, from discussion and collaboration.', 'frenify-core' ),
			  ]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_info_list',
			[
				'label' => __( 'Information List', 'frenify-core' ),
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
		
		$repeater2 = new \Elementor\Repeater();
		$repeater2->add_control(
			'frenify_icons',
			[
				'label' 		=> __( 'Frenify Icons', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'birthday-1',
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
		$repeater2->add_control(
			'elementor_icons',
			[
				'label' => __( 'Elementor Icons', 'Frenify Core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater2->add_control(
			'module_label',
			[
				 'label'       	=> __( 'Label', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Label goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater2->add_control(
			'module_value',
			[
				 'label'       	=> __( 'Value', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Value goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'module_label' 			=> __( 'Birthday:', 'frenify-core' ),
						'module_value' 			=> __( '01.07.1990', 'frenify-core' ),
						'frenify_icons' 		=> 'birthday-1',
					],
					[
						'module_label' 			=> __( 'Age:', 'frenify-core' ),
						'module_value' 			=> __( '29', 'frenify-core' ),
						'frenify_icons' 		=> 'calendar-1',
					],
					[
						'module_label' 			=> __( 'Location:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="#">Ave 11, New York, USA</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'location-2',
					],
					[
						'module_label' 			=> __( 'Interests:', 'frenify-core' ),
						'module_value' 			=> __( 'PlayStation, Reading', 'frenify-core' ),
						'frenify_icons' 		=> 'hobby-6',
					],
					[
						'module_label' 			=> __( 'Study:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="#">University of Chicago</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'study-2',
					],
					[
						'module_label' 			=> __( 'Degree:', 'frenify-core' ),
						'module_value' 			=> __( 'Master', 'frenify-core' ),
						'frenify_icons' 		=> 'degree-7',
					],
					[
						'module_label' 			=> __( 'Mail:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="mailto:mymail@gmail.com">mymail@gmail.com</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'message-1',
					],
					[
						'module_label' 			=> __( 'Phone:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="tel:+770221770505">+77 022 177 05 05</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'call-1',
					],
					
				],
				'title_field' => '{{{ module_label }}}',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Buttons', 'frenify-core' ),
			]
		);
		
		$repeater3 = new \Elementor\Repeater();
		$repeater3->add_control(
			'btn_type',
			[
				'label' 		=> __( 'Button Type', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'label_block'	=> true,
				'options' => [
					'' 				=> __( 'Default (URL)', 'frenify-core' ),
					'download' 		=> __( 'Downloadable', 'frenify-core' ),
				],
			]
		);
		$repeater3->add_control(
			'btn_url',
			[
				 'label'       	=> __( 'Button URL', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Button URL goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'btn_text',
			[
				 'label'       	=> __( 'Button Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Button text goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'btn_list',
			[
				'label' => __( 'Button List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'btn_type' 				=> 'download',
						'btn_url' 				=> '#',
						'btn_text'	 			=> __( 'Download CV', 'frenify-core' ),
					],
					[
						'btn_type' 				=> '',
						'btn_url' 				=> '#',
						'btn_text'	 			=> __( 'Send Message', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ btn_text }}}',
			]
		);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' 	=> __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'h_image',
			[
				'label' 	=> __( 'Image', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' 	=> __( 'Border Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .left_part .about_image_wrap .border .inner' => 'border-color: {{VALUE}};',
				],
				'default' 	=> '#000',
			]
		);
		$this->add_control(
			'h_title',
			[
				'label' 	=> __( 'Title', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .right_part .desc_holder h3' => 'color: {{VALUE}};',
				],
				'default' 	=> '#000',
			]
		);
		$this->add_control(
			'title_anim_color',
			[
				'label' 	=> __( 'Animation Title Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .right_part .desc_holder h3 span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
			]
		);
		$this->add_control(
			'h_desc',
			[
				'label' 	=> __( 'Description', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 	=> __( 'Description Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .right_part .desc_holder p' => 'color: {{VALUE}};',
				],
				'default' 	=> '#6f6f6f',
			]
		);
		$this->add_control(
			'desc_span_color',
			[
				'label' 	=> __( 'Description Special Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .right_part .desc_holder p span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
			]
		);
		$this->add_control(
			'h_info_list',
			[
				'label' 	=> __( 'Information List', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' 	=> __( 'Icon Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .info_list ul li span.icon .arlo_w_fn_svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_text_slider .info_list ul li span.icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_text_slider .info_list ul li span.icon svg' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
			]
		);
		$this->add_control(
			'label_color',
			[
				'label' 	=> __( 'Label Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider ul li label' => 'color: {{VALUE}};',
				],
				'default' 	=> '#000',
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' 	=> __( 'Value Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider ul li span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#6f6f6f',
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' 	=> __( 'Link Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider ul li span a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_text_slider ul li span a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
			]
		);
		$this->add_control(
			'h_buttons',
			[
				'label' 	=> __( 'Buttons', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' 	=> __( 'Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .btn_list ul li a' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
			]
		);
		$this->add_control(
			'btn_text_color',
			[
				'label' 	=> __( 'Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .btn_list ul li a' => 'color: {{VALUE}};',
				],
				'default' 	=> '#fff',
			]
		);
		$this->end_controls_section();
		
		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$leftImageURL		= $settings['image']['url'];
		$icon_type			= $settings['icon_type'];
		$preText			= $settings['pretext'];
		$moduleItems		= $settings['module_items'];
		$desc				= $settings['desc'];
		$infoList			= $settings['info_list'];
		$btnList			= $settings['btn_list'];
		
		$noIcon				= '';
		if($icon_type == 'none'){$noIcon = 'no_icon';}
		
		
		// ----------
		// left part
		// ----------
		$leftPart	 = '<div class="left_part">';
			$leftPart	.= '<div class="about_image_wrap parallax" data-relative-input="true">
								<div class="image layer" data-depth="0.7">
									<img src="'.FREL_PLUGIN_URL.'assets/img/thumb-550-560.jpg" alt="" />
									<div class="inner" data-bg-img="'.$leftImageURL.'"></div>
								</div>
								<div class="border layer" data-depth="0.5">
									<img src="'.FREL_PLUGIN_URL.'assets/img/thumb-550-560.jpg" alt="" />
									<div class="inner"></div>
								</div>
							</div>';
		$leftPart	.= '</div>';
		
		
		// ----------
		// right part
		// ----------
		
		// animation text
		$items				= '';
		if($moduleItems){
			foreach($moduleItems as $module_item){
				$items .= $module_item['module_title'] . ':::';
			}
		}
		if($items != ''){
			$items = substr($items, 0, -3);
		}
		
		// output goes here
		
		echo Frel_Helper::frel_open_wrap();
		
		echo '<div class="fn_cs_about_text_slider"><div class="container"><div class="about_text_slider">';
			echo $leftPart;
			echo '<div class="right_part">';
		
				echo '<div class="desc_holder">';
					echo '<h3>'.$preText.' <span class="arlo_fn_animation_text" data-items="'.$items.'"></span></h3>';
					echo '<p>'.$desc.'</p>';
				echo '</div>';

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
									echo '<label>'.$infoItem['module_label'].'</label><span>'.$infoItem['module_value'].'</span>';
								echo '</div></li>';
							}
						echo '</ul>';
					echo '</div>';
				}
		
				if($btnList){
					echo '<div class="btn_list">';
						echo '<ul>';
							foreach($btnList as $btnItem){
								echo '<li>';
									echo '<a href="'.$btnItem['btn_url'].'" '.$btnItem['btn_type'].'><span>'.$btnItem['btn_text'].'</span></a>';
								echo '</li>';
							}
						echo '</ul>';
					echo '</div>';
				}
		
			echo '</div>';
		echo '</div></div></div>';
		
		
		echo Frel_Helper::frel_close_wrap();
		
	}

}
