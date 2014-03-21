<?php //drupal_add_js(base_path() . 'sites/all/themes/onestop/js/checklists_scripts.js','file');?>
<?php
$important = 0;
if(isset($content['field_os_important']['#items'][0]['value'])) $important = $content['field_os_important']['#items'][0]['value'];
    // Add the jquery library for tabs
    drupal_add_library ('system','ui.tabs');

?>

<div id="checklist-item-<?php print($node->nid);?>" class="opensection accordianformatting">		
  <h3 class="<?php if($important == 1){print('important'); }?> onestop_accordian"><a href="#"><?php print $title ?></a></h3>

  <?php /*<div class="checkboxcircle checkbox-<?php print($node->nid);?>">
  <?php global $base_url; if(user_is_logged_in() && isset($content['links']['flag'])){print(render($content['links']['flag']));}else{print(l('','https://cas.byu.edu/cas/login?service='. $base_url .'/cas?destination=' . current_path(),array('attributes' => array('title' => 'Mark as completed'))));}?>			
  </div>
  */?>
  <div>	
    <div class="checklist_item">					
    <?php if(isset($content['field_ac_content'])) print(drupal_render($content['field_ac_content'])); ?>
    </div>

    <div class="checklist_itemlinks">
      <div class="checklist_tabs">					
        <ul>

          <?php if(isset($content['field_onestop_task']) && (node_access('update',$node) || !empty($content['field_onestop_task']))):?>
          <li><a href="#tab-<?php print $node->nid ?>a"><span>Do It</span></a></li>
          <?php endif ?>

          <?php if(isset($content['field_ac_step_by_step']) && (node_access('update',$node) || !empty($content['field_ac_step_by_step']))):?>
          <li><a href="#tab-<?php print $node->nid ?>b"><span>Step by Step</span></a></li>
          <?php endif ?>

        </ul>

        <?php if(isset($content['field_onestop_task']) && (node_access('update',$node) || !empty($content['field_onestop_task']))):?>
        <div id="tab-<?php print $node->nid ?>a" class="checklist_tab">							
        <?php	print(drupal_render($content['field_onestop_task']));	?>		
        </div>										
        <?php endif ?>

        <?php if(isset($content['field_ac_step_by_step']) && (node_access('update',$node) || !empty($content['field_ac_step_by_step']))):?>
        <div id="tab-<?php print $node->nid ?>b" class="checklist_tab">										
        <?php print(drupal_render($content['field_ac_step_by_step'])); ?>
        </div>									
        <?php endif ?>


      </div>
    </div>
  </div>
</div>
		 
<?php // End page view ?>












