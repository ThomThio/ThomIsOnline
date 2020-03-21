<?php

get_header();

global $post, $arlo_fn_option;
$arlo_fn_pagetitle 		= '';
$arlo_fn_top_padding 	= '';
$arlo_fn_bot_padding 	= '';
$arlo_fn_page_spaces 	= '';
$arlo_fn_pagestyle 		= '';

if(function_exists('rwmb_meta')){
	$arlo_fn_pagetitle 			= get_post_meta(get_the_ID(),'arlo_fn_page_title', true);
	$arlo_fn_top_padding 		= get_post_meta(get_the_ID(),'arlo_fn_page_padding_top', true);
	$arlo_fn_bot_padding 		= get_post_meta(get_the_ID(),'arlo_fn_page_padding_bottom', true);
	
	$arlo_fn_page_spaces 		= 'style=';
	if($arlo_fn_top_padding != ''){$arlo_fn_page_spaces .= 'padding-top:'.$arlo_fn_top_padding.'px;';}
	if($arlo_fn_bot_padding != ''){$arlo_fn_page_spaces .= 'padding-bottom:'.$arlo_fn_bot_padding.'px;';}
	if($arlo_fn_top_padding == '' && $arlo_fn_bot_padding == ''){$arlo_fn_page_spaces = '';}
	
	// page styles
	$arlo_fn_pagestyle 			= get_post_meta(get_the_ID(),'arlo_fn_page_style', true);
}



// Post Thumbnail		
$postid 			= get_the_ID();
$post_thumbnail_id 	= get_post_thumbnail_id( $postid );
$src 				= wp_get_attachment_image_src( $post_thumbnail_id, 'arlo_fn_thumb-720-9999');

// Categories
$arlo_fn_post_cats = arlo_fn_taxanomy_list($postid, 'project_category', false);


// CHeck if page is password protected	
if(post_password_required($post)){
	echo '<div class="arlo_fn_pagetitle container">
				<div class="title_holder">
					<h3>'.get_the_title().'</h3>
					'.arlo_fn_breadcrumbs(false).'
				</div>
			</div>';
	echo '<div class="arlo_fn_password_protected">
		 	<div class="container">
				<div class="in">
					<div class="message_holder">
						'.get_the_password_form().'
						<div class="icon_holder"><i class="xcon-lock"></i></div>
					</div>
				</div>
		  	</div>
		  </div>';
}
else
{

if (have_posts()) : while (have_posts()) : the_post();
?>

<div class="arlo_fn_all_pages_content portfolio_single">


	<!-- ALL PAGES -->		
	<div class="arlo_fn_all_pages">
		<div class="arlo_fn_all_pages_inner">

			
			<div class="arlo_fn_portfolio_justified">
				
				<div class="j_content" <?php echo esc_attr($arlo_fn_page_spaces); ?>>
					<div>
						<div class="j_content_in">
							
							<div class="content_part">
								
								<div class="content_holder">
									<?php the_content(); ?>
								</div>
								<?php 
									$prevnext		= '';
									$previous_post 	= get_adjacent_post(false, '', true);
									$next_post 		= get_adjacent_post(false, '', false);

									if ($previous_post && $next_post) { 
										$prevnext	= 'yes';
									}else if(!$previous_post && $next_post){
										$prevnext	= 'next';
									}else if($previous_post && !$next_post){
										$prevnext	= 'prev';
									}else{
										$prevnext	= 'no';
									}
								?>
								
								<!-- PREVIOUS-NEXT BOX -->
								<div class="arlo_fn_prevnext" data-switch="<?php echo esc_attr($prevnext); ?>">
									<div class="container">
										<ul>
											<li class="prev"><?php $prevtext = esc_html__('Prev', 'arlo'); previous_post_link( '%link',$prevtext ) ?></li>
											<li class="h_prev">
												<span><?php esc_html_e('Prev', 'arlo');?></span>
											</li>
											<li class="next"><?php $nexttext = esc_html__('Next', 'arlo'); next_post_link('%link',$nexttext) ?></li>
											<li class="h_next">
												<span><?php esc_html_e('Next', 'arlo');?></span>
											</li>
										</ul>
									</div>
								</div>
								<!-- /PREVIOUS-NEXT BOX -->
								
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<?php endwhile; endif; ?>

		</div>
	</div>		
	<!-- /ALL PAGES -->
</div>
<?php } ?>

<?php get_footer(); ?>  