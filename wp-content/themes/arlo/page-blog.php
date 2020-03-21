<?php
/*
	Template Name: Blog Page
*/
get_header();

global $post, $arlo_fn_option;
$arlo_fn_pagetitle = '';
$arlo_fn_top_padding = '';
$arlo_fn_bot_padding = '';
$arlo_fn_page_spaces = '';
$arlo_fn_pagestyle = 'ws';

if(function_exists('rwmb_meta')){
	$arlo_fn_pagetitle 			= get_post_meta(get_the_ID(),'arlo_fn_page_title', true);
	$arlo_fn_top_padding 		= get_post_meta(get_the_ID(),'arlo_fn_page_padding_top', true);
	$arlo_fn_bot_padding 		= get_post_meta(get_the_ID(),'arlo_fn_page_padding_bottom', true);
	
	$arlo_fn_page_spaces = 'style=';
	if($arlo_fn_top_padding != ''){$arlo_fn_page_spaces .= 'padding-top:'.$arlo_fn_top_padding.'px;';}
	if($arlo_fn_bot_padding != ''){$arlo_fn_page_spaces .= 'padding-bottom:'.$arlo_fn_bot_padding.'px;';}
	if($arlo_fn_top_padding == '' && $arlo_fn_bot_padding == ''){$arlo_fn_page_spaces = '';}
	
	// page styles
	$arlo_fn_pagestyle 			= get_post_meta(get_the_ID(),'arlo_fn_page_style', true);
}
if(isset($_GET['blog_layout'])){$arlo_fn_pagestyle = $_GET['blog_layout'];}


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
<div class="arlo_fn_all_pages_content fn_blogpage">


	<!-- ALL PAGES -->		
	<div class="arlo_fn_all_pages">
		<div class="arlo_fn_all_pages_inner">

			<?php if($arlo_fn_pagestyle == 'full'){ ?>

			<!-- WITHOUT SIDEBAR -->
			<div class="arlo_fn_without_sidebar_page">	
				<div class="container">
					<?php if($arlo_fn_pagetitle !== 'disable'){ ?>
						<!-- PAGE TITLE -->
						<div class="arlo_fn_pagetitle">
							<div class="title_holder">
								<h3><?php the_title(); ?></h3>
								<?php arlo_fn_breadcrumbs();?>
							</div>
						</div>
						<!-- /PAGE TITLE -->
					<?php } ?>

					<div class="inner" <?php echo esc_attr($arlo_fn_page_spaces); ?>>

						<ul class="arlo_fn_postlist">

							<?php 
								if(is_front_page()) { $arlo_fn_paged = (get_query_var('page')) ? get_query_var('page') : 1;	} else { $arlo_fn_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
								query_posts('posts_per_page=&paged='.esc_html($arlo_fn_paged)); 

								if (have_posts()) : while (have_posts()) : the_post();
							?>
							<li id="post-<?php the_ID(); ?>">
								<div <?php post_class(); ?>>
									
									<div class="img_holder">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('full');?>
										</a>
									</div>
									<div class="title_holder">
										<div class="info_holder">
											<p class="t_header">
												<span class="t_author">
												<?php esc_html_e('By ', 'arlo');?>
												<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>">
												<?php echo esc_html(get_the_author_meta('display_name'));?></a>
												</span>
												<span class="t_time"><?php the_time(get_option('date_format'));?></span>
												<span class="t_category">
												<?php esc_html_e('In ', 'arlo');?>
												<?php echo arlo_fn_taxanomy_list(get_the_id(), 'category', true, 1)?>
												</span>
											</p>
										</div>
										<div class="title">
											<h3>
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
										</div>
										<div class="excerpt_holder">
											<p><?php echo arlo_fn_excerpt(45,get_the_id()); ?></p>
										</div>
										<div class="read_holder">
											<p>
												<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'arlo'); ?></a>
											</p>
										</div>
									</div>
								</div>
							</li>
							<?php endwhile; endif; wp_reset_postdata();?>

						</ul>
						<div class="clearfix"></div>
						<?php arlo_fn_pagination(); ?>

					</div>
				</div>
			</div>
			<!-- /WITHOUT SIDEBAR -->

			<?php }else{ ?>

			<!-- WITH SIDEBAR -->
			<div class="arlo_fn_sidebarpage">
				<div class="container">
					<?php if($arlo_fn_pagetitle !== 'disable'){ ?>
						<!-- PAGE TITLE -->
						<div class="arlo_fn_pagetitle">
							<div class="title_holder">
								<h3><?php the_title(); ?></h3>
								<?php arlo_fn_breadcrumbs();?>
							</div>
						</div>
						<!-- /PAGE TITLE -->
					<?php } ?>
					<div class="s_inner">

						<div class="arlo_fn_leftsidebar" <?php echo esc_attr($arlo_fn_page_spaces); ?>>
							<ul class="arlo_fn_postlist">

								<?php 
									if(is_front_page()) { $arlo_fn_paged = (get_query_var('page')) ? get_query_var('page') : 1;	} else { $arlo_fn_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
									query_posts('posts_per_page=&paged='.esc_html($arlo_fn_paged)); 

									if (have_posts()) : while (have_posts()) : the_post();
								?>
								<li id="post-<?php the_ID(); ?>">
									<div <?php post_class(); ?>>
										
										<div class="img_holder">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('full');?>
											</a>
										</div>
										<div class="title_holder">
											<div class="info_holder">
												<p class="t_header">
													<span class="t_author">
													<?php esc_html_e('By ', 'arlo');?>
													<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>">
													<?php echo esc_html(get_the_author_meta('display_name'));?></a>
													</span>
													<span class="t_time"><?php the_time(get_option('date_format'));?></span>
													<span class="t_category">
													<?php esc_html_e('In ', 'arlo');?>
													<?php echo arlo_fn_taxanomy_list(get_the_id(), 'category', true, 1)?>
													</span>
												</p>
											</div>
											<div class="title">
												<h3>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
											</div>
											<div class="excerpt_holder">
												<p><?php echo arlo_fn_excerpt(45,get_the_id()); ?></p>
											</div>
											<div class="read_holder">
												<p>
													<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'arlo'); ?></a>
												</p>
											</div>
										</div>
									</div>
								</li>
								<?php endwhile; endif; wp_reset_postdata();?>

							</ul>

							<?php arlo_fn_pagination(); ?>
						</div>

						<div class="arlo_fn_rightsidebar" <?php echo esc_attr($arlo_fn_page_spaces); ?>>
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- /WITH SIDEBAR -->

			<?php } ?>
		</div>
	</div>		
	<!-- /ALL PAGES -->
</div>
<?php } ?>

<?php get_footer(); ?>  