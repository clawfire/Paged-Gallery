<?php /*
Plugin Name: Paged Gallery
Plugin URI: http://thibaultmilan.com/paged-gallery
Author URI: http://thibaultmilan.com
Version: 0.1 pre alpha
Author: Thibault Milan
Description: Simple plugin to paginate WP gallery 
.<a href="options-general.php?page=paginated_gallery">Goto settings</a>.
 
Copyright 2010  Thibault Milan (email : hello@thibaultmilan.com ) - http://thibaultmilan.com
*/
	add_option('pagedgallery_pict_per_page','6');
	add_option('paggedgallery_effect','default');
	// navigation default
	add_option('paggedgallery_nav_buttons','true');
	add_option('paggedgallery_nav_next_text','&rarr;');
	add_option('paggedgallery_nav_prev_text','&larr;');
	add_option('paggedgallery_nav_count','compact');
	add_option('paggedgallery_nav_count_text','sur');
	
	//admin panel
	add_action('admin_menu','paggedgallery_add_menu');
	
	function paggedgallery_admin(){include('paggedgallery_admin.php');}
	
	function paggedgallery_add_menu(){
		add_options_page("Paged Gallery","Paged Gallery",1,"Paged Gallery","paggedgallery_admin");
	}
	
	//override WP's gallery
	add_filter('post_gallery','paggedgallery_gallery',10,2);

	//main function
	function paggedgallery_gallery($null, $attr =aray()){
		extract(shortcode_atts(array(
			'exclude' => ''
		), $attr));
		$output.='<ul id="gallery">';
			global $wp_query;global $post;
			$tmp_post=$post;$tmp_query=$wp_query;
			$thePostID=$wp_query->post->ID;
			$args = array(
				'post_type'=>'attachment',
				'orderby'=>'menu_order ID',
				'order'=>'ASC',
				'numberposts'=>-1,
				'post_status'=>null,
				'post_parent'=>$thePostID);
			$attachments = get_posts($args;)
			global $attachment;
			if($attachments){
				$count=0;
				$max_per_page=get_option('pagedgallery_pict_per_page');
				$output.='<li class="gallery-page"><ul>';
				foreach($attachments as $attachment){
					$img_title=apply_filter('the_title',$attachment->post_title);
					$img_full=wp_get_attachment_image_src($attachment->ID, 'full');
					//are we excluding anything?
					$my_id = $attachment->ID;
					$excludes = explode(",", $exclude);	//create array from excludes								
					if (in_array($my_id,$excludes))
						continue;
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					if(count($alt))
						$output.="<li><img src=\"" . $img_full[0] . "\" id=\"ycycle_pic_" . $my_id . "\" alt=\"" . $alt . "\" class=\"yc_img_fullsize yc_images\" style=\"\" /></li>";
					else
						$output .= "<li><img src=\"" . $img_full[0] . "\" id=\"ycycle_pic_" . $my_id . "\" class=\"yc_img_fullsize yc_images\" style=\"\" /></li>";
					if($count=$max_per_page){
						$output.='</ul></li><li class="gallery-page"><ul>';
						$count=0;
					}
					$count++;
				}
				$output.='</ul>';
			}
			$post = $tmp_post; $wp_query = $tmp_query;
			$output.='</li>';
			
			return $output;
	}