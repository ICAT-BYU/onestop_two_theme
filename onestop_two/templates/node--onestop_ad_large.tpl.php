
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>	
		<?php print render($title_prefix); ?>
		<?php print render($title_suffix); ?>

<?php	
	//kpr($variables);
  //dpm($node);
	$targetnode = '';	
	$renderedpicture = '';
	$language = $variables['language'];
	
	if(isset($content['field_gallery_main_page'][0]) && !empty($content['field_gallery_main_page'])){
		$targetnode = node_load($content['field_gallery_main_page'][0]['#markup']); 		
	}
	
	if(!empty($targetnode->field_ac_icon)){		
		$targetpicture = node_load($targetnode->field_ac_icon[$language][0]['target_id']);
		$node_view = node_view($targetpicture,'no_edit');
		$renderedpicture = render($node_view);
	}
?>
<a class="large-ad" href="<?php if(!empty($node->field_gallery_main_page)){ print('/' . drupal_lookup_path('alias', 'node/' . $node->field_gallery_main_page[$language][0]['target_id'])); }?>">
	<img src="<?php if(!empty($node->field_gallery_image)) print(file_create_url($node->field_gallery_image[$language][0]['uri']));?>" class="large-ad-image">
  <?php if(isset($node->field_banner['und'][0]['value']) && $node->field_banner['und'][0]['value'] == 1){ ?>
  <div class="large-ad-content">
		<div class="large-ad-bar-background <?php print($targetnode->type); ?>"></div>
		<div class="large-ad-bar">
			<div class="large-ad-bar-title"><?php if($title) print $title;?></div>
			<div class="large-ad-bar-subtitle"><?php if(!empty($node->field_gallery_subtitle)) print $node->field_gallery_subtitle[$language][0]['value'];?></div>
		</div>

		<div class="large-ad-icon <?php print($targetnode->type);  ?>">
			<?php if(!empty($node->field_gallery_main_page)){print($renderedpicture);}?>
		</div>

	</div>
  <?php } ?>
  
</a>

</div>