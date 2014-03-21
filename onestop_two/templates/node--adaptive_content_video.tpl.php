<?php
	/*
	*	The template file to render Adaptive Content Videos
	*/
  
  
  // This file is not done------------------------------
?>


<?php if($view_mode != 'no_edit'): ?>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>	
		<?php print render($title_prefix); ?>
		<?php print render($title_suffix); ?>
		
	<div class="adaptive_content_video adaptive_content_formatting">
		<?php 
			
			if(isset($content['field_youtube_video'])){
				$iframetextclass = 'youtubevideo';			
				if(node_access($node,'update')){
					$iframetextclass .= ' editor';
				}
					
				print('<iframe class="' . $iframetextclass . '" src="https://www.youtube.com/embed/' . $content['field_youtube_video']['#items'][0]['video_id'] . '?rel=0;showinfo=0;autohide=1" frameborder="0"></iframe>');
			}
		 
			if(isset($content['field_ac_video'][0]['#markup'])){						
					print('<div>' .  l('Download video',$content['field_ac_video'][0]['#markup'], array('attributes' => array('class' =>'videocontent'))) . '</div>'); 			
			}				
			
		?>
	</div>
		
	</div>
<?php endif;?>


<?php if($view_mode === 'no_edit'): ?>	
		<div class="adaptive_content_video adaptive_content_formatting">
		<?php 
			
			if(isset($content['field_youtube_video'])){
				$iframetextclass = 'youtubevideo';			
				if(node_access($node,'update')){
					$iframetextclass .= ' editor';
				}
					
				print('<iframe class="' . $iframetextclass . '" src="https://www.youtube.com/embed/' . $content['field_youtube_video']['#items'][0]['video_id'] . '" frameborder="0"></iframe>');
			}
		 
			if(isset($content['field_ac_video'][0]['#markup'])){						
					print('<div>' .  l('Download video',$content['field_ac_video'][0]['#markup'], array('attributes' => array('class' =>'videocontent'))) . '</div>'); 			
			}				
			
		?>
	</div>
<?php endif;?>
