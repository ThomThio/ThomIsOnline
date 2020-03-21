<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "arlo_fn_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'arlo_fn_option',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_frenify_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	$adminURL = '<a href="'.admin_url('options-permalink.php').'">'.esc_html__('Here', 'redux-framework-demo').'</a>';	 
	$permalink_description = __('After changing this, go to following link and click save. '.$adminURL.'', 'redux-framework-demo');

	$langURL = '<a target="_blank" href="https://wpml.org/">'.esc_html__('WPML Multilingual CMS', 'redux-framework-demo').'</a>';	 
	$lang_desc = __('Please, install and set up following plugin: '.$langURL.'', 'redux-framework-demo');
    // -> START Basic Fields
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General', 'redux-framework-demo' ),
        'id'    => 'general',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-globe',
		'fields' 	=> array(
			
			array(
					'id'		=> 'preloader_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Enable/Disable Preloader', 'redux-framework-demo'),
					"default" 	=> 'disable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),		
			),
			array(
					'id'		=> 'preloader_skin',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Preloader Skin', 'redux-framework-demo'),
					"default" 	=> 'dark',
					'options' 	=> array(
									'dark'  		=> esc_html__('Dark', 'redux-framework-demo'), 
									'light' 		=> esc_html__('Light', 'redux-framework-demo')),		
			),
			array(
					'id'		=> 'search_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Enable/Disable Search', 'redux-framework-demo'),
					"default" 	=> 'enable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),		
			),
			array(
				'id'		=> 'pagination_text',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Pagination Text', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),			
			),
			array(
				'id'		=> 'arlo_box_shadow',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('All Box Shadows', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),			
			),
			array(
				'id'		=> 'blog_single_title',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Page Title for Blog Single', 'redux-framework-demo'),
				'default'	=> esc_html__('Latest News', 'redux-framework-demo'),
			),
			array(
				'id'		=> 'thumb_for_search',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Thumbnail for Search Page', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),			
			),
		)
	));
	Redux::setSection( $opt_name, array(
			'title' => esc_html__( 'Main Colors', 'redux-framework-demo' ),
			'id'    => 'main_color',
			'icon'  => 'el el-brush ',
			'fields' 	=> array(
			array(
				'id'		=> 'heading_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Heading Color', 'redux-framework-demo'),
				'default' 	=> '#000',
				'validate' 	=> 'color',
			),
			array(
				'id'		=> 'primary_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Primary Color', 'redux-framework-demo'),
				'default' 	=> '#316397',
				'validate' 	=> 'color',
			),
			array(
				'id'		=> 'secondary_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Secondary Color', 'redux-framework-demo'),
				'default' 	=> '#ff4b36',
				'validate' 	=> 'color',
			),
			array(
				'id'		=> 'closer_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Closer Color', 'redux-framework-demo'),
				'default' 	=> '#ff4b36',
				'validate' 	=> 'color',
			),
		)
	));
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Logo Options', 'redux-framework-demo' ),
        'id'    => 'logo',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-puzzle',
		'fields' 	=> array(
		
		
			array(
				'id'		=> 'desktop_logo_dark',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Upload Desktop Dark Logo', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
			),
		
			array(
				'id'		=> 'desktop_logo_light',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Upload Desktop Light Logo', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
			),
			
			array(
				'id'		=> 'desktop_logo_custom',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Upload Desktop Custom Logo', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
			),
		
			array(
				'id'		=> 'mobile_logo',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Upload Mobile Logo', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
			),
		
//			array(
//				'id'		=> 'retina_logo_dark',
//				'type' 		=> 'media',
//				'url'       => true,
//				'title' 	=> esc_html__('Upload Retina Dark Logo', 'redux-framework-demo'),
//				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
//			),
//		
//			array(
//				'id'		=> 'retina_logo_light',
//				'type' 		=> 'media',
//				'url'       => true,
//				'title' 	=> esc_html__('Upload Retina Light Logo', 'redux-framework-demo'),
//				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
//			),
//			
//			array(
//				'id'		=> 'retina_logo_custom',
//				'type' 		=> 'media',
//				'url'       => true,
//				'title' 	=> esc_html__('Upload Retina Custom Logo', 'redux-framework-demo'),
//				'subtitle' 	=> esc_html__('We suggest to use png logo.', 'redux-framework-demo'),
//			),
		
		)
	));
Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Navigation', 'redux-framework-demo' ),
        'id'    => 'navigation',
        'icon'  => 'el el-th',
		'fields' 	=> array(
		
			array(
				'id'		=> 'navigation_open_default',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Open Default', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'),
								'disable'  		=> esc_html__('Disable', 'redux-framework-demo')),
			),
			array(
				'id'		=> 'nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Skin', 'redux-framework-demo'),
				"default" 	=> 'light',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo')),
			),
			array(
				'id'		=> 'special_nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Skin For 404/Search/Archive Pages', 'redux-framework-demo'),
				"default" 	=> 'light',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo')),
			),
			array(
			   	'id' 		=> 'nav_custom_skin_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Navigation Custom Skin Colors', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
				
				array(
					'id'		=> 'custom_bg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),
					'default' 	=> '#224b7a',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'custom_text_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Menu Text Color', 'redux-framework-demo'),
					'default' 	=> '#fff',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'custom_text_hover_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Menu Text Hover Color', 'redux-framework-demo'),
					'default' 	=> '#bed2e8',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'custom_social_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Social Icons Color', 'redux-framework-demo'),
					'default' 	=> '#fff',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'custom_social_hover_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Social Icons Hover Color', 'redux-framework-demo'),
					'default' 	=> '#bed2e8',
					'validate' 	=> 'color',
				),
			array(
				'id'     	=> 'nav_custom_skin_end',
				'type'   	=> 'section',
				'indent' 	=> false,
			),
			array(
				'id'		=> 'mobile_menu_autocollapse',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Autocollapse mobile menu on click', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'),
								'disable'  		=> esc_html__('Disable', 'redux-framework-demo')),
			),
			array(
				'id'		=> 'mobile_menu_open_default',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Mobile Menu Open Default', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'),
								'disable'  		=> esc_html__('Disable', 'redux-framework-demo')),
			),
			array(
				'id'		=> 'helpful_social_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable/Disable Social List', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
				
			),
			array(
			   	'id' 		=> 'helpful_social_section_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Social List', 'redux-framework-demo'),
			   	'indent' 	=> true,
			  	'required'  => array( 'helpful_social_switch', '=', array('enable') ),
			),
				array(
					'id'		=> 'facebook_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Facebook', 'redux-framework-demo'),
					'default'	=> '#',
				),
				array(
					'id'		=> 'twitter_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Twitter', 'redux-framework-demo'),
					'default'	=> '#',
				),
				array(
					'id'		=> 'pinterest_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Pinterest', 'redux-framework-demo'),
					'default'	=> '#',
				),
				array(
					'id'		=> 'linkedin_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Linkedin', 'redux-framework-demo'),
					'required' => array( 'helpful_social_switch', '=', array('enable') ),
				),
				array(
					'id'		=> 'behance_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Behance', 'redux-framework-demo'),
				),
				array(
					'id'		=> 'vimeo_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Vimeo', 'redux-framework-demo'),
				),
				array(
					'id'		=> 'google_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Google', 'redux-framework-demo'),
					'default'	=> '#',
				),
				array(
					'id'		=> 'youtube_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Youtube', 'redux-framework-demo'),
				),
				array(
					'id'		=> 'instagram_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Instagram', 'redux-framework-demo'),
					'default'	=> '#',
				),
			array(
				'id'     	=> 'helpful_social_section_end',
				'type'   	=> 'section',
				'indent' 	=> false,
			),
			array(
			   	'id' 		=> 'mob_nav_skin_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Mobile Navigation Colors', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
				array(
					'id'		=> 'mob_nav_bg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),
					'default' 	=> '#0f0f16',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_hamb_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Hamburger Color', 'redux-framework-demo'),
					'default' 	=> '#ccc',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_ddbg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Dropdown Background Color', 'redux-framework-demo'),
					'default' 	=> '#090909',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_ddlink_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Dropdown Link Default Color', 'redux-framework-demo'),
					'default' 	=> '#ccc',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_ddlink_ha_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Dropdown Link Hover & Active Color', 'redux-framework-demo'),
					'default' 	=> '#fff',
					'validate' 	=> 'color',
				),
			array(
				'id'     	=> 'nav_custom_skin_end',
				'type'   	=> 'section',
				'indent' 	=> false,
			),
		)
    ));
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Typography', 'redux-framework-demo' ),
        'id'    => 'typography',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-font',
		'fields' 	=> array(
			array(
				'id'		=> 'body_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Body Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the body font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' => false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '16px',
					'font-family' 	=> 'Roboto',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'nav_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Desktop Navigation Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the navigation font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '16px',
					'font-family' 	=> 'Raleway',
					'font-weight' 	=> '500',
				),
			),
			array(
				'id'		=> 'nav_mob_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Mobile Navigation Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the navigation font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '18px',
					'font-family' 	=> 'Montserrat',
					'font-weight' 	=> '400',
				),
			),
		
			array(
				'id'		=> 'input_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Input Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the Input font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '14px',
					'font-family' 	=> 'Raleway',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'blockquote_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Blockquote Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the blockquote font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '16px',
					'font-family' 	=> 'Lora',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'heading_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Heading Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the heading font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'font-size' => false,
				'text-align' => false,
				'default' 	=> array(
					'font-family' 	=> 'Raleway',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'extra_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Extra Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the extra font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'font-weight'=>false,
				'color' 	=> false,
				'font-size' => false,
				'text-align' => false,
				'default' 	=> array(
					'font-family' 	=> 'Montserrat',
				),
			),
		)
    ));
	
Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Portfolio', 'redux-framework-demo' ),
        'id'    => 'project',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-folder-open',
		'fields' 	=> array(
			
			array(
				'id' 		=> 'project_perpage',
				'type' 		=> 'slider',
				'title' 	=> esc_html__('Portfolio Posts Per Page', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('', 'redux-framework-demo'),
				"default" 	=> "6",
				"min" 		=> "1",
				"step" 		=> "1",
				"max" 		=> "30",
			),
			array(
				'id' 		=> 'project_slug',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Portfolio Slug', 'frenify-core'),
				'subtitle' 	=> $permalink_description,
				'default' 	=> 'myproject',
			),
		
			array(
				'id' 		=> 'project_cat_slug',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Portfolio Category Slug', 'frenify-core'),
				'subtitle' 	=> $permalink_description,
				'default' 	=> 'myproject-cat',
			),
			array(
				'id'		=> 'project_archive_title',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Title for Portfolio Archive', 'redux-framework-demo'),
				'default'	=> esc_html__('Portfolio Archive', 'redux-framework-demo'),
			),
	)
));

