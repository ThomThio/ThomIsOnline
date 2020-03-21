<div class="arlo_fn_sidebar">
	<div class="arlo_fn_sidebar_in">
		<div class="forheight">

				<?php 

				global $woocommerce, $post;
				if(is_page()){

					
					if(is_page_template() == 'page-service.php'){
						if ( is_active_sidebar( 'service-single-sidebar' ) ){
							dynamic_sidebar('Service Single Sidebar');
						}
					}else{
						/* Page Sidebar */
						if (function_exists( 'generated_dynamic_sidebar' )){
							generated_dynamic_sidebar();
						}
					}
					
					

				}else if(is_single()){
					$post_type = get_post_type();
					if($post_type == 'arlo-service'){
						if ( is_active_sidebar( 'service-single-sidebar' ) ){
							dynamic_sidebar('Service Single Sidebar');
						}; 
					}else{
						/* Page Sidebar */
						if ( is_active_sidebar( 'main-sidebar' ) ){
							dynamic_sidebar('Main Sidebar');
						}; 
					}
				}else {

					/* Main Sidebar */

					if ( is_active_sidebar( 'main-sidebar' ) ){
						dynamic_sidebar('Main Sidebar');
					}; 
				}
				?>
		</div>
	</div>
</div>