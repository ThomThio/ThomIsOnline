<?php

get_header();

global $post, $arlo_fn_option;

$curauth = get_userdata(get_query_var('author'));
?>
        
    
        <div class="arlo_fn_content_archive arlo_fn_all_pages_content">
			<div class="arlo_fn_pagetitle">
				<div class="container">
					<div class="title_holder">
						<h3>
						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
						<?php /* If this is a category archive */ if (is_category()) { ?>
							<?php printf(esc_html__('All posts in %s', 'arlo'), single_cat_title('',false)); ?>
						<?php /* If this is a tag archive */ } elseif( is_tax() ) { $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
							<?php printf(esc_html__('All posts in %s', 'arlo'), $term->name ); ?>
						<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
							<?php printf(esc_html__('All posts tagged in %s', 'arlo'), single_tag_title('',false)); ?>
						<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
							<?php esc_html_e('Archive for', 'arlo') ?> <?php the_time(get_option('date_format')); ?>
						 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
							<?php esc_html_e('Archive for', 'arlo') ?> <?php the_time('F, Y'); ?>
						<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
							<?php esc_html_e('Archive for', 'arlo') ?> <?php the_time('Y'); ?>
						<?php /* If this is an author archive */ } elseif (is_author()) { ?>
							<?php esc_html_e('All posts by', 'arlo') ?> <?php echo esc_html($curauth->display_name); ?>
						<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
							<?php esc_html_e('Blog Archives', 'arlo') ?>
						<?php } ?>
						</h3>
					</div>
					<?php arlo_fn_breadcrumbs();?>
				</div>
			</div>
			
			<div class="arlo_fn_all_pages">
				<div class="container">
					<div class="arlo_fn_all_pages_inner">
					
					
						<div class="arlo_fn_without_sidebar_page">
							<div class="inner">
								<ul class="arlo_fn_archive_list arlo_fn_masonry blog_archive">
								<?php
								if (have_posts()) : while (have_posts()) : the_post(); ?>
								<li class="arlo_fn_masonry_in">
									<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="arlo_fn_post">
										   <?php if(has_post_thumbnail()){ ?>
											<div class="img_holder">
												<a href="<?php the_permalink(); ?>">
													<?php 
														the_post_thumbnail('full');
													?>
												</a>
											</div>
											<?php } ?>
									   		
									   		
										  	<div class="title_holder">
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
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<p><?php echo arlo_fn_excerpt(30,get_the_id()); ?></p>

												<p class="read_holder">
													<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'arlo') ?></a>
												</p>
											</div>
										</div>
									</article>
								</li><?php 

								endwhile; endif; ?>
							</ul>

							<?php arlo_fn_pagination(); wp_reset_postdata(); ?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
       
        </div>
		<!-- /MAIN CONTENT -->
        
<?php get_footer(); ?>   