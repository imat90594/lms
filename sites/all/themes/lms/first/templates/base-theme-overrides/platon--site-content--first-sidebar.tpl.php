<?php
  $settings = variable_get('theme_platon_settings');
  if(!empty($settings['palette'])) {
    $backgroundColor = $settings['palette']['dark_blue'];
  }
?>

<div class="col-lg-3">
  <?php if (!empty($main_navigation) && ($logged_in || theme_get_setting('platon_menu_show_for_anonymous')) && theme_get_setting('toggle_main_menu')): ?>
    <div id="main-navigation-wrapper">
      <?php if(drupal_is_front_page() && !$logged_in): ?>
        <div style="background-color: <?php (isset($backgroundColor) && !empty($backgroundColor)) ? print($backgroundColor) : print('#009ee0'); ?>">
      <?php endif; ?>
      <?php print $main_navigation; ?>
      <?php if(drupal_is_front_page() && !$logged_in): ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php print render($page['sidebar_first']); ?>
</div>
