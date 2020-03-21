<?php 
$embed = get_post_meta(get_the_ID(),'arlo_fn_video_embed', true);
?>

<?php if( !empty($embed) ) { ?>
<div class="fn-format-video">
    <div class="video">
        <?php echo stripslashes(wp_specialchars_decode($embed)); ?>
    </div>
</div>
<?php }?>