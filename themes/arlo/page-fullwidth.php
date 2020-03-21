<?php
/*
	Template Name: Full Width Page
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
		<div class="arlo_fn_all_pages" <?php echo esc_attr($arlo_fn_page_spaces); ?>>
			<div class="arlo_fn_all_pages_inner">
				<!-- PAGE -->
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
				<!-- /PAGE -->
			</div>
		</div>		
		<!-- /ALL PAGES -->
	</div>
<?php } ?>

<?php get_footer(); ?>  