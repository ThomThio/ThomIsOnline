<?php



if( ! class_exists( 'ARLO_Frenify_Custom_Post' ) ) {
	class ARLO_Frenify_Custom_Post {

		function __construct() {
			// project
			add_action( 'init', array( $this, 'project_init' ) );
			add_action( 'init', array( $this, 'project_taxonomy_init' ) );
			
			
			// changing "Featured Image" text for custom post type
		}

		
		
		/********************************************************/
		/*  PROJECT POST REGISTER
		/********************************************************/
		
		function project_init() {
			
			global $arlo_fn_option;
			
			$project_slug = 'project';
			if(isset($arlo_fn_option['project_slug']) && $arlo_fn_option['project_slug'] != ''){
				$project_slug = $arlo_fn_option['project_slug'];
			}
			
			
			
			// Labels for display service projects
			$labels = array(
				'name'					=> esc_html__( 'Portfolio Posts', 'frenify-core' ),
				'singular_name'			=> esc_html__( 'Portfolio Post', 'frenify-core' ),
				'menu_name'				=> esc_html__( 'Portfolio Posts', 'frenify-core' ),
				'name_admin_bar' 		=> esc_html__( 'Portfolio Posts', 'frenify-core' ),
				'add_new'				=> esc_html__( 'Add New', 'frenify-core' ),
				'add_new_item'			=> esc_html__( 'Add New Portfolio Post', 'frenify-core' ),
				'edit_item' 			=> esc_html__( 'Edit Portfolio Post', 'frenify-core' ),
				'new_item' 				=> esc_html__( 'New Portfolio Post', 'frenify-core' ),
				'view_item' 			=> esc_html__( 'View Portfolio Post', 'frenify-core' ),
				'search_items' 			=> esc_html__( 'Search Portfolio Posts', 'frenify-core' ),
				'not_found' 			=> esc_html__( 'No Portfolio posts found', 'frenify-core' ),
				'not_found_in_trash'	=> esc_html__( 'No Portfolio posts found in trash', 'frenify-core' ),
				'all_items' 			=> esc_html__( 'Portfolio Posts', 'frenify-core' )
			);
		
			// Arguments for service projects
			$args = array(
				'labels' 				=> $labels,
				'public' 				=> true,
				'publicly_queryable' 	=> true,
				'show_in_nav_menus' 	=> true,
				'show_in_admin_bar' 	=> true,
				'exclude_from_search'	=> false,
				'show_ui'				=> true,
				'show_in_menu'			=> true,
				'menu_position'			=> 4,
				'menu_icon'				=> 'dashicons-portfolio', //XXS_PLUGIN_URI . 'assets/img/project-icon.png',
				'can_export'			=> true,
				'delete_with_user'		=> false,
				'hierarchical'			=> false,
				'has_archive'			=> true,
				'capability_type'		=> 'post',
				'rewrite'				=> array( 'slug' => $project_slug, 'with_front' => false ),
				'supports'				=> array( 'title', 'editor', 'thumbnail' )
			);
		
			// Register our project post type
			register_post_type( 'arlo-project', $args );
		}
		
		function project_taxonomy_init() {
			
			global $arlo_fn_option;
			
			$slug = 'project-cat';
			if(isset($arlo_fn_option['project_cat_slug']) && $arlo_fn_option['project_cat_slug'] != ''){
				$slug = $arlo_fn_option['project_cat_slug'];
			}
		
			// Label for 'project category' taxonomy
			$labels = array(
				'name'							=> esc_html__( 'Portfolio Categories', 'frenify-core' ),
				'singular_name'					=> esc_html__( 'Portfolio Category', 'frenify-core' ),
				'menu_name'						=> esc_html__( 'Portfolio Categories', 'frenify-core' ),
				'edit_item'						=> esc_html__( 'Edit Category', 'frenify-core' ),
				'update_item'					=> esc_html__( 'Update Category', 'frenify-core' ),
				'add_new_item'					=> esc_html__( 'Add New Category', 'frenify-core' ),
				'new_item_name'					=> esc_html__( 'New Category Name', 'frenify-core' ),
				'parent_item'					=> esc_html__( 'Parent Category', 'frenify-core' ),
				'parent_item_colon'				=> esc_html__( 'Parent Category:', 'frenify-core' ),
				'all_items'						=> esc_html__( 'All Categories', 'frenify-core' ),
				'search_items'					=> esc_html__( 'Search Categories', 'frenify-core' ),
				'popular_items'					=> esc_html__( 'Popular Categories', 'frenify-core' ),
				'separate_items_with_commas'	=> esc_html__( 'Separate Categoriess with commas', 'frenify-core' ),
				'add_or_remove_items'			=> esc_html__( 'Add or remove Categories', 'frenify-core' ),
				'choose_from_most_used'			=> esc_html__( 'Choose from the most used Categories', 'frenify-core' ),
				'not_found'						=> esc_html__( 'No Categories found', 'frenify-core' )
			);
		
			// Arguments for 'service category' taxonomy
			$args = array(
				'labels'			=> $labels,
				'public'			=> true,
				'show_ui' 			=> true,
				'show_in_nav_menus'	=> true,
				'show_admin_column'	=> true,
				'show_tagcloud'		=> false,
				'hierarchical'		=> true,
				'query_var'			=> true,
				'rewrite'			=> array( 'slug' => $slug, 'with_front' => false, 'hierarchical' => true )
			);
			
			// Register Taxanomy
			register_taxonomy( 'project_category', 'arlo-project', $args );
			
			
		}
		
		
		
		
	
		
	}

	$arlo_fn_custompost = new ARLO_Frenify_Custom_Post();
}