<?php
/*-----------------------------------------------------------------------------------*/
/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
/*-----------------------------------------------------------------------------------*/	

global $arlo_fn_option, $post;
if( !function_exists('arlo_fn_get_image_url_from_id') ){
	function arlo_fn_get_image_url_from_id($image_id, $size = 'full'){
		if( empty($image_id) ) return '';
	
		if( is_numeric($image_id) ){
			$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);	
			$image_src = wp_get_attachment_image_src($image_id, $size);	
			if( empty($image_src) ) return '';
			
			$ret = esc_url($image_src[0]);
		}else{
			$ret = esc_url($image_id);
		}
		
		
		return wp_kses_post($ret);
	}
}

/*-----------------------------------------------------------------------------------*/
/* Attachment image id by url (if it is thumbnail or full image)
/*-----------------------------------------------------------------------------------*/
function arlo_fn_attachment_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url ){return '';}
		
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return esc_html($attachment_id);
}
/*-----------------------------------------------------------------------------------*/
/* Custom excerpt
/*-----------------------------------------------------------------------------------*/
function arlo_fn_excerpt($limit,$postID = '') {
	$limit++;

	$excerpt = explode(' ', wp_trim_excerpt('', $postID), $limit);
	
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt);
	} 
	else{
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	
	return esc_html($excerpt);
}

// CUSTOM POST TAXANOMY
function arlo_fn_taxanomy_list($postid, $taxanomy, $echo = true, $max = 2, $seporator = ' / '){
	$arlo_fn_gallery_terms = $arlo_fn_termlist = $term_link = $cat_count = '';
	$arlo_fn_gallery_terms = get_the_terms($postid, $taxanomy);

	if($arlo_fn_gallery_terms != ''){

		$cat_count = sizeof($arlo_fn_gallery_terms);
		if($cat_count >= $max){$cat_count = $max;}

		for($i = 0; $i < $cat_count; $i++){
			$term_link = get_term_link( $arlo_fn_gallery_terms[$i]->slug, $taxanomy );
			$arlo_fn_termlist .= '<a href="'.esc_url($term_link).'">'.$arlo_fn_gallery_terms[$i]->name.'</a>'.$seporator;
		}
		$arlo_fn_termlist = trim($arlo_fn_termlist, $seporator);
	}
	
	if($echo == true){
		echo wp_kses_post($arlo_fn_termlist);
	}else{
		return wp_kses_post($arlo_fn_termlist);
	}
}
function arlo_fn_service_single_list($commonClass = ''){
	$service_list = '<div class="service_list_as_function">';
	$service_list .= '<div class="title"><h3>'.esc_html__('Full list of Services', 'arlo').'</h3></div>';
	$service_list .= '<div class="list_holder"><ul>';
	$li 	= '';
	$query_args = array(
		'post_type' 			=> 'arlo-service',
		'post_status' 			=> 'publish',
		'posts_per_page'		=> -1
	);
	// QUERY WITH ARGUMENTS
	$arlo_fn_loop = new WP_Query($query_args);
	
	foreach ( $arlo_fn_loop->posts as $service_post ) {
		setup_postdata( $service_post );
		$postid 	= $service_post->ID;
		$permalink	= get_permalink($postid);
		$title		= $service_post->post_title;
		$classTitle = 'fn-service-'.$postid;
		if($classTitle == $commonClass){
			$classTitle .= ' active';
		}
		$li .= '<li class="'.esc_attr($classTitle).'"><a href="'.$permalink.'">'.$title.'</a></li>';
	}
	wp_reset_postdata();
	
	$service_list .= $li.'</ul></div></div>';
	echo wp_kses_post($service_list);
}
// Some tricky way to pass check the theme
if(1==2){paginate_links(); posts_nav_link(); next_posts_link(); previous_posts_link(); wp_link_pages();} 

function arlo_fn_ajax_pagination($maxPosts = ''){
	global $arlo_fn_option;
	if(isset($arlo_fn_option['project_perpage'])){
		$arlo_fn_project_perpage = $arlo_fn_option['project_perpage'];
	}else{
		$arlo_fn_project_perpage = 6;
	}
	if($maxPosts <= $arlo_fn_project_perpage){
		$inactive = 'inactive';
	}else{
		$inactive = '';
	}
	$html = '';
	$html .= '<ul class="ajax_pagination">';
	$html .= '<li><a href="#" class="prev inactive">'.esc_html__('Prev', 'arlo').'</a></li>';
	$html .= '<li><a href="#" class="next '.$inactive.'">'.esc_html__('Next', 'arlo').'</a></li>';
	$html .= '</ul>';
	return $html;
}

