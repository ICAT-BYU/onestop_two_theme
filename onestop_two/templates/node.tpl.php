<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
 
?>

<?php if(!$teaser): ?>
<?php 

  if($variables['type'] === checklists){
    drupal_add_library('system', 'ui.accordion');
    drupal_add_js('jQuery(document).ready(function(){jQuery(".accordion-test").accordion({collapsible: true, active: false, autoHeight: false});});', 'inline');
    drupal_add_js ( 'jQuery(document).ready(function(){ jQuery(".checklist_tabs").tabs();});' , 'inline' );
    /*drupal_add_js ('jQuery(document).ready(function(){ jQuery(".accordion-href").click(function(){ 
      tmp = jQuery("#accordion").offset().top;
      jQuery("html,body").animate({ scrollTop: tmp });
      }); });', 'inline');
    */
  }
?>

<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

    </header>

  <?php endif; ?>
  
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    if($variables['type'] === checklists){
      hide($content['field_onestop_checklist_item']); }
    print render($content);
    if($variables['type'] === checklists){
  ?>

  <div class="checklists node-view content-bar"></div>
  <div id="accordion" class="checklist-items">
    <?php if(isset($content['field_onestop_checklist_item'])) print render($content['field_onestop_checklist_item']);	
    
    print "</div>";
    
    } //end checklists check?>
  </article>
  	<div class="content-bar node-view <?php if($variables['type']){ print ($variables['type']);}?>">Questions?</div>
  <?php endif; // $teaser check ?>
  
  <?php if($teaser): ?>
  <div class="node-teaser-<?php print $node->nid; ?> <?php print $classes; ?> node-teaser clearfix "<?php print $attributes; ?>>
  
      <a href="<?php print $node_url; ?>" class="teasericon teaser-icon-<?php print $variables['type']; ?>">
        <?php if(isset($content['field_ac_icon']) && !empty($content['field_ac_icon'])) {
          $icon = node_load($content['field_ac_icon'][0]['#markup']);
          $node_view = node_view($icon ,'no_edit');
          print(drupal_render($node_view));
         } ?>
        <?php if(in_array('node-unpublished',$variables['classes_array'])) print('<div class="node_unpublished">Unpublished</div>'); ?>
      </a>
      <div class="teaser-content">
        <div<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></div>
      <?php print render($content['field_os_teaser']); ?>
      
        <ul class="teaser-links">
          <?php if($variables['type'] === 'tasks' && isset($content['field_ac_do_it_now_link'])){ // tasks have do it link 
            $link = $content['field_ac_do_it_now_link']['#items'][0]['value'];

            if(!strstr($link, 'http://') && !strstr($link, 'https://'))
            $link = 'http://' . $link;
          ?>
          <li class="link first"><?php print (l(t('Do it'), $link, array('attributes' => array('class' => 'teaserlinks', 'target' => '_blank')))); ?>
          <?php } if($variables['type'] === 'offices' && isset($content['field_ac_office_website_link'])){ // offices have visit it link 
            $link = $content['field_ac_office_website_link']['#items'][0]['value'];

            if(!strstr($link, 'http://') && !strstr($link, 'https://'))
            $link = 'http://' . $link;
          ?>
          <li class="link first"><?php print (l(t('Visit it'), $link, array('attributes' => array('class' => 'teaserlinks', 'target' => '_blank')))); ?>
          <?php } ?>
          
          <li class="link flag">
            <?php 
            global $base_url; 
            if(user_is_logged_in() && isset($content['links']['flag'])){
              print(render($content['links']['flag']));
            }else{
              print(l('Follow','https://cas.byu.edu/cas/login?service='. $base_url .'/cas?destination=' . current_path()));
            }?>
          </li>
          <li class="link last"><a href="<?php print $node_url; ?>">More Info</a></li>
        </ul>
      
      </div>
  </div>
    
  <?php endif; // teaser ?>


