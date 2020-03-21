<?php

namespace Frel;

// Exit if accessed directly. 
if ( ! defined( 'ABSPATH' ) ) { exit; }


// Main Plugin Class
class Frel_Plugin
{
	
	
    // Constructor
    public function __construct()
    {
        $this->add_actions();
		
    }
    
    
	// Add Actions
    private function add_actions()
    {
        // Add New Elementor Categories
        add_action( 'elementor/init', array( $this, 'add_elementor_category' ), 999 );
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'register_widget_scripts' ) );
        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'register_widget_styles' ) );
        // Register New Widgets
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ), 10 );
		
    }
    
	
    // Add New Categories to Elementor
    public function add_elementor_category()
    {
        \Elementor\Plugin::instance()->elements_manager->add_category( 'frel-elements', array(
            'title' => __( 'Frel Elements', 'frenify-core' ),
        ), 1 );
    }
    
    // Register Widget Scripts
    public function register_widget_scripts()
    {
		wp_enqueue_script( 'ripples', plugins_url( 'assets/js/ripples.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'glitch', plugins_url( 'assets/js/glitch.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'particles', plugins_url( 'assets/js/particles.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'jarallax', plugins_url( 'assets/js/jarallax.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'typed', plugins_url( 'assets/js/typed.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'frel_accordion', plugins_url( 'assets/js/accordion.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'countto', plugins_url( 'assets/js/countto.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'waypoints', plugins_url( 'assets/js/waypoints.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'isotope', plugins_url( 'assets/js/isotope.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'frel_kenburnsy', plugins_url( 'assets/js/kenburnsy.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'swiper', plugins_url( 'assets/js/swiper.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'parallax', plugins_url( 'assets/js/parallax.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'frel_parallax', plugins_url( 'assets/js/frel_parallax.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'owl-carousel', plugins_url( 'assets/js/owl-carousel.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		wp_enqueue_script( 'frel_inito', plugins_url( 'assets/js/inito.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
		add_action( 'wp_footer', function() {
			wp_enqueue_script( 'frel_ajax', plugins_url( 'assets/js/ajax.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
			wp_localize_script( 'frel_ajax', 'fn_ajax_object', array( 'fn_ajax_url' => admin_url( 'admin-ajax.php' )) );
		});
		
    }
	
    // Register Widget Styles
    public function register_widget_styles()
    {
		wp_enqueue_style( 'swiper', plugins_url( 'assets/css/swiper.css', __FILE__ ), false, 1, 'all' );
		wp_enqueue_style( 'owl-theme-default', plugins_url( 'assets/css/owl-theme-default.css', __FILE__ ), false, 1, 'all' );
		wp_enqueue_style( 'owl-carousel', plugins_url( 'assets/css/owl-carousel.css', __FILE__ ), false, 1, 'all' );
		wp_enqueue_style( 'magnific-popup', plugins_url( 'assets/css/magnific-popup.css', __FILE__ ), false, 1, 'all' );
		wp_enqueue_style( 'frel_fontello', plugins_url( 'assets/css/fontello.css', __FILE__ ), false, 1, 'all' );
		wp_enqueue_style( 'frel_arlo_style', plugins_url( 'assets/css/style-arlo.css', __FILE__ ), false, 1, 'all' );
		wp_enqueue_style( 'frel_style', plugins_url( 'assets/css/style.css', __FILE__ ), false, 1, 'all' );
    }
    
	
    // Register New Widgets
    public function register_widgets()
    {
        $this->include_widgets();
		$this->include_widget_outputs();
    }
    
	
    // Include Widgets
    private function include_widgets()
    {
		foreach(glob(plugin_dir_path( __FILE__ ) . '/widgets/*.php' ) as $file ){
			$this->include_widget( $file );
		}
		
    }
	
	
	// Include and Load Widget
    private function include_widget($file)
    {
		
		$base  = basename( str_replace( '.php', '', $file ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = sprintf( 'Frel\Widgets\%s', $class );
		
		require_once $file; // include widget php file
		
		if ( class_exists( $class ) ) {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $class ); // load widget class
		}
		
    }
	
	
	// call to widget outputs
	private function include_widget_outputs()
    {
		foreach(glob(plugin_dir_path( __FILE__ ) . '/widgets/output/*.php' ) as $file ){
			require_once $file;
		}
    }
	
	

}