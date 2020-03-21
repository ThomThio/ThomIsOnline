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
class Frel_Services extends Widget_Base {

	public function get_name() {
		return 'frel-services';
	}

	public function get_title() {
		return __( 'Services', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-settings';
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
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'Service Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'Service Description', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service description here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_icon',
			[
				'label'       => __( 'Service Icon (Frenify Icons)', 'frenify-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bricking',
				'options' => [
					'atom-symbol' 			=> __( 'Atom Symbol', 'frenify-core' ),
					'bricking' 				=> __( 'Bricking', 'frenify-core' ),
					'chemistry' 			=> __( 'Chemistry', 'frenify-core' ),
					'construction-worker' 	=> __( 'Construction Worker', 'frenify-core' ),
					'crawler-crane' 		=> __( 'Crawler Crane', 'frenify-core' ),
					'design' 				=> __( 'Design', 'frenify-core' ),
					'drawing' 				=> __( 'Drawing', 'frenify-core' ),
					'drill' 				=> __( 'Drill', 'frenify-core' ),
					'dumper' 				=> __( 'Dumper', 'frenify-core' ),
					'engineer' 				=> __( 'Engineer', 'frenify-core' ),
					'eolic-energy'			=> __( 'Eolic Energy', 'frenify-core' ),
					'flasks'				=> __( 'Flasks', 'frenify-core' ),
					'green-earth'			=> __( 'Green Earth', 'frenify-core' ),
					'helmet' 				=> __( 'Helmet', 'frenify-core' ),
					'innovation' 			=> __( 'Innovation', 'frenify-core' ),
					'learning' 				=> __( 'Learning', 'frenify-core' ),
					'measuring-tape' 		=> __( 'Measuring Tape', 'frenify-core' ),
					'molecular' 			=> __( 'Molecular', 'frenify-core' ),
					'oil' 					=> __( 'Oil', 'frenify-core' ),
					'paint-brushes' 		=> __( 'Painting 1', 'frenify-core' ),
					'paint-roller' 			=> __( 'Painting 2', 'frenify-core' ),
					'pipe' 					=> __( 'Pipe', 'frenify-core' ),
					'plumbing' 				=> __( 'Plumbing', 'frenify-core' ),
					'repair' 				=> __( 'Repair', 'frenify-core' ),
					'service-1' 			=> __( 'Service 1', 'frenify-core' ),
					'service-2' 			=> __( 'Service 2', 'frenify-core' ),
					'skyline' 				=> __( 'Skyline', 'frenify-core' ),
					'solar-energy'			=> __( 'Solar Energy', 'frenify-core' ),
					'solar-panel'			=> __( 'Solar Panel', 'frenify-core' ),
					'test'  				=> __( 'Test', 'frenify-core' ),
					'tower-crane'  			=> __( 'Tower Crane', 'frenify-core' ),
					'tower'  				=> __( 'Tower', 'frenify-core' ),
					'transformer'  			=> __( 'Transformer', 'frenify-core' ),
					'valve' 				=> __( 'Valve', 'frenify-core' ),
					'water-drop' 			=> __( 'Water Drop', 'frenify-core' ),
				],
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'list_url',
			[
				'label'       => __( 'Service URL', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service URL here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'check_list',
			[
				'label' => __( 'Service List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_icon' => 'learning',
						'list_url' => '#',
						'list_title' => __( 'Preconstruction Estimating', 'frenify-core' ),
						'list_desc' => __( 'During this phase, we will work to provide a detailed analysis of the project and we will establish project expectations along with our clients.', 'frenify-core' ),
					],
					[
						'list_icon' => 'drawing',
						'list_url' => '#',
						'list_title' => __( 'General <br />Contracting', 'frenify-core' ),
						'list_desc' => __( 'The client retains an architect or engineer to design the project and to prepare the necessary drawings and specifications for new project.', 'frenify-core' ),
					],
					[
						'list_icon' => 'tower-crane',
						'list_url' => '#',
						'list_title' => __( 'Construction Management', 'frenify-core' ),
						'list_desc' => __( 'Under a Construction Management contract, the client secures the services of a construction manager to work with the design team.', 'frenify-core' ),
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
			'bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} span.bg1' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0)',
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} span.bg1' => 'border-color: {{VALUE}};',
				],
				'default' => '#0e2424',
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .icon span:after' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'icon_shape_color',
			[
				'label' => __( 'Icon Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon:after' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .icon:before' => 'border-left-color: {{VALUE}};',
				],
				'default' => '#ab8b40',
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
					'{{WRAPPER}} .icon' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
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
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
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
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		$this->end_controls_section();
		

		
		
		$this->start_controls_section(
			'section_hover',
			[
				'label' => __( 'Hover Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'h_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} span.bg2' => 'background-color: {{VALUE}};',
				],
				'default' => '#0e2424',
			]
		);
		$this->add_control(
			'h_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .item:hover h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'h_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .item:hover p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
			]
		);
		$this->add_control(
			'h_arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arrow' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
		$html		 	= Frel_Helper::frel_open_wrap();
		$html			.= '<div class="fn_cs_services"><div class="container">';
		if ( $check_list ) {
			$html .= '<div class="list"><ul class="fn_cs_miniboxes">';
			foreach ( $check_list as $item ) {
				$svg 	= '<span class="icon"><span></span><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/service-'.$item['list_icon'].'.svg" alt="svg" /></span>';
				
				$arrow	= '<span class="arrow"><img class="arlo_w_fn_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arrow-r.svg" alt="svg" /></span>';
				$html .= '<li><div class="item fn_cs_minibox"><a href="'.$item['list_url'].'"></a><span class="bg1"></span><span class="bg2"></span>'.$svg.'<h3>'.$item['list_title'].'</h3><p>'.$item['list_desc'].'</p>'.$arrow.'</div></li>';
			}
			$html .= '</ul></div>';
		}
		$html .= '</div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
