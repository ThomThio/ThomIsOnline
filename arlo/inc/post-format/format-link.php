<?php $link = get_post_meta($post->ID, 'arlo_fn_link', TRUE); ?>

<div class="fn-format-link">
	
	<a href="<?php echo esc_url($link); ?>"><?php esc_html_e('Follow This Link', 'arlo'); ?></a>
    
    <span class="sub-title">&mdash; <?php echo esc_url($link); ?></span>

</div>