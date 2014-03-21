<?php if($view_mode == 'full') :?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>	
		<?php print render($title_prefix); ?>
		<?php print render($title_suffix); ?>

<?php
$link = '';

if(isset($content['field_ad_content']['#items'][0]['entity'])){
	$newnode = $content['field_ad_content']['#items'][0]['entity'];
	
	// USE FIELD VIEW TO GET THE ONE FIELD FROM THE OTHER NODE!!!!
	
	//$newnode = node_load($variables['field_ad_content'][0]['target_id']);

	// Check which type of link to show.  An internal link to a node or the text from the node do it now link.
	if($variables['field_ad_link_option'][0]['value'] == '1' && $newnode->type == 'onestop_task' && isset($newnode->field_ac_do_it_now_link['und'][0])){
			
		$link = $newnode->field_ac_do_it_now_link['und'][0]['value'];
		if(!strstr('http',$link)){
			$link = 'http://' . $link;	
		}
	}else{
		$link = '/' . drupal_lookup_path('alias', 'node/' . $variables['field_ad_content'][0]['target_id']);
	}

}

?>
  <a href="<?php print($link); ?>" class="small-ad-link" >
    <div class="small-ad-text">
      <p><?php print($title); ?></p>
    </div>
    <img src="<?php if(isset($variables['field_ad_image'][0])) {print(file_create_url($variables['field_ad_image'][0]['uri'])); }?>" >
    
  </a>

</div>
<?php endif; ?>

