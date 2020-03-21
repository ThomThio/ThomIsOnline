<?php 
$postgallery = get_post_meta(get_the_ID(),'arlo_fn_postgallery', false);
?>
<?php if($postgallery){ ?>
<div class="fn-format-gallery frenify_fn_lightbox">
    <div class="owl-carousel">
       <?php
			$postid = get_the_ID();
			global $wpdb;
			
            if ( !is_array( $postgallery ) ) $postgallery = ( array ) $postgallery;
        
            $postgallery = implode( ',', $postgallery ); 
			$postgallery = esc_sql( $postgallery );
            
            $images = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_type = %s AND ID IN ( $postgallery ) ORDER BY menu_order DESC ", array('attachment') ));
			
            foreach($images as $img){
            
				$src = wp_get_attachment_image_src( $img, 'full' );
				$src = $src[0];
					
					
			?>
                <div class="item lightbox" data-src="<?php echo esc_url($src); ?>">
                  	<img class="noimg" src="<?php echo esc_url($src); ?>" alt="<?php  esc_attr(bloginfo('description')); ?>" />
                   	<div class="img_overlay" style="background-image: url('<?php echo esc_url($src); ?>')"></div>
                </div>
        <?php 	
			} ?>
        </ul>
    </div>
</div>
<?php } ?>