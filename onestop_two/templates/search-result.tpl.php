<?php

/**
 * @file
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Default keys within $info_split:
 * - $info_split['type']: Node type (or item type string supplied by module).
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 *
 * Other variables:
 * - $classes_array: Array of HTML class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $title_attributes_array: Array of HTML attributes for the title. It is
 *   flattened into a string within the variable $title_attributes.
 * - $content_attributes_array: Array of HTML attributes for the content. It is
 *   flattened into a string within the variable $content_attributes.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for its existence before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 * @code
 *   <?php if (isset($info_split['comment'])): ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 * @endcode
 *
 * To check for all available data within $info_split, use the code below.
 * @code
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 * @endcode
 *
 * @see template_preprocess()
 * @see template_preprocess_search_result()
 * @see template_process()
 *
 * @ingroup themeable
 */

  $node = node_load($variables['result']['node']->entity_id);
?>
<div class="node-teaser-<?php print $node->nid; ?> <?php print $classes; ?> node-teaser clearfix "<?php print $attributes; ?>>
      <a href="<?php print $variables['result']['link']; ?>" class="teasericon teaser-icon-search teaser-icon-<?php print $node->type; ?>">
        <?php if(isset($node->field_ac_icon) && !empty($node->field_ac_icon)) {
          $icon = node_load($node->field_ac_icon['und'][0]['target_id']);
          $node_view = node_view($icon ,'no_edit');
          print(drupal_render($node_view));
         } ?>
      </a>
      <div class="teaser-content">
        <div class="node_title node-title"><a href="<?php print $variables['result']['link']; ?>"><?php print $variables['result']['title']; ?></a></div>
      <p><?php print $node->field_os_teaser['und'][0]['value']; ?></p>
      
        <ul class="teaser-links">
          <?php if($node->type === 'tasks' && isset($node->field_ac_do_it_now_link)){ // tasks have do it link 
            $link = $node->field_ac_do_it_now_link['und'][0]['value'];

            if(!strstr($link, 'http://') && !strstr($link, 'https://'))
            $link = 'http://' . $link;
          ?>
          <li class="link first"><?php print (l(t('Do it'), $link, array('attributes' => array('class' => 'teaserlinks', 'target' => '_blank')))); ?>
          <?php } if($node->type === 'offices' && isset($node->field_ac_office_website_link)){ // offices have visit it link 
            $link = $node->field_ac_office_website_link['und'][0]['value'];

            if(!strstr($link, 'http://') && !strstr($link, 'https://'))
            $link = 'http://' . $link;
          ?>
          <li class="link first"><?php print (l(t('Visit it'), $link, array('attributes' => array('class' => 'teaserlinks', 'target' => '_blank')))); ?>
          <?php } ?>
          
          <li class="link flag">
            <?php 
            global $base_url; 
            if(user_is_logged_in()){
              $flag = flag_create_link('my_onestop_follow', $node->nid);
              print $flag;
            }else{
              print(l('Follow','https://cas.byu.edu/cas/login?service='. $base_url .'/cas?destination=' . current_path()));
            }?>
          </li>
          <li class="link last"><a href="<?php print $variables['result']['link']; ?>">More Info</a></li>
        </ul>
      
      </div>
  </div>
