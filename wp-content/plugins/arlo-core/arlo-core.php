<?php
/*
Plugin Name: Arlo Core
Plugin URI: https://themeforest.net/item/arlo-portfolio-wordpress-theme/22729865
Description: Arlo Core Plugin for Arlo Theme
Version: 1.8
Author: frenify
Author URI: http://www.themeforest.net/user/frenify/
*/


 


// Custom Meta tags for Sharing

add_action('wp_head', 'arlo_fn_open_graph_meta');

function arlo_fn_open_graph_meta(){
	global $post, $arlo_fn_option;
	
	// enable or disable via theme options
	if(isset($arlo_fn_option['open_graph_meta']) && $arlo_fn_option['open_graph_meta'] == 'enable'){
	
		$image = '';
		if(isset($post)){
			if (has_post_thumbnail( $post->ID ) ) {
				$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$image = esc_attr( $thumbnail_src[0] );
		}}?>

		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:site_name" content="<?php echo esc_html(get_bloginfo( 'name' )); ?>" />
		<meta property="og:description" content="<?php echo arlo_fn_excerpt(12); ?>" />

		<?php if ( $image != '' ) { ?>
			<meta property="og:image" content="<?php echo esc_url($image); ?>" />
		<?php }
	}
}
		add_action( 'init', 'translation' );
		// Load text domain
		function translation() 
		{
			load_plugin_textdomain( 'frenify-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
/*----------------------------------------------------------------------------*
 * Plugins
 *----------------------------------------------------------------------------*/
	
    // Load Theme Options Panel
	include_once(plugin_dir_path( __FILE__ ) . 'shortcode/frel-core.php');
	include_once(plugin_dir_path( __FILE__ ) . 'opt/config.php');


	include_once( plugin_dir_path( __FILE__ ) . 'inc/widgets/widget-business-hours.php');	// Load Widgets
	include_once( plugin_dir_path( __FILE__ ) . 'inc/widgets/widget-estimate.php');			// Load Widgets
	include_once( plugin_dir_path( __FILE__ ) . 'inc/widgets/widget-brochure.php');			// Load Widgets


	add_action( 'after_setup_theme', 'arlo_fn_plugin_setup', 100 );
	function arlo_fn_plugin_setup(){

		// Load Meta Boxes
		include_once(plugin_dir_path( __FILE__ ) . 'inc/meta-box/metabox-config.php');

		// Call to Custom Post types and Functions
		include_once(plugin_dir_path( __FILE__ ) . 'inc/frenify-custompost.php');
		
		// Call to Custom Functions
		include_once(plugin_dir_path( __FILE__ ) . 'inc/frenify_custom_functions.php');
		
		

	}