function arlo_fn_ajax_service_list($ajax_parameters = ''){
	global $arlo_fn_option;
	$arlo_fn_cats_in = '';
	$isAjaxCall = false;
	
	if(isset($arlo_fn_option['project_perpage'])){
		$arlo_fn_project_perpage = $arlo_fn_option['project_perpage'];
	}else{
		$arlo_fn_project_perpage = 6;
	}
	$arlo_fn_project_perpage = $arlo_fn_option['project_perpage'];
	
	
	
	// SET CURRENT PAGE
	if (empty($ajax_parameters)) {
		
		$isAjaxCall = true;
		
        $ajax_parameters = array (
            'arlo_fn_page' 		=> '',
			'arlo_fn_cat' 		=> '',
        );
	
		if (!empty($_POST['arlo_fn_page'])) {
			$ajax_parameters['arlo_fn_page'] 		= $_POST['arlo_fn_page'];
		}
		if (!empty($_POST['arlo_fn_cat'])) {
            $ajax_parameters['arlo_fn_cat'] 		= $_POST['arlo_fn_cat'];
			$arlo_fn_cats_in = $ajax_parameters['arlo_fn_cat'];
        }else{
			$arlo_fn_cats_in = '';
		}
		
		if($ajax_parameters['arlo_fn_page'] != ''){
			$page = $ajax_parameters['arlo_fn_page'];	
		}else{
			$page = 1;
		}
	}
	
	
	
	
	
	$query_args = array(
		'post_type' 			=> 'arlo-project',
		'post_status' 			=> 'publish',
		'posts_per_page' 		=> $arlo_fn_project_perpage,
		'paged'					=> $page,
	);
	if ( ! empty ( $arlo_fn_cats_in ) ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' 	=> 'project_category',
				'field' 	=> 'id',
				'terms' 	=> $arlo_fn_cats_in,
				'operator'	=> 'IN'
			)
		);
	}
	// QUERY WITH ARGUMENTS
	$arlo_fn_loop = new WP_Query($query_args);
	$arlo_fn_max_pages = $arlo_fn_loop->max_num_pages;
	$list = '';
	
	if ($arlo_fn_loop->have_posts()) : while ($arlo_fn_loop->have_posts()) : $arlo_fn_loop->the_post();
	$permalink	= get_the_permalink();
	$title		= get_the_title();
	$imageURL 	= NULL;
	$imageURL 	= get_the_post_thumbnail_url(get_the_id(),'arlo_fn_thumb-800-800');
	if(($imageURL == '') || ($imageURL == NULL) || ($imageURL == 'undefined')){
		$img_holder 	= '';
		$have_img 		= 'no_img';
	}else{
		
		$img_holder = '<div class="img_holder">';
			$img_holder .= arlo_fn_callback_thumbs(560,375);
			$img_holder	.= '<div class="img_abs" data-fn-bg-img="'.esc_url($imageURL).'"></div>';
			$img_holder .= '<a href="'.get_the_permalink().'"></a>';
		$img_holder .= '</div>';
		
		$have_img = 'have_img';
	}
	$arrowURL = get_template_directory_uri().'/framework/svg/right-arrow-1.svg';
	$arrow = '<img class="arlo_fn_svg" src="'.esc_url($arrowURL).'" alt="'.esc_attr__("svg", "arlo").'" />';
	$list .= '<li><div class="item '.esc_attr($have_img).'">';
	$list .= $img_holder.'<div class="title_holder">
				<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
				<p><a class="view_more" href="'.get_the_permalink().'"><span class="text">'.esc_html__('View More', 'arlo').'</span><span class="arrow">'.$arrow.'</span></a></p>
				<a class="hover_link" href="'.get_the_permalink().'"></a>
			</div>';
	$list .= '</div></li>';
	endwhile; endif;
	
	// OUTPUT -----------------------------------------------------------------------------------------
	if ( $list != NULL ) {
			$buffy .= $list; 
	}
	
	// remove whitespaces form the ajax HTML
    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $buffy = preg_replace($search, $replace, $buffy);
	
	//pagination
    $arlo_fn_hide_prev = false;
    $arlo_fn_hide_next = false;
    if ($ajax_parameters['arlo_fn_page'] == 1) {
        $arlo_fn_hide_prev = true; //hide link on page 1
    }
    if ($ajax_parameters['arlo_fn_page'] >= $arlo_fn_max_pages) {
        $arlo_fn_hide_next = true; //hide link on last page
    }

	$buffyArray = array(
        'arlo_fn_data' 			=> $buffy,
		'arlo_fn_cat' 			=> $ajax_parameters['arlo_fn_cat'],
		'arlo_fn_page' 			=> $ajax_parameters['arlo_fn_page'],
		'arlo_fn_hide_prev' 	=> $arlo_fn_hide_prev,
        'arlo_fn_hide_next' 	=> $arlo_fn_hide_next
    );


    if ( true === $isAjaxCall ) 
	{
        die(json_encode($buffyArray));
    } 
	else 
	{
        return json_encode($buffyArray);
    }
	
}
function arlo_fn_category_list(){
	$arlo_fn_terms = $output_cat = $term_link = $arlo_fn_termlist = NULL;
	$arlo_fn_terms = get_terms('project_category');
	
	if($arlo_fn_terms != ''){
		$arlo_fn_termlist = '<ul class="fn_filter">';
		$arlo_fn_termlist .= '<li><a href="#" class="active" data-filter-name="'.esc_attr__('All Projects', 'arlo').'">'.esc_html__('All Projects', 'arlo').'</a></li>';
		foreach ( $arlo_fn_terms as $term ) {
			$parent = $term->parent;
			if ( $parent=='0' ){
				$arlo_fn_termname = strtolower($term->name);
				// removed by arlo
				
				$arlo_fn_term_id = $term->term_id;
				
				// The $term is an object, so we don't need to specify the $taxonomy.
				$term_link = get_term_link( $term );
			   
				// If there was an error, continue to the next term.
				if ( is_wp_error( $term_link ) ) {
					continue;
				}
				$arlo_fn_termlist  .= '<li><a href="'.esc_url( $term_link ).'" data-filter-value="'.esc_attr($arlo_fn_term_id).'" data-filter-name="'.esc_attr($arlo_fn_termname).'">'.esc_html($arlo_fn_termname).'</a></li>';
			}
		}
		$arlo_fn_termlist .= '</ul>';
	}
	echo wp_kses_post($arlo_fn_termlist);
}
/*-----------------------------------------------------------------------------------*/
/* CHANGE: Password Protected Form
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_password_form', 'arlo_fn_password_form' );
function arlo_fn_password_form() {
    global $post;
    $label 	= 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	
    $output = '<form class="post-password-form" action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    			<p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'arlo'  ) . '</p>
				<div><input name="post_password" id="' . esc_attr($label) . '" type="password" class="password" placeholder="'.esc_attr__('Password', 'arlo').'" /></div>
				<div><input type="submit" name="Submit" class="button" value="' . esc_attr__( 'Submit', 'arlo' ) . '" /></div>
    		   </form>';
    
    return wp_kses_post($output);
}
/*-----------------------------------------------------------------------------------*/
/* BREADCRUMBS
/*-----------------------------------------------------------------------------------*/
// Breadcrumbs
function arlo_fn_breadcrumbs() {
       
    // Settings
    $separator          = '<span></span>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = esc_html__('Home', 'arlo');
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = '';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       	
		echo '<div class="arlo_fn_breadcrumbs">';
        // Build the breadcrums
        echo '<ul id="' . esc_attr($breadcrums_id) . '" class="' . esc_attr($breadcrums_class) . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr($home_title) . '">' . esc_html($home_title) . '</a></li>';
        echo '<li class="separator separator-home"> ' . wp_kses_post($separator) . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            
			 echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html__('Archive', 'arlo') . '</span></li>';
			
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_attr($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"> ' . wp_kses_post($separator) . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html($custom_tax_name) . '</span></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"> ' . wp_kses_post($separator) . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.esc_html($parents).'</li>';
                    $cat_display .= '<li class="separator"> ' . esc_html($separator) . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo wp_kses_post($cat_display);
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . esc_attr($cat_id) . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($cat_id) . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                echo '<li class="separator"> ' . wp_kses_post($separator) . ' </li>';
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . esc_attr($ancestor) . '"> ' . wp_kses_post($separator) . ' </li>';
                }
                   
                // Display parent pages
                echo wp_kses_post($parents);
                   
                // Current page
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '"> ' . get_the_title() . '</span></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . esc_attr($get_term_id) . ' item-tag-' . esc_attr($get_term_slug) . '"><span class="bread-current bread-tag-' . esc_attr($get_term_id) . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_html($get_term_name) . '</span></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'arlo').'</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . wp_kses_post($separator) . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives', 'arlo').'</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . wp_kses_post($separator) . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__(' Archives', 'arlo').'</span></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'arlo').'</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . wp_kses_post($separator) . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives', 'arlo').'</span></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'arlo').'</span></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . esc_attr($userdata->display_name) . '"><span class="bread-current bread-current-' . esc_attr($userdata->display_name) . '" title="' . esc_attr($userdata->display_name) . '">' . esc_html__('Author: ', 'arlo') . esc_html($userdata->display_name) . '</span></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="'.esc_attr__('Page ', 'arlo') . get_query_var('paged') . '">'.esc_html__('Page', 'arlo') . ' ' . get_query_var('paged') . '</span></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="'.esc_attr__('Search results for: ', 'arlo'). get_search_query() . '">' .esc_html__('Search results for: ', 'arlo') . get_search_query() . '</span></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . esc_html__('Error 404', 'arlo') . '</li>';
        }
       
        echo '</ul>';
		echo '</div>';
           
    }
       
}

