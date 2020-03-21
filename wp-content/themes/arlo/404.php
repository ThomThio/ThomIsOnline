<?php
	get_header();
?>
          	
       	<!-- ERROR PAGE -->
       	<div class="arlo_fn_error_page">
       		<div class="container">
				<div class="error_wrap">
					<div class="error_box">
						<div class="title_holder">
							<h1><?php esc_html_e('404', 'arlo') ?></h1>
							<h3><?php esc_html_e('Page Not Found', 'arlo') ?></h3>
							<p><?php esc_html_e('Sorry, but the page you are looking for was moved, removed, renamed or might never existed...', 'arlo') ?></p>
						</div>
						<div class="search_holder">
							<form action="<?php echo esc_url(home_url('/')); ?>" method="get" >
								<div><input type="text" placeholder="<?php esc_attr_e('Search', 'arlo');?>" name="s" autocomplete="off" /></div>
								<div><input type="submit" class="pe-7s-search" value="<?php esc_attr_e('Search', 'arlo');?>" /></div>
							</form>
						</div>
					</div>
				</div>
       		</div>
       	</div>
       	<!-- /ERROR PAGE -->
        	
        
<?php get_footer(); ?>  