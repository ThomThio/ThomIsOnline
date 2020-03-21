<?php $quote = get_post_meta($post->ID, 'arlo_fn_quote', TRUE); ?>

<div class="fn-format-quote">
	
	<?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?>
    	
		<blockquote>
			<?php if($quote !== ''){ ?>
				<?php echo esc_html($quote); ?>
				<br />
				<div class="space20"></div>
			<?php } ?>
			<b><?php the_title(); ?></b>
		</blockquote>
     
	<?php if( !is_single() ) { ?> </a> <?php } ?>

</div>