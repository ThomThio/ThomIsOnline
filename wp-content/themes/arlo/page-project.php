<?php
/*
	Template Name: Portfolio Page
*/
get_header();

global $post, $arlo_fn_option;
$arlo_fn_pagetitle = '';
$arlo_fn_top_padding = '';
$arlo_fn_bot_padding = '';
$arlo_fn_page_spaces = '';

if(function_exists('rwmb_meta')){
	$arlo_fn_pagetitle 			= get_post_meta(get_the_ID(),'arlo_fn_page_title', true);
	$arlo_fn_top_padding 		= get_post_meta(get_the_ID(),'arlo_fn_page_padding_top', true);
	$arlo_fn_bot_padding 		= get_post_meta(get_the_ID(),'arlo_fn_page_padding_bottom', true);
	
	$arlo_fn_page_spaces = 'style=';
	if($arlo_fn_top_padding != ''){$arlo_fn_page_spaces .= 'padding-top:'.$arlo_fn_top_padding.'px;';}
	if($arlo_fn_bot_padding != ''){$arlo_fn_page_spaces .= 'padding-bottom:'.$arlo_fn_bot_padding.'px;';}
	if($arlo_fn_top_padding == '' && $arlo_fn_bot_padding == ''){$arlo_fn_page_spaces = '';}
	
}
// QUERY ARGUMENTS
if(isset($arlo_fn_option['project_perpage'])){
	$arlo_fn_project_perpage = $arlo_fn_option['project_perpage'];
}else{
	$arlo_fn_project_perpage = 6;
}

if(is_front_page()) { $paged = (get_query_var('page')) ? get_query_var('page') : 1;	} else { $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
$query_args = array(
	'post_type' 			=> 'arlo-project', 
	'paged' 				=> $paged, 
	'posts_per_page' 		=> $arlo_fn_project_perpage,
	'post_status' 			=> 'publish',
);
// QUERY WITH ARGUMENTS
$arlo_fn_loop = new WP_Query($query_args);




// CHeck if page is password protected	
if(post_password_required($post)){
	echo '<div class="arlo_fn_password_protected">
		 	<div class="in">
				<div>
					<div class="message_holder">
						<h1>'.esc_html__('Protected','arlo').'</h1>
						<h3>'.esc_html__('This page was protected','arlo').'</h3>
						'.get_the_password_form().'
						<div class="icon_holder"><i class="xcon-lock"></i></div>
					</div>
				</div>
		  	</div>
		  </div>';
}
else
{

?>
<div class="arlo_fn_all_pages_content">
	<?php if($arlo_fn_pagetitle !== 'disable'){ ?>
		<!-- PAGE TITLE -->
		<div class="arlo_fn_pagetitle">
			<div class="container">
				<div class="title_holder">
					<h3><?php the_title(); ?></h3>
					<?php arlo_fn_breadcrumbs();?>
				</div>
			</div>
		</div>
		<!-- /PAGE TITLE -->
	<?php } ?>
	
	<!-- ALL PAGES -->		
	<div class="arlo_fn_all_pages">
		<div>
			<div class="arlo_fn_all_pages_inner">
				
				<!-- WITHOUT SIDEBAR -->
				<div class="arlo_fn_without_sidebar_page" <?php echo esc_attr($arlo_fn_page_spaces); ?>>
					<div class="inner">
						
						<div class="arlo_fn_portfolio_page">
						
							<!-- PORTFOLIO CONTENT -->
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="portfolio_content">
								<div class="container">
									<?php the_content(); ?>
								</div>
							</div>
							<?php endwhile; endif;?>
							<!-- PORTFOLIO /CONTENT -->
							
							<!-- PORTFOLIO LIST -->
							<div class="portfolio_list">
								<div class="container">
									<div class="arlo_fn_portfolio_category_filter">
										<a href="#"><?php esc_html_e('All Projects', 'arlo');?></a>
										<span class="spinner"></span>
										<?php arlo_fn_category_list();?>
									</div>
									<div class="portfolio_list_in">
										<ul class="arlo_fn_portfolio_list">
											<?php 
												if ($arlo_fn_loop->have_posts()) : while ($arlo_fn_loop->have_posts()) : $arlo_fn_loop->the_post(); 

												$imageURL = NULL;
												$imageURL = get_the_post_thumbnail_url(get_the_id(),'arlo_fn_thumb-800-800');
												if(($imageURL == '') || ($imageURL == NULL) || ($imageURL == 'undefined')){
													$have_img = 'no_img';
												}else{
													$have_img = 'have_img';
												}
											?>
											<li>
												<div class="item <?php echo esc_attr($have_img);?>">
												
													<?php if($have_img == 'have_img'){?>
													<div class="img_holder">
														<img src="<?php echo get_template_directory_uri() .'/framework/img/thumb/thumb-560-375.jpg'; ?>" alt="<?php  esc_attr(bloginfo('description')); ?>" />
														<div class="img_abs" data-fn-bg-img="<?php echo esc_url($imageURL); ?>"></div>
														<a href="<?php the_permalink(); ?>"></a>
													</div>
													<?php }?>

													<div class="title_holder">
														<h3>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
														<p>
															<a class="view_more" href="<?php the_permalink(); ?>">
																<span class="text"><?php esc_html_e('View More', 'arlo'); ?></span>
																<span class="arrow">
																	<?php 
																		$arrowURL = get_template_directory_uri().'/framework/svg/right-arrow-1.svg';
																	?>
																	<img class="arlo_fn_svg" src="<?php echo esc_url($arrowURL);?>" alt="<?php echo esc_attr__('svg', 'arlo');?>" />
																</span>
															</a>
														</p>
														<a class="hover_link" href="<?php the_permalink(); ?>"></a>
													</div>

												</div>
											</li>
											<?php endwhile; endif;?>
										</ul>
									</div>
								</div>
							</div>
							<!-- /PORTFOLIO LIST -->
							
							<div class="arlo_fn_ajax_pagination">
								<div class="container">
									<?php echo arlo_fn_ajax_pagination($arlo_fn_loop->found_posts); wp_reset_postdata();?>
								</div>
							</div>
						</div>

					</div>					
				</div>
				<!-- /WITHOUT SIDEBAR -->
					
			</div>
		</div>
	</div>		
	<!-- /ALL PAGES -->
</div>
<?php } ?>

<?php get_footer(); ?>  