Redux::setSection( $opt_name, array(
        'title' => __( 'Share Options', 'redux-framework-demo' ),
        'id'    => 'sharebox',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-share-alt',
		'fields' 	=> array(  
			array(
				'id' 		=> 'share_facebook',
				'type' 		=> 'button_set',
				'title' 	=> __('Facebook', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')), 
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_twitter',
				'type' 		=> 'button_set',
				'title' 	=> __('Twitter', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')), 
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_google',
				'type' 		=> 'button_set',
				'title' 	=> __('Google Plus', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')), 
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_pinterest',
				'type' 		=> 'button_set',
				'title' 	=> __('Pinterest', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_linkedin',
				'type' 		=> 'button_set',
				'title' 	=> __('Linkedin', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
				'default' 	=> 'disable'
			),
			array(
				'id' 		=> 'share_email',
				'type' 		=> 'button_set',
				'title' 	=> __('Email', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
				'default' 	=> 'disable'
			),
			array(
				'id' 		=> 'share_vk',
				'type' 		=> 'button_set',
				'title' 	=> __('Vkontakte', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
				'default' 	=> 'enable'
			),
		)
    ));
   Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer', 'redux-framework-demo' ),
        'id'    => 'footer',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-road',
		'fields' 	=> array(
			array(
				'id'		=> 'footer_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable/Disable Footer', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),			
			),
	   
		array(
				'id'		=> 'footer_subscribe_area',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable/Disable Subscribe Area', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
		
				'required' => array( 'footer_switch', '=', array('enable') ),			
			),
		array(
				'id'		=> 'footer_widget_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable/Disable Triple Widget', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
		
				'required' => array( 'footer_switch', '=', array('enable') ),			
			),
		array(
				'id'		=> 'footer_bottom_widget_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable/Disable Bottom Widget', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
		
				'required' => array( 'footer_switch', '=', array('enable') ),			
			),
	   		
		array(
			'id' 		=> 'footer_subscribe_text',
			'type' 		=> 'textarea',
			'title' 	=> esc_html__('Subscribe Text', 'redux-framework-demo'),
			'default' 	=> wp_kses_post('Newsletter — get updates with latest topics'),

			'required' => array( 'footer_subscribe_area', '=', array('enable') ),
			),
	    array(
				'id'		=> 'footer_copyright_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable/Disable Copyright', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),
		
				'required' => array( 'footer_switch', '=', array('enable') ),			
			),
	   	array(
			'id' 		=> 'footer_copyright',
			'type' 		=> 'textarea',
			'title' 	=> esc_html__('Footer Copyright', 'redux-framework-demo'),
			'default' 	=> wp_kses_post('&copy; 1934 – 2019 Arlo, LCC. All rights reserved. Theme has been designed by Frenify'),
		
			'required' => array( 'footer_copyright_switch', '=', array('enable') ),
			),
	   		array(
				'id'		=> 'footer_bg',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Footer Background Image', 'redux-framework-demo'),
			),
	   		array(
				'id'		=> 'footer_bg2',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Footer Background Image #2', 'redux-framework-demo'),
			),
	   	
			array(
					'id'		=> 'totop_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Enable/Disable To Top Button', 'redux-framework-demo'),
					"default" 	=> 'enable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enable', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disable', 'redux-framework-demo')),		
			),
	   		
	   		array(
				'id' 		=> 'totop_text',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Totop Text', 'redux-framework-demo'),
				'default' 	=> wp_kses_post('To Top'),

				'required' => array( 'totop_switch', '=', array('enable') ),
				),
	   		
	   		array(
				'id'		=> 'footer_bg_1',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Footer Background One', 'redux-framework-demo'),
				'default' 	=> '#14131b',
				'validate' 	=> 'color',
			),
	   		array(
				'id'		=> 'footer_bg_2',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Footer Background Two', 'redux-framework-demo'),
				'default' 	=> '#14131b',
				'validate' 	=> 'color',
			),
			
			),
	));
	
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Custom CSS', 'redux-framework-demo' ),
        'id'    => 'css',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-edit',
		'fields' 	=> array(
			array(
				'id' 		=> 'custom_css',
				'type' 		=> 'textarea',
				'title' 	=> esc_html__('Custom CSS', 'redux-framework-demo'),
			),				
		)
    )); 

    /*
     * <--- END SECTIONS
     */
