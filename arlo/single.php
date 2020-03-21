<?php

get_header();

global $post, $arlo_fn_option;
$arlo_fn_pagetitle = '';
$arlo_fn_pagestyle = 'ws';

if(function_exists('rwmb_meta')){
	$arlo_fn_pagetitle 			= get_post_meta(get_the_ID(),'arlo_fn_page_title', true);
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
<div class="arlo_fn_all_pages_content blog_single_page">


	<!-- ALL PAGES -->		
	<div class="arlo_fn_all_pages">
		<div class="arlo_fn_all_pages_inner">

			<?php if($arlo_fn_pagestyle == 'full'){ ?>

			<!-- WITHOUT SIDEBAR -->
			<div class="arlo_fn_without_sidebar_page">
				<div class="container">
				<div class="inner">
					<div class="arlo_fn_blog_single">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
							<!-- POST HEADER -->
							<div class="post_header">
								<?php get_template_part( 'inc/post-format/format', get_post_format() );?>
							</div>
							<!-- /POST HEADER -->
							<div class="blog_single_title">
								<p class="t_header">
									<span class="t_author">
									<?php esc_html_e('By ', 'arlo');?>
									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>">
									<?php echo esc_html(get_the_author_meta('display_name'));?></a>
									</span>
									<span class="t_time"><?php the_time(get_option('date_format'));?></span>
									<span class="t_category">
									<?php esc_html_e('In ', 'arlo');?>
									<?php echo arlo_fn_taxanomy_list(get_the_id(), 'category', true, 999, ', ')?>
									</span>
								</p>
								<div class="title_holder">
									<h3><?php the_title(); ?></h3>
								</div>
							</div>

							<!-- POST CONTENT -->
							<div class="post_content">

								<div class="content_holder"><?php the_content(); ?></div>
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

								<?php if(has_tag()){?>
									<div class="arlo_fn_tags">
										<label><?php the_tags(esc_html_e('Tags:', 'arlo').'</label>', ' '); ?>
									</div>
								<?php } ?>
							</div>
							<!-- /POST CONTENT -->
						</article>

						<?php if ( comments_open() || get_comments_number()){?>
						<!-- POST COMMENT -->
						<div class="arlo_fn_comment_wrapper">

							<!-- WORDPRESS COMMENTS -->
							<div class="arlo_fn_comment" id="comments">
								<?php comments_template(); ?>
							</div>
							<!-- /WORDPRESS COMMENTS -->

						</div>
						<!-- /POST COMMENT -->
						<?php } ?>

						<?php 
							endwhile; endif;
						?>
					</div>
				</div>
			</div>
			</div>
			<!-- /WITHOUT SIDEBAR -->

			<?php }else{ ?>

			<!-- WITH SIDEBAR -->
			<div class="arlo_fn_sidebarpage">
				<div class="container">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					
					<div class="inner">
						<div class="arlo_fn_leftsidebar">
							
							<div class="arlo_fn_blog_single">
						

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									
									<!-- POST HEADER -->
									<div class="post_header">
										<?php get_template_part( 'inc/post-format/format', get_post_format() );?>
									</div>
									<!-- /POST HEADER -->
									<div class="extra_single_title_holder">
							

										<div class="arlo_fn_pagetitle blog_single_title">
											<p class="t_header">
												<span class="t_author">
												<?php esc_html_e('By ', 'arlo');?>
												<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
												<?php echo esc_html(get_the_author_meta('display_name'));?></a>
												</span>
												<span class="t_time"><?php the_time(get_option('date_format'));?></span>
												<span class="t_category">
												<?php esc_html_e('In ', 'arlo');?>
												<?php echo arlo_fn_taxanomy_list(get_the_id(), 'category', true, 999, ', '); ?>
												</span>
											</p>
											<div class="title_holder">
												<h3><?php the_title(); ?></h3>
											</div>
										</div>
									</div>

									<!-- POST CONTENT -->
									<div class="post_content">

										<div class="content_holder">
										
											<?php the_content(); ?>
										
										</div>
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

										<?php if(has_tag()){?>
											<div class="arlo_fn_tags">
												<label><?php the_tags(esc_html_e('Tags:', 'arlo').'</label>', ' '); ?>
											</div>
										<?php } ?>
									</div>
									<!-- /POST CONTENT -->
								</article>

								<?php if ( comments_open() || get_comments_number()){?>
								<!-- POST COMMENT -->
								<div class="arlo_fn_comment_wrapper">

									<!-- WORDPRESS COMMENTS -->
									<div class="arlo_fn_comment" id="comments">
										<?php comments_template(); ?>
									</div>
									<!-- /WORDPRESS COMMENTS -->

								</div>
								<!-- /POST COMMENT -->
								<?php } ?>

								<?php 
									endwhile; endif;
								?>
							</div>
						</div>

						<div class="arlo_fn_rightsidebar">
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