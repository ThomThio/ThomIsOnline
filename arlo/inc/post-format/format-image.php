<?php 
	global $arlo_fn_option;

	$postid = get_the_ID();
	$post_thumbnail_id = get_post_thumbnail_id( $postid );
	$src = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
	$image = '';
	if(isset($src[0])){
		$image = '<img src="'.esc_url($src[0]).'" />';
	}

	if(has_post_thumbnail()){
?>
<div class="fn-format-img">
	<?php echo wp_kses_post($image);?>
</div>
<?php } ?>