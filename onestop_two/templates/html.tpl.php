<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">

  <meta http-equiv="cleartype" content="on">
  <?php
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
   $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   if ($_SERVER['REQUEST_URI'] === "/") { $url .= "home/tasks"; }
   $domain = $protocol . $_SERVER['SERVER_NAME'];

   echo "\n\n<!-- FACEBOOK META TAGS -->\n";
   echo '<meta property="fb:app_id" content="563131213704917" />' . "\n";
   echo '<meta property="og:site_name" content="OneStop Student Services" />' . "\n";
   echo '<meta property="og:description" content="One Stop\\\'w' .$schwa. 'n \'st' .$umlaut. 'p\\ noun: Your sidekick for managing Financial Aid, Registration, and other student services while attending BYU." />' . "\n";
   echo '<meta property="og:title" content="' .$head_title. '" />' . "\n";
   echo '<meta property="og:type" content="university" />' . "\n";
   echo '<meta property="og:url" content="' .$url. '" />' . "\n";
   echo '<meta property="og:image" content="' .$domain. '/' .path_to_theme(). '/images/social/fb-logo.png" />' . "\n";
   echo "<!-- END FACEBOOK META TAGS -->\n\n";
  ?>
  
  <?php 
    echo "<!-- FAV and APPLE ICON TAGS -->\n\n";
     echo '<link rel="apple-touch-icon" sizes="57x57" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/touch-icon-57x57.png" />' . "\n";
     echo '<link rel="apple-touch-icon" sizes="72x72" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/touch-icon-72x72.png" />' . "\n";
     echo '<link rel="apple-touch-icon" sizes="114x114" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/touch-icon-114x114.png" />' . "\n";
     echo '<link rel="apple-touch-icon" sizes="144x144" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/touch-icon-144x144.png" />' . "\n";
     echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/touch-icon-144x144.png" />' . "\n";
     echo '<link rel="icon" type="image/png" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/icon-16x16.png">' . "\n";
     echo '<link rel="shortcut icon" href="' .$domain. '/' .path_to_theme(). '/images/icons/fav/favicon.ico">' . "\n";
     echo "<!-- END FAV and APPLE ICON TAGS -->\n\n";
    ?>
  
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php if ($add_html5_shim and !$add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim and $add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/respond.js"></script>
    <![endif]-->
  <?php endif; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

</body>
</html>
