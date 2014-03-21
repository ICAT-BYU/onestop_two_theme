<?php
	/*
	*	The template file to render Adaptive Content Files
	*/
	// this is not done -----------------------------
?>


<?php if($view_mode != 'no_edit'): ?>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>	
		<?php print render($title_prefix); ?>
		<?php print render($title_suffix); ?>
		<div class="adaptive_content_file adaptive_content_formatting">
		<?php if(isset($content['field_ac_file_1'])) print(drupal_render($content['field_ac_file_1']))?>
		</div>		
	</div>
<?php endif;?>


<?php if($view_mode === 'no_edit'): ?>	
	<div class="adaptive_content_file adaptive_content_formatting">
	<?php if(isset($content['field_ac_file_1'])) print(drupal_render($content['field_ac_file_1']))?>
	</div>
<?php endif;?>