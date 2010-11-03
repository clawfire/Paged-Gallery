<?php 
	if($_POST['ycycle_sent'] == 'Y') {
		//This is after they entered settings. So lets save them.
		$fx_effect = $_POST['ycyclista_fx_dropdown'];
		update_option('ycyclista_fx', $fx_effect);			
		
		$fx_speed = $_POST['ycyclista_speed'];
		update_option('ycyclista_speed', $fx_speed);	

		$fx_anim = $_POST['ycyclista_fx_anim'];
		update_option('ycyclista_fx_anim', $fx_anim);		
		
		$show_captions = $_POST['ycyclista-captions-show'];
		update_option('ycyclista_captions', $show_captions);	

		$show_captions_fancy = $_POST['ycyclista_captions_fancy'];
		update_option('ycyclista_captions_fancy', $show_captions_fancy);			
		
		$thumbs_display = $_POST['ycyclista_thumbs_display'];
		update_option('ycyclista_thumbs_display', $thumbs_display);
		
		$thumb_size_width = $_POST['ycyclista_thumb_width'];
		update_option('ycyclista_thumb_width', $thumb_size_width);		
		
		$thumb_size_height = $_POST['ycyclista_thumb_height'];
		update_option('ycyclista_thumb_height', $thumb_size_height);			
		
		$nav_on = $_POST['ycyclista_nav_buttons'];
		update_option('ycyclista_nav_buttons', $nav_on);		
		
		$nav_pos = $_POST['ycyclista_nav_position'];
		update_option('ycyclista_nav_position', $nav_pos);				
		
		$nav_prev = $_POST['ycyclista_nav_prev_text'];
		update_option('ycyclista_nav_prev_text', $nav_prev);		
		
		$nav_next = $_POST['ycyclista_nav_next_text'];
		update_option('ycyclista_nav_next_text', $nav_next);			
		
		$nav_separate = $_POST['ycyclista_nav_sep_text'];
		update_option('ycyclista_nav_sep_text', $nav_separate);		

		?>
		
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		
<?php
	} else {
		//fx options
		$fx_effect = get_option('ycyclista_fx');
			
		$fx_speed = get_option('ycyclista_speed');
		$fx_anim = get_option('ycyclista_fx_anim');
		$show_captions = get_option('ycyclista_captions');
		$show_captions_fancy = get_option('ycyclista_captions_fancy');
		
		//thumbnail options
		$thumbs_display = get_option('ycyclista_thumbs_display');
		$thumb_size_width = get_option('ycyclista_thumb_width');
		$thumb_size_height = get_option('ycyclista_thumb_height');
		
		//nav options
		$nav_on = get_option('ycyclista_nav_buttons');
		$nav_pos = get_option('ycyclista_nav_position');			
		$nav_prev = get_option('ycyclista_nav_prev_text');
		$nav_next = get_option('ycyclista_nav_next_text');			
		$nav_separate = get_option('ycyclista_nav_sep_text');			
	}

	?>