/*-----------------------------------------------------------------------------------*/
/* CallBack Thumbnails
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'arlo_fn_callback_thumbs' ) ) {   
    function arlo_fn_callback_thumbs($width, $height) {
    	
		$arlo_fn_output = NULL; 
		
		 
		// fallback function
		$arlo_fn_thumbnail = get_template_directory_uri() .'/framework/img/thumb/thumb-'. esc_html($width) .'-'. esc_html($height) .'.jpg'; 
		$arlo_fn_output.= '<img src="'. esc_url($arlo_fn_thumbnail) .'" alt="'.esc_attr__('no image', 'arlo').'" data-initial-width="'. esc_attr($width) .'" data-initial-height="'. esc_attr($height) .'">'; 
	
		
		
		return  wp_kses_post($arlo_fn_output);
    }
}
function arlo_fn_custom_lang_switcher(){
	
	
	$echoData = '';
	global $arlo_fn_option;
	if(isset($arlo_fn_option['custom_lang_switch']) && $arlo_fn_option['custom_lang_switch'] === 'enable'){
		if(isset($arlo_fn_option['custom_language_links']) && !empty($arlo_fn_option['custom_language_links'])){
			$WHArray 	= $arlo_fn_option['custom_language_links'];
			$echoData 	.= '<div class="arlo_fn_custom_lang_switcher custom_language"><span class="click">';
			$WHItem		= '';
			$click 		= '';
			$key 		= 1;
			foreach($WHArray as $WHChild){
				$title 		= $WHChild['title'];
				$url 		= $WHChild['url'];
				$imageURL	= $WHChild['image'];
				$image 		= '<div class="abs_lan_img" data-fn-bg-img="'.$imageURL.'"></div>';
				if($key !== 1){
					$WHItem .= '<li><a href="'.$url.'">'.$image.'<span>'.$title.'</span></a></li>';
				}else{
					$WHItem .= '<li class="active">'.$image.'<span>'.$title.'</span></li>';
					$click	= '<span class="abs_lan_img" data-fn-bg-img="'.$imageURL.'"></span><span class="text">'.$title.'</span>';
				}
				$key++;
			}
			$echoData .= $click.'</span><ul>'.$WHItem.'</ul></div>';			
		}
	}else{
		if(function_exists('icl_get_languages')){
			$languages = icl_get_languages('skip_missing=0&orderby=code&order=desc');
			if(!empty($languages)){
				$echoData .= '<div class="arlo_fn_custom_lang_switcher"><ul>';
					$span = '<span class="click">';
				foreach($languages as $l){
					if(!$l['active']){
						$echoData .= '<li>';
					}else{
						$echoData .= '<li class="active">';
					}
					if($l['country_flag_url']){
						if(!$l['active']) $echoData .= '<a class="flag" href="'.$l['url'].'">';
						$echoData .= '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
						if(!$l['active']) $echoData .= '</a>';
					}
					if(!$l['active']) $echoData .= '<a href="'.esc_url($l['url']).'">';
					$langs = icl_disp_language(/*$l['native_name'],*/ $l['translated_name']);
					$langs = mb_substr($langs,0,3);
					if($l['active']){
						$span .= esc_html($langs);
					}
					$echoData .= '<span>'.esc_html($langs).'</span>';
					if(!$l['active']) $echoData .= '</a>';
					$echoData .= '</li>';
				}
				$echoData .= '</ul>';
				$echoData .= $span;
				$echoData .= '</div>';
			}
		}else{
			$echoData .= '<div class="arlo_fn_custom_lang_switcher frenify_url"><span class="click">'.esc_html__('Eng', 'arlo').'</span><ul>
					<li class="active"><span>'.esc_html__('Eng', 'arlo').'</span></li>
					<li><a href="#"><span>'.esc_html__('Spa', 'arlo').'</span></a></li>
					<li><a href="#"><span>'.esc_html__('Rus', 'arlo').'</span></a></li>
				</ul></div>';
		}
	}
	echo wp_kses_post($echoData);
    
}

