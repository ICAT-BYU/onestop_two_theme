<?php

	/*
	*	The template file to render Adaptive Content Images
	*/
	//dpm($node);
	//kpr($content);
	
?>
	
		
<?php if($view_mode != 'no_edit'): ?>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>	
		<?php print render($title_prefix); ?>
		<?php print render($title_suffix); ?>
		<div class="adaptive_content_image adaptive_content_formatting">
			<?php if(isset($content['field_adaptive_content_image'])) print(drupal_render($content['field_adaptive_content_image']))?>
		</div>
		
	</div>
<?php endif;?>


<?php if($view_mode === 'no_edit'): ?>	
			<div class="adaptive_content_image adaptive_content_formatting">
			<?php if(isset($content['field_adaptive_content_image'])) print(drupal_render($content['field_adaptive_content_image']))?>
		</div>
<?php endif;?>