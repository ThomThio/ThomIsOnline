<?php 
$postaudio_soundcloud = get_post_meta(get_the_ID(),'arlo_fn_audio_soundcloud', true);
?>

<?php if($postaudio_soundcloud){ ?>
<div class="fn-format-audio">
    <div class="audio">
        <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo esc_url($postaudio_soundcloud); ?>&amp;auto_play=false&amp;show_artwork=true"></iframe>
    </div>
</div>
<?php } ?>