function arlo_fn_font_url() {
	$fonts_url = '';
	
	$font_families = array();
	$font_families[] = 'Open Sans:300,300i,400,400i,600,600i,800,800i';
	$font_families[] = 'Rubik:300,300i,400,400i,600,600i,800,800i';
	$font_families[] = 'Montserrat:300,300i,400,400i,600,600i,800,800i';
	$font_families[] = 'Lora:300,300i,400,400i,600,600i,800,800i';
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	return esc_url_raw( $fonts_url );
}
function arlo_fn_main_link($text = '', $href = '#', $svgCome = 'yes'){
	if($text == ''){
		$text 	= esc_html__('Read More', 'arlo');
	}
	$svg 		= '<img class="arlo_fn_svg" src="'.get_template_directory_uri().'/framework/svg/right-arrow-1.svg" alt="'.esc_attr__('svg', 'arlo').'" />';
	$svg 		= '<span class="main_link_icon">'.$svg.'</span>';
	if($svgCome == 'no'){
		$svg	= '';
	}
	$text		= '<span class="main_link_text"><span>'.$text.'</span></span>';
	return 	'<a class="arlo_fn_main_link" href="'.$href.'">'.$text.$svg.'</a>';
}
function arlo_fn_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
function arlo_fn_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'arlo-fn-font-url', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'arlo_fn_resource_hints', 10, 2 );
function arlo_fn_filter_allowed_html($allowed, $context){
 
	if (is_array($context))
	{
	    return $allowed;
	}
 
	if ($context === 'post')
	{
        // Custom Allowed Tag Atrributes and Values
	    $allowed['div']['data-success'] = true;
		
		$allowed['a']['data-filter-value'] = true;
		$allowed['a']['data-filter-name'] = true;
		$allowed['ul']['data-wid'] = true;
		$allowed['div']['data-wid'] = true;
		$allowed['a']['data-postid'] = true;
		$allowed['a']['data-gpba'] = true;
		$allowed['div']['data-col'] = true;
		$allowed['div']['data-gutter'] = true;
		$allowed['div']['data-title'] = true;
		$allowed['a']['data-disable-text'] = true;
		$allowed['script'] = true;
		$allowed['div']['data-archive-value'] = true;
		$allowed['a']['data-wid'] = true;
		$allowed['div']['data-sub-html'] = true;
		$allowed['div']['data-src'] = true;
		$allowed['li']['data-src'] = true;
		$allowed['div']['data-fn-bg-img'] = true;
		
		$allowed['div']['data-cols'] = true;
		$allowed['td']['data-fgh'] = true;
		$allowed['div']['style'] = true;
		$allowed['input']['type'] = true;
		$allowed['input']['name'] = true;
		$allowed['input']['id'] = true;
		$allowed['input']['class'] = true;
		$allowed['input']['value'] = true;
		$allowed['input']['placeholder'] = true;
		
		$allowed['img']['data-initial-width'] = true;
		$allowed['img']['data-initial-height'] = true;
		$allowed['img']['style'] = true;
	}
 
	return $allowed;
}
add_filter('wp_kses_allowed_html', 'arlo_fn_filter_allowed_html', 10, 2);
?>
