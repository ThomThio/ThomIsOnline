<?php
function arlo_fn_pagination($pages = '', $range = 1, $home = 0)
{  
	$currentPage = '';
	$showitems = ($range * 1) + 1;
	global $arlo_fn_paged;
    
	if(get_query_var('paged')) {
		 $arlo_fn_paged = get_query_var('paged');
	} elseif(get_query_var('page')) {
		 $arlo_fn_paged = get_query_var('page');
	} else {
		 $arlo_fn_paged = 1;
	}

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
	 

     if(1 != $pages)
     {
		 echo '<div class="arlo_fn_pagination"><ul>';
		 if($arlo_fn_paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' title='".esc_attr__('first','arlo')."'>&larr; </a></li>";
         for ($i=1; $i <= $pages; $i++)
         {
			 if (1 != $pages &&( !($i >= $arlo_fn_paged+$range+1 || $i <= $arlo_fn_paged-$range-1) || $pages <= $showitems ))
             {
				if($home == 1){
					if($arlo_fn_paged == $i){
						echo "<li><span class='current'>".esc_html($i)."</span></li>";
					}else{
						echo "<li><a href='".esc_url(add_query_arg( 'page', $i))."' class='inactive' >".esc_html($i)."</a></li>";
					}
					
				}else{
					if($arlo_fn_paged == $i){
						echo "<li class='active'><span class='current'>".esc_html($i)."</span></li>";
					}else{
						echo "<li><a href='".esc_url( get_pagenum_link($i))."' class='inactive' >".esc_html($i)."</a></li>";
					}
				}
				if($arlo_fn_paged == $i){
					$currentPage = $i;
				}
			 }
         }
		 if ($arlo_fn_paged < $pages && $showitems < $pages) echo "<li><a href='".esc_url( get_pagenum_link($pages))."' title='".esc_attr__('last','arlo')."'>&rarr;</a></li>";
		 echo '<li class="view"><p>'.sprintf('%s %s %s %s',esc_html__('Viewing page', 'arlo'), $currentPage, esc_html__('of', 'arlo'), $pages).'</p></li>';
         echo "</ul></div>\n";
     }
}



?>