<div class="wrap">
	<h2>yCyclista by yonatan reinberg</h2>
		
	<div class="postbox-container" style="width:60%; margin-right:5%; " >
		<div class="metabox-holder">
			<div id="jq_effects" class="postbox">
				<div class="handlediv" title="Click to toggle"><br /></div>

				<h3><a class="togbox">+</a> yCyclista options</h3>
				
				<div class="inside"  style="padding:10px;">
					<form name="ycycle_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
					
						<table class="form-table">
						
							<input type="hidden" name="ycycle_sent" value="Y">
									<h4>effects</h4>
									
									<p><?php _e("Fx effect: " ); ?><select name="ycyclista_fx_dropdown">
											<?php $cycle_effects = array('blindX','blindY','blindZ','cover','curtainX','curtainY','fade','fadeZoom','growX','growY','none','scrollUp','scrollDown','scrollLeft','scrollRight','scrollHorz','scrollVert','shuffle','slideX','slideY','toss','turnUp','turnDown','turnLeft','turnRight','uncover','wipe','zoom');
												foreach($cycle_effects as $effect) {
													echo '<option value="' . $effect .'"'; 
														if ($fx_effect == $effect) { echo 'selected=selected'; }
													echo '>' . $effect . '</option>';
												} ?>

									</select>		
									</p>
									
									<p>ex: scrollLeft. or scrollRight. or curtainX is a funky one. See here for transition demos: <a href="http://www.malsup.com/jquery/cycle/browser.html">jQuery Cycle transitions</a></p>				
									<p>speed: <input type="text" name="ycyclista_speed" value="<?php echo $fx_speed; ?>" size="10"> (ex: 1000)</p>
									<p><input type="checkbox" name="ycyclista_fx_anim" id="ycyclista_fx_anim" value="true" <?php if ($fx_anim) { echo 'checked=checked'; } ?>" /> self animate (slideshow)</p>
									
									<h4>captions</h4>
									<input type="checkbox" name="ycyclista-captions-show" id="ycyclista-captions-show" value="true" <?php if ($show_captions) { echo 'checked=checked'; } ?>" /><?php _e(" show captions&nbsp;&nbsp;&rarr;&nbsp;&nbsp;" ); ?><input type="checkbox" name="ycyclista_captions_fancy" id="ycyclista_captions_fancy" value="true" <?php if ($show_captions_fancy) { echo 'checked=checked'; } ?>" /><?php _e(" fancy captions" ); ?>
									
									<h4>thumbnails</h4>
									<input type="checkbox" name="ycyclista_thumbs_display" id="ycyclista_thumbs_display" value="true" <?php if ($thumbs_display) { echo 'checked=checked'; } ?>" /><?php _e(" display thumbnails" ); ?>

									<p><?php _e("thumbnail width (px): " ); ?><input type="text" name="ycyclista_thumb_width" value="<?php echo $thumb_size_width; ?>" size="2"><?php _e("   height (px): " ); ?><input type="text" name="ycyclista_thumb_height" value="<?php echo $thumb_size_height; ?>" size="2"></p>
									
									<h4>navigation controls</h4>
									<p><input type="checkbox" name="ycyclista_nav_buttons" id="ycyclista_nav_buttons" value="true" <?php if ($nav_on) { echo 'checked=checked'; } ?>" /><?php _e(" display navigation controls" ); ?></p>
									<p>location:<br /><input class="tog" type="radio" name="ycyclista_nav_position" value="above" <?php if ($nav_pos=='above') { echo 'checked=checked'; } ?> />above gallery<br>
									<input class="tog"  type="radio" name="ycyclista_nav_position" value="below" <?php if ($nav_pos=='below') { echo 'checked=checked'; } ?> />below gallery<br></p>
					
									<p>previous text<input type="text" name="ycyclista_nav_prev_text" value="<?php echo $nav_prev; ?>" size="20">&nbsp;&nbsp;&nbsp;separator<input type="text" name="ycyclista_nav_sep_text" value="<?php echo $nav_separate; ?>" size="10">&nbsp;&nbsp;&nbsp;next text: <input type="text" name="ycyclista_nav_next_text" value="<?php echo $nav_next; ?>" size="20"></p>									

									
									
									<hr />
					
									<p class="submit">
									<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update Options', 'ycycle_trdom' ) ?>" />
									</p>
									
									
					
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="postbox-container" style="width:20%;">
		<div class="metabox-holder">	
			<div class="meta-box-sortables">
				<div id="yCyclista-what" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
					<h3 class="hndle"><span>what it is</span></h3>
					<div class="inside" style="padding:10px;">
						<p>written by yonatan reinberg 2010 - v1.2.2</p>
						<p>to use, go into your post and add images to your gallery. then click "insert gallery". thats it! yCyclista will overwrite the gallery with the settings here. If you're using shortcodes, use <em>[gallery]</em>, or <em>[gallery exclude="ID"]</em> to skip certain images.</p>
						<p>for support, questions, comments, loves, hates or if you want to go for a bike ride, visit social ink at <a href="http://social-ink.net">social-ink.net</a> and the <a href="http://www.social-ink.net/blog/ycyclista-a-wordpress-gallery-carousel-plugin-that-allows-slideshows-transitions-cycles">plugin support page</a></p>
						<hr />
						<?php $beer_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)) . '/images/icon_beer.gif'; ?>
						<p><img src="<?php echo $beer_url ?>" style="float:left;margin-right:15px;margin-bottom:15px;" />did this plugin really help you out? <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=accounts@social-ink.net&currency_code=&amount=&return=&item_name=Buy+Me+A+Beer+Social+Ink+donation">buy me a beer (suggested $5)!</a></p>
					</div>
				</div>				
				
				<div id="yCyclista-weirdness" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
					<h3 class="hndle"><span>weirdness?</span></h3>
					<div class="inside" style="padding:10px;">
						
						<p>yCyclista uses jquery 1.6.4 (i believe) and relies on <a href="http://www.malsup.com/jquery/cycle/">malsop's awesome jquery cycle plugin</a>.  if you have problems with wordpress and jquery generally <a href="http://codex.wordpress.org/Function_Reference/wp_enqueue_script">go here</a>. if you want to learn jquery <a href="http://jquery.com/">go here</a>.</p>
						<p>if you have navigation buttons (next/prev) turned on, you <b>cannot</b> click on the big image, they take over. if you want to be able to click on the big image and move next, disable these buttons</p>
						<p>if you have fancy captions on, and the width is funky, go to <a href="options-media.php">settings - media</a> and set the large image max width to the width of your images.</p>
						<p>note that not all functions to the left work together. for example, if you have it set to slideshow, the thumbnails won't appear. speed doesn't play well with certain effects. and so on. you'll have to tinker to find out...</p></div>
				</div>
						
			</div>

		</div>
	</div>
	 
 </div>