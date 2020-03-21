<?php

/* ------------------------------------------------------------------------ */
/* Define Sidebars */
/* ------------------------------------------------------------------------ */

add_action( 'widgets_init', 'arlo_fn_widgets_init', 1000 );


function arlo_fn_widgets_init() {
	if (function_exists('register_sidebar')) {
		
		global $arlo_fn_option;
		
		if(isset($arlo_fn_option['footer_widget_switch']) && isset($arlo_fn_option['footer_switch']) && $arlo_fn_option['footer_widget_switch'] === 'enable' && $arlo_fn_option['footer_switch'] === 'enable'){
			/* ------------------------------------------------------------------------ */
			/* Footer Widgets
			/* ------------------------------------------------------------------------ */
			$number = 3;
			for($counter = 1; $counter <= $number; $counter++){
				register_sidebar(array(
					'name' => 'Footer Widget '.$counter,
					'id'   => 'footer-widget-'.$counter,
					'description'   => esc_html__('These are widgets for footer.', 'arlo'),
					'before_widget' => '<div id="%1$s" class="widget_block clearfix %2$s"><div>',
					'after_widget'  => '</div></div>',
					'before_title'  => '<div class="wid-title"><span>',
					'after_title'   => '</span></div>'
				));
			}
		}
		if(isset($arlo_fn_option['footer_bottom_widget_switch']) && isset($arlo_fn_option['footer_switch']) && $arlo_fn_option['footer_bottom_widget_switch'] === 'enable' && $arlo_fn_option['footer_switch'] === 'enable'){
			/* ------------------------------------------------------------------------ */
			/* Footer Left Part Widget
			/* ------------------------------------------------------------------------ */
			
			register_sidebar(array(
				'name' => 'Footer Bottom Widget',
				'id'   => 'footer-bottom-widget',
				'description'   => esc_html__('This is widget for footer (bottom).', 'arlo'),
				'before_widget' => '<div id="%1$s" class="widget_block clearfix %2$s"><div>',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="wid-title"><span>',
				'after_title'   => '</span></div>'
			));

		}
		
		if(isset($arlo_fn_option['footer_subscribe_area']) && isset($arlo_fn_option['footer_switch']) && $arlo_fn_option['footer_subscribe_area'] === 'enable' && $arlo_fn_option['footer_switch'] === 'enable'){
			/* ------------------------------------------------------------------------ */
			/* Footer Subscribe Widget
			/* ------------------------------------------------------------------------ */
			
			register_sidebar(array(
				'name' => 'Footer Subscribe Widget',
				'id'   => 'footer-subscribe-widget',
				'description'   => esc_html__('This is widget for footer (subscribe).', 'arlo'),
				'before_widget' => '<div id="%1$s" class="widget_block clearfix %2$s"><div>',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="wid-title"><span>',
				'after_title'   => '</span></div>'
			));

		}
		
		/* ------------------------------------------------------------------------ */
		/* Sidebar Widgets
		/* ------------------------------------------------------------------------ */
		register_sidebar(array(
			'name' => 'Main Sidebar',
			'id'   => 'main-sidebar',
			'description'   => esc_html__('These are widgets for the sidebar.', 'arlo'),
			'before_widget' => '<div id="%1$s" class="widget_block clear %2$s"><div>',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="wid-title"><span>',
			'after_title'   => '</span></div>'
		));
		
		register_sidebar(array(
			'name' => 'Service and Service Single Sidebar',
			'id'   => 'service-single-sidebar',
			'description'   => esc_html__('These are widgets for the sidebar.', 'arlo'),
			'before_widget' => '<div id="%1$s" class="widget_block clear %2$s"><div>',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="wid-title"><span>',
			'after_title'   => '</span></div>'
		));
		
		register_sidebar(array(
			'name' => 'WooCommerce Sidebar',
			'id'   => 'woocommerce-sidebar',
			'description'   => esc_html__('These are widgets for woocommerce sidebar.', 'arlo'),
			'before_widget' => '<div id="%1$s" class="widget_block clearfix %2$s"><div>',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="wid-title"><span>',
			'after_title'   => '</span></div>'
		));
	}
}

    
?>