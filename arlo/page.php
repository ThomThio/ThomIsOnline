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
	
	$arlo_fn_page_spaces = 'style=';
	if($arlo_fn_top_padding != ''){$arlo_fn_page_spaces .= 'padding-top:'.$arlo_fn_top_padding.'px;';}
	if($arlo_fn_bot_padding != ''){$arlo_fn_page_spaces .= 'padding-bottom:'.$arlo_fn_bot_padding.'px;';}
	if($arlo_fn_top_padding == '' && $arlo_fn_bot_padding == ''){$arlo_fn_page_spaces = '';}
	
	// page styles
	$arlo_fn_pagestyle 			= get_post_meta(get_the_ID(),'arlo_fn_page_style', true);
}
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


	<!-- ALL PAGES -->		
	<div class="arlo_fn_all_pages">
		<div class="arlo_fn_all_pages_inner">

			<?php if($arlo_fn_pagestyle == 'full' || $arlo_fn_pagestyle == ''){ ?>

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
					
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>
							<div class="fn_link_pages">
								<?php wp_link_pages(
									array(
										'before'      => '<div class="arlo_fn_pagelinks"><span class="title">' . __( 'Pages:', 'arlo' ). '</span>',
										'after'       => '</div>',
										'link_before' => '<span class="number">',
										'link_after'  => '</span>',
									)
								); ?>
							</div>
							<?php if ( comments_open() || get_comments_number()){?>
							<!-- Comments -->
							<div class="arlo_fn_comment" id="comments">
								<?php comments_template(); ?>
							</div>
							<!-- /Comments -->
							<?php } ?>

						<?php endwhile; endif; ?>

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
							</div>
							<?php arlo_fn_breadcrumbs();?>
						</div>
						<!-- /PAGE TITLE -->
					<?php } ?>
					<div class="s_inner">

						<div class="arlo_fn_leftsidebar" <?php echo esc_attr($arlo_fn_page_spaces); ?>>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php the_content(); ?>

								<?php if ( comments_open() || get_comments_number()){?>
								<!-- Comments -->
								<div class="arlo_fn_comment" id="comments">
									<?php comments_template(); ?>
								</div>
								<!-- /Comments -->
							<?php } ?>

							<?php endwhile; endif; ?>